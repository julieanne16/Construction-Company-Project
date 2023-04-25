<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require 'connection.php';

// USER LOGIN
function login($conn, $email, $password)
{
	try {
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->execute(array(':email' => $email));
		$account = $stmt->fetch(PDO::FETCH_ASSOC);

		// if email not exist
		if (!$account) {
			return array(
				'status' => false,
				'field' => 'email',
				'message' => 'This email is not registered yet.'
			);
		} elseif (!password_verify($password, $account['password'])) {
			return array(
				'status' => false,
				'field' => 'password',
				'message' => 'Incorrect password.'
			);
		} else {
			// Password is correct
			$_SESSION['account_id'] = $account['user_id'];
			$_SESSION['name'] = $account['fname'] . " " . $account['lname'];
			$_SESSION['email'] = $account['email'];
			return array(
				'status' => true
			);
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// REGISTRATION
function register($conn, $fname, $lname, $email, $password)
{
	try {
		// Check if email is already registered
		$stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
		$stmt->execute(array(':email' => $email));
		$count = $stmt->fetchColumn();

		// Email is already registered
		if ($count > 0) {
			return array(
				'status' => false,
				'message' => 'This email is already registered'
			);
		} else {
			// Email is not registered, insert new user into database

			$hashed_password = password_hash($password, PASSWORD_BCRYPT);
			$stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password) VALUES (:fname, :lname, :email, :password)");
			$stmt->execute(array(':fname' => $fname, ':lname' => $lname, ':email' => $email, ':password' => $hashed_password));

			$_SESSION['registered'] = true;
			return array(
				'status' => true,
			);
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// GET ROW BY ID
function getRow($conn, $row_id, $id, $table)
{
	try {
		$stmt = $conn->prepare("SELECT * FROM $table WHERE $row_id = :id");
		$stmt->execute(array(':id' => $id));

		// Fetch the row as an associative array
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// Return the row
		return $row;
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}


// DISPLAY CART
function displayCart($conn, $user_id)
{
	try {

		$stmt = $conn->prepare("SELECT products.product_id, products.img, products.name, products.price, cart.cart_id, cart.quantity, (cart.quantity * products.price) AS total FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = :user_id");
		$stmt->execute(array(":user_id" => $user_id));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// If there are rows, return them, otherwise return a message
		if (!empty($rows)) {
			$total_amount = 0;
			foreach ($rows as $row) {
				$total_amount += $row['total'];
			}
			unset($row);
			// return array('rows' => $rows, 'total_amount' => $total_amount,);
			return $rows;
		} else {
			$empty = [];
			return $empty;
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}


// CRUD FUNCTIONS
// READ OR DISPLAY QUERY
function read($conn, $table)
{
	try {
		$stmt = $conn->prepare("SELECT * FROM $table");
		$stmt->execute();

		// Fetch results
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// DELETE OR REMOVE QUERY
function delete($table, $id_column, $id_value)
{
	global $conn;

	try {
		$stmt = $conn->prepare("DELETE FROM $table WHERE $id_column = :id_value");
		$stmt->bindValue(':id_value', $id_value);
		$stmt->execute();
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// ADD OR CREATE QUERY
function create($table, $data)
{
	global $conn;

	$fields = implode(',', array_keys($data));
	$values = ':' . implode(',:', array_keys($data));
	$sql = "INSERT INTO $table ($fields) VALUES ($values)";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}

// UPDATE OR EDIT QUERY
function update($table, $idField, $idValue, $fieldsToUpdate)
{
	global $conn;

	// Construct the SET clause of the SQL query
	$setClause = '';
	foreach ($fieldsToUpdate as $fieldName => $fieldValue) {
		$setClause .= "`$fieldName` = :$fieldName, ";
	}
	$setClause = rtrim($setClause, ', ');

	// Construct the SQL query
	$sql = "UPDATE `$table` SET $setClause WHERE `$idField` = :$idField";

	// Prepare the query
	$stmt = $conn->prepare($sql);

	// Bind the parameters
	$stmt->bindParam(":$idField", $idValue, PDO::PARAM_INT);
	foreach ($fieldsToUpdate as $fieldName => $fieldValue) {
		$stmt->bindValue(":$fieldName", $fieldValue);
	}
	// Execute the query
	$stmt->execute();
}

function checkOut($user_id)
{
	global $conn;

	try {
		// Retrieve all items in the cart table
		$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
		$stmt->execute([$user_id]);
		$cart_items = $stmt->fetchAll();

		// Insert into checkout table and update product quantity
		$stmt = $conn->prepare("INSERT INTO checkout (user_id, product_id, quantity, purchase_date) VALUES (?, ?, ?, NOW())");
		$update_stmt = $conn->prepare("UPDATE products SET quantity = quantity - ? WHERE product_id = ?");
		foreach ($cart_items as $cart_item) {
			$stmt->execute([$user_id, $cart_item['product_id'], $cart_item['quantity']]);
			$update_stmt->execute([$cart_item['quantity'], $cart_item['product_id']]);
		}

		// Delete items from cart table
		$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
		$stmt->execute([$user_id]);

		return "Item(s) successfully checked out!";
	} catch (PDOException  $error) {
		// Rollback the transaction on error
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// function editPass($conn, $password)
// {
// 	try {

// 		$current_password = $_POST['c-pass'];
// 		$password1 = $_POST['n-pass'];
// 		$password2 = $_POST['con-pass'];

// 		if ($password1 != $password2) {
// 			return array(
// 				'status' => false,
// 				'message' => 'Password does not match'
// 			);
// 		} else {


// 			$hashed_password = password_hash($password, PASSWORD_BCRYPT);
// 			$stmt = $conn->prepare("UPDATE users SET password = :password WHERE id =id");
// 			$stmt->execute(array(':password' => $hashed_password));

// 			$_SESSION['registered'] = true;
// 			return array(
// 				'status' => true,
// 			);
// 		}
// 	} catch (PDOException  $error) {
// 		return  "<strong>ERROR: </strong> " . $error->getMessage();
// 	}
// }

// Fetch function
function filter($conn, $category)
{
	try {
		if ($category == 'all') {
			$sql = "SELECT * FROM products";
		} else {
			$sql = "SELECT * FROM products WHERE category = :category";
		}

		// Prepare the SQL statement
		$stmt = $conn->prepare($sql);

		// Bind the category parameter (if applicable)
		if ($category != 'all') {
			$stmt->bindParam(':category', $category);
		}

		// Execute the statement and fetch the results
		$stmt->execute();
		$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $products;
	} catch (PDOException $error) {
		return "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// ADD CART
function addToCart($conn, $user_id, $product_id)
{
	try {
		// Check if item already exists in cart
		$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':product_id', $product_id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) { // If item already exists in cart, update the quantity
			$stmt = $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE user_id = :user_id AND product_id = :product_id");
			$stmt->bindParam(':user_id', $user_id);
			$stmt->bindParam(':product_id', $product_id);
			$stmt->execute();
		} else { // Otherwise, insert a new row into the cart table
			$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, date_added) VALUES (:user_id, :product_id, 1, NOW())");
			$stmt->bindParam(':user_id', $user_id);
			$stmt->bindParam(':product_id', $product_id);
			$stmt->execute();
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// Count products
function countCartItems($conn, $user_id)
{
	try {
		$stmt = $conn->prepare("SELECT COUNT(*) as count FROM cart WHERE user_id = :user_id");
		$stmt->execute(array('user_id' => $user_id));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row['count'];
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}
// function editEmail($conn, $email)
// {
// 	try {
// 		// Check if email is already registered
// 		$stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
// 		$stmt->execute(array(':email' => $email));
// 		$count = $stmt->fetchColumn();

// 		// Email is already registered
// 		if ($count > 0) {
// 			return array(
// 				'status' => false,
// 				'message' => 'This email is already registered'
// 			);
// 		} else {
// 			// Email is not registered, insert new user into database

// 			$hashed_password = password_hash($password, PASSWORD_BCRYPT);
// 			$stmt = $conn->prepare("UPDATE INTO users (email) VALUES (:email");
// 			$stmt->execute(array(':email' => $email));

// 			$_SESSION['registered'] = true;
// 			return array(
// 				'status' => true,
// 			);
// 		}
// 	} catch (PDOException  $error) {
// 		return  "<strong>ERROR: </strong> " . $error->getMessage();
// 	}
// }

// function updatUser($conn, $fname, $lname)
// {
// 	try {	

// 		$data = [
// 			'fname' => $fname,
// 			'lname' => $lname,
// 		];
// 		$sql = "UPDATE users SET fname=:fname, lname=:lname WHERE id=:id";
// 		$stmt= $pdo->prepare($sql);
// 		$stmt->execute($data);

// 			// $stmt = $conn->prepare("INSERT INTO users (fname, lname) VALUES (:fname, :lname");
// 			// $stmt->execute(array(':fname' => $fname, ':lname' => $lname));


// 			// $_SESSION['registered'] = true;
// 			// return array(
// 			// 	'status' => true,
// 			// );
		
// 	} catch (PDOException  $error) {
// 		return  "<strong>ERROR: </strong> " . $error->getMessage();
// 	}
// }

// if(isset($_POST['update_User']))
// {
//     // $user_id = $_POST['user_id'];	
//     $fname = $_POST['fname'];
// 	$lname = $_POST['lname'];
// 	$phone = $_POST['contact'];
// 	$cemail = $_POST['email'];
//     $email = $_POST['new-email'];
//     $pasword = $_POST['c-pass'];
// 	$npass = $_POST['n-pass'];
// 	$conpass = $_POST['con-pass'];

//     try {

//         $query = "UPDATE users SET fname=:fname, lname=:lname, contact=:phone, new-email=:email, con-pass=:password WHERE id=:user_id LIMIT 1";
//         $statement = $conn->prepare($query);

//         $data = [
//             ':fname' => $fname,
// 			':lname' => $lname,        
//             ':contact' => $phone,
// 			':cemail' => $cemail,
// 			':new-email' => $email,
//             ':c-pass' => $password,
// 			':n-pass' => $npass,
// 			':con-pass' => $conpass,
//             // ':user_id' => $user_id
//         ];
//         $query_execute = $statement->execute($data);
			
// 			if ($_POST["n-pass"] === $_POST["con-pass"]){
// 				// success!
// 			}
// 			elseif($count > 0) {
// 					return array(
// 						'status' => false,
// 						'message' => 'This email is already registered'
// 					);
// 			}
// 			else {
// 				// failed :(
// 			}

//         if($query_execute)
//         {
//             $_SESSION['message'] = "Updated Successfully";
//             header('Location: index.php');
//             exit(0);
//         }
//         else
//         {
//             $_SESSION['message'] = "Not Updated";
//             header('Location: index.php');
//             exit(0);
//         }

//     } catch (PDOException $e) {
//         echo $e->getMessage();
//     }
// }

function updatePass($conn, $cpass, $conpass, $npass, $password)
{
	try {
		$npass = $_POST['npass'];
		$conpass = $_POST['conpass']; 

		if($npass == $conpass){
			
		
		} elseif($count > 0) {
			return array(
				'status' => false,
				'message' => 'password requires 6 characters'
			);

			$stmt = $conn->prepare("UPDATE users SET password = :npass WHERE $user_id=:user_id");
			$stmt->execute([':npass' => password_hash($password), ':id'=> $user_id]);
		} else {
			echo "error";
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

function updateEmail($conn, $email, $newmail, $cmail)
{
	try {
		$user_id = $_POST['user_id'];
		$email = $_POST['newmail'];
		$cmail = $_POST['cmail']; 

		if($cmail == $newmail){

			$stmt = $conn->prepare("UPDATE users SET newemail = :email WHERE $user_id=:user_id");
			$pdo->prepare($sql)->execute($data);
		} else {
			echo "error";
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// function updateName($conn, $fname, $lname, $contact)
// {
// 	try {
// 		// $user_id = $_POST['user_id'];
// 		// $fname = $_POST['fname'];
// 		// $lname = $_POST['lname'];
// 		// $phone = $_POST['contact']; 
// 		$data = [
// 			'fname' => $fname,
// 			'lname' => $lname,
// 			'contact' => $phone,
// 			'user_id' => $user_id,
// 		];
// 		$sql = "UPDATE users SET fname=:fname, lname=:lname, contact=:phone WHERE $user_id=:id";
// 		$stmt= $pdo->prepare($sql);
// 		$stmt->execute($data);

// 	} catch (PDOException  $error) {
// 		return  "<strong>ERROR: </strong> " . $error->getMessage();
// 	}
// }

function updateName($conn, $fname, $lname, $contact)
{
try{

$sql = $sql = "UPDATE `users` SET `fname` = :fname,  
`lname` = :lname, `contact` = :phone WHERE `user_id` = :user_id";

 $statement = $conn->prepare($sql);
 $statement->bindValue(":fname", $fname);
 $statement->bindValue(":lname", $lname);
 $statement->bindValue(":contact", $phone);
 $count = $statement->execute();

  $conn = null;        // Disconnect
}
catch(PDOException $e) {
  echo $e->getMessage();
}
}



// if (isset($_POST['updateInfo'])) {

// 	$user_id = $_POST['user_id'];

// 	$fname = $_POST['fname'];

// 	$lname = $_POST['lname'];

// 	$phone = $_POST['phone'];

// 	$sql = "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`phone`='$phone' WHERE `user_id`='$user_id'"; 

// 	$result = $conn->query($sql); 

// 	if ($result == TRUE) {

// 		echo "Record updated successfully.";

// 	}else{

// 		echo "Error:" . $sql . "<br>" . $conn->error;

// 	}

// } 
function updateInfo($conn, $fname, $lname, $contact)
{
	global $conn;

	// Construct the SQL query
	$stmt = $conn->prepare("UPDATE users SET (fname, lname, phone) VALUES (:fname, :lname, :phone)");
			$stmt->execute(array(':fname' => $fname, ':lname' => $lname, ':phone' => $phone));

			$_SESSION['registered'] = true;
			return array(
				'status' => true,
			);
	// Execute the query
	$stmt->execute();
}


?>
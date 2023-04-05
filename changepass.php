<?php
require 'connection.php';


if(isset($_POST['changePassBtn'], $_POST['token'])){

    if(validate_token($_POST['token'])){
        $form_errors = array();

        $required_fields = array('c-pass', 'n-pass', 'con-pass');

        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        $fields_to_check_length = array ('n-pass' => 6, 'con-pass' => 6);

        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));



        if(empty($form_errors)){
            

            $id = $_POST['hidden_id'];
            $current_password = $_POST['c-pass'];
            $password1 = $_POST['n-pass'];
            $password2 = $_POST['con-pass'];

            if($password1 != $password2){
                $result = flashMessage("Does not match");
            }else{
                try{

                    $sqlSquery = "SELECT password FROM users WHERE id = id";
                    $statement = $db->prepare($sqlSquery);

                    $statement->execute(array(':id' => $id));

                    if ($row = $statement->fetch()){
                        $password_form_db = $row['password'];

                        if(password_verify($c-pass, $password_form_db)){
                            $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

                            $sqlUpdate = "UPDATE users SET password = :password WHERE id =id";

                            $statement = $db->prepare($sqlUpdate);
                            $statment->execute(array(':password'=> $hashed_password, 'id' => $id));

                            if($statement-rowCount() === 1){
                                $result = flashMessage("Success");
                            }else{
                                $result = flashMessage("An error occured". $error->getMessage());
                            }

                        }else{
                            $result = flashMessage("An error occured". $error->getMessage());
                        }
                    }else{
                        header ("Location: logout.php");
                    }

                }catch (PDOException  $ex){
                    $result = flashMessage("An error occured". $error->getMessage()); 
                }
            }
        }

        else{
            if(count($form_errors) ==  1){
                $result = flashMessage("An error occured". $error->getMessage());
            }else{
                $result = flashMessage("An error occured". $error->getMessage());
            }
        }
    }
}else{
    echo "Error";
}


?>
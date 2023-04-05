<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

// require_once 'changepass.php';
require_once 'functions.php';

if (isset($_POST['update'])) {
	$id = $_POST["id"];
	$where = array("id" => $id);
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];


	// 	$res = $editUsers->update_record('users',$where,['first_name'=>$fname,'last_name'=>$lname,'email'=>$email,'passord'=>$password]);
}
?>




<!-- <link rel="stylesheet" href="settings.css"> -->
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>


<section class="settings">
	<div class="container">
		<!-- Page title -->
		<div class="title">
			<i class="fa-solid fa-user-gear"></i>
			<h1>SETTINGS</h1>
		</div>

		<div class="settings-flex">
			<!-- Tab Links -->
			<div class="tab">
				<button class="tablinks" onclick="openPage(event, 'Info')" id="defaultOpen"><i class="fa-solid fa-circle-user"></i> CHANGE PERSONAL INFO</button>
				<button class="tablinks" onclick="openPage(event, 'Email')"><i class="fa-solid fa-envelope"></i> CHANGE EMAIL</button>
				<button class="tablinks" onclick="openPage(event, 'Password')"><i class="fa-solid fa-lock"></i> CHANGE PASSWORD</button>
			</div>

			<!-- Tab Content -->
			<div id="Info" class="tabcontent">
				<input type="hidden" name="update">
				<div class="form">
					<form id="updateUser" method="POST">
						<div class="form-group">
							<label>First Name *</label>
							<input type="fname" name="fname" placeholder="First Name">
						</div>
						<div class="form-group">
							<label>Last Name *</label>
							<input type="lname" name="lname" placeholder="Last Name">
						</div>
						<div class="form-group">
							<label>Contact Number *</label>
							<input type="contact" name="contact" placeholder="Contact Number">
						</div>

						<button class="form-btn" name="updateUser">SAVE CHANGES</button>
						<button class="form-btn-cancel">CANCEL</button>
						<input type="hidden" name="update">
					</form>
				</div>
			</div>


			<!-- Email Content -->
			<div id="Email" class="tabcontent">
				<div class="form">
					<form method="POST">
						<div class="form-group">
							<label>Current Email Address *</label>
							<input type="email" name="email" placeholder="Current Email Address">
						</div>
						<div class="form-group">
							<label>New Email Address *</label>
							<input type="new-email" name="new-email" placeholder="New Email Address">
						</div>

						<input type="hidden" name="hidden_id">
						<button class="form-btn" name="editEmail">SAVE CHANGES</button>
						<button class="form-btn-cancel">CANCEL</button>
					</form>
				</div>
			</div>

			<!-- Password Content -->
			<div id="Password" class="tabcontent">
				<div class="form">
					<form method="POST">
						<p>Password must be atleast 6 characters</p>
						<div class="form-group">
							<label>Current Password *</label>
							<input type="password" name="c-pass" placeholder="Current Password">
						</div>
						<div class="form-group">
							<label>New Password *</label>
							<input type="password" name="n-pass" placeholder="New Password">
						</div>
						<div class="form-group">
							<label>Confirm New Password *</label>
							<input type="password" name="con-pass" placeholder="Confirm New Password">
						</div>

						<input type="hidden" name="hidden_id">
						<button class="form-btn" name="editPass">SAVE CHANGES</button>
						<button class="form-btn-cancel">CANCEL</button>
					</form>
				</div>
			</div>
		</div>

	</div>
</section>

<script>
	function openPage(evt, pageName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(pageName).style.display = "block";
		evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>


</main>

<?php require_once 'includes/footer.php' ?>
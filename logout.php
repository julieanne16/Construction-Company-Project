<?php

// Start the session
session_start();

unset($_SESSION['logged_in']);
unset($_SESSION['account_id']);

// Redirect to the login page
header('Location: login.php');
exit();

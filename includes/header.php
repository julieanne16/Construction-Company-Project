<?php

session_start();

require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
   <script src="https://kit.fontawesome.com/0ebd665efa.js" crossorigin="anonymous" defer></script>
</head>
<body>
	  <header class="header">
        <div class="logo"><a href="#">Construction<span> Co.</span></a></div>
        <navbar class="nav">
            <a href="#signin">SIGN IN</a>
            <a href="#contact">CONTACT US</a>
            <a href="products.php">PRODUCTS</a>
            <a href="#product">ABOUT US</a>
            <a href="#home">HOME</a>  
        </navbar>
        <div class="icon-header">
            <i class="fa-solid fa-basket-shopping"></i>
        </div>
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </header>
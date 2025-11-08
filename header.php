<?php
require_once "connection.php";
require_once "functions.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Make Up Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="style.css">
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="bootstrap/css/responsive.css">
 <link rel="stylesheet" href="css/core.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>




</head>
<body>
	<div class="container-fluid" id="header-div">
	<div class="container">
		<h2>Make Up Store</h2>
		<a href="admin.php" class="btn btn-info" role="button">Home</a>
		<a href="categories.php" class="btn btn-info" role="button">Category</a>
		<a href="products.php" class="btn btn-info" role="button">Products</a>
		<a href="customerrecord.php" class="btn btn-info" role="button">Delete/Update Record</a>
		<a href="order_master.php" class="btn btn-info" role="button">Order Master</a>
		<div class="container" id="logout">
		<a href="logout.php" class="btn btn-danger" role="button">Logout</a>
		</div>

	</div>
	</div>

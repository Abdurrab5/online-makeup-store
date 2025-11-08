<?php
require('connection.php');
require('functions.php');

?>
<!doctype html>
<html class="no-js" lang="en">
<head><meta charset="utf-8">
<title> </title>
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
		<a href="customerPanel.php" class="btn btn-info" role="button">Home</a>
		<a href="my_order.php" class="btn btn-info button,select " role="button">order Status</a>
		
		<div class="container " id="logout">
		<a href="logout.php" class="btn btn-danger" role="button">Logout</a>
        <div><a href="cart.php"   class="btn btn-success" role="button">
		<i class="glyphicon glyphicon-shopping-cart"></i></a> </div>     		
		</div>
</div>
	 </div>
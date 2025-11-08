<?php
require_once "connection.php";
require_once "functions.php";
session_start();
?>
<html>
<head>
<title></title>

<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container-fluid" id="header-div">
  <div class="container">
    <h2>Furniture Shop</h2>
    <a href="index.php" class="btn btn-info" role="button">Admin Login</a>
    <a href="customerRegisteration.php" class="btn btn-info" role="button">Customer Registeration</a>
    
  </div>
  </div>
	<?php
	if(isset($_POST['login'])){
    
    $aid=$_POST['username'];
    $password=$_POST['password'];
      
    $query="SELECT * FROM customer WHERE username='$aid' and password='$password' ";
    $result= mysqli_query($link, $query);
    if(mysqli_num_rows($result)){
        $row= mysqli_fetch_array($result);
        $_SESSION['cusid']=$row['username'];
        $_SESSION['cusname']=$row['fname']; 
        alert("You have been logged-in successfuly.");
       
        redirect_to("customerPanel.php");
    }else{
        alert("please provide correct login detail: ".mysqli_error($link));
    }
}
?>
	<div>
		<h3 class="container"> Customer Sign in</h3>
	</div>
	<div class="container" id="form">
	<form action="" method="POST" >

  
  <div class="form-group">
    <label for="username">User Name:</label>
    <input type="text" class="form-control" id="username" name="username" required="">
  </div>
  <div class="form-group">
    <label for="name">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="">
  </div>

  <input type="submit" class="btn btn-default" value="Login" name="login" id="login"/>
  <input type="reset" class="btn btn-default" value="Reset" name="reset" id="reset"/> 
</form>
</div>






</body>
</html>

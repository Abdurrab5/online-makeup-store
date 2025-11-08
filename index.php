<?php
require_once "connection.php";
require_once "functions.php";
session_start();

?>
<!DOCTYPE html>
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
    <h2>Make Up Store</h2>
    <a href="customerRegisteration.php" class="btn btn-info" role="button">Customer Registeration</a>
    <a href="customerSignin.php" class="btn btn-info" role="button">Customer Sign in</a>
  </div>
  </div>
	<?php
	if(isset($_POST['login'])){
    
    $aid=$_POST['id'];
    $password=$_POST['password'];
      
    $query="SELECT * FROM admin WHERE id='$aid' and password='$password' ";
    $result= mysqli_query($link, $query);
    if(mysqli_num_rows($result)){
        $row= mysqli_fetch_array($result);
        $_SESSION['adminid']=$row['id'];
        $_SESSION['adminname']=$row['admin_name']; 
        alert("You have been logged-in successfuly.");
        //redirecting
        redirect_to("admin.php");
    }else{
        alert("please provide correct login detail: ". mysqli_error($link));
    }
}
?>
	<div>
		<h3 class="container"> Admin Login</h3>
	</div>
	<div class="container" id="form">
	<form action="" method="POST" >

    
  <div class="form-group">
    <label for="id">Admin ID:</label>
    <input type="text" class="form-control" id="id" name="id" required="">
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

<?php
require_once "connection.php";
require_once "functions.php";

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

	<?php
	$msg='';
	if(isset($_POST['submit'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
	$username=$_POST['username'];
    $password=$_POST['password'];
	$email=$_POST['email'];
    $address=$_POST['address']; 
    $phone=$_POST['phone'];   
    $gender=$_POST['gender'];
   
    $query="INSERT into customer (fname,lname,username, password ,email, address,   phone,gender) VALUES";
    $query.="('$fname','$lname','$username ','$password','$email', '$address',  '$phone', '$gender')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("You have been logged-in successfuly.");
       
        redirect_to("customerSignin.php");
    }else{
			$msg="customer already exist";
        
    }
}
?>
  <div class="container-fluid" id="header-div">
  <div class="container">
    <h2>Makeup Store</h2>
    <a href="index.php" class="btn btn-info" role="button">Home</a>
  </div>
  </div>

  <div>
		<h3 class="container"> Customer Registeration Form</h3>
	</div>
	<div class="form" id="">
	<form action="" method="POST" >
  <div class="form-group">
    <label for="fname">First Name:</label>
    <input type="text" class="form-control" id="fname" name="fname" required="" Placeholder="First name:">
  </div>
 <div class="form-group">
    <label for="name">Last Name:</label>
    <input type="text" class="form-control" id="lname" name="lname" required="" Placeholder="Last Name:" >
  </div>
  <div class="form-group">
    <label for="username">User Name:</label>
    <input type="text" class="form-control" id="username" name="username" required="" Placeholder="username:" >
  </div>
    <div class="form-group">
    <label for="name">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="" Placeholder="Enter password:">
  </div>
   <div class="form-group">
    <label for="name">e-Mail:</label>
    <input type="email" class="form-control" id="email" name="email" required="" Placeholder="Enter e-Mail add:">
  </div> 
    <div class="form-group">
    <label for="name">address:</label>
    <input type="text" class="form-control" id="address" name="address" required="" Placeholder="Enter city:">
  </div>
  
 
  <div class="form-group">
    <label for="phone">phone:</label>
    <input type="text" class="form-control" id="phone" name="phone" required="" Placeholder="03001234567:" pattern="[0-9]{4}[0-9]{7}">
  </div>
  <div class="form-group">
    <label for="gender">Gender:</label>
    <div class="form-check">
      
        <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" checked>Male
     
        <input type="radio" class="form-check-input" id="radio2" name="gender" value="female">Female
     
    </div>
  </div>
  <input type="submit" class="btn btn-default" value="Click to Register" name="submit" id="submit"/>
  <input type="reset" class="btn btn-default" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>


</body>




</html>

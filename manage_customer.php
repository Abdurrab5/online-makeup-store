<?php
require_once "header.php";
$cus_id='';
$fname='';
$lname='';
$username='';
$password='';
$email='';
$address='';
$phone='';
$gender='';



$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
	
	$id=get_safe_value($link,$_GET['id']);
	$res=mysqli_query($link,"select * from customer where cus_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$cus_id=$row['cus_id'];
$fname=$row['fname'];
$lname=$row['lname'];
$username=$row['username'];
$password=$row['password'];
$email=$row['email'];
$address=$row['address'];
$phone=$row['phone'];
$gender=$row['gender'];
		
		
	}else{
		redirect_to("customerrecord.php");
	}
}

if(isset($_POST['submit'])){
	$cus_id=get_safe_value($link,$_POST['cus_id']);
	$fname=get_safe_value($link,$_POST['fname']);
	
	$lname=get_safe_value($link,$_POST['lname']);
	$username=get_safe_value($link,$_POST['username']);
	$password=get_safe_value($link,$_POST['password']);
	$email=get_safe_value($link,$_POST['email']);
	$address=get_safe_value($link,$_POST['address']);
	$phone=get_safe_value($link,$_POST['phone']);
	$gender=get_safe_value($link,$_POST['gender']);
	$res=mysqli_query($link,"select * from customer where username='$username'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['cus_id']){
			
			}else{
				$msg="data already exist";
			}
		}else{
			$msg="data already exist";
		}
	}
	
	
	$update_sql="update customer set cus_id='$cus_id',fname='$fname',lname='$lname',username='$username',password='$password', email='$email',address='$address',phone='$phone',gender='$gender'where cus_id='$id'";
	mysqli_query($link,$update_sql);		
		$query="SELECT * FROM customer   ";
    $result= mysqli_query($link, $query);
	redirect_to("customerrecord.php");
	}
?>

<div>
		<h3 class="container"> <strong>Update</strong><small> Form</small></h3>
	</div>
                      
                        <div class="container" id="form">
	<form action="" method="POST">
	
	
								
<div class="form-group">
<label for="cus_id" class=" form-control-label">Customerid</label>
<input type="text" name="cus_id"  class="form-control"  value="<?php echo $cus_id?>" readonly>
</div>
<div class="form-group">
<label for="fname" class=" form-control-label">First name</label>
<input type="text" name="fname"  class="form-control"  value="<?php echo $fname?>">
</div>
<div class="form-group">
<label for="lname" class=" form-control-label">Last Name</label>
<input type="text" name="lname"  class="form-control" value="<?php echo $lname?>">
</div>
<div class="form-group">
<label for="username" class=" form-control-label">User Name</label>
<input type="text" name="username"  class="form-control"  value="<?php echo $username?>">
</div>
<div class="form-group">
<label for="password" class=" form-control-label">Password</label>
<input type="text" name="password"  class="form-control"  value="<?php echo $password?>">
</div>
<div class="form-group">
<label for="email" class=" form-control-label">Email</label>
<input type="text" name="email"  class="form-control"  value="<?php echo $email?>">
</div>

<div class="form-group">
<label for="address" class=" form-control-label">Address</label>
<input type="text" name="address"  class="form-control"  value="<?php echo$address?>">
</div>
<div class="form-group">
<label for="phone" class=" form-control-label">Phone</label>
<input type="text" name="phone"  class="form-control"  value="<?php echo $phone?>">
</div>
	<div class="form-group">
<label for="gender" class=" form-control-label">Gender</label>
<input type="text" name="gender"  class="form-control"  value="<?php echo $gender?>">
</div>

													

								
 <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
<span id="payment-button-amount">Submit</span>
 </button>
 <div class="field_error"><?php echo $msg?></div>
</div>
</form>
                     
         
</div>
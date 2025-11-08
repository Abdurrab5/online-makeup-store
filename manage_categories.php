<?php
require_once "header.php";

$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($link,$_GET['id']);
	$res=mysqli_query($link,"select * from categories where cat_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['categories'];
	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($link,$_POST['categories']);
	$res=mysqli_query($link,"select * from categories where categories='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Categories already exist";
			}
		}else{
			$msg="Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($link,"update categories set categories='$categories' where cat_id='$id'");
		}else{
			mysqli_query($link,"insert into categories(categories,status) values('$categories','1')");
		}
		header('location:categories.php');
		die();
	}
}
?>
<div>
		<h3 class="container"><strong>Categories</strong><small> Form</small></h3>
	</div><div class="container" id="form">
	<form action="" method="POST" >

  
  <div class="form-group">
    <label for="categories" class=" form-control-label">Categories</label>
    <input type="text" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $categories?>">
  </div>
  

  <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
   <div class="field_error"><?php echo $msg?></div>
</form>
</div>

         

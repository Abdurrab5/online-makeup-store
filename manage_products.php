<?php
require_once "header.php";
$categories_id='';
$p_name='';
$image='';
$price='';
$title='';
$qty='';



$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($link,$_GET['id']);
	$res=mysqli_query($link,"select * from products where p_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$p_name=$row['p_name'];
		
		$price=$row['price'];
		$title=$row['title'];
		$qty=$row['qty'];
		
	}else{
		header('location:products.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($link,$_POST['categories_id']);
	$p_name=get_safe_value($link,$_POST['p_name']);
	
	$price=get_safe_value($link,$_POST['price']);
	$title=get_safe_value($link,$_POST['title']);
	$qty=get_safe_value($link,$_POST['qty']);
	
	
	$res=mysqli_query($link,"select * from products where p_name='$p_name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['p_id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update products set categories_id='$categories_id',p_name='$p_name',price='$price',title='$title',qty='$qty' where p_id='$id'";
			}else{
				$update_sql="update products set categories_id='$categories_id',p_name='$p_name',price='$price',title='$title',qty='$qty' where p_id='$id'";
			}
			mysqli_query($link,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($link,"insert into products(categories_id,p_name,image,price,title,qty,status) values('$categories_id','$p_name','$image','$price','$title','$qty',1)");
		}
		header('location:products.php');
		die();
	}
}
?>
<div>
		<h3 class="container"> <strong>Product</strong><small> Form</small></h3>
	</div>
                      
                        <div class="container" id="form">
	<form action="" method="POST" enctype="multipart/form-data">
	<label for="categories" class=" form-control-label">Categories</label>
	<select class="form-control" name="categories_id">
	<option>Select Category</option>
<?php
$res=mysqli_query($link,"select cat_id,categories from categories order by categories asc");
	while($row=mysqli_fetch_assoc($res)){
	if($row['cat_id']==$categories_id){
	echo "<option selected value=".$row['cat_id'].">".$row['categories']."</option>";
}else{
	echo "<option value=".$row['cat_id'].">".$row['categories']."</option>";
	}
											
}
?>
</select>
								
<div class="form-group">
<label for="categories" class=" form-control-label">Product Name</label>
<input type="text" name="p_name" placeholder="Enter product name" class="form-control" required value="<?php echo $p_name?>">
</div>
<div class="form-group">
<label for="categories" class=" form-control-label">Image</label>
<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
</div>
<div class="form-group">
<label for="categories" class=" form-control-label">Price</label>
<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
</div>
<div class="form-group">
<label for="categories" class=" form-control-label">title</label>
<input type="text" name="title" placeholder="Enter product mrp" class="form-control" required value="<?php echo $title?>">
</div>
<div class="form-group">
<label for="categories" class=" form-control-label">Qty</label>
<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">
</div>
								

								
 <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
<span id="payment-button-amount">Submit</span>
 </button>
 <div class="field_error"><?php echo $msg?></div>
</div>
</form>
                     
         
</div>
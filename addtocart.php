<?php
require('head.php');

session_start();
$uid=$_SESSION['cusid'];
 
if(isset($_POST["add_to_cart"]))
{
	
		$p_id=get_safe_value($link,$_GET["id"]);
		
		$p_name=get_safe_value($link,$_POST["p_name"]);
		$image=	get_safe_value($link,$_POST["image"]);
		$price=	get_safe_value($link,$_POST["price"]);
		$qty=get_safe_value($link,$_POST["qty"]);
		if($p_id&&$uid==0&&$qty>0){
		
		$query="INSERT into cart (p_id,p_name,username,image,price,qty) values('$p_id','$p_name','$uid','$image','$price','$qty')";	
		 $result= mysqli_query($link, $query);
		if( mysqli_insert_id($link)){
       alert("item add successfuly.");
	   $update_sql="update products  set qty=qty-'$qty'where p_id='$p_id'";
		mysqli_query($link,$update_sql);
       
        redirect_to("cart.php");}
		else{
			echo 'product already exit';
			redirect_to("cart.php");}
    }
	
	}
	



?>
<div class="container">
		 <div class="card">	
			<?php
				
		$product_id	=mysqli_real_escape_string($link,$_GET['id']);
		$query = "SELECT * FROM products where 	p_id ='$product_id'and  qty>0";
				$result = mysqli_query($link, $query);
				

				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
					
				?>
		
				<form method="post" action="addtocart.php?action=add&id=<?php echo $row["p_id"]; ?>">
				
					 
						<img width="250px"src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>">

						<h4 class="text-info"><?php echo $row["p_name"]; ?></h4>
                       <h4 class="text-info"> Available Quantity = (<?php echo $row["qty"]; ?>)</h4>
						<h4 class="text-danger"> Rs<?php echo $row["price"]; ?></h4>
						
						
 <div class="col-md-2">
							<input type="text" name="qty" value="1" class="form-control" /></div>
<input type="hidden" name="image" value="<img src='<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>'" />
						<input type="hidden" name="p_name" value="<?php echo$row['p_name']?>" />

						<input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />
						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
 
					
				</form>
			</div>
			<?php
					}
				}
			?>
			
			
	</div>
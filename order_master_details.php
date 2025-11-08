<?php 
require('header.php');

	$order_id=get_safe_value($link,$_GET['id']);
if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($link,"update taborder set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	}else{
		mysqli_query($link,"update taborder set order_status='$update_order_status' where id='$order_id'");
	}
	
}
?>
<div class="container">
	
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order Detail </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
								<thead>
									<tr>
										<th >Product Name</th>
										<th >Product Image</th>
										<th >Qty</th>
										<th >Price</th>
										<th >Total Price</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$res=mysqli_query($link,"select distinct(order_detail.id) ,order_detail.*,products.p_name,products.image,taborder.address,taborder.city,taborder.pincode from order_detail,products ,taborder where order_detail.order_id='$order_id' and  order_detail.product_id=products.p_id GROUP by order_detail.id");
									$total_price=0;
									
									$userInfo=mysqli_fetch_assoc(mysqli_query($link,"select * from taborder where id='$order_id'"));
									
									$address=$userInfo['address'];
									$city=$userInfo['city'];
									$pincode=$userInfo['pincode'];
									
									while($row=mysqli_fetch_assoc($res)){
									
									$total_price=$total_price+($row['qty']*$row['price']);
									?>
									<tr>
										<td ><?php echo $row['p_name']?></td>
										<td > <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
										<td ><?php echo $row['qty']?></td>
										<td ><?php echo $row['price']?></td>
										<td ><?php echo $row['qty']*$row['price']?></td>
										
									</tr>
									<?php } ?>
									<tr>
										<td colspan="3"></td>
										<td >Total Price</td>
										<td ><?php echo $total_price?></td>
										
									</tr>
								</tbody>
							
						</table>
						<div >
							<strong>Address</strong>
							<?php echo $address?>, <?php echo $city?>, <?php echo $pincode?><br/><br/>
							<strong>Order Status</strong>
							<?php 
							$order_status_arr=mysqli_fetch_assoc(mysqli_query($link,"select order_status.name from order_status,taborder where taborder.id='$order_id' and taborder.order_status=order_status.id"));
							echo $order_status_arr['name'];
							?>
							
							<div>
								<form method="post">
									<select class="form-control" name="update_order_status" required>
										<option value="">Select Status</option>
										<?php
										$res=mysqli_query($link,"select * from order_status");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
										}
										?>
									</select>
									<input type="submit" class="btn btn-info form-control" name="submit"/>
								</form>
							</div>
						</div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>

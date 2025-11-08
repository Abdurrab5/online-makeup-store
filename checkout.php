<?php 
require('head.php');
session_start();
 $total = 0;
$user_id=$_SESSION['cusid'];
  if(isset($_POST['submit'])){
	$address=get_safe_value($link,$_POST['address']);
	$city=get_safe_value($link,$_POST['city']);
	$pincode=get_safe_value($link,$_POST['pincode']);
	$payment_type=get_safe_value($link,$_POST['payment_type']);
	$user_id=$_SESSION['cusid'];
	$sql="select * from cart where username='$user_id'";
           $res=mysqli_query($link,$sql);
		   while($row=mysqli_fetch_assoc($res)){
		
		$price=$row['price'];
		$qty=$row['qty'];
		$total=$total+($price*$qty);
		
	}
	$total_price=$total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='success';
	}
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
	
	
	mysqli_query($link,"insert into taborder(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price')");
	
	$order_id=mysqli_insert_id($link);
	
						
		$sql="select * from cart where username='$user_id'";
           $res=mysqli_query($link,$sql);
		   while($row=mysqli_fetch_assoc($res)){
		 $pid=$row["p_id"];
		$price=$row['price'];
		$qty=$row['qty'];
		
		mysqli_query($link,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$pid','$qty','$price')");
	}
	
	$delete_sql="delete from cart  where  username='$user_id'";
		mysqli_query($link,$delete_sql);
	 
  ?>
	<script>
	alert('thank you');
		window.location.href='customerPanel.php';
	</script>
 <?php
	}
if(isset($_GET["action"]))
{
	
	if($_GET["action"] == "delete")
	{
		$id=get_safe_value($link,$_GET['id']);
    
		$delete_sql="delete from cart  where p_id='$id' and username='$user_id'";
		mysqli_query($link,$delete_sql);

	header('location:cart.php');
	
}}
?>
<div id="search-btn">
<div style="margin-left: 200px;
}" >
                                        Checkout Method
                                    </div>
									
									<div class="">
                                   <form method="post" id="form"> 
                                        <h3 >
                                          
                                        Address Information</h3>
                                    
									
										<div class="form control">
											<div >
												
													<div class="row">
														<div class="col-md-4">
															<div >
															 <label for="name">Address:</label>
																<input type="text" name="address"class="form-control" placeholder="Street Address" required>
															</div>
														</div>
														<div class="col-md-3">
															<div >
															<label for="name">City:</label>
																<input type="text" name="city"class="form-control" placeholder="City/State" required>
															</div>
														</div>
														<div class="col-md-3">
															<div >
															<label for="name">Pincode:</label>
																<input type="text" name="pincode" class="form-control"placeholder="Post code/ zip" required>
															</div>
														</div>
														
													</div>
												
											</div>
										</div>
										<div >
											payment information
										</div>
										
												<div >
													COD <input type="radio" name="payment_type" value="COD" required/>
													&nbsp;&nbsp;PayU <input type="radio" name="payment_type" value="payu" required/>
												</div>
												
											
								
                                  <input type="submit" class="btn btn-info" name="submit"/>
										
                            
                     </div></form>

<br>
<br>
<div >
  <form method="post" action="" id="form">   
               <h3 class="box-title">Your Order</h3>
			   <?php
			        $uid=$_SESSION['cusid'];
					$sql="select * from cart where cart.username='$uid'";
                    $res=mysqli_query($link,$sql);
                    $i=1;
				    $total=0;
		while($row=mysqli_fetch_assoc($res)){
				                    ?>
							
   
  <div class="card-body--">
  <div class="table-stats order-table ">
					  <table class="table ">
						 <tbody>
        <tr>  <td><?php echo $row["image"]; ?></td>
       <td> <?php echo $row["p_name"]; ?></td>
         <td> <?php echo number_format($row["qty"] *  $row["price"] , 2);?>
     <a href="checkout.php?action=delete&id=<?php echo $row["p_id"]; ?>"><span class="btn btn-danger">Remove</span></a>
         </tr>   </div> </div> </tbody>
					  </table>
                               
<?php
							$total = $total + ($row["qty"] *  $row["price"] );
}
?>
<div  id="submit">
           Order total =<?php echo $total?> 
                             
                           
			</div>  
</form>       

</div>
  <br></div>
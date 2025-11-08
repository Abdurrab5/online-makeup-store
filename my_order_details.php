<?php 
require('head.php');
session_start();

?>
	<?php

$order_id=get_safe_value($link,$_GET['id']);
?>

               
            <div class="order">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
                            <form action="#">
                              <div class="card-body--">
				     <div class="table-stats order-table ">
					  <table class="table ">
						 <thead>
                                        <thead>
                                            <tr>
                                                <th >Product Name</th>
												<th >Product Image</th>
                                                <th>Qty</th>
                                                <th >Price</th>
                                                <th >Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$uid=$_SESSION['cusid'];
											$res=mysqli_query($link,"select distinct(order_detail.id) ,order_detail.*,products.p_name,products.image from order_detail,products ,taborder where order_detail.order_id='$order_id' and taborder.user_id='$uid' and order_detail.product_id=products.p_id");
											$total_price=0;
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
												<td class="product-name">Total Price</td>
												<td class="product-name"><?php echo $total_price?></td>
                                                
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         </div>
        						
      
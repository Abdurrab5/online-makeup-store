<?php 
require('header.php');
$sql="select * from users order by id desc";
$res=mysqli_query($link,$sql);
	?>
	

     <div class="container">     
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
                                            <tr>
                                                <th >Order ID</th>
                                                <th >Order Date</th>
                                                <th > Address </th>
                                                <th > Payment Type </th>
												<th > Payment Status </span></th>
												<th > Order Status </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											
											
											$res=mysqli_query($link,"select taborder.*,order_status.name as order_status_str from taborder,order_status where  order_status.id=taborder.order_status");
											while($row=mysqli_fetch_assoc($res)){
											?>
                                            <tr>
												<td ><a href="order_master_details.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></td>
                                                <td ><?php echo $row['added_on']?></td>
                                                <td >
												<?php echo $row['address']?><br/>
												<?php echo $row['city']?><br/>
												<?php echo $row['pincode']?>
												</td>
												<td ><?php echo $row['payment_type']?></td>
												<td ><?php echo $row['payment_status']?></td>
												<td ><?php echo $row['order_status_str']?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>  </div>  
                            </form>
                        </div>
                </div>
            </div>
        </div>
         </div> </div>
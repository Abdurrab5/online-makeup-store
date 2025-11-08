
    <?php
require('head.php');


session_start();

$uid=$_SESSION['cusid'];

if(isset($_POST["update"])){

$id=get_safe_value($link,$_GET['id']);
$qty=$_POST['qty'];
if($qty>0){
$update_sql="update cart set qty='$qty'where p_id='$id' and username='$uid'";
		mysqli_query($link,$update_sql);
		
				header('location:cart.php');}
				
				
				}







if(isset($_GET["action"]))
{
	
	if($_GET["action"] == "delete")
	{
		$id=get_safe_value($link,$_GET['id']);
    $qty=$_POST['qty'];
	
		$delete_sql="delete from cart  where p_id='$id' and username='$uid'";
		mysqli_query($link,$delete_sql);




				
	header('location:cart.php');
	
}}
	
				
								

		




?>
     <div class="container">

		
			<h3>Shopping cart</h3>
			<div class="card-body--">
				     <div class="table-stats order-table ">
					  <table class="table ">
						 <thead>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr><th width="5%">Sno</th>
						<th width="20%">Item Name</th>
						<th width="30%">Image</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					 </thead>
						 <tbody>
					<?php
					$uid=$_SESSION['cusid'];
					$sql="select * from cart where username='$uid'";
                    $res=mysqli_query($link,$sql);
                 $i=1;
				 $total=0;
					while($row=mysqli_fetch_assoc($res)){?>
					
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row["p_name"]; ?></td>
						<td><?php echo $row["image"]; ?></td>
						<td><form method="post"	action="cart.php?id=<?php echo $row['p_id'];?>">	
						<input  name='qty' value="<?php echo $row["qty"]; ?>">
						<input type="submit" class="btn btn-warning" name="update" value="Update"></form>
						</td>
						<td> <?php echo $row["price"]; ?></td>
						<td><?php echo number_format($row["qty"] * $row["price"], 2);?></td>
						<td>
						<a href="cart.php?action=delete&id=<?php echo $row["p_id"]; ?>"><span class="btn btn-danger">Remove</span></a></td>
					</tr>
					<?php
							$total=$total+($row["qty"]*$row["price"]);
						}
					?>
					<tr>
						<td colspan="5" align="right">Total</td>
						<td align="right"> <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					
					?>
				 </tbody>
					  </table>
			</div>

	<br /><div class="col-md-12 col-sm-12 col-xs-12">
	  <div class="btn btn-warning">
                                            <a href="customerPanel.php">Continue Shopping</a>
                                        </div>
                                        <div id="logout" class="btn btn-warning">
                                            <a href="checkout.php">checkout</a>
                                        </div> </div>
	</div>
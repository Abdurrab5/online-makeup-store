<?php
require_once "header.php";

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($link,$_GET['type']);
	$id=get_safe_value($link,$_GET['id']);
		$update_status_sql="update 	customer set  where cus_id='$id'";
		mysqli_query($link,$update_status_sql);
	
	
	if($type=='delete'){
		$id=get_safe_value($link,$_GET['id']);
		$delete_sql="delete from customer where cus_id='$id'";
		mysqli_query($link,$delete_sql4);
	}
}

$sql="select * from customer";
$res=mysqli_query($link,$sql);
?>
																							
	<div class="orders">																																	
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">customer record</h4>
				  
				</div>
				<div class="card-body--">
				     <div class="table-stats order-table ">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>First name</th>
							    <th>Last Name</th>
							   <th>User Name</th>
							   <th>Password</th>
							   <th>Email</th>
							   <th>Address</th>
							   <th>Phone</th>
							   <th>Gender</th>
							   <th></th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['cus_id']?></td>
							   <td><?php echo $row['fname']?></td>
							    <td><?php echo $row['lname']?></td>
							   <td><?php echo $row['username']?></td>
							   <td><?php echo $row['password']?></td>
							   <td><?php echo $row['email']?></td>
							   <td><?php echo $row['address']?></td>
							   <td><?php echo $row['phone']?></td>
							    <td><?php echo $row['gender']?></td>
							   <td>
								<?php
								
								echo "<span class='badge badge-edit'><a href='manage_customer.php?id=".$row['cus_id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['cus_id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				    </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>

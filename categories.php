<?php
require_once "header.php";

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($link,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($link,$_GET['operation']);
		$id=get_safe_value($link,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update categories set status='$status' where cat_id='$id'";
		mysqli_query($link,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($link,$_GET['id']);
		$delete_sql="delete from categories where cat_id='$id'";
		mysqli_query($link,$delete_sql);
	}
}

$sql="select * from categories order by categories desc";
$res=mysqli_query($link,$sql);
?>

<div class="orders">
<div class="row">
<div class="col-xl-4">
 <div class="card">
<div class="card-body">
				   <h4 class="box-title">Categories </h4>
				   <h4 class="box-link"><a href="manage_categories.php">Add Categories</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Categories</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['cat_id']?></td>
							   <td><?php echo $row['categories']?></td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['cat_id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['cat_id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['cat_id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['cat_id']."'>Delete</a></span>";
								
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

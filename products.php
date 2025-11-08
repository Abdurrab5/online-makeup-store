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
		$update_status_sql="update products set status='$status' where p_id='$id'";
		mysqli_query($link,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($link,$_GET['id']);
		$delete_sql="delete from products where p_id='$id'";
		mysqli_query($link,$delete_sql);
	}
}

$sql="select products.*,categories.categories from products,categories where products.categories_id=categories.cat_id order by products.p_id desc";
$res=mysqli_query($link,$sql);
?>

	<div class="order">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products </h4>
				   <h4 class="box-link"><a href="manage_products.php">Add Product</a> </h4>
				</div>
				<div class="card-body--">
				     <div class="table-stats order-table ">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Categories</th>
							    <th>Name</th>
							   <th>Image</th>
							   <th>Title</th>
							   <th>Price</th>
							   <th>Qty</th>
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
							   <td><?php echo $row['p_id']?></td>
							   <td><?php echo $row['categories']?></td>
							    <td><?php echo $row['p_name']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td><?php echo $row['price']?></td>
							   <td><?php echo $row['title']?></td>
							   <td><?php echo $row['qty']?></td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['p_id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['p_id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_products.php?id=".$row['p_id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['p_id']."'>Delete</a></span>";
								
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

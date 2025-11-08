 <?php
require('head.php');
session_start();

$uid=$_SESSION['cusid'];

	if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($link,$_GET["id"]);
	
		$qty=get_safe_value($link,$_POST["qty"]);
	echo $qty;
	echo $id;
$update_sql="update cart set qty='$qty' where p_id='$id' and username='$uid'";
		mysqli_query($link,$update_sql);
			echo('<script>alert(" Customer Deleted Successfull");</script>');
			header('location:cart1.php');
				}
	
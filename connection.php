<?php
//connectoin with db
$db="makeup";
$link= mysqli_connect("localhost", "root", "", $db);
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/makeup/');
define('SITE_PATH','http://127.0.0.1/makeup/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'products/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'products/');
if(!$link){
	die(mysqli_error($link).mysqli_errno($link));
}
?>
<?php
require('head.php');

?> <a href="customerPanel.php" class="btn btn-primary">Home</a>
	 <?php
	if(isset($_GET['pid']) && $_GET['pid']!=''){
	$cat_id=mysqli_real_escape_string($link,$_GET['pid']);
	
}else{
	?>
	<script>
	window.location.href='customerPanel.php';
	</script>
	<?php
}										
?>

<div class="container">
<div>
<div class="body__overlay"></div>
        
    
       
            <div class="container">
                <div class="row">
					
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                          
                          
                            <div class="row">
                               
                                  
                                        <?php
										$get_product=mysqli_query($link,"select * from categories,products where  cat_id='$cat_id' and products.categories_id='$cat_id'");
		foreach($get_product as $list){
										
							?>
                           <div class="col-md-12">
                            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:20px;" align="center">
                               
                                  <a href="addtocart.php?id=<?php echo $list['p_id']?>">
       <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                             </a>           
                                   
                                    
                                  
                                       
                                            <h4 class="text-info"><?php echo $list['title']?></h4 >
                                            <h4 class="btn btn-danger">price#<?php echo $list['price']?></h4 >
											
                                        </div>
                            </div>
										<?php } ?>
                                    </div>
							   </div>
                            </div>
                        </div>
                   </div></div>
<?php
require_once "header.php";

?>
<html>
<head>
</head>
<body>



<h1>Admin Panel</h1>
<section class="">
            <div class="container">
							<?php
							$res=mysqli_query($link,"select * from products where status=1");
							while($row=mysqli_fetch_assoc($res)){
							?>
                            <div class="col-md-12">
                            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:20px;" align="center">
                               
                                  <a href="">
       <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="product images">
                             </a>           
                                   
                                    
                                  
                                       
                                            <h4 class="text-info"><?php echo $row['title']?></h4 >
                                            <h4 class="btn btn-danger">price#<?php echo $row['price']?></h4 >
											
                                        </div>
                            </div>
							<?php } ?>
                        </div>
        </section>		


</body>
</html>
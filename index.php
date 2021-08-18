<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chocolate.lk</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="user-area/Login.php" class="btn btn-success btn-sm">Welcome</a>
               <a href="user-area/Login.php">We are warmly welcome to our site. </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="user-area/Login.php">User Login</a>
                   </li>
                   <li>
                       <a href="user-area/Login.php">Go To Cart</a>
                   </li>
                   <li>
                   <a href="admin_area/login.php">Admin Login</a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="user-area/Login.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/choco.png" alt="Chocolate Logo Logo" class="hidden-xs" height="45px" width="150px" style="border-radius: 5px;">
                   <img src="images/choco.png" alt="Chocolate Logo Mobile" class="visible-xs" height="45px" width="150px" style="border-radius: 5px;">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation" width="20px" height="30px">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li class="active">
                           <a href="index.php">Home</a>
                       </li>
                       <li>
                           <a href="user-area/Login.php">My Account</a>
                       </li>
                       <li>
                           <a href="user-area/Login.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="#footer">Contact Us</a>
                       </li>
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->
   
   <div class="container" id="slider"><!-- container Begin -->
       
       <div class="col-md-12"><!-- col-md-12 Begin -->
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol><!-- carousel-indicators Finish -->
               
               <div class="carousel-inner"><!-- carousel-inner Begin -->
                   
                   <div class="item active">
                       
                       <img src="images/slide-1.jpg" alt="Slider Image 1">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="images/slide-2.jpg" alt="Slider Image 2">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="images/slide-3.jpg" alt="Slider Image 3">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="images/slide-4.jpg" alt="Slider Image 4">
                       
                   </div>
                   
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
   </div><!-- container Finish -->

<!-- ------------------------------------------------------------------------------------------------------- -->
    <div id="hot"><!-- #hot Begin -->
       
       <div class="box"><!-- box Begin -->
           
           <div class="container"><!-- container Begin -->
               
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   
                   <h2>
                       Our Categories
                   </h2>
                   
               </div><!-- col-md-12 Finish -->
               
           </div><!-- container Finish -->
           
       </div><!-- box Finish -->
       
   </div><!-- #hot Finish -->

   <!-- ----------------------------------------------------------->

      <!-- CAtegories Section Starts Here -->
      <section class="categories">
        <div class="container_cat">
            <?php 
               $sql = "SELECT * FROM category_table LIMIT 6";

               $res = mysqli_query($conn,$sql);

               if($res==TRUE){
                   $count = mysqli_num_rows($res);

                   if($count>0){
                       $sn = 1;
                       while($rows=mysqli_fetch_assoc($res)){
                           $category_id = $rows['category_id'];
                           $category_name = $rows['category_name'];
                           $image_name = $rows['image_name'];
                           $category_description = $rows['description'];
                        ?>
                        
                        <a href="user-area/Login.php">
                        <div class="box-3 float-container">
                            <?php 
                                //check whether image is available or not
                                if($image_name==""){
                                    //Display message
                                    echo "<div class='error'>Image not Available.</div>";
                                } else {
                                    //Image available
                                    ?>

                                        <img src="admin_area/images/category/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                    
                                    <?php
                                }
                            ?>

                            <div class="float-text">
                                <h2 class="text-white"><?php echo $category_name; ?></h2>
                            </div>
                        </div>
                        </a>
                        
                        <?php
                       }}
                } else {
                    //no categories in database
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section> <!-- Categories Section Ends Here -->

   <!-- ------------------------------------------------------ -->
   <div id="advantages"><!-- #advantages Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="same-height-row"><!-- same-height-row Begin -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-heart"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="user-area/Login.php">Best Offer</a></h3>
                       
                       <p>Take 15% off your fisrt purchase.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-clock-o"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="user-area/Login.php">Opening hours</a></h3>
                       
                       <p>Call support  9am - 5pm.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-thumbs-up"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="user-area/Login.php">100% Original</a></h3>
                       
                       <p>100% original cocoa products here.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
           </div><!-- same-height-row Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- #advantages Finish -->
   <!-- ------------------------------------------------------------------ -->

   <div id="hot"><!-- #hot Begin -->
       
       <div class="box"><!-- box Begin -->
           
           <div class="container"><!-- container Begin -->
               
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   
                   <h2>
                       Our Latest Products
                   </h2>
                   
               </div><!-- col-md-12 Finish -->
               
           </div><!-- container Finish -->
           
       </div><!-- box Finish -->
       
   </div><!-- #hot Finish -->

   <div id="content" class="container"><!-- container Begin -->
       
       <div class="row"><!-- row Begin -->

       <?php 
            $sql = "SELECT * FROM item_table LIMIT 8 ";

            $res = mysqli_query($conn,$sql);

            if($res==TRUE){
                $count = mysqli_num_rows($res);

                if($count>0){
                    $sn=1;
                    while($rows = mysqli_fetch_assoc($res)){
                        $item_id = $rows['item_id'];
                        $item_name = $rows['item_name'];
                        $image_name = $rows['image_name'];
                        $price= $rows['price'];
                        ?>
           <div class="col-sm-4 col-sm-6 single"><!-- col-sm-4 col-sm-6 single Begin -->
               
               <div class="product"><!-- product Begin -->
                   
                   <a href="user-area/Login.php">
                       
                       <img class="img-responsive" src="admin_area/images/item/<?php echo $image_name; ?>" alt="Product 1">
                       
                   </a>
                   
                   <div class="text"><!-- text Begin -->
                       
                       <h3>
                           <a href="user-area/Login.php">
                           <?php echo $item_name; ?>
                           </a>
                       </h3>
                       
                       <p class="price">Rs <?php echo $price; ?> LKR*</p>
                       
                       <p class="button">
                           
                           <a href="user-area/Login.php" class="btn btn-default">View Details</a>
                           
                           <a href="user-area/Login.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div><!-- text Finish -->
                   
               </div><!-- product Finish -->
               
           </div><!-- col-sm-4 col-sm-6 single Finish -->

           <?php }}} ?>         

   </div><!--container Finish-->

</div><!-- row Finish -->
<?php 

    include("includes/footer.php");

?>   
<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script> 
</body>
</html>
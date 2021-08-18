<?php 
    if(isset($_SESSION['add-to-cart'])){
        echo $_SESSION['add-to-cart'];
        unset($_SESSION['add-to-cart']);
    }
    if(isset($_SESSION['not_found'])){
        echo $_SESSION['not_found'];
        unset($_SESSION['not_found']);
    }
    if(isset($_SESSION['purchase'])){
        echo $_SESSION['purchase'];
        unset($_SESSION['purchase']);
    }
    ?>
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="../index.php" class="btn btn-success btn-sm">Welcome</a>
               <?php 
                if(isset($_SESSION['id'])){
                    $id = $_SESSION['id'];
                    $date = date("Y-m-d");

                    $sql1 = "SELECT * FROM cart_table WHERE user_id=$id AND cart_date='$date'";
                    $res1= mysqli_query($conn,$sql1);
                    $item_count1 = mysqli_num_rows($res1);

                    $sql4 = "SELECT SUM(price) AS Total FROM cart_table WHERE user_id=$id AND cart_date='$date'";
                    $res4 = mysqli_query($conn,$sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    $total_revenue4 = $row4['Total'];
                }
                ?>
               <a href="#"><?php echo $item_count1; ?> Items In Your Cart | Total Price: Rs <?php echo $total_revenue4; ?> LKR </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   <li>
                   <?php 
                if(isset($_SESSION['id'])){
                    $id = $_SESSION['id'];
                        
                    $sql = "SELECT * FROM user_table WHERE user_id=$id";

                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);

                    if($count==1){
                        $row = mysqli_fetch_assoc($res);
                        $first_name=$row['first_name'];
                        $email=$row['email'];
                        $image_name = $row['image_name'];
                        if($image_name == ""){
                            ?>
                            <a href="updateuser.php?id=<?php echo $id; ?>"><img src="https://i.imgur.com/cMy8V5j.png"  alt="" class="profilepic"></a>
                            <?php
                        } else {
                            ?>
                              <a href="updateuser.php?id=<?php echo $id; ?>"><img src="../admin_area/images/user/<?php echo $image_name; ?>"  alt="" class="profilepic"></a>
                            <?php
                        }
                        ?>
                <span class="user_name"><?php echo $first_name; ?></span>
                <?php 
                        }
                    }
                ?>
                   </li>
                   <li>
                       <a href="cart.php">Go To Cart</a>
                   </li>
                   <li>
                   <a href="logout.php">Log Out</a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="../images/choco.png" alt="Chocolate Logo Logo" class="hidden-xs" height="45px" width="150px" style="border-radius: 5px;">
                   <img src="../images/choco.png" alt="Chocolate Logo Mobile" class="visible-xs" height="45px" width="150px" style="border-radius: 5px;">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
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
                       <a href="updateuser.php?id=<?php echo $id; ?>">My Account</a>
                       </li>
                       <li>
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="#footer">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="#" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php echo $item_count1; ?> Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
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
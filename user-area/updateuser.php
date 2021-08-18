<?php include('../config/constants.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/userAccount.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Update User</title>
</head>
<body>
    <?php 

        include("includes/navbar.php");

    ?>

    <div class="wrapper">
        <div class="left">
        <?php
            if (isset($_GET['id'])){
                $user_id = $_GET['id'];

                $sql= "SELECT * FROM user_table WHERE user_id=$user_id ";
                $result=mysqli_query($conn,$sql);

                $count = mysqli_num_rows($result);
                    if($count==1){
                        $rows = mysqli_fetch_assoc($result);
                            $id= $rows['user_id'];
                            $first_name =$rows['first_name'];
                            $last_name = $rows['last_name'];
                            $email = $rows['email'];
                            $image_name = $rows['image_name'];
                            $address = $rows['address'];
                            $contact_number = $rows['contact_number'];
                        
                            if($image_name == ""){
                            ?>
                            <img src="https://i.imgur.com/cMy8V5j.png" width="150">
                            <?php
                            } else {
                            ?>
                            <img src="../admin_area/images/user/<?php echo $image_name; ?>" width="150">
                            <?php
                            }
        ?>

        <h1><?php echo $first_name.' '.$last_name; ?></h1>
        <br><br>
        <div class="social_media">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
         
      </div>
    </div>
    <div class="right">
        <div class="info">
            <h3>Account Details</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>First Name</h4>
                   <p><?php echo $first_name; ?></p>
                 </div>
                 <div class="data">
                    <h4>Last Name</h4>
                   <p><?php echo $last_name; ?></p>
                 </div>
            </div>
            <br> <br>
            <div class="info_data">
                 <div class="data">
                    <h4>Email Address</h4>
                    <p><?php echo $email;?></p>
                 </div>
                 <div class="data">
                 <h4>Contact Number</h4>
                    <p><?php echo $contact_number;?></p>
              </div>
            </div>
            <br><br>
            <div class="info_data">
                 <div class="data">
                    <h4>Address</h4>
                    <p><?php echo $address;?></p>
                 </div>
            </div>
        </div>
      
      
        <div class="social">
            <ul>
              <li><a href="<?php echo SITEURL;?>user-area/change_password.php?user_id=<?php echo $id; ?>" class="primary-button">Change Password</a></li>
              <li><a href="<?php echo SITEURL;?>user-area/change-details.php?user_id=<?php echo $id; ?>" class="update-button">Update User Details</a></li>
              <li><a href="<?php echo SITEURL;?>user-area/deleteuser.php?user_id=<?php echo $id; ?>" class="delete-button">Delete Account</a></li>
          </ul>
      </div>
    </div>
</div>
          
                <?php


                        
                    }
                    else{

                    }
                }
                else{
                    header('location:'.SITEURL.'user-area/updateuser.php ? <?php echo $id; ?>');
                }
                
                ?>


<?php
include "includes/footer.php";
?>
</body>
</html> 
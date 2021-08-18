
<?php include('../config/constants.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" href="css/changepassword.css">
    <title>Update User</title>
</head>
<body>
    <?php 

        include("includes/navbar.php");

    ?>
    <section>
        <main>
            
                <div>
                   <center> <h2>Update Account Details</h2>
                    </center>
                </div>

        <?php
            $id = $_GET['user_id'];

            $sql= "SELECT * FROM user_table WHERE user_id=$id";

            $res=mysqli_query($conn,$sql);

            if($res==TRUE){
                $count=mysqli_num_rows($res);
                if($count==1){
                    //echo 'Admin Availabel';
                   $row = mysqli_fetch_assoc($res);

                   $first_name=$row['first_name'];
                   $last_name=$row['last_name'];
                   $email=$row['email'];
                   $address=$row['address'];
                   $contact_number=$row['contact_number'];
                   $current_image = $row['image_name'];
                }
                else{
                    header('location:'.SITEURL.'user-area/updateuser.php');
                }

            }
            
            ?>

        <div class="form-body">
                <div class="container1">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="fname" value="<?php echo $first_name;?>" required>
                                <div class="underline"></div>
                                <label>First Name</label>
                            </div>
                            <div class="input-data">
                                <input type="text" name="lname" value="<?php echo $last_name;?>" required>
                                <div class="underline"></div>
                                <label>Last Name</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="email" value="<?php echo $email;?>" required>
                                <div class="underline"></div>
                                <label>Email Adress</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="address" value="<?php echo $address;?>" required>
                                <div class="underline"></div>
                                <label>Address</label>
                            </div>
                        </div>
                        <form action="" method="POST">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="text" name="contact" value="<?php echo $contact_number;?>" required>
                                <div class="underline"></div>
                                <label>Contact Number</label>
                            </div>
                            <div class="input-data">
                                
                                <input type="file" name="image">
                                <div class="underline"></div>
                                
                            </div>
                        </div>
                        <div class="form-row submit-btn">
                            <div class="input-data">
                                <div class="inner"></div>
                                <input type="hidden" name="user_id" value="<?php echo $id;?>">
                                <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                                <input type="submit" name="submit" value="Change" class="">
                            </div>
                        </div>
                        
                    </form>
                    <?php
    if(isset($_POST['submit'])){
       // echo 'Button Clicked';

        $id =$_POST['user_id'];
        $first_name =$_POST['fname'];
        $last_name =$_POST['lname'];
        $email =$_POST['email'];
        $address =$_POST['address'];
        $contact_number =$_POST['contact'];
        $current_image = $_POST['current_image'];

        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];

            if($image_name != ""){
                $ext = end(explode('.',$image_name));
                $image_name = "User_Img_".rand(000,999).'.'.$ext;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../admin_area/images/user/".$image_name;
                $upload = move_uploaded_file($source_path,$destination_path);
                if($upload==false){
                    $_SESSION['upload'] = "<div class='Failed-to-do'>Failed to Upload Image.</div>";
                    header('location:'.SITEURL.'index.php');
                    die();
                }

                if($current_image != ""){
                    $remove_path="../admin_area/images/user/".$current_image;

                    $remove = unlink($remove_path);

                    if($remove==false){
                        $_SESSION['file-remove'] = "<div class='Failed-to-do'>Failed to Remove Current Image.</div>";
                       header('location:'.SITEURL.'user-area/updateuser.php');
                        die();
                    }
                }
            } else {
                $image_name= $current_image;
            }
        } else {
            $image_name = $current_image;
        }

       $sql="UPDATE user_table SET first_name='$first_name',last_name='$last_name',email='$email',address='$address',contact_number='$contact_number', image_name='$image_name' WHERE user_id = $id";

        $res=mysqli_query($conn,$sql);

        if($res==TRUE){
            $_SESSION['update']="<div class='success'>Admin Updated Successfully.</div>";
            header('location:'.SITEURL.'user-area/updateuser.php?id= '.$id);
           
        }
        else{
            $_SESSION['update']="<div class='error'>Admin Updated Unsuccessfully.</div>";
            header('location:'.SITEURL.'user-area/updateuser.php');
        }

    }
?>
                </div>
            </div>

        </main>

    </section>
    <?php
    include "includes/footer.php";
    ?>
</body>
</html> 
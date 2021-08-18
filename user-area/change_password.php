
<?php include('../config/constants.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" href="css/changepassword.css">
</head>
<body>
    <?php 

        include("includes/navbar.php");

    ?>
        
    <section>
        <main>
            
                <div>
                   <center> <h2>Change Password</h2>
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
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="input-data">
                                <input type="password" name="current_password" required>
                                <div class="underline"></div>
                                <label>Current Password</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-data">
                                <input type="password" name="new_password" required>
                                <div class="underline"></div>
                                <label>New Password</label>
                            </div>
                            <div class="input-data">
                                <input type="password" name="confirm_password" required>
                                <div class="underline"></div>
                                <label>Confirm Password</label>
                            </div>
                        </div>
                        <div class="form-row submit-btn">
                            <div class="input-data">
                                <div class="inner"></div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="submit" value="submit">
                            </div>
                        </div>
                    </form>
                    <?php 
                        if(isset($_POST['submit'])){
                            $id = $_POST['id'];
                            $current_password = md5($_POST['current_password']);
                            $new_password = md5($_POST['new_password']);
                            $confirm_password = md5($_POST['confirm_password']);

                            $sql = "SELECT * FROM user_table WHERE user_id=$id AND password='$current_password'";
                            $res = mysqli_query($conn,$sql);

                            if($res == true){
                                $count = mysqli_num_rows($res);
                                if($count==1){
                                    if($new_password == $confirm_password){
                                        $sql2 = "UPDATE user_table SET password='$new_password' WHERE user_id=$id";
                                        $res2 = mysqli_query($conn,$sql2);
                                        if($res2==true){
                                            $_SESSION['change_pwd'] = "<div class='successfuly-done'>Password Changed Successfully.</div>";
                                            header('location:'.SITEURL.'user-area/Login.php');
                                        } else {
                                            $_SESSION['change_pwd'] = "<div class='Failed-to-do'>Failed to Change Password.</div>";
                                            header('location:'.SITEURL.'user-area/change_password.php');
                                        }
                                    } else {
                                        $_SESSION['pwd_not_match'] = "<div class='Failed-to-do'>Password Did not Match.</div>";
                                        header('location:'.SITEURL.'user-area/change_password.php');
                                    }
                                } else {
                                    $_SESSION['user_not_found'] = "<div class='Failed-to-do'>Admin Not Found.</div>";
                                    header('location:'.SITEURL.'user-area/updateuser.php');
                                }
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
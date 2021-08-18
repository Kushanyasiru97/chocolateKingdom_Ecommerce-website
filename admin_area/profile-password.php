<?php include('partials/header.php'); ?>
    <!-- Start Side Bar -->
    <?php include('partials/sidebar.php'); ?>
        <!--  Navbar Ends -->

        <main>
            <div class="page-header">
                <div>
                    <h1>Change Password</h1>
                    <small>Add new strong password.</small>
                </div>
            </div>

            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
            ?>

            <div class="form-body">
                <div class="container">
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
                            $admin_id = $_POST['id'];
                            $current_password = md5($_POST['current_password']);
                            $new_password = md5($_POST['new_password']);
                            $confirm_password = md5($_POST['confirm_password']);

                            $sql = "SELECT * FROM admin_table WHERE admin_id=$admin_id AND password='$current_password'";
                            $res = mysqli_query($conn,$sql);

                            if($res == true){
                                $count = mysqli_num_rows($res);
                                if($count==1){
                                    if($new_password == $confirm_password){
                                        $sql2 = "UPDATE admin_table SET password='$new_password' WHERE admin_id=$admin_id";
                                        $res2 = mysqli_query($conn,$sql2);
                                        if($res2==true){
                                            $_SESSION['change_pwd'] = "<div class='successfuly-done'>Password Changed Successfully.</div>";
                                            header('location:'.SITEURL.'admin_area/profile.php');
                                        } else {
                                            $_SESSION['change_pwd'] = "<div class='Failed-to-do'>Failed to Change Password.</div>";
                                            header('location:'.SITEURL.'admin_area/profile.php');
                                        }
                                    } else {
                                        $_SESSION['pwd_not_match'] = "<div class='Failed-to-do'>Password Did not Match.</div>";
                                        header('location:'.SITEURL.'admin_area/profile.php');
                                    }
                                } else {
                                    $_SESSION['user_not_found'] = "<div class='Failed-to-do'>Admin Not Found.</div>";
                                    header('location:'.SITEURL.'admin_area/profile.php');
                                }
                            }
                        }
                    
                    ?>
                </div>
            </div>

        </main>

    </section>

    <?php include('partials/footer.php'); ?>
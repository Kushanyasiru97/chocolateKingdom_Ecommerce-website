<?php
include('../config/constants.php'); 


    $id =$_GET['user_id'];

    $sql = "DELETE FROM user_table WHERE user_id='$id' ";

    $res= mysqli_query($conn,$sql);

    if($res==TRUE){
        //echo "Admin Deleted";
        $_SESSION['delete'] = '<div class"success">User Delete succcesfully.</div>';
        header('location:'.SITEURL.'index.php');

    }
    else{
        //Echo "Admin Delete Failed";
        $_SESSION['delete'] = '<div class"error">User Delete Unsucccesfully.</div>';
        header('location:'.SITEURL.'user-area/updateuser.php');
    }
?>
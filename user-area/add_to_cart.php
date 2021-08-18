<?php 
    include('../config/constants.php'); 

    if(isset($_GET['user_id']) && isset($_GET['item_id'])){
        $user_id = $_GET['user_id'];
        $item_id = $_GET['item_id'];
        $qty = 1;
        $cart_date = date("Y-m-d");

        $sql2 = "SELECT * FROM item_table WHERE item_id=$item_id";
        $res2 = mysqli_query($conn,$sql2);
        $count2 = mysqli_num_rows($res2);
        if($count2>0){
            while($row2=mysqli_fetch_assoc($res2)){
                $price = $row2['price'];
            }
        }

        $sql = "INSERT INTO cart_table SET
            user_id = '$user_id',
            item_id = '$item_id',
            qty = '$qty',
            cart_date = '$cart_date',
            price = '$price'
        ";

        $res = mysqli_query($conn,$sql);

        if($res == true){
            $_SESSION['add-to-cart'] = "<script>alert('Successfully Item Added to the cart.');</script>";
            header('location:'.SITEURL.'user-area/index.php');
        } else {
            $_SESSION['add-to-cart'] = "<script>alert('Failed Item Added to the cart.');</script>";
            header('location:'.SITEURL.'user-area/user_index.php');
        }

    } else {
        $_SESSION['not_found'] = "<script>alert('Not Found.');</script>";
        header('location:'.SITEURL.'user-area/user_index.php');
    }

?>
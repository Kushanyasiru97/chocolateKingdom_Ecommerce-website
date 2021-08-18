<?php include('../config/constants.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="css/cart-And-Purchasse-style.css">
</head>
<body>

<?php include('includes/navbar.php'); ?>
<div class="cart-item">
<table>
        <?php
        //print_r($_SESSION); //(This is used for development purpose. It is not wanted for web)
        if(isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
            $cart_date = date("Y-m-d");

            $sql = "SELECT * FROM cart_table WHERE user_id=$user_id AND cart_date = '$cart_date'";

            if ($result = mysqli_query($conn, $sql)) { ?>
                <?php
                $count = mysqli_num_rows($result);
                if ($count>0){
                    while ($row = mysqli_fetch_array($result)) {
                        $qty = $row['qty'];
                        $item_id = $row['item_id'];
                        $cart_id = $row['cart_id'];

                        //print_r($_SESSION); //(This is used for development purpose. It is not wanted for web)
                        $sql = "SELECT * FROM item_table WHERE item_id=$item_id";
                        $res = mysqli_query($conn, $sql);
                        $rowItem = mysqli_fetch_array($res);
                        ?>
                        <tr>
                        <form method="post" action = "<?php echo SITEURL; ?>user-area/purchase.php?id=<?php echo $item_id; ?>&&user_id=<?php echo $user_id; ?>" id="cartForm" class="d-flex justify-content-start">
                            <td>
                                <img class="img-view" src="../admin_area/images/item/<?php echo $rowItem['image_name']; ?>"></img>
                            </td>
                            <td style="padding: 50px">
                                <input type="hidden" name="itemImage" value="<?php echo $rowItem['image_name']; ?>">
                                <h4 style="color: #000000; width: 100%" ><?php echo $rowItem['description'];?></h4>
                                <ul style="list-style: none">
                                    <li style="width: 300px;">
                                        <h6><?php echo $rowItem['item_name']; ?></h6>
                                        <input type="hidden" name="itemName" value="<?php echo $rowItem['item_name']; ?>">
                                    </li>
                                    <li style="display: flex;">
                                        <h6 style="padding-right: 10px">Unit price - </h6>
                                        <h6>LKR <?php echo $rowItem['price']; ?></h6>
                                        <input type="hidden" name="itemPrice" value="<?php echo $rowItem['price']; ?>">
                                    </li>
                                    <li style="display: flex">
                                        <h6 style="padding-right: 10px">Quantities</h6>
                                        <h6><?php echo $qty; ?></h6>
                                        <input type="hidden" name="qty" value="<?php echo $qty; ?>">
                                    </li>
                                    <li style="display: flex">
                                        <h6 style="padding-right: 10px">Sub total</h6>
                                        <?php //sub total calculation
                                        $subTotal = $rowItem['price'] * $qty;
                                        ?>
                                        <h6>LKR <?php echo sprintf("%.2f", $subTotal); ?></h6>
                                    </li>
                                    <li style="display: flex;">
                                        <?php //discount calculation (not complete yet)
                                        $discountRate= 0;
                                        $discount = $subTotal * ($discountRate / 100);
                                        ?>
                                        <h6 style="padding-right: 10px">Discount <?php echo '('.$discountRate.'%)';?></h6>
                                        <h6>LKR <?php echo sprintf("%.2f", $discount); ?></h6>
                                    </li>
                                    <li style="display: flex">
                                        <h5 style="padding-right: 10px">Net total</h5>
                                        <h5>LKR <?php echo sprintf( "%.2f", ($subTotal - $discount) ); ?></h5>
                                        <?php $total_price = $subTotal - $discount ?>
                                        <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                                        <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
                                        <input type="hidden" name="userID" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="itemID" value="<?php echo $item_id; ?>">
                                        <input type="hidden" name="cart_id" value="<?php echo $cart_id; ?>">
                                    </li >
                                    <li style="padding-bottom: 10px">
                                        <button type="submit" class="button" name="buyNow" >Buy Now</button>
                                </form>
                                    </li>

                                    <li>
                                        <form method="post">
                                            <input type="hidden" name="cartID" value="<?php echo $cart_id; ?>">
                                            <button type="submit" class="button" name="removeCart" style="background-color: #fb2525">remove to cart</button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        
                    <?php }
                    mysqli_free_result($result);
            }
            else { ?>
                <h1 class="center no-cart"> Your cart is empty..! </h1>
                <hr size="10px">
        <?php }}}?>
</table>
</div>

<?php include('includes/footer.php'); ?>

</body>
</html>

<?php
if(isset($_POST['removeCart'])){
    $cart_id = $_POST['cartID'];

    $sql1 = "DELETE FROM cart_table WHERE cart_id = '$cart_id'";

    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());

    header('location:'.SITEURL.'user-area/cart.php');

}

mysqli_close($conn);
?>

<?php include('../config/constants.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase</title>
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="css/cart-And-Purchasse-style.css">
    <script src="../js/purchase.js"></script>
</head>
<body>
<?php include('includes/navbar.php'); ?>
<?php
// print_r($_SESSION); (This is used for development purpose. It is not wanted for web)

if(isset($_SESSION['item_id'])) {
$item_id = $_SESSION['item_id'];
$sql = "SELECT * FROM item_table WHERE item_id=$item_id";

$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);
$qty = $_POST['qty'];
$cart_id= $_POST['cart_id'];
$order_date = $_POST['date'];
$item_image_name = $_POST['itemImage'];
$item_price = $_POST['itemPrice'];
$item_name = $_POST['itemName'];
?>
<div class="perchase-item">
<form method="post" id="payForm" style="padding-top: 5rem; margin-bottom: 5rem; background-color: #fff; padding-bottom: 30px; border-radius: 20px;">
    <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
    <table>
        <tr>
            <td>
                <ul>
                    <li style="display: flex">
                        <img class="img-view-p" src="../admin_area/images/item/<?php echo $item_image_name; ?>"></img>
                        <h6 style="width: 90px"><?php echo $item_name; ?></h6>
                    </li>
                    <li style="display: flex">
                        <h6>Unit price - </h6>
                        <h6 style="padding-left: 10px">LKR <?php echo $item_price; ?></h6>
                    </li>
                    <li style="display: flex">
                        <h6>Quantities - </h6>
                        <h6 style="padding-left: 10px"><?php echo $qty; ?></h6>
                        <input type="hidden" name="qty" value="<?php echo $qty; ?>">
                    </li>
                    <li style="display: flex">
                        <h6>Sub total - </h6>
                        <?php //sub total calculation
                        $subTotal = $item_price * $_POST['qty'];
                        ?>
                        <h6 style="padding-left: 10px">LKR <?php echo sprintf("%.2f", $subTotal); ?></h6>
                    </li>
                    <li style="display: flex">
                        <?php //discount calculation (not complete yet)
                        $discountRate= 0;
                        $discount = $subTotal * ($discountRate / 100);
                        ?>
                        <h6>Discount - <?php echo '('.$discountRate.'%)';?></h6>
                        <h6 style="padding-left: 10px">LKR <?php echo sprintf("%.2f", $discount); ?></h6>
                    </li>
                    <li style="background-color: #2ed573; color: #ffffff; padding: 5px; display:flex;">
                        <h5>Net total - </h5>
                        <h5 style="padding-left: 10px">LKR <?php echo sprintf( "%.2f", ($subTotal - $discount) ); ?></h5>
                        <?php $total_price = $subTotal - $discount ?>
                        <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                    </li>
                </ul>
                <?php } ?> <!-- 'if' block end -->
            </td>
            <td style="padding-left: 50px">
                <?php
                //print_r($_SESSION); (This is used for development purpose. It is not wanted for web)
                if(isset($_SESSION['id'])) {
                $id = $_SESSION['id'];

                $sql = "SELECT * FROM user_table WHERE user_id=$id";

                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($res);

                $customer_name = $row['first_name'].' '.$row['last_name'];
                $customer_address = $row['address'];
                $customer_contact = $row['contact_number'];
                ?>

                    <h4>Delivery details</h4>
                    <div style="padding-bottom: 20px; display: flex;">
                        <h6 style="width: 125px">Buyer name</h6>
                        <input type="text" style="width: 80%" class="form-control" id="buyerName" name="buyerName" value="<?php echo $row['first_name'].' '.$row['last_name']; ?>">
                    </div>
                    <div style="padding-bottom: 10px; display: flex">
                        <h6 class="form-label align-self-center" style="width: 125px">Delivery address</h6>
                        <input type="text" style="width: 500px" class="form-control" id="addressL1" name="address" value="<?php echo $row['address']; ?>">
                    </div>
                    <div style="display: flex">
                        <h6 class="form-label align-self-center" style="width: 105px">Phone</h6>
                        <input type="text" size="10" style="width: 25%" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $row['contact_number']; ?>">
                    </div>
                    <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="cart_id" value="<?php echo $cart_id; ?>">

                    <!-- buttons for select payment method -->
                    <div>
                        <h4>Select payment option</h4>
                        <div style="display: flex">
                            <div style="padding: 10px">
                                <input type="button" style="border-style: none;" id="ppal" name="payOption" value="PAY-PAL" onclick="show(1,0)" class="btn btn-primary">
                            </div>
                            <div style="padding: 10px">
                                <input type="button" style="border-style: none;" id="bcard" name="payOption" value="BankCard" onclick="show(0,1)" class="btn btn-primary">
                            </div>
                        </div>
                    </div>

                <?php } ?> <!-- 'if' block close -->
                <!-- Delivery details section end -->
            </td>
            <td>
                <!-- delivery details form -->




                <div style="width: 320px;">
                    <div style="padding: 10px;"> <!-- Payment options and forms -->
                        <!-- pay-pal payment -->
                        <ul>
                            <li class="list-group-item" id="paypalpayment" style="display: none; background-color: #efefef;">
                                <input type="hidden" class="form-control" name="bank" value="no">
                                <input type="hidden" class="form-control" name="payPal" value="yes">
                                <div class="mb-3" >
                                    <h6 class="form-label">Insert valid pay-pal e-mail</h6>
                                    <input name="paypalemail" type="email" class="form-control" id="card" style="width: 100%;">
                                </div>
                                <div class="center">
                                    <button type="submit" class="button" name="checkout" onclick="actionLink('checkout')">Checkout</button>
                                </div>
                                <div class="center">
                                    <button type="submit" class="button" name="cancel" onclick="actionLink('cancel')" >Cancel</button>
                                </div>
                            </li>
                        </ul>


                        <!-- bank card payment -->
                        <ul class="list-group list-group-flush" >
                            <li class="list-group-item" id="bcardpayment" style="display: none; background-color: #efefef;" >
                                <input type="hidden" class="form-control" name="bank" value="yes">
                                <input type="hidden" class="form-control" name="payPal" value="no">
                                <div class="mb-3">
                                    <h6 class="form-label">Card Holder Full Name</h6>
                                    <input name="cardholder" type="text" class="form-control" id="card" style="width: 100%;">
                                </div>
                                <div class="mb-3">
                                    <h6 class="form-label">Card number</h6>
                                    <input name="cardnumber" type="text" class="form-control" id="card" style="width: 100%;">
                                </div>
                                <div style="display:flex;">
                                    <div style="display:flex;">
                                        <div class="mb-3" style="padding-right: 10px; width: 70px;">
                                            <h6 class="form-label">Month</h6>
                                            <input name="month" type="text" class="form-control" id="card">
                                        </div>
                                        <div class="mb-3" style="padding-right: 10px; width: 70px;">
                                            <h6 class="form-label">Year</h6>
                                            <input name="year" type="text" class="form-control" id="card">
                                        </div>
                                    </div>
                                    <div class="mb-3" style="width: 70px;">
                                        <h6 class="form-label">CVV</h6>
                                        <input name="cvv" type="text" class="form-control" id="card">
                                    </div>
                                </div>
                                <div class="center">
                                    <button type="submit" class="button" name="checkout">Checkout</button>
                                </div>
                                <div class="center">
                                    <button type="submit" class="button" name="cancel">Cancel</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</form>
                </div>

<?php include('includes/footer.php'); ?>

</body>
</html>

<?php
if(isset($_POST['cancel'])){
    header('location:'.SITEURL.'user-area/index.php');
}

if(isset($_POST['checkout'])){
    // collect value of input field
    $item_id = $_POST['item_id'];
    $qty = $_POST['qty'];
    $total_price = $_POST['total_price'];
    $order_date = $_POST['date'];
    $customer_name = $_POST['buyerName'];
    $customer_address = $_POST['address'];
    $customer_contact = $_POST['phoneNumber'];
    $user_id = $_POST['user_id'];
    $cart_id = $_POST['cart_id'];



    $sql1 = "INSERT INTO order_table (item_id,qty,total_price,order_date,customer_name,customer_address,customer_contact,status,user_id)
    VALUES ('".$item_id."', '".$qty."', '".$total_price."', '".$order_date."','".$customer_name."','".$customer_address."','".$customer_contact."','Ordered','".$user_id."')";


    $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());

    if($cart_id=='0'){

    }
    else{
        $sql2 = "DELETE FROM cart_table WHERE cart_id = '$cart_id'";
        $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
    }


    $_SESSION['purchase'] = "<script>alert('Your purchase successful..!');</script>";
    header('location:'.SITEURL.'user-area/index.php');

}

mysqli_close($conn);
?>
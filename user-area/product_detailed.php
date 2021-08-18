<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title> Selected item page </title>
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/style.css">
	<link rel="stylesheet" type="text/css" href="css/product_details_style.css"> 
</head>
<body>
   
<?php include('includes/navbar.php'); ?>

<?php 
    if(isset($_GET['id']) && isset($_GET['user_id'])){
        $item_id = $_GET['id'];
        $user_id = $_GET['user_id'];
        $_SESSION['item_id'] = $item_id;
        //print_r($_SESSION);
    } else {
        header('location:'.SITEURL.'user-area/index.php');
    }

?>

	<main class="container1">

  <!-- Left column -->
    <div class="left-column">

  <?php 
    $sql = "SELECT * FROM item_table WHERE item_id=$item_id";
    $res= mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        $item_name = $rows['item_name'];
        $item_image_name = $rows['image_name'];
        $price= $rows['price'];
        $description = $rows['description'];
     } else {
        header('location:'.SITEURL.'user-area/index.php');
    }
   
 ?>


      <!-- <div class="small-image"> 
        <img src="../admin_area/admin-dashboard/images/item/<?php echo $item_image_name; ?>" alt="Cadbury Daily Milk" title="Cadbury Daily Milk">
      </div> -->
      <div class="large-image">
        <img src="../admin_area/images/item/<?php echo $item_image_name; ?>">
      </div>
    </div>

  <!-- Right Column -->
    <div class="right-column">

      <!-- Product Description -->
        <div class="product-description">
          <h1> <?php echo $item_name;  ?> </h1>
          <p> <?php echo $description; ?>
			 
          </p>
        </div>

        <!-- Product Procing -->
        <div class="product-price">
          <h2> Rs. <?php echo $price; ?> </h2>
        </div>
        <form id="itemForm" method="POST">
          <div class="area-qty-select1">
            <div class="quantity mt201">
                <p class="title1">Quantity</p>
                    <div class="input-group1">
                        <div class="input-group-btn1">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                            <input type="hidden" name="cart_id" value="<?php echo '0'; ?>">
                            <input type="hidden" name="itemName" value="<?php echo $item_name; ?>">
                            <input type="hidden" name="itemImage" value="<?php echo $item_image_name; ?>">
                            <input type="hidden" name="itemPrice" value="<?php echo $price; ?>">
                            <input type="number" step="1" min="1" max name="qty" value="1" title="Qty" size="2" placeholder inputmode="numeric">
                            <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
              </div>
            </div>

            <script>
                function actionLink(btnName) {
                    if(btnName=='buy'){
                        document.getElementById("itemForm").action = "<?php echo SITEURL; ?>user-area/purchase.php?id=<?php echo $item_id; ?>&&user_id=<?php echo $user_id; ?>"; // should change this is wrong action link
                    }
                }
            </script>

            <input type="submit" name="submit" value="Add to cart" class="cart-btn" style="border-style: none;">
            <input type="submit" name="buyNow" id="buyNowBtn" value="Buy now" class="buy-btn" style="border-style: none;" onclick="actionLink('buy')">
          </form>
          <?php 
            if(isset($_POST['submit'])){
                $user_id = $_POST['user_id'];
                $item_id = $_POST['item_id'];
                $qty = $_POST['qty'];
                $date = $_POST['date'];

                $sql2 = "SELECT * FROM item_table WHERE item_id=$item_id";
                $res2 = mysqli_query($conn,$sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2>0){
                    while($row2=mysqli_fetch_assoc($res2)){
                        $price = $row2['price'];
                    }
                }

                $total_price = $price * $qty;

                $sql1 = "INSERT INTO cart_table SET
                    user_id = '$user_id',
                    item_id = '$item_id',
                    qty = '$qty',
                    cart_date = '$date',
                    price = '$total_price'
                ";
                $res1 = mysqli_query($conn, $sql1) or die(mysqli_error());
                if($res1==true){
                    $_SESSION['add-to-cart'] = "<script>alert('Selected item successfully added to the cart.');</script>";
                    header('location:'.SITEURL.'user-area/index.php');
                } else {
                    $_SESSION['add-to-cart'] = "<script>alert('Failed to add item.');</script>";
                    header('location:'.SITEURL.'user-area/index.php');
                }
              }
        ?>
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>

</div>
<?php include('includes/footer.php'); ?>
</body>
</html>
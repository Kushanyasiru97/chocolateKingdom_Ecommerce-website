<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title> Items page </title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/product_page_style.css">
	<link rel="stylesheet" href="../styles/style.css">
	<link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">	 
</head>
<body>
<?php include('includes/navbar.php'); ?>

<!-- header of the page -->

<?php 
    if(isset($_GET['id']) && isset($_GET['user_id'])){
        $id = $_GET['id'];
        $user_id = $_GET['user_id'];
    } else {
        header('location:'.SITEURL.'user_index.php');
    }

?>
	
<div class="header">

<?php 
    $sql = "SELECT * FROM category_table WHERE category_id=$id";
	$res= mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count==1){
        $row = mysqli_fetch_assoc($res);
        $category_name = $row['category_name'];
        $image_name = $row['image_name'];
     } else {
        header('location:'.SITEURL.'user_index.php');
    }
   
 ?>

    <div class="image" style="background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(../admin_area/images/category/<?php echo $image_name; ?>);">
        <div class="header-text">
            <h1> <?php echo $category_name; ?> </h1>
        </div>
    </div>
</div>

<div class="container-fluid">
	<div class="row">
	<?php 
        $sql1 = "SELECT * FROM item_table WHERE category_id=$id";

        $res1 = mysqli_query($conn,$sql1);

        if($res1==TRUE){
            $count1 = mysqli_num_rows($res1);

            if($count1>0){
                $sn=1;
                while($rows = mysqli_fetch_assoc($res1)){
                    $item_id = $rows['item_id'];
                    $item_name = $rows['item_name'];
                    $item_image_name = $rows['image_name'];
                    $price= $rows['price'];
                    ?>
		<div class="col-sm-3">
			<a href="<?php echo SITEURL; ?>user-area/product_detailed.php?id=<?php echo $item_id; ?>&&user_id=<?php echo $user_id; ?>"><img src="../admin_area/images/item/<?php echo $item_image_name; ?>"></a>
			<h3> <?php echo $item_name; ?></h3>
			<h4> Rs. <?php echo $price; ?> </h4>
		</div>
		<?php 
				}
			}
		}
		?>
		
	</div>
</div>
<?php include('includes/footer.php'); ?>

</body>
</html>
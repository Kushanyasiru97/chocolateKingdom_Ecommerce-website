<?php include('../config/constants.php'); 

error_reporting(0);

if(isset($_POST['submit'])){
	$f_name=$_POST['fname'];
	$l_name=$_POST['lname'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$cnum=$_POST['contact'];
	$pword=md5($_POST['pword']);
	$rpword=md5($_POST['rpword']);

	if(isset($_FILES['image']['name'])){
		$image_name = $_FILES['image']['name'];

		if($image_name != ""){
			$ext = end(explode('.',$image_name));
			$image_name = "User_Img_".rand(000,999).'.'.$ext;
			$source_path = $_FILES['image']['tmp_name'];
			$destination_path = "../admin_area/images/user/".$image_name;
			$upload = move_uploaded_file($source_path,$destination_path);

			if($upload==false){
				$_SESSION['upload'] = "<div class='Failed-to-do'>Failed to Upload File.</div>";
				header('location:Login.php');
				die();
			}
		}

	} else {
		$image_name = "";
	}
	
	if((!empty($f_name) && !empty($l_name) && !empty($l_name) && !empty($l_name)  &&!empty($l_name) && !empty($l_name) && !empty($l_name) && !is_numeric($f_name) && !is_numeric($l_name) )){
		
		/*$email= random_num();*/
		$sql="INSERT INTO user_table(first_name,last_name,email,address,contact_number,password,image_name) VALUES('$f_name','$l_name','$email','$address','$cnum','$pword','$image_name')";
		$result=mysqli_query($conn,$sql);
			
		header('location:Login.php');
		
		if(!$result){
			echo "Something Wrong here";

	}
		else{
			echo "Record Complete";
		}
		
}
	else{
			echo "Please enter some valid Information";
	}
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup Page</title>
	<link rel="stylesheet" type="text/css" href="css/signupstyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="signup_box">
		<img src="photo/avatar.png" class="Logimage">
		<h1>User Sign Up</h1>
		<form action="" method="post" class="signup_form" enctype="multipart/form-data">
			<p>First Name</p>
			<input type="text" name="fname" placeholder="Enter first name here" value="<?php echo $f_name;?>" required>
			<p>Second Name</p>
			<input type="text" name="lname" placeholder="Enter second name here" value="<?php echo $l_name;?>" required>
			<p>Email Address</p>
			<input type="text" name="email" placeholder="Enter email address here" value="<?php echo $email;?>" required>
			<p>Address</p>
			<input type="text" name="address" placeholder="Enter your address here" value="<?php echo $address;?>" required>
			<p>Contact Number</p>
			<input type="text" name="contact" placeholder="Enter your contact number here" value="<?php echo $cnum;?>" required>
			<p>Profile Picture</p>
			<input type="file" name="image">
			<p>Password</p>
			<input type="password" name="pword" placeholder="Enter password here" value="<?php echo $_POST['pword'];?>" required><br>
			<p>Confirm Password</p>
			<input type="password" name="rpword" placeholder="Reenter password here" value="<?php echo $_POST['rpword'];?>" required><br>
			<input type="submit" name="submit" value="Sign Up"><br>
			
			<center><i class="fa fa-facebook-f "></i>
			<i class="fa fa-twitter"></i>
			<i class="fa fa-google"></i>
			<i class="fa fa-linkedin"></i>
			</center>
		</form>

	</div>
</body>
</html>

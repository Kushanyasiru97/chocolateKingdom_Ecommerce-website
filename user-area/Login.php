<?php include('../config/constants.php'); 


 if(isset($_POST['submit'])){
	 $email=$_POST['email'];
	 $pword=md5($_POST['pword']);
	
	 $sql = "SELECT * FROM user_table WHERE email='$email' AND password='$pword'";

	 $res = mysqli_query($conn, $sql);

	 $count = mysqli_num_rows($res);

	 $row = mysqli_fetch_assoc($res);
	 $id = $row['user_id'];

	 if($count==1){
		 $_SESSION['login'] = "<h4 style='color: #fff;  margin-left: 55px;'>Login Successful.</h4>";
		 $_SESSION['email'] = $email;
		 $_SESSION['id'] = $id;

		 header('location:'.SITEURL.'user-area/index.php');
	 } else {
		 $_SESSION['login'] = "<div class='error-text'>Username and Password <br> did not match.</div>";
		 header('location:login.php');
	 }
 }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="login_box">
		<img src="photo/avatar.png" class="Logimage">
		<h1>User Sign in</h1>
		<form action="" method="post" class="login-form" >
			<p>Email</p>
			<input type="text" name="email" placeholder="Enter email here">
			<p>Password</p>
			<input type="password" name="pword" placeholder="Enter password here"><br>
			<input type="submit" name="submit" value="login"><br>
			<center>
			<a href="signup.php"> Don't have an account</a>
			<br>
			<a href="../index.php"> Go Back to Home Page</a>
			</center>
			
			<center><i class="fa fa-facebook-f "></i>
			<i class="fa fa-twitter"></i>
			<i class="fa fa-google"></i>
			<i class="fa fa-linkedin"></i>
				</center>
		</form>
	</div>
	
	
</body> 
</html>
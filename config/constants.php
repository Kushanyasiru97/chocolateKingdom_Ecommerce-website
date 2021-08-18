<?php 
    //Start the session
    session_start();

    ob_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL','http://localhost/chocolate_shop/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME', 'chocolate_shop_db');

    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); // Database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database


?>

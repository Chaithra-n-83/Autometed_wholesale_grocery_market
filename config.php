<?php


$host = "localhost";
$db_name   = "shop_db";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$db_name";
$conn = new PDO($dsn,$username,$password);

// $db_name = "mysql:host=localhost;dbname=shop_db";
// $username = "root";
// $password = "";

// $conn = new PDO($db_name,$username,$password);

    

?>


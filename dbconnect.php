<?php
define("DB_SERVER", "mysql.hostinger.in");
define("DB_USER", "u151434359_root");
define("DB_PASSWORD", "vbhv3301");
define("DB_DATABASE", "u151434359_cram");
$conn = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 ?>

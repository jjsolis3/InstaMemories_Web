<?php
require_once(LIB_PATH.DS."config.php");
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
	die("Database connection failed: " . mysqli_connect_error());
}
?>

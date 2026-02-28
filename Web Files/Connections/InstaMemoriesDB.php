<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_InstaMemoriesDB = "instamemories.co";
$database_InstaMemoriesDB = "IMPB_db";
$username_InstaMemoriesDB = "phpadmininsta";
$password_InstaMemoriesDB = "superman774";
$InstaMemoriesDB = mysqli_connect($hostname_InstaMemoriesDB, $username_InstaMemoriesDB, $password_InstaMemoriesDB, $database_InstaMemoriesDB) or trigger_error(mysqli_connect_error(), E_USER_ERROR);
?>

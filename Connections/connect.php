<?php
$connection = mysql_connect('localhost', 'root', 'Rvm@i[9)0?~=');
if (!$connection){
    die("Database Connection Failed" . mysql_error($connection));
}
$select_db = mysql_select_db($connection, 'test');
if (!$select_db){
    die("Database Selection Failed" . mysql_error($connection));
}
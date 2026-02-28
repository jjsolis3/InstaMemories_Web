<?php
$connection = mysqli_connect('localhost', 'root', 'Rvm@i[9)0?~=', 'test');
if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

<?php
if( isset($_SESSION['LAST_REQUEST']) &&
    (time() - $_SESSION['LAST_REQUEST'] > 600) ) {
    session_unset();
    session_destroy();
    exit();
}
 
$_SESSION['LAST_REQUEST'] = time();
?>
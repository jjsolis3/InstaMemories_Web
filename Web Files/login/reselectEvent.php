<?php
require_once('../includes/initialize.php');

$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insta-Memories PhotoBooth - Reselect Event</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
</head>
<body>
    <?php echo $logoimage; ?>
	<div class="container">
		<h2>Select an Event to update your link</h2>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="includes/userEvent.php" method="post">
            	<select name="event" size="1">
				    <option></option>
                    <option value="170617.php"> Jaqueline's XV </option>
                    <option value="170610.php"> Naydien's Graduation </option>
                    <option value="170527.php"> ECR Promo Sendoff </option>
				    <option value="170505.php"> Mr &amp; Mrs Engel's Wedding </option>
				    <option value="170303.php"> Jennifer's 40th Bday </option>
				    <option value="170121.php"> Jasmine's 15 </option>
				    <option value="161215.php"> NAHREP GALA 2017 </option>
			      </select>
				<input type="password" name="event_code" placeholder="EVENT PASSCODE" required>
				<div class="send-button">
					<input type="hidden" name="ec_code" value="<?php echo $_REQUEST['ec_code']; ?>"/>
					<input type="submit" name="resetEvent" value="CHANGE GALLERY">
				</div>
			</form>
            <div>
            	<p align="center"><a href="account_info.php">return to Account Information page</a></p>
            </div>
		</div>
	</div>
</body>
</html>
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
    <title>Insta-Memories PhotoBooth - Create Account</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
</head>
<body>
    <?php echo $logoimage; ?>
	<div class="container">
		<h2>Create a New Account</h2>
		<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="includes/userAccount.php" method="post">
				<input type="text" name="first_name" placeholder="FIRST NAME" required>
				<input type="text" name="last_name" placeholder="LAST NAME" required>
				<input type="email" name="email" placeholder="EMAIL" required>
				<input type="text" name="phone" placeholder="PHONE NUMBER" required>
				<input type="password" name="password" placeholder="PASSWORD" required>
				<input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required>
                <select name="event" size="1" class="regisFrm-select">
				    <option value="0">SELECT AN EVENT</option>
                    <!--<option value="170902.php"> Daisy's 15 </option>
                    <option value="170916.php"> Selena & Tony's Wedding </option>-->
                    <option value="170826.php"> Alyssa's 15 </option>
                    <option value="170805.php"> Giselle's 15 </option>
                    <option value="170728.php"> Karina's 15 & Adriana's 16 </option>
                    <option value="170722.php"> Anna & Tony's Wedding </option>
                    <option value="170617.php"> Jaqueline's XV </option>
                    <option value="170610.php"> Naydien's Graduation </option>
                    <option value="170527.php"> ECR Promo Sendoff </option>
				    <option value="170505.php"> Mr &amp; Mrs Engel's Wedding </option>
				    <option value="170303.php"> Jennifer's 40th Bday </option>
				    <option value="170121.php"> Jasmine's 15 </option>
				    <option value="161215.php"> NAHREP GALA 2017 </option>
			      </select>
				<div class="send-button">
					<input type="submit" name="signupSubmit" value="CREATE ACCOUNT">
				</div>
			</form>
            <div>
            	<p align="center"><a href="index.php">return to login page</a></p>
            </div>
		</div>
	</div>
</body>
</html>
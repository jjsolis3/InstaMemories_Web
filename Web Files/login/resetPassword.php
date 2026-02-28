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
    <title>Insta-Memories PhotoBooth - Reset Password</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
</head>
<body>
    <?php echo $logoimage; ?>
	<div class="container">
		<h2>Reset Your Password</h2>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="includes/userAccount.php" method="post">
				<input type="password" name="password" placeholder="PASSWORD" required>
				<input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required>
				<div class="send-button">
					<input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
					<input type="submit" name="resetSubmit" value="RESET PASSWORD">
				</div>
			</form>
            <div>
            	<p align="center"><a href="index.php">return to login page</a></p>
            </div>
		</div>
	</div>
</body>
</html>
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
    <title>Insta-Memories PhotoBooth - Gallery Login</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
</head>
<body>
    <?php echo $logoimage; ?>
    
	<div class="container">
        <?php
			if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
				include_login('users.php');
				$user = new Users();
				$conditions['where'] = array(
					'id' => $sessData['userID'],
				);
				$conditions['return_type'] = 'single';
				$userData = $user->getRows($conditions);
				
				header("Location: account_info.php");
		
		}else{ ?>
		<h2>Login to Your Account</h2>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="includes/userAccount.php" method="post">
				<input type="email" name="email" placeholder="EMAIL" required>
				<input type="password" name="password" placeholder="PASSWORD" required>
				<div class="send-button">
					<input type="submit" name="loginSubmit" value="LOGIN">
				</div>
			</form>
            <p align="center"><a href="forgotPassword.php">Forgot password?</a></p>
            <p align="center">Don't have an account? <a href="registration.php">Register</a></p>
		</div>
        <?php } ?>
	</div>
</body>
</html>
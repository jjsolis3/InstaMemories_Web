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
    <title>Insta-Memories PhotoBooth - Account Info</title>
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
		?>
        <h2>Welcome <?php echo $userData['first_name']; ?>!</h2>
        
		<div class="regisFrm">
			<p><b>Name: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
            <p><b>Email: </b><?php echo $userData['email']; ?></p>
            <!--<p><b>Phone: </b><?php echo $userData['phone']; ?></p>-->
		</div>
        <div class="regisFrm">
        <br/>
        	<p><b>Your Event Photo Gallery: </b><a href="/PhotoGalleries/<?php echo $userData['event']; ?>">Click Here!</a></p>
        <br/>
        	
        </div>
        <div class="regisFrm">
			<form action="includes/userAccount.php" method="post">
				<div class="send-button">
					<input type="submit" name="logoutSubmit" value="LOGOUT">
				</div>
			</form>
		</div>
        <?php }else{
			header("location: index.php");
        } ?>
	</div>
</body>
</html>
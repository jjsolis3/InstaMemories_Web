<?php
//start session
session_start();
//load and initialize user class
include 'users.php';

$user = new Users();

if(isset($_POST['resetSubmit'])){
	//check whether email is empty
    if(!empty($_POST['email'])){
		//check whether user exists in the database
		$prevCon['where'] = array('email'=>$_POST['email']);
		$prevCon['return_type'] = 'count';
		$prevUser = $user->getRows($prevCon);
		if($prevUser > 0){
			//generat unique string
			$uniqidStr = md5(uniqid(mt_rand()));;
			
			//update data with forgot pass code
			$conditions = array(
				'email' => $_POST['email']
			);
			$data = array(
				'event_identity' => $uniqidStr
			);
			$update = $user->update($data, $conditions);
			
			if($update){
				$resetEventLink = 'http://insta-memories.com/login/reselectEvent.php?ec_code='.$uniqidStr;
				
				//get user details
				$con['where'] = array('email'=>$_POST['email']);
				$con['return_type'] = 'single';
				$userDetails = $user->getRows($con);
				
				//send reset password email
				$logo = "http://insta-memories.com/images/emailLogo.jpg";
				$email_co = "info@insta-memories.com";
				
				$to = $userDetails['email'];
				$subject = "Event Gallery Change Request";
				$mailContent = 'Dear '.$userDetails['first_name'].', 
				<br/><br/>Recently a request was submitted to change the access to the Event Photo Gallery for your Insta-Memories Gallery account. 
				<br/>If you are aware of this request, you can disregard this message.
				<br/><br/>To reset your password, visit the following link: <a href="'.$resetEventLink.'">'.$resetEventLink.'</a>
				<br/><br/>Regards,
				<br/>Insta-Memories PhotoBooth';
				//set content-type header for sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				//additional headers
				$headers .= "From: " .$email_co. "\r\n";
				//send email
				mail($to,$subject,$mailContent,$headers);
				
				$sessData['status']['type'] = 'success';
				$sessData['status']['msg'] = 'Please select the new Event Photo Gallery you would like to see.';
			}else{
				$sessData['status']['type'] = 'error';
				$sessData['status']['msg'] = 'A problem occurred, please try again.';
			}
		}else{
			$sessData['status']['type'] = 'error';
			$sessData['status']['msg'] = 'The Email entered is not associated with an account. <a href="/login/registration.php">Click Here</a> to Register a new account.'; 
		}
		
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Please enter your Email to create a new password for your account.'; 
    }
	//store reset password status into the session
    $_SESSION['sessData'] = $sessData;
	//redirect to the forgot pasword page
    //header("Location:/login/forgotPassword.php");
	header("location: " . $resetEventLink);
}elseif(isset($_POST['resetSubmit'])){
	$ec_code = '';
	if(!empty($_POST['event']) && !empty($_POST['ec_code'])){
		$ec_code = $_POST['ec_code'];
		//password and confirm password comparison		
		
        if($_POST['event'] !== ){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
        }else{
			//check whether identity code exists in the database
            $prevCon['where'] = array('event_identity' => $ec_code);
            $prevCon['return_type'] = 'single';
            $prevUser = $user->getRows($prevCon);
            if(!empty($prevUser)){
				//update data with new password
				$conditions = array(
					'forgot_pass_identity' => $fp_code
				);
				$data = array(
					'password' => md5($_POST['password'])
				);
				$update = $user->update($data, $conditions);
				if($update){
					$sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Your account password has been reset successfully. Please login with your new password.';
				}else{
					$sessData['status']['type'] = 'error';
					$sessData['status']['msg'] = 'A problem occurred, please try again.';
				}
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'You are not authorized to reset the password for this account.';
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
	//store reset password status into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'/login/index.php':'/login/resetPassword.php?fp_code='.$fp_code;
	//redirect to the login/reset pasword page
    header("Location:".$redirectURL);
}

?>
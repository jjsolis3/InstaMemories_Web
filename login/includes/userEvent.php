<?php
//start session
session_start();
//load and initialize user class
include 'users.php';

$user = new Users();
if(isset($_POST['eventRequest'])){
	//check whether email is empty
    if(!empty($_POST['event'])){
		//check whether user exists in the database
		$prevCon['where'] = array('event'=>$_POST['event']);
		$prevCon['return_type'] = 'count';
		$prevUser = $user->getRows($prevCon);
		if($prevUser > 0){
			//generat unique string
			$uniqidStr = md5(uniqid(mt_rand()));;
			
			//update data with forgot pass code
			$conditions = array(
				'event' => $_POST['event']
			);
			$data = array(
				'event_identity' => $uniqidStr
			);
			$update = $user->update($data, $conditions);
			
			if($update){
				$resetEventLink = 'http://insta-memories.com/login/reselectEvent.php?ec_code='.$uniqidStr;
				
				//get user details
				$con['where'] = array('event'=>$_POST['event']);
				$con['return_type'] = 'single';
				$userDetails = $user->getRows($con);
				
				//send reset password email
				$logo = "http://insta-memories.com/images/emailLogo.jpg";
				$email_co = "info@insta-memories.com";
				
				$to = $userDetails['email'];
				$subject = "Account Gallery Access";
				$mailContent = 'Dear '.$userDetails['first_name'].', 
				<br/><br/>Recently a request was submitted to reset your Event\'s Photo Gallery Access. 
				<br/>If you are aware of this request, please disregard this message.
				<br/><br/>To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
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
				$sessData['status']['msg'] = 'Please select an Event Photo Gallery and enter the Event Passcode.';
			}else{
				$sessData['status']['type'] = 'error';
				$sessData['status']['msg'] = 'A problem occurred, please try again.';
			}
		}else{
			$sessData['status']['type'] = 'error';
			$sessData['status']['msg'] = 'error, please try again.'; 
		}
		
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Please Try Again.'; 
    }
	//store reset password status into the session
    $_SESSION['sessData'] = $sessData;
	//redirect to the forgot pasword page
    //header("Location:/login/forgotPassword.php");
	header("location: " . $resetEventLink);
}elseif(isset($_POST['resetEvent'])){
	$ec_code = '';
	if(!empty($_POST['event_code']) && !empty($_POST['ec_code'])){
		$ec_code = $_POST['ec_code'];
		//password and confirm password comparison
        if($_POST['event_code'] !== 'event_code'){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'The Event PassCode entered does not match the Passcode required to access this gallery.'; 
        }else{
			//check whether identity code exists in the database
            $prevCon['where'] = array('event_identity' => $ec_code);
            $prevCon['return_type'] = 'single';
            $prevUser = $user->getEvent($prevCon);
            if(!empty($prevUser)){
				//update data with new password
				$conditions = array(
					'users.event_identity' => $ec_code
				);
				$data = array(
					'users.event' => $_POST['event']
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
                $sessData['status']['msg'] = 'You are not authorized to change the Photo Gallery for this account.';
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
	//store reset password status into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'/login/index.php':'/login/reselectEvent.php?ec_code='.$ec_code;
	//redirect to the login/reset pasword page
    header("Location:".$redirectURL);
}else{
	//redirect to the home page
    header("Location:/login/account_info-test.php");
}

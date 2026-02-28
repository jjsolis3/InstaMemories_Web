<?php
//start session
session_start();
//load and initialize user class
include 'users.php';

$user = new Users();
if(isset($_POST['signupSubmit'])){
	//check whether user details are empty
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['event_code']) && !empty($_POST['event']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['event_code'])){
		//password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
        }else{
			//check whether user exists in the database
            $prevCon['where'] = array('users.email'=>$_POST['email']);
            $prevCon['return_type'] = 'count';
            $prevUser = $user->getEvent($prevCon);
            if($prevUser > 0){
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Email already exists, please use another email.';
            }else{
				if($_POST['event_code'] = 'event.event_code');{
					//insert user data in the database
					$userData = array(
						'users.first_name' => $_POST['first_name'],
						'users.last_name' => $_POST['last_name'],
						'users.email' => $_POST['email'],
						'users.password' => md5($_POST['password']),
						'users.phone' => $_POST['phone'],
						'users.event' => $_POST['event']
					);
					$insert = $user->insert($userData);
					//set status based on data insert
					if($insert){
						$sessData['status']['type'] = 'success';
						$sessData['status']['msg'] = 'You have registered successfully, log in with your credentials.';
					}else{
						$sessData['status']['type'] = 'error';
						$sessData['status']['msg'] = 'A problem occurred, please try again.';
					}
				}
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
	//store signup status into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'/login/index.php':'/login/registration.php';
	//redirect to the home/registration page
    header("Location:".$redirectURL);
}elseif(isset($_POST['loginSubmit'])){
	//check whether login details are empty
    if(!empty($_POST['email']) && !empty($_POST['password'])){
		//get user data from user class
        $conditions['where'] = array(
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'status' => '1'
        );
        $conditions['return_type'] = 'single';
        $userData = $user->getRows($conditions);
		//set user data and status based on login credentials
        if($userData){
            $sessData['userLoggedIn'] = TRUE;
            $sessData['userID'] = $userData['id'];
            $sessData['status']['type'] = 'success';
            $sessData['status']['msg'] = 'Welcome '.$userData['first_name'].'!';
        }else{
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Wrong email or password, please try again.'; 
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Enter email and password.'; 
    }
	//store login status into the session
    $_SESSION['sessData'] = $sessData;
	//redirect to the home page
    header("Location:/login/index.php");
}elseif(isset($_POST['forgotSubmit'])){
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
				'forgot_pass_identity' => $uniqidStr
			);
			$update = $user->update($data, $conditions);
			
			if($update){
				$resetPassLink = 'http://insta-memories.com/login/resetPassword.php?fp_code='.$uniqidStr;
				
				//get user details
				$con['where'] = array('email'=>$_POST['email']);
				$con['return_type'] = 'single';
				$userDetails = $user->getRows($con);
				
				//send reset password email
				$logo = "http://insta-memories.com/images/emailLogo.jpg";
				$email_co = "info@insta-memories.com";
				
				$to = $userDetails['email'];
				$subject = "Password Update Request";
				$mailContent = 'Dear '.$userDetails['first_name'].', 
				<br/><br/>Recently a request was submitted to reset the password for your Insta-Memories Photo Gallery account. 
				<br/>If you are aware of this request, you can disregard this message.
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
				$sessData['status']['msg'] = 'Please enter a new password to update your Event Gallery Account.';
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
	header("location: " . $resetPassLink);
}elseif(isset($_POST['resetSubmit'])){
	$fp_code = '';
	if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['fp_code'])){
		$fp_code = $_POST['fp_code'];
		//password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
        }else{
			//check whether identity code exists in the database
            $prevCon['where'] = array('forgot_pass_identity' => $fp_code);
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
}elseif(isset($_POST['accountInfo'])){
	//redirect to Account Info Page
	header("Location:/login/account_info.php");
}elseif(!empty($_REQUEST['logoutSubmit'])){
	//remove session data
    unset($_SESSION['sessData']);
    session_destroy();
	//store logout status into the ession
    $sessData['status']['type'] = 'success';
    $sessData['status']['msg'] = 'You have logout successfully from your account.';
    $_SESSION['sessData'] = $sessData;
	//redirect to the home page
    header("Location:/login/index.php");
}else{
	//redirect to the home page
    header("Location:/login/index.php");
}
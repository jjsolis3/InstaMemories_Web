<?php 
if(isset($_POST['submit'])){
    $to = "info@insta-memories.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $full_name = $_POST['full_name'];
    $subject = "Contact Form";
    $subject2 = "Insta-Memories PhotoBooth - Contact";
    $message = $_POST['full_name'] . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Thank you " . $_POST['full_name'] . ", for contacting Insta-Memories Photobooth." . "\n\n" . "We will contact you shortly.";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $full_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>


<?php 
if(isset($_POST['submit'])){
    $to = "info@insta-memories.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $FirstName = $_POST['first_name'];
	$LastName = $_POST['last_name'];
	$FullName = $FirstName . $LastName;
	$Phone = $_POST['phone'];
	$EventLoc = $_POST['location'];
	$Time = $_POST['hours'];
	$Type = $_POST['type'];
	$Date = $_POST['date'];
	$Contact = $_POST['contact'];
	$Referred = $_POST['referred'];
	$Offer = $_POST['offer'];
    $subject = "Quote Request";
    $subject2 = "Insta-Memories PhotoBooth - Quote Request";
	$message = $FirstName . " " . $LastName . " has requested a quote." . "\n" . "Type of Event: " . $TypeEvent . "\n" . "The event will be held at: " . $EventLoc . "\n" . "On: " . $Date . ", Starting at: " . $StartTime . " Until: " . $EndTime . "\n" . "Tel #: " . $Phone . "\n" .  "Please Contact me through: " . $Contact . "\n" . "Referred by: " . $Referred . "\n" . "Offer Code: " . $Offer . "\n" . "My Favorite PhotoFace: " . $PhotoFace . "\n\n" . "Comments: " . "\n" . $_POST['message'];
    $message2 = "Hello " . $FirstName . "," . "\n\n" . "Thank You for Contacting Insta-Memories Photobooth." . "\n" . "We will contact you with a quote shortly." . "\n\n" . "If you have any questions, you can give us a call at the following number: (818) 600-1083" . "\n\n"  . "Thank You.";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $FullName . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>


<?php

	function died($error) {
			// your error code can go here
			echo "We are very sorry, but there were error(s) found with the form you submitted. ";
			echo "These errors appear below.<br /><br />";
			echo $error."<br /><br />";
			echo "Please go back and fix these errors.<br /><br /> <a href=\"javascript:history.back()\">Go Back</a> ";
			die();
		}

    // validation expected data exists
    if(!isset($_POST['first_name']) ||
		!isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
		!isset($_POST['phone']) ||
		!isset($_POST['type']) ||
		!isset($_POST['location']) ||
        !isset($_POST['date']) ||
		!isset($_POST['hours']) ||
		!isset($_POST['contact']) ||
        !isset($_POST['referred']) ||
		!isset($_POST['offer']) ||
        !isset($_POST['comment'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }

//Validation Script

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $date_exp = '/^[0-9.-/]/';
	
  if(!preg_match($date_exp,$date)) {
	  $error_message .= 'The Date you entered does not appear to be valid.<br />';
  }
  
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$fname)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  
  if(!preg_match($string_exp,$lname)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

 
  if(strlen($comments) < 2) {
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
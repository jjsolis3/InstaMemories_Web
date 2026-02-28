<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 6 LINES BELOW AS REQUIRED
    $email_to = "info@insta-memories.com";
    $email_subject = "Quote Request";
	$email_subject2 = "Insta-Memories PhotoBooth - Quote Request";
	
	$contact_phone = "(818) 600-1083";
	$company_name = "Insta-Memories PhotoBooth";
	$logo = "http://insta-memories.com/images/emailLogo.jpg";
	
	
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
     
  
    $fname = $_POST['first_name']; // required
	$lname = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
	$type = $_POST['type']; // not required
	$location = $_POST['location']; // not required
    $date = $_POST['date']; // not required
    $hours = $_POST['hours']; // not required
	$contact = $_POST['contact']; // not required
	$referred = $_POST['referred']; // not required
    $offer = $_POST['offer']; // not required
    $comments = $_POST['comment']; // required
	
	    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Quote Request details below;\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	
     
 	// EMAIL TO INSTA-MEMORIES 
    $email_message .= "First Name: ".$fname."\n";
	$email_message .= "Last Name: ".$lname."\n\n";
    $email_message .= "Email: ".$email_from."\n\n";
    $email_message .= "Phone: ".$phone."\n";
	$email_message .= "Preffered Method of Contact: ".$contact."\n\n";
	$email_message .= "Type of Event: ".$type."\n\n";
    $email_message .= "Date of Event: ".$date."\n";
	$email_message .= "Hours of Service: ".$hours."\n\n";
    $email_message .= "Event Location: ".$location."\n\n";
	$email_message .= "Referred by: ".$referred."\n\n";
    $email_message .= "Offer Code: ".$offer."\n\n";
    $email_message .= "Message: ".$comments."\n";
	
	//EMAIL TO CLIENT
	$email_message2 = "<html><body>";
	$email_message2 .= "<p><img src=\"" . $logo . "\" alt=\"Logo\" /></p>";
	$email_message2 .= "<p>Hello " . $fname . "," . "<br><br>";
	$email_message2 .= "Thank You for contacting " . $company_name . "." . "<br>";
	$email_message2 .= "We will reach out to you shortly." . "</p>";
	$email_message2 .= "<p>If you need immediate assistance, feel free to give us a call at the following number: " . $contact_phone . ".</p>";
	$email_message2 .= "<p>Thank You.</p>";
	$email_message2 .= "</body></html>";
 
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers); 
	
	$headers2 = "From: " . $email_to . "\r\n";
	$headers2 .= "Reply-to: " . $email_from . "\r\n";
	$headers2 .= "MIME-Version: 1.0\r\n";
	$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
	@mail($email_from, $email_subject2, $email_message2, $headers2);

	$success_message =	"<div class:\"wrapper\"> ";
	$success_message .= "Mail Sent. <br> Thank you " . $fname . ", we will contact you shortly.";
	$success_message .= "</div><br><br> ";

?>

<!-- include your own success html here -->

<?php echo $success_message ; ?>

<?php
 
}
?>
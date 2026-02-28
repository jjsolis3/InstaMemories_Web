<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 6 LINES BELOW AS REQUIRED
    $email_to = "info@insta-memories.com";
    $email_subject = "Gallery Update";
	$email_subject2 = "Insta-Memories PhotoBooth - Photo Gallery Update";
	
	$contact_phone = "(818) 600-1083";
	$company_name = "Insta-Memories PhotoBooth";
	$logo = "http://insta-memories.com/images/emailLogo.jpg";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted.<br/>";
        echo "These errors appear below;<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors. <a href=\"javascript:history.back()\">Go Back</a> ";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['full_name']) ||
        !isset($_POST['email']) ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $name = $_POST['full_name']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Photo Gallery Update Request:\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n\n";
    $email_message .= "Email: ".clean_string($email_from)."\n\n";
    $email_message .= "Event Date: ".clean_string($comments)."\n";
	
	$email_message2 = "<html><body>";
	$email_message2 .= "<p><img src=\"" . $logo . "\" alt=\"Logo\" /></p>";
	$email_message2 .= "<p>Hello " . $name . "," . "<br><br>";
	$email_message2 .= "Thank You for contacting " . $company_name . "." . "<br>";
	$email_message2 .= "We will reach out to you once the Photo Gallery for you "; $email_message2 .= "event becomes available.";
	$email_message2 .= "</p></body></html>";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers); 

$headers2 = "From: " . $email_to . "\r\n";
$headers2 .= "Reply-to: " . $email_from . "\r\n";
$headers2 .= "MIME-Version: 1.0\r\n";
$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
mail($email_from, $email_subject2, $email_message2, $headers2);

	$success_message =	"<div class:\"wrapper\"> ";
	$success_message .= "Thank you " . $name . ", Your message has been sent. ";
	$success_message .= "We will contact you shortly.";
	$success_message .= "</div><br><br> ";

?>
 
<!-- include your own success html here -->
       
	   <?php echo $success_message ; ?>
       
 
<?php
 
}
?>
<?php 
if(isset($POST['Submitted'])){	
    $to = "info@insta-memories.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $FirstName = $_POST['first_name'];
	$LastName = $_POST['last_name'];
	$FullName = $FirstName . $LastName;
	$Phone = $_POST['phone'];
	$EventLoc = $_POST['event'];
	$StartTime = $_POST['start_time'];
	$EndTime = $_POST['end_time'];
	$TypeEvent = $_POST['type'];
	$Date = $_POST['date'];
	$PhotoFace = $_POST['photoface'];
	$Contact = $_POST['contact'];
	$Referred = $_POST['referred'];
    $subject = "Quote Request";
    $subject2 = "Insta-Memories PhotoBooth - Quote Request";
	$message = $FirstName . " " . $LastName . " has requested a quote." . "\n" . "Type of Event: " . $TypeEvent . "\n" . "The event will be held at: " . $EventLoc . "\n" . "On: " . $Date . ", Starting at: " . $StartTime . " Until: " . $EndTime . "\n" . "Tel #: " . $Phone . "\n" .  "Please Contact me through: " . $Contact . "\n" . "Referred by: " . $Referred . "\n" . "My Favorite PhotoFace: " . $PhotoFace . "\n\n" . "Comments: " . "\n" . $_POST['message'];
    $message2 = "Hello " . $FirstName . "," . "\n\n" . "Thank You for Contacting Insta-Memories Photobooth." . "\n" . "We will contact you with a quote shortly." . "\n\n" . "If you have any questions, you can give us a call at the following number: (818) 600-1083" . "\n"  . "Thank You.";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $FullName . ", we will contact you shortly.";
    }

$show_form=true;

if(isset($_POST['Submit'])){
	// The form is submitted

    //Setup Validations
    $validator = new FormValidator();
    $validator->addValidation("first_name","req","Please fill in Name");
    $validator->addValidation("email","email","The input for Email should be a valid email value");
    $validator->addValidation("email","req","Please fill in Email");
	$validator->addValidation("event","req","Please enter your Event's Location");
    //Now, validate the form
    if($validator->ValidateForm())
    {
        //Validation success. 
        //Here we can proceed with processing the form 
        //(like sending email, saving to Database etc)
        // In this example, we just display a message
        echo "<h2>Validation Success!</h2>";
        $show_form=false;
    }
    else
    {
        echo "<B>Validation Errors:</B>";

        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
            echo "<p>$inpname : $inp_err</p>\n";
        }        
    }//else
}//if(isset($_POST['Submit']))

if(true == $show_form)
{	
?>

<!DOCTYPE html>
<html lang="en" xmlns:ice="http://ns.adobe.com/incontextediting">
<head>
<title>Insta-Memories | Quote Request</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Terminal_Dosis_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="includes/ice/ice.js" type="text/javascript"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg {behavior:url("js/PIE.htc")}</style>
<![endif]-->
</head>
<body id="page7">
<div class="body1">
  <div class="body2">
    <div class="body3">
      <div class="main">
        <!-- header -->
        <header>
          <div class="wrapper">
            <h1><a href="index.php" id="logo"></a></h1>
            <form id="search" action="#" method="post" >
              <div>
                <input type="submit" class="submit" value="">
                <input class="input" type="text" value="Site Search" onBlur="if(this.value=='') this.value='Site Search'" onFocus="if(this.value =='Site Search' ) this.value=''">
              </div>
            </form>
            <nav>
              <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="pricing.php">Pricing</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li class="end"><a href="contact.php">Contact</a></li>
              </ul>
            </nav>
          </div>
        </header>
        <!-- / header-->
        <!-- content -->
        <section id="content">
          <div class="wrapper">
            <h2>Request a Quote</h2>
              <p>
					What is the hold up?! Reserve an Insta-Memories PhotoBooth for you party or event today!<br>
					Fill in the information below to receive  a quote or give us a call @ <strong>818.600.1083</strong></p>
          	  </p>
            	</span>
            <form action="" method="post" id="RequestForm" accept-charset='UTF-8'>
              <div>
				<div class="wrapper"> 
                  <span>First Name</span> 
                  <input type="text" class="input" name="first_name">
                </div>
                <div class="wrapper"> 
                  <span>Last Name</span>
                  <input type="text" class="input" name="last_name">
                </div>
                <div class="wrapper"> 
                  <span>E-mail</span>
                  <input type="email" class="input" name="email">
                </div>
                <div class="wrapper"> 
                  <span>Phone</span>
                  <input type="tel" class="input" name="phone">
                </div>
                <div class="wrapper"> 
                  <span>What type of event?</span>
                  <select name="type" >
                    <option selected>-- Please Select --</option>
                    <option>Wedding</option>
                    <option>Birthday</option>
                    <option>Corporate Event</option>
                    <option>Holiday Party</option>
                    <option>Company Party</option>
                    <option>Sweet 16</option>
                    <option>School Dance</option>
                    <option>Quinceanera</option>
                    <option>Engagement</option>
                    <option>Bar/Bat Mitzvah</option>
                    <option>Festival</option>
                    <option>Non-Profit Event</option>
                    <option>Anniversary</option>
                    <option>Reunion</option>
                    <option>Retail</option>
                    <option>Retirement</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="wrapper"> 
                  <span>Date of Event</span>                  
                  <input type="date" class="input" name="date">
                </div>
                <div class="wrapper">
				  <span>Event Location</span>
				  <input type="text" class="input" name="event">
				</div>
                <div class="wrapper">
				  <span>Event Start Time</span>
				  <input type="datetime" class="input" name="start_time">
				</div>
                <div class="wrapper">
				  <span>Event End Time</span>
				  <input type="datetime" class="input" name="end_time">
				</div>
                <div class="wrapper">
                  <span>Preferred Contact Method</span>
               	  <p>
                  	  <label>
                  	    <input type="radio" name="contact" value="phone" id="RadioGroup1_0">
                  	    Phone</label>	
                  	  <label>
                  	    <input type="radio" name="contact" value="email" id="RadioGroup1_1">
                  	    Email</label>
               	  </p>
                </div> 
                <div class="wrapper"> 
				  <span>How Did You Hear About Us?</span>
                  <select name="referred" >
                    <option selected>-- Please Select --</option>
                    <option>Google</option>
                    <option>Yelp</option>
                    <option>Facebook</option>
                    <option>The Knot</option>
                    <option>Friend Referral</option>
                    <option>Saw us at Event</option>
                    <option>Other</option>
                  </select>
                </div> 
                <div class="wrapper"> 
				  <span>Favorite PhotoFace</span>
                  <select name="photoface" >
                    <option selected>-- Please Select --</option>
                    <option>Happy</option>
                    <option>Sad</option>
                    <option>Confused</option>
                    <option>Duck</option>
                    <option>Mug Shot</option>
                    <option>Scared</option>
                    <option>My Hero</option>
                    <option>Blue Steel</option>
                    <option>Magnum</option>
                  </select>
                </div> 
                <div class="textarea_box"> 
                  <span>Comments</span>
                  <textarea name="message"></textarea>
                </div>
                <input type="reset" name="clear" class="button" value="Clear"> <input type="submit" name="submit" class="button" Value="Send">
                </div>
            </form>
            <?PHP
}//true == $show_form
?>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<div class="body4">
  <div class="main">
    <section id="content2">
      <div class="line2 wrapper">
        <div class="wrapper">
          <article class="col1">
            <h2></h2>
            <div class="pad">  </div>
          </article>
          <article class="col2 pad_left1">
            <h2>Contact Us</h2>
            <div class="pad">
				<strong>Telephone: </strong> &nbsp;&nbsp; (818) 600-1083 
              <br>
			  	<strong>Email: </strong>&nbsp; info@insta-memories.com
			</div>
          </article>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- / content -->
<div class="main">
  <!-- footer -->
<?php
	include('layout/footer.php');
 ?>
  <!-- / footer -->
</div>
<script type="text/javascript">Cufon.now();</script></body>
</html>
<?php

if(!empty($_POST['submit'])) {
	//if submitted, then validate

	$fname = trim($_POST['first_name']);
	$lname = trim($_POST['last_name']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$event = trim($_POST['event']);
	$date = trim($_POST['date']);
	$time = trim($_POST['start_time']);
	$etime = trim($_POST['end_time']);
	$message = trim($_POST['message']);
	$photoface = trim($_POST['photoface']);
	$referred = trim($_POST['referred']);
	
	$error = false;
	
	if(empty($fname)) {
		$fname_error = 'First Name is empty. Please enter your First Name.';
		$error = true;
	}
	if(empty($lname)) {
		$lname_error = 'Last Name is empty. Please enter your Last Name.';
		$error = true;
	}
	if(empty($email)) {
		$email_error = 'Email is empty. Please enter your Email.';
		$error = true;
	}
	if(empty($phone)) {
		$phone_error = 'Phone is empty. Please enter your Phone Number.';
	}
	if(empty($event)) {
		$event_error = 'Location is empty. Please enter the Location of your event.';
		$error = true;
	}
	if(empty($date)) {
		$date_error = 'Date is empty. Please enter the Date of your event.';
		$error = true;
	}
	if(empty($time)) {
		$time_error = 'Start Time is empty. Please enter a Start Time for your event.';
		$error = true;
	}
	
	if(false === $error) {
		//Validation Success!
		//Do form like email, database, etc
			$to = "info@insta-memories.com"; // this is your Email address
			$from = $_POST['email']; // this is the sender's Email address
			$FirstName = $_POST['first_name'];
			$LastName = $_POST['last_name'];
			$FullName = $FirstName . " " . $LastName;
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
			$message = $FirstName . " " . $LastName . " has requested a quote." . "\n\n" . "Type of Event: " . $TypeEvent . "\n\n" . "The event will be held at: " . $EventLoc . "\n" . "On: " . $Date . ", Starting at: " . $StartTime . " Until: " . $EndTime . "\n\n" . "Tel #: " . $Phone . "\n" .  "Please Contact me through: " . $Contact . "\n\n" . "Referred by: " . $Referred . "\n\n" . "My Favorite PhotoFace: " . $PhotoFace . "\n\n" . "Comments: " . "\n" . $_POST['message'];
			$message2 = "Hello " . $FirstName . "," . "\n\n" . "Thank You for Contacting Insta-Memories Photobooth." . "\n" . "We will contact you with a quote shortly." . "\n\n" . "If you have any questions, you can give us a call at the following number: (818) 600-1083" . "\n"  . "Thank You.";
		
			$headers = "From:" . $from;
			$headers2 = "From:" . $to;
			mail($to,$subject,$message,$headers);
			mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
			$SentMessage = "Mail Sent. Thank you " . $FullName . ", we will contact you shortly.";
			// You can also use header('Location: thank_you.php'); to redirect to another page.
			
	}
	
	
	
}


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
              	<?php echo $SentMessage ?>
            	</span>
            <form action="" method="post" id="RequestForm" accept-charset='UTF-8'>
              <div>
				<div class="wrapper">
                  <span>First Name</span> 
                  <input type="text" class="input" name="first_name" value="<?php echo htmlentities($fname) ?>">
                  <div class="relative"><font color="#FF0000"><?php echo $fname_error ?></font></div>
                </div>
                <div class="wrapper"> 
                  <span>Last Name</span>
                  <input type="text" class="input" name="last_name" value="<?php echo htmlentities($lname) ?>">
                  <div class="relative"><font color="#FF0000"><?php echo $lname_error ?></font></div>
                </div>
                <div class="wrapper"> 
                  <span>E-mail</span>
                  <input type="email" class="input" name="email" value="<?php echo htmlentities($email) ?>">
                  <div class="relative"><font color="#FF0000"><?php echo $email_error ?></font></div>
                </div>
                <div class="wrapper"> 
                  <span>Phone</span>
                  <input type="tel" class="input" name="phone" value="<?php echo htmlentities($phone) ?>">
                  <div class="relative"><font color="#FF0000"><?php echo $phone_error ?></font></div>
                </div>
                <div class="wrapper"> 
                  <span>What type of event?</span>
                  <select name="type" >
                    <option value="">-- Please Select --</option>
                    <option <?php echo $type=='Wedding'?'selected':''; ?> >Wedding</option>
                    <option <?php echo $type=='Birthday'?'selected':''; ?> >Birthday</option>
                    <option <?php echo $type=='Corporate Event'?'selected':''; ?> >Corporate Event</option>
                    <option <?php echo $type=='Holiday Party'?'selected':''; ?> >Holiday Party</option>
                    <option <?php echo $type=='Company Party'?'selected':''; ?> >Company Party</option>
                    <option <?php echo $type=='Sweet 16'?'selected':''; ?> >Sweet 16</option>
                    <option <?php echo $type=='School Dance'?'selected':''; ?> >School Dance</option>
                    <option <?php echo $type=='Quinceanera'?'selected':''; ?> >Quinceanera</option>
                    <option <?php echo $type=='Engagement'?'selected':''; ?> >Engagement</option>
                    <option <?php echo $type=='Bar/Bat Mitzvah'?'selected':''; ?> >Bar/Bat Mitzvah</option>
                    <option <?php echo $type=='Festival'?'selected':''; ?> >Festival</option>
                    <option <?php echo $type=='Non-Profit Event'?'selected':''; ?> >Non-Profit Event</option>
                    <option <?php echo $type=='Anniversary'?'selected':''; ?> >Anniversary</option>
                    <option <?php echo $type=='Reunion'?'selected':''; ?> >Reunion</option>
                    <option <?php echo $type=='Retail'?'selected':''; ?> >Retail</option>
                    <option <?php echo $type=='Retirement'?'selected':''; ?> >Retirement</option>
                    <option <?php echo $type=='Other'?'selected':''; ?> >Other</option>
                  </select>
                  <div class="relative"><font color="#FF0000"><?php echo $type_error ?></font></div>
                </div>
                <div class="wrapper"> 
                  <!--<span> Date of Event </span>               
                  <input type="date" class="input" name="date" value="<?php echo htmlentities($date) ?>">
                  <div class="relative"><font color="#FF0000"><?php echo $date_error ?></font></div>
                </div> -->
                <div class="wrapper">
                  <span> Date of Event 2 </span>
                  <input type="text" name="date" value="<?php
	  $myCalendar = new tc_calendar("date5", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2017);
	  $myCalendar->dateAllow('2008-05-13', '2017-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
	  $myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
	  $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
	  $myCalendar->writeScript();
	  ?>" >	
                </div> 
                <div class="wrapper">
				  <span>Event Location</span>
				  <input type="text" class="input" name="event" value="<?php echo htmlentities($event) ?>">
                  <div class="relative"><font color="#FF0000"><?php echo $event_error ?></font></div>
				</div>
                <div class="wrapper">
				  <span>Event Start Time</span>
				  <input type="datetime" class="input" name="start_time" value="<?php echo htmlentities($time) ?>">
                  <div class="relative"><font color="#FF0000"><?php echo $time_error ?></font></div>
				</div>
                <div class="wrapper">
				  <span>Event End Time</span>
				  <input type="datetime" class="input" name="end_time" value="<?php echo htmlentities($etime) ?>">
				</div>
                <div class="wrapper">
                  <span>Preferred Contact Method</span>
               	  <p>
                  	  <label>
                  	    <input type="radio" name="contact" value="phone" id="RadioGroup1_0" <?php echo ($contact=='phone')? 'checked':''; ?>>
                  	    Phone</label>	
                  	  <label>
                  	    <input type="radio" name="contact" value="email" id="RadioGroup1_1" <?php echo ($contact=='email')? 'checked':''; ?>>
                  	    Email</label>
               	  </p>
                </div> 
                <div class="wrapper"> 
				  <span>How Did You Hear About Us?</span>
                  <select name="referred" >
                    <option value="">-- Please Select --</option>
                    <option <?php echo $referred=='Google'?'selected':''; ?> >Google</option>
                    <option <?php echo $referred=='Yelp'?'selected':''; ?> >Yelp</option>
                    <option <?php echo $referred=='Facebook'?'selected':''; ?> >Facebook</option>
                    <option <?php echo $referred=='The Knot'?'selected':''; ?> >The Knot</option>
                    <option <?php echo $referred=='Friend Referral'?'selected':''; ?> >Friend Referral</option>
                    <option <?php echo $referred=='Saw us at Event'?'selected':''; ?> >Saw us at Event</option>
                    <option <?php echo $referred=='Other'?'selected':''; ?> >Other</option>
                  </select>
                </div> 
                <div class="wrapper"> 
				  <span>Favorite PhotoFace</span>
                  <select name="photoface" >
                    <option value="">-- Please Select --</option>
                    <option <?php echo $photoface=='Happy'?'selected':''; ?> >Happy</option>
                    <option <?php echo $photoface=='Sad'?'selected':''; ?> >Sad</option>
                    <option <?php echo $photoface=='Confused'?'selected':''; ?> >Confused</option>
                    <option <?php echo $photoface=='Duck'?'selected':''; ?> >Duck</option>
                    <option <?php echo $photoface=='Mug Shot'?'selected':''; ?> >Mug Shot</option>
                    <option <?php echo $photoface=='Scared'?'selected':''; ?> >Scared</option>
                    <option <?php echo $photoface=='My Hero'?'selected':''; ?> >My Hero</option>
                    <option <?php echo $photoface=='Blue Steel'?'selected':''; ?> >Blue Steel</option>
                    <option <?php echo $photoface=='Magnum'?'selected':''; ?> >Magnum</option>
                  </select>
                </div> 
                <div class="textarea_box"> 
                  <span>Comments</span>
                  <textarea name="message" value="<?php echo htmlentities($message) ?>"></textarea>
                </div>
                <input type="reset" name="clear" class="button" value="Clear"> <input type="submit" name="submit" class="button" Value="Send" >
                </div>
            </form>
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
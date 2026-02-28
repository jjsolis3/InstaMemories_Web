<?php require_once('includes/initialize.php'); ?>

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
            <form id="search" action="#" method="post">
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
        
               <?php include('includes/quote_script.php'); ?>
               <?php include_layout_template('quoteform.php'); ?>
               

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
	include_layout_template('layout/footer.php');
 ?>
  <!-- / footer -->
</div>
<script type="text/javascript">Cufon.now();</script></body>
</html>
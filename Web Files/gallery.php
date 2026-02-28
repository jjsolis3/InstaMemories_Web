<?php require_once('includes/initialize.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="INDEX,FOLLOW" />
<title>Insta-Memories | Gallery</title>
<meta charset="utf-8">
<meta name="keywords" content="Insta-Memories, insta-memories PhotoBooth, Photo Booth, PhotoBooth, San Fernando Valley, San Fernando, Arleta, Northridge, Los Angeles" />
<link rel="stylesheet" href="/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="/css/prettyPhoto.css" type="text/css" media="all">
<link rel="stylesheet" href="/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
<link href="/css/gallery.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Terminal_Dosis_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script src="js/roundabout.js" type="text/javascript"></script>
<script src="js/roundabout_shapes.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.2.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/hover-image.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg {behavior:url("js/PIE.htc")}</style>
<![endif]-->
</head>
<body id="page3">
<div class="body1">
  <div class="body2">
    <div class="body3">
      <div class="main">
        <!-- header -->
			  <?php include_layout_template('header_gallery.php'); ?>
        <!-- / header-->
        <!-- content -->
          <div class="line1 wrapper">
            <div class="wrapper tabs">
        <!-- Gallery Pictures -->    
              <?php include_menu_template('eventListMenu.php'); ?>
              
              <?php include_menu_template('content.php'); ?>
                                                      
        <!-- Corporate Pictures -->
              
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<div class="body4">
  <div class="main">
    <section id="content2"> </section>
  </div>
</div>
<!-- / content -->
<div class="main">
  <!-- footer -->

<?php include_layout_template('footer.php'); ?>
  <!-- / footer -->
</div>
<script type="text/javascript">Cufon.now();</script>
<script type="text/javascript">
$(document).ready(function () {
    $('#myRoundabout').roundabout({
        shape: 'square',
        minScale: 0.93, // tiny!
        maxScale: 1, // tiny!
        easing: 'easeOutExpo',
        clickToFocus: 'true',
        focusBearing: '0',
        duration: 800,
        reflect: true
    });
    tabs.init();
    // for lightbox
    if ($("a[rel^='prettyPhoto']").length) {
        $(document).ready(function () {
            // prettyPhoto
            $("a[rel^='prettyPhoto']").prettyPhoto({
                theme: 'light_square'
            });
        });
    }
});
</script>
<script>

document.oncontextmenu = function(e){
	var target = (typeof e !="undefined")? e.target: event.srcElement
	if (target.tagName == "IMG" || (target.tagName == 'A' && target.firstChild.tagName == 'IMG'))
		return false

}

</script>
</body>
</html>
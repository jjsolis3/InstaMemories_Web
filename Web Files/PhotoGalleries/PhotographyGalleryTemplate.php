<?php require_once('../includes/initialize.php');


?>


<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
<title>Insta-Memories | <?php echo $event_title ?></title>

<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<link href="../css/gallery.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script>
<script type="text/javascript" src="../js/Terminal_Dosis_300.font.js"></script>
<script type="text/javascript" src="../js/atooltip.jquery.js"></script>
<script src="../js/roundabout.js" type="text/javascript"></script>
<script src="../js/roundabout_shapes.js" type="text/javascript"></script>
<script src="../js/jquery.easing.1.2.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="../js/hover-image.js"></script>
<script type="text/javascript" src="../js/tabs.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg {behavior:url("js/PIE.htc")}</style>
<![endif]-->

</head>
<body id="page8">
<div class="body1">
  <div class="body2">
    <div class="body3">
      <div class="main">
        <!-- header -->
        <?php
		//Event Information
		$event_title = "#Mr & Mrs Stein's Wedding";
		$event_date = "09.07.2019";
		$path_date = "2019.09.07/";
		
		$fid = 2;
		
		//Zip Download
		$zip_name = "SteinWedding.zip";
		$download_zip = "/images/";
		
		//Download Image
		//$download_img = "/images/2018.08.18/gallery/HD/";
		
		//per page
		$per_page = 15;
		
		//sql query
		$result = $database->query("SELECT * FROM photography WHERE fid=\"{$fid}\" ORDER BY  `photography`.`id` ASC ");
		
		//total number of pictures
		$total_results = $database->num_rows($result);
		
		//total pages we going to have
		$total_pages = ceil($total_results / $per_page);
				
		?>
        <?php
						
		//-------------if page is setcheck------------------//
		if (isset($_GET['page'])) {
			$show_page = $_GET['page']; //current page
			if ($show_page > 0 && $show_page <= $total_pages) {
				$start = ($show_page - 1) * $per_page;
				$end = $start + $per_page;
			} else {
				// error - show first set of results
				$start = 0;              
				$end = $per_page;
			}
		} else {
			// if page isn't set, show first set of results
			$start = 0;
			$end = $per_page;
		}
		// display pagination
		$page = intval($_GET['page']);
		$tpages=$total_pages;
		if ($page <= 0)
			$page = 1;
		 
		?>
                        
        <header>
          <div class="wrapper">
            <h1><a href="../index.php" id="logo"></a></h1>
            <!--<form  action="../login/includes/userAccount.php" method="post">
              <div align="right">
                <input type="submit" class="submit" name="accountInfo" value="ACCOUNT">
                <input type="submit" class="submit" name="logoutSubmit" value="LOGOUT">
              </div>
            </form>-->
            <nav>
              <ul id="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="../gallery.php">Gallery</a></li>
                <li><a href="../pricing.php">Pricing</a></li>
                <li><a href="../faq.php">FAQ</a></li>
                <li class="end"><a href="../contact.php">Contact</a></li>
              </ul>
            </nav>
          </div>
        </header>
        <!-- / header-->
        <!-- content -->
        <section id="content">
          <div class="line1 wrapper">
            <div class="wrapper tabs">
            
              <article class="col1">
                <h2>Pages</h2>
                <div class="pad">
                	<?php
						$reload = $_SERVER['PHP_SELF'] . "?";
						echo '<ul class="paginate">';
						if ($total_pages > 1) {
							echo paginate($reload, $show_page, $total_pages);
						}
						echo "</ul></div></article>";
					?>

             <article class="col2 pad_left1 tab-content" id="<?php $page; ?>">                 
              	<h2><?php echo "$event_title  |  $event_date"; ?></h2>
                  
					<?php
						// display data in table
					  	echo "<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\">";
						 echo "<tr class=\"gallerysgl\">";
						// loop through results of database query, displaying them in the table 
						for ($i = $start; $i < $end; $i++) {
							// make sure that PHP doesn't try to show results that don't exist
							if ($i == $total_results) {
								break;
							}
							
							// echo out the contents of each row into a table
							echo '<td class="container"><a href="../images/'.db_result($result, $i, 'folder').'/'.db_result($result, $i, 'filename').'" class="lightbox-image" rel="prettyPhoto[group1]" ><img src="../images/'.db_result($result, $i, 'folder').'/'.db_result($result, $i, 'filename').'" class="img" alt=""></a><a href="../images/'.db_result($result, $i, 'folder').'/hd/'.db_result($result, $i, 'filename').'" download>Download Photo</a>  ';
						}       
						 echo "</tr>";
						 echo "<tr height=\"50\"></tr>";
						 //echo "<tr><th><a href=\"" .$download_zip. "" .$path_date. "" .$zip_name. "\">Download All Pics</a></th></tr>";
						 echo "<tr><th>* Downloaded images will not have the Insta-Memories watermark</th></tr>";
						
						// close table
						echo "</table>";
					// pagination
					?>     
                </article>    
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
<?php
	include_layout_template('footer.php');
 ?>
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

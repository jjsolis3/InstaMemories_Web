        <header>
          <div class="wrapper">
            <h1><a href="index.php" id="logo"></a></h1>
             <form action="/cgi-bin/entropysearch.cgi" target="_self" id="search">
              <div>
                <input type="submit" class="submit" value="">
                <input class="input" type="text" name="query" value="Site Search" onBlur="if(this.value=='') this.value='Site Search'" onFocus="if(this.value =='Site Search' ) this.value=''">
                <input type="hidden" name="user" value="bigtime774">
  				<input type="hidden" name="basehref" value="http://www.insta-memories.com"> 			
              </div>
            </form>
            <nav>
              <ul id="menu">
                <li><a href="news.php">News</a></li>
                <li><a href="about.php">About</a></li>
                <li id="active"><a href="gallery.php">Gallery</a></li>
                <li><a href="pricing.php">Pricing</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li class="end"><a href="contact.php">Contact</a></li>
              </ul>
            </nav>
          </div>
          	<?php include_layout_template('roundAboutGal.php'); ?> 
        </header>
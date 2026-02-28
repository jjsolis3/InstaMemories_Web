          <div class="wrapper">
            <h2>Request a Quote</h2>
              <p>
					What is the hold up?! Reserve an Insta-Memories PhotoBooth for you party or event today!<br>
					Fill in the information below to receive  a quote</p>
          	  </p>
            	</span>
            <form action="../quoterequest.php" method="post" id="RequestForm" >
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
                    <option value="Wedding">Wedding</option>
                    <option value="Birthday">Birthday</option>
                    <option value="Corporate Event">Corporate Event</option>
                    <option value="Holiday Party">Holiday Party</option>
                    <option value="Company Party">Company Party</option>
                    <option value="Sweet 16">Sweet 16</option>
                    <option value="Scholl Dance">School Dance</option>
                    <option value="Quinceanera">Quinceanera</option>
                    <option value="Engagement">Engagement</option>
                    <option value="Bar/Bat Mitzvah">Bar/Bat Mitzvah</option>
                    <option value="Festival">Festival</option>
                    <option value="Non-Profit Event">Non-Profit Event</option>
                    <option value="Anniversary">Anniversary</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Retail">Retail</option>
                    <option value="Retirement">Retirement</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="wrapper"> 
                  <span>Date of Event</span>                  
                  <input type="text" class="input" name="date" v>
                </div>
                <div class="wrapper">
				  <span>Event Location</span>
				  <input type="text" class="input" name="location" >
				</div>
                <div class="wrapper">
				  <span>Hours of Service</span>
				  <input type="text" class="input" name"hours" >
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
                    <option value="Google">Google</option>
                    <option value="Yelp">Yelp</option>
                    <option value="Facebook">Facebook</option>
                    <option value="The Knot">The Knot</option>
                    <option value="Friend Referral">Friend Referral</option>
                    <option value="Saw us at Event">Saw us at an Event</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="wrapper">
				  <span>Offer Code</span>
				  <input type="text" class="input" name"offer">
				</div>
                <div class="textarea_box"> 
                  <span>Comments</span>
                  <textarea name="comment"></textarea>
                </div>
                <input type="reset" name="clear" class="button" value="Clear"> <input type="submit" name="submit" class="button" Value="Send">
                </div>
            </form>
          </div>
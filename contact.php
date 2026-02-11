<?php include 'includes/header.php'; ?>

	<!--/Banner Section/-->
	<section class="banner">
		<div class="banner-overlay"></div>
		<div class="banner-text">
			<h2>Contact Information</h2>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li>Contact page</li>
			</ul>
		</div>
	</section><!--/Banner Section end/-->

	<!-- contact section-->
	<section class="contact">
		<div class="container">
			<div class="row">
				<div class="contact-wrapper">
					<div class="col-md-4 col-sm-4">
					    <div class="contact-item">
					    	<i class="flaticon-placeholder"></i>
					    	<h2>Our Resturent Address</h2>
					    	<p>Suite 02, Level 12, Sahera Tropical Center</p>
					    	<p>218 New Elephant Road, Dhaka</p>
					    </div><!-- contact-item -->
					</div>
					<div class="col-md-4 col-sm-4">
					    <div class="contact-item">
					    	<i class="flaticon-smartphone"></i>
					    	<h2>Our Phone Number</h2>
					    	<p>+8801111111111,02-1234567</p>
					    	<p>01111-264111</p>
					    </div><!-- contact-item -->
					</div>
					<div class="col-md-4 col-sm-4">
					    <div class="contact-item">
					    	<i class="flaticon-opened-email-envelope"></i>
					    	<h2>Our Website Address</h2>
					    	<p>support@example</p>
					    	<p>http://example.com</p>
					    </div><!-- contact-item -->
					</div>
					<form class="contact-form">
						<div class="col-md-4">
							<input class="input-box" type="text" name="Name" placeholder="Your Name*">
						</div>
						<div class="col-md-4">
							<input class="input-box" type="text" name="mail" placeholder="Your Email*">
						</div>
						<div class="col-md-4">
							<input class="input-box" type="text" name="mobile" placeholder="Mobile Number*">
						</div>
						<div class="col-md-12">
							<textarea rows="8" placeholder="Messages" aria-required="true" autocomplete="off"></textarea>
						</div>
						<input type="submit" class="button" value="Post comment">
					</form><!-- contact-form -->
				</div><!-- contact-info-wrapper -->
			</div>
		</div><!-- continer -->
	</section><!-- contact section end-->

	<div class="contact-page-map">
		<div id="map"></div>
	</div>

<?php include 'includes/footer.php'; ?>
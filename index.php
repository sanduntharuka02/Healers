<?php session_start(); ?>
<?php include 'includes/header.php'; ?>
<style type="text/css">
button.btn.btn-primary.add-to-cart-button {
    background-color: orange;
    color: white;
    border: none;
   padding: 10px 30px;
}
.product-card {
    background-color: #f7f7f7;
    border: 0px none transparent !important;
    margin-bottom: 40px;
    margin-top: 40px;
    padding-bottom: 33px !important;
}
label {
    color: black;
    font-size: 16px;
}
.category_block1{
	background-image: url("catelog/images/home_banner/_b1 copy 2 new.jpg");
	background-size: 100% auto;
    background-position: center center;
    background-repeat: no-repeat;
    padding: 100px 50px;
}
.category_block2{
	background-image: url("catelog/images/home_banner/_b2 copy.jpg");
	background-size: 100% auto;
    background-position: center center;
    background-repeat: no-repeat;
    padding: 100px 50px;
}
.category_block3{
	background-image: url("catelog/images/home_banner/_b3 copy.jpg");
    background-size: 100% auto;
    background-position: center center;
    background-repeat: no-repeat;
    padding: 100px 50px;
}
.category_block1 div h1, .category_block2 div h1, .category_block3 div h1{
	font-family: 'Indie Flower', sans-serif !important;
	font-size: 80px;
	padding-bottom: 5px;
	color: black;
	font-weight: bold;
}
.category_block1 div h3,  .category_block2 div h3, .category_block3 div h3{
	color: black;
}
</style>	

			<!-- slider -->
			<section class="slider" style="height: ">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		 	<!-- Indicators -->
		  	<ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  	</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
			    <div class="item active slide1">
			    	<div class="slider-overlay">
			    		<div class="banner-content">
			    			<i class="flaticon-chef"></i>
			    			<h3>Welcome To our Restaurant</h3>
			    			<h2>Its all About Good Food & Taste</h2>
			    			<p>Appiately architect stand alone architectures clicks mortar awesome ebusiness Interactively redefine world class outsourcing after</p>
			    			<div class="slider-btn">
			    				<button type="submit" class="button">Learn More</button>
			    			</div>
			    		</div><!-- banner-content -->
			    	</div><!-- slider-overlay -->
			    </div>
			    <div class="item slide2">
			    	<div class="slider-overlay">
			    		<div class="banner-content">
			    			<i class="flaticon-pasta"></i>
			    			<h3>Welcome To our Restaurant</h3>
			    			<h2>Eatin' Good in the Tomato</h2>
			    			<p>Appiately architect stand alone architectures clicks mortar awesome ebusiness Interactively redefine world class outsourcing after</p>
			    			<div class="slider-btn">
			    				<button type="submit" class="button">Learn More</button>
			    			</div>
			    		</div><!-- banner-content -->
			    	</div><!-- slider-overlay -->
			    </div>
			    <div class="item slide3">
			    	<div class="slider-overlay">
			    		<div class="banner-content">
			    			<i class="flaticon-food-4"></i>
			    			<h3>Welcome To our Restaurant</h3>
			    			<h2>We Provide Awesome Food</h2>
			    			<p>Appiately architect stand alone architectures clicks mortar awesome ebusiness Interactively redefine world class outsourcing after</p>
			    			<div class="slider-btn">
			    				<button type="submit" class="button">Learn More</button>
			    			</div>
			    		</div><!-- banner-content -->
			    	</div><!-- slider-overlay -->
			    </div>
			</div>

		  	<!-- Controls -->
		  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    	<span class="fa fa-angle-left" aria-hidden="true"></span>
		    	<span class="sr-only">Previous</span>
		  	</a>
		  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    	<span class="fa fa-angle-right" aria-hidden="true"></span>
		    	<span class="sr-only">Next</span>
		 	</a>
		</div>
	</section><!-- slider end -->

<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3">
            <img src="catelog/images/home_banner/b1 copy.png" alt="side_banner" style="width: 100%; height: auto; margin: 100px 0px;">
			<img src="catelog/images/home_banner/b2 copy.png" alt="side_banner" style="width: 100%; height: auto;">
</div>
<div class="col-lg-9 col-md-9">

<!-- category blocks start -->

<div class="container">
	<div class="row category_block2" style="margin-top: 90px;">
		<div class="col-lg-4 col-md-4"></div>
		<div class="col-lg-8 col-md-8">

			<h1 style="color: #ff002d;">Fruit Juice</h1>
			<h3>Fresh Squeezed Bliss</h3>

		</div>
	</div>
</div>

<!-- category blocks end -->

<div class="container" style="margin: 50px auto;">
		<div class="row">

			<?php

			require_once "db.php";

			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT * FROM products WHERE category LIKE '%Fruit Juice%'";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$count = 0;

			  while($row = $result->fetch_assoc()) {
			  	  if ($row["status"] != 0){
				   /* echo "<img src='images/baba.jpg'>";*/
				   echo "<div class='col-lg-3 col-md-3 col-sm-12'>";
				   	echo "<div class='product-card' style='border: 2px solid black; padding: 40px 40px;'>";
				   		echo "<a href='viewProduct.php?id=".$row["id"]."' >";
					   		echo "<label style='color: black; font-size: 16px; font-weight: bold; padding-bottom: 20px;'>".$row["product_name"]."</label><br>";
					   		echo "<div style='text-align: center;'><img src='catelog/images/products/".$row["product_image"]."' style='width:100%; height:auto; margin-bottom: 35px;'/><br></div>";
					   		echo "<label style='color: black; font-size: 16px; font-weight: 400; position: padding:20px 0px; padding-top:40px'>LKR ".$row["price"]."/=</label><br>";
					   		//echo "<label>".$row["color"]."</label><br>";
					   		//echo "<input type='number'/>";
					   	echo "</a>";
				   		/*echo "<button>Add to card</button><br>";*/


				   		?> 

				   		<!-- AJAX ADD TO CART PROCESS -->
				   		<?php if ($row["stock"] > 1){ ?>

                              <form class="product-card-form" style="padding: 10px 10px 10px 0px;">
                                 <div class="common-product-card" style="font-size:14px !important;text-align:right;">
                                    <input type="number" class="quantity-box" name="quantity" min="1" max="<?php echo $row["stock"];?>" value='1' style="display:inline-block;float:left;width:30px; position: relative; top:7px;"></input>
                                    <input type="hidden" name="hidden_product_id" value="<?php echo $row["id"];?>">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"];?>">
                                    <input type="hidden" name="hidden_cost_price" value="<?php echo $row["cost_price"];?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                    <input type="hidden" name="hidden_size" value="<?php echo $row["size"];?>">
                                    <input type="hidden" name="hidden_color" value="<?php echo $row["color"];?>">
                                    <input type="hidden" name="hidden_pcs" value="<?php echo $row["pcs"];?>">
                                    <input type="hidden" name="hidden_weight" value="<?php echo $row["weight"];?>">
                                    <button type="button" class="btn btn-primary add-to-cart-button all-product-btn" style="display:inline-block;float:right;">
                                      Add to Cart
                                    </button>
                                  <br>
                                </div>
                              </form>

                              <?php }else{ ?>
                                <div class="common-product-card mob-center" style="padding-bottom:10px !important;font-size:14px !important;text-align:center;">
                                    <label style="font-weight:bold;color:#FB2853;font-size:16px !important;">Out of Stock&nbsp;&nbsp;
                                    <a href="whats-new.php" class="btn btn-primary" style="padding: 3px 7px !important;color:#ffffff !important;">
                                        New Items
                                    </a>
                                </div>
                              <?php } ?>

                              <!-- AJAX ADD TO CART PROCESS -->

				   		<?php


				   	echo "</div>";
				   echo "</div>";
				    
				   $count++;
					// Close row after every 4 cards
					if ($count % 4 == 0) {
						echo "</div><div class='row'>";
					}
				  }


			  }

			}

			?>
		</div>
</div>

<!-- category blocks start -->

<div class="container">
	<div class="row category_block1">
	<div class="col-lg-4 col-md-4"></div>
		<div class="col-lg-8 col-md-8">

			<h1 style="color: #b92a2a;">Popsicle</h1>
			<h3>Cool Bites of Happiness</h3>

		</div>
	</div>
</div>

<!-- category blocks end -->

<div class="container" style="margin: 50px auto;">
		<div class="row">

			<?php

			require_once "db.php";

			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT * FROM products WHERE category LIKE '%Popsical%'";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$count = 0;

			  while($row = $result->fetch_assoc()) {
			  	  if ($row["status"] != 0){
				   /* echo "<img src='images/baba.jpg'>";*/
				   echo "<div class='col-lg-3 col-md-3 col-sm-12'>";
				   	echo "<div class='product-card' style='border: 2px solid black; padding: 40px 40px;'>";
				   		echo "<a href='viewProduct.php?id=".$row["id"]."' >";
					   		echo "<label style='color: black; font-size: 16px; font-weight: bold; padding-bottom: 20px;'>".$row["product_name"]."</label><br>";
					   		echo "<div style='text-align: center;'><img src='catelog/images/products/".$row["product_image"]."' style='width:100%; height:auto; margin-bottom: 35px;'/><br></div>";
					   		echo "<label style='color: black; font-size: 16px; font-weight: 400; position: padding:20px 0px; padding-top:40px'>LKR ".$row["price"]."/=</label><br>";
					   		//echo "<label>".$row["color"]."</label><br>";
					   		//echo "<input type='number'/>";
					   	echo "</a>";
				   		/*echo "<button>Add to card</button><br>";*/


				   		?> 

				   		<!-- AJAX ADD TO CART PROCESS -->
				   		<?php if ($row["stock"] > 1){ ?>

                              <form class="product-card-form" style="padding: 10px 10px 10px 0px;">
                                 <div class="common-product-card" style="font-size:14px !important;text-align:right;">
                                    <input type="number" class="quantity-box" name="quantity" min="1" max="<?php echo $row["stock"];?>" value='1' style="display:inline-block;float:left;width:30px; position: relative; top:7px;"></input>
                                    <input type="hidden" name="hidden_product_id" value="<?php echo $row["id"];?>">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"];?>">
                                    <input type="hidden" name="hidden_cost_price" value="<?php echo $row["cost_price"];?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                    <input type="hidden" name="hidden_size" value="<?php echo $row["size"];?>">
                                    <input type="hidden" name="hidden_color" value="<?php echo $row["color"];?>">
                                    <input type="hidden" name="hidden_pcs" value="<?php echo $row["pcs"];?>">
                                    <input type="hidden" name="hidden_weight" value="<?php echo $row["weight"];?>">
                                    <button type="button" class="btn btn-primary add-to-cart-button all-product-btn" style="display:inline-block;float:right;">
                                      Add to Cart
                                    </button>
                                  <br>
                                </div>
                              </form>

                              <?php }else{ ?>
                                <div class="common-product-card mob-center" style="padding-bottom:10px !important;font-size:14px !important;text-align:center;">
                                    <label style="font-weight:bold;color:#FB2853;font-size:16px !important;">Out of Stock&nbsp;&nbsp;
                                    <a href="whats-new.php" class="btn btn-primary" style="padding: 3px 7px !important;color:#ffffff !important;">
                                        New Items
                                    </a>
                                </div>
                              <?php } ?>

                              <!-- AJAX ADD TO CART PROCESS -->

				   		<?php


				   	echo "</div>";
				   echo "</div>";
				    
				   $count++;
				   // Close row after every 4 cards
				   if ($count % 4 == 0) {
					   echo "</div><div class='row'>";
				   }
				  }


			  }

			}

			?>
		</div>
</div>


<!-- category blocks start -->

<div class="container">
	<div class="row category_block3">
		<div class="col-lg-8 col-md-8">

			<h1 style="color: #b54242;">Herbal Tea</h1>
			<h3>Herbal Infusions for Mind and Body</h3>

		</div>
		<div class="col-lg-4 col-md-4"></div>
	</div>
</div>

<!-- category blocks end -->

<div class="container" style="margin: 50px auto;">
		<div class="row">

			<?php

			require_once "db.php";

			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT * FROM products WHERE category LIKE '%Herble Tea%'";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$count = 0;

			  while($row = $result->fetch_assoc()) {
			  	  if ($row["status"] != 0){
				   /* echo "<img src='images/baba.jpg'>";*/
				   echo "<div class='col-lg-3 col-md-3 col-sm-12'>";
				   	echo "<div class='product-card' style='border: 2px solid black; padding: 40px 40px;'>";
				   		echo "<a href='viewProduct.php?id=".$row["id"]."' >";
					   		echo "<label style='color: black; font-size: 16px; font-weight: bold; padding-bottom: 20px;'>".$row["product_name"]."</label><br>";
					   		echo "<div style='text-align: center;'><img src='catelog/images/products/".$row["product_image"]."' style='width:100%; height:auto; margin-bottom: 35px;'/><br></div>";
					   		echo "<label style='color: black; font-size: 16px; font-weight: 400; position: padding:20px 0px; padding-top:40px'>LKR ".$row["price"]."/=</label><br>";
					   		//echo "<label>".$row["color"]."</label><br>";
					   		//echo "<input type='number'/>";
					   	echo "</a>";
				   		/*echo "<button>Add to card</button><br>";*/


				   		?> 

				   		<!-- AJAX ADD TO CART PROCESS -->
				   		<?php if ($row["stock"] > 1){ ?>

                              <form class="product-card-form" style="padding: 10px 10px 10px 0px;">
                                 <div class="common-product-card" style="font-size:14px !important;text-align:right;">
                                    <input type="number" class="quantity-box" name="quantity" min="1" max="<?php echo $row["stock"];?>" value='1' style="display:inline-block;float:left;width:30px; position: relative; top:7px;"></input>
                                    <input type="hidden" name="hidden_product_id" value="<?php echo $row["id"];?>">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"];?>">
                                    <input type="hidden" name="hidden_cost_price" value="<?php echo $row["cost_price"];?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                    <input type="hidden" name="hidden_size" value="<?php echo $row["size"];?>">
                                    <input type="hidden" name="hidden_color" value="<?php echo $row["color"];?>">
                                    <input type="hidden" name="hidden_pcs" value="<?php echo $row["pcs"];?>">
                                    <input type="hidden" name="hidden_weight" value="<?php echo $row["weight"];?>">
                                    <button type="button" class="btn btn-primary add-to-cart-button all-product-btn" style="display:inline-block;float:right;">
                                      Add to Cart
                                    </button>
                                  <br>
                                </div>
                              </form>

                              <?php }else{ ?>
                                <div class="common-product-card mob-center" style="padding-bottom:10px !important;font-size:14px !important;text-align:center;">
                                    <label style="font-weight:bold;color:#FB2853;font-size:16px !important;">Out of Stock&nbsp;&nbsp;
                                    <a href="whats-new.php" class="btn btn-primary" style="padding: 3px 7px !important;color:#ffffff !important;">
                                        New Items
                                    </a>
                                </div>
                              <?php } ?>

                              <!-- AJAX ADD TO CART PROCESS -->

				   		<?php


				   	echo "</div>";
				   echo "</div>";
				    
				   $count++;
				   // Close row after every 4 cards
				   if ($count % 4 == 0) {
					   echo "</div><div class='row'>";
				   }
				  }


			  }

			}

			?>
		</div>
</div>


</div>
</div>
</div>

	<!-- newslatter section-->
<section class="newslatter">
		<div class="section-overlay section-padding" style="background-color: #f7f7f7; display:none;">
			<div class="container">
				<div class="row">
					<div class="section-head">
						<i class="flaticon-cutlery"></i>
						<h2>Subscribe For Newslatter</h2>
						<p>Rapidiously plagiarize scalable manufactured products for realtime ramatically 
						actualize open-source metrics through fully tested vortals.</p>
					</div><!-- section-head -->
					<form>
						<div class="newslatter-input">
							<input class="input-box" type="text" placeholder="Enter Your Email Address Here ..">
							<button class="button">Subscribe now</button>
							<i class="fa fa-envelope-o"></i>
						</div><!-- ewslatter input -->
					</form>
				</div>
			</div>
		</div>
	</section>
<!-- newslatter section end-->

<?php include 'includes/footer.php'; ?>
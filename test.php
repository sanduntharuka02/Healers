<!-- My Test Dynamic Product Cards start -->

<div class="container">
				<div class="row">
					

			<?php

			require_once "db.php";

			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT * FROM products";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

			  while($row = $result->fetch_assoc()) {
			  	  if ($row["status"] != 0){
				   /* echo "<img src='images/baba.jpg'>";*/
				   echo "<div class='col-lg-4 col-md-4 col-sm-12'>";
				   	echo "<div class='product-card' style='border: 2px solid black; padding: 40px 40px;'>";
				   		echo "<a href='viewProduct.php?id=".$row["id"]."' >";
					   		echo "<label style='color: black; font-size: 16px; font-weight: bold; padding-bottom: 20px;'>".$row["product_name"]."</label><br>";
					   		echo "<div style='text-align: center;'><img src='catelog/images/products/".$row["product_image"]."' style='width:100%; height:350px;'/><br></div>";
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
                                    <input type="number" class="quantity-box" name="quantity" min="1" max="<?php echo $row["stock"];?>" value='1' style="display:inline-block;width:50px;float:left;width:60px; position: relative; top:7px;"></input>
                                    <input type="hidden" name="hidden_product_id" value="<?php echo $row["id"];?>">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"];?>">
                                    <input type="hidden" name="hidden_cost_price" value="<?php echo $row["cost_price"];?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                    <input type="hidden" name="hidden_size" value="<?php echo $row["size"];?>">
                                    <input type="hidden" name="hidden_color" value="<?php echo $row["color"];?>">
                                    <input type="hidden" name="hidden_pcs" value="<?php echo $row["pcs"];?>">
                                    <input type="hidden" name="hidden_weight" value="<?php echo $row["weight"];?>">
                                    <button type="button" class="add-to-cart-button all-product-btn" style="display:inline-block;float:right;">
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
				    
				  }


			  }

			}

			?>
				</div>
		</div>

	<!-- My Test Dynamic Product Cards end -->

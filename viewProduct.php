<?php session_start(); ?>
<?php include 'includes/header.php'; ?>
<style type="text/css">
.view-product-right{
  text-align: left;
  line-height: 2.8em;
}
.view-product-key{
  font-size: 17px;
  color: black;
  font-weight: bold;
}
.view-product-value{
  font-weight: 400 !important;
}
button.btn.btn-primary.add-to-cart-button {
    background-color: orange;
    color: white;
    border: none;
   padding: 10px 30px;
}

</style>
<?php

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";  
}else{
    $url = "http://";  
}

// Append the host(domain name, ip) to the URL.  
$url.= $_SERVER['HTTP_HOST'];  
// Append the requested resource location to the URL  
$url.= $_SERVER['REQUEST_URI'];    

//echo "<script>window.alert('$url');</script>";

$components = parse_url($url);
parse_str($components['query'], $results);
$filterParamValue = $results['id'];

//echo "<script>window.alert('$filterParamValue');</script>";

$relatedProducts = '';
$relatedCategory = '';
?>
        <div class="container">
                <div class="row">
                    <?php

            require_once "db.php";

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM products WHERE id=$filterParamValue LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {
                  if ($row["status"] != 0){
                    ?>

                    <div class='col-lg-6 col-md-6 col-sm-12'>
                         <?php
                            
                            echo "<img src='catelog/images/products/".$row["product_image"]."' style='width:80%; height:auto; margin:40px 10px;'/><br>";
                            
                        ?>
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-12 view-product-right' style="padding-top: 40px;">

                        <?php
                            echo "<label class='view-product-key'><span class='view-product-value'>Category : </span>".$row["category"]."</label><br>";
                            echo "<label class='view-product-key'><span class='view-product-value'>Product Brand Name : </span>".$row["brand_name"]."</label><br>";
                            echo "<label class='view-product-key' style='font-size:36px; color:black;'><span></span>".$row["product_name"]."</label><br><br>";
                            echo "<label class='view-product-key'><span class='view-product-value'>Price : </span>LKR ".$row["price"]."/=</label><br>";
                            echo "<label class='view-product-key'><span class='view-product-value'>Product Weight : </span>".$row["weight"]."</label><br><br>";

                            //echo "<input type='number' style='width: 60px;height: 36px;margin-right: 10px;'/>";

                            //-----------------------

                            // echo "<td><img style='width:40px;height:auto' src='catelog/images/products/".$row["product_image"]."'></img></td>
                            // <td>".$row["category"]."</td>
                            // <td>".$row["sub_category"]."</td>
                            // <td>".$row["brand_name"]."</td>
                            // <td>".$row["product_name"]."</td>
                            // <td style='text-align: right;'>".$row["cost_price"]."</td>
                            // <td style='text-align: right;'>".$row["price"]."</td>
                            // <td style='text-align: right;'>".$row["discount"]."</td>
                            // <td style='text-align: right;'>".$row["size"]."</td>
                            // <td style='text-align: right;'>".$row["size_extra_small"]."</td>
                            // <td style='text-align: right;'>".$row["size_small"]."</td>
                            // <td style='text-align: right;'>".$row["size_medium"]."</td>
                            // <td style='text-align: right;'>".$row["size_large"]."</td>
                            // <td style='text-align: right;'>".$row["size_xl"]."</td>
                            // <td style='text-align: right;'>".$row["size_2xl"]."</td>
                            // <td>".$row["color"]."</td>
                            // <td style='text-align: right;'>".$row["pcs"]."</td>
                            // <td style='text-align: right;'>".$row["weight"]." KG</td>
                            // <td>".$row["supplier_class"]."</td>
                            // <td style='text-align: right;'>".$row["stock"]."</td>
                            // <td style='text-align: right;'>".$row["initial_stock"]."</td>
                            // <td style='text-align: right;'>".$row["feature_1_name"]."</td>
                            // <td style='text-align: right;'>".$row["feature_1_value"]."</td>
                            // <td style='text-align: right;'>".$row["feature_2_name"]."</td>
                            // <td style='text-align: right;'>".$row["feature_2_value"]."</td>
                            // <td style='text-align: right;'>".$row["feature_3_name"]."</td>
                            // <td style='text-align: right;'>".$row["feature_3_value"]."</td>
                            // <td style='text-align: right;'>".$row["feature_4_name"]."</td>
                            // <td style='text-align: right;'>".$row["feature_4_value"]."</td>
                            // <td>".$row["description"]."</td>
                            // <td>".$row["status"]."</td>";

                            //-----------------------
                    
                        //echo "<button class='btn btn-dark all-product-btn'>Add to card</button><br>";
                      
                              //<!-- AJAX ADD TO CART PROCESS -->
				   		                if ($row["stock"] > 1){ ?>

                              <form class="product-card-form" style="padding: 10px 10px 10px 0px;">
                                 <div class="common-product-card" style="font-size:14px !important;text-align:right; width:230px; margin-top:-36px;">
                                    <input type="number" class="quantity-box" name="quantity" min="1" max="<?php echo $row["stock"];?>" value='1' style="display:inline-block;width:50px;float:left;width:60px;position: relative;top: 2px;height: 36px;"></input>
                                    <input type="hidden" name="hidden_product_id" value="<?php echo $row["id"];?>">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"];?>">
                                    <input type="hidden" name="hidden_cost_price" value="<?php echo $row["cost_price"];?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                    <input type="hidden" name="hidden_size" value="<?php echo $row["size"];?>">
                                    <input type="hidden" name="hidden_color" value="<?php echo $row["color"];?>">
                                    <input type="hidden" name="hidden_pcs" value="<?php echo $row["pcs"];?>">
                                    <input type="hidden" name="hidden_weight" value="<?php echo $row["weight"];?>">
                                    <button type="button" class="add-to-cart-button all-product-btn" style="display:inline-block;float:right; padding: 0px 30px;">
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

                        
                    </div>
                    <?php
                    
                  }


              }

            }

            ?>
                </div>
        </div>

	<!-- My Test Dynamic Product Cards start -->

    <div class="container">
				<div class="row">
                    <h1 style='margin: 10px 0px 55px 20px;'>Related Product</h1>

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
					   		echo "<label style='color: black; font-size: 20px; font-weight: bold; padding-bottom: 20px;'>".$row["product_name"]."</label><br>";
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



<?php include 'includes/footer.php'; ?>
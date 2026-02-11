<?php session_start(); ?>
<?php include 'includes/header.php'; ?>

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
$filterParamValue = $results['filter'];

//echo "<script>window.alert('$filterParamValue');</script>";

?>

<!-- My Test Dynamic Product Cards start -->
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3">

            <!-- product filter start-->

            <div id="main_filter_box">
                           
                           <h4 style="text-align: left;margin: 0px 20px;width: 100%;">
                              
                               <b>
                              
                                   <?php
                                  
                                   if($filterParamValue == "All Products"){
                                      echo "<label style='width:100%;display:block;border-bottom: 2px solid #dfdfdf;padding-bottom: 5px;margin-bottom: 5px;'>".$filterParamValue."</label><spsn style='font-size:20px;'>All Products</span><br><br>";
                                   }else if($filterParamValue == "Fruit Juice"){
                                      echo "<label style='width:100%;display:block;border-bottom: 2px solid #dfdfdf;padding-bottom: 5px;margin-bottom: 5px;'>".$filterParamValue."</label><spsn style='font-size:20px;'>".$filterParamValue."</span><br><br>";
                                   }else if($filterParamValue == "Popsical"){
                                      echo "<label style='width:100%;display:block;border-bottom: 2px solid #dfdfdf;padding-bottom: 5px;margin-bottom: 5px;'>".$filterParamValue."</label><spsn style='font-size:20px;'>All Products</span><br><br>";
                                   }else if($filterParamValue == "Herble Tea"){
                                      echo "<label style='width:100%;display:block;border-bottom: 2px solid #dfdfdf;padding-bottom: 5px;margin-bottom: 5px;'>".$filterParamValue."</label><spsn style='font-size:20px;'>".$filterParamValue."</span><br><br>";
                                   }else{
                                      
                                   }
                                  
                                   ?>
                          
                               </b>
                              
                           </h4>
                          
                           <!--<div style="width:100%;display:block;text-align:left;">
                               <button class="btn btn-danger common-filter-button-exe" style="margin-left: 20px;margin-bottom: 40px !important;">Filter Products</button> <br>
                           </div>-->
                          
                           <h4 class="accordion-header" id="flush-headingOne" style="padding: 10px 20px;border-radius: 5px;background-color: #e3e3e3;">HEALERS Filter Panel</h4><br>
                          
                           <div class="accordion accordion-flush" id="accordionFlushExample">
                             <div class="accordion-item">
                               <h2 class="accordion-header" id="flush-headingOne">
                                 <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                   <b>Sort By:</b>
                                 </button>
                               </h2>
                               <div id="flush-collapseOne" class="accordion-collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                 <div class="accordion-body" style="text-align:left;">
                                   <input type="radio" name="main-filter-sort" class="main-filter-sort" value="All" style="margin-right: 10px;margin-bottom: 10px;">All Categories</input><br>
                                   <?php
                       require_once "db.php";
                       $sql = "SELECT * FROM products GROUP BY category";
                       $result = $conn->query($sql);
                       if ($result->num_rows > 0) {
                         while($row = $result->fetch_assoc()) {
                          if ($row["status"] != 0){
                            $this_main_category = $row["category"];
                          echo"<input type='radio' name='main-filter-sort' class='main-filter-sort' value='".$this_main_category."' style='margin-right: 10px;margin-bottom: 10px;'>".$this_main_category."</input><br>";
                        }
                         }
                       }
                       ?>
                                 </div>
                               </div>
                             </div>
                             <br>
                             <div style="width:100%;display:block;text-align:left;">
                               <a href="products.php?category=All Categories" class="btn btn-danger common-filter-button-exe" style="margin-left: 20px;">Clear Filters</a>
                             </div>
                             <br>
                             
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                                    <b>Color:</b>
                                  </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse show" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                  <div class="accordion-body" style="text-align:left;">
                                      <label class="main-filter-color" style="background-color: #242424;"><span style="display:none;">Black</span></label>
                                      <label class="main-filter-color" style="background-color: #eee;"><span style="display:none;">White</span></label>
                                      <label class="main-filter-color" style="background-color: #4678d7;"><span style="display:none;">Blue</span></label>
                                      <label class="main-filter-color" style="background-color: #57d076;"><span style="display:none;">Green</span></label><br>
                                      <label class="main-filter-color" style="background-color: #fb5858;"><span style="display:none;">Red</span></label>
                                      <label class="main-filter-color" style="background-color: #ff9ec7;"><span style="display:none;">Pink</span></label>
                                      <label class="main-filter-color" style="background-color: #f2d7b4;"><span style="display:none;">Beige</span></label>
                                      <label class="main-filter-color" style="background-color: #b9b8b7;"><span style="display:none;">Gray</span></label><br>
                                      <label class="main-filter-color" style="background-color: #c470f4;"><span style="display:none;">Purple</span></label>
                                      <label class="main-filter-color" style="background-color: #f2d975;"><span style="display:none;">Yellow</span></label>
                                      <label class="main-filter-color" style="background-color: #f29875;"><span style="display:none;">Orange</span></label>
                                      <label class="main-filter-color" style="background-color: #86e8cc;"><span style="display:none;">Aqua</span></label>
                                  </div>
                                </div>
                              </div>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="true" aria-controls="flush-collapseThree">
                                    <b>Size:</b>
                                  </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse show" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                  <div class="accordion-body" style="text-align:left;">
                                      <label class="main-filter-size" style="background-color: #242424;"><b>S</b></label>
                                      <label class="main-filter-size" style="background-color: #eee;"><b>M</b></label>
                                      <label class="main-filter-size" style="background-color: #4678d7;"><b>L</b></label>
                                      <label class="main-filter-size" style="background-color: #57d076;"><b>XL</b></label>
                                      <label class="main-filter-size" style="background-color: #fb5858;"><b>XXL</b></label>
                                  </div>
                                </div>
                              </div>
                              
                             <div class="accordion-item">
                               <h2 class="accordion-header" id="flush-headingFour">
                                 <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="true" aria-controls="flush-collapseThree">
                                   <b>Price Range:</b>
                                 </button>
                               </h2>
                               <div id="flush-collapseFour" class="accordion-collapse show" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                 <div class="accordion-body">
                                     <div id="slider"></div>
                                       <div id="values">
                                         <span id="main-filter-left-value"><b></b></span>
                                         <span id="main-filter-right-value"><b></b></span>
                                     </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                          
                           <div id="filterPanelControlBox" style="display:block;width:100%;padding:0px 20px;text-align:left;">
                               <label style="font-size:14px;width:100%;display:block;margin-bottom: 10px;"><b>Applied Filters</b></label>
                               <label style="font-size:12px;width:100%;display:block;">Sort by:</label>
                               <input type="text" value="_" class="form-control filter_parameter_sort_by_" name="filter_parameter_sort_by_" style="font-weight:bold;font-size:14px;cursor:none !importnt;width:100%;display:block;padding: 0px 0px;
                 border: 0px;"/>
                               <?php
                                if ($filterParamCategory != "Fashion and Beauty"){
                               ?>
                               <span style="display:none;">
                               <label style="font-size:12px;width:100%;display:block;">Color</label>
                               <input type="text" value="_" class="form-control filter_parameter_color_" name="filter_parameter_color_" style="font-weight:bold;font-size:14px;cursor:none !importnt;width:100%;display:block;padding: 0px 0px;
                 border: 0px;"/>
                               <label style="font-size:12px;width:100%;display:block;">Size</label>
                               <input type="text" value="_" class="form-control filter_parameter_size_" name="filter_parameter_size_" style="font-weight:bold;font-size:14px;cursor:none !importnt;width:100%;display:block;padding: 0px 0px;
                 border: 0px;"/>
                               </span>
                               <?php
                                }else{
                               ?>
                               <label style="font-size:12px;width:100%;display:block;">Color</label>
                               <input type="text" value="_" class="form-control filter_parameter_color_" name="filter_parameter_color_" style="font-weight:bold;font-size:14px;cursor:none !importnt;width:100%;display:block;padding: 0px 0px;
                 border: 0px;"/>
                               <label style="font-size:12px;width:100%;display:block;">Size</label>
                               <input type="text" value="_" class="form-control filter_parameter_size_" name="filter_parameter_size_" style="font-weight:bold;font-size:14px;cursor:none !importnt;width:100%;display:block;padding: 0px 0px;
                 border: 0px;"/>
                               <?php
                                }
                               ?>
                               <label style="font-size:12px;width:100%;display:block;">GBP min - max</label>
                               <input type="text" value="" class="form-control filter_parameter_price_range_low_" name="filter_parameter_price_range_low_" style="width: 60px;display: inline-block;margin-bottom: 20px;font-weight:bold;font-size:14px;cursor:none !importnt;padding: 0px 0px;
                 border: 0px;"/>
                               <input type="text" value="" class="form-control filter_parameter_price_range_high_" name="filter_parameter_price_range_high_" style="width: 60px;display: inline-block;margin-bottom: 20px;font-weight:bold;font-size:14px;cursor:none !importnt;padding: 0px 0px;
                 border: 0px;"/>
                               <br>
                           </div>
              
                           <div style="width:100%;display:block;text-align:left;">
                               <button class="btn btn-danger common-filter-button-exe" style="margin-left: 20px;">Filter Products</button>
                           </div>
                          
                           <br><br>
                       </div>

            <!-- product filter End-->
            
        </div>
        <div class="col-lg-9 col-md-9">
            <div class="container" style="width:100% !important;">
                <!-- product filter start-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center" style="border-bottom: 1px solid #ddd;margin-bottom: 20px;">
                                <div class="row">
                                
                                    <?php include 'ajax-filters.php'; ?>
                                
                                </div>
                            </div>
                        </div>
                 <!-- product filter End-->
                <div class="row">
                    <h1 style='margin: 55px 0px 55px 20px;'><?php echo $filterParamValue; ?></h1>

                    <?php

                    require_once "db.php";

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    //for sql global
                    $sql = "";

                    if ($filterParamValue == 'All Products'){
                        $sql .= "SELECT * FROM products";
                    }else{
                        if ($filterParamValue == 'Fruit Juice'){
                            $sql .= "SELECT * FROM products WHERE category LIKE '%Fruit Juice%'";
                        }
                        if ($filterParamValue == 'Popsical'){
                            $sql .= "SELECT * FROM products WHERE category LIKE '%Popsical%'";
                        }
                        if ($filterParamValue == 'Herble tea'){
                            $sql .= "SELECT * FROM products WHERE category LIKE '%Herble Tea%'";
                        }
                    }

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $count = 0; // Initialize counter

                        while($row = $result->fetch_assoc()) {
                            if ($row["status"] != 0){
                                echo "<div class='col-lg-3 col-md-3 col-sm-12'>";
                                echo "<div class='product-card' style='border: 2px solid black; padding: 40px 40px;'>";
                                echo "<a href='viewProduct.php?id=".$row["id"]."' >";
                                echo "<label style='color: black; font-size: 16px; font-weight: bold; padding-bottom: 20px;'>".$row["product_name"]."</label><br>";
                                echo "<div style='text-align: center;'><img src='catelog/images/products/".$row["product_image"]."' style='width:100%; height:auto; margin-bottom: 35px;'/><br></div>";
                                echo "<label style='color: black; font-size: 16px; font-weight: 400; position: padding:20px 0px; padding-top:40px'>LKR ".$row["price"]."/=</label><br>";

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

<!-- My Test Dynamic Product Cards end -->

<?php include 'includes/footer.php'; ?>

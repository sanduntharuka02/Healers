<?php
//include("auth_session.php");
include 'includes/header.php';
/*$ready_user = $_SESSION['user_type'];
if($ready_user != "Admin"){
  header("Location: index.php");
}*/
?>


<style type="text/css">
#product_file_script_styles {
  background-color: #b5b5b5;
  width: 100%;
  max-width:400px;
}
form#product_items_admin_CRUD{
  width: 900px;
  max-width: 100%;
  margin: 0 auto;
  padding: 20px;
  border-radius: 5px;
}
#product_items_admin_CRUD div div div{
  width: 48% !important;
  display: inline-block;
  vertical-align: top !important;
  padding: 0px 20px;
  padding-top: 20px !important;
}

@media(max-width: 768px){
  #product_items_admin_CRUD div div div{
    width: 100% !important;
    display: inline-block !important;
  }
}

#index_table_section {
  height: 400px !important;
}
table#index_table tbody th, table#index_table tbody td {
  max-width: 150px;
  overflow: hidden;
}
#index_table_section table tr th, #index_table_section table tr td {
  white-space: nowrap !important;
}
#product_items_admin_CRUD div div div.pricing-system{
    display:none;
}
</style>






<div class="container-fluid" style="padding: 20px 15px !important;padding-top: 70px !important;">
	<div class="row">

		<div class="col-lg-12 text-center">
			<h5><a href="adminpanel.php" style="background-color: #333333;padding: 10px 10px;color: #ffffff;font-weight: normal;font-size: 18px !important;"><strong>Back to Dashboard</strong></a></h5><br>
	      <h4>Product CRUD System</h4><br>
	    </div>

		<div class="col-lg-12" id="crud_reload_position">
			<div class="present_post_details text-left">

				<?php require_once 'models/process_products.php';?>

				<?php
					if (isset($_SESSION['message'])):
				?>

				<div class="alert-<?=$_SESSION['message_type']?>">
					<?php
						echo $_SESSION['message'];
						unset($_SESSION['message']);
					?>
				</div>

				<?php 
					endif
				?>

				<div id="crud_wrapper" style="width:100%;margin: 0 auto;">
					<form action="models/process_products.php" method="POST" id="product_items_admin_CRUD" class="form-bg-all-glass" enctype="multipart/form-data">
						<div id="crud_operation_section" style="padding-top: 30px;">
							<div class="row" style="">

								<div class="form-group">

									<input type="hidden" name="id" value="<?php echo $id;?>"></input>

									<label>Category:</label><br>
									<select name="category" style="width:100% !important;padding: 8px 10px;">

				                    <?php if ($category == ""): ?>
										<option value="Fruit Juice">Fruit Juice</option>
										<option value="Popsical">Popsical</option>
										<option value="Herble tea">Herble Tea</option>
					                    <option value="Other">Other</option>
				                    <?php else: ?>
				                    	<option value="<?php echo $category; ?>">
				                    		<?php echo $category; ?>
				                    	</option>
            				            <option value="Fruit Juice">Fruit Juice</option>
										<option value="Popsical">Popsical</option>
										<option value="Herble tea">Herble Tea</option>
					                    <option value="Other">Other</option>
									<?php endif ?>

					                </select>
								</div>

								<div class="form-group">
									<label>Sub Category:</label><br>
									<input type="text" name="sub_category"  class="form-control" value="<?php echo $sub_category; ?>"></input>
								</div>

								<div class="form-group">
									<label>Brand Name:</label><br>
									<input type="text" name="brand_name"  class="form-control" value="<?php echo $brand_name; ?>"></input>
								</div>

								<div class="form-group">
									<label>Product Name:</label><br>
									<input type="text" name="product_name" class="form-control" value="<?php echo $product_name; ?>"></input>
								</div>

								<div class="form-group" style="display: none !important;">
									<label>Capacity:</label><br>
									<input type="text" name="capacity" class="form-control" value="<?php echo $capacity; ?>"></input>
								</div>

								<div class="form-group">
									<label>Cost Price:</label><br>
									<input type="text" name="cost_price"  class="form-control" value="<?php echo $cost_price; ?>"></input>
								</div>

								<div class="form-group">
									<label>Selling Price:</label><br>
									<input type="text" name="price"  class="form-control" value="<?php echo $price; ?>"></input>
								</div>

								<div class="form-group">
									<label>Discount:</label><br>
									<input type="text" name="discount"  class="form-control" value="<?php echo $discount; ?>"></input>
								</div>

								<div class="form-group">
									<label>Color:</label><br>
									<input type="text" name="color"  class="form-control" value="<?php echo $color; ?>"></input>
								</div>

								<div class="form-group">
									<label>This Product Size :</label><br>
									<select name="size" style="width:100% !important;padding: 8px 10px;">

				                    <?php if ($size == ""): ?>
					                    <option value="S - Small">S - Small</option>
					                    <option value="M - Medium">M - Medium</option>
					                    <option value="L - Large">L - Large</option>
					                    <option value="XL - Extra Large">XL - Extra Large</option>
					                    <option value="Double XL">Double XL</option>
					                    <option value="Over Size">Over Size</option>

				                    <?php else: ?>
				                    	<option value="<?php echo $size; ?>">
				                    		<?php echo $size; ?>
				                    	</option>
            				            <option value="S - Small">S - Small</option>
					                    <option value="M - Medium">M - Medium</option>
					                    <option value="L - Large">L - Large</option>
					                    <option value="XL - Extra Large">XL - Extra Large</option>
					                    <option value="Double XL">Double XL</option>
					                    <option value="Over Size">Over Size</option>

									<?php endif ?>

					                </select>
								</div>

								<div class="form-group">
                                    <label>[ Extra Small - XS ]:</label><br>
                                    <select name="size_extra_small" style="width:100% !important;padding: 8px 10px;">
                                
                                    <?php if ($size_extra_small == ""): ?>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php else: ?>
                                        <option value="<?php echo $size_extra_small; ?>">
                                            <?php echo $size_extra_small; ?>
                                        </option>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php endif ?>
                                
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>[ Small - S]:</label><br>
                                    <select name="size_small" style="width:100% !important;padding: 8px 10px;">
                                
                                    <?php if ($size_small == ""): ?>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php else: ?>
                                        <option value="<?php echo $size_small; ?>">
                                            <?php echo $size_small; ?>
                                        </option>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php endif ?>
                                
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>[ Medium - M]:</label><br>
                                    <select name="size_medium" style="width:100% !important;padding: 8px 10px;">
                                
                                    <?php if ($size_medium == ""): ?>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php else: ?>
                                        <option value="<?php echo $size_medium; ?>">
                                            <?php echo $size_medium; ?>
                                        </option>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php endif ?>
                                
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>[ Large - L]:</label><br>
                                    <select name="size_large" style="width:100% !important;padding: 8px 10px;">
                                
                                    <?php if ($size_large == ""): ?>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php else: ?>
                                        <option value="<?php echo $size_large; ?>">
                                            <?php echo $size_large; ?>
                                        </option>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php endif ?>
                                
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>[ XL ]:</label><br>
                                    <select name="size_xl" style="width:100% !important;padding: 8px 10px;">
                                
                                    <?php if ($size_xl == ""): ?>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php else: ?>
                                        <option value="<?php echo $size_xl; ?>">
                                            <?php echo $size_xl; ?>
                                        </option>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php endif ?>
                                
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>[ XXL ]:</label><br>
                                    <select name="size_2xl" style="width:100% !important;padding: 8px 10px;">
                                
                                    <?php if ($size_2xl == ""): ?>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php else: ?>
                                        <option value="<?php echo $size_2xl; ?>">
                                            <?php echo $size_2xl; ?>
                                        </option>
                                        <option value="In_Stock">In Stock</option>
                                        <option value="Not_In_Stock">Not In Stock</option>
                                    <?php endif ?>
                                
                                    </select>
                                </div>

								<div class="form-group" style="margin:0px auto;">
									<label>Package Weight (KG):</label><br>
									<input type="text" name="weight"  class="form-control" value="<?php echo $weight; ?>" 
										style="background-color:#FFCECE;font-weight:bold;">
									</input>
								</div>

								<div class="form-group">
									<label>Supplier Class:</label><br>
									<select name="supplier_class" style="width:100% !important;padding: 8px 0px;">

				                    <?php if ($category == ""): ?>
				                    	<option value=""></option>
				                    	<option value="s-001">s-001</option>
				                    	<option value="s-002">s-002</option>
				                    	<option value="s-003">s-003</option>
				                    	<option value="s-004">s-004</option>
				                    	<option value="s-005">s-005</option>
				                    	<option value="s-006">s-006</option>
				                    	<option value="s-007">s-007</option>
				                    	<option value="s-008">s-008</option>
				                    	<option value="s-009">s-009</option>
				                    	<option value="s-010">s-010</option>
				                    	<option value="s-011">s-011</option>
				                    	<option value="s-012">s-012</option>
				                    	<option value="s-013">s-013</option>
				                    	<option value="s-014">s-014</option>
				                    	<option value="s-015">s-015</option>
				                    	<option value="s-016">s-016</option>
				                    	<option value="s-017">s-017</option>
				                    	<option value="s-018">s-018</option>
				                    	<option value="s-019">s-019</option>
				                    	<option value="s-020">s-020</option>
				                    <?php else: ?>
				                    	<option value="<?php echo $supplier_class; ?>">
				                    		<?php echo $supplier_class; ?>
				                    	</option>
				                    	<option value=""></option>
				                    	<option value="s-001">s-001</option>
				                    	<option value="s-002">s-002</option>
				                    	<option value="s-003">s-003</option>
				                    	<option value="s-004">s-004</option>
				                    	<option value="s-005">s-005</option>
				                    	<option value="s-006">s-006</option>
				                    	<option value="s-007">s-007</option>
				                    	<option value="s-008">s-008</option>
				                    	<option value="s-009">s-009</option>
				                    	<option value="s-010">s-010</option>
				                    	<option value="s-011">s-011</option>
				                    	<option value="s-012">s-012</option>
				                    	<option value="s-013">s-013</option>
				                    	<option value="s-014">s-014</option>
				                    	<option value="s-015">s-015</option>
				                    	<option value="s-016">s-016</option>
				                    	<option value="s-017">s-017</option>
				                    	<option value="s-018">s-018</option>
				                    	<option value="s-019">s-019</option>
				                    	<option value="s-020">s-020</option>
									<?php endif ?>

					                </select>
								</div>

								<div class="form-group">
									<label>Available Qty:</label><br>
									<input type="text" name="stock"  class="form-control" value="<?php echo $stock; ?>"></input>
								</div>

								<div class="form-group" style="width: calc(100% - 30px) !important;">
									<label>Image:</label><br>
									<input type="file" name="product_image" id="product_file" class="form-control"  onchange="validateProductFileExtension(this.value);" value="<?php echo $product_image; ?>" style="display:none;"></input>
									<label for="product_file" id="product_file_script_styles" class="form-control">Select Product Image</label>
								</div>

								<div class="form-group">
									<label>Product PCS:</label><br>
									<input type="text" name="pcs"  class="form-control" value="<?php echo $pcs; ?>"></input>
								</div>

								<div class="form-group">
									<label>Initial Stock:</label><br>
									<input type="text" name="initial_stock"  class="form-control" value="<?php echo $initial_stock; ?>"></input>
								</div>

								<div class="form-group">
									<label>Feature 1 Name:</label><br>
									<input type="text" name="feature_1_name"  placeholder="name" class="form-control" value="<?php echo $feature_1_name; ?>"></input>
								</div>

								<div class="form-group">
									<label>Feature 1 Value:</label><br>
									<input type="text" name="feature_1_value"  placeholder="value" class="form-control" value="<?php echo $feature_1_value; ?>"></input>
								</div>

								<div class="form-group">
									<label>Feature 2 Name:</label><br>
									<input type="text" name="feature_2_name"  placeholder="name" class="form-control" value="<?php echo $feature_2_name; ?>"></input>
								</div>

								<div class="form-group">
									<label>Feature 2 Value:</label><br>
									<input type="text" name="feature_2_value"  placeholder="value" class="form-control" value="<?php echo $feature_2_value; ?>"></input>
								</div>

								<div class="form-group">
									<label>Feature 3 Name:</label><br>
									<input type="text" name="feature_3_name"  placeholder="name" class="form-control" value="<?php echo $feature_3_name; ?>"></input>
								</div>

								<div class="form-group">
									<label>Feature 3 Value:</label><br>
									<input type="text" name="feature_3_value"  placeholder="value" class="form-control" value="<?php echo $feature_3_value; ?>"></input>
								</div>

								<div class="form-group">
									<label>Feature 4 Name:</label><br>
									<input type="text" name="feature_4_name"  placeholder="name" class="form-control" value="<?php echo $feature_4_name; ?>"></input>
								</div>

								<div class="form-group">
									<label>Feature 4 Value:</label><br>
									<input type="text" name="feature_4_value"  placeholder="value" class="form-control" value="<?php echo $feature_4_value; ?>"></input>
								</div>
								
								<div class="form-group" style="width:100% !important;">
									<label>Description:</label><br>
									<textarea name="description" class="form-control"><?php echo htmlspecialchars($description); ?></textarea>
								</div>

								<div class="form-group">
								</div>
								<div style="width:100% !important;text-align:center !important;">
									<?php if ($update == true): ?>

										<button type="submit" name="update" class="btn btn-success">Update Record</button>
										<button type="submit" name="cancel" class="btn btn-warning">cancel</button><br><br>

									<?php else: ?>
								
										<button type="submit" name="save" class="btn btn-success">Insert Record</button>
										
									<?php endif ?>
								</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>



<style type="text/css">
/*.bar-hide-height{
  width: 20px;
  height: 500px;
  background-color: #fff;
  position: absolute;
  z-index: 4;
  top: 0%;
  right: 59px;
}*/
table#index_table tbody th, table#index_table tbody td {
  max-width: 150px;
  overflow: hidden;
}

table#index_table tbody th:hover, table#index_table tbody td:hover {
  max-width: 100%;
  overflow: auto;
}
</style>


<div class="container" style="position:relative;padding: 20px 15px !important;">
	<div class="row">

		<div class="col-lg-12" style="padding-left:20px;text-align: center;">

			<label><strong>Search any product info:</strong></label><br>
			<input class="search-input" index-table="auto-search" id="search" placeholder=" Search ..." style="border-radius: 4px !important;
			border: 1px solid #000000 !important;width:400px;max-width:90%;margin-bottom: 20px;"/><br>

		</div>

		<div id="index_table_section" style="overflow:auto;width:90% !important;margin:0px auto !important;border-top:2px solid #000000;" class="table-responsive">
						
			<br>
			<table border="0" width="1000px" cellpadding="0" cellspacing="0" id="index_table" class="auto-search table table-light table-striped text-left">

			<?php

			require_once "db.php";

			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT * FROM products";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

			  echo "<tr class='index-table-heading' style='border-top: 1px solid #202020 !important;border-color: unset !important;'>
						<th>ID</th>
						<th>Image</th>
						<th>Category</th>
						<th>Sub Category</th>
						<th>Brand Name</th>
						<th>Product Name</th>
						<th>Cost Price</th>
						<th>Selling Price</th>
						<th>Discount</th>
						<th>Size</th>
						<th>XS</th>
						<th>S</th>
						<th>L</th>
						<th>M</th>
						<th>XL</th>
						<th>XXL</th>
						<th>Color</th>
						<th>PCS</th>
						<th>Weight</th>
						<th>Supplier Class</th>
						<th>Qty</th>
						<th>Initial Stock</th>
						<th>Feature 1 Name</th>
						<th>Feature 1 Value</th>
						<th>Feature 2 Name</th>
						<th>Feature 2 Value</th>
						<th>Feature 3 Name</th>
						<th>Feature 3 Value</th>
						<th>Feature 4 Name</th>
						<th>Feature 4 Value</th>
						<th>Description</th>
						<th>Status</th>
						<th>Action</th>
					</tr>";

			  while($row = $result->fetch_assoc()) {
			  	  if ($row["status"] != 0){
				    echo "<tr style='border-top: 1px solid #202020 !important;border-color: unset !important;'>
				    <td>".$row["id"]."</td>
				    <td><img style='width:40px;height:auto' src='catelog/images/products/".$row["product_image"]."'></img></td>
				    <td>".$row["category"]."</td>
				    <td>".$row["sub_category"]."</td>
				    <td>".$row["brand_name"]."</td>
				    <td>".$row["product_name"]."</td>
				    <td style='text-align: right;'>".$row["cost_price"]."</td>
				    <td style='text-align: right;'>".$row["price"]."</td>
				    <td style='text-align: right;'>".$row["discount"]."</td>
				    <td style='text-align: right;'>".$row["size"]."</td>
				    <td style='text-align: right;'>".$row["size_extra_small"]."</td>
				    <td style='text-align: right;'>".$row["size_small"]."</td>
				    <td style='text-align: right;'>".$row["size_medium"]."</td>
				    <td style='text-align: right;'>".$row["size_large"]."</td>
				    <td style='text-align: right;'>".$row["size_xl"]."</td>
				    <td style='text-align: right;'>".$row["size_2xl"]."</td>
				    <td>".$row["color"]."</td>
				    <td style='text-align: right;'>".$row["pcs"]."</td>
				    <td style='text-align: right;'>".$row["weight"]." KG</td>
				    <td>".$row["supplier_class"]."</td>
				    <td style='text-align: right;'>".$row["stock"]."</td>
				    <td style='text-align: right;'>".$row["initial_stock"]."</td>
				    <td style='text-align: right;'>".$row["feature_1_name"]."</td>
				    <td style='text-align: right;'>".$row["feature_1_value"]."</td>
				    <td style='text-align: right;'>".$row["feature_2_name"]."</td>
				    <td style='text-align: right;'>".$row["feature_2_value"]."</td>
				    <td style='text-align: right;'>".$row["feature_3_name"]."</td>
				    <td style='text-align: right;'>".$row["feature_3_value"]."</td>
				    <td style='text-align: right;'>".$row["feature_4_name"]."</td>
				    <td style='text-align: right;'>".$row["feature_4_value"]."</td>
				    <td>".$row["description"]."</td>
				    <td>".$row["status"]."</td>";
				  }
			   ?>


			   <?php
			     if ($row["status"] != 0){
			   ?>
			    <td>
				    <a href="admin_products.php?edit=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a>&emsp;
				    <span class="delete-confirmation">
				      <i class="icofont-close-squared-alt delete-cart-item-button"></i>
				      <a href="admin_products.php?remove=<?php echo $row["id"]; ?>" class="btn btn-danger" style="color:#ffffff !important;display:none;">
                      Delete</a>&emsp;&emsp;
                    </span>
				</td>

			    </tr>
			   <?php
			     }
			   ?>


			    <?php
			  }

			  echo "<br>";

			} else {

			  echo "0 results";
			  echo "<br>";

			}

			$conn->close();

			?>

			</table>

		</div>
		<div class="col-lg-12 text-center" style="padding-top:40px;">
			<h5><a href="adminpanel.php" style="background-color: #333333;padding: 10px 10px;color: #ffffff;font-weight: normal;font-size: 18px !important;"><strong>Back to Dashboard</strong></a></h5>
	    </div>
	</div>
</div>







<script type="text/javascript" language="javascript">

(function(document) {
	'use strict';
	var TableFilter = (function(myArray) {
		var search_input;

		function _onInputSearch(e) {
			search_input = e.target;
			var tables = document.getElementsByClassName(search_input.getAttribute('index-table'));
			myArray.forEach.call(tables, function(table) {
				myArray.forEach.call(table.tBodies, function(tbody) {
					myArray.forEach.call(tbody.rows, function(row) {
						if (!row.classList.contains("index-table-heading")) {
							var text_content = row.textContent.toLowerCase();
							var search_val = search_input.value.toLowerCase();
							row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
						}
					});
				});
			});
		}
		return {
			init: function() {
				var inputs = document.getElementsByClassName('search-input');
				myArray.forEach.call(inputs, function(input) {
					input.oninput = _onInputSearch;
				});
			}
		};
	})(Array.prototype);
	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			TableFilter.init();
		}
	});
})(document);

</script>



<?php
include 'includes/footer.php';
?>

<script>
$(document).ready(function(){
   $(".delete-confirmation").click(function(){
      $(this).find("a").show();
      $(this).find("i").remove();
   }); 
});
</script>


<!-- js image validation -->

<script type="text/javascript" language="javascript">
// Upload Product Image Files and Extention validation - Execution
function validateProductFileExtension(product_file){
 
  var ext = product_file.substr(product_file.lastIndexOf('.')+1);
  var allow_ = ["png","jpg","jpeg"];

  if ((allow_[0].lastIndexOf(ext) == -1) && (allow_[1].lastIndexOf(ext) == -1) && (allow_[2].lastIndexOf(ext) == -1)){
    $('#product_file').val("");
    window.alert("Please check the file extension.\nThe program will be accepted only '.png, '.jpg' or '.jpeg' files only.");
    document.getElementById("product_file_script_styles").style.background="#ffffff";
    document.getElementById("product_file_script_styles").style.color="#555555";
  }
  else{
    document.getElementById("product_file_script_styles").style.background="#7895E7";
    document.getElementById("product_file_script_styles").style.color="#000000";
    window.alert("Your product image is ready for upload.");
  }
}
// Upload Product Image Files and Extention validation - Execution
</script>

<!-- js image validation -->

<!--
	
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			
		</td>
	</tr>
</table>

<div class="row">
	<div class="col-12">

	</div>
</div>


id
product_name
category
price
stock
description
sub
bin
status


-->

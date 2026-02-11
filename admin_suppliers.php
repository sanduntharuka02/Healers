<?php
include("auth_session.php");
include 'include/header.php';
$ready_user = $_SESSION['user_type'];
if($ready_user != "Admin"){
  header("Location: index.php");
}
?>

<style type="text/css">

	form.register-form, form.login-form, form#pahere_payement_form, form#paypal_form, form#product_items_admin_CRUD{
  width: 700px;
  max-width: 100%;
  margin: 0 auto;
  padding: 20px;
  border-radius: 5px;
}
#buy_now_btn {
  background-color: #413bff;
  border: 0px solid transparent;
  border-radius: 5px;
  padding: 10px 40px;
  color: #ffffff;
}
form#pahere_payement_form div div, form#paypal_form div div, #product_items_admin_CRUD div div div{
  width: 48% !important;
  display: inline-block !important;
  vertical-align: top !important;
  padding: 0px 20px;
}
/* =================== */
@media(max-width: 768px){
  form#pahere_payement_form div div, form#paypal_form div div, #product_items_admin_CRUD div div div{
    width: 100% !important;
    display: inline-block !important;
  }
}

</style>

<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center home-banner">
        
    </div>
  </div>
</div>




<div class="container-fluid" style="padding: 20px 15px !important;padding-top: 70px !important;">
	<div class="row">

		<div class="col-lg-12 text-center">
			<h5><a href="adminpanel.php"><strong>Back to Dashboard</strong></a></h5>
	      <h4>Supplier Details Section</h4><br>
	    </div>

	    <div class="col-lg-12" id="crud_reload_position">
			<div class="present_post_details text-left">

				<?php require_once 'models/process_suppliers.php';?>

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
					<form action="models/process_suppliers.php" method="POST" id="product_items_admin_CRUD" class="form-bg-all-glass">
						<div id="crud_operation_section" style="padding-top: 30px;">
							<div class="row" style="">
								<div class="form-group">

									<input type="hidden" name="id" value="<?php echo $id;?>"></input>
									<label>Supplier Class:</label><br>
									<select name="supplier_class" style="width:100% !important;padding: 8px 0px;">
				                    <?php if ($supplier_class == ""): ?>
				                    	<option value="s-001">s-001</option>
				                    	<option value="s-002">s-002</option>
				                    	<option value="s-003">s-003</option>
				                    <?php else: ?>
				                    	<option value="<?php echo $supplier_class; ?>">
				                    		<?php echo $supplier_class; ?>
				                    	</option>
				                    	<option value="s-001">s-001</option>
				                    	<option value="s-002">s-002</option>
				                    	<option value="s-003">s-003</option>
									<?php endif ?>
				                    </select>
								</div>

								<div class="form-group">
									<label>Products:</label><br>
									<input type="text" name="products"  class="form-control" value="<?php echo $products; ?>"></input>
								</div>


								<div class="form-group">
									<label>Company:</label><br>
									<input type="text" name="company"  class="form-control" value="<?php echo $company; ?>"></input>
								</div>

								<div class="form-group">
									<label>Email:</label><br>
									<input type="text" name="email"  class="form-control" value="<?php echo $email; ?>"></input>
								</div>
								
								<div class="form-group">
									<label>Phone:</label><br>
									<input type="text" name="phone"  class="form-control" value="<?php echo $phone; ?>"></input>
								</div>

								<div class="form-group">
									<label>Country:</label><br>
									<input type="text" name="country"  class="form-control" value="<?php echo $country; ?>"></input>
								</div>

								<div class="form-group">
									<label>Address:</label><br>
									<textarea name="address" class="form-control"><?php echo htmlspecialchars($address); ?></textarea>
								</div>

								<div class="form-group">
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






<div class="container" style="padding: 20px 15px !important;">
	<div class="row">

		<div class="col-lg-12" style="padding-left:20px;text-align: center;">

			<label><strong>Search any supplier info:</strong></label><br>
			<input class="search-input" index-table="auto-search" id="search" placeholder=" Search ..." style="border-radius: 4px !important;
			border: 1px solid #000000 !important;width:400px;max-width:90%;"/><br>

		</div>

		<div id="index_table_section" class="table-responsive" style="overflow: auto;width: 90% !important;margin: 0px auto !important;" >
						
			<br>
			<table border="0" width="1000px" cellpadding="0" cellspacing="0" class="auto-search table table-light table-striped text-left">

			<?php

			require_once "db.php";

			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT id, supplier_class, products, company, email, phone, country, address, description, status FROM suppliers";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

			  echo "<tr class='index-table-heading' style='border-top: 1px solid #202020 !important;border-color: unset !important;'>
						<th>ID</th>
						<th>Supplier Class</th>
						<th>Products</th>
						<th>Company</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Country</th>
						<th>Address</th>
						<th>Description</th>
						<th>Status</th>
						<th>Action</th>
					</tr>";

			  while($row = $result->fetch_assoc()) {
			  	  if ($row["status"] != 0){
				    echo "<tr style='border-top: 1px solid #202020 !important;border-color: unset !important;'>
				    <td>".$row["id"]."</td>
				    <td>".$row["supplier_class"]."</td>
				    <td>".$row["products"]."</td>
				    <td>".$row["company"]."</td>
				    <td>".$row["email"]."</td>
				    <td>".$row["phone"]."</td>
				    <td>".$row["country"]."</td>
				    <td>".$row["address"]."</td>
				    <td>".$row["description"]."</td>
				    <td>".$row["status"]."</td>";
				  }
			   ?>


			   <?php
			     if ($row["status"] != 0){
			   ?>
			    <td>
				    <a href="admin_suppliers.php?edit=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a>&emsp;
					<a href="admin_suppliers.php?remove=<?php echo $row["id"]; ?>" class="btn btn-danger" style="color:#ffffff !important;">
                      Delete</a>
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
			<h5><a href="adminpanel.php"><strong>Back to Dashboard</strong></a></h5>
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
include 'include/footer.php';
?>






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
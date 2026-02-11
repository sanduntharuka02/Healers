<?php
include("auth_session.php");
if ($_SESSION['username'] == "diaperboadmin"){
	include 'common/includes/header-admin.php';
}else{
	include 'common/includes/header.php';
}
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center home-banner">
        
    </div>
  </div>
</div>



<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center home-banner" style="padding-top:70px !important;">
        
    </div>
  </div>
</div>



<div class="container-fluid" style="padding: 20px 15px !important;">
	<div class="row">

		<div class="col-lg-12 text-center">
	      <h3 class="secodary-font">Edit Profile</h3>
	      <br><br>
	    </div>
	    
        <div class="col-lg-2 d-none d-lg-block text-center">
          <?php //include "models/popup_products.php"; ?>
          <?php //include "models/popup_products.php"; ?>
        </div>

		<div class="col-lg-8 col-md-12" id="crud_reload_position">
			<div class="present_post_details text-left">

				<?php require_once 'models/process-users.php';?>

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
					<form action="models/process-users.php" method="POST" id="product_items_admin_CRUD" class="form-bg-all-glass">
						<div id="crud_operation_section" style="padding-top: 30px;">
							<div class="row" style="">

								<input type="hidden" name="id" value="<?php echo $id;?>"></input>

								<div class="form-group">
									<label>User Name:</label><br>
									<input type="text" name="username" class="form-control" value="<?php echo $username; ?>"></input>
								</div>
								<div class="form-group">
									<label>Email:</label><br>
									<input type="email" name="email" class="form-control" value="<?php echo $email; ?>"></input>
								</div>
								<div class="form-group">
									<label>Password:</label><br>
									<input type="password" name="password" class="form-control" value="<?php echo $password; ?>"></input>
								</div>

								<div class="form-group">
									<label>First Name:</label><br>
									<input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>"></input>
								</div>
								<div class="form-group">
									<label>Last Name:</label><br>
									<input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>"></input>
								</div>
								<div class="form-group">
									<label>Phone:</label><br>
									<input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>"></input>
								</div>
								<div class="form-group">
									<label>Address:</label><br>
									<input type="text" name="address" class="form-control" value="<?php echo $address; ?>"></input>
								</div>
								<div class="form-group">
									<label>City:</label><br>
									<input type="text" name="city" class="form-control" value="<?php echo $city; ?>"></input>
								</div>



								<div class="form-group">
								</div>
								<div style="width:100% !important;text-align:center !important;">
									<?php if ($update == true): ?>

										<button type="submit" name="update" class="btn btn-primary">Update Record</button>
										<a href="user-profile.php" class="btn btn-primary" style="padding: 3px 7px !important;color:#ffffff !important;">
											cancel
					                    </a><br><br>

									<?php else: ?>
								
										<!-- <button type="submit" name="save" class="btn btn-success">Insert Record</button> -->
										
									<?php endif ?>
								</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
		
		<div class="col-lg-2 d-none d-lg-block text-center">
          <?php //include "models/popup_products.php"; ?>
          <?php //include "models/popup_products.php"; ?>
        </div>
        
	</div>
</div>



<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center home-banner">
        
    </div>
  </div>
</div>




<?php include 'include/footer.php' ?>


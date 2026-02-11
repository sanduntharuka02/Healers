<?php
ob_start();
include("auth_session.php");
include 'include/header.php';
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


<?php
if (isset($_POST['submit'])){

		    require_once "db.php"; 

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check user is exist in the database
        $query = "SELECT * FROM users WHERE email='$email'
                  AND password='$password'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {

            $_SESSION['email'] = $email;

            $userIdForProfileUpdate;
            $sql_userId = "SELECT id FROM users WHERE  email='$email'
                              AND password='$password'";
            $result_userId = $conn->query($sql_userId);
            if ($result_userId->num_rows > 0) {
              while($row = $result_userId->fetch_assoc()) {
                $userIdForProfileUpdate = $row["id"];
                //echo $userIdForProfileUpdate;
              }
            }
            // Redirect to user home page
            header("Location: user-edit.php?edit=".$userIdForProfileUpdate);

        } else {
            echo "<script>window.alert('Invalid email or password.');</script>";
        }
 }
 ob_end_flush();
?>

<style type="text/css">
  form#user-profile-verify-form{
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 40px;
    padding-top: 20px !important;
    border-radius: 5px;
    border: 1px solid #202020;
    background-color:rgba(250, 250, 250, 0.5);
  }
  form#user-profile-verify-form div{
    width: 100% !important;
    display: inline-block !important;
    vertical-align: top !important;
    padding: 0px 10px;
  }
  @media(max-width: 768px){
    form#user-profile-verify-form div{
      width: 100% !important;
      display: inline-block !important;
    }
  }
</style>


<div class="container-fluid" style="padding: 20px 15px !important;">
	<div class="row">

		<div class="col-lg-12 text-center">
	      <h3 class="secodary-font">Confirm your account to edit</h3>
        <br><br>
	    </div>
	    
	     <div class="col-lg-2 d-none d-lg-block text-center">
          <?php //include "models/popup_products.php"; ?>
        </div>

		<div class="col-lg-8 col-md-12" id="crud_reload_position">
			<div class="present_post_details text-left">

				<div id="crud_wrapper" style="width:100%;margin: 0 auto;">
					<form action="user-profile.php" method="POST" id="user-profile-verify-form" class="form-bg-all-glass">

								<input type="hidden" name="id" value="<?php echo $id;?>"></input>

								<div class="form-group">
									<label>Email:</label><br>
									<input type="text" name="email" class="form-control" value="" placeholder="Email"></input>
								</div>

								<div class="form-group">
									<label>Password:</label><br>
									<input type="password" name="password" class="form-control" value="" placeholder="Password"></input>
								</div>


								<div class="form-group">
                  <div style="width:100% !important;text-align:center !important;">
                      <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                      <a href="index.php" class="btn btn-primary" style="padding: 3px 7px !important;color:#ffffff !important;">
                        cancel
                      </a><br><br>
                  </div>
								</div>

					</form>
					
				</div>
			</div>
		</div>
		
		 <div class="col-lg-2 d-none d-lg-block text-center">
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

<?php ob_end_flush(); ?>
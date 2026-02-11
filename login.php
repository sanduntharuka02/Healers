<?php
require_once "db.php";
//session_start();
//include("auth_session.php");
//ob_start();
include 'includes/header.php';
//ob_end_flush();

//$_SESSION['username'] = "user";
// When form submitted, check and create user session.
if (isset($_POST['login'])) {
    $email = $_POST['email'];    // removes backslashes
    $password = $_POST['password'];
    // Check user is exist in the database
    $query = "SELECT * FROM users WHERE email='$email'
              AND password='$password'";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {

        $userNameForProfileUpdate;
        $sql_userName = "SELECT username FROM users WHERE  email='$email'
                          AND password='$password'";
        $result_userName = $conn->query($sql_userName);
        if ($result_userName->num_rows > 0) {
          while($row = $result_userName->fetch_assoc()) {
            $userNameForProfileUpdate = $row["username"];
            if ($userNameForProfileUpdate == "storeadmin"){
                $_SESSION['user_type'] = "Admin";
            }
            $_SESSION['username'] = $userNameForProfileUpdate;
            //echo $userNameForProfileUpdate;
          }
        }
        // Redirect to user home page
        if ($userNameForProfileUpdate != "storeadmin"){
          header("Location: index.php");
        }else{
          header("Location: adminpanel.php");
        }
        
    } else {
        echo "<script>window.alert('Invalid email or password. Please try again.')</script>";
    }
}
?>

<style type="text/css">
  .form_basic_style{
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    padding-top: 20px !important;
    border-radius: 5px;
    border: 1px solid #202020;
    margin-top:20px;
  }
  form#login_form {
    box-shadow: 0px 0px 4px #d9d9d9;
    border: 0px transparent;
    border-radius: 0%;
    text-align: left !important;
    margin: 100px auto;
}
  form div{
    width: 100%;
    display: inline-block !important;
    vertical-align: top !important;
    padding: 0px 10px;
  }
  .form-group{
    margin: 10px 0px !important;
  }
  input.form-control {
    border-radius: 0px !important;
    padding: 20px 20px !important;
  }
  input.btn.btn-primary.new-btn {
    background-color: orange;
    border: none;
    border-radius: 0%;
    margin-bottom: 20px;
    width: 100px;
}
  @media(max-width: 768px){
    form div{
      width: 100% !important;
      display: inline-block !important;
    }
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-lg-12">

      <form class="form-bg-all-glass form_basic_style" id="login_form" method="post">
        <div style="width: 100%;text-align: center;">
          <a href="index.php">
            <i class="icofont-ui-home" style="width:25px;height:auto;font-size:20px;float:left;"></i>
          </a>
          <!-- <button id="mobile_login_spinner" class="btn btn-primary" style="float: left; margin-left:10px;">
            <i class="icofont-ui-call" style="height:auto;font-size:16px;float:left;position: relative;top: 3px;">
            </i>&nbsp;&nbsp;Mobile Login
          </button> -->
          <span style="display:none;float:right;"><strong></strong></span>
        </div>
        <br><br>
        <div style="width: 100%;text-align: center;">
          <h3 class="login-title">Login Form</h3>
        </div>
        <div class="form-group" style="">
          <label>Email:</label><br>
          <input type="text" class="form-control" name="email" placeholder="Email" autofocus="true" required/>
        </div>
        <div class="form-group" style="">
          <label>Password:</label><br>
          <input type="password" class="form-control" name="password" placeholder="Password" required/>
        </div>
        <div class="form-group" style="width:100%;text-align:left;">
          <input type="submit" value="Login" name="login" class="btn btn-primary new-btn"/><br>
          <a href="forget_password.php"><u>Forget Password ?</u></a><br><br>
          <p class="link">Don't have an account? <br><a href="registration.php"><u>Register Now</u></a></p>
        </div>
      </form>

      <!-- <form class="form-bg-all-glass" id="login_form_phone" method="post" style="display:none;">
        <div style="width: 100%;text-align: center;">
          <a href="index.php">
            <img src="assets/images/home.png" style="width:25px;height:auto;font-size:20px;float:left;"></i>
          </a>
          <button id="regular_login_spinner" class="btn btn-primary" style="float: left; margin-left:10px;">
            Regular Login
          </button>
          <span style="display:none;float:right;"><strong>DiaperBoutique SL</strong></span>
        </div>
        <br><br>
        <div style="width: 100%;text-align: center;">
          <h3 class="login-title">Mobile Login Form</h3>
        </div>
        <div class="form-group" style="">
          <label>Phone Number :</label><br>
          <input type="text" class="form-control" name="phone" placeholder="Phone Number" autofocus="true" required/>
        </div>
        <div class="form-group" style="">
          <label>Password:</label><br>
          <input type="password" class="form-control" name="password" placeholder="Password" required/>
        </div>
        <div class="form-group" style="width:100%;text-align:center;">
          <input type="submit" value="Login" name="login_phone" class="btn btn-primary"/><br>
          <a href="forget_password.php"><u>Forget Password ?</u></a><br><br>
          <p class="link">Don't have an account? <br><a href="registration.php"><u>Register Now</u></a></p>
        </div>
      </form> -->

    </div>
  </div>
</div>


<script>
$(document).ready(function(){

  $("#mobile_login_spinner").click(function(){
    $("#login_form_phone").show();
    $("#login_form").hide();
  });
  
  $("#regular_login_spinner").click(function(){
    $("#login_form_phone").hide();
    $("#login_form").show();
  });
  
});
</script>



<?php include 'includes/footer.php' ?>
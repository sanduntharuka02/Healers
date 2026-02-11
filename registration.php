<?php
// include("auth_session.php");
session_start();
include 'includes/header.php'; 
require_once 'models/process-users-registration.php';
?>
  <style type="text/css">
  #app_bg_wall{
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% auto;
    background-image: url('graphics/bg_image.jpg');
    background-position: unset;
  }
  </style>
</head>
<body id="app_bg_wall">
<style type="text/css">
  form#registration_form{
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    padding-top: 20px !important;
    border-radius: 5px;
    border: 1px solid #202020;
    margin-top:20px;
  }
  form#registration_form div{
    width: 100%;
    display: inline-block !important;
    vertical-align: top !important;
    padding: 0px 10px;
  }
  form#registration_form {
    box-shadow: 0px 0px 4px #d9d9d9;
    border: 0px transparent;
    border-radius: 0%;
    text-align: left !important;
    margin: 100px auto;
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
  .form-group{
    margin: 10px 0px !important;
  }
  @media(max-width: 768px){
    form#registration_form div{
      width: 100% !important;
      display: inline-block !important;
    }
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
    
      <form action="registration.php" method="POST" class="form-bg-all-glass" id="registration_form">
          <div style="width: 100%;text-align: center;">
            <a href="index.php">
              <img src="assets/images/home.png" style="width:25px;height:auto;font-size:20px;float:left;"></i>
            </a>
            <span style="display:none;float:right;"><strong>DiaperBoutique SL</strong></span>
            <br>
            <h3 class="login-title">Registration Form</h3>
          </div>
          <div class="form-group" style="">
            <label>Username:</label><br>
            <input type="text" class="form-control" name="username" placeholder="Username" required/>
          </div>
          <div class="form-group" style="">
            <label>Email:</label><br>
            <input type="email" class="form-control" name="email" placeholder="Email Address" required/>
          </div>
          <div class="form-group" style="">
            <label>Phone: <br>
              <span style="color:#418953;word-break:break-word;">You can use this number for login.</span></label><br>
            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required/>
          </div>
          <div class="form-group" style="">
            <label>Password:</label><br>
            <input type="password" class="form-control" name="password" placeholder="Password" required/>
          </div>
          <div class="form-group" style="">
            <label>Confirm Password:</label><br>
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirmation Password" required/>
          </div>
          <div class="form-group" style="width:100%;text-align:left;">
            <input type="submit" name="register" value="Register" class="btn btn-primary new-btn"><br><br>
            <p class="link">Already have an account? <br><a href="login.php"><u>Login Here</u></a></p>
          </div>
      </form>

    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
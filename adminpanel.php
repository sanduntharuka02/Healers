<?php
include("auth_session.php");
include 'include/header.php';
$ready_user = $_SESSION['user_type'];
if($ready_user != "Admin"){
  header("Location: index.php");
}
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center home-banner" style="">
        
    </div>
  </div>
</div>


<?php

require_once "db.php";


?>



<style type="text/css">
  
  /* ADMIN TILE STYLES */
  
  .dashboard-tile {
    background-color: #E7E3EA;
    padding: 10px 20px;
    width: 90%;
    height: 140px;
    margin: 0px auto;
    border: 0px none transparent;
    border-radius: 5px;
    font-family: 'Maven Pro', Arial, sans-serif !important;
    margin-bottom: 2rem;
  }

  /* ADMIN TILE STYLES */

  #admin-menu-wrapper{
    width:100%;
  }
  #admin_menu{
    margin-bottom: 40px;
  }
  #admin_menu tr td{
    padding:10px;
    background-color: rgba(225, 225, 225, 0.7) !important;
    cursor:pointer;
    width:100%;
    animation: .1s linear .2s;
  }
  #admin_menu tr td i{
    position:relative;
    top:3px;
  }
  #admin_menu tr td:hover{
    background-color: #DCC8D2 !important;
    cursor:pointer;
    animation: .1s linear .2s;
  }
  #admin_menu tr td a{
    width:100%;
    padding: 10px 20px;
    cursor:pointer;
  }
  #admin_menu tr td a:hover{
    font-weight:bold !important;
    cursor:pointer;
    width:100%;
  }


  @media(max-width: 767px){
    label#controller_icon_wrapper {
      float: none !important;
      width: 100%;
      display: block;
      margin-top: 20px;
      text-align: center !important;
    }
  }
</style>



<div class="container">

  
</div>

<style type="text/css">
.dash-sub-tile {
  width:100%;
  height:100%;
  padding: 10px;
  border: 0px none transparent;
  border-radius: 7px;
  background-color: #F2E8ED;
  box-shadow: -2px 1px 8px #808080;
}
</style>

<div class="container-skip">
  <div class="row">
    
  </div>
</div>

<br>

<div class="container">
	<div class="row">

		<div class="col-lg-3 col-md-12 col-sm-12 text-center" style="">
      <div id="admin-menu-wrapper">
          <button id="admin_menu_toggle_btn" class="btn btn-primary" style="">Admin Menu</button><br><br>
          <table id="admin_menu" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr class="empty-row" style="text-align:left;">
              <td style="padding:0px 0px !important;">
                <a href="" style="text-decoration:none !important;" style=""></a>
              </td>
            </tr>
            <tr class="" style="text-align:left;">
              <td><i class="icofont-file-iso" style="font-size:23px;"></i><a href="admin_sliders.php" style="">Home Sliders</a></td>
            </tr>
            <tr class="" style="text-align:left;">
              <td><i class="icofont-file-iso" style="font-size:23px;"></i><a href="admin_top_brands.php" style="">Top Brands</a></td>
            </tr>
            <tr class="" style="text-align:left;">
              <td><i class="icofont-box" style="font-size:23px;"></i><a href="admin_products.php" style="">Product Settings</a></td>
            </tr>
            <!-- <tr class="" style="text-align:left;">
                <td><i class="icofont-money" style="font-size:23px;"></i><a href="admin_payments.php" style="">Payment Details</a></td>
            </tr> -->
            <tr class="" style="text-align:left;">
                <td><i class="icofont-building-alt" style="font-size:23px;"></i><a href="admin_suppliers.php" style="">Suppliers</a></td>
            </tr>
            <tr class="" style="text-align:left;">
                <td><i class="icofont-file-alt" style="font-size:21px;"></i><a href="admin_orders.php" style="">Order Info</a></td>
            </tr>
            <tr class="" style="text-align:left;">
                <td><i class="icofont-truck-alt" style="font-size:23px;"></i><a href="admin_delivery.php" style="">Delivery Details</a></td>
            </tr>
            <tr class="" style="text-align:left;">
                <td><i class="icofont-delivery-time" style="font-size:23px;"></i><a href="admin_delivery_locations.php" style="">Delivery Settings</a></td>
            </tr>
            <tr class="" style="text-align:left;">
                <td><i class="icofont-chart-growth" style="font-size:23px;"></i><a href="admin_stock.php" style="">Stock Handler</a></td>
            </tr>
            <tr class="" style="text-align:left;">
                <td><i class="icofont-chart-flow-1" style="font-size:23px;"></i><a href="admin_multi_menu.php" style="">Multi Menu</a></td>
            </tr>
            <!-- <tr class="" style="text-align:left;">
                <td><i class="icofont-file-jpg" style="font-size:21px;"></i><a href="admin_gallery.php" style="">Gallery Images</a></td>
            </tr> -->
            <tr class="" style="text-align:left;">
                <td><i class="icofont-ui-user" style="font-size:21px;"></i><a href="admin_user_details.php" style="">User Details</a></td>
            </tr>
           <!-- <tr class="" style="text-align:left;">
                <td><i class="icofont-ui-v-card" style="font-size:21px;"></i><a href="admin_bank_slips.php" style="">All Bank Slips</a></td>
            </tr>-->
            <tr class="" style="text-align:left;">
                <td><i class="icofont-microphone" style="font-size:23px;"></i><a href="admin_announcement.php" style="">Announcement</a></td>
            </tr>
            <tr class="empty-row" style="text-align:left;">
              <td style="padding:0px 0px !important;">
                <a href="" style="text-decoration:none !important;" style=""></a>
              </td>
            </tr>
           </table>
      </div>
      <img src="IMAGE_PLUG/logo-1.jpg" style="width:100px;height:auto;margin: 0px auto;"></img>
    </div>

    <div class="col-lg-9 col-md-12 col-sm-12 text-left full-banner-new" style="text-align:left;background-image: linear-gradient(to bottom, #ffffff, #F2E8ED, #F2E8ED, #F2E8ED, #ffffff) !important;">
      <div style="padding:20px;">
        <h3 class="secodary-font">Priyani Textile</h3>
        <div>Welcome to Cobeo, where fitness meets fashion! Our gym wear online store is your ultimate destination for premium activewear that not only enhances your performance but also elevates your style. We believe that looking good and feeling great are intertwined, and our carefully curated collection of workout gear embodies this philosophy. we're here to empower your fitness journey...
        </div><br>
      </div>
      <div style="padding:20px;">
        <h3 class="secodary-font">OUR VISION</h3>
        <div>At Cobeo, we envision a world where fitness isn't just a routine; it's a way of life. We aspire to be the driving force behind your fitness odyssey, inspiring people from all walks of life to embrace a healthier, more active existence. Our vision is to establish Cobeo as the premier source for activewear that seamlessly combines functionality, fashion, and comfort, so you can confidently tackle your fitness aspirations.
        </div><br>
      </div>
      <div style="padding:20px;">
        <h3 class="secodary-font">OUR MISSION</h3>
        <div>At Cobeo, our mission is to provide fitness enthusiasts, athletes, and individuals with a diverse and top-tier selection of gym wear that not only supports their active lifestyle but also allows them to express their unique style. We firmly believe that what you wear during your fitness journey should be a reflection of your personality and aspirations. It should empower you to be not just active, but authentically you.
        </div>
      </div>
      <div style="padding:20px;font-size:0px !important;">
        <img src="../../powerhouse/IMAGE_PLUG/logo-1.jpg" style="width:100%;height:auto;border-radius: 10px;opacity: 0.9;"></img>
      </div>
    </div>

    <div style="display:none;">
      <li><a href="#">UI Elements</a></li>
      <li><a href="#">Product Settings</a></li>
      <li><a href="#">Payment Details</a></li>
      <li><a href="#">Customer Details</a></li>
      <li><a href="#">Reports</a></li>
      <li><a href="#">Email Options</a></li>
      <li><a href="#">Other</a></li>
    </div>


	</div>

</div>




<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center" style="padding-top: 20px !important;">

    </div>
  </div>
</div>



<?php include 'include/footer.php' ?>


<script>
  $(document).ready(function(){

    function getDateTimeExecution() {
        var date_ = new Date();
        $("#viewDateAndTime").text(date_);
    }
    setInterval(getDateTimeExecution, 1000);
    
    // Admin Menu toggle execution. 

    $("#admin_menu_toggle_btn").click(function(){
        $("#admin_menu").toggle();
    });
    var screenSize = parseInt($(window).width());
    if (screenSize > 768) { 
        
    }
    $(window).resize(function(){
      var screenSize = parseInt($(window).width());
        if (screenSize > 768) { 
          
        }
    });

    // Admin Menu toggle execution.

    $("#dashboard_tile_spinner").click(function(){
      $(".dashboard-tile-wrapper-a").each(function(){
        $(this).toggle();
      });
      $(".dashboard-tile-wrapper-b").each(function(){
        $(this).toggle();
      });
    });
    
    // =============================
    

  });
</script>


<?php session_start(); ?>
<?php include 'includes/header.php'; ?>
<br>
<style type="text/css">

	table{
		margin: 40px auto;
		width: 60%;
        border:1px solid #d4d4d4;
	}
	table th{
		background-color: #ffb902;
		height: 60px;
	}
	table td{
		height: 100px;
		text-align: center;
	}
	#cart_item_table tr th, #cart_item_table tr td{
		border-left:1px solid #d4d4d4;
		border-bottom: 1px solid #d4d4d4;
	}
	.empty-btn, .confirm-order-btn, .buy_now_btn{
		color: white;
		background-color: black;
		padding: 10px 30px;
		border: none;
        border-radius: 5px;
	}
	.empty-btn:hover, .confirm-order-btn:hover, .buy_now_btn:hover, .all-product-btn:hover{
		color: black !important;
		background-color: #ffb902 !important;
		border: none;
        cursor: pointer;
        text-decoration: none !important;
	}
    .system-quantity-box{
        width: 75%;
        display: inline-flex;
        /* text-align: center; */
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
    }
    .empty-msg{
        text-align: center;
        margin: 10px auto;
        padding: 20px 20px 0px 20px;
        font-size: 18px;
        color: black;
    }
    .all-product-btn{
        color: white;
		background-color: black;
		padding: 10px 30px;
		border: none;
        border-radius: 5px;
    }
    @media (max-width: 768px) {
    table {
        width: 100% !important;
    }
    .cart_table, .cart_table tr, .cart_table th, .cart_table td {
        display: block !important;
        width: 100% !important;
    }
    .cart_table tr {
        margin-bottom: 10px !important;
    }
    .cart_table th, .cart_table td {
        text-align: left;
        padding-left: 10px !important;
    }
    .cart_table th {
        background-color: #ffb902 !important;
    }
    .cart_table td {
        border: none !important;
        border-bottom: 1px solid #d4d4d4 !important;
    }
    .cart_table td:last-child {
        border-bottom: none !important;
    }
    }
</style>
<?php
if(isset($_POST["delete-all"])){
    unset($_SESSION["shopping_cart"]);
}
?>
<br>
<div>
<form id="empty_cart_form" action="#" method="post" style="max-width:600px;padding:10px 20px;margin:0px auto;text-align:center;">
              <button type="submit" name="delete-all" id="empty_cart" class="empty-btn" style="">Empty Cart</button>
</form>
</div>
<table id='cart_item_table' class="cart_table">
<?php
    if(!empty($_SESSION["shopping_cart"])){
?>
        <tr class="mob-hide" >
            <th width="" style="text-align: center;">Product</th>
            <th width="" style="text-align: center;">Product <span class="mob-hide">Name</span></th>
            <th width="" style="text-align: center;">Price</th>
            <th width="" style="text-align: center;">Quantity</th>
            <th width="" style="text-align: center;">Sub Total</th>
            <th width="" style="text-align: center; width: 40px;"></th>
        </tr>
        <?php
        $cart_total = 0;

        foreach($_SESSION["shopping_cart"] as $key => $value){
            $single_item_total = intval($value["product_price"]) * intval($value["product_quantity"]);
            echo "<tr class='cart-item-record'>";
            
            echo "<td>";

            $global_this_id = $value["product_id"];

            require_once "db.php";

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, status, product_image FROM products where id = $global_this_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["status"] != 0) {
                        echo "<img src='catelog/images/products/" . $row["product_image"] . "' alt='Product Image' width='100' height='100'>";
                    }
                }
            }
            echo "</td>";

            echo "<td class='cart-data'><span>".$value["product_name"]."</span></td>";
            echo "<td class='cart-data right-align'><span>".$value["product_price"]."</span></td>";
            echo "<td class='cart-data original_cart_quentity'><span style='display: none;'>".$value["product_quantity"]."</span>
                    <div class='system-quantity-box';>
                        <div class='quantity_decrement'; style='width: 25%;'><i class='icofont-minus'></i></div>
                        <div class='quantity_value'; style='width: 50%; border: 1px #d4d4d4 solid; padding: 4px 4px;'>".$value["product_quantity"]."</div>
                        <div class='quantity_increment'; style='width: 25%;'><i class='icofont-plus'></i></div>
                    </div>
                </td>";
            echo "<td class='cart-data right-align' style='text-align: right; padding-right: 25px;'><span>".$single_item_total."</span></td>";
            echo "<td class='cart-data'><i class='icofont-close-circled'></i></td>";
            echo "</tr>";
            $cart_total += $single_item_total;
        }

        echo "<tr>
                <td colspan='4' style='text-align: left; padding-left: 100px;'>Total<br><br>Delivery charges</td>
                <td colspan='1' style='text-align: right; padding-right: 25px;' id='cart_grand_amount'><label>".$cart_total."</label><br><br><p>100</p></td>
                <td colspan='1'></td>
              </tr>";
        echo "<tr>
                <td colspan='4' id='courier_charge' style='text-align: left; padding-left: 100px; font-weight:bold; font-size: 18px;'>Grand Total</td>
                <td colspan='1' style='text-align: right; padding-right: 25px; font-size: 18px; font-weight:bold !important;' id='card_grand_amount_with_courier'><label>".intval($cart_total + 100)."</label></td>
              </tr>";
        ?>
<?php
    } else {
        echo "<tr><td colspan='6' style='padding-bottom: 20px !important;'></td></tr>";
        echo "<br><p class='empty-msg'>Your shopping cart is empty</p><br><br>";
        echo "<br><div style='max-width:600px;padding:10px 20px;margin:0px auto;text-align:center;'><a href='http://localhost/healers/products.php?filter=All%20Products' class='all-product-btn'>All Product</a></div><br><br>";
    }
?>
</table>
<br>

<div style="width:80%; text-align: right;">
    <button class="confirm-order-btn" style="margin-bottom: 50px; margin-left: 20%; border-radius:5px;">Confirm</button>
</div>
<br>

<style type="text/css">

#payement_form{
  width: 100%;
  max-width: 100%;
  margin: 0px 100px 60px 0px !important;
  padding: 20px;
  border: 1px solid #d4d4d4;
  border-radius: 5px;
}
input.form-control {
    border-radius: 0px !important;
    padding: 20px 20px !important;
  }
  .form-group{
    margin: 10px 0px !important;
  }

.center_btn{
    text-align: left;
}
form div div{
  width: 48% !important;
  display: inline-block !important;
  vertical-align: top !important;
  padding: 0px 20px;
}
form div .head_tag{
    font-size: 18px;
    font-weight: bold;
    color: black;
    margin-left: 20px;
}
/* =================== */
@media(max-width: 768px){
  #payement_form div div{
    width: 100% !important;
    display: inline-block !important;
  }
}

</style>

<div class="container" style="width: 62% !important;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form method="post" action="https://sandbox.payhere.lk/pay/checkout" id="payement_form">   
                <div>
                    <input type="hidden" name="merchant_id" value="121XXXX">    <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="http://sample.com/return">
                    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
                    <input type="hidden" name="notify_url" value="http://sample.com/notify">  

                    </br></br><label class="head_tag">Item Details</label></br>

                    <div class="form-group">
                        <label>Order Id</label><br>
                        <input type="text" name="order_id" value="ItemNo12345" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Item</label><br>
                        <input type="text" name="items" value="Door bell wireless" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Currency</label><br>
                        <input type="text" name="currency" value="LKR" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Amount</label><br>
                        <input type="text" name="amount" value="1000" class="form-control"></input>
                    </div>
                    <!-- <input type="text" name="order_id" value="ItemNo12345">
                    <input type="text" name="items" value="Door bell wireless">
                    <input type="text" name="currency" value="LKR">
                    <input type="text" name="amount" value="1000"> -->  
                    </br></br><label class="head_tag">Customer Details</label></br>
                    <div class="form-group">
                        <label>First Name</label><br>
                        <input type="text" name="first_name" value="Saman" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label><br>
                        <input type="text" name="last_name" value="Perera" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Email</label><br>
                        <input type="text" name="email" value="samanp@gmail.com" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Phone</label><br>
                        <input type="text" name="phone" value="0771234567" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Address</label><br>
                        <input type="text" name="address" value="No.1, Galle Road" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>City</label><br>
                        <input type="text" name="city" value="Colombo" class="form-control"></input>
                    </div>
                    <!-- <input type="text" name="first_name" value="Saman">
                    <input type="text" name="last_name" value="Perera">
                    <input type="text" name="email" value="samanp@gmail.com">
                    <input type="text" name="phone" value="0771234567">
                    <input type="text" name="address" value="No.1, Galle Road">
                    <input type="text" name="city" value="Colombo"> -->
                    <input type="hidden" name="country" value="Sri Lanka">
                    <input type="hidden" name="hash" value="098F6BCD4621D373CADE4E832627B4F6">

                    <input type="text" name="order_number" class="order_number" style="display:none;"></input>
                    <input type="hidden" name="cart_table_to_db" value="" class="form-control cart_table_to_db"/>
                    <input type="hidden" name="db_calc_courier_charge" value="" class="form-control db_calc_courier_charge"/>
                    <input type="hidden" name="db_calc_total_amount" value="" class="form-control db_calc_total_amount"/>

                 
                    <!-- Replace with generated hash -->
                    <div class="form-group center_btn">
                        <input type="submit" value="Buy Now" id="buy_now_btn" class="btn btn-primary buy_now_btn" style="position: relative; left: 912px;">
                    </div>
                       
                </div>
            </form> 
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script>
    
	$(document).ready(function(){

    // ------------------------------
    function global(){
        //window.alert("hi");

        
        
        var final_sub_total = 0;

        $("#cart_item_table").find("tr.cart-item-record").each(function() {
            //window.alert("hi");

            $(this).find("td").each(function(index) {
                if(index == 4){
                   
                    var this_sub_total = parseInt($(this).text().trim());
                    //window.alert(this_sub_total);
                    final_sub_total += this_sub_total;
                    $("#cart_grand_amount").text(final_sub_total);
                    $("#card_grand_amount_with_courier").text(final_sub_total + 100);
                }
                //window.alert(final_sub_total);
                
            });
            
        });
    }

    


    $(".quantity_decrement").click(function(){
        var dynamic_input_value = parseInt($(this).next("div").text());
        // var dynamic_input_value = $(this).pre("div").text();
        // var dynamic_input_value = $("quantity_value").text();

        //window.alert(dynamic_input_value);

        if(dynamic_input_value > 1){
            --dynamic_input_value;
            $(this).next(".quantity_value").text(dynamic_input_value);
            $(this).parent().prev().text(dynamic_input_value);
             
            var this_product_price = parseInt($(this).parent().parent().prev().text());
            var this_product_sub_total = this_product_price * dynamic_input_value;
            //$(this).parent().parent().parent().css("color","pink");
            //$(this).prev().prev().next().text.css("display","none");

            $(this).parent().parent().next().text(this_product_sub_total);
            
        }
        global();
    });

    $(".quantity_increment").click(function(){
        var dynamic_input_value = parseInt($(this).prev("div").text());

        //window.alert(dynamic_input_value);

        if(dynamic_input_value >= 1){
            ++dynamic_input_value;
            $(this).prev(".quantity_value").text(dynamic_input_value);
            $(this).prev().prev().parent().prev().text(dynamic_input_value);

            var this_product_price = parseInt($(this).parent().parent().prev().text());
            var this_product_sub_total = this_product_price * dynamic_input_value;

            $(this).parent().parent().next().text(this_product_sub_total);
        }

        global();
            
    });
    
    //-------------------------------

        $("#payement_form").hide(200);

		$(".confirm-order-btn").click(function(){

			var cod_cart_record = "";

	    	$("#cart_item_table").find("tr.cart-item-record").each(function() {

            cod_cart_record += "NEW_ITEM: ";

            var data_index = 1;
            $(this).find("td.cart-data span").each(function() {
              if(data_index == 1){
                  
              }
              if(data_index == 2){
                  cod_cart_record += "Rs: ";
              }
              if(data_index == 3){
                  cod_cart_record += "Qty: ";
                  data_index *= 0;
                  data_index += 1;
              }
             
              cod_cart_record += $(this).text().trim();
   
              cod_cart_record += ", ";
              data_index += 1;
            });
            cod_cart_record += "<br>";
            
          });
          //window.alert(cod_cart_record);

	      var cart_total = $("#cart_grand_amount").text();
	      var final_total = $("#card_grand_amount_with_courier").text();
	      $(".db_calc_courier_charge").val("100");	
	      $(".db_calc_courier_charge").val(cart_total);
	      $(".cart_table_to_db").val(cod_cart_record);	

          $("#payement_form").show();
	      
		});
	});
</script>

<!-- cart_grand_amount = cart total, courier_charge, card_grand_amount_with_courier -->
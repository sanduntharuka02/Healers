<style type="text/css">
.ajax-category-menu {
  padding: 10px;
  background-color: #f4f4f4;
  margin-bottom: 40px;
}
td.ajax-category-loader-btn-holder{
  background-color: #f4f4f4;
  cursor:pointer !important;
}
td.ajax-category-loader-btn-holder:hover{
  background-color: #dddddd;
  cursor:pointer !important;
}
label.ajax-category-loader-btn {
  width: 100%;
  display: block;
  padding: 10px 20px;
  cursor:pointer !important;
}


</style>




<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 text-center" style="position: relative;">
       <div class="load-ajax-filter-product-data mob-center" style="text-align:left;">
        
       </div>
    </div>  

</div>


<script src="common/js/jquery-3.6.0.js"></script>
<script>

$(document).ready(function(){

    function get_all_filter_details(filter_param_1, filter_param_2, filter_param_3, filter_param_4, filter_param_5){
		$.ajax({
			type: "GET",
			url : "TEST_models/load-filter-products.php?filter_parameter_sort_by_="+filter_param_1+"&filter_parameter_color_="+filter_param_2+"&filter_parameter_size_="+filter_param_3+"&filter_parameter_price_range_low_="+filter_param_4+"&filter_parameter_price_range_high_="+filter_param_5,
			datatype : "html",
			success: function(response){
				console.log(response);
				$(".load-ajax-filter-product-data").html(response);
			}
		});
	}

	$(".common-filter-button-exe").click(function(){
	    $(".initial-banner").hide();
	    
		var filter_parameter_sort_by_ = $(".filter_parameter_sort_by_").val();  
        var filter_parameter_color_ = $(".filter_parameter_color_").val();
        var filter_parameter_size_ = $(".filter_parameter_size_").val();
        var filter_parameter_price_range_low_ = $(".filter_parameter_price_range_low_").val();
        var filter_parameter_price_range_high_ = $(".filter_parameter_price_range_high_").val();
        
        console.log(filter_parameter_sort_by_);
        console.log(filter_parameter_color_);
        console.log(filter_parameter_size_);
        console.log(filter_parameter_price_range_low_);
        console.log(filter_parameter_price_range_high_);

		get_all_filter_details(filter_parameter_sort_by_, filter_parameter_color_, filter_parameter_size_, filter_parameter_price_range_low_, filter_parameter_price_range_high_);
	});
	
});

</script>

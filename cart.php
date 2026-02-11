<?php include 'includes/header.php'; ?>

	<!--/Banner Section/-->
	<section class="banner">
		<div class="banner-overlay"></div>
		<div class="banner-text">
			<h2>Shop Cart</h2>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li>Shop cart page</li>
			</ul>
		</div>
	</section><!--/Banner Section end/-->

	<!-- shopping-cart -->
	<section class="shopping-cart">
		<div class="container">
			<div class="row">
				<div class="table-responsive cart-table">
					<table class="shop-cart">
						<thead>
							<tr>
								<th class="cart-single-item">product</th>
								<th class="cart-price">price</th>
								<th class="cart-quantity">quantity</th>
								<th class="cart-total">total</th>
								<th class="cart-item-remove">edit</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="cart-single-item">
									<div class="item-img">
										<a href=""><img src="assets/images/food-menu/cart1.jpg" alt=""></a>
									</div>
									<div class="item-name">
										<a href="#">Product Title Here</a>
									</div>
								</td><!-- cart-single-item -->
								<td class="cart-price">
									<span>$20.00</span>
								</td><!-- cart-price -->
								<td class="cart-quantity">
									<div class="product-quantity">
										<input type="submit" name="submit" value="-">
										<input type="text" name="text" value="2">
										<input type="submit" name="submit" value="+">
									</div>
								</td><!-- cart-quantity -->
								<td class="cart-total">
									<span>$40.00</span>
								</td><!-- cart-total -->
								<td class="cart-item-remove">
									<a href="#">
										<i class="fa fa-times"></i>
									</a>
								</td><!-- cart-item-remove -->
							</tr>
							<tr>
								<td class="cart-single-item">
									<div class="item-img">
										<a href=""><img src="assets/images/food-menu/cart1.jpg" alt=""></a>
									</div>
									<div class="item-name">
										<a href="#">Product Title Here</a>
									</div>
								</td><!-- cart-single-item -->
								<td class="cart-price">
									<span>$20.00</span>
								</td><!-- cart-price -->
								<td class="cart-quantity">
									<div class="product-quantity">
										<input type="submit" name="submit" value="-">
										<input type="text" name="text" value="2">
										<input type="submit" name="submit" value="+">
									</div>
								</td><!-- cart-quantity -->
								<td class="cart-total">
									<span>$40.00</span>
								</td><!-- cart-total -->
								<td class="cart-item-remove">
									<a href="#">
										<i class="fa fa-times"></i>
									</a>
								</td><!-- cart-item-remove -->
							</tr>
							<tr>
								<td class="cart-single-item">
									<div class="item-img">
										<a href=""><img src="assets/images/food-menu/cart1.jpg" alt=""></a>
									</div>
									<div class="item-name">
										<a href="#">Product Title Here</a>
									</div>
								</td><!-- cart-single-item -->
								<td class="cart-price">
									<span>$20.00</span>
								</td><!-- cart-price -->
								<td class="cart-quantity">
									<div class="product-quantity">
										<input type="submit" name="submit" value="-">
										<input type="text" name="text" value="2">
										<input type="submit" name="submit" value="+">
									</div>
								</td><!-- cart-quantity -->
								<td class="cart-total">
									<span>$40.00</span>
								</td><!-- cart-total -->
								<td class="cart-item-remove">
									<a href="#">
										<i class="fa fa-times"></i>
									</a>
								</td><!-- cart-item-remove -->
							</tr>
							<tr>
								<td class="cart-single-item">
									<div class="item-img">
										<a href=""><img src="assets/images/food-menu/cart1.jpg" alt=""></a>
									</div>
									<div class="item-name">
										<a href="#">Product Title Here</a>
									</div>
								</td><!-- cart-single-item -->
								<td class="cart-price">
									<span>$20.00</span>
								</td><!-- cart-price -->
								<td class="cart-quantity">
									<div class="product-quantity">
										<input type="submit" name="submit" value="-">
										<input type="text" name="text" value="2">
										<input type="submit" name="submit" value="+">
									</div>
								</td><!-- cart-quantity -->
								<td class="cart-total">
									<span>$40.00</span>
								</td><!-- cart-total -->
								<td class="cart-item-remove">
									<a href="#">
										<i class="fa fa-times"></i>
									</a>
								</td><!-- cart-item-remove -->
							</tr>
							<tr>
								<td class="cart-single-item">
									<div class="item-img">
										<a href=""><img src="assets/images/food-menu/cart1.jpg" alt=""></a>
									</div>
									<div class="item-name">
										<a href="#">Product Title Here</a>
									</div>
								</td><!-- cart-single-item -->
								<td class="cart-price">
									<span>$20.00</span>
								</td><!-- cart-price -->
								<td class="cart-quantity">
									<div class="product-quantity">
										<input type="submit" name="submit" value="-">
										<input type="text" name="text" value="2">
										<input type="submit" name="submit" value="+">
									</div>
								</td><!-- cart-quantity -->
								<td class="cart-total">
									<span>$40.00</span>
								</td><!-- cart-total -->
								<td class="cart-item-remove">
									<a href="#">
										<i class="fa fa-times"></i>
									</a>
								</td><!-- cart-item-remove -->
							</tr>
						</tbody>
					</table><!--  shop cart -->
				</div>
				<div class="coupon-checkout">
					<div class="coupon">
						<input class="input-box" type="text" name="text" placeholder="Coupon Code...">
						<input class="button" type="submit" name="submit" value="apply coupon">
					</div><!-- coupon -->
					<div class="checkout">
						<button type="submit" class="button">update cart</button>
						<button type="submit" class="button">proceed checkout</button>
					</div><!-- checkout -->
				</div><!-- coupon-checkout -->
				<div class="shipping-totalprice">
					<div class="row">
						<div class="col-md-6">
							<div class="calculate-shipping">
								<h3>Calculate Shipping</h3>
								<div class="catagory-item">
									<select>
										<option>United Kingdom(UK)</option>
										<option>Bangladesh</option>
										<option>United State(USA)</option>
										<option>Gana</option>
										<option>Honolulu</option>
										<option>Honduras</option>
									</select>
								</div><!-- catagory-item -->
								<div class="row">
									<div class="col-md-6">
										<div class="catagory-item">
											<select>
												<option>State/Country</option>
												<option>Dhaka</option>
												<option>Chittagong</option>
												<option>Khulna</option>
												<option>Sylhet</option>
												<option>Rajshahi</option>
											</select>
										</div><!-- catagory-item -->
									</div>
									<div class="col-md-6">
										<input class="input-box" type="text" name="postcode" placeholder="postcode/ZIP">
									</div>
								</div>
								<button type="submit" class="button">update total</button>
							</div><!-- calculate-shipping -->
						</div>
						<div class="col-md-6">
						 <div class="total-price">
						 	<h3>Cart Total</h3>
						 	<ul>
						 		<li>
						 			<span class="pull-left">Cart Subtotal</span>
						 			<p class="pull-right">$ 1214.98</p>
						 		</li>
						 		<li>
						 			<span class="pull-left">Shipping and Handling</span>
						 			<p class="pull-right">Free Shipping</p>
						 		</li>
						 		<li class="order-total">
						 			<span class="pull-left">Order Total</span>
						 			<p class="pull-right">$ 1214.98</p>
						 		</li>
						 	</ul>
						 </div>
						</div>
					</div>
				</div><!-- shipping-totalprice -->
			</div>
		</div><!-- container -->
	</section><!-- shopping-cart end-->

<?php include 'includes/footer.php'; ?>
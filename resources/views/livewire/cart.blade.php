<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title">Cart</h1>
		</div>
	</div>
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Cart</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->
	@if(count(get_cart()))
	@php
		$addresses       = @Auth()->user() ? Auth()->user()->addresses :[];
		$user            = @auth()->user();
		$freight_details = Session::get('freight_charge');
		$coupon_value    = @Session::get('coupon') ? Session::get('coupon')['value'] :0;
	@endphp
	<div class="page-content">
		<div class="cart">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-10">

						<div class="table-cart cartWrapperOuter">
							@php
								$taxable_amount = get_cart_taxable_amount();
								$tax = 0;
								$freight_charge = 0; 
								$grand_total = $tax + $taxable_amount + $freight_charge - $coupon_value;
								$isGiftCard = 0;
							@endphp
							<div class="cartBlock d-none d-md-flex">
								<div class="cartBlockOne">
									<p class="fw-bold blackText">Product</p>
								</div>
								<div class="cartBlockGroup">
									<div class="cartBlockTwo">
										<p class="fw-bold blackText">Product Name</p>
									</div>
									<div class="cartBlockThree">
										<p class="fw-bold blackText">Price</p>
									</div>
									<div class="cartBlockFour">
										<p class="fw-bold blackText">Quantity</p>
									</div>
									<div class="cartBlockFive">
										<p class="fw-bold blackText">Total</p>
									</div>
									<div class="cartBlockSix">
										Remove
									</div>
								</div>
							</div>

							<form class="cart_update_form" action="{{route('cart.update')}}" method="POST">
								@csrf
								@php
									$sub_total = 0;
								@endphp
								@foreach(get_cart() as $cart)
									@php
										$total      = $cart['product']['sale_price'] * $cart['quantity'];
										$sub_total += $total;
										$category   = @App\Models\Category::find(@$cart['product']['category_id'])->title ;
										$size       = @App\Models\Size::find(@$cart['product']['size_id'])->name;
									@endphp

									@if($total>0)
										<div class="cartBlock">
											<div class="cartBlockOne">
												<div class="product">
													<figure class="product-media">
														@if($cart['product']['is_giftcard'] == 0)
														<a href="{{route('product',[$cart['product']['slug']])}}">
															<img src="{{asset(@$cart['image'])}}" alt="Product image">
														</a>
														@endif
													</figure>
												</div>
											</div>

											<div class="cartBlockGroup">
												<div class="cartBlockTwo">
													<div class="product">
														<h3 class="product-title m-0">
															<a href="{{route('product',[$cart['product']['slug']])}}">{{$cart['product']['title']}}</a>
														</h3>
														<input type="hidden" id="product_price{{$cart['product']['id']}}" data-price="{{$cart['product']['sale_price']}}">
													</div>
												</div>

												<div class="cartBlockThree">
													<span class="new-price">₹ {{round($cart['product']['sale_price']) }}</span> <br> <span class="old-price">₹ {{round($cart['product']['price'])}}</span> 
												</div>
												
												<div class="cartBlockFour">
													<div class="e-pro-qty-block">

														@if($cart['quantity']>1)
															<span wire:click="removeToCart({{$cart['product']['id']}})" class="input-number-increment">-</span>
														@else
															<span wire:click="alertConfirmDelete({{$cart['product']['id']}})" class="input-number-increment"><i class="fas fa-trash-alt"></i> X </span>
														@endif
														
														<input style="width:50px;" name="quant[{{$cart['product']['id']}}]" class="input-number" data-product_id="{{$cart['product']['id']}}" id="cart_item_count{{$cart['product']['id']}}" type="number" value="{{$cart['quantity']}}" min="{{@$cart['product']['min_qty']}}" max="{{@$cart['product']['max_qty']}}">
														
														<span wire:click="addToCart({{$cart['product']['id']}})" class="input-number-increment">+</span>
													
													</div>
												</div>
												<div class="cartBlockFive">
													&#8377;
													<span class="product_total{{$cart['product']['id']}}">{{round($total) }}</span>
												</div>
												<div class="cartBlockSix">
													<div class="e-pro-remove-block trash_btn" id="">
														<button type="button" class="btn-remove dltBtn" wire:click="alertConfirmDelete({{$cart['product']['id']}})" style="height:30px; border-radius:50%" title="Delete">X Remove Item</button>
													</div>
												</div>
											</div>
										</div>
									@endif
								@endforeach
							</form>
						</div>
						<!-- End .table table-wishlist -->
					</div><!-- End .col-lg-9 -->
					<div class="col-md-7">
						<div class="cart-bottom">
							<div class="cart-discount">
								<!-- <form action="#">
									<h3 class="blackText fw-bold">Have a promo code for checkout ?</h3>
									<div class="input-group">
										<input type="text" class="form-control" required placeholder="coupon code">
										<div class="input-group-append">
											<button class="btn commonButton-yellow m-0" type="submit">Apply</button>
										</div>
									</div>
								</form> -->
								<a href="{{route('products')}}" class="mb-3 blackText fw-bold"><i class="icon-arrow-left"></i><span>Continue Shopping</span></a>
							</div><!-- End .cart-discount -->

							<!--							<a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>-->
						</div>
					</div><!-- End .cart-bottom -->
					<aside class="col-md-3">
						<div class="summary summary-cart">
							<h3 class="summary-title">Order Summary</h3><!-- End .summary-title -->

							<table class="table table-summary">
								<tbody>
									<tr class="summary-subtotal">
										<td>Subtotal:</td>
										<td>&#8377; {{ round($taxable_amount)}}</td>
									</tr><!-- End .summary-subtotal -->
									{{-- <tr class="summary-shipping">
										<td>Shipping:</td>
										<td>&nbsp;</td>
                    				</tr>
                    

									<tr class="summary-shipping-row">
									  <td>
										<div class="custom-control custom-radio">
										  <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
										  <label class="custom-control-label" for="free-shipping">Free Shipping</label>
										</div><!-- End .custom-control -->
									  </td>
									  <td>$0.00</td>
									</tr><!-- End .summary-shipping-row -->

									<tr class="summary-shipping-row">
									  <td>
										<div class="custom-control custom-radio">
										  <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
										  <label class="custom-control-label" for="standart-shipping">Standart:</label>
										</div><!-- End .custom-control -->
									  </td>
									  <td>$10.00</td>
									</tr><!-- End .summary-shipping-row -->

									<tr class="summary-shipping-row">
									  <td>
										<div class="custom-control custom-radio">
										  <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
										  <label class="custom-control-label" for="express-shipping">Express:</label>
										</div><!-- End .custom-control -->
									  </td>
									  <td>$20.00</td>
									</tr><!-- End .summary-shipping-row --> --}}

									{{-- <tr class="summary-shipping-estimate">
									  <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
									  <td>&nbsp;</td>
									</tr>
                    				<!-- End .summary-shipping-estimate --> --}}


									<tr class="summary-total">
										<td class="blackText fw-bold">Total:</td>
										<td class="blackText fw-bold">&#8377; {{ round($grand_total) }}</td>
									</tr><!-- End .summary-total -->
								</tbody>
							</table><!-- End .table table-summary -->

							<!-- <a href="#" class="btn btn-outline-primary-2 d-block blackText"><span>GO TO CHECKOUT</span><i class="icon-refresh"></i></a> -->
							<a href="{{route('checkout')}}" class="btn btn-outline-primary-2 d-block blackText"><span>GO TO CHECKOUT</span><i class="icon-refresh"></i></a>
							<!-- <a href="{{route('checkout')}}" class="btn btn-order d-block commonButton-yellow mt-1">GO TO CHECKOUT</a> -->
						</div><!-- End .summary -->


					</aside><!-- End .col-lg-3 -->
				</div><!-- End .row -->
			</div><!-- End .container -->
		</div><!-- End .cart -->
	</div><!-- End .page-content -->
	@else
	<div style="min-height:400px">
		<br>
		<br>
		<h3 style="text-align: center">Your cart is empty!</h3>
		<p style="text-align: center">Add items to it now.</p>

		<div class="text-center">
			<a href="{{route('products')}}" style="background: #2874f0;
      color: #fff;" class="btn btn-lg pull-center">Shop Now</a>
		</div>
		@endif
</main><!-- End .main -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

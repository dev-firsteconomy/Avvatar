@extends('layouts.app')
@section('content')

<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title">My Account</h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
	<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item fw-bold active" aria-current="page">My Account</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	@if(session()->has('success'))
	<p class="text-alert" style="text-align:center;"> {{ session()->get('success') }}</p>
	@endif
	@foreach ($errors->all() as $error)
	<p class="text-danger" style="text-align:center;">{{ $error }}</p>
	@endforeach
	<div class="page-content">
		<div class="dashboard">
			<div class="container">
				<div class="row">
					<aside class="col-md-3 col-lg-2">
						<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
							<li class="nav-item">
								<a class="nav-link " id="tab-dashboard-link" data-bs-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab-orders-link" data-bs-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab-wishlist-link" data-bs-toggle="tab" href="#tab-wishlist" role="tab" aria-controls="tab-wishlist" aria-selected="false">Wishlist</a>
							</li>
							{{-- <li class="nav-item">
								        <a class="nav-link" id="tab-downloads-link" data-bs-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Downloads</a>
								    </li> --}}
							<li class="nav-item">
								<a class="nav-link active" id="tab-address-link" data-bs-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab-account-link" data-bs-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab-password-link" data-bs-toggle="tab" href="#tab-password" role="tab" aria-controls="tab-account" aria-selected="false">Change Password</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('user.logout') }}">Sign Out</a>
							</li>
						</ul>
					</aside><!-- End .col-lg-3 -->

					<div class="col-md-9 col-lg-10">
						<div class="tab-content">
							<div class="tab-pane fade " id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
								<p class="mb-1">Hello, <span class="fw-bold text-capitalize text-dark">{{auth()->user()->name}}</span>
								</p>
								<p class="mb-1">From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link fw-bold">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link  fw-bold">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link  fw-bold">edit your password and account details</a>.</p>
								<p>If you're not <span class="fw-bold text-capitalize text-dark">{{auth()->user()->name}}</span>? Click the button below to logout</p>
								<div class="logOutDashButton">
									<a href="{{ route('user.logout') }}" class="commonButton-yellow">Log Out</a>
								</div>
							</div><!-- .End .tab-pane -->

							<div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
								<div class="row">
									@php
									$orders=App\Models\Order::where('user_id',auth()->user()->id)->latest()->paginate(10);
									@endphp
									<!-- Order -->
									@if(count($orders)>0)
									<div class="col-xl-12 col-lg-12 d-none">
										<table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
											<thead>
												<tr style="text-align: center;">
													<th>S.N.</th>
													<th>Order No.</th>
													<th>Name</th>
													<th>Quantity</th>
													<th>Sub Total</th>
													<th>Coupon Discount</th>
													<th>Gift Card Discount</th>
													<th>Taxable Amount</th>
													<th>Tax </th>
													<th>Total Amount</th>
													<th>Payment Staus</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($orders as $order)
												<tr style="text-align: center;">
													<td>{{$order->id}}</td>
													<td>{{$order->order_number}}</td>
													<td>{{@$order->address->first_name}} {{@$order->address->last_name}}</td>
													<td>{{$order->quantity}}</td>
													<td>&#x20B9; {{$order->sub_total}}</td>
													<td>&#x20B9; {{$order->coupon_value}}</td>
													<td>&#x20B9; {{$order->giftcard_value}}</td>
													<?php 
																	$subtotal = 0;
																	$tax = 0;
																
																	if($order->total_amount > 1000)
																	{
																		$taxPercent = 12;
																	} 
																	else 
																	{
																		$taxPercent = 5;
																	}
												
																	$calculateGst = $order->taxable_amount - ( $order->taxable_amount * (100/(100 + $taxPercent)));
																	$amtExclGst   = $order->taxable_amount - $calculateGst;
																?>
													<td>&#x20B9; {{round($amtExclGst ,2)}}</td>
													<td>&#x20B9; {{round($calculateGst,2)}}</td>
													<td>&#x20B9; {{number_format($order->total_amount,2)}}</td>
													<td>
														@if($order->payment_status=='paid')
														<span class="badge badge-success">{{$order->payment_status}}</span>
														@elseif ($order->payment_status=='process')
														<span class="badge badge-warning">{{$order->payment_status}}</span>
														@elseif ($order->payment_status=='failed')
														<span class="badge badge-danger">{{$order->payment_status}}</span>
														@else
														<span class="badge">{{$order->payment_status}}</span>
														@endif
													</td>
													<td>
														<span class="badge {{@$order->order_status->class}}">{{@$order->order_status->name}}</span>
													</td>
													<td>
														{{-- <a href="{{route('invoice',$order->id)}}" data-toggle="tooltip" title="view" data-placement="bottom">View</a> --}}
														{{-- <form method="POST" action="{{route('user.order.delete',[$order->id])}}">
														@csrf
														@method('delete')
														<button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
														</form> --}}
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
										{{$orders->links()}}
									</div>

									<div class="ordersDataWrapper">
										<div class="orderDataBox d-md-flex rounded-2">
											<div class="orderImg">
												<img class="img-fluid" src="https://via.placeholder.com/100x100" alt="">
											</div>
											<div class="orderDetail mt-2 mt-md-0">
												<div class="orderName">
													<h5>Avvatar Mass Gainer Belgian Chocolate Flavour 2 Kg</h5>
												</div>
												<div class="orderVariantBox d-flex gap-2">
													<div class="orderVariant">
														<span class="badge bg-success">4.5</span>
													</div>
													<div class="orderVariant">
														<p class="m-0"><span class="fw-bold">Size :</span> <span>1 KG</span></p>
													</div>
												</div>
											</div>
											<div class="orderStatusReview">
												<p><a href=""><i class="icon-star"></i> Rate &amp; Review Product</a></p>
											</div>
										</div>
									</div>
									@else
									<p>No order has been made yet.</p>
									<a href="/" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
									@endif
								</div>
							</div> <!-- .End .tab-pane -->

							<div class="tab-pane fade" id="tab-wishlist" role="tabpanel" aria-labelledby="tab-wishlist-link">
								@if(count(Helper::getAllProductFromWishlist()))
								<table class="table shopping-summery d-none">
									<thead>
										<tr class="main-hading">
											<th>PRODUCT IMAGE</th>
											<th>PRODUCT NAME</th>
											<th class="text-center">TOTAL</th>
											<th class="text-center">ADD TO CART</th>
											<th class="text-center">REMOVE</th>
										</tr>
									</thead>
									<tbody>
										@foreach(Helper::getAllProductFromWishlist() as $key=>$wishlist)
										@if(@$wishlist->product)
										<tr style="text-align: center;">
											<td class="image" data-title="No"><img class="product_img" src="{{@$wishlist->product->images()->first()->image}}" alt="{{@$wishlist->product->images()->first()->image}}" style="height:50px; width:50px;"></td>
											<td class="product-des" data-title="Description">
												<p class="product-name"><a href="{{route('product-detail',$wishlist->product->slug)}}">{{$wishlist->product->name}}</a></p>
												<p class="product-des">{!!($wishlist['summary']) !!}</p>
											</td>
											<td class="total-amount" data-title="Total"><span>Rs. {{$wishlist['amount']}}</span></td>
											<td><a href="{{route('add-to-cart',$wishlist->product->slug)}}" class='btn btn-success btn-xs'>Add To Cart</a></td>
											<td class="action" data-title="Remove"><a href="{{route('wishlist-delete',$wishlist->id)}}"><i class="fas fa-trash"></i>X</a></td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>

								<div class="ordersDataWrapper">
									<div class="orderDataBox d-md-flex rounded-2">
										<div class="orderImg">
											<img class="img-fluid" src="https://via.placeholder.com/100x100" alt="">
										</div>
										<div class="orderDetail mt-2 mt-md-0">
											<div class="orderName">
												<h5>Avvatar Mass Gainer Belgian Chocolate Flavour 2 Kg</h5>
											</div>
											<div class="orderVariantBox d-flex align-items-center gap-2">
												<div class="orderVariant">
													<span class="badge bg-success">4.5</span>
												</div>
												<div class="orderVariant">
													<p class="m-0"><span class="fw-bold">Size :</span> <span>1 KG</span></p>
												</div>
											</div>
											<div class="orderPrice mt-1">
												<h5 class="fw-bold"><i class="icon-rupee"></i>1895 <span class="mrp text-decoration-line-through fw-normal">2000</span></h5>
											</div>
										</div>
										<div class="orderStatusReview">
											<p><a href=""><i class="icon-star"></i> Rate &amp; Review Product</a></p>
										</div>
									</div>
								</div>
								@else
								<div style="min-height:400px">
									<p>You have no items in your wishlist. Start adding!</p>
									<a href="/" class="btn btn-outline-primary-2"><span>Add Now</span><i class="icon-long-arrow-right"></i></a>
									{{-- <br>
												<br>
												<h3 style="text-align: center">Empty Wishlist!</h3>
												<p style="text-align: center">You have no items in your wishlist. Start adding!</p>												
												<div class="text-center">
													<a href="{{route('products')}}" style="background: #2874f0;
									color: #fff;" class="btn btn-lg pull-center">Add Now</a>
								</div> --}}
							</div>
							@endif
						</div><!-- .End .tab-pane -->

						{{-- <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
								    	<p>No downloads available yet.</p>
								    	<a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
								    </div><!-- .End .tab-pane --> --}}

						<div class="tab-pane fade show active" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
							<h3 class="card-title">Manage Address</h3>
							<p>The following addresses will be used on the checkout page by default.</p>

							<div class="row">
								<div class="col-lg-12">
									<div class="card addressCardsWrapper">
										<?php $addresses = auth()->user()->addresses; ?>

										<div class="row">
											@foreach($addresses as $key => $address)
											<div class="col-md-6">
												<div class="addressCardBox">
													<div class="addresses ">
														<div class="d-flex w-100 justify-content-between align-items-center mb-1">
															<h5 class="fw-bold m-0 text-capitalize">
																<!--Address {{++$key}} -->
																{{$address->first_name}}
																<span class="addressType">{{$address->is_primary ? '(Default Address)':''}}</span>
															</h5>

															<div class="addressAction d-flex gap-2">

																<div class="dropdown">
																	<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
																		<img src="{{URL::asset('assets/images/new/dots.png')}}" class="img-fluid">
																	</a>
																	<div class="dropdown-menu">
																		<button class="btn-link bg-transparent ml-3 updateClickButton" id="{{$address->id}}" type="button">Edit</button>
																		<form method="POST" action="{{route('remove-user-address',$address->id)}}"> @csrf
																			<button class="btn-link bg-transparent ml-3" type="submit">Delete</button>
																		</form>
																	</div>
																</div>

															</div>
														</div>
														<div class="addressBlock">
															<p>{{$address->address}}, <span>{{$address->address1}}</span> <span>{{$address->address2}} </span> <span>{{$address->get_state->name}}</span> - <span>{{$address->get_city->name}}</span> - <span>{{$address->pincode}}</span></p>
														</div>

														<div class="addressContact d-flex align-items-center gap-3">
															<p class="d-flex align-items-center justify-content-center">
																<span class="icon rounded-2"><i class="icon-phone"></i></span>
																<span>{{$address->mobile}}</span>
															</p>
															<p class="d-flex align-items-center justify-content-center">
																<span class="icon rounded-2"><i class="icon-envelope"></i></span>
																<span>{{$address->email}}</span>
															</p>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>

										@foreach($addresses as $key => $address)
										<div id="updateAddress{{$address->id}}" class="updateAddress mt-2" style="display:none;">
											<form action="{{url('create-user-address')}}" class="place_order" method="POST">
												@csrf
												<input type="hidden" name="flag" value="{{$address->id}}">
												<div class="singleRecord">
													<div class="row">
														<div class="col-sm-12">
															<label>Full Name *</label>
															<input type="text" class="form-control text-capitalize" name="first_name" value="{{$address->first_name}}" required>
														</div>

														<div class="col-sm-6">
															<label>Phone *</label>
															<input type="tel" class="form-control" name="mobile" value="{{$address->mobile}}" required>
														</div>
														<div class="col-sm-6">
															<label>Email Address *</label>
															<input type="text" class="form-control" name="email" value="{{$address->email}}" required>
														</div>
													</div>
													<label>Address Line 1*</label>
													<input type="text" class="form-control" name="address" value="{{$address->address}}" required>
													<label>Address Line 2</label>
													<input type="text" class="form-control" name="address1" value="{{$address->address2}}">
													<div class="row">
														<div class="col-sm-4">
															<label>State *</label>
															<select class="form-control state_id" data-id="{{$address->id}}" name="state_id" required>
																<option value="">Select State </option>
																@foreach($states as $state)
																<option value="{{$state->id}}" {{isset($address->state_id) && $address->state_id == $state->id ? 'selected':''}}>{{$state->name}}</option>
																@endforeach
															</select>
														</div>
														<?php
																		$cities = App\Models\City::where('state_id',$address->state_id)->get(); 
																	?>
														<div class="col-sm-4">
															<label>Town / City *</label>
															<select class="form-control city{{$address->id}}" name="city_id" id="city{{$address->id}}" required>
																<option value="">Select City </option>
																@foreach($cities as $city)
																<option value="{{$city->id}}" {{isset($address->city_id) && @$address->city_id == $city->id ? 'selected':''}}>{{$city->name}}</option>
																@endforeach
															</select>
														</div>
														<div class="col-sm-4">
															<label>Postcode / ZIP *</label>
															<input type="text" class="form-control" name="pincode" value="{{$address->pincode}}" required>
														</div>
													</div>
													<div class="row">
														<div class="isPrimary">
															<input type="checkbox" id="is_primary" name="is_primary" value="1" {{$address->is_primary == 1 ? 'checked':''}}>
															<label for="is_primary">Set as Primary Address ?</label>
														</div>

													</div>
												</div>
												<br>
												<button type="submit" class="btn btn-outline-primary-2 mb-2">
													<span>Update Address</span>
												</button>
											</form>
										</div>
										@endforeach

										<div class="addNewAddress mt-4">
											<button class="commonButton-yellow text-capitalize" id="addNewAddress">Add New Address</button>
										</div>


										<div id="newAddresForm" class="AddAddress mt-2" style="display:none;">
											<form action="{{url('create-user-address')}}" class="place_order" method="POST">
												@csrf
												<input type="hidden" name="flag" value="0">
												<div class="singleRecord">
													<div class="row">
														<div class="col-sm-6">
															<label>Full Name *</label>
															<input type="text" class="form-control text-capitalize" name="first_name" value="" required>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<label>Phone *</label>
															<input type="tel" class="form-control" name="mobile" value="" required>
														</div>
														<div class="col-sm-6">
															<label>Email Address *</label>
															<input type="text" class="form-control" name="email" value="" required>
														</div>
													</div>
													<label>Address Line 1*</label>
													<input type="text" class="form-control" name="address" value="" required>
													<label>Address Line 2</label>
													<input type="text" class="form-control" name="address1" value="">
													<div class="row">
														<div class="col-sm-4">
															<label>State *</label>
															<select class="form-control state_id" name="state_id" data-id="0" required>
																<option value="">Select State </option>
																@foreach($states as $state)
																<option value="{{$state->id}}">{{$state->name}}</option>
																@endforeach
															</select>
														</div>
														<div class="col-sm-4">
															<label>Town / City *</label>
															<select class="form-control city0" name="city_id" required>
																<option value="">Select City </option>
															</select>
														</div>
														<div class="col-sm-4">
															<label>Postcode / ZIP *</label>
															<input type="text" class="form-control" name="pincode" value="" required>
														</div>
													</div>
													<div class="row">
														<div class="isPrimary">
															<input type="checkbox" id="is_primary" name="is_primary" value="1">
															<label for="is_primary">Set as Primary Address ?</label>
														</div>

													</div>
												</div>
												<br>
												<button type="submit" class="btn btn-outline-primary-2 mb-2">
													<span>Add New</span>
												</button>
											</form>
										</div>

									</div><!-- End .card-dashboard -->
								</div><!-- End .col-lg-6 -->
							</div><!-- End .row -->
						</div><!-- .End .tab-pane -->

						<div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
							<form method="POST" action="{{route('user-profile-update',auth()->user()->id)}}">
								@csrf
								<div class="row">
									<div class="col-sm-6">
										<label>Full Name *</label>
										<input type="text" class="form-control text-capitalize" name="name" value="{{auth()->user()->name}}" required>
									</div><!-- End .col-sm-6 -->

									<div class="col-sm-6">
										<label>Email address *</label>
										<input type="email" class="form-control keyup-email" name="email" value="{{auth()->user()->email}}" required>
									</div>

									<div class="col-sm-6">
										<label>Mobile Number *</label>
										<input type="tel" class="form-control keyup-mobile" name="mobile" value="{{auth()->user()->mobile}}" minlength="10" maxlength="10" placeholder="Enter your 10 digit mobile" required>
									</div>
									{{-- <div class="col-sm-6">
			                						<label>Last Name *</label>
			                						<input type="text" class="form-control" required>
			                					</div><!-- End .col-sm-6 --> --}}
								</div><!-- End .row -->

								{{-- <label>Display Name *</label>
		            						<input type="text" class="form-control" value="{{auth()->user()->name}}" required>
								<small class="form-text">This will be how your name will be displayed in the account section and in reviews</small> --}}




								<br>
								<button type="submit" class="btn btn-outline-primary-2 mb-2">
									<span>SAVE CHANGES</span>
									<i class="icon-long-arrow-right"></i>
								</button>
							</form>
						</div>

						<div class="tab-pane fade" id="tab-password" role="tabpanel" aria-labelledby="tab-account-link">
							<form method="POST" class="row" action="{{ route('change.password') }}">
								@csrf

								<div class="col-md-12">
									<label>Current password (leave blank to leave unchanged)</label>
									<input type="password" class="form-control" name="current_password" required>
								</div>

								<div class="col-md-6">
									<label>New password (leave blank to leave unchanged)</label>
									<input type="password" class="form-control" name="new_password" required>
								</div>


								<div class="col-md-6">
									<label>Confirm new password</label>
									<input type="password" class="form-control mb-2" name="new_confirm_password" required>
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-outline-primary-2 mb-2">
										<span>SAVE CHANGES</span>
										<i class="icon-long-arrow-right"></i>
									</button>
								</div>
							</form>
						</div><!-- .End .tab-pane -->
					</div>
				</div><!-- End .col-lg-9 -->
			</div><!-- End .row -->
		</div><!-- End .container -->
	</div><!-- End .dashboard -->
	</div><!-- End .page-content -->
</main><!-- End .main -->
<script>
	$('body').on('change', '.state_id', function() {
		var state_id = $(this).val();
		var id = $(this).data('id');
		console.log(id);
		if (state_id) {
			$.ajax({
				url: "{{url('get_cities_by_state_id')}}",
				data: {
					_token: "{{csrf_token()}}",
					state_id
				},
				type: "POST",
				success: function(response) {
					var html_option = ""
					var data = response;
					$.each(data, function(id, title) {
						var selected_id = '{{old('
						city_id ')}}';
						if (selected_id == id)
							html_option += "<option selected value='" + id + "'>" + title + "</option>"
						else
							html_option += "<option  value='" + id + "'>" + title + "</option>"

					});
					$('.city' + id).html(html_option);
				}
			});
		} else {
			$('.city').html('');
		}
	});

	$('body').on('click', '.updateClickButton', function() {
		$('.updateAddress').hide();
		$('.AddAddress').hide();
		$('#updateAddress' + $(this).attr('id')).show();
		$("html, body").animate({
			scrollTop: $("#updateAddress" + $(this).attr("id")).offset().top
		}, 500);
	});

	$('body').on('click', '#addNewAddress', function() {
		$('.updateAddress').hide();
		$('.AddAddress').show();
		$("html, body").animate({
			scrollTop: $(".AddAddress").offset().top
		}, 500);
	});

</script>
<script>
	$(document).ready(function() {
		$('.keyup-email').keyup(function() {
			$('span.error-keyup-7').remove();
			var inputVal = $(this).val();
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if (!emailReg.test(inputVal)) {
				$(this).after('<span class="error error-keyup-7">Invalid Email Format.</span>');
			}
		});

		$(".keyup-mobile").keypress(function(e) {
			var mobilePattern = /^\d{9}$/;
			var mobile = $(this).val();

			$('span.error-keyup-8').remove();
			if (!mobilePattern.test(mobile)) {
				$(this).after('<span class="error error-keyup-8">Invalid Mobile Number.</span>');
			} else {
				$('span.error-keyup-8').remove();
			}
			// var keyCode = e.keyCode || e.which;

			// $(this).after('');

			// //Regex for Valid Characters i.e. Numbers.
			// var regex = /^[0-9]+$/;

			// //Validate TextBox value against the Regex.
			// var isValid = regex.test(String.fromCharCode(keyCode));
			// if (!isValid) 
			// {
			//     $(this).after('<span class="error error-keyup-7">Invalid Mobile Number.</span>');
			// }

			// return isValid;
		});
	});

</script>

@endsection

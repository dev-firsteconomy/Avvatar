@extends('layouts.app')
@section('content')

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('/cart')}}">Cart</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('/checkout')}}">checkout</a></li>
				<li class="breadcrumb-item active fw-bold" aria-current="page">Order Details</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->
	<div class="container">
		<div class="orderCompleteThankYou mb-4 d-flex flex-column align-items-center">
			<img src="{{asset('assets/images/new/order-complete.png')}}" class="img-fluid" alt="">
			<h2 class="fw-bold">Thank You!</h2>
			<h3 class="m-0">Your order has been placed</h3>
		</div>
		@php
		$addresses = @Auth()->user() ? Auth()->user()->addresses()->where('is_primary',1)->first() :[];
		$user = @auth()->user();
		$freight_details = Session::get('freight_charge');
		$coupon_value = @Session::get('coupon') ? Session::get('coupon')['value'] :0;
		$giftcard_value = @Session::get('giftcard') ? Session::get('giftcard')['value'] :0;
		@endphp
		<form id="checkoutForm" action="{{url('place-order')}}" class="place_order" method="POST">
			@csrf
			<input type="hidden" name="address_id" id="address_id" value={{@$addresses ?$addresses->id:'new'}}>
			<div class="row justify-content-center">
				<aside class="col-lg-11">
					<div class="summary">
						<table class="table table-summary">
							<thead>
								<tr>
									<th class="fw-bold">Product</th>
									<th class="fw-bold">Price</th>
								</tr>
							</thead>
							@php
							$offer = 0;
							$totalAmt = get_cart_total_amount();
							$taxable_amount = get_cart_taxable_amount();
							$tax = 0;// get_tax_total($taxable_amount);
							$freight_charge = 0;// @$freight_details['freight_charge'] ? $freight_details['freight_charge'] :0;
							$offerDiscount1 = get_offer_discount_amount1();
							$offerDiscount2 = get_offer_discount_amount2();
							//$offer = get_offer_type();
							// if($offer != 0)
							// {
							$offerValue1 = get_offer_value(1);
							$offerValue2 = get_offer_value(2);
							//}
							$grand_total = $tax + $taxable_amount + $freight_charge - $offerDiscount1 - $offerDiscount2 - $giftcard_value - $coupon_value;
							$isGiftCard = 0;
							$discountRs = $totalAmt - $taxable_amount;
							$discountPer = 0;
							if($discountRs != 0)
							{
							$discountPer = (100 * ($discountRs)) / $totalAmt;
							}
							// dd(get_cart());
							@endphp
							<tbody>
								@foreach (get_cart() as $cart)
								@php
								$total = $cart['product']['price'] * $cart['quantity'];
								if($cart['product']['is_giftcard'] == 1)
								{
								$isGiftCard = 1;
								}
								@endphp
								<tr>
									<td>
										<!--												{{$cart['quantity']}}-->
										<div class="checkoutSummary">
											<img src="{{asset(@$cart['image'])}}" alt="Product image">
											<a href="#">{{$cart['product']['name']}}</a>
										</div>
									</td>
									<td> {!! $rupee !!} {{round($total) }}</td>
								</tr>
								@endforeach



								<tr class="summary-subtotal">
									<td><strong>Subtotal:</strong></td>
									<td>{!! $rupee !!} {{ round($totalAmt)}}</td>
								</tr><!-- End .summary-subtotal -->
								<tr class="summary-subtotal">
									<td>Discount <small>({{round($discountPer,2)}}%)</small>:</td>
									<td>{!! $rupee !!} {{ round($totalAmt - $taxable_amount) }}</td>
								</tr><!-- End .summary-subtotal -->
								<tr class="summary-subtotal">
									<td>Offer Discount:<br>
										@if($offerDiscount1 != 0)
										<small>(Buy 3 flat at {{round($offerValue1)}})</small><br>
										@endif
										@if($offerDiscount2 != 0)
										<small>(Buy 1 get 2nd at {{round($offerValue2)}}% off)</small>
										@endif
									</td>
									<td>{!! $rupee !!} {{ round($offerDiscount1 + $offerDiscount2) }}</td>
								</tr><!-- End .summary-subtotal -->

								<tr class="summary-subtotal">
									<td>Coupon Code:</td>
									<td>{!! $rupee !!} {{ @Session::get('coupon')['value'] ? round(Session::get('coupon')['value']) : '0.00' }}</td>
								</tr><!-- End .summary-subtotal -->
								<tr>
									<td>Shipping:</td>
									<td> {!! $rupee !!} {{number_format($freight_charge,2)}}</td>
								</tr>
								<tr class="summary-total">
									<td><strong>Grand Total:</strong></td>
									<td>{!! $rupee !!} {{ round($grand_total) }}</td>
								</tr><!-- End .summary-total -->
							</tbody>
						</table><!-- End .table table-summary -->




					</div><!-- End .summary -->
				</aside><!-- End .col-lg-3 -->
			</div><!-- End .row -->
		</form>
	</div>
</main>


@endsection

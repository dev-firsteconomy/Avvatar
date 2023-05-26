@extends('layouts.app')
@section('content')

<main class="main">
	<div class="home-menu-section">
		<ul>
			@foreach($categories as $category)
			<li>
				<a href="{{url('categories/' . $category->slug)}}">
					<img src="{{url(@$category->photo)}}" alt="{{$category->slug}}">
					<span class="first-slider-title">{{$category->title}}</span>
				</a>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="">
		<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
			@foreach ($banners as $item)
			<a href="{{$item->link}}" class="w-100">
				<img src="{{$item->photo}}">
				<!-- <div class="intro-slide" style="background-image: url({{$item->photo}});">
                        <div class="container intro-content">
                        </div>
                    </div> -->
			</a>
			@endforeach
		</div><!-- End .owl-carousel owl-simple -->

		<span class="slider-loader text-white"></span><!-- End .slider-loader -->
	</div><!-- End .intro-slider-container -->

	<!--
	<div class="container">
		<div class="row">
			<div class="col-sm-6 mb-1 mb-sm-0">
				<a href="{{url('offers/' . encrypt('offer2'))}}">
					<img src="assets/images/home/offer-1.png" alt="">
				</a>
			</div>
			<div class="col-sm-6">
				<a href="{{url('offers/' . encrypt('offer1'))}}">
					<img src="assets/images/home/offer-2.png" alt="">
				</a>
			</div>
		</div>
	</div>
-->

	<section class="fitnessGoalWrapper patternBgTop">
		<div class="container">
			<div class="heading mb-5 text-center">
				<h2 class="title text-uppercase">shop by your <span class="fw-bold">fitness goal</span></h2>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-6 col-md-3 fintessBoxOuter">
					<div class="fintessBox commonImgTextBox position-relative overflow-hidden">
						<img src="assets/images/new/homepage/bodyBuilding-trans.png" class="img-fluid" alt="">
						<div class="centerImgText w-100 text-center position-absolute">
							<p class="text-uppercase fw-bold m-0">Body Building</p>
						</div>
						<div class="knowMore yellowBg position-absolute w-100 text-center">
							<a href="#" class="d-block fw-bold text-uppercase blackText">Know More <span class="icon-arrow-right"></span></a>
						</div>
					</div>
				</div>

				<div class="col-6 col-md-3 mt-md-3 fintessBoxOuter">
					<div class="fintessBox commonImgTextBox position-relative overflow-hidden">
						<img src="assets/images/new/homepage/bodyBuilding-trans.png" class="img-fluid" alt="">
						<div class="centerImgText w-100 text-center position-absolute">
							<p class="text-uppercase fw-bold m-0">Body Building</p>
						</div>
						<div class="knowMore yellowBg position-absolute w-100 text-center">
							<a href="#" class="d-block fw-bold text-uppercase blackText">Know More <span class="icon-arrow-right"></span></a>
						</div>
					</div>
				</div>

				<div class="col-6 col-md-3 mt-3 mt-md-0 fintessBoxOuter">
					<div class="fintessBox commonImgTextBox position-relative overflow-hidden">
						<img src="assets/images/new/homepage/bodyBuilding-trans.png" class="img-fluid" alt="">
						<div class="centerImgText w-100 text-center position-absolute">
							<p class="text-uppercase fw-bold m-0">Body Building</p>
						</div>
						<div class="knowMore yellowBg position-absolute w-100 text-center">
							<a href="#" class="d-block fw-bold text-uppercase blackText">Know More <span class="icon-arrow-right"></span></a>
						</div>
					</div>
				</div>

				<div class="col-6 col-md-3 mt-3 mt-md-3 fintessBoxOuter">
					<div class="fintessBox commonImgTextBox position-relative overflow-hidden">
						<img src="assets/images/new/homepage/bodyBuilding-trans.png" class="img-fluid" alt="">
						<div class="centerImgText w-100 text-center position-absolute">
							<p class="text-uppercase fw-bold m-0">Body Building</p>
						</div>
						<div class="knowMore yellowBg position-absolute w-100 text-center">
							<a href="#" class="d-block fw-bold text-uppercase blackText">Know More <span class="icon-arrow-right"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="aboutAvaatarWrapper yellowBg">
		<div class="container">
			<div class="heading text-center">
				<h2 class="title text-uppercase">be hundread percent sure <span class="fw-bold">about avvatar</span></h2>
			</div>
		</div>

		<div class="aboutavaatarImg mt-2 mt-md-3 mb-2 mb-md-3">
			<img src="assets/images/new/homepage/hundreadPercent.png" alt="" class="img-fluid">
		</div>

		<div class="container">
			<div class="heading text-center">
				<h2 class="title text-uppercase">it's time for pure <span class="fw-bold">workout</span></h2>
				<p>the purest whey protien in the market</p>
			</div>

			<div class="row aboutAvaatarIcons">
				<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
					<img src="assets/images/new/homepage/sugarfree-Icon.png" alt="" class="img-fluid">
					<p class="mb-0">Sugar Free</p>
				</div>
				<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
					<img src="assets/images/new/homepage/cholesterol-Icon.png" alt="" class="img-fluid">
					<p class="mb-0">Low Cholesterol</p>
				</div>
				<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
					<img src="assets/images/new/homepage/gmo-Icon.png" alt="" class="img-fluid">
					<p class="mb-0">GMO Free</p>
				</div>
				<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
					<img src="assets/images/new/homepage/gluten-Icon.png" alt="" class="img-fluid">
					<p class="mb-0">Gluten Free</p>
				</div>
				<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
					<img src="assets/images/new/homepage/soy-Icon.png" alt="" class="img-fluid">
					<p class="mb-0">Soy Free</p>
				</div>
				<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
					<img src="assets/images/new/homepage/lowfat-Icon.png" alt="" class="img-fluid">
					<p class="mb-0">Low Fat</p>
				</div>
			</div>
		</div>
	</section>

	<section class="bestSellerWrapper patternBgTop">
		<div class="container">
			<div class="heading text-center mb-5">
				<h2 class="title">Best Sellers</h2><!-- End .title -->
			</div><!-- End .heading -->
		</div><!-- End .container -->

		<div class="container">
			<div class="tab-content tab-content-carousel">
				<div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
					<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
							"nav": false, 
							"dots": true,
							"margin": 20,
							"loop": false,
							"responsive": {
								"0": {
									"items":2
								},
								"480": {
									"items":2
								},
								"768": {
									"items":3
								},
								"992": {
									"items":4
								},
								"1200": {
									"items":4
								},
								"1600": {
									"items":4,
									"nav": true
								}
							}
						}'>

						@if(isset($bestSellers) && $bestSellers->isNotEmpty())
						@foreach ($bestSellers as $product)
						<div class="product productBox product-7 text-center">
							<figure class="product-media">
								<?php 
											$url = $product->images()->first();
											if($url)
											{
												$url = $product->images()->first()->image;
											}
											else {
												$url = '/images/no-image.jpg';
											}
										?>
								@if($product->tag != '')<span class="product-label label-new">{{$product->tag}}</span>@endif
								<a href="{{url('product/' .$product->slug)}}">
									<img src="{{asset($url)}}" alt="{!! @$product->meta_description !!}" class="product-image">
								</a>

								<div class="product-action-vertical">
									@if(is_user_logged_in())
									<a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
									@else
									<a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
									@endif
								</div><!-- End .product-action-vertical -->
							</figure><!-- End .product-media -->
							<?php
							// $availableColors = $product->sizesstock()->groupBy('color_id')->get();
							?>
							<div class="product-body">
								<!--
								<div class="product-cat">
									<a href="{{route('categories',$product->category->slug)}}">{{$product->category->title}}</a>
								</div>
								-->
								@if(isset($availableColors) && $availableColors->isNotEmpty())
								<div class="product-color row justify-content-center">
									@foreach($availableColors as $color)
									<div class="radio has-color">
										<label>
											<input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions-{{$product->id}}">
											<div class="custom-color"><span style="background-color:{{@$color->productColor->code}}"></span></div>
										</label>
									</div>
									@endforeach
								</div><!-- End .product-cat -->
								@endif
								<h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
								<div class="product-price">
									<div class="w-100">
										<span class="new-price">₹ {{round($product->discounted_amt) }}</span> @if($product->discounted_amt != $product->price)<span class="old-price">₹ {{round($product->price)}}</span> @endif
									</div>
									<!--									<small>(MRP incl Taxes)</small>-->
								</div><!-- End .product-price -->
								<div class="atc-container">
									<div class="mb-0">
										<a href="{{route('product',$product->slug)}}" class="btn-cart"><span class="product{{$product->id}}">Add to cart</span></a>
									</div>
								</div>
							</div><!-- End .product-body -->
						</div><!-- End .product -->
						@endforeach
						@endif


					</div><!-- End .owl-carousel -->
				</div><!-- .End .tab-pane -->
			</div><!-- End .tab-content -->
		</div><!-- End .container-fluid -->
	</section>

	<section class="categoriesWrapper patternBgTop">
		<div class="container">
			<div class="heading mb-5 text-center">
				<h2 class="title text-uppercase">Product <span class="fw-bold">Categories</span></h2>
			</div>
		</div>

		<div class="container">
			<div class="categoriesBox">
				<!--
				<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4
                        },
                        "1600": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
				-->
				<div class="row justify-content-center">
					<div class="col-md-9">
						<div class="row categorySlider owl-carousel justify-content-center">
							@foreach($categories as $category)
							<div class="col-md-4 cat-slide">
								<a href="{{url('categories/' . $category->slug)}}"><img src="{{url(@$category->photo)}}" alt="{{$category->slug}}">{{$category->title}}</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<!--				</div>-->
				<!-- End .owl-carousel -->
			</div>
		</div>
	</section>



	<section class="newArriwalsWrapper patternBgTop">
		<div class="container">
			<div class="heading mb-5">
				<h2 class="title">New Arrivals</h2>
			</div>
		</div>
		<div class="container">
			<div class="tab-content tab-content-carousel">
				<div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
					<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":5
                            },
                            "1600": {
                                "items":6,
                                "nav": true
                            }
                        }
                    }'>

						@if(isset($newArrivals) && $newArrivals->isNotEmpty())
						@foreach ($newArrivals as $product)
						<div class="product product-7 text-center">
							<figure class="product-media">
								<?php 
                                        $url = $product->images()->first();
                                        if($url)
                                        {
                                            $url = $product->images()->first()->image;
                                        }
                                        else {
                                            $url = '/images/no-image.jpg';
                                        }
                                    ?>
								@if($product->tag != '')<span class="product-label label-new">{{$product->tag}}</span>@endif
								<a href="{{url('product/' .$product->slug)}}">
									<img src="{{asset($url)}}" alt="{!! @$product->meta_description !!}" class="product-image">
								</a>

								<div class="product-action-vertical">
									@if(is_user_logged_in())
									<a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
									@else
									<a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
									@endif
								</div><!-- End .product-action-vertical -->
							</figure><!-- End .product-media -->
							<?php
                                    $availableColors = $product->sizesstock()->groupBy('color_id')->get();
                                    $availableSizes = $product->sizesstock()->groupBy('size_id')->get();
                                ?>
							<div class="product-body">
								<div class="product-cat">
									<a href="{{route('categories',$product->category->slug)}}">{{$product->category->title}}</a>
								</div><!-- End .product-cat -->
								@if(isset($availableColors) && $availableColors->isNotEmpty())
								<div class="product-color row justify-content-center">
									@foreach($availableColors as $color)
									<div class="radio has-color">
										<label>
											<input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio">
											<div class="custom-color"><span style="background-color:{{@$color->productColor->code}}"></span></div>
										</label>
									</div>
									@endforeach
								</div><!-- End .product-cat -->
								@endif
								<h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->name}}</a></h3><!-- End .product-title -->
								<div class="product-price">
									<div class="w-100">
										<span class="new-price">₹{{round($product->discounted_amt) }}</span> @if($product->discounted_amt != $product->price)<span class="old-price">₹{{round($product->price)}}</span> @endif
									</div>
									<small>(MRP incl Taxes)</small>
								</div><!-- End .product-price -->
								<div class="atc-container">
									<div class="mb-0">
										<a href="{{route('product',$product->slug)}}" class="btn-cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
									</div>
								</div>
							</div><!-- End .product-body -->
						</div><!-- End .product -->
						@endforeach
						@endif

					</div><!-- End .owl-carousel -->
				</div><!-- .End .tab-pane -->
			</div><!-- End .tab-content -->
		</div><!-- End .container-fluid -->
	</section>



	<div class="icon-boxes-container pb-0">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 offset-sm-1">
					<div class="row">
						<div class="col-3">
							<div class="icon-box text-center">
								<span class="icon-box-icon text-dark mb-0">
									<i class="icon-truck"></i>
								</span>
								<div class="icon-box-content">
									<h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
								</div><!-- End .icon-box-content -->
							</div><!-- End .icon-box -->
						</div><!-- End .col-sm-6 col-lg-3 -->
						<div class="col-3">
							<div class="icon-box text-center">
								<span class="icon-box-icon text-dark mb-0">
									<i class="icon-star-o"></i>
								</span>
								<div class="icon-box-content">
									<h3 class="icon-box-title">Curated Design</h3><!-- End .icon-box-title -->
								</div><!-- End .icon-box-content -->
							</div><!-- End .icon-box -->
						</div><!-- End .col-sm-6 col-lg-3 -->
						<div class="col-3">
							<div class="icon-box text-center">
								<span class="icon-box-icon text-dark mb-0">
									<i class="icon-check-circle-o"></i>
								</span>
								<div class="icon-box-content">
									<h3 class="icon-box-title">Assured Quality</h3><!-- End .icon-box-title -->
								</div><!-- End .icon-box-content -->
							</div><!-- End .icon-box -->
						</div><!-- End .col-sm-6 col-lg-3 -->
						<div class="col-3">
							<div class="icon-box text-center">
								<span class="icon-box-icon text-dark mb-0">
									<i class="icon-heart-o"></i>
								</span>
								<div class="icon-box-content">
									<h3 class="icon-box-title">Hand Picked</h3><!-- End .icon-box-title -->
								</div><!-- End .icon-box-content -->
							</div><!-- End .icon-box -->
						</div><!-- End .col-sm-6 col-lg-3 -->

					</div><!-- End .row -->
				</div>
			</div>
		</div><!-- End .container -->
	</div>


</main><!-- End .main -->

@endsection

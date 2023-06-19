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

	<div class="d-none">
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

	<div class="homeBannerSection">
		<div class="video-container" id="video-container">
			<video id="video" preload="metadata" class="bannerVideoHome" poster="assets/images/new/homepage/homeBanner.png">
				<source src="//cdn.jsdelivr.net/npm/big-buck-bunny-1080p@0.0.6/video.mp4" type="video/mp4">
			</video>

			<div class="container">
				<div class="videoContent d-flex flex-column justify-content-center" id="videoContent">
					<h3>Unleash your</h3>
					<h2>inner strength</h2>
					<p>With our premium Indian whey <br> protein supplemets</p>
					<div title="Play video" class="play-gif" id="circle-play-b">
						<span class="text text-uppercase text-white">Play video</span>
						<div class="svgIcon">
							<div class="svgIconImg">
								<img src="assets/images/new/play-button.png" alt="" class="img-fluid">
								<!--
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
									<path d="M40 0a40 40 0 1040 40A40 40 0 0040 0zM26 61.56V18.44L64 40z" />
								</svg>
-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
				<h2 class="title text-uppercase"><span class="fw-bold">Best Selling</span> Products</h2>
			</div>
		</div>

		<div class="container">
			<div class="tab-content tab-content-carousel">
				<div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
					<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
							"nav": false, 
							"dots": true,
							"navText": [
								"<i class=icon-angle-left></i>",
								"<i class=icon-angle-right></i>"
							],
							"margin": 10,
							"loop": false,
							"responsive": {
								"0": {
									"items":2,
									"nav": true, 
									"dots": false
								},
								"768": {
									"items":3
								},
								"992": {
									"items":4
								},
								"1200": {
									"items":4,
									"margin": 20
								}
							}
						}'>

						@if(isset($bestSellers) && $bestSellers->isNotEmpty())
						@foreach ($bestSellers as $bestseller)
						<div class="product productBox product-7 text-center">
							<figure class="product-media">
								<?php 
													$url = $bestseller->images()->first();
													if($url)
													{
														$url = $bestseller->images()->first()->image;
													}
													else 
													{
														$url = '/images/no-image.jpg';
													}
												?>
								@if($bestseller->tag != '')<span class="product-label label-new">{{$bestseller->tag}}</span>@endif
								<a href="{{url('product/' .$bestseller->slug)}}">
									<img src="{{asset($url)}}" alt="{!! @$bestseller->meta_description !!}" class="product-image">
								</a>

								<div class="product-action-vertical">
									@if(is_user_logged_in())
									<a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$bestseller->id}}" id="wishlist{{$bestseller->id}}"><span class="add_to_wishlist_msg{{$bestseller->id}}">add to wishlist</span></a>
									@else
									<a href="#signin-modal" data-bs-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$bestseller->id}}" id="wishlist{{$bestseller->id}}"></a>
									@endif
								</div><!-- End .product-action-vertical -->
							</figure><!-- End .product-media -->
							<?php
									// $availableColors = $product->sizesstock()->groupBy('color_id')->get();
									?>
							<div class="product-body">

								@if(isset($availableColors) && $availableColors->isNotEmpty())
								<div class="product-color row justify-content-center">
									@foreach($availableColors as $color)
									<div class="radio has-color">
										<label>
											<input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions-{{$bestseller->id}}">
											<div class="custom-color"><span style="background-color:{{@$color->productColor->code}}"></span></div>
										</label>
									</div>
									@endforeach
								</div><!-- End .product-cat -->
								@endif
								<h3 class="product-title">
									{{@$bestseller->category->title}} {{$bestseller->name}} - {{@$bestseller->sizesstock()->first()->productSize->name}} Kg
								</h3><!-- End .product-title -->
								<div class="product-price">
									<div class="w-100">
										<span class="new-price">₹ {{round(@$bestseller->sizesstock()->first()->sale_price) }}</span> <span class="old-price">₹ {{round(@$bestseller->sizesstock()->first()->price)}}</span>
									</div>
									<!--									<small>(MRP incl Taxes)</small>-->
								</div><!-- End .product-price -->
								<div class="atc-container">
									<div class="mb-0">
										<a href="{{route('product',$bestseller->slug)}}" class="btn-cart">
											<!--										<a href="#" class="btn-cart">-->
											<span class="product{{$bestseller->id}}">Add to cart</span>
										</a>

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

	<section class="productJourney p-0 position-relative">
		<div class="container-fluid">
			<div class="heading position-absolute text-center mb-3 mb-md-5">
				<h2 class="title text-uppercase yellowText"><span class="fw-bold">Journey of</span> the Product</h2><!-- End .title -->
				<p>From our daily farm to your shaker, fresh and pure.</p>
			</div><!-- End .heading -->

			<div class="row">
				<div class="productJourneyBox col-6 col-md-3 text-center">
					<img src="assets/images/new/homepage/dairyFarm.png" class="m-auto img-fluid" alt="">
					<h4 class="mt-1 mt-md-2 fw-bold">Dairy Farm</h4>
				</div>
				<div class="productJourneyBox col-6 col-md-3 text-center">
					<img src="assets/images/new/homepage/cheesePlant.png" class="m-auto img-fluid" alt="">
					<h4 class="mt-1 mt-md-2 fw-bold">Cheese Plant</h4>
				</div>
				<div class="productJourneyBox col-6 col-md-3 text-center">
					<img src="assets/images/new/homepage/wheyPlant.png" class="m-auto img-fluid" alt="">
					<h4 class="mt-1 mt-md-2 fw-bold">Whey Farm</h4>
				</div>
				<div class="productJourneyBox col-6 col-md-3 text-center">
					<img src="assets/images/new/homepage/shaker.png" class="m-auto img-fluid" alt="">
					<h4 class="mt-1 mt-md-2 fw-bold">Shaker</h4>
				</div>
			</div>
		</div>
	</section>

	<section class="bestSellerWrapper patternBgTop">
		<div class="container">
			<div class="heading text-center mb-5">
				<h2 class="title text-uppercase"><span class="fw-bold">Featured</span> Products</h2><!-- End .title -->
			</div><!-- End .heading -->
		</div><!-- End .container -->

		<div class="container">
			<div class="tab-content tab-content-carousel">
				<div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel" aria-labelledby="products-featured-link">
					<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
							"nav": false, 
							"dots": true,
							"margin": 10,
							"loop": false,
							"responsive": {
								"0": {
									"items":2,
									"nav": true, 
									"dots": false
								},
								"768": {
									"items":3
								},
								"992": {
									"items":4
								},
								"1200": {
									"items":4,
									"margin": 20
								}
							}
						}'>

						@if(isset($bestSellers) && $bestSellers->isNotEmpty())
						@foreach ($bestSellers as $bestseller)
						<div class="product productBox product-7 text-center">
							<figure class="product-media">
								<?php 
													$url = $bestseller->images()->first();
													if($url)
													{
														$url = $bestseller->images()->first()->image;
													}
													else 
													{
														$url = '/images/no-image.jpg';
													}
												?>
								@if($bestseller->tag != '')<span class="product-label label-new">{{$bestseller->tag}}</span>@endif
								<a href="{{url('product/' .$bestseller->slug)}}">
									<img src="{{asset($url)}}" alt="{!! @$bestseller->meta_description !!}" class="product-image">
								</a>

								<div class="product-action-vertical">
									@if(is_user_logged_in())
									<a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$bestseller->id}}" id="wishlist{{$bestseller->id}}"><span class="add_to_wishlist_msg{{$bestseller->id}}">add to wishlist</span></a>
									@else
									<a href="#signin-modal" data-bs-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$bestseller->id}}" id="wishlist{{$bestseller->id}}"></a>
									@endif
								</div><!-- End .product-action-vertical -->
							</figure><!-- End .product-media -->
							<?php
									// $availableColors = $product->sizesstock()->groupBy('color_id')->get();
									?>
							<div class="product-body">

								@if(isset($availableColors) && $availableColors->isNotEmpty())
								<div class="product-color row justify-content-center">
									@foreach($availableColors as $color)
									<div class="radio has-color">
										<label>
											<input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions-{{$bestseller->id}}">
											<div class="custom-color"><span style="background-color:{{@$color->productColor->code}}"></span></div>
										</label>
									</div>
									@endforeach
								</div><!-- End .product-cat -->
								@endif
								<h3 class="product-title">
									{{@$bestseller->category->title}} {{$bestseller->name}} - {{@$bestseller->sizesstock()->first()->productSize->name}} Kg
								</h3><!-- End .product-title -->
								<div class="product-price">
									<div class="w-100">
										<span class="new-price">₹ {{round(@$bestseller->sizesstock()->first()->sale_price) }}</span> <span class="old-price">₹ {{round(@$bestseller->sizesstock()->first()->price)}}</span>
									</div>
									<!--									<small>(MRP incl Taxes)</small>-->
								</div><!-- End .product-price -->
								<div class="atc-container">
									<div class="mb-0">
										<a href="{{route('product',$bestseller->slug)}}" class="btn-cart">
											<!--										<a href="#" class="btn-cart">-->
											<span class="product{{$bestseller->id}}">Add to cart</span>
										</a>

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

	<section class="reconstructSection">
		<div class="container">
			<div class="row">
				<div class="col-xl-8">
					<div class="reconstructContent">
						<div class="reconstructContentHeading">
							<h3>It’s time to</h3>
							<h2 class="fw-bold">#ReconstructYourself</h2>
						</div>
						<p>Avvatar is the purest whey you’ll ever consume. It’s the freshest you’ll ever get. Milked, processed and packed within 24 hours. It is 100% vegetarian, made from fresh cow’s milk and manufactured with multiple stringent quality tests.</p>
						<p>Mix in water, add to a smoothie or milk or liquid of your choice and consume within 90 mins of training for optimal benefits. A perfect product for gym goers, body builders, cross-fit athletes, endurance runners and fitness freaks.</p>
						<div class="knowMoreButton">
							<a href="#">Know More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="categoriesWrapper patternBgTop">
		<div class="container">
			<div class="heading mb-5 text-center">
				<h2 class="title text-uppercase">Product <span class="fw-bold">Categories</span></h2>
			</div>
		</div>

		<div class="container">
			<div class="categoriesBox">
				<div class="row justify-content-center">
					<div class="col-md-11 col-lg-9">
						<div class="row categorySlider owl-carousel justify-content-center">
							@foreach($categories as $category)
							<div class="col-md-4 cat-slide">
								<a href="{{url('categories/' . $category->slug)}}">
									<img src="{{url(@$category->photo)}}" class="m-0" alt="{{$category->slug}}">
									<div class="knowMore py-2 fw-bold text-center blackText">
										{{$category->title}}<span class="icon-arrow-right"></span>
									</div>

								</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="authenticateAvatar p-0 position-relative">
		<div class="heading position-absolute text-center mb-5">
			<h2 class="whiteText title text-uppercase"><span class="fw-bold">authenticate </span> your Avvatar!</h2>
			<p class="whiteText">Scratch the label on the lid to unveil the unique verification code.</p>
			<a class="text-uppercase commonButton-yellow">Authenticate Now</a>
		</div><!-- End .heading -->
		<!--		<img src="assets/images/new/homepage/authenticateBg.png" class="img-fluid">-->
		<picture>
			<source media="(max-width:767px)" srcset="assets/images/new/homepage/authenticateMobileBg.png">
			<source media="(min-width:768px)" srcset="assets/images/new/homepage/authenticateBg.png">
			<img src="assets/images/new/about/about-banner.png" class="img-fluid" alt="aboutBanner">
		</picture>
	</section>

	<section class="loyaltyProgram">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-md-3  d-none d-md-block">
					<img src="assets/images/new/homepage/loyalty-1.png" class="img-fluid">
				</div>
				<div class="col-md-6 ">
					<div class="heading text-center">
						<h2 class="title text-uppercase"><span class="fw-bold">Loyalty </span> Programme</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
							dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
						<a class="text-uppercase commonButton">Earn Rewards</a>
					</div><!-- End .heading -->
				</div>
				<div class="col-md-3  d-none d-md-block">
					<img src="assets/images/new/homepage/loyalty-2.png" class="float-end img-fluid">
				</div>
			</div>
		</div>
	</section>

	<section class="blogList patternBgTop">
		<div class="container">
			<div class="heading mb-5 text-center">
				<h2 class="title text-uppercase"><span class="fw-bold">Blogs</span></h2>
			</div>
		</div>

		@if(isset($blogs) && $blogs->isNotEmpty())
		<div class="container">
			<div class="row">
				@foreach($blogs as $blog)
				<div class="col-md-4 blogCardOuter">
					<div class="blogCard bg-gray">
						<img src="{{ asset($blog->thumbnail_image) }}" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column gap-3 p-2 px-3">
							<h2 class="fw-bold m-0">{{ $blog->title }}</h2>
							<p class="m-0">{{ $blog->short_desc }}</p>
							<a href="{{ route('blog.detail',$blog->slug) }}" class="commonButton-yellow m-0 mb-2">Know More</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>

			<div class="mt-4 text-center">
				<a href="/blogs" class="commonButton-yellow m-0">View All</a>
			</div>
		</div>
		@endif
	</section>

	<section class="reconstructSection educateSection">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-lg-8">
					<div class="reconstructContent">
						<div class="reconstructContentHeading">
							<h2 class="fw-bold text-uppercase whiteText">Educate yourself</h2>
							<h2 class=" text-uppercase whiteText">by speaking to our expert</h2>
						</div>
						<p class="whiteText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
							exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
							dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
						<div class="knowMoreButton">
							<a href="#" class="commonButton-yellow">Know More</a>
						</div>
					</div>
				</div>
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
                                "items":4
                            },
                            "1600": {
                                "items":4,
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
									<a href="#signin-modal" data-bs-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
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
								<h3 class="product-title">
									<!--<a href="{{route('product',$product->slug)}}">-->
									<a href="#">
										{{$product->name}}
									</a>
								</h3><!-- End .product-title -->
								<div class="product-price">
									<div class="w-100">
										<span class="new-price">₹{{round($product->discounted_amt) }}</span> @if($product->discounted_amt != $product->price)<span class="old-price">₹{{round($product->price)}}</span> @endif
									</div>
									<small>(MRP incl Taxes)</small>
								</div><!-- End .product-price -->
								<div class="atc-container">
									<div class="mb-0">
										<!--<a href="{{route('product',$product->slug)}}" class="btn-cart" data-id="{{$product->id}}">-->
										<a href="#" class="btn-cart" data-id="{{$product->id}}">
											<span class="product{{$product->id}}">Add to cart</span>
										</a>
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

	<section class="signupPatch">
		<div class="container">
			<div class="heading mb-5 text-center">
				<h2 class="title text-uppercase">Sign up for the <span class="fw-bold">purest & freshest whey!</span></h2>
			</div>

			<div class="row justify-content-center">
				<div class="col-md-4 text-center">
					<input type="email" class="form-control" placeholder="Email ID">
					<button type="submit" href="#" class="mt-1 commonButton">Know More</button>
				</div>
			</div>
		</div>
	</section>

	<section class="instagramFeed patternBgTop">
		<div class="container">
			<div class="heading text-center mb-5">
				<h2 class="title text-uppercase"><span class="fw-bold">Instagram</span> feed</h2>
			</div>

			<div class="row">
				<div class="col-6 col-md-3 instaFeedBox">
					<img src="assets/images/new/homepage/insta-1.png" class="img-fluid" />
				</div>

				<div class="col-6 col-md-3 instaFeedBox">
					<img src="assets/images/new/homepage/insta-2.png" class="img-fluid" />
				</div>

				<div class="col-6 col-md-3 instaFeedBox">
					<img src="assets/images/new/homepage/insta-3.png" class="img-fluid" />
				</div>

				<div class="col-6 col-md-3 instaFeedBox">
					<img src="assets/images/new/homepage/insta-4.png" class="img-fluid" />
				</div>

				<div class="col-6 col-md-3 instaFeedBox">
					<img src="assets/images/new/homepage/insta-1.png" class="img-fluid" />
				</div>

				<div class="col-6 col-md-3 instaFeedBox">
					<img src="assets/images/new/homepage/insta-2.png" class="img-fluid" />
				</div>

				<div class="col-6 col-md-3 instaFeedBox">
					<img src="assets/images/new/homepage/insta-3.png" class="img-fluid" />
				</div>

				<div class="col-6 col-md-3 instaFeedBox">
					<img src="assets/images/new/homepage/insta-4.png" class="img-fluid" />
				</div>
			</div>
		</div>
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

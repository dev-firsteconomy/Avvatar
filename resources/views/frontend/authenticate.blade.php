@extends('layouts.app')
@section('content')


<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active fw-bold" aria-current="page">Authenticate Product</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div class="page-content pb-0">
		<section class="pageCutomImgHeader pb-0">
			<div class="container">
				<div class="heading text-center mb-3 mb-md-5">
					<h2 class="title text-uppercase"><span class="fw-bold">Authenticate</span> your Product</h2>
				</div>

				<div class="imgBoxWrapper text-center">
					<h3>Select Your Label</h3>
					<div class="row justify-content-center">
						<div class="col-6 col-md-4">
							<img src="assets/images/new/orangeProduct.png" class="img-fluid">
						</div>

						<div class="col-6 col-md-4">
							<img src="assets/images/new/blueProduct.png" class="img-fluid">
						</div>
					</div>
					<p class="mt-2">Scratch the label on the lid to unveil the unique verification code.</p>
				</div>
			</div>
		</section>

		<section class="authenticateProductForm">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<form action="{{url('submit-contact')}}" class="contact-form mb-3" method="post">
							<div class="row justify-content-center">
								<div class="col-md-8 text-center  uniqCode mb-3">
									<h3 class="text-uppercase">Enter the uniq code</h3>
									<div class="otpInputBoxes digit-group d-flex justify-content-center gap-3">
										<input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
										<input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
										<input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
										<input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
										<input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
										<input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />
									</div>
								</div>

								<div class="col-md-6">
									<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name *" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-md-6">
									<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name *" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-md-6">
									<input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number*" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-md-6">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email Address *" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-md-6">
									<input type="text" class="form-control" id="city" name="city" placeholder="City">
								</div><!-- End .col-sm-6 -->

								<div class="col-md-6">
									<input type="text" class="form-control" id="state" name="state" placeholder="State">
								</div><!-- End .col-sm-6 -->

								<div class="col-md-6">
									<div class="input-group mb-3">
										<span class="input-group-text bg-transparent border-right-0" id="basic-addon3">Purchased From : </span>
										<select class="form-select border-left-0" aria-label="Default select example" style="height: 40px;">
											<option selected disabled>Select</option>
											<option value="Online - Official Website">Online - Official Website</option>
											<option value="Online - Amazon Marketplace">Online - Amazon Marketplace</option>
											<option value="Online - Flipkart Marketplace">Online - Flipkart Marketplace</option>
											<option value="Online - Authorized Retail Store">Online - Authorized Retail Store</option>
											<option value="Others">Others</option>
										</select>
									</div>

								</div>

								<div class="col-sm-6">
									<input type="text" class="form-control" id="other" name="other" placeholder="If others please specify">
								</div><!-- End .col-sm-6 -->

								<div class="col-sm-6 d-flex justify-content-center">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
										<label class="form-check-label" for="flexCheckDefault">
											Subscribe me to articles, deals and more!
										</label>
									</div>
								</div>
							</div>

							<div class="text-center">
								<button type="submit" class="commonButton-yellow">
									<span>Verify</span>
								</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</section>

		<section class="factoryParagFoods">
			<div class="container">
				<div class="heading text-center mb-3 mb-md-5">
					<h2 class="title text-uppercase">How <span class="fw-bold">To Authenticate</span></h2>
					<h2 class="title text-uppercase">your avvatar product</h2>

				</div><!-- End .heading -->

				<div class="row justify-content-center">
					<div class="col-md-10">
						<div class="videoBannerSection aboutUs">
							<!--							<img src="" alt="">-->
							<div class="video-container" id="video-container">
								<video id="video" preload="metadata" poster="assets/images/new/authenticateVideoBg.png">
									<source src="//cdn.jsdelivr.net/npm/big-buck-bunny-1080p@0.0.6/video.mp4" type="video/mp4">
								</video>

								<div class="videoContent d-flex flex-column justify-content-center" id="videoContent">
									<h3 class="text-white">How to</h3>
									<h2 class="text-uppercase text-white d-inline-flex mb-0">Authenticate</h2>
									<h3 class="text-white mb-3">your Avvatar product ?</h3>
									<div title="Play video" class="play-gif" id="circle-play-b">
										<span class="text text-uppercase text-white">Play video</span>
										<div class="svgIcon">
											<div class="svgIconImg">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
													<path d="M40 0a40 40 0 1040 40A40 40 0 0040 0zM26 61.56V18.44L64 40z" />
												</svg>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="loyaltyProgram authectiatePage">
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
							<p class="mt-2 blackPatch d-inline-block yellowText fw-bold text-uppercase"><span>your avvatar cash:</span> <span>Xxx</span></p> <br>
							<a class="text-uppercase commonButton-yellow">Redeem</a>
						</div><!-- End .heading -->
					</div>
					<div class="col-md-3  d-none d-md-block">
						<img src="assets/images/new/homepage/loyalty-2.png" class="float-end img-fluid">
					</div>
				</div>
			</div>
		</section>

	</div>
</main>
@endsection

@extends('layouts.app')
@section('content')


<main class="main">
	<div class="page-header p-0 text-center">
		<picture>
			<source media="(max-width:767px)" srcset="assets/images/new/about/about-banner.png">
			<source media="(min-width:768px)" srcset="assets/images/new/about/about-banner.png">
			<img src="assets/images/new/about/about-banner.png" class="img-fluid" alt="aboutBanner">
		</picture>
	</div>

	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">About Us - Avvatar</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div class="page-content pb-0">
		<section class="aboutAvvatar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<h3 class="fw-bold">Origin of Avvatar</h3>
						<img src="assets/images/new/about/origin-avvatar.png" class="my-3 d-md-none img-fluid" alt="aboutBanner">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
					</div>
					<div class="col-md-6 order-md-first">
						<img src="assets/images/new/about/origin-avvatar.png" class="d-none d-md-block img-fluid" alt="aboutBanner">
					</div>
				</div>
			</div>
		</section>

		<section class="aboutAvvatar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6">
						<h3 class="fw-bold">Promises Transformation</h3>
						<img src="assets/images/new/about/promisesTransformation.png" class="my-3 d-md-none img-fluid" alt="aboutBanner">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
					</div>
					<div class="col-md-6">
						<img src="assets/images/new/about/promisesTransformation.png" class="d-none d-md-block img-fluid" alt="aboutBanner">
					</div>
				</div>
			</div>
		</section>

		<section class="optimalBenfits pb-0">
			<img src="assets/images/new/about/optimalBenefitsBanner.png" class="img-fluid" alt="aboutBanner">

			<div class="productUsers">
				<div class="container">
					<div class="heading text-center">
						<h2 class="title text-uppercase">Product <span class="fw-bold">Users</span></h2>
						<p>A perfect product for Gym goers, Body builders, Cross-Fit athletes, Endurance runners and fitness freaks.</p>
					</div>

					<div class="row aboutAvaatarIcons">
						<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
							<img src="assets/images/new/about/Icon-1.png" alt="" class="img-fluid">
							<p class="mb-0">Gym-Gores</p>
						</div>
						<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
							<img src="assets/images/new/about/Icon-2.png" alt="" class="img-fluid">
							<p class="mb-0">Boxers</p>
						</div>
						<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
							<img src="assets/images/new/about/Icon-3.png" alt="" class="img-fluid">
							<p class="mb-0">Runners</p>
						</div>
						<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
							<img src="assets/images/new/about/Icon-4.png" alt="" class="img-fluid">
							<p class="mb-0">Cyclists</p>
						</div>
						<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
							<img src="assets/images/new/about/Icon-5.png" alt="" class="img-fluid">
							<p class="mb-0">Swimmers</p>
						</div>
						<div class="d-flex flex-column align-items-center col-4 col-md-2 aboutAvvatarBox">
							<img src="assets/images/new/about/Icon-6.png" alt="" class="img-fluid">
							<p class="mb-0">Footballers</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="goodnessAvvatar patternBgTop">
			<div class="container">
				<div class="heading text-center mb-3 mb-md-5">
					<h2 class="title text-uppercase">Goodness of<span class="fw-bold">Avvatar</span></h2>
				</div>
				<div class="goodnessAvvatarImg d-none d-md-block">
					<img src="assets/images/new/about/goodnessAvatarImgNew.png" class="img-fluid" alt="aboutBanner">
				</div>
				<div class="row">
					<div class="col-md-3 goodnessAvatarBoxOuter">
						<div class="goodnessAvatarBox px-0">
							<h3 class="fw-bold">Formula to Fit – Take Pure Whey Protein Isolate Powder</h3>
							<p>100% pure whey protein, packed with both concentrate & isolate, and boosted with natural BCAA, EAA, Glutamic Acid & Calcium to maximise your health benefits.</p>
						</div>
					</div>

					<div class="col-md-3 goodnessAvatarBoxOuter">
						<div class="goodnessAvatarBox px-0">
							<h3 class="fw-bold">Whey Concentrate Protein Powder Quality</h3>
							<p>Stringent quality checks, right from the milk extraction from well-fed cows, to the fully automated whey processing plant, with the company having full control over the entire process.</p>
						</div>
					</div>

					<div class="col-md-3 goodnessAvatarBoxOuter">
						<div class="goodnessAvatarBox px-0">
							<h3 class="fw-bold">The Commitment to Freshness of our Product</h3>
							<p>Milked, processed and packed within 24 hrs, in the same plant, for zero loss of intrinsic nutrients and absolute freshness.</p>
						</div>
					</div>

					<div class="col-md-3 goodnessAvatarBoxOuter">
						<div class="goodnessAvatarBox px-0">
							<h3 class="fw-bold">Zero Adulteration Pure Vegetarian Protein Powder</h3>
							<p>A 100% vegetarian product, perfect for both vegetarians and non-vegetarians. Made with addition of microbial enzymes in milk, rather than non-vegetarian rennet, like other brands.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="aboutParafFood patternBgTop">
			<div class="container">
				<div class="heading text-center mb-3 mb-md-5">
					<h2 class="title text-uppercase">About <span class="fw-bold">Parag Milk Foods</span></h2>
				</div><!-- End .heading -->
				<div class="row justify-content-center">
					<div class="col-lg-9">
						<div class="aboutParagFoodContent text-center">
							<img src="assets/images/new/about/about-grouplogo.png" class="m-auto img-fluid" alt="aboutBanner">
							<p class="mt-3 mb-0">Parag Milk Foods Ltd, founded in 1992, is one of India's elite private sector dairy company, with a diverse portfolio in
								over 15 consumer centric product categories. We pride ourselves for providing the best global source of expertise
								and scientific knowledge in support of the development and promotion of quality cow’s milk and milk products,
								to offer consumers nutrition, health and well-being. Parag Milk Foods Ltd., has its presence in the international market
								with products exported to more than 21 countries.</p>
							<a href="#" class="commonButton-yellow">Know More</a>
						</div>
					</div>
				</div>

			</div>
		</section>
	</div>
</main>
@endsection

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
				<li class="breadcrumb-item" aria-current="page"><a href="/about-avvatar">About Us - Avvatar</a></li>
				<li class="breadcrumb-item active" aria-current="page">About Us - Parag Foods</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div class="page-content pb-0">
		<section class="aboutParafFood patternBgPageTop">
			<div class="container">
				<div class="heading text-center mb-3 mb-md-5">
					<h2 class="title text-uppercase">About <span class="fw-bold">Parag Foods</span></h2>
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

							<p class="mt-3 mb-0">Parag Milk Foods Ltd, founded in 1992, is one of India's elite private sector dairy company, with a diverse portfolio in
								over 15 consumer centric product categories. We pride ourselves for providing the best global source of expertise
								and scientific knowledge in support of the development and promotion of quality cow’s milk and milk products,
								to offer consumers nutrition, health and well-being. Parag Milk Foods Ltd., has its presence in the international market
								with products exported to more than 21 countries.</p>
							<!--							<a href="#" class="commonButton-yellow">Know More</a>-->
						</div>
					</div>
				</div>

			</div>
		</section>

		<section class="aboutFounder">
			<div class="container">
				<div class="aboutFounderBox bg-gray">
					<div class="row align-items-center">
						<div class="col-lg-6 order-md-2 order-lg-2">
							<div class="heading">
								<h2 class="title text-uppercase">About <span class="fw-bold">our founder</span></h2>
								<span class="line"></span>
							</div>
							<div class="aboutContent">
								<img src="assets/images/new/about/founder.png" class="my-3 d-lg-none img-fluid" alt="aboutBanner">
								<h3><span class="fw-bold">Mr. Devendra Shah</span> (Founder & Chairman)</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit labore, accusantium hic dolore consectetur quam eius, atque est? Doloribus, labore ex nostrum doloremque quis tenetur consequuntur soluta hic ipsum voluptates accusamus a voluptatem, explicabo, fugit odio sit? Aliquid, omnis, commodi quia fugit nostrum similique inventore veniam, minima, non velit doloremque esse. Mollitia exercitationem, ipsum dolorum consequuntur ratione vitae iure impedit possimus illum, ipsam ab, unde ad distinctio. Repellat blanditiis</p>
							</div>
						</div>
						<div class="col-lg-6 order-md-1 order-lg-2">
							<img src="assets/images/new/about/founder.png" class="my-3 d-none d-lg-block img-fluid" alt="aboutBanner">
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="factoryParagFoods p-0">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="videoBannerSection aboutUs">
							<!--							<img src="" alt="">-->
							<div class="video-container" id="video-container">
								<video id="video" preload="metadata" poster="assets/images/new/about/cideoPlaceholderAboutVideo.png">
									<source src="//cdn.jsdelivr.net/npm/big-buck-bunny-1080p@0.0.6/video.mp4" type="video/mp4">
								</video>

								<div class="videoContent d-flex flex-column justify-content-center" id="videoContent">
									<h3 class="text-white">Take a look at our</h3>
									<h2 class="text-uppercase text-white d-inline-flex">factory</h2>
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

		<section class="brandPillars patternBrand">
			<div class="container">
				<div class="heading text-center mb-3 mb-md-5">
					<h2 class="title text-uppercase">parag brand <span class="fw-bold">pillars</span></h2>
				</div><!-- End .heading -->

				<div class="row justify-content-center">
					<div class="col-md-4 brandPillarsBox">
						<div class="brandPillars position-relative">
							<img src="assets/images/new/about/godness.png" class="img-fluid" alt="">
							<div class="brandPillarsContent">
								<p class="text-uppercase text-white fw-bold">Goodness </p>
							</div>
						</div>
					</div>

					<div class="col-md-4 brandPillarsBox">
						<div class="brandPillars position-relative">
							<img src="assets/images/new/about/innovation.png" class="img-fluid" alt="">
							<div class="brandPillarsContent">
								<p class="text-uppercase text-white fw-bold">Innovations to inspire you </p>
							</div>
						</div>
					</div>

					<div class="col-md-4 brandPillarsBox">
						<div class="brandPillars position-relative">
							<img src="assets/images/new/about/environmental.png" class="img-fluid" alt="">
							<div class="brandPillarsContent">
								<p class="text-uppercase text-white fw-bold">environmental sustainability </p>
							</div>
						</div>
					</div>

					<div class="col-md-4 brandPillarsBox">
						<div class="brandPillars position-relative">
							<img src="assets/images/new/about/ambition.png" class="img-fluid" alt="">
							<div class="brandPillarsContent">
								<p class="text-uppercase text-white fw-bold">ambition </p>
							</div>
						</div>
					</div>

					<div class="col-md-4 brandPillarsBox">
						<div class="brandPillars position-relative">
							<img src="assets/images/new/about/nutrition.png" class="img-fluid" alt="">
							<div class="brandPillarsContent">
								<p class="text-uppercase text-white fw-bold">nutrition </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="keyFacts">
			<div class="container">
				<div class="heading text-center mb-3 mb-md-5">
					<h2 class="title text-uppercase text-white">Key <span class="fw-bold yellowText">Facts</span></h2>
				</div><!-- End .heading -->

				<div class="row justify-content-center">
					<div class="col-6 col-md-4 keyFactsBoxOuter">
						<div class="keyFactsBox text-center">
							<h3 class="text-uppercase fw-bold yellowText"><span>2400</span> cR</h3>
							<p class="mb-0 text-white">Sales <br>Turnover</p>
						</div>
					</div>
					<div class="col-6 col-md-4 keyFactsBoxOuter">
						<div class="keyFactsBox text-center">
							<h3 class="text-uppercase fw-bold yellowText"><span>2</span> million</h3>
							<p class="mb-0 text-white">Liters of Milk <br>Produced Daily</p>
						</div>
					</div>
					<div class="col-6 col-md-4 keyFactsBoxOuter">
						<div class="keyFactsBox text-center">
							<h3 class="text-uppercase fw-bold yellowText"><span>2</span> facilities</h3>
							<p class="mb-0 text-white">In Asia with <br>UHT Technology</p>
						</div>
					</div>
					<div class="col-6 col-md-4 keyFactsBoxOuter">
						<div class="keyFactsBox text-center">
							<h3 class="text-uppercase fw-bold yellowText"><span>4</span> lakh</h3>
							<p class="mb-0 text-white">Liter of Whey <br>Liquid Processing</p>
						</div>
					</div>
					<div class="col-6 col-md-4 keyFactsBoxOuter">
						<div class="keyFactsBox text-center">
							<h3 class="text-uppercase fw-bold yellowText"><span>21</span> countries</h3>
							<p class="mb-0 text-white">Our Export <br>Destiations</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="brandAdvantages">
			<div class="container">
				<div class="heading text-center mb-3 mb-md-5">
					<h2 class="title text-uppercase">Parag Brand <span class="fw-bold">Advantages</span></h2>
				</div><!-- End .heading -->

				<div class="row brandAdvantageBox">
					<div class="col-6 p-md-0 brandAdvantage d-flex flex-column align-items-center text-center">
						<img src="" alt="" class="img-fluid">
						<h3>A Stock Exchange <br class="d-none d-md-block"> Listed Company</h3>
					</div>
					<div class="col-6 p-md-0 brandAdvantage d-flex flex-column align-items-center text-center">
						<img src="" alt="" class="img-fluid">
						<h3>ISO 22000 <br class="d-none d-md-block"> Certified Facility</h3>
					</div>
					<div class="col-6 p-md-0 brandAdvantage d-flex flex-column align-items-center text-center">
						<img src="" alt="" class="img-fluid">
						<h3>India’s 1st Whey <br class="d-none d-md-block"> Manufacturing Plant</h3>
					</div>
					<div class="col-6 p-md-0 brandAdvantage d-flex flex-column align-items-center text-center">
						<img src="" alt="" class="img-fluid">
						<h3>Fully <br class="d-none d-md-block"> Automated Plant</h3>
					</div>
					<div class="col-6 p-md-0 brandAdvantage d-flex flex-column align-items-center text-center">
						<img src="" alt="" class="img-fluid">
						<h3>World Class <br class="d-none d-md-block"> Quality Norms</h3>
					</div>
				</div>
			</div>
		</section>


	</div>
</main>
@endsection

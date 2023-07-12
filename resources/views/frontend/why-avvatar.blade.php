@extends('layouts.app')
@section('content')


<main class="main">
	<div class="page-header p-0 text-center">
		<picture>
			<source media="(max-width:767px)" srcset="{{asset('assets/images/new/about/WhyAvvatarBanner.jpg')}}">
			<source media="(min-width:768px)" srcset="{{asset('assets/images/new/about/WhyAvvatarBanner.jpg')}}">
			<img src="{{asset('assets/images/new/about/WhyAvvatarBanner.jpg')}}" class="img-fluid" alt="aboutBanner">
		</picture>
	</div>

	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active fw-bold" aria-current="page">Why Avvatar</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div class="page-content pb-0">
		<section class="makingAvvatar">
			<div class="container">
				<div class="heading text-center mb-3 mb-md-5">
					<h2 class="title text-uppercase mb-1">Making of <span class="fw-bold">Avvatar</span></h2>
					<div class="row justify-content-center">
						<div class="col-md-10">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis asperiores atque quasi eum praesentium nesciunt ipsam incidunt, et maxime tempore placeat, nihil! Cumque eum quasi ipsa quis, corrupti ducimus alias.</p>
						</div>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-md-9 row justify-content-between">
						<div class="col-md-5">
							<div class="whyAvvatarBoxWrapper">
								<div class="whyAvvatarBoxImg">
									<img src="{{asset('assets/images/new/about/WhyAvvatarBanner-1.png')}}" class="m-auto img-fluid" alt="aboutBanner">
								</div>
								<div class="whyAvvatarBox">

									<div class="whyAvvatarBoxContent">
										<div class="whyAvvatarBoxHeading text-center">
											<h3 class="text-uppercase m-0">milk to cheese</h3>
										</div>
										<ul>
											<li>Sourced from our own pampered, hand-picked herd of Holstein-Friesian cows</li>
											<li>Fed on a natural diet of alfalfa, a natural source of calcium and protein</li>
											<li>Milked at Bhagyalakshmi Dairy Farm, with the finest international technology</li>
											<li>Processed at the plant in Manchar, with mechanized equipment, for optimized hygiene and quality</li>
											<li>Specialized farming, nurturing, breeding and milking programmes produce superior milk</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="whyAvvatarBoxWrapper">
								<div class="whyAvvatarBoxImg">
									<img src="{{asset('assets/images/new/about/WhyAvvatarBanner-2.png')}}" class="m-auto img-fluid" alt="aboutBanner">
								</div>
								<div class="whyAvvatarBox">

									<div class="whyAvvatarBoxContent">
										<div class="whyAvvatarBoxHeading text-center">
											<h3 class="text-uppercase m-0">Cheese to whey(liquid)</h3>
										</div>
										<ul>
											<li>Incoming milk is tested for quality and purity, prior to the cheese making process.</li>
											<li>Pasteurized to ensure product safety and uniformity</li>
											<li>Starter culture added to milk to initiate the cheese creation</li>
											<li>Microbial enzymes are infused to coagulate the milk</li>
											<li>On curd and liquid formation, curd turns to cheese and liquid into whey</li>
											<li>The liquid whey is then drained off</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="whyAvvatarBoxWrapper">
								<div class="whyAvvatarBoxImg">
									<img src="{{asset('assets/images/new/about/WhyAvvatarBanner-3.png')}}" class="m-auto img-fluid" alt="aboutBanner">
								</div>
								<div class="whyAvvatarBox">

									<div class="whyAvvatarBoxContent">
										<div class="whyAvvatarBoxHeading text-center">
											<h3 class="text-uppercase m-0">whey(liquid) to protein powder</h3>
										</div>
										<ul>
											<li>Liquid whey is transferred to Avvatar plant</li>
											<li>Repasteurization for maintaining purity and uniformity</li>
											<li>Processed through cold cross filtration and micro filtration for the best form of whey</li>
											<li>Spray-dried in a hi-tech machine at low temperature to ensue protein properties are retained</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="whyAvvatarBoxWrapper">
								<div class="whyAvvatarBoxImg">
									<img src="{{asset('assets/images/new/about/WhyAvvatarBanner-4.png')}}" class="m-auto img-fluid" alt="aboutBanner">
								</div>
								<div class="whyAvvatarBox">

									<div class="whyAvvatarBoxContent">
										<div class="whyAvvatarBoxHeading text-center">
											<h3 class="text-uppercase m-0">protein powder to avvatar</h3>
										</div>
										<ul>
											<li>Incoming milk is tested for quality and purity, prior to the cheese making process.</li>
											<li>Pasteurized to ensure product safety and uniformity</li>
											<li>Starter culture added to milk to initiate the cheese creation</li>
											<li>Microbial enzymes are infused to coagulate the milk</li>
											<li>On curd and liquid formation, curd turns to cheese and liquid into whey</li>
											<li>The liquid whey is then drained off</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="whyAvvatarBoxWrapper">
								<div class="whyAvvatarBoxImg">
									<img src="{{asset('assets/images/new/about/WhyAvvatarBanner-5.png')}}" class="m-auto img-fluid" alt="aboutBanner">
								</div>
								<div class="whyAvvatarBox">

									<div class="whyAvvatarBoxContent">
										<div class="whyAvvatarBoxHeading text-center">
											<h3 class="text-uppercase m-0">Store</h3>
										</div>
										<ul>
											<li>It is dried at low temperature to obtain the desired powder form.</li>
											<li>Packaging is done after thorough quality testing.</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="whyAvvatarBoxWrapper">
								<div class="whyAvvatarBoxImg">
									<img src="{{asset('assets/images/new/about/WhyAvvatarBanner-6.png')}}" class="m-auto img-fluid" alt="aboutBanner">
								</div>
								<div class="whyAvvatarBox">

									<div class="whyAvvatarBoxContent">
										<div class="whyAvvatarBoxHeading text-center">
											<h3 class="text-uppercase m-0">shaker</h3>
										</div>
										<ul>
											<li>This whole process is complete within 24 hours. </li>
											<li>Owing to this quick and untouched processing, the Whey protein comes with excellent mix-ability while ensuring the amino acid profile is well retained.</li>
											<li>The whey protein is completely free from any form of hard metals or harmful preservatives.</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="tryYourself">
			<div class="container">
				<div class="heading text-center mb-1">
					<h2 class="title text-uppercase mb-1">Try it <span class="fw-bold">Yourself</span></h2>
					<div class="row justify-content-center">
						<div class="col-md-10">
							<p>Visit shop page to check out our range of products that suits you.</p>
						</div>
					</div>
				</div>

				<div class="text-center">
					<a href="" class="commonButton-yellow">GO TO SHOP</a>
				</div>
			</div>
		</section>
	</div>
</main>
@endsection

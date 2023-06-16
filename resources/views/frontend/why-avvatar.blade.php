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
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

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
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

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
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

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
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
											<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias porro aliquam odit temporibus.</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div>
</main>
@endsection

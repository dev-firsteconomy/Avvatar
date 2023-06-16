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
					<div class="col-md-10 row">
						<div class="col-md-6"></div>
						<div class="col-md-6"></div>
					</div>
				</div>
			</div>
		</section>
	</div>
</main>
@endsection

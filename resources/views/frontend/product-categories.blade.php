@extends('layouts.app')
@section('content')

<main class="main">
	<div class="page-header p-0 text-center">
		<picture>
			<source media="(max-width:767px)" srcset="assets/images/new/product-category-banner.png">
			<source media="(min-width:768px)" srcset="assets/images/new/product-category-banner.png">
			<img src="assets/images/new/product-category-banner.png" class="img-fluid" alt="aboutBanner">
		</picture>
	</div>

	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item fw-bold">Product Categories</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->


	<section class="categoriesWrapper patternBgTopReverse">
		<div class="container">
			<div class="categoriesBox">
				<div class="row justify-content-center">
					<div class="col-md-10 col-lg-10">
						<div class="row categorySlider owl-carousel justify-content-center">
							@foreach($categories as $category)
							<div class="col-md-4 cat-slide">
								<a href="{{url('categories/' . $category->slug)}}">
									<img src="{{url(@$category->photo)}}" class="m-0 w-100 img-fluid" alt="{{$category->slug}}">
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

</main><!-- End .main -->

@endsection

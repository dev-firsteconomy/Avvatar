@extends('layouts.app')
@section('content')

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item fw-bold"><span class="fw-bold">Blogs</span></li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<section class="blogList">
		<div class="container">
			<div class="heading mb-5 text-center">
				<h2 class="title text-uppercase"><span class="fw-bold">Blogs</span></h2>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-4 blogCardOuter">
					<div class="blogCard bg-gray">
						<img src="assets/images/new/blog.png" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column gap-3 p-2 px-3">
							<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
							<p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							<a class="commonButton-yellow m-0 mb-2">Know More</a>
						</div>
					</div>
				</div>

				<div class="col-md-4 blogCardOuter ">
					<div class="blogCard bg-gray">
						<img src="assets/images/new/blog.png" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column gap-3 p-2 px-3">
							<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
							<p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							<a class="commonButton-yellow m-0 mb-2">Know More</a>
						</div>
					</div>
				</div>

				<div class="col-md-4 blogCardOuter">
					<div class="blogCard bg-gray">
						<img src="assets/images/new/blog.png" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column gap-3 p-2 px-3">
							<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
							<p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							<a class="commonButton-yellow m-0 mb-2">Know More</a>
						</div>
					</div>
				</div>


			</div>

			<div class="mt-4 text-center">
				<a class="commonButton-yellow m-0">View All</a>
			</div>
		</div>
	</section>


</main><!-- End .main -->

@endsection

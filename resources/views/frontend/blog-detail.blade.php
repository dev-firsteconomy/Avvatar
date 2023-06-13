@extends('layouts.app')
@section('content')

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="/">Blogs</a></li>
				<li class="breadcrumb-item fw-bold"><span class="fw-bold">Making of Avvatar #WheyProtien</span></li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<section class="blogDetailWrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="blogCard blogCardDetail pb-2">
						<img src="{{asset('assets/images/new/blog-big.png')}}" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column p-2 px-3">
							<div class="date">September 7, 2018</div>
							<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut quos eum possimus, quod ratione id cupiditate est pariatur quaerat minus ipsum deleniti accusamus asperiores cumque itaque aliquam debitis, vitae sequi blanditiis dolores maiores enim tempore. Consequatur animi tempore eaque maiores, totam qui adipisci rerum corrupti error voluptatum? Fugit eaque voluptas illo quasi dolor autem neque, quam laudantium nisi libero suscipit pariatur ipsam magnam alias ducimus dolore labore et optio ab sunt! Suscipit nihil perspiciatis aliquam ea reprehenderit incidunt voluptatibus iure sapiente ad atque, nobis quos maiores temporibus non magnam quo a alias. In ad dolores a, iure, molestiae quam explicabo! </p>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut quos eum possimus, quod ratione id cupiditate est pariatur quaerat minus ipsum deleniti accusamus asperiores cumque itaque aliquam debitis, vitae sequi blanditiis dolores maiores enim tempore. Consequatur animi tempore eaque maiores, totam qui adipisci rerum corrupti error voluptatum? Fugit eaque voluptas illo quasi dolor autem neque, quam laudantium nisi libero suscipit pariatur ipsam magnam alias ducimus dolore labore et optio ab sunt! Suscipit nihil perspiciatis aliquam ea reprehenderit incidunt voluptatibus iure sapiente ad atque, nobis quos maiores temporibus non magnam quo a alias. In ad dolores a, iure, molestiae quam explicabo! </p>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut quos eum possimus, quod ratione id cupiditate est pariatur quaerat minus ipsum deleniti accusamus asperiores cumque itaque aliquam debitis, vitae sequi blanditiis dolores maiores enim tempore. Consequatur animi tempore eaque maiores, totam qui adipisci rerum corrupti error voluptatum? Fugit eaque voluptas illo quasi dolor autem neque, quam laudantium nisi libero suscipit pariatur ipsam magnam alias ducimus dolore labore et optio ab sunt! Suscipit nihil perspiciatis aliquam ea reprehenderit incidunt voluptatibus iure sapiente ad atque, nobis quos maiores temporibus non magnam quo a alias. In ad dolores a, iure, molestiae quam explicabo! </p>
						</div>

						<div class="blogAuthor mt-2">
							<div class="d-flex">
								<div class="flex-shrink-0">
									<img src="{{asset('assets/images/new/blogAuthor.png')}}" alt="Sample Image">
								</div>
								<div class="flex-grow-1 ms-3">
									<h6 class="fw-light text-uppercase">Author</h6>
									<h5>Jhon Carter</h5>
									<p>Excellent feature! I love it. One day I'm definitely going to put this Bootstrap component into use and I'll let you know once I do.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="popularBlogsWrapper">
						<div class="heading mb-1">
							<h2 class="title text-uppercase"><span class="fw-bold">Popular Blogs</span></h2>
						</div>
						<div class="blogCard bg-gray">
							<img src="{{asset('assets/images/new/blog-1.png')}}" class="w-100 img-fluid">
							<div class="blogCardContent d-flex flex-column p-2 px-3">
								<div class="date">September 7, 2018</div>
								<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							</div>
						</div>

						<div class="blogCard bg-gray">
							<img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
							<div class="blogCardContent d-flex flex-column p-2 px-3">
								<div class="date">September 7, 2018</div>
								<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							</div>
						</div>

						<div class="blogCard bg-gray">
							<img src="{{asset('assets/images/new/blog-1.png')}}" class="w-100 img-fluid">
							<div class="blogCardContent d-flex flex-column p-2 px-3">
								<div class="date">September 7, 2018</div>
								<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="youMaylike">
		<div class="container">
			<div class="heading mb-3">
				<h2 class="title text-uppercase"><span class="fw-bold">Related Blogs</span></h2>
			</div>

			<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
				"nav": false, 
				"dots": true,
				"margin": 20,
				"loop": false,
				"responsive": {
					"0": {
						"items":1
					},
					"480": {
						"items":2
					},
					"768": {
						"items":3
					},
					"992": {
						"items":3
					},
					"1200": {
						"items":3,
						"nav": true,
						"dots": false
					}
				}
			}'>

				<div class="item">
					<div class="blogCard bg-gray">
						<img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column p-2 px-3">
							<div class="date">September 7, 2018</div>
							<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							<a class="commonButton-yellow">Read More</a>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="blogCard bg-gray">
						<img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column p-2 px-3">
							<div class="date">September 7, 2018</div>
							<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							<a class="commonButton-yellow">Read More</a>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="blogCard bg-gray">
						<img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column p-2 px-3">
							<div class="date">September 7, 2018</div>
							<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							<a class="commonButton-yellow">Read More</a>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="blogCard bg-gray">
						<img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column p-2 px-3">
							<div class="date">September 7, 2018</div>
							<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							<a class="commonButton-yellow">Read More</a>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="blogCard bg-gray">
						<img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column p-2 px-3">
							<div class="date">September 7, 2018</div>
							<h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
							<a class="commonButton-yellow">Read More</a>
						</div>
					</div>
				</div>


			</div>
		</div>
	</section>


</main><!-- End .main -->

@endsection

@extends('layouts.app')
@section('content')


<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title">Reviews<span></span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active fw-bold" aria-current="page">Reviews</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div class="page-content pb-3">
		<div class="container">
			<div class="col-md-12">
				<div class="reviews-tab">
					
					<div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
						<h5 class="mb-0 mb-4">Ratings and Reviews</h5>
						<div class="graph-star-rating-header">
							<div class="star-rating">
								<!--
								<a href="#"><i class='bx bxs-star'></i></a>
								<a href="#"><i class='bx bxs-star'></i></a>
								<a href="#"><i class='bx bxs-star'></i></a>
								<a href="#"><i class='bx bxs-star'></i></a>
								<a href="#"><i class="icofont-ui-rating"></i></a>
-->
								<b class="text-black ml-2">334</b>
							</div>
							<p class="text-black mb-4 mt-2">Rated 3.5 out of 5</p>
						</div>
						<div class="graph-star-rating-body">
							<div class="rating-list">
								<div class="rating-list-left text-black">
									5 Star
								</div>
								<div class="rating-list-center">
									<div class="progress">
										<div style="width: 56%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
											<span class="sr-only">80% Complete (danger)</span>
										</div>
									</div>
								</div>
								<div class="rating-list-right text-black">56%</div>
							</div>
							<div class="rating-list">
								<div class="rating-list-left text-black">
									4 Star
								</div>
								<div class="rating-list-center">
									<div class="progress">
										<div style="width: 23%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
											<span class="sr-only">80% Complete (danger)</span>
										</div>
									</div>
								</div>
								<div class="rating-list-right text-black">23%</div>
							</div>
							<div class="rating-list">
								<div class="rating-list-left text-black">
									3 Star
								</div>
								<div class="rating-list-center">
									<div class="progress">
										<div style="width: 11%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
											<span class="sr-only">80% Complete (danger)</span>
										</div>
									</div>
								</div>
								<div class="rating-list-right text-black">11%</div>
							</div>
							<div class="rating-list">
								<div class="rating-list-left text-black">
									2 Star
								</div>
								<div class="rating-list-center">
									<div class="progress">
										<div style="width: 2%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
											<span class="sr-only">80% Complete (danger)</span>
										</div>
									</div>
								</div>
								<div class="rating-list-right text-black">02%</div>
							</div>
						</div>
						<div class="graph-star-rating-footer text-center mt-3 mb-3">
							<button type="button" class="btn btn-outline-primary btn-sm">Rate and Review</button>
						</div>
					</div>
					<div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
						<a href="#" class="btn btn-outline-primary btn-sm float-end">Top Rated</a>
						<h5 class="mb-1">All Ratings and Reviews</h5>
						<div class="reviews-members pt-4 pb-4">
							<div class="media d-block d-md-flex">
								<a href="#">
									<img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png" class="me-3 rounded-pill">
								</a>
								<div class="media-body">
									<div class="reviews-members-header">
										<div class="reviews-members-name">
											<h6 class="mb-1"><a class="text-black" href="#">Singh Osahan</a></h6>
											<p class="text-gray">Tue, 20 Mar 2020</p>
										</div>
										<span class="star-rating">
											<a href="#"><i class='bx bxs-star active'></i></a>
											<a href="#"><i class='bx bxs-star active'></i></a>
											<a href="#"><i class='bx bxs-star active'></i></a>
											<a href="#"><i class='bx bxs-star active'></i></a>
											<a href="#"><i class="bx bxs-star"></i></a>
										</span>

									</div>
									<div class="reviews-members-body">
										<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
									</div>
									<div class="reviews-members-footer">

									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="reviews-members pt-4 pb-4">
							<div class="media d-block d-md-flex">
								<a href="#">
									<img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar6.png" class="mr-3 rounded-pill">
								</a>
								<div class="media-body">
									<div class="reviews-members-header">
										<div class="reviews-members-name">
											<h6 class="mb-1"><a class="text-black" href="#">Gurdeep Singh</a></h6>
											<p class="text-gray">Tue, 20 Mar 2020</p>
										</div>
										<span class="star-rating">
											<a href="#"><i class='bx bxs-star active'></i></a>
											<a href="#"><i class='bx bxs-star active'></i></a>
											<a href="#"><i class='bx bxs-star active'></i></a>
											<a href="#"><i class='bx bxs-star active'></i></a>
											<a href="#"><i class="bx bxs-star"></i></a>
										</span>
									</div>
									<div class="reviews-members-body">
										<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
									</div>
									<div class="reviews-members-footer">

									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="d-flex justify-content-center">
							<a class="text-center d-inline-block mt-4 fw-bold commonButton-yellow" href="#">See All Reviews</a>
						</div>

					</div>
					<div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
						<h5 class="mb-4">Leave Comment</h5>
						<p class="mb-2">Rate the Place</p>
						<div class="mb-4">
							<span class="star-rating">
								<a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
								<a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
								<a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
								<a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
								<a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
							</span>
						</div>
						<form>
							<div class="form-group">
								<label>Your Comment</label>
								<textarea class="form-control"></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-sm" type="button"> Submit Comment </button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- End .container -->
	</div>
</main>









@endsection

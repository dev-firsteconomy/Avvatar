@extends('layouts.app')
@section('content')

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="/blogs">Blogs</a></li>
				<li class="breadcrumb-item fw-bold"><span class="fw-bold">Expert Speaks</span></li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<section class="blogList">
		<div class="container">
			<div class="heading mb-3 text-center">
				<h2 class="title text-uppercase"><span class="fw-bold">Blogs</span></h2>
			</div>

			{{-- <div class="imgBoxWrapper text-center mb-5">
				<div class="row justify-content-center">
					<div class="col-6 col-md-4">
						<a href="/expert-speaks" class="blogHeaderImgBox">
							<img src="{{asset('assets/images/new/ExpertSpeaks.png')}}" class="img-fluid">
							<h3 class="m-0 text-uppercase">Expert Speaks</h3>
						</a>
					</div>

					<div class="col-6 col-md-4">
						<a href="/fitness-trends-and-updates" class="blogHeaderImgBox">
							<img src="{{asset('assets/images/new/ExpertSpeaks.png')}}" class="img-fluid">
							<h3 class="m-0 text-uppercase">fitness trends & updates</h3>
						</a>
					</div>
				</div>
			</div> --}}
		</div>

		<div class="container">
			<div class="heading mb-5 ">
				<h4 class="title text-uppercase"><span class="fw-bold">Expert Speaks Blogs</span></h4>
			</div>
			<div class="row">
				@if(isset($blogs) && $blogs->isNotEmpty())
					@foreach($blogs as $blog)
						<div class="col-md-4 blogCardOuter">
							<div class="blogCard bg-gray">
								<img src="{{asset($blog->thumbnail_image)}}" class="w-100 img-fluid">
								<div class="blogCardContent d-flex flex-column p-2 px-3">
									<div class="date">{{date('F j, Y', strtotime($blog->date));}}</div>
									<h2 class="fw-bold m-0">{{ $blog->title }}</h2>
									<p>{!! $blog->short_desc !!}</p>
									<a class="commonButton-yellow" href="/blog/{{@$blog->slug}}">Read More</a>
								</div>
							</div>
						</div>
				  	@endforeach	
				@endif

			</div>

			{{-- <div class="mt-4 text-center">
				<a class="commonButton-yellow m-0">View All</a>
			</div> --}}
		</div>

		<div class="pagintaionWrapper">
			{!! $blogs->appends(['search' => Request::get('search')])->render() !!}
			{{-- <nav aria-label="Page navigation">
				<ul class="pagination justify-content-center">
					<span style="float:right">
						<nav>
							<ul class="pagination">
								<li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
									<span class="page-link" aria-hidden="true">‹</span>
								</li>
								<li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item">
									<a class="page-link" href="#" rel="next" aria-label="Next »">›</a>
								</li>
							</ul>
						</nav>
					</span>
				</ul>
			</nav> --}}
		</div>
	</section>


</main><!-- End .main -->

@endsection

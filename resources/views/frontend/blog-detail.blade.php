@extends('layouts.app')
@section('content')

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="/">Blogs</a></li>
				<li class="breadcrumb-item fw-bold"><span class="fw-bold">{{@$blog->title}}</span></li>
			</ol>
		</div>
	</nav>

	<section class="blogDetailWrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="blogCard blogCardDetail pb-2">
						<img src="{{asset(@$blog->image)}}" class="w-100 img-fluid">
						<div class="blogCardContent d-flex flex-column p-2 px-3">
							<div class="date">{{date('F j, Y', strtotime($blog->date));}}</div>
							<h2 class="fw-bold m-0">{{@$blog->title}}</h2>
							{!! $blog->description !!}
						</div>

						<div class="blogAuthor mt-2">
							<div class="d-flex">
								<div class="flex-shrink-0">
									<img src="{{asset('assets/images/new/blogAuthor.png')}}" alt="Sample Image">
								</div>
								<div class="flex-grow-1 ms-3">
									<h6 class="fw-light text-uppercase">Author</h6>
									<h5>{{$blog->author_name}}</h5>
									<p>{!! @$blog->author_desc !!}</p>
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
						@if(isset($popularBlogs) && $popularBlogs->isNotEmpty())
						   @foreach($popularBlogs as $popularBlog)
								<div class="blogCard bg-gray">
									<img src="{{asset($popularBlog->thumbnail_image)}}" class="w-100 img-fluid">
									<div class="blogCardContent d-flex flex-column p-2 px-3">
										<div class="date">{{date('F j, Y', strtotime($popularBlog->date));}}</div>
										<h2 class="fw-bold m-0">{{ $popularBlog->title }}</h2>
										<p>{!! $popularBlog->short_desc !!}</p>
									</div>
								</div>
							@endforeach
						@endif	
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

			    @if(isset($relatedBlogs) && $relatedBlogs->isNotEmpty())
				   @foreach($relatedBlogs as $relatedBlog)
								<div class="blogCard bg-gray">
									<img src="{{asset($relatedBlog->thumbnail_image)}}" class="w-100 img-fluid">
									<div class="blogCardContent d-flex flex-column p-2 px-3">
										<div class="date">{{date('F j, Y', strtotime($relatedBlog->date));}}</div>
										<h2 class="fw-bold m-0">{{ $relatedBlog->title }}</h2>
										<p>{!! $relatedBlog->short_desc !!}</p>
										<a class="commonButton-yellow" href="/blog/{{@$relatedBlog->slug}}">Read More</a>
									</div>
								</div>
					@endforeach
				@endif	

				


			</div>
		</div>
	</section>


</main><!-- End .main -->

@endsection

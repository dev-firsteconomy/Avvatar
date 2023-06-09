@extends('layouts.app')
@section('content')

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item fw-bold"><span class="fw-bold">Media</span></li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<section class="blogList mediaTabs">
		<div class="container">
			<div class="heading mb-4 text-center">
				<h2 class="title text-uppercase"><span class="fw-bold">Media</span></h2>
			</div>
		</div>

		<div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="video-tab" data-bs-toggle="tab" data-bs-target="#video-tab-pane" type="button" role="tab" aria-controls="video-tab-pane" aria-selected="true">Video</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="article-tab" data-bs-toggle="tab" data-bs-target="#article-tab-pane" type="button" role="tab" aria-controls="article-tab-pane" aria-selected="false">Article</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="imageTab-tab" data-bs-toggle="tab" data-bs-target="#imageTab-tab-pane" type="button" role="tab" aria-controls="imageTab-tab-pane" aria-selected="false">Images</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="video-tab-pane" role="tabpanel" aria-labelledby="video-tab" tabindex="0">
                    <div class="row">
                        <div class="col-md-4 blogCardOuter">
                            <div class="blogCard bg-gray">
                                <img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
                                <div class="blogCardContent d-flex flex-column p-2 px-3">
                                    <div class="date">September 7, 2018</div>
                                    <h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
                                    <a href="//cdn.jsdelivr.net/npm/big-buck-bunny-1080p@0.0.6/video.mp4" data-lity class="commonButton-yellow">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 blogCardOuter ">
                            <div class="blogCard bg-gray">
                                <img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
                                <div class="blogCardContent d-flex flex-column p-2 px-3">
                                    <div class="date">September 7, 2018</div>
                                    <h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
                                    <a href="//cdn.jsdelivr.net/npm/big-buck-bunny-1080p@0.0.6/video.mp4" data-lity class="commonButton-yellow">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 blogCardOuter">
                            <div class="blogCard bg-gray">
                                <img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
                                <div class="blogCardContent d-flex flex-column p-2 px-3">
                                    <div class="date">September 7, 2018</div>
                                    <h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
                                    <a href="//cdn.jsdelivr.net/npm/big-buck-bunny-1080p@0.0.6/video.mp4" data-lity class="commonButton-yellow">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="article-tab-pane" role="tabpanel" aria-labelledby="article-tab" tabindex="0">
                    <div class="row">
                        <div class="col-md-4 blogCardOuter">
                            <div class="blogCard bg-gray">
                                <img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
                                <div class="blogCardContent d-flex flex-column p-2 px-3">
                                    <div class="date">September 7, 2018</div>
                                    <h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
                                    <a class="commonButton-yellow">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 blogCardOuter ">
                            <div class="blogCard bg-gray">
                                <img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
                                <div class="blogCardContent d-flex flex-column p-2 px-3">
                                    <div class="date">September 7, 2018</div>
                                    <h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
                                    <a class="commonButton-yellow">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 blogCardOuter">
                            <div class="blogCard bg-gray">
                                <img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
                                <div class="blogCardContent d-flex flex-column p-2 px-3">
                                    <div class="date">September 7, 2018</div>
                                    <h2 class="fw-bold m-0">Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </p>
                                    <a class="commonButton-yellow">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="imageTab-tab-pane" role="tabpanel" aria-labelledby="imageTab-tab" tabindex="0">
                    <div class="row">
                        <div class="col-md-4 blogCardOuter">
                            <div class="blogCard bg-gray">
                                <img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
                                <div class="blogCardContent mediaCardContent d-flex flex-column p-2 px-3">
                                    <a class="commonButton-yellow">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 blogCardOuter ">
                            <div class="blogCard bg-gray">
                                <img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
                                <div class="blogCardContent mediaCardContent d-flex flex-column p-2 px-3">
                                    <a class="commonButton-yellow">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 blogCardOuter">
                            <div class="blogCard bg-gray">
                                <img src="{{asset('assets/images/new/blog.png')}}" class="w-100 img-fluid">
                                <div class="blogCardContent mediaCardContent d-flex flex-column p-2 px-3">
                                    <a class="commonButton-yellow">View</a>
                                </div>
                            </div>
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

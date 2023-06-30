@extends('layouts.app')
@section('content')
<style>
	.spinner-wrapper {
		position: fixed;
		z-index: 999999;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: #fff;
		opacity: 0.6;
	}

	.spinner {
		position: absolute;
		top: 50%;
		/* centers the loading animation vertically one the screen */
		left: 50%;
		/* centers the loading animation horizontally one the screen */
		width: 3.75rem;
		height: 1.25rem;
		margin: -0.625rem 0 0 -1.875rem;
		/* is width and height divided by two */
		text-align: center;
	}

	.spinner>div {
		display: inline-block;
		width: 1rem;
		height: 1rem;
		border-radius: 100%;
		background-color: #4D4D4D;
		-webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
		animation: sk-bouncedelay 1.4s infinite ease-in-out both;
	}

	.spinner .bounce1 {
		-webkit-animation-delay: -0.32s;
		animation-delay: -0.32s;
	}

	.spinner .bounce2 {
		-webkit-animation-delay: -0.16s;
		animation-delay: -0.16s;
	}

	@-webkit-keyframes sk-bouncedelay {

		0%,
		80%,
		100% {
			-webkit-transform: scale(0);
		}

		40% {
			-webkit-transform: scale(1.0);
		}
	}

	@keyframes sk-bouncedelay {

		0%,
		80%,
		100% {
			-webkit-transform: scale(0);
			-ms-transform: scale(0);
			transform: scale(0);
		}

		40% {
			-webkit-transform: scale(1.0);
			-ms-transform: scale(1.0);
			transform: scale(1.0);
		}
	}
</style>

<div class="spinner-wrapper" id="spinner-wrapper">
	<div class="spinner">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
	</div>
</div>

<main class="main">
	<input type="hidden" name="pageValue" id="pageValue" value="{{ request()->has('offerValue') ? decrypt(request()->query('offerValue')) : 0 }}">
	<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
		<div class="container d-flex align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="{{route('products')}}">Products</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{$currentProduct->category->title}} {{$currentProduct->name}}</li>
			</ol>
		</div>
	</nav>
	
	<input type="hidden" name="product" id="product" value="{{@$currentProduct->slug}}">
	<input type="hidden" name="productType" id="productType" value="1">

	<div class="page-content">
		@include('frontend.singleProduct')
	</div>
</main>

<script>
	$(document).ready(function() {

		$('.spinner-wrapper').hide();

		$(document).on('click', '.product-gallery-item', function() {
			$('.product-gallery-item').removeClass('active');
			$(this).addClass('active');
			$('#product-zoom').attr('src', $(this).data('image'));
			//$('.zoomContainer').remove();
			$('.zoomWindow').css({
				'background-image': 'url(' + $(this).data('image') + ')',
			});
		});

		$(document).on('click', '#btn-product-gallery', function(e) {
			$('#product-zoom').elevateZoom({
				gallery: 'product-zoom-gallery',
				galleryActiveClass: 'active',
				zoomType: "inner",
				cursor: "crosshair",
				zoomWindowFadeIn: 400,
				zoomWindowFadeOut: 400,
				responsive: true
			});
			var ez = $('#product-zoom').data('elevateZoom');

			if ($.fn.magnificPopup) {
				$.magnificPopup.open({
					items: ez.getGalleryList(),
					type: 'image',
					gallery: {
						enabled: true
					},
					fixedContentPos: false,
					removalDelay: 600,
					closeBtnInside: false
				}, 0);

				e.preventDefault();
			}
		});

	});

	$(document).on('click','.changeFlavourBtn', function(){
		var slug     = $(this).data('url');
		window.location.href = slug;
		// $('.spinner-wrapper').show();
		// var slug     = $(this).data('url');
		// $.ajax({
		// 	url: "/product/" + slug ,
		// 	type: "GET",
		// 	success: function(response) {
		// 		$('#loadAjax').empty().append(response);
		// 		$('.spinner-wrapper').hide();
		// 		$('.zoomContainer').remove();
		// 		$('#product-zoom').elevateZoom({
		// 			zoomType: "inner",
		// 		});
		// 	}
		// });
	});

	$(document).on('click', '.colorOptions', function() {
		$('.spinner-wrapper').show();
		var slug = $('#product').val();
		var colorId = $(this).val();
		$.ajax({
			url: "/product/" + slug + '?colorId=' + colorId,
			type: "GET",
			success: function(response) {
				$('#loadAjax').empty().append(response);
				$('.spinner-wrapper').hide();
				$('.zoomContainer').remove();
				$('#product-zoom').elevateZoom({
					zoomType: "inner",
				});
			}
		});
	});


	$(document).on('click', '.changeProductSize', function() {
		var id = $(this).data('id');
		var qty = $(this).data('stock');
		$('.stockLabel').hide();
		$('#dispalyAlert' + id).show();
		$("#quantity").attr({
			"max": qty,
			"min": 1
		});
	});

	$(document).on('click', '#toggle', function() {
		var stats = $(this).is(':checked');
		console.log(stats);
		if (stats) {
			$('#sizeImage0').hide();
			$('#sizeImage1').show();
		} else {
			$('#sizeImage1').hide();
			$('#sizeImage0').show();
		}
	});

	$(document).on('click', '#toggle', function() {
		var stats = $(this).is(':checked');
		console.log(stats);
		if (stats) {
			$('#sizeImage0').hide();
			$('#sizeImage1').show();
		} else {
			$('#sizeImage1').hide();
			$('#sizeImage0').show();
		}
	});

</script>
@endsection

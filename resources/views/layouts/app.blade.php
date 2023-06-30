<!DOCTYPE html>
<html lang="en">

<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{env('APP_NAME')}}</title>
	<meta name="keywords" content="{{env('APP_NAME')}}">
	<meta name="description" content="{{env('APP_NAME')}}">
	<meta name="author" content="{{env('APP_NAME')}}">
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('assets/images/new/favicon.ico')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('assets/images/new/favicon.ico')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/images/new/favicon.ico')}}">

	<link rel="manifest" href="{{URL::asset('assets/images/icons/site.html')}}">
	<link rel="mask-icon" href="{{URL::asset('assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
	<link rel="shortcut icon" href="{{URL::asset('assets/images/new/favicon.ico')}}">
	<meta name="apple-mobile-web-app-title" content="{{ env('APP_NAME') }}">
	<meta name="application-name" content="{{ env('APP_NAME') }}">
	<meta name="msapplication-TileColor" content="#cc9966">
	<meta name="msapplication-config" content="{{URL::asset('assets/images/icons/browserconfig.xml')}}">
	<meta name="theme-color" content="#ffffff">
	<link rel="preload" href="{{URL::asset('assets/images/new/logo.png')}}" as="image">
	<!-- Plugins CSS File -->


	<style>
		#preloaderWrapper {
			position: fixed;
			top: 0;
			left: 0;
			width: 100vw;
			height: 100vh;
			background-color: #fff;
			z-index: 999999999;
		}

		.preloaderInner {
			display: flex;
			width: 100%;
			height: 100%;
			justify-content: center;
			align-items: center;
			gap: 20px;
			flex-direction: column;
		}

		.preloaderInner p {
			letter-spacing: 2px;
			font-weight: 700;
			font-size: 24px;
		}

	</style>
	<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap-5.2.3.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
	<!-- Main CSS File -->
	<link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
	{{-- <link rel="stylesheet" href="{{URL::asset('assets/css/demos/demo-2.css')}}"> --}}
	{{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> --}}
	<link rel="stylesheet" href="{{URL::asset('assets/css/plugins/nouislider/nouislider.css')}}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
	<link rel="stylesheet" href="{{URL::asset('assets/css/featured.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/css/featured-responsive.css')}}">



	@livewireStyles
</head>

<body>

	<div id="preloaderWrapper">
		<div class="preloaderInner">
			<img src="{{URL::asset('assets/images/new/logo.png')}}" class="img-fluid" alt="">
			<p class="m-0">Loading...</p>
		</div>
	</div>

	<!-- End Google Tag Manager (noscript) -->
	<!-- Header File -->
	@include('layouts.header')

	<!-- Plugins JS File -->
	<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/bootstrap-5.2.3.bundle.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/jquery.hoverIntent.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/superfish.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/jquery.elevateZoom.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/bootstrap-input-spinner.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

	<!-- Main JS File -->
	<script src="{{URL::asset('assets/js/main.js')}}"></script>
	{{-- <script src="{{URL::asset('assets/js/demos/demo-2.js')}}"></script> --}}
	<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
	<script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
	@livewireScripts

	@yield('content')

	<!-- Footer -->

	@include('layouts.footer1')

	@include('vendor.sweetalert.alert')



	<script>

	</script>
	<script>
		$('.footer-middle .widget-title').click(function(e) {
			$(this).parent().find('.widget-list').slideToggle();
			$(this).toggleClass('active');
		})

		$("body").on('click', '.add_to_wishlist', function() {
			var product_id = $(this).data('id');

			$(".add_to_wishlist_img" + product_id).hide();
			$(".add_to_wishlist_msg" + product_id).show();
			$(".add_to_wishlist_msg" + product_id).text('Adding');

			$.ajax({
				url: "{{route('add-to-wishlist')}}",
				type: 'post',
				data: {
					_token: "{{csrf_token()}}",
					product_id
				},
				success: function(response) {

					if (response.wishlist_product) {
						var res = response.msg;
						Swal.fire({
							icon: "success",
							text: res,
							toast: true,
							position: 'top-right',
							timer: 5000,
							showConfirmButton: false,
							title: response.wishlist_product + "!",

						})
						var image_name = response.wishlist_product == 'Added' ? '/redwishlist.png' :
							'/wishlist.png';
						var imgs = "{{url('/frontend/images/')}}";
						$("#wishlist" + product_id).attr('src', imgs + image_name);
					} else {
						Swal.fire({
							icon: "error",
							text: res,
							toast: true,
							position: 'top-right',
							timer: 5000,
							showConfirmButton: false,
							title: response.error + "!",
						})
					}

					$(".add_to_wishlist_img" + product_id).show();
					$(".add_to_wishlist_msg" + product_id).hide();
				}
			});
		});


		$("body").on('click', '.add_to_cart', function() {
			var product_id = $(this).data('id');
			var qty = 1;

			$('.product' + product_id).text('Adding');

			$.ajax({
					url: "{{route('ajax-add-to-cart')}}",
					type: 'post',
					data: {
						_token: "{{csrf_token()}}",
						product_id
					},
					success: function(response) {
						$('.cart-count').text(response.cart_count);
					}
			});

			Swal.fire({
				icon: "success",
				text: "Added to Cart",
				toast: true,
				position: 'top-right',
				timer: 5000,
				showConfirmButton: false,
				title: "Added!",
			});
		});

		$("body").on('click', '.buyNowBtn', function() {
			var product_id = $(this).data('id');
			var qty        = 1;

			$.ajax({
				url: "{{route('ajax-add-to-cart')}}",
				type: 'post',
				data: {
					  _token: "{{csrf_token()}}",
					  product_id
					},
					success: function(response) 
					{
						if(response.status == true)
						{
							if (response.add_to_cart) 
							{
								$('.cart-count').text(response.cart_count);
							}
							
							window.location.href = '/cart';
						}
						else
						{
							Swal.fire({
								icon: "error",
								text: "Something went wrong",
								toast: true,
								position: 'top-right',
								timer: 5000,
								showConfirmButton: false,
								title: "Error!",
							})
						}
					}
			});
		});

	</script>
	<script>
		$(document).ready(function() {
			$('.keyup-email').keyup(function() {
				$('span.error-keyup-7').remove();
				var inputVal = $(this).val();
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if (!emailReg.test(inputVal)) {
					$(this).after('<span class="error error-keyup-7">Invalid Email Format.</span>');
				}
			});

			$(".keyup-mobile").keypress(function(e) {
				var mobilePattern = /^\d{9}$/;
				var mobile = $(this).val();

				$('span.error-keyup-8').remove();
				if (!mobilePattern.test(mobile)) {
					$(this).after('<span class="error error-keyup-8">Invalid Mobile Number.</span>');
				} else {
					$('span.error-keyup-8').remove();
				}
				// var keyCode = e.keyCode || e.which;

				// $(this).after('');

				// //Regex for Valid Characters i.e. Numbers.
				// var regex = /^[0-9]+$/;

				// //Validate TextBox value against the Regex.
				// var isValid = regex.test(String.fromCharCode(keyCode));
				// if (!isValid) 
				// {
				//     $(this).after('<span class="error error-keyup-7">Invalid Mobile Number.</span>');
				// }

				// return isValid;
			});


			$('#product').on('change', function() {
				var prodId = $(this).val();
				if (prodId != "") {
					$('.wishlist_rows').hide();
					$('#wishlist' + prodId).show();
					$('#product' + prodId).show();
				} else {
					$('.wishlist_rows').hide();
				}
			});
		});

	</script>

	<script src="{{asset('backend/js/sweetalert.min.js')}}"></script>

	<script>
		$(window).on('load', function() {
			$('#preloaderWrapper').addClass('d-none');
		})

	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			window.addEventListener('swal:confirm', event => {
				swal({
						title: event.detail.message,
						text: event.detail.text,
						icon: event.detail.type,
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							window.livewire.emit('cartDelete', event.detail.product_id);
						}
					});
			});

			$('.input-number').on('input', function() {
				var product_id = $(this).data('product_id');
				var product_qty = parseInt($(this).val());
				var product_price = $('#product_price' + product_id).data('price');
				$('.product_total' + product_id).text(product_price * product_qty);
			});

			$('.input-number').on('change', function() {
				// var product_id = $(this).data('product_id');
				// var product_qty = parseInt($(this).val());
				// var min = $('#cart_item_count'+product_id).attr('min');
				// var product_price = $('#product_price'+product_id).data('price');
				// if(min <=product_qty){
				// }else{
				//   $('#cart_item_count'+product_id).val(min);
				//   $('.product_total'+product_id).text(product_price*min);
				//   swal({
				//           // title: "Are you sure?",
				//           text: "We're sorry! Minimum limit "+min+" unit(s) allowed in this product",
				//           icon: "warning",
				//           buttons: false,  
				//           // dangerMode: false,
				//       });
				// }
			});

			$('.update_cart_btn').click(function() {
				$('.cart_update_form').submit();
			});

			$('.cart_product_qunity_change').click(function(e) {

				var product_id = $(this).data('product_id');
				var action = $(this).attr('action_type');


				// var min = $('#cart_item_count'+product_id).attr('min');
				// var max = $('#cart_item_count'+product_id).attr('max');

				//Cart product price calculate 



				if (action == 'decrement') {
					var product_qty = $('#cart_item_count' + product_id).val();
					var product_price = $('#product_price' + product_id).data('price');
					--product_qty

					if (product_qty >= 0) {
						$('.product_total' + product_id).text(product_price * product_qty);
						$('#cart_item_count' + product_id).val(product_qty);
					} else
						swal({
							// title: "Are you sure?",
							text: "We're sorry! Invalid quntity",
							icon: "warning",
							buttons: false,
							// dangerMode: false,
						});
				} else {
					var product_qty = $('#cart_item_count' + product_id).val();
					var product_price = $('#product_price' + product_id).data('price');
					++product_qty
					$('.product_total' + product_id).text(product_price * product_qty);

					$('#cart_item_count' + product_id).val(product_qty);
				}
			})

			$('.dltBtn').click(function(e) {
				// var form=$(this).closest('form');
				var dataID = $(this).data('id');
				e.preventDefault();
				swal({
						title: "Are you sure?",
						text: "Are you want to remove this item?",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							$.ajax({
								url: "{{url('cart-delete')}}/" + dataID,
								data: {
									_token: "{{csrf_token()}}"
								},
								type: "POST",
								success: function(response) {

									if (response.cart_count) {


										swal({
											// title: "Are you sure?",
											text: response.msg,
											icon: "success",
											buttons: false,
											// dangerMode: false,
										});


										$('.delete_cart_item' + dataID).hide();
										$('.cart-count').text(response.cart_count);
										$('.cart-subtotal').text(response.cart_subtotal);
									} else {

										location.reload(true);
									}


								}
							});
						} else {
							// swal("Your product is not remo!");
						}
					});
			});

			$('.btn-ship-submit').on('click', function() {
				$('.zip_alert').html('');
				$('.freight_charge_result').html('');

				var pincode = $('#zip-code').val();
				var msg = '';
				if (true) {
					$.ajax({
						url: "/calculate-fright-charge",
						data: {
							_token: "{{csrf_token()}}",
							pincode
						},
						type: "POST",
						success: function(response) {

							if (response.freight_charge != undefined) {
								$('.freight_charge_result').html(' &#x20B9; ' + response
									.freight_charge);

							}

							if (response.pincode[0] != undefined)
								$('.zip_alert').html('<span class="text-danger">' + response
									.pincode[0] + '</span>');
						}

					});
				} else {}
			});

			$('#submit-newsletter-button').on('click', function() {
				var newsletterEmail = $('#newsletter-email').val();
				var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

				if (newsletterEmail != '') 
				{
					if (!EmailPattern.test(newsletterEmail)) 
					{
						Swal.fire({
							icon: "error",
							text: 'Please Enter Valid Email',
							toast: true,
							position: 'top-right',
							timer: 5000,
							showConfirmButton: false,
							title: "Valid Email!",
						});

						return false;
					}

				
					$.ajax({
						url: "/submit-newsletter",
						data: {
							_token: "{{csrf_token()}}",
							newsletterEmail
						},
						type: "POST",
						success: function(response) {
							if (response == 1) 
							{
								Swal.fire({
									icon: "success",
									text: "You have subscribed to our newsletter",
									toast: true,
									position: 'top-right',
									timer: 5000,
									showConfirmButton: false,
									title: "Subscribed!",
								});
							} 
							else if (response == 2) 
							{
								Swal.fire({
									icon: "alert",
									text: 'You have already subscribed to our newsletter',
									toast: true,
									position: 'top-right',
									timer: 5000,
									showConfirmButton: false,
									title: "Already Subscribed!",
								});
							} 
							else 
							{
								Swal.fire({
									icon: "error",
									text: 'Something went wrong !',
									toast: true,
									position: 'top-right',
									timer: 5000,
									showConfirmButton: false,
									title: "Error !",
								});
							}

							$('#newsletter-email').val('');
						}
					});
				} 
				else 
				{
					Swal.fire({
						icon: "error",
						text: 'Please Add Email',
						toast: true,
						position: 'top-right',
						timer: 5000,
						showConfirmButton: false,
						title: "Require Email!",
					});
				}
			});
		});

	</script>
	<script>
		// $(".customFilterData").live("click", function () {
		//     $("input:checkbox[class=customFilterData]:checked").each(function () {
		//         alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
		//     });
		// });

		// $('.customFilterData').change(function() {
		//     $("input:checkbox[class=customFilterData]:checked").each(function () {
		//         alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
		//     });
		// });

	</script>


	<script>
		$(document).ready(function() {
			$(".show-sidebar-btn").click(function() {
				$("body").addClass("show-hidden-sidebar");
				$(".sidebar-container").addClass("show-hidden-sidebar");
			});
			$(".close-sidebar-btn").click(function() {
				$("body").removeClass("show-hidden-sidebar");
				$(".sidebar-container").removeClass("show-hidden-sidebar");
			});

		});

	</script>

	<script>
		if ($(window).width() < 767) {
			$('.categorySlider').owlCarousel({
				loop: true,
				margin: 10,
				nav: true,
				navText: [
					"<i class='icon-angle-left'></i>",
					"<i class='icon-angle-right'></i>"
				],
				autoplay: true,
				autoplayHoverPause: true,
				responsive: {
					0: {
						items: 1
					},
					600: {
						items: 2
					},
					1000: {
						items: 5
					}
				}
			})
		}

	</script>

	<script>
		const video = document.getElementById("video");
		const circlePlayButton = document.getElementById("circle-play-b");
		const videoContent = document.getElementById("videoContent");

		function togglePlay() {
			if (video.paused || video.ended) {
				video.play();
			} else {
				video.pause();
			}
		}

		circlePlayButton.addEventListener("click", togglePlay);
		video.addEventListener("playing", function() {
			videoContent.style.opacity = 0;
			circlePlayButton.style.opacity = 0;
		});
		video.addEventListener("pause", function() {
			videoContent.style.opacity = 1;
			circlePlayButton.style.opacity = 1;
		});

	</script>

	<script>
		$('.digit-group').find('input').each(function() {
			$(this).attr('maxlength', 1);
			$(this).on('keyup', function(e) {
				var parent = $($(this).parent());

				if (e.keyCode === 8 || e.keyCode === 37) {
					var prev = parent.find('input#' + $(this).data('previous'));

					if (prev.length) {
						$(prev).select();
					}
				} else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
					var next = parent.find('input#' + $(this).data('next'));

					if (next.length) {
						$(next).select();
					} else {
						if (parent.data('autosubmit')) {
							parent.submit();
						}
					}
				}
			});
		});

	</script>

	<!--
	 alert('Hello world!'); 
	<script src="data:text/javascript;base64,YWxlcnQoJ0hlbGxvIHdvcmxkIScpOw=="></script>
	<script defer>
		window.addEventListener('DOMContentLoaded', function() {

			alert('Why no defer?!?');

		});

	</script>



	<script>
		alert('Buh-bye world!');

	</script>
-->


</body>

</html>

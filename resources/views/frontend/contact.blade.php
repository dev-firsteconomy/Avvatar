@extends('layouts.app')
@section('content')

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page"><span class="fw-bold">Contact us</span></li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div class="page-content pb-0">
		<section class="contactUsForm">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="heading text-center">
							<h2 class="title mb-1 text-uppercase"><span class="fw-bold">get in touch</span> with us</h2>
						</div>
						@if(session('success'))
						<div class="alert alert-success" role="alert">
							{!! \Session::get('success') !!}
						</div>
						@endif

						<form action="{{url('submit-contact')}}" class="contact-form mb-3" method="post">
							@csrf
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" name="name" placeholder="Full Name *" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-sm-6">
									<input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number*" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-sm-6">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email Address *" required>
								</div><!-- End .col-sm-6 -->

								<div class="col-sm-6">
									<input type="text" class="form-control" id="city" name="city" placeholder="City">
								</div><!-- End .col-sm-6 -->

								<div class="col-sm-12">
									<textarea class="form-control" rows="4" id="message" name="message" required placeholder="Write your Message *"></textarea>
								</div>
							</div>

							<div class="text-center">
								<button type="submit" class="commonButton-yellow">
									<span>SUBMIT</span>
								</button>
							</div>
						</form><!-- End .contact-form -->

					</div><!-- End .col-lg-6 -->
				</div><!-- End .row -->
			</div>
		</section>

		<section class="contactPatch">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 row">
						<div class="col-md-6 contactPatchBox text-center">
							<h3 class="text-uppercase text-white fw-bold">Email Address</h3>
							<h3><a href="mailto:help@avvatarindia.com" class="yellowText fw-bold">help@avvatarindia.com</a></h3>
						</div>

						<div class="col-md-6 contactPatchBox text-center">
							<h3 class="text-uppercase text-white fw-bold">Phone Number</h3>
							<h3><a href="tel:912345678" class="yellowText fw-bold">+91 - 912345678</a></h3>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="contactAddress">
			<div class="container">
				<div class="heading text-center">
					<h2 class="title mb-1 text-uppercase"><span class="fw-bold">Join avvatar</span> telegram group</h2>
					<p>Lorem</p>

					<a href="" class="commonButton-yellow text-uppercase">
						<span></span> Join Now
					</a>
				</div>

				<div class="row ">
					<div class="col-lg-4 addressBox">
						<h3>Corporate Office:</h3>
						<p>20th Floor Nirmal Building, Nariman Point, Mumbai-400021. Fax- 022-43005580</p>
						<div class="addressContact">
							<p>Tel No : 022- 43005555</p>
							<p>Tel No : 022-43005580</p>
						</div>
					</div>

					<div class="col-lg-4 addressBox">
						<h3>Registered Office:</h3>
						<p>Flat No 1, Plot No 19, Nav Rajasthan Housing Society, Behind Ratna Memorial Hospital, Shivaji Nagar, Pune, Pin-411016, Maharashtra, India</p>
					</div>

					<div class="col-lg-4 addressBox">
						<h3>Factory:</h3>
						<p>Awasari Phata, Manchar, Dist. Pune.</p>
					</div>
				</div>
			</div>
		</section>

		<div class="contactMap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7548.183617077122!2d72.822113!3d18.92733!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1e9677c2b49%3A0x7780226eb8cbb2f1!2sParag%20Milk%20Foods%20Limited!5e0!3m2!1sen!2sin!4v1685512112024!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>

	</div><!-- End .page-content -->
</main><!-- End .main -->

@endsection

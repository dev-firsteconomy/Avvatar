@extends('layouts.app')
@section('content')

<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav m-0">
		<div class="container">
			<ol class="breadcrumb ">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item fw-bold"><span class="fw-bold">Track Order</span></li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<section class="trackOrder">
		<div class="container">
			<div class="heading mb-3 text-center">
				<h2 class="title text-uppercase"><span class="fw-bold">Track Order</span></h2>
			</div>

			<div class="row justify-content-center">
				<div class="col-md-6">
					<form action="">
						<div class="col mb-3">
							<input type="text" class="form-control" name="first_name" value="" placeholder="Order Id" required>
						</div>

						<div class="col mb-3">
							<input type="email" class="form-control" name="first_name" value="" placeholder="Email ID" required>
						</div>

						<div class="submitButton text-center">
							<button type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>


	</section>


</main><!-- End .main -->

@endsection

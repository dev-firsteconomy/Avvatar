<div class="container">
	<div class="product-details-top" id="loadAjax">
		<div class="row">
			<div class="col-md-6">
				<div class="product-gallery product-gallery-vertical">
					<?php 
						$baseImage = $currentProduct->default_image;
						if(!$baseImage)
						{
							$baseImage = $productImages->first()->image;
						}
					?>

					<div class="row">
						<figure class="product-main-image">
							<img id="product-zoom" src="{{asset(@$baseImage)}}" data-zoom-image="{{asset(@$baseImage)}}" alt="{!! @$currentProduct->meta_description !!}">
							<a href="javascript:void(0);" id="btn-product-gallery" class="btn-product-gallery">
								<i class="icon-arrows"></i>
							</a>
						</figure>

						<div id="product-zoom-gallery" class="product-image-gallery">
							@foreach($productImages as $key => $image)
								@if($key == 0)
									<a class="product-gallery-item active" href="javascript:void(0);" data-image="{{asset(@$image->image)}}" data-zoom-image="{{asset(@$image->image)}}">
										<img src="{{asset(@$image->image)}}" alt="product side">
									</a>
								@else
									<a class="product-gallery-item" href="javascript:void(0);" data-image="{{asset(@$image->image)}}" data-zoom-image="{{asset(@$image->image)}}">
										<img src="{{asset(@$image->image)}}" alt="product side">
									</a>
								@endif
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="product-details">
					<h1 class="product-title">{{@$currentProduct->title}}</h1>

					<div class="product-price d-flex justify-content-between">
						<div class="product-price-box">
							MRP: <span class="old-price">₹ {{round($currentProduct->price)}}</span>
						</div>

						<div class="product-price-box">
							Offer Price: <span class="new-price">₹ {{round($currentProduct->sale_price)}}</span>
							<small>(MRP incl Taxes)</small>
						</div>
					</div>

					<div class="chooseFlavourWrapper">
						<div class="labelWrapper mb-1">
							<span class="fw-400 mr-4 labelText">Choose Flavour:</span>

						</div>
						<div class="chooseFlavourBtns d-flex flex-wrap gap-3">
							<?php $prodName = ''; ?>
							@foreach($allCategoryProduct as $product)
							   @if($prodName != $product->name)
								 <button class="btn changeFlavourBtn {{$currentProduct->name == $product->name ? 'active' : ''}}" data-url="{{$product->slug}}">{{$product->name}}</button>
								 <?php $prodName = $product->name; ?>
							   @endif
							@endforeach
						</div>
					</div>


					<?php
					   $sameFlavourProducts = App\Models\Product::where('name',$currentProduct->name)->groupBy('size_id')->get();
					?>
					<div class="table-cell radio-cell">
						<div class="labelWrapper">
							<span class="fw-400 mr-4 labelText">Choose Weight: </span>
							<div class="weight-conversion-btns">
								<div class="weight-conversion-btns_btn active kg" data-value="kg">kg</div>
								<div class="weight-conversion-btns_btn lb" data-value="lb">lb</div>
							</div>
						</div>
						
						@if(isset($sameFlavourProducts))
							<div class="chooseSizeBtnsKg d-flex flex-wrap gap-3 active weightInKg">
								@foreach($sameFlavourProducts as $sameFlavourProduct)
									<button class="btn changeFlavourBtn {{$currentProduct->size_id == $sameFlavourProduct->size_id ? 'active' : ''}}" data-url="{{$sameFlavourProduct->slug}}">{{$sameFlavourProduct->size->name}}</button>
								@endforeach
							</div>
							<div class="chooseSizeBtnsLb d-flex flex-wrap gap-3 weightInLb d-none">
								@foreach($sameFlavourProducts as $sameFlavourProduct)
									<button class="btn changeFlavourBtn {{$currentProduct->size_id == $sameFlavourProduct->size_id ? 'active' : ''}}" data-url="{{$sameFlavourProduct->slug}}">{{2.2 * substr($sameFlavourProduct->size->name, 0, -3)}} lb</button>
								@endforeach
							</div>
						@else
						    <div class="label fw-400 mr-4">Out of Stock</div>
						@endif
					</div>

					@if( $currentProduct->stock_quantity >=1 && $currentProduct->stock_quantity <= 5)
						<div class="product-price stockLabel" style="" id="dispalyAlert{{$currentProduct->id}}">
							<small>Only {{$currentProduct->stock_quantity}} Left In stock</small>
						</div>
					@endif

					<div class="checkDelivery">
						<div class="labelWrapper">
							<span class="fw-400 mr-4 labelText">Delivery: </span>
							<form id="checkPincode" action="javascript:void(0);">
								<div class="row align-items-center">
									<div class="col-auto">
										<input type="text" class="form-control mb-0" id="pinCode" placeholder="Enter Pincode.." onkeypress="return event.charCode >= 48 && event.charCode <= 57">
									</div>
									<div class="col-auto">
										<button type="button" class="btn">Check</button>
									</div>
								</div>
							</form>
						</div>
					</div>


						<div id="displayProdCount">
						</div>


						<div class="details-filter-row details-row-size d-none">
							<label id="availableContsu"></label>
						</div>

						<div class="product-details-action">					
							@if($currentProduct->stock_quantity > 0)

								<div class="details-action-wrapper">
									<a href="javascript:void(0);" class="btn-product btn-wishlist btn-expandable buyNowBtn" title="Buy Now" data-id="{{$currentProduct->id}}" id="wishlist{{$currentProduct->id}}"><span class="">Buy Now</span></a>
								</div>
								
								<a href="javascript:void(0);" class="btn-product btn-cart add_to_cart" data-id="{{$currentProduct->id}}"><span class="product{{$currentProduct->id}}">Add to cart</span></a>
							@endif
						</div>

						<div class="product-details-footer">
							<div class="product-cat">
								<span>Category:</span>
								<a href="/product-categories">{{$currentProduct->category->title}}</a>
							</div>

							<div class="social-icons social-icons-sm">
								<span class="social-label">Share:</span>
								<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
								<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
								<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
								<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>

	<div class="product-details-tab">
		<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="product-description" data-bs-toggle="tab" data-bs-target="#product-description-pane" type="button" role="tab" aria-controls="product-description-pane" aria-selected="true">Product Description</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="product-protein-level" data-bs-toggle="tab" data-bs-target="#product-protein-level-pane" type="button" role="tab" aria-controls="product-protein-level-pane" aria-selected="false">Protein Level</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="product-nutritional-information" data-bs-toggle="tab" data-bs-target="#product-nutritional-information-pane" type="button" role="tab" aria-controls="product-nutritional-information-pane" aria-selected="false">Nutrional Information</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="product-faq" data-bs-toggle="tab" data-bs-target="#product-faq-pane" type="button" role="tab" aria-controls="product-faq-pane" aria-selected="false">FAQs</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link " id="product-reviews" data-bs-toggle="tab" data-bs-target="#product-reviews-pane" type="button" role="tab" aria-controls="product-reviews-pane" aria-selected="false">Reviews</button>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane fade show active" id="product-description-pane" role="tabpanel" aria-labelledby="product-description" tabindex="0">
				<div class="product-desc-content">
					<div class="productDescription">
						{!! $currentProduct->description !!}
					</div>
					
				</div>
			</div><!-- .End .tab-pane -->
			<div class="tab-pane fade" id="product-protein-level-pane" role="tabpanel" aria-labelledby="product-protein-level" tabindex="0">
				<div class="product-desc-content">
					<div class="productProteinLevel d-flex flex-wrap">
						@foreach($productProteins as $productProtein)
							<div class="proteinLevelBox">
								<h3>{{$productProtein->protein_value}}</h3>
								<h4>{{$productProtein->proteinName->name}}</h4>
								<p>{{$productProtein->description}}</p>
							</div>
						@endforeach
					</div>
					
				</div>
			</div>
			<div class="tab-pane fade" id="product-nutritional-information-pane" role="tabpanel" aria-labelledby="product-nutritional-information" tabindex="0">
				<div class="product-desc-content">
					<div class="productNutritional">
						<div class="row">
							@foreach($nutritionImages as $nutritionImage)
								<div class="col-6 col-md-4">
									<img src="{{$nutritionImage->image}}" data-lity class="img-fluid" loading="lazy">
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="product-faq-pane" role="tabpanel" aria-labelledby="product-faq" tabindex="0">
				<div class="product-desc-content">
					<div class="productFaq">
						{!! $currentProduct->faq !!}
					</div>
				</div>
			</div>
			<div class="tab-pane fade " id="product-reviews-pane" role="tabpanel" aria-labelledby="product-reviews" tabindex="0">
				<div class="product-desc-content">
					<div class="productFaqTop w-100 d-flex flex-column flex-md-row">
						<div class="starRatingWrapper d-flex align-items-center">
							<div class="star-rating me-md-2">
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star-o"></i>
							</div>
							<div class="basedOnReviews">
								<p>Based on <span>5 </span>Reviews</p>
							</div>
						</div>

						<div class="writeReview d-flex align-items-center gap-2">
							<a href="/write-review" class="">Write a review</a>
							<div class="toolbox-right">
								<div class="toolbox-sort">
									<div class="select-custom m-2 mb-md-0">
										<select name="sortby" id="sortby" class="form-control filterBySort mb-0">
											<option value="">Sort by:</option>
											<option value="high to low">High to low</option>
											<option value="low to high">Low to high</option>
										</select>
									</div>
								</div><!-- End .toolbox-sort -->
							</div>
						</div>
					</div>
					<div class="productReviewBox">
						<div class="productReviewUserImg">
							<img src="https://placehold.it/70x70" class="img-fluid" alt="">
						</div>
						<div class="productReviewContentBox d-flex align-items-md-center">
							<div class="productReviewContent">
								<div class="productReviewUser">
									<h4>User Name</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos nam nostrum expedita laudantium animi, commodi a aperiam numquam odit necessitatibus dolorem quasi nemo id recusandae ad, consequatur minima quidem voluptates.</p>
								</div>
							</div>
							<div class="productReviewRating">
								<div class="starRatingWrapper d-flex">
									<div class="star-rating me-md-2">
										<!--
										<input type="radio" id="15-stars" name="rating" value="15" />
										<label for="15-stars" class="star">&#9733;</label>
										<input type="radio" id="14-stars" checked name="rating" value="14" />
										<label for="14-stars" class="star">&#9733;</label>
										<input type="radio" id="13-stars" name="rating" value="13" />
										<label for="13-stars" class="star">&#9733;</label>
										<input type="radio" id="12-stars" name="rating" value="12" />
										<label for="12-stars" class="star">&#9733;</label>
										<input type="radio" id="11-star" name="rating" value="11" />
										<label for="11-star" class="star">&#9733;</label>
-->
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star-o"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- End .product-desc-content -->
			</div><!-- .End .tab-pane -->
		</div><!-- End .tab-content -->
	</div><!-- End .product-details-tab -->

	<div class="youMaylike">
		<div class="container">
			<div class="heading text-center mb-5">
				<h2 class="title text-uppercase"><span class="fw-bold">Similar</span> Products</h2>
			</div>
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
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
			@if(isset($relatedProducts) && @$relatedProducts->isNotEmpty())
				@foreach ($relatedProducts as $product)
					<div class="product product-7 text-center">
						<figure class="product-media">
                            @if($product->tag != '')<span class="product-label label-new">{{$product->tag}}</span>@endif
                            <?php 
                                    $baseImage = $product->default_image;
                                    if(!$baseImage)
                                    {
                                        $baseImage = $product->images()->first()->image;
                                    }
                            ?>
                
                            <a href="{{ route('product',$product->slug) }}">
                                <img src="{{asset($baseImage)}}" alt="{!! $product->meta_description !!}" class="product-image">
                            </a>
                                        
                            <div class="product-action-vertical">
                                    @if(is_user_logged_in())
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
                                    @else
                                        <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
                                    @endif
                                </div>
                        </figure>
                                        
                        <div class="product-body">
                            <div class="product-cat">
                                <a href="javascript:void(0);">AVVATAR {{$product->category->title}}</a>
                            </div><!-- End .product-cat -->
                                            
                            <h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->name}} - {{@$product->size->name}}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <div class="w-100">
                                <span class="new-price">₹{{round($product->sale_price) }}</span>  @if($product->sale_price != $product->price) <span class="old-price">₹{{round($product->price)}}</span> @endif </div> 
                                <small>(MRP incl Taxes)</small>
                            </div><!-- End .product-price -->
                            <div class="atc-container">                                                            
                                <div class="mb-2">
                                    <a href="{{route('product',$product->slug)}}" class="btn-cart" ><span class="product{{$product->id}}">Buy Now</span></a>
                                </div>
                            </div>
                        </div>
					</div>
				@endforeach
			@endif


		</div>
	</div>
	<!-- End .owl-carousel -->
</div><!-- End .container -->

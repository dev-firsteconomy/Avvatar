<div class="container">
	<div class="product-details-top" id="loadAjax">
		<div class="row">
			<div class="col-md-6">
				<div class="product-gallery product-gallery-vertical">
					<?php
                                        $colorId  = @$colorId ? $colorId:0; 

                                        if($colorId != 0)
                                        {   
                                            $priImage = @$product->images()->where('color_id','=',$colorId)->first()->image;
                                            $images = $product->images()->where('color_id',$colorId)->get();
                                        }
                                        else 
                                        {  
                                            $colorId = @$product->sizesstock()->first()->color_id;
                                            $priImage = @$product->images()->first()->image;
                                            $images = $product->images()->where('color_id',$colorId)->get();
                                        }                     
                                    ?>

					<div class="row">
						<figure class="product-main-image">
							<img id="product-zoom" src="{{asset(@$priImage)}}" data-zoom-image="{{asset(@$priImage)}}" alt="{!! @$product->meta_description !!}">
							<a href="javascript:void(0);" id="btn-product-gallery" class="btn-product-gallery">
								<i class="icon-arrows"></i>
							</a>
						</figure><!-- End .product-main-image -->

						<div id="product-zoom-gallery" class="product-image-gallery">
							@foreach($images as $key => $image)
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
						</div><!-- End .product-image-gallery -->
					</div><!-- End .row -->
				</div><!-- End .product-gallery -->
			</div><!-- End .col-md-6 -->

			<div class="col-md-6">
				<div class="product-details">
					<h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

					<div class="product-price d-flex justify-content-between">
						<div class="product-price-box">
							MRP: <span class="old-price">₹ {{round($product->price)}}</span>
						</div>

						<div class="product-price-box">
							Offer Price: <span class="new-price">₹ {{round($product->discounted_amt)}}</span>
							@if($product->discounted_amt != $product->price) @endif
							<small>(MRP incl Taxes)</small>
						</div>

					</div><!-- End .product-price -->

					<div class="product-content">
						{!! $product->title !!}
					</div><!-- End .product-content -->

					<?php
                                        $availableColors = $product->sizesstock()->groupBy('color_id')->get();
                                        $availableSizes = $product->sizesstock()->where('color_id',$colorId)->groupBy('size_id')->get();
                                     ?>
					@if(isset($availableSizes) && $availableSizes->isNotEmpty())
					<div class="labelWrapper">
						<span class="fw-400 mr-4 labelText">Quantity: </span>
						<div class="product-details-quantity">
							<input type="number" id="quantity" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required>
						</div>
					</div>
					@endif
					<div class="table-cell radio-cell">
						<div class="label text-underline fw-400 mr-4">Color</div>
						<div id="" class="d-flex">
							@if(isset($availableColors) && $availableColors->isNotEmpty())
							@foreach($availableColors as $color)
							<div class="radio has-color">
								<label>
									<input type="radio" name="color" value="{{@$color->color_id}}" {{$colorId==$color->color_id ? 'checked' : '' }} class="p-cradio colorOptions colorOptions{{$product->id}}">
									<div class="custom-color"><span style="background-color:{{@$color->productColor->code}}"></span></div>
								</label>
							</div>
							@endforeach
							@endif
						</div>
					</div>


					<div class="table-cell radio-cell">
						<div class="labelWrapper">
							<span class="fw-400 mr-4 labelText">Choose Weight: </span>
							<div class="weight-conversion-btns">
								<div class="weight-conversion-btns_btn active kg">kg</div>
								<div class="weight-conversion-btns_btn  lb">lb</div>
							</div>
						</div>
						@if(isset($availableSizes) && $availableSizes->isNotEmpty())
						<div id="" class="radioBoxes d-flex">
							@foreach($availableSizes as $size)
							@if($size->stock_qty > 0)
							<div class="radio has-image">
								<label>
									<input type="radio" name="size" value="{{@$size->size_id}}" data-id="{{$size->id}}" data-stock="{{@$size->stock_qty}}" class="p-cradio changeProductSize sizeOptions{{$product->id}}">
									<div class="custom-size">
										<span>{{@$size->productSize->name}}</span>
										<span>{{round($product->price)}} kg</span>
									</div>
								</label>
							</div>
							@else
							@if(count($availableSizes) == 1)
							<div class="label fw-400 mr-4">Out of Stock</div>
							@endif
							@endif
							@endforeach
						</div>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Size Guide</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body p-4">
										<div class="size-toggle mb-2 d-flex justify-content-center align-items-center">
											<span class="mr-0 text-dark">IN</span>
											<input type="checkbox" id="toggle" />
											<label for="toggle"></label>
											<span class="ml-2 text-dark">CM</span>
										</div>
										@if($sizeCharts && $sizeCharts->isNotEmpty())
										@foreach($sizeCharts as $k => $chart)
										@if($k == 0)
										<img class="sg-img" id="sizeImage{{$k}}" src="{{URL::asset($chart->image)}}">
										@else
										<img class="sg-img" id="sizeImage{{$k}}" style="display:none;" src="{{URL::asset($chart->image)}}">
										@endif
										@endforeach
										@endif
									</div>
								</div>
							</div>
						</div>
						@else
						<div class="label fw-400 mr-4">Out of Stock</div>
						@endif
					</div>

					<div class="chooseFlavourWrapper">
						<div class="labelWrapper mb-1">
							<span class="fw-400 mr-4 labelText">Choose Flavours</span>

						</div>
						<div class="chooseFlavourBtns d-flex flex-wrap gap-3">
							<button class="btn">
								Blue Tokai Coffee
							</button>
							<button class="btn oos">
								Blue Tokai Coffee
							</button>
							<button class="btn">
								Blue Tokai Coffee
							</button>
							<button class="btn">
								Blue Tokai Coffee
							</button>
							<button class="btn">
								Blue Tokai Coffee
							</button>
							<button class="btn">
								Blue Tokai Coffee
							</button>
						</div>
					</div>

					<div class="checkDelivery">
						<div class="labelWrapper">
							<span class="fw-400 mr-4 labelText">Delivery: </span>
							<form>
								<div class="row align-items-center">
									<div class="col-auto">
										<input type="no" class="form-control mb-0" id="pinCode" placeholder="Enter Pincode..">
									</div>
									<div class="col-auto">
										<button type="submit" class="btn">Check</button>
									</div>
								</div>
							</form>
						</div>
					</div>

					@if(isset($availableSizes) && $availableSizes->isNotEmpty())
					@foreach($availableSizes as $size)
					@if($size->stock_qty <= 2 && $size->stock_qty > 0)
						<div class="product-price stockLabel" style="display:none;" id="dispalyAlert{{$size->id}}">
							<small>Only {{$size->stock_qty}} Left In stock</small>
						</div>
						@endif
						@endforeach
						@endif


						<div id="displayProdCount">
						</div><!-- End .details-filter-row -->



						<div class="details-filter-row details-row-size d-none">
							<label id="availableContsu"></label>
						</div><!-- End .details-filter-row -->

						<div class="product-details-action">
							@if(isset($availableSizes) && $availableSizes->isNotEmpty())
							<a href="javascript:void(0);" class="btn-product btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
							@endif
							<div class="details-action-wrapper">
								@if(is_user_logged_in())
								<a href="javascript:void(0);" class="btn-product btn-wishlist btn-expandable add_to_wishlist" title="Wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">Buy Now</span></a>
								@else
								<a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist btn-expandable" title="Wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}">Buy Now</a>
								@endif

							</div><!-- End .details-action-wrapper -->
						</div><!-- End .product-details-action -->

						<div class="product-details-footer">
							<div class="product-cat">
								<span>Category:</span>
								<a href="javascript:void(0);">{{$product->category->title}}</a>
							</div><!-- End .product-cat -->

							<div class="social-icons social-icons-sm">
								<span class="social-label">Share:</span>
								<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
								<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
								<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
								<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
							</div>
						</div><!-- End .product-details-footer -->
				</div><!-- End .product-details -->
			</div><!-- End .col-md-6 -->
		</div>
	</div><!-- End .product-details-top -->

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
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

						<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

						<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

						<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>
					</div>
					<!--{!! $product->description !!}-->
				</div><!-- End .product-desc-content -->
			</div><!-- .End .tab-pane -->
			<div class="tab-pane fade" id="product-protein-level-pane" role="tabpanel" aria-labelledby="product-protein-level" tabindex="0">
				<div class="product-desc-content">
					<div class="productProteinLevel d-flex flex-wrap">
						<div class="proteinLevelBox">
							<h3>23 g</h3>
							<h4>Protien</h4>
							<p>Builds strength and enables muscle growth</p>
						</div>
						<div class="proteinLevelBox">
							<h3>23 g</h3>
							<h4>Protien</h4>
							<p>Builds strength and enables muscle growth</p>
						</div>
						<div class="proteinLevelBox">
							<h3>23 g</h3>
							<h4>Protien</h4>
							<p>Builds strength and enables muscle growth</p>
						</div>
						<div class="proteinLevelBox">
							<h3>23 g</h3>
							<h4>Protien</h4>
							<p>Builds strength and enables muscle growth</p>
						</div>
						<div class="proteinLevelBox">
							<h3>23 g</h3>
							<h4>Protien</h4>
							<p>Builds strength and enables muscle growth</p>
						</div>
						<div class="proteinLevelBox">
							<h3>23 g</h3>
							<h4>Protien</h4>
							<p>Builds strength and enables muscle growth</p>
						</div>
					</div>
					<!--{!! $product->additional_information !!}-->
				</div><!-- End .product-desc-content -->
			</div><!-- .End .tab-pane -->
			<div class="tab-pane fade" id="product-nutritional-information-pane" role="tabpanel" aria-labelledby="product-nutritional-information" tabindex="0">
				<div class="product-desc-content">
					<div class="productNutritional">
						<div class="row">
							<div class="col-6 col-md-4">
								<img src="https://via.placeholder.com/600x400" data-lity class="img-fluid" loading="lazy">
							</div>

							<div class="col-6 col-md-4">
								<img src="https://via.placeholder.com/600x400" data-lity class="img-fluid" loading="lazy">
							</div>

							<div class="col-6 col-md-4">
								<img src="https://via.placeholder.com/600x400" data-lity class="img-fluid" loading="lazy">
							</div>
						</div>
					</div>
				</div><!-- End .product-desc-content -->
			</div><!-- .End .tab-pane -->
			<div class="tab-pane fade" id="product-faq-pane" role="tabpanel" aria-labelledby="product-faq" tabindex="0">
				<div class="product-desc-content">
					<div class="productFaq">
						<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

						<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

						<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>
					</div>
					<!--{!! $product->additional_information !!}-->
				</div><!-- End .product-desc-content -->
			</div><!-- .End .tab-pane -->
			<div class="tab-pane fade " id="product-reviews-pane" role="tabpanel" aria-labelledby="product-reviews" tabindex="0">
				<div class="product-desc-content">
					<div class="productFaqTop w-100 d-flex flex-column flex-md-row">
						<div class="starRatingWrapper d-flex align-items-center">
							<div class="star-rating me-md-2">
								<!--
								<input type="radio" id="5-stars" name="rating" value="5" />
								<label for="5-stars" class="star">&#9733;</label>
								<input type="radio" id="4-stars" checked name="rating" value="4" />
								<label for="4-stars" class="star">&#9733;</label>
								<input type="radio" id="3-stars" name="rating" value="3" />
								<label for="3-stars" class="star">&#9733;</label>
								<input type="radio" id="2-stars" name="rating" value="2" />
								<label for="2-stars" class="star">&#9733;</label>
								<input type="radio" id="1-star" name="rating" value="1" />
								<label for="1-star" class="star">&#9733;</label>
-->
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
					<!--{!! $product->additional_information !!}-->
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
					<a href="{{url('product/' .$product->slug)}}">
						<img src="{{asset(@$product->images()->first()->image)}}" alt="{!! @$product->meta_description !!}" class="product-image">
					</a>

					<div class="product-action-vertical">
						@if(is_user_logged_in())
						<a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
						@else
						<a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
						@endif
					</div><!-- End .product-action-vertical -->
				</figure><!-- End .product-media -->
				<?php
                                            $availableColors = $product->sizesstock()->groupBy('color_id')->get();
                                        ?>
				<div class="product-body">
					<div class="product-cat">
						<a href="{{route('product',$product->category->slug)}}">{{$product->category->title}}</a>
					</div><!-- End .product-cat -->
					@if(isset($availableColors) && $availableColors->isNotEmpty())
					<div class="product-color row justify-content-center">
						@foreach($availableColors as $color)
						<div class="radio has-color">
							<label>
								<input type="radio" name="color" value="{{@$color->color_id}}" class="p-cradio colorOptions">
								<div class="custom-color"><span style="background-color:{{@$color->productColor->code}}"></span></div>
							</label>
						</div>
						@endforeach
					</div><!-- End .product-cat -->
					@endif
					<h3 class="product-title"><a href="{{route('product',$product->slug)}}">{{$product->name}}</a>
					</h3><!-- End .product-title -->
					<div class="product-price">
						<span class="new-price">₹ {{round($product->discounted_amt)}}</span>
						@if($product->discounted_amt != $product->price) <span class="old-price">₹
							{{round($product->price)}}</span> @endif <small>(MRP incl Taxes)</small>
					</div><!-- End .product-price -->
					<div class="atc-container">
						<div class="mb-0">
							<a href="javascript:void(0);" class="btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to
									cart</span></a>
						</div>
					</div>
				</div><!-- End .product-body -->
			</div><!-- End .product -->
			@endforeach
			@endif


		</div>
	</div>
	<!-- End .owl-carousel -->
</div><!-- End .container -->

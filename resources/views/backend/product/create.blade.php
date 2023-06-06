@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid">
	<div class="card">
		<h5 class="card-header" style="background: #4d72df;color: white;">Add Product</h5>
		<div class="card-body">
			<form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="row">

					<div class="col-md-2">
						<div class="form-group">
							<label for="category_id" class="col-form-label">Select Category <span class="text-danger">*</span></label>
							<select class="form-control" name="category_id" id="">
								<option value="" selected>Select Category</option>
								@foreach ($categories as $category_id => $category)
								<option value="{{$category_id}}">{{$category}}</option>
								@endforeach
							</select>
							@error('category_id')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
							<input id="name" type="text" name="name" placeholder="Enter Name" value="{{old('name')}}" class="form-control">
							@error('name')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="hsn" class="col-form-label">HSN <span class="text-danger">*</span></label>
							<input id="hsn" type="text" name="hsn" placeholder="Enter HSN" value="{{old('hsn')}}" class="form-control">
							@error('hsn')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="min_qty" class="col-form-label">Minimum Order Quantity <span class="text-danger">*</span></label>
							<input id="min_qty" type="number" name="min_qty" min="0" placeholder="Enter Minimum Order Quantity" value="{{ old('min_qty') }}" class="form-control">
							@error('min_qty')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="tag" class="col-form-label">Tag <span class="text-danger">*</span></label>
							<input id="tag" type="text" name="tag" placeholder="Enter tag" value="{{ old('tag')  }}" class="form-control">
							@error('tag')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							<label for="related_products" class="col-form-label">related_products</label>
							<select name="related_products[]" id="related_products" class="form-control related_productsClass" multiple>
								@foreach($related_products as $key=>$product)
									<option value='{{$product->id}}'>{{$product->name}}</option>
								@endforeach
							</select>
							@error('related_products')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="description" class="col-form-label">Description</label>
							<textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
							@error('description')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="additional_information" class="col-form-label">Additional Information</label>
							<textarea class="form-control" id="additional_information" name="additional_information">{{old('additional_information')}}</textarea>
							@error('additional_information')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="meta_title" class="col-form-label">Meta Title </label>
							<input id="meta_title" type="text" name="meta_title" placeholder="Enter Meta Title" value="{{old('meta_title')}}" class="form-control">
							@error('meta_title')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="meta_keyword" class="col-form-label">Meta Keyword </label>
							<input id="meta_keyword" type="text" name="meta_keyword" placeholder="Enter Meta Keyword" value="{{old('meta_keyword')}}" class="form-control">
							@error('meta_description')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="meta_description" class="col-form-label">Meta Description</label>
							<textarea class="form-control" id="meta_description" name="meta_description">{{old('meta_description')}}</textarea>
							@error('meta_description')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<label for="color"> Upload Size Wise Images</label>
					<div class="repeater mt-repeater sizeWiseImage">
						<div data-repeater-list="sizeWiseImage_group">
							<div class="row" data-repeater-item>

								<div class="form-group col-md-2">
									<label>flavours<span class="text-danger">*</span></label>
									<select name="flavours" class="form-control" required>
										<option value="">Select Flavours</option>
										@foreach($flavours as $key=>$item)
										<option value='{{$item->id}}'>{{$item->name}}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group col-md-2">
									<label>Size<span class="text-danger">*</span></label>
									<select name="sizes" class="form-control" required>
										<option value="">Select Size</option>
										@foreach($sizes as $key=>$attribute)
										<option value='{{$attribute->id}}'>{{$attribute->name}}</option>
										@endforeach
									</select>
								</div>
								
								<div class="form-group col-md-2">
									<label>Images<span class="text-danger">*</span></label>
									<input class="form-control imageUploader" type="file" id="images" name="images[image]" value="{{ old('images') }}" multiple>
								</div>

								<div class="form-group col-md-2">
									<label for="stock_quantities">Stock Quantity <span class="text-danger">*</span></label>
									<input id="stock_quantities" type="number" name="stock_quantities" min="0" placeholder="Enter Stock quantity" value="{{ old('stock_quantities') }}" class="form-control" required>
								</div>

								<div class="form-group col-md-2">
									<label for="price">MRP Price<span class="text-danger">*</span></label>
									<input id="price" type="number" name="price" min="0" placeholder="Price" value="{{ old('price') }}" class="form-control" required>
								</div>

								<div class="form-group col-md-1">
									<label for="sale_price">Sale Price <span class="text-danger">*</span></label>
									<input id="sale_price" type="number" name="sale_price" min="0" placeholder="Sale Price" value="{{ old('sale_price') }}" class="form-control" required>
								</div>

								<div class="form-group col-md-1">
									<label>Delete :</label>
									<input data-repeater-delete type="button" value="Delete"
										class="form-control btn btn-secondary delete-button" />
								</div>
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input data-repeater-create type="button" value="+ Add More" id="color_repeater-button"
									class="form-control btn btn-primary" />
							</div>
						</div>
					</div>
				</div>

				<br>
				<br>

				<div class="row">     
					<div class="col-md-4">
					<div class="form-group">
						<label>Featured or Not</label>
						<div class="form-check form-check-primary">
						<label class="form-check-label">
							<input type="checkbox" id="is_featured" name="is_featured" class="form-check-input" value="1">Is Featured ? <i class="input-helper"></i>
						</label>
						</div>
					</div>
					</div>
					<div class="col-md-4">
					<div class="form-group">
						<label>New or Old</label>
						<div class="form-check form-check-primary">
						<label class="form-check-label">
							<input type="checkbox" id="is_new" name="is_new" class="form-check-input" value="1">Is New ? <i class="input-helper"></i>
						</label>
						</div>
					</div>
					</div>
					<div class="col-md-4">
					<div class="form-group">
						<label>Best Seller or Not</label>
						<div class="form-check form-check-primary">
						<label class="form-check-label">
							<input type="checkbox" id="is_bestsellers" name="is_bestsellers" class="form-check-input" value="1">Is Bestsellers ? <i class="input-helper"></i>
						</label>
						</div>
					</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
							<select name="status" class="form-control">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
							</select>
							@error('status')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
					</div>
				</div>

				<br>
				<br>

				<div class="form-group mb-3 text-center">
					<button type="reset" class="btn btn-warning">Reset</button>
					<button class="btn btn-success" type="submit">Submit</button>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/bootstrap-select.css')}}" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<!-- <script src="{{asset('backend/js/bootstrap-select.min.js')}}"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('backend/js/bootstrap-select.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $('.sizeWiseImage').repeater({
			isFirstItemUndeletable: true,
		});
    });
</script>
<script>
  $(document).ready(function() {
    // Select2 initialization code here
    $('.related_productsClass').select2({
    	placeholder: 'Select Product' // Replace with your desired placeholder text
  	});
  });
</script>

<script>
  $('.sizeWiseImage input').on('focus keyup', function() {
      $('.sizeWiseImage input').attr("required", true);
    });

	$('#lfm').filemanager('image');

	$(document).ready(function() {
		var count = 1;

		$('#addNewProduct').on('click', function(e) {
			var copyContent = $("#multiple").clone();
			copyContent.find('.bootstrap-select').replaceWith(function() {
				return $('select', this);
			})
			copyContent.find('.selectpicker').selectpicker('render');
			$('.parentDiv').append(copyContent);
			//$('.multipleClone').append($('.multiple').html());

			// var size = $('select[id^="size"]:last');

			// // Read the Number from that DIV's ID (i.e: 3 from "klon3")
			// // And increment that number by 1
			// var num = parseInt( size.prop("id").match(/\d+/g), 10 ) +1;

			// // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
			// var $klon = $div.clone().prop('id', 'klon'+num );

			// // Finally insert $klon wherever you want
			// $div.after( $klon.text('klon'+num) );       
		});

		$('#addNewProductImages').on('click', function(e) {
			var copyContent = $("#multipleColorImage").clone();
			copyContent.find('.imageUploader').attr({
				name: "images[" + count + "][]"
			});
			copyContent.find('.bootstrap-select').replaceWith(function() {
				return $('select', this);
			})
			copyContent.find('.selectpicker').selectpicker('render');
			$('.parentColorDiv').append(copyContent);
			count++;
		});

		$('#meta_description').summernote({
			placeholder: "Write meta description.....",
			tabsize: 2,
			height: 100
		});

	});

	$(document).ready(function() {
		$('#description').summernote({
			placeholder: "Write detail description.....",
			tabsize: 2,
			height: 150
		});
		$('#additional_information').summernote({
			placeholder: "Write detail information.....",
			tabsize: 2,
			height: 150
		});
	});
	$('select').selectpicker();
</script>

<script>
	$('#cat_id').change(function() {
		var cat_id = $(this).val();
		// alert(cat_id);
		if (cat_id != null) {
			// Ajax call
			$.ajax({
				url: "/admin/category/" + cat_id + "/child",
				data: {
					_token: "{{csrf_token()}}",
					id: cat_id
				},
				type: "POST",
				success: function(response) {
					if (typeof(response) != 'object') {
						response = $.parseJSON(response)
					}
					// console.log(response);
					var html_option = "<option value=''>----Select sub category----</option>"
					if (response.status) {
						var data = response.data;
						// alert(data);
						if (response.data) {
							$('#child_cat_div').removeClass('d-none');
							$.each(data, function(id, title) {
								html_option += "<option value='" + id + "'>" + title + "</option>"
							});
						} else {}
					} else {
						$('#child_cat_div').addClass('d-none');
					}
					$('#child_cat_id').html(html_option);
				}
			});
		} else {}
	})
</script>
@endpush
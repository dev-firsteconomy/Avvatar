@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header" style="background: #4d72df;color: white;">Edit Product</h5>
        <div class="card-body">
            <form method="post" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PATCH')
                <div class="row">

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="category_id" class="col-form-label">Select Category <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="category_id" id="">
                                <option value="" selected>Select Category</option>
                                @foreach ($categories as $category_id => $category)
                                <option {{ (($product->category_id == $category_id) ? 'selected' : '' ) }}
                                    value="{{ $category_id }}"> {{ $category }} </option>
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
                            <input id="name" type="text" name="name" placeholder="Enter Name"
                                value="{{ old('name') ? old('name') : $product->name }}" class="form-control">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="hsn" class="col-form-label">HSN <span class="text-danger">*</span></label>
                            <input id="hsn" type="text" name="hsn" placeholder="Enter HSN"
                                value="{{ old('hsn') ? old('hsn') : $product->hsn }}" class="form-control">
                            @error('hsn')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="min_qty" class="col-form-label">Minimum Order Quantity <span
                                    class="text-danger">*</span></label>
                            <input id="min_qty" type="number" name="min_qty" min="0"
                                placeholder="Enter Minimum Order Quantity"
                                value="{{ old('min_qty') ? old('min_qty') : $product->min_qty }}" class="form-control">
                            @error('min_qty')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tag" class="col-form-label">Tag <span class="text-danger">*</span></label>
                            <input id="tag" type="text" name="tag" placeholder="Enter tag"
                                value="{{ old('tag') ? old('tag') : $product->tag }}" class="form-control">
                            @error('tag')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="related_products" class="col-form-label">related_products</label>
                            <select name="related_products[]" id="related_products"
                                class="form-control related_productsClass" multiple>

                                @foreach($related_products as $key=>$rproduct)
                                <option value="{{$rproduct->id}}"
                                    {{ !empty($relatedProductsList) && in_array($rproduct->id, $relatedProductsList) ? 'selected':'' }}>
                                    {{$rproduct->name}}</option>
                                @endforeach
                            </select>
                            @error('related_products')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="col-form-label">Product Description</label>
                            <textarea class="form-control" id="description"
                                name="description">{{ old('description') ? old('description') : $product->description }}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                @if(isset($product->productProtein))
                <div class="col-md-12">
                    <label for="color"> Protein Level</label>
                    <div class="row">
                        <div class="form-group col-md-2">Protein Name</div>
                        <div class="form-group col-md-3">Value</div>
                        <div class="form-group col-md-2">Description</div>
                    </div>
                    @foreach($product->productProtein as $proteinsItem)
                    <div class="repeater mt-repeater">
                        <div data-repeater-list="protein_group">
                            <div class="row" data-repeater-item>
                                <div class="form-group col-md-2">
                                    <select name="proteins[]" class="form-control" required>
                                        <option value="">Select Protein Name</option>
                                        @foreach($proteins as $key=>$attribute)
                                        <option value="{{$attribute->id}}" {{ ($proteinsItem->protein_id == $attribute->id) ? 'selected' : ''  }}>{{$attribute->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <input id="protein_value" type="text" name="protein_value[]" min="0"
                                        placeholder="Protein Value" value="{{ $proteinsItem->protein_value }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <input id="description" type="text" name="description[]" min="0"
                                        placeholder="Short Description" value="{{ $proteinsItem->description }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group col-md-1">
                                    <input data-repeater-delete type="button" value="Delete"
                                        class="form-control btn btn-secondary delete-button" />
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input data-repeater-create type="button" value="+ Add More" id="protein-button"
                                    class="form-control btn btn-primary" />
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>
                <div class="col-md-12">
                    <label for="color"> Protein Level</label>
                    <div class="repeater mt-repeater proteinlevel_group">
                        <div data-repeater-list="protein_group">
                            <div class="row" data-repeater-item>
                                <div class="form-group col-md-2">
                                    <select name="proteins" class="form-control" required>
                                        <option value="">Select Protein Name</option>
                                        @foreach($proteins as $key=>$attribute)
                                        <option value='{{$attribute->id}}'>{{$attribute->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <input id="protein_value" type="text" name="protein_value" min="0"
                                        placeholder="Protein Value" value="{{ old('protein_value') }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <input id="description" type="text" name="description" min="0"
                                        placeholder="Short Description" value="{{ old('description') }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group col-md-1">
                                    <input data-repeater-delete type="button" value="Delete"
                                        class="form-control btn btn-secondary delete-button" />
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input data-repeater-create type="button" value="+ Add More" id="protein_repeater-button"
                                    class="form-control btn btn-primary" />
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="col-md-12">
                        <label for="color"> Protein Level</label>
                        <div class="repeater mt-repeater proteinlevel_group">
                            <div data-repeater-list="protein_group">
                                <div class="row" data-repeater-item>

                                    <div class="form-group col-md-2">
                                        <label>Size<span class="text-danger">*</span></label>
                                        <select name="proteins" class="form-control" required>
                                            <option value="">Select Protein Name</option>
                                            @foreach($proteins as $key=>$attribute)
                                            <option value='{{$attribute->id}}'>{{$attribute->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="protein_value">Value<span class="text-danger">*</span></label>
                                        <input id="protein_value" type="text" name="protein_value" min="0"
                                            placeholder="Protein Value" value="{{ old('protein_value') }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="description">Description <span class="text-danger">*</span></label>
                                        <input id="description" type="text" name="description" min="0"
                                            placeholder="Short Description" value="{{ old('description') }}"
                                            class="form-control" required>
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
                @endif

				<div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nutrition_images" class="col-form-label">Nutrition Images </label>
                            <input type="file" class="form-control" id="nutrition_images" name="nutrition_images[]" multiple>
                            @error('nutrition_images')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            @foreach($product->productNutrition as $nutrition_image)
                                <img src="{{ asset($nutrition_image->image) }}" alt="" style="height:100px;width:100px" >
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="faq" class="col-form-label">FAQ</label>
                            <textarea class="form-control" id="faq"
                                name="faq">{{ old('faq') ? old('faq') : $product->faq }}</textarea>
                            @error('faq')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="meta_title" class="col-form-label">Meta Title </label>
                            <input id="meta_title" type="text" name="meta_title" placeholder="Enter Meta Title"
                                value="{{ old('meta_title') ? old('meta_title') : $product->meta_title }}"
                                class="form-control">
                            @error('meta_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="meta_keyword" class="col-form-label">Meta Keyword </label>
                            <input id="meta_keyword" type="text" name="meta_keyword" placeholder="Enter Meta Keyword"
                                value="{{ old('meta_keyword') ? old('meta_keyword') : $product->meta_keyword }}"
                                class="form-control">
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
                            <textarea class="form-control" id="meta_description"
                                name="meta_description">{{ old('meta_description') ? old('meta_description') : $product->meta_description }}</textarea>
                            @error('meta_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                @if(isset($product->sizesstock))
                <div class="col-md-12">
                    <label for="color"> Size Wise Images</label>
                    <div class="row">
                        <div class="form-group col-md-2">Size</div>
                        <div class="form-group col-md-3">Image</div>
                        <div class="form-group col-md-2">Stock Qty</div>
                        <div class="form-group col-md-2">Price</div>
                        <div class="form-group col-md-2">Sale Price</div>
                    </div>
                    @foreach($product->sizesstock as $k=>$item)
                    <div class="repeater mt-repeater existRecord">
                        <div data-repeater-list="updateSizeWiseImage_group">
                            <div class="row" data-repeater-item>

                                <div class="form-group col-md-2">
                                    <select name="sizes[]" class="form-control" required>
                                        <option value="">Select Size</option>
                                        @foreach($sizes as $key=>$attribute)
                                        <option value="{{ $attribute->id }}"
                                            {{ ($item->size_id == $attribute->id) ? 'selected' : ''  }}>
                                            {{$attribute->name}} Kg</option>
                                        @endforeach
                                    </select>
                                </div>

                                

                                <div class="form-group col-md-2">
                                    <input type="text" name="stock_qty[]" value="{{ $item->stock_qty }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group col-md-2">
                                    <input type="text" name="price[]" value="{{ $item->price }}" class="form-control"
                                        required>
                                </div>

                                <div class="form-group col-md-2">
                                    <input type="text" name="sale_price[]" value="{{ $item->sale_price }}"
                                        class="form-control" required>
                                </div>

                                <div class="form-group col-md-1">
                                    <input type="button" value="X" class="form-control btn btn-danger DealeteRecord"
                                        data-id="{{ $item->id }}" />
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>
                <div class="col-md-12">
                    <div class="repeater mt-repeater sizeWiseImage">
                        <div data-repeater-list="sizeWiseImage_group">
                            <div class="row" data-repeater-item>

                                <div class="form-group col-md-2">
                                    <!-- <label>Size<span class="text-danger">*</span></label> -->
                                    <select name="sizes" class="form-control">
                                        <option value="">Select Size</option>
                                        @foreach($sizes as $key=>$attribute)
                                        <option value="{{$attribute->id}}">{{$attribute->name}} Kg</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <!-- <label>Images<span class="text-danger">*</span></label> -->
                                    <input class="form-control imageUploader" type="file" id="images"
                                        name="images[image]" value="{{ old('images') }}" multiple>
                                </div>

                                <div class="form-group col-md-2">
                                    <!-- <label for="stock_quantities">Stock Quantity <span class="text-danger">*</span></label> -->
                                    <input id="stock_quantities" type="number" name="stock_quantities" min="0"
                                        placeholder="Enter Stock quantity" value="{{ old('stock_quantities') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group col-md-2">
                                    <!-- <label for="price">MRP Price<span class="text-danger">*</span></label> -->
                                    <input id="price" type="number" name="price" min="0" placeholder="Price"
                                        value="{{ old('price') }}" class="form-control">
                                </div>

                                <div class="form-group col-md-2">
                                    <!-- <label for="sale_price">Sale Price <span class="text-danger">*</span></label> -->
                                    <input id="sale_price" type="number" name="sale_price" min="0"
                                        placeholder="Sale Price" value="{{ old('sale_price') }}" class="form-control">
                                </div>

                                <div class="form-group col-md-1">
                                    <!-- <label>Delete :</label> -->
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
                @else
                <br>
                <div class="col-md-12">
                    <label for="color">Upload Size Wise Images</label>
                    <div class="row">
                        <div class="form-group col-md-2">Size</div>
                        <div class="form-group col-md-3">Image</div>
                        <div class="form-group col-md-2">Stock Qty</div>
                        <div class="form-group col-md-2">MRP Price</div>
                        <div class="form-group col-md-2">Selling Price</div>
                        <div class="form-group col-md-1">Delete</div>
                    </div>

                    <div class="repeater mt-repeater sizeWiseImage">
                        <div data-repeater-list="sizeWiseImage_group">
                            <div class="row" data-repeater-item>

                                <!-- <div class="form-group col-md-2">
										<label>flavours<span class="text-danger">*</span></label>
										<select name="flavours" class="form-control">
											<option value="">Select Flavours</option>
											@foreach($flavours as $key=>$item)
											<option value='{{$item->id}}'>{{$item->name}}</option>
											@endforeach
										</select>
									</div> -->

                                <div class="form-group col-md-2">
                                    <!-- <label>Size<span class="text-danger">*</span></label> -->
                                    <select name="sizes" class="form-control">
                                        <option value="">Select Size</option>
                                        @foreach($sizes as $key=>$attribute)
                                        <option value="{{$attribute->id}}">{{$attribute->name}} Kg</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <!-- <label>Images<span class="text-danger">*</span></label> -->
                                    <input class="form-control imageUploader" type="file" id="images"
                                        name="images[image]" value="{{ old('images') }}" multiple>
                                </div>

                                <div class="form-group col-md-2">
                                    <!-- <label for="stock_quantities">Stock Quantity <span class="text-danger">*</span></label> -->
                                    <input id="stock_quantities" type="number" name="stock_quantities" min="0"
                                        placeholder="Enter Stock quantity" value="{{ old('stock_quantities') }}"
                                        class="form-control">
                                </div>

                                <div class="form-group col-md-2">
                                    <!-- <label for="price">MRP Price<span class="text-danger">*</span></label> -->
                                    <input id="price" type="number" name="price" min="0" placeholder="Price"
                                        value="{{ old('price') }}" class="form-control">
                                </div>

                                <div class="form-group col-md-2">
                                    <!-- <label for="sale_price">Sale Price <span class="text-danger">*</span></label> -->
                                    <input id="sale_price" type="number" name="sale_price" min="0"
                                        placeholder="Sale Price" value="{{ old('sale_price') }}" class="form-control">
                                </div>

                                <div class="form-group col-md-1">
                                    <!-- <label>Delete :</label> -->
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
                @endif

                <br>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Featured or Not</label>
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" id="is_featured" name="is_featured" class="form-check-input"
                                        value="1" {{isset($product) && $product->is_featured == 1 ? 'checked' : '' }}>Is
                                    Featured ? <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>New or Old</label>
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" id="is_new" name="is_new" class="form-check-input" value="1"
                                        {{isset($product) && $product->is_new == 1 ? 'checked' : '' }}>Is New ? <i
                                        class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Best Seller or Not</label>
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" id="is_bestsellers" name="is_bestsellers"
                                        class="form-check-input" value="1"
                                        {{isset($product) && $product->is_bestsellers == 1 ? 'checked' : '' }}>Is
                                    Bestsellers ? <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1" {{$product->status == 1 ? 'selected':''}}>Active</option>
                                <option value="0" {{$product->status == 0 ? 'selected':''}}>Inactive</option>
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
<!-- Sweet Alert  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<!-- <script src="{{asset('backend/js/bootstrap-select.min.js')}}"></script> -->
<!-- Sweet Alert  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('backend/js/bootstrap-select.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script>
$.noConflict();
jQuery(document).ready(function($) {
    $('.sizeWiseImage').repeater({
        isFirstItemUndeletable: true,
    });
    $('.proteinlevel_group').repeater({
        isFirstItemUndeletable: true,
    });
});
</script>
<script>
$('.sizeWiseImage input').on('focus keyup', function() {
    //   $('.sizeWiseImage input').attr("required", true);
    var inputValue = $(this).val();
    if (inputValue.length > 0) {
        $('.sizeWiseImage input').attr('required', true);
    } else {
        $('.sizeWiseImage input').removeAttr('required', true);
    }
});

$('#lfm').filemanager('image');

$(document).ready(function() {
    $('.related_productsClass').select2({
        placeholder: 'Select Product'
    });
    $('#meta_description').summernote({
        placeholder: "Write meta description.....",
        tabsize: 2,
        height: 100
    });
    $('#description').summernote({
        placeholder: "Write detail description.....",
        tabsize: 2,
        height: 150
    });
    $('#faq').summernote({
        placeholder: "Write detail information.....",
        tabsize: 2,
        height: 150
    });
    $('.DealeteRecord').on('click', function() {
        var data_id = $(this).data('id');
        var closeClass = $(this).closest('.existRecord');

        if (data_id != null || data_id != '') {
            swal("You Really Want To Delete?", {
                    buttons: {
                        cancel: "Cancel",
                        confirm: {
                            text: "Yes",
                            value: "Yes",
                        },
                    },
                })
                .then((value) => {
                    if (value == "Yes") {
                        $.ajax({
                            method: "POST",
                            url: "/admin/product/deleteVariation",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: data_id,
                            },
                            success: function(response) {
                                if (response == 1) {
                                    closeClass.remove();
                                    sweetAlert("Reoved", "Remove Successfully",
                                        "success");
                                } else {
                                    sweetAlert("Error", "Something Went Wrong",
                                    "error");
                                }
                            }
                        });
                    } else {
                        sweetAlert("Cancel", "You Cancel The Task", "error");
                    }
                });
        }
    });

});
$('select').selectpicker();
</script>

@endpush
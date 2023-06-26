<?php
    $appendingString = '';
?>
<div class="toolbox">
<div class="toolbox-left">
        <div class="toolbox-info">
            Showing <span>{{@$products->count}}</span> Products
        </div>
    </div>

    <div class="toolbox-right">   
    <div class="show-sidebar-btn"><span>Filter</span></div>     
        <div class="toolbox-sort">
            
            <label for="sortby">Sort by:</label>
            <div class="select-custom">
                <select name="sortby" id="sortby" class="form-control filterBySort">
                    <option value="">Select Options</option>
                    <option value="latest" {{isset($value) && $value=='latest' ? 'selected':''}}>What's New</option>
                    <option value="discount"  {{isset($value) && $value=='discount' ? 'selected':''}}>Better Discount</option>
                    <option value="high"  {{isset($value) && $value=='high' ? 'selected':''}}>Price: High to Low</option>
                    <option value="low"  {{isset($value) && $value=='low' ? 'selected':''}}>Price: Low to High</option>
                </select>
            </div>
        </div><!-- End .toolbox-sort -->
    </div><!-- End .toolbox-right -->
</div><!-- End .toolbox -->

<div class="products mb-3">
    <div class="row">
        @if(isset($products) && $products->isNotEmpty())
            @foreach($products as $product)
                    <div class="col-6 col-md-4 col-lg-4">
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
                                <a href="{{route('product',$product->slug). $appendingString}}">
                                    <img src="{{asset($baseImage)}}" alt="{!! $product->meta_description !!}" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    @if(is_user_logged_in())
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">add to wishlist</span></a>
                                    @else
                                        <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" data-id="{{$product->id}}" id="wishlist{{$product->id}}"></a>
                                    @endif
                                </div><!-- End .product-action-vertical -->

                            </figure><!-- End .product-media -->
                           
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="javascript:void(0);">AVVATAR {{$product->category->title}}</a>
                                </div><!-- End .product-cat -->
                               
                                <h3 class="product-title"><a href="{{route('product',$product->slug) . $appendingString }}">{{$product->name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <div class="w-100">
                                    <span class="new-price">₹{{round($product->sale_price) }}</span>  @if($product->sale_price != $product->price) <span class="old-price">₹{{round($product->price)}}</span> @endif </div> 
                                    <small>(MRP incl Taxes)</small>
                                </div><!-- End .product-price -->
                                <div class="atc-container">                                                            
                                    <div class="mb-2">
                                        <a href="{{route('product',$product->slug) . $appendingString}}" class="btn-cart" ><span class="product{{$product->id}}">Buy Now</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach  
        @endif      
</div><!-- End .row -->
</div><!-- End .products -->


{{-- <br><br>
<div id="pagination" class="paddingTopBottom-xxl pull-left widthFull">
    <!--$data->appends(@$urlParam)->render()-->
    <span class="pull-left pagination-count">Showing <b>{{$products->firstItem()}} - {{$products->perPage() * $products->currentPage()
        <$products->total() ? $products->perPage() * $products->currentPage() : $products->total()}}/{{$products->total()}}</b>
    </span>
    <span class="pull-right">{!! $products->links() !!}</span>
    <input type="hidden" id="totalCount" value="{{$products->total()}}">
    <input type="hidden" id="sort_column" value= "{{@$column}}">
    <input type="hidden" id="sort_order" value= "{{@$order}}">
</div> --}}
<script>
        $(document).ready(function ()
        {
            $(".show-sidebar-btn").click(function ()
            {
                $("body").addClass("show-hidden-sidebar");
                $(".sidebar-container").addClass("show-hidden-sidebar");
            });
            $(".close-sidebar-btn").click(function ()
            {
                $("body").removeClass("show-hidden-sidebar");
                $(".sidebar-container").removeClass("show-hidden-sidebar");
            });

        });
    </script>
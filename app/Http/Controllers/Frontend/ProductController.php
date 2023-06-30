<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Application;
use App\Models\Laminate;
use App\Models\Texture;
use App\Models\Size;
use App\Models\Fabric;
use App\Models\Color;
use App\Models\ColorPalette;
use App\Models\SizeChart;
Use Alert;
use App\Models\Orientation;
use DB;

class ProductController extends Controller
{

    public function products(Request $request)
    {
        $requestData = $request->all();
        $keyword     = $request->get('search');
        $value       = isset($request->value) ? $request->value : null;

        $count       = Product::where('status','1')->count();


        $products = Product::withCount('user_wishlist') 
                    ->where(function($t) use( $keyword){
                        if(@$keyword)
                        $t->where('name', 'LIKE', "%$keyword%")
                        ->orWhere('slug', 'LIKE', "%$keyword%")
                        ->orWhere('design', 'LIKE', "%$keyword%");
                    })
                    ->where('status','1')->where('is_giftcard',0)->latest()->paginate(12);

        if ($request->ajax()) 
        {   
            return view('frontend.productlisting',['products'=> $products,'value' => $value]);
        }
        else
        {  
            $pageType = 'Shop All Products';
            return view('frontend.products',compact('products','pageType'));
        }
    }



    public function product(Request $request)
    {
        $slug               = $request->slug;
        $currentProduct     = Product::withCount('user_wishlist')->where('slug',$slug)->first();
        $productImages      = $currentProduct->images()->get();
        $allCategoryProduct = Product::where('category_id',$currentProduct->category_id)->orderBy('name')->get();
        $sizes              = $allCategoryProduct->where('name',$currentProduct->name)->pluck('size_id')->toArray();
        // $productSizes       = Size::whereIn('id',$sizes)->get();
        $nutritionImages    = $currentProduct->productNutrition()->get();
        $productProteins    = $currentProduct->productProtein()->get();

        $relatedProducts    = null;
        if(isset($currentProduct->related_products))
        {
            $relatedProducts = unserialize($currentProduct->related_products);
            $relatedProducts = Product::whereIn('id',$relatedProducts)->where('status',1)->get();
        }

        if($request->ajax())
        {   
            return view('frontend.singleProduct', ['currentProduct'=> $currentProduct,'productImages' => $productImages, 'allCategoryProduct' => $allCategoryProduct,'nutritionImages' => $nutritionImages,'relatedProducts' => $relatedProducts,'productProteins' => $productProteins]); 
        }
        else
        {              
            return view('frontend.product',compact('currentProduct','productImages','allCategoryProduct','nutritionImages','relatedProducts','productProteins'));
        }       
    }

    public function filterProduct(Request $request)
    {
        $keyword  = $request->get('search');
        $flag = isset($request->flag) ? $request->flag : null;
        $sizes = isset($request->sizes) ? $request->sizes : null;
        $colors = isset($request->colors) ? $request->colors : null;
        $fabric = isset($request->fabrics) ? $request->fabrics : null;
        $orientations = isset($request->orientations) ? $request->orientations : null;
        $fromPrice = isset($request->fromPrice) ? $request->fromPrice : null;
        $toPrice = isset($request->toPrice) ? $request->toPrice : null;
        $value = isset($request->value) ? $request->value : null;
        $pageType = isset($request->pageType) ? $request->pageType : null;
        $min = isset($request->min) ? $request->min : null;
        $max = isset($request->max) ? $request->max : null;
        $pageValue = isset($request->pageValue) ? $request->pageValue : null;

        $products = Product::withCount('user_wishlist');

        // if($flag == 1)
        // {              
                if($sizes)
                {
                    $products->where(function($r) use( $sizes)
                    {
                        $r->whereHas('sizesstock',function($size) use( $sizes)
                        {
                            $size->whereIn('size_id', $sizes);
                        });   
                    });
                }

                if($colors)
                {
                    $products->where(function($r) use( $colors)
                    {
                        $r->whereHas('sizesstock',function($color) use( $colors)
                        {
                            $color->whereIn('color_id', $colors);
                        });   
                    });
                }

                if($fabric)
                {
                    $products->whereIn('fabric',$fabric);
                }

                if($orientations)
                {  
                    $length = strlen((string)$orientations);
                    $products->where('orientation','like', '%;s:'.$length .':"'.$orientations.'";%' );
                    // $products->map(function($i) use($orientations){
                    //    if($i->orientation)
                    //    {
                    //     $i->orientation = unserialize($i->orientation);
                    //    if (count(array_intersect($i->orientation, $orientations)) === 0) {
                    //         // No values from array1 are in array 2
                    //     } else {
                    //         // There is at least one value from array1 present in array2
                    //     }
                    //    }
                    // });
                }

                if($min)
                {
                    $products->where('price', '>=', $min);
                }

                if($max)
                {
                    $products->where('price', '<=', $max);
                }

                if($pageType != 0)
                {
                    $products->where('category_id',$pageType);
                }

                if($pageValue != 0)
                {
                    $products->whereIn('offer',[$pageValue,3]);
                }
    
                if($value == 'latest')
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->latest()->paginate(12); 
                }
                else if($value == 'discount')
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->orderBy('discount','DESC')->paginate(12); 
                }
                else if($value == 'high')
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->orderBy('price','DESC')->paginate(12); 
                }
                else if($value == 'low')
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->orderBy('price','ASC')->paginate(12); 
                }  
                else
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->paginate(12); 
                }

                
        // }
        // else
        // {   
        //         if($pageType != 0)
        //         {
        //             $products->where('category_id',$pageType);
        //         }
                
        //         if($sizes)
        //         {
        //             $products->where(function($r) use( $sizes)
        //             {
        //                 $r->whereHas('sizesstock',function($size) use( $sizes)
        //                 {
        //                     $size->whereIn('size_id', $sizes);
        //                 });   
        //             });
        //         }

        //         if($colors)
        //         {
        //             $products->where(function($r) use( $colors)
        //             {
        //                 $r->whereHas('sizesstock',function($color) use( $colors)
        //                 {
        //                     $color->whereIn('color_id', $colors);
        //                 });   
        //             });
        //         }

        //         if($fabric)
        //         {
        //             $products->whereIn('fabric',$fabric);
        //         }

        //         if($orientations)
        //         {  
        //             $orientations = serialize($orientations);
        //             $products->where('orientation','like', '%' . $orientations .'%' );
        //         }

        //         if($min)
        //         {
        //             $products->where('price', '>=', $min);
        //         }

        //         if($max)
        //         {
        //             $products->where('price', '<=', $max);
        //         }

        //         $products =  $products->where('status','1')->where('is_giftcard',0)->latest()->paginate(9);    
        // }        

      
      
        // if ($request->ajax()) 
        // {
            //$returnHTML = view('frontend.productlisting',[' products'=> $products])->render();// or method that you prefere to return data + RENDER is the key here
            return view('frontend.productlisting', ['products'=> $products,'value' => $value,'pageValue' => $pageValue]); //response()->json( array('success' => true, 'html'=>$returnHTML) );
        // }
        // else
        // {  
        //     $pageType = 'Shop By Products';
        //     return view('frontend.products',compact('products','pageType','sizes','colors','fabrics','orientations','maxValue'));
        // }
       
        // return view('frontend.products',compact('products'));
    }

    public function filterSingleProduct(Request $request)
    {
        dd($request);
    }
}

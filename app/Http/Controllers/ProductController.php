<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ProductImage;
use App\Models\Texture;
use App\Models\Category;
use App\Models\Laminate;
use App\Models\Attribute;
use App\Models\Thickness;
use App\Models\Color;
use App\Models\Protein;
use App\Models\Size;
use App\Models\Fabric;
use App\Models\ProductProtein;
use App\Models\ProductNutrition;
use App\Models\Flavour;
use App\Models\Orientation;
use App\Models\Application;
use Illuminate\Support\Str;
use App\Models\ColorPalette;
use Illuminate\Http\Request;
use App\Models\Characteristic;
use App\Models\CharacteristicProduct;
use Illuminate\Support\Facades\DB;
use App\Imports\ProductsImport;
use App\Imports\ProductImagesImport;
use App\Imports\ProductStocksImport;
use App\Exports\ProductStocksExport;
use App\Exports\ProductImagesExport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) 
        {
            $products = Product::where('name', 'LIKE', "%$keyword%")
                ->orwhere('slug', 'LIKE', "%$keyword%")
                ->orwhere('description', 'LIKE', "%$keyword%")
                ->orwhere('additional_information', 'LIKE', "%$keyword%")
                ->orwhere('price', 'LIKE', "%$keyword%")
                ->orwhere('design', 'LIKE', "%$keyword%")
                ->orwhere('hsn', 'LIKE', "%$keyword%")
                ->latest()->paginate(20);
        } 
        else 
        {
            $products = Product::latest()->paginate(20);
        }

        // $products=Product::latest()->paginate(5);
        // return $products;
        return view('backend.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors          = Color::where('status',1)->get();
        $sizes           = Size::where('status',1)->get();
        $flavours        = Flavour::where('status',1)->get();
        $proteins        = Protein::where('status',1)->get();
        $fabrics         = Fabric::where('status',1)->get();
        $orientations    = Orientation::where('status',1)->get();
        $related_products= Product::orderBy('name')->where('status',1)->get();
        $categories      = Category::pluck('title','id');
        return view('backend.product.create',compact('categories','related_products','colors','sizes','fabrics','orientations','proteins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token','sizeWiseImage_group']);
        // $data=$request->all();
        // dd($request->all());

        $this->validate($request,[  
             'category_id'=>'required',
             'name'=>'required',
             'hsn'=>'required',
             'min_qty'=>'required',
             'tag'=>'required',
             'description'=>'required',
             'faq'=>'required',
             'status'=>'required',
        ]);

        $slug = Str::slug($request->name);
        $count= Product::where('slug',$slug)->count();
        if($count>0)
        {
            $slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
        }

        $data['slug']=$slug;
        $data['title']=$request->name;
        $data['is_featured']=$request->input('is_featured',0);
        $data['is_new']=$request->input('is_new',0);
        $data['is_bestsellers']=$request->input('is_bestsellers',0);
        // $data['related_products']=$request->related_products;
        $data['related_products']=@$request->related_products && count($request->related_products) ? serialize($request->related_products) :null;
        
       
        DB::beginTransaction();
        try
        {
           $product = Product::create($data);

           if(!empty($request->nutrition_images))
           {
               if(file_exists($request['nutrition_images'][0]))
               {
                   foreach($request['nutrition_images'] as $imageItem)
                   {
                       $image = time() . '_'. $imageItem->getClientOriginalName();
                       $path = public_path('/images/nutrition_images');
                       
                       if (!File::isDirectory($path)) 
                       {
                           File::makeDirectory($path, 0777, true, true);
                       }
                       $imageItem->move($path,$image);
                       $fileName = '/images/nutrition_images/'.$image;

                       ProductNutrition::create([
                           'product_id' =>$product->id,
                           'image'=> $fileName
                       ]);
                   }
               }
           }

           if($request->protein_group != null)
           {
               $protein_group = $request->protein_group;
               $this->store_proteinLevel($protein_group,$product);
           }

           if($request->sizeWiseImage_group != null)
           {
               $sizeWiseImage_group = $request->sizeWiseImage_group;
               $this->store_images($sizeWiseImage_group,$product);
           }

           

            if($product)
            {
                request()->session()->flash('success','Product Successfully added');
            }
            else
            {
                request()->session()->flash('error','Please try again!!');
            }

            DB::commit();
            return redirect()->route('product.index');
        }
        catch(exception $e)
        {
            DB::rollback();
            dd($e);
        }    
    }

    public function store_proteinLevel($protein_group,$product)
    {
        foreach($protein_group as $item)
        { 
            if($item['proteins'] !== null && $item['description'] !== '' && $item['protein_value'] !== null) 
            {
                $protein_id = (int)$item['proteins'];
                $protein_value = $item['protein_value'];
                $description = $item['description'];

                ProductProtein::create([
                    'product_id'=> $product->id,
                    'protein_id'=> $protein_id,
                    'protein_value'=> $protein_value,
                    'description'=> $description,
                ]);
            }
        }
    }

    public function store_images($sizeWiseImage_group,$product)
    {
        foreach($sizeWiseImage_group as $item)
        { 
            if($item['sizes'] !== null && $item['sizes'] !== '' && $item['stock_quantities'] !== null) 
            {
                $size_id = (int)$item['sizes'];
                $price = (int)$item['price'];
                $sale_price = (int)$item['sale_price'];

                ProductStock::create([
                    'product_id'=> $product->id,
                    'size_id'=> $size_id,
                    'price'=> $price,
                    'sale_price'=> $sale_price,
                    'discount' => (($price - $sale_price) / $price) * 100,
                    'stock_qty'=> (int)@$item['stock_quantities'],
                ]);

                if(!empty($item['image']))
                {
                    if(file_exists($item['image'][0]))
                    {
                        foreach($item['image'] as $imageItem)
                        {
                            $image = time() . '_'. $imageItem->getClientOriginalName();
                            $path = public_path('/images/product_images');
                            
                            if (!File::isDirectory($path)) 
                            {
                                File::makeDirectory($path, 0777, true, true);
                            }
                            $imageItem->move($path,$image);
                            $fileName = '/images/product_images/'.$image;

                            ProductImage::create([
                                'product_id' =>$product->id,
                                'size_id'=> $size_id,
                                'image'=> $fileName
                            ]);
                        }
                    }
                }
            }
        }
    }
    
    public function show($id)
    {
        $product=Product::findOrFail($id);
        $relatedProductsList = unserialize($product->related_products);
        $relatedProductsList = Product::whereIn('id',$relatedProductsList)->pluck('name');
        $product_images = DB::table('products')
                ->select('product_images.*')
                ->join('product_stocks', 'products.id', '=', 'product_stocks.product_id')
                ->join('product_images', 'products.id', '=', 'product_images.product_id')
                ->groupBy('products.id', 'products.name', 'product_images.image')
                ->where('products.id', '=' , $id)
                ->get();
        return view('backend.product.show',compact('product','product_images','relatedProductsList'));
    }

  
    public function edit($id)
    {
        $product_images = DB::table('products')
                ->select('product_images.*')
                ->join('product_stocks', 'products.id', '=', 'product_stocks.product_id')
                ->join('product_images', 'products.id', '=', 'product_images.product_id')
                ->groupBy('products.id', 'products.name', 'product_images.image')
                ->where('products.id', '=' , $id)
                ->get();
        
        $product=Product::findOrFail($id);      
        $related_products   = Product::orderBy('name')->where('status',1)->get();
        $relatedProductsList = unserialize($product->related_products);
        $categories         = Category::pluck('title','id');
        $colors             = Color::where('status',1)->get();   
        $sizes              = Size::where('status',1)->get(); 
        $fabrics            = Fabric::where('status',1)->get();   
        $orientations       = Orientation::where('status',1)->get();
        $flavours           = Flavour::where('status',1)->get();

        return view('backend.product.edit',compact('product','relatedProductsList','product_images','flavours','categories','related_products','colors','sizes','fabrics','orientations'));
    }

    
    public function update(Request $request, $id)
    {
        dd("YOU HAVE TO RESOLVE ERRORES FIRST");
        // $data=$request->all();
        $data = $request->except(['_token','sizeWiseImage_group']);
        $product=Product::findOrFail($id);

        $this->validate($request,[  
            'category_id'=>'required',
            'name'=>'required',
            'hsn'=>'required',
            'min_qty'=>'required',
            'tag'=>'required',
            'description'=>'required',
            'additional_information'=>'required',
            'status'=>'required',
       ]);

        $slug = Str::slug($request->name);
        $count= Product::where('slug',$slug)->count();
        if($count>0)
        {
            $slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;

        $data['is_featured']=$request->input('is_featured',0);
        $data['is_new']=$request->input('is_new',0);
        $data['is_bestsellers']=$request->input('is_bestsellers',0);
        $data['related_products']=@$request->related_products && count($request->related_products) ? serialize($request->related_products) :null;
       
        DB::beginTransaction();
        try
        {

           $product->fill($data)->save();
           $product = $product;

            if(!empty($request->sizes))
            {
                foreach($request->sizes as $key => $size)
                {
                    $productStock =  ProductStock::where('product_id', $id)->where('size_id', $size)->first();

                    if($productStock) 
                    {
                        $productStock->update([
                            'product_id' => $id, 
                            'size_id'    => $size,
                            'price'      => $request->price[$key],
                            'sale_price' => $request->sale_price[$key],
                            'discount'   => (($request->price[$key] - $request->sale_price[$key]) / $request->price[$key]) * 100,
                            'stock_qty'  => $request->stock_qty[$key],
                        ]);
                    } 
                    else 
                    {
                    }

                    if(!empty($request->hasFile('images')))
                    {
                        if(file_exists($request['images'][0]))
                        {
                            foreach($request['images'] as $imageItem)
                            {
                                try 
                                {
                                    $image = time() . '_'. $imageItem->getClientOriginalName();
                                    $path = public_path('/images/product_images');
                                    
                                    if (!File::isDirectory($path)) 
                                    {
                                        File::makeDirectory($path, 0777, true, true);
                                    }
                                    $imageItem->move($path,$image);
                                    $fileName = '/images/product_images/'.$image;

                                    $prodImage = new ProductImage;
                                    $prodImage->product_id = (int)$id;
                                    $prodImage->size_id    = (int)$size;
                                    $prodImage->image = $fileName;
                                    $prodImage->save();
                                } 
                                catch (\Exception $e) 
                                {
                                   dd($e);
                                }
                            }
                        }
                    }
                }   
            }

            if($request->sizeWiseImage_group != null)
            {
               $sizeWiseImage_group = $request->sizeWiseImage_group;
               $this->store_images($sizeWiseImage_group,$product);
            }

            if($product)
            {
                request()->session()->flash('success','Product Successfully updated');
            }
            else
            {
                request()->session()->flash('error','Please try again!!');
            }
            
            DB::commit();
            return redirect()->route('product.index');            
        }
        catch(exception $e)
        {
            DB::rollback();
            dd($e);
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteImage(Request $request)
    {
        $id = $request->id;

        $prodImage = ProductImage::findOrFail($id);
        $status = $prodImage->delete();

        if($status)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function deleteVariation(Request $request)
    {
        $id = $request->id;

        $prodVariation = ProductStock::findOrFail($id);
        $productImages = ProductImage::where('size_id',$prodVariation->size_id)->where('product_id',$prodVariation->product_id)->first();

        $variationStatus = $prodVariation->delete();
        $imageStatus = $productImages->delete();

        if($variationStatus && $imageStatus)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();

        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }


    public function edit_characteristics($id)
    {
        $product=Product::findOrFail($id);
        return view('backend.product.edit-characteristics',compact('product'));
    }

    public function viewStock($id)
    {
        $product=Product::findOrFail($id);
        return view('backend.product.viewstock',compact('product'));
    }

    public function update_characteristics(Request $request, $product_id)
    {
        $product=Product::findOrFail($product_id);

        $product->characteristics()->sync(array_keys($request->characteristic_value));

        if(@$request->characteristic_value && count($request->characteristic_value)){

            foreach( $request->characteristic_value as $characteristic_id => $product){

                $data =[
                    'characteristic_value'=>@$request->characteristic_value[$characteristic_id] ,
                    'sort_order'=>@$request->sort_order[$characteristic_id],
                ];


              CharacteristicProduct::
                where('characteristic_id',$characteristic_id )
                ->where('product_id',$product_id )->update( $data);

            }
        }

        request()->session()->flash('success','Product characteristics updated successfully');
        return redirect()->route('product.index');
    }

    public function color_palette_preview($id){

        $color_palette = ColorPalette::with(['color_palette_design','products'=>function ($query) {
            $query->orderBy('pivot_sort_order');
        }])->findOrfail($id);

        return view('backend.product.color_palette_preview',compact('color_palette'));
    }

    public function importProducts()
    {
        return view('backend.product.importproducts');
    }

    public function importProductImages()
    {
        return view('backend.product.importproductimages');
    }

    public function importProductStocks()
    {
        return view('backend.product.importproductstocks');
    }

    public function storeImportProducts(Request $request) 
    {
        if(isset($request) && $request->file('file'))
        {
            $datas = Excel::toArray(new ProductsImport, $request->file('file')); 
        }   
        else
        {
            return redirect()->back()->with('error','Please Enter Valid File');
        } 

        // $datas = Excel::toArray(new ProductsImport, $request->file('file')); 
        dd($datas[0]);
        foreach($datas[0] as $k => $v)
        {  
            if($k != 0)
            { 
                if($v[0] != '')
                {   
                    $product = Product::where('design',$v[2])->first();
                    if(!$product)
                    {               
                        $data['category_id'] = Category::where('title',$v[0])->first()->id;
                        $data['name']        = $v[1];
                        $data['title']       = $v[1];

                        $slug=Str::slug($v[1]);
                        $count= Product::where('slug',$slug)->count();
                        if($count>0)
                        {
                            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
                        }
                
                        $data['slug']        = $slug;
                        $data['hsn']         = $v[2];
                        $data['min_qty']     = $v[3];
                        $data['tag']         = $v[4];
                        $data['description'] = $v[5];
                        $data['additional_information'] = $v[6];
                        $data['meta_title']   = $v[7];
                        $data['meta_keyword'] = $v[8];
                        $data['meta_description'] = $v[9];
                        
                        $relatedProducts = Product::whereIn('name',explode(',',$v[10]))->get()->pluck('id')->toArray();
                        if(count($relatedProducts) > 0)
                        {
                            $relatedProducts = serialize($relatedProducts);
                        }
                        else
                        {
                            $relatedProducts = null;
                        }

                        $data['related_products'] = $relatedProducts;
                        $data['is_featured']      = $v[11];
                        $data['is_new']           = $v[12];
                        $data['is_bestsellers']   = $v[13];
                        $data['status']           = $v[14];
                        

                        // $data['offer']            = $v[20];
                        // $data['is_offer']         = $v[19];
                        // $data['discount']    = $v[7];                
                        // $data['price']       = $v[6];
                        // $data['design']      = $v[2];
                        // $data['fabric']      = Fabric::where('name',$v[4])->first()->id;

                        // $orientations = Orientation::whereIn('name',explode(',',$v[5]))->get()->pluck('id')->toArray();
                        // if(count($orientations) > 0)
                        // {
                        //     $orientations = serialize($orientations);
                        // }
                        // else
                        // {
                        //     $orientations = null;
                        // }
                        // $data['orientation'] = $orientations;
                        // $data['min_qty']     = $v[8];

                        Product::create($data);
                    }    
                    else
                    {
                        $product->category_id = Category::where('title',$v[0])->first()->id;
                        $product->name       = $v[1];
                        $product->title       = $v[1];

                        $slug=Str::slug($v[1]);
                        $count= Product::where('slug',$slug)->count();
                        if($count>0)
                        {
                            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
                        }
                
                        $data['slug']        = $slug;
                        $data['hsn']         = $v[2];
                        $data['min_qty']     = $v[3];
                        $data['tag']         = $v[4];
                        $data['description'] = $v[5];
                        $data['additional_information'] = $v[6];
                        $data['meta_title']   = $v[7];
                        $data['meta_keyword'] = $v[8];
                        $data['meta_description'] = $v[9];
                        
                        $relatedProducts = Product::whereIn('name',explode(',',$v[10]))->get()->pluck('id')->toArray();
                        if(count($relatedProducts) > 0)
                        {
                            $relatedProducts = serialize($relatedProducts);
                        }
                        else
                        {
                            $relatedProducts = null;
                        }

                        $data['related_products'] = $relatedProducts;
                        $data['is_featured']      = $v[11];
                        $data['is_new']           = $v[12];
                        $data['is_bestsellers']   = $v[13];
                        $data['status']           = $v[14];
                        
                        $product->update();
                    }
                }    
            }            
        }

        request()->session()->flash('success','Products successfully imported');
        return redirect('/admin/importProducts');
    }

    public function storeImportProductStocks(Request $request) 
    {
        $datas = Excel::toArray(new ProductStocksImport, $request->file('file')); 
        
        foreach($datas[0] as $k => $v)
        {  
            if($k != 0)
            {   
                if($v[0] != '')
                {  
                    $data['product_id']  = Product::where('name',$v[0])->first()->id;
                    $data['size_id']     = Size::where('name',$v[1])->first()->id;
                    // $data['color_id']    = Color::where('name',$v[2])->first()->id;                
                    $data1['price']  = $v[2];
                    $data1['sale_price']  = $v[3];
                    $data1['stock_qty']  = $v[4];
                    ProductStock::updateOrCreate($data,$data1);
                }    
            }            
        }

        request()->session()->flash('success','Product Stocks successfully imported');
        return redirect('/admin/importProductStocks');
    }

    public function storeImportProductImages(Request $request) 
    {
        $datas = Excel::toArray(new ProductImagesImport, $request->file('file')); 
        
        dd($datas[0]);

        foreach($datas[0] as $k => $v)
        {  
            if($k != 0)
            { 
                if($v[0] != '')
                {  
                    $data['product_id']  = Product::where('name',$v[0])->first()->id;
                    $data['size_id']     = Size::where('name',$v[1])->first()->id;

                    $baseName = pathinfo($v[2]);
                    $baseName = $baseName['basename'];
                    $icon = mt_rand();
                    $filename = $icon . $baseName;
                    File::copy($v[2], public_path('/images/products/'.$filename));  

                    $data['image']       = '/images/products/'.$filename;                
                    ProductImage::create($data);
                }    
            }            
        }

        request()->session()->flash('success','Product Stocks successfully imported');
        return redirect('/admin/importProductImages');
    }

    public function exportStocks(){
        return Excel::download(new ProductStocksExport, 'ProductStocks.xlsx');
    }

    public function exportImages(){
        return Excel::download(new ProductImagesExport, 'ProductImages.xlsx');
    }

    public function exportProducts()
    {
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }
}
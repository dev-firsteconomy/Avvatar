<?php

namespace App\Http\Controllers\Frontend;
use Str;
use Auth;
use App\Models\City;
use App\Models\Category;
use App\Models\State;
use App\Models\Pincode;
use App\Models\Size;
use App\Models\Fabric;
use App\Models\Color;
use App\Models\Orientation;
use App\Models\Texture;
use App\Models\Laminate;
use App\Models\Product;
use App\Models\Catalogue;
use App\Models\Order;
use App\Models\Blog;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Banner;
Use Alert;
use App\Models\CareerFormLead;
use App\Models\CatalogueUserForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use App\Models\Contact;
use Spatie\Newsletter\Newsletter;
use App\Models\SubscribeNewsletter;

use Illuminate\Support\Facades\Mail;
use Seshac\Shiprocket\Shiprocket;
use App\Models\Offer;
class HomeController extends Controller
{   
    // public function __construct()
    // {
    //     $categoriesHeader = Category::where('status',1)->where('show_on_header',1)->get();
    // }

    // protected $categoriesHeader;

    // public function __construct() 
    // {
    //     // Fetch the Site Settings object
    //     $this->categoriesHeader = Category::where('status',1)->where('show_on_header',1)->get();
    //     View::share('categoriesHeader', $this->categoriesHeader);
    // }

    public function testShip(){
        // $orderDetails = [
        //     "order_id" => "224-449",
        //     "order_date"  => "2022-02-24 11:11",
        //     "pickup_location"  => "Primary",
        //     "channel_id" => "",
        //     "comment" =>"Reseller: M/s Goku",
        //     "billing_customer_name" => "Naruto",
        //     "billing_last_name" => "Uzumaki",
        //     "billing_address" => "House 221B, Leaf Village",
        //     "billing_address_2" => "Near Hokage House",
        //     "billing_city" => "New Delhi",
        //     "billing_pincode" => "110002",
        //     "billing_state" => "Delhi",
        //     "billing_country" => "India",
        //     "billing_email" => "naruto@uzumaki.com",
        //     "billing_phone" => "9876543210",
        //     "shipping_is_billing" => false,
        //     "shipping_customer_name"=> "Naruto",
        //     "shipping_last_name"=> "Uzumaki",
        //     "shipping_address" => "House 221B, Leaf Village",
        //     "shipping_address_2" => "Near Hokage House",
        //     "shipping_city"=> "New Delhi",
        //     "shipping_pincode" => "110002",
        //     "shipping_country" => "India",
        //     "shipping_state" =>  "Delhi",
        //     "shipping_email"  => "naruto@uzumaki.com",
        //     "shipping_phone" => "9876543210",
        //     "order_items" => [  
        //         [            
        //         "name" => "Kunai",
        //         "sku" => "chakra123",
        //         "units" => 10,
        //         "selling_price" => "900",
        //         "discount"=> "",
        //         "tax" => "",
        //         "hsn" => 441122   
        //         ]        
        //     ],
        //     "payment_method" => "Prepaid",
        //     "shipping_charges" => 0,
        //     "giftwrap_charges" => 0,
        //     "transaction_charges" => 0,
        //     "total_discount" => 0,
        //     "sub_total" => 9000,
        //     "length" => 10,
        //     "breadth" => 15,
        //     "height"=> 20,
        //     "weight"=> 2.5          
        // ];

        // // $orderDetails = json_encode($orderDetails);
        // $token =  Shiprocket::getToken();
        // $response =  Shiprocket::order($token)->create($orderDetails);
       
        //dd($response);
    }

    public function index(Request $request)
    {
        $banners         = Banner::where('status',1)->latest()->take(5)->get();
        $blogs           = Blog::where('status',1)->latest()->take(3)->get();
        $newArrivals     = Product::where('status','1')->where('is_new',1)->where('stock_quantity','>',0)->latest()->take(5)->get();
        $bestSellers     = Product::where('status','1')->where('is_bestsellers',1)->where('stock_quantity','>',0)->take(5)->latest()->get();
        $featureProducts = Product::where('status','1')->where('is_featured',1)->where('stock_quantity','>',0)->take(5)->latest()->get();
        $categories      = Category::where('status','1')->where('is_parent',1)->where('is_giftcard',0)->orderBy('title','ASC')->get();
        return view('frontend.index',compact('banners','newArrivals','bestSellers','featureProducts','categories','blogs'));
    }

    public function giftcard()
    {   
        $giftcards = Product::where('status','1s')->where('is_giftcard',1)->get();
        return view('frontend.giftcard',compact('giftcards'));
    }

    public function comingSoon(){
        return view('frontend.coming-soon');
    }

    public function dashboard(){
        return view('frontend.dashboard');
    }

  

    public function submitContact(Request $request)
    {   
        $data['name']    = @$request->name;
        $data['mobile']  = @$request->mobile;
        $data['email']   = @$request->email;
        // $data['subject'] = @$request->subject;
        $data['city']    = @$request->city;
        $data['message'] = @$request->message;
        Contact::create($data);
        return redirect()->back()->with('success', 'Thank you for your details! Our team will get in touch with you.');
    }

    public function submitNewsletter(Request $request){

        $isAvailable = SubscribeNewsletter::where('email',$request->newsletterEmail)->first();

        if($isAvailable)
        {
            return 2;
        }
        else
        {
            $data['email'] = $request->newsletterEmail;
            SubscribeNewsletter::create($data);
            $email = $request->newsletterEmail;
        
            Mail::send('mail.email-subs',[], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Welcome to Our Community');
            });
            return 1;
        }
    }

    public function viewOrderDetails()
    {
        $orderId = 78;//Session::get('orderId');
        $order = Order::where('id',$orderId)->first();
        //session()->forget('orderId');
        return view('user.viewOrderDetails',compact('order'));
    }

    public function testOrder()
    {
        $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . public_path('/images/products/backup.sql');
        $returnVar = NULL;
        $output = NULL;
        exec($command, $output, $returnVar);
    }

    public function notFound()
    {
        return view('frontend.404');
    }

    public function faq(){
        return view('frontend.faq');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function whyAvvatar()
    {
        return view('frontend.why-avvatar');
    }
	
	public function aboutus()
    {
        return view('frontend.aboutus');
    }

    public function aboutParagFoods()
    {
        return view('frontend.about-paragfoods');
    }
	
	public function media()
    {
        return view('frontend.media');
    }
	
	public function trackOrder()
    {
        return view('frontend.track-order');
    }
    
	public function blogs(Request $request)
    {
        $blogs = Blog::where('status',1)->latest()->paginate(9);
        return view('frontend.blogs',compact('blogs'));
    }
	
	public function blogDetail($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        $popularBlogs = Blog::where('slug','!=',$slug)->where('is_popular',1)->inRandomOrder()->limit(3)->get();
        $relatedBlogs = Blog::whereIn('id',unserialize($blog->related_blogs))->get();
        return view('frontend.blog-detail',compact('blog','popularBlogs','relatedBlogs'));
    }
    
	public function expertsSpeaks()
    {
        $blogs = Blog::where('status',1)->where('is_expert_speaks',1)->latest()->paginate(9);
        return view('frontend.experts-speaks',compact('blogs'));
    }

	public function fitnessTrends()
    {
        $blogs = Blog::where('status',1)->where('is_trends',1)->latest()->paginate(9);
        return view('frontend.fitness-trends-and-updates',compact('blogs'));
    }
	
	public function authenticate()
    {
        return view('frontend.authenticate');
    }
	
	public function productCategories()
    {
		$categories = Category::where('status','1')->where('is_parent',1)->where('is_giftcard',0)->orderBy('title','ASC')->get();
        return view('frontend.product-categories',compact('categories'));
    }

    public function collaboration(){
        return view('frontend.collaboration');
    }

    public function violation(){
        return view('frontend.violation');
    }

    public function exactnessOfProduct(){
        return view('frontend.exactnessOfProduct');
    }

    public function termsAndCondition(){
        return view('frontend.termsAndCondition');
    }

    public function shipping(){
        return view('frontend.shipping');
    }
    public function returns(){
        return view('frontend.returns');
    }
    public function privacy(){
        return view('frontend.privacy');
    }

    public function cancellation(){
        return view('frontend.cancellation');
    }

    public function payment(){
        return view('frontend.payment');
    }

    public function orderStatus(){
        return view('frontend.orderStatus');
    }

    public function whenReceived(){
        return view('frontend.whenReceived');
    }

    public function incorrectOrder(){
        return view('frontend.incorrectOrder');
    }

    public function discountAndVouchers(){
        return view('frontend.discountAndVouchers');
    }

    public function disclaimerOfGuarantee(){
        return view('frontend.disclaimerOfGuarantee');
    }

    public function getProduct(){
        return view('frontend.single');
    }

    public function offers($slug = null)
    {  
        if($slug)
        {   
            $slug = decrypt($slug);
            if($slug == 'offer1')
            {
                $value = Offer::where('offer_type',1)->where('status',1)->first()->offer_value;
                $pageType = 'Buy 3 flat at Rs. '. round($value);
                $pageValue = '1';
                $products = Product::withCount('user_wishlist')
                ->where('status','1')->where('is_giftcard',0)->where('is_offer',1)->whereIn('offer',[1,3])->latest()->paginate(9);
            }
            else if($slug == 'offer2')
            {
                $value = Offer::where('offer_type',2)->where('status',1)->first()->offer_value;
                $pageType = 'Buy 1 and get the 2nd at '. round($value).' OFF';
                $pageValue = '2';
                $products = Product::withCount('user_wishlist')
                ->where('status','1')->where('is_giftcard',0)->where('is_offer',1)->whereIn('offer',[2,3])->latest()->paginate(9);
            }

            $sizes = Size::where('status',1)->get();
            $colors = Color::where('status',1)->get();  
            $fabrics = Fabric::where('status',1)->get();  
            $orientations = Orientation::where('status',1)->get();   
            $maxValue = Product::where('is_giftcard',0)->max('price');                           

            return view('frontend.products', compact('products','pageType','pageValue','sizes','colors','fabrics','orientations','maxValue'));
        }
        else
        {
            return view('frontend.offers');
        }    
    }

    public function getCategoriesProducts(Request $request,$slug= null)
    {        
        $requestData = $request->all();
        $keyword     = $request->get('search');
        $value       = isset($request->value) ? $request->value : null;

        if($slug)
        {   
            $category = Category::where('slug',$slug)->first();
            $pageType = $category->title;    
            $catId    = $category->id;    

            $products = Product::withCount('user_wishlist')
                        ->where(function($t) use($keyword){
                          if(@$keyword)
                          $t->where('name', 'LIKE', "%$keyword%")
                          ->orWhere('slug', 'LIKE', "%$keyword%");
                        })
                        ->where('status','1')
                        ->where('category_id',$category->id)
                        ->latest()->paginate(12);    
        }
        else
        {
            $products = Product::withCount('user_wishlist')
                        ->where(function($t) use( $keyword){
                        if(@$keyword)
                        $t->where('name', 'LIKE', "%$keyword%")
                        ->orWhere('slug', 'LIKE', "%$keyword%");
                        })
                        ->where('status','1')
                        ->latest()->paginate(12);
        }

        if ($request->ajax()) 
        {
            return view('frontend.productlisting', ['products'=> $products,'value' => $value]); 
        }
        else
        {
            return view('frontend.products', compact('products','pageType'));
        }       
    }

    public function catalogues()
    {
        $catalogues=Catalogue::where('status','1')->orderBy('sort_order','ASC')->get();

        // $catemail = CatalogueUserForm::where('userid',$userid)->first();
         $catemail = null;

        $states = State::where('status',1)->where('status',1)->orderBy('name')->pluck('name','id');
        return view('frontend.pages.catalogue',compact('catalogues','catemail','states'));

    }

    public function save_catalogue_form(Request $request)
    {
        $utm_source = '';
        $utm_campaign = '';
        $utm_medium = '';
        $utm_display = '';
        $requestData = $request->all();

        $contact = $requestData['contact'];
        $requestData['userid'] = Session::get('userid');
        $time = date('Y-m-d');
        $cat = CatalogueUserForm::where('contact',$contact)->where('catalogue_id',$requestData['catalogue_id'])->whereDate('created_at',$time)->count();
        if($cat == 0){
        $catalogform=CatalogueUserForm::create($requestData);


            // $city = City::where('id',$requestData['city_id'])->first();
            // $cityval = $city->name;
			// $state = State::where('id',$requestData['state_id'])->first();
			// $stateval = $state->state_name;
            // $name = $requestData['name'];
            // $mobile = $requestData['contact'];
            // if(!empty($requestData['utm_source'])){
            //  $utm_source = $requestData['utm_source'];
            // }
            // if(!empty($requestData['utm_medium'])){
            //  $utm_medium = $requestData['utm_medium'];
            // }
            // if(!empty($requestData['utm_campaign'])){
            //  $utm_campaign = $requestData['utm_campaign'];
            // }
            // if(!empty($requestData['utm_display'])){
            //  $utm_display = $requestData['utm_display'];
            // }
            // $campaignid = 255;
            // $arrayData = array('first_name'=>$name,'mobile'=>$mobile,'campaign_medium'=>$campaignid,'company_name'=>$cityval,'enquiry_type'=>2,'branch_id'=>1,'city'=>$city->id,'state'=>$city->state_id,'utm_source'=>$utm_source,'utm_campaign'=>$utm_campaign,'utm_medium'=>$utm_medium,'utm_display'=>$utm_display);

            // $url = "https://royaletouche.infi.cf/externalInquirySaveNew";

            //   $ch = curl_init();
            //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //   curl_setopt($ch, CURLOPT_URL, $url);
            //   curl_setopt($ch, CURLOPT_POST, 1);
            //   curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayData);
            //   $data1 = curl_exec($ch);

            //   curl_close($ch);

			//     //microsoft crm code

			// 	$micro_arrayData = array('first_name'=>$name,'mobile'=>$mobile,'city'=>$cityval,'email'=>$requestData['email'],'state'=>$stateval,'utm_source'=>'website','utm_campaign'=>'product_catelogue','utm_medium'=>'','utm_display'=>'','utm_term'=>'','utm_content'=>'','gclid'=>'','fbclid'=>'','form_type'=>'product_catelogue','What you want to revamp?'=>'','page_type'=>'');

			// 	//$micro_url = "https://prod-05.centralindia.logic.azure.com:443/workflows/e7defc5b79d94188bbe42f73dd08bda1/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=XY0tvrFd6KSIMFHzG2N3FuInzgfm1fvGvvTXK1YdMLo";
            //     $micro_url = "https://prod-26.centralindia.logic.azure.com:443/workflows/f554dc4513ee4d1fbe83f508df9f6999/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=dZYjHJuMbNbEswanctpU7qfdLoj2--nYDAjhzoJovKs";
			// 	$ch = curl_init();
			//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// 	curl_setopt($ch, CURLOPT_URL, $micro_url);
			// 	curl_setopt($ch, CURLOPT_POST, 1);
			// 	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($micro_arrayData));
			// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			// 	$micro_data1 = curl_exec($ch);
			// 	//dd($micro_data1);

			// 	curl_close($ch);
				//end of microsoft crm code

        if(isset($catalogform)){

          $catalog=Catalogue::where('id',$requestData['catalogue_id'])->first();
            $requestData['catalogue_id']=$catalog->title;
            $requestData['catalog_file']=$catalog->download_file;
            View::share('requestData', $requestData);
            return json_encode(array('statusCode'=>200,'msg'=>'Thank you!!! We have sent our catalogue via WHATSAPP to your number. Our executive in your city will connect with you soon...'));

         try {
                //    $catalog = preg_replace("|https:\/\/ik.imagekit.io/heccv5isbw\/\s*/*|","",$requestData['catalog_file']);


                //    Mail::send('emails.catlogformuser', $requestData, function ($message) use ($requestData)
                //    {
                //        $message->from('sales@royaletouche.com', 'Royale Touche');
                //        $message->to($requestData['email'])->subject('Greetings from Royale Touche!');
                //        $message->attach($requestData['catalog_file'], [
                //               'as' => $requestData['catalog_id'],
                //               'mime' => 'application/pdf'
                //          ]);
                //    });


                       return json_encode(array('statusCode'=>200,'msg'=>'Thank you!!! We have sent our catalogue via WHATSAPP to your number. Our executive in your city will connect with you soon...'));
            }
            catch (Exception $e)
            {
             return json_encode(array('statusCode'=>200,'msg'=>'Thank you!!! We have sent our catalogue via WHATSAPP to your number. Our executive in your city will connect with you soon...'));
            }

        }else{
        return json_encode(array('statusCode'=>200,'msg'=>'Thank you!!! We have sent our catalogue via WHATSAPP to your number. Our executive in your city will connect with you soon...'));
        }
        }
        else{
        return json_encode(array('statusCode'=>200,'msg'=>'We have already recieved your details. Our team will get in touch with you.'));
        }
    }

    public function selectcity(Request $request){
       // $id = Input::get('state_id');

        $cities=City::where('state_id', $request->state_id)->where('status','1')->orderBy('name')->get();
        $html='';
        $html='<select name="city_id" id="city_id" class="form-control chosen-select-deselect1">
          <option value=""> Select City </option>';
            foreach ($cities as $key => $value) {
               $html.='<option value="'.$value->id.'"';

                $html .= '>'.$value->name.'</option>';
            }


        $html.='</select>';

      echo $html;

    }

    public function selectcity1(Request $request){
        $id = Input::get('state_id');
        $cities=City::where('status',1)->where('state_id',$id)->orderBy('name')->get();
        $html='';
        $html='<select name="city_id" id="city_id" class="form-control chosen-select-deselect1">
          <option value=""> Select City </option>';
            foreach ($cities as $key => $value) {
               $html.='<option value="'.$value->id.'"';

                $html .= '>'.$value->name.'</option>';
            }

        $html.='</select>';

      echo $html;

    }

    public function careers()
    {
        if(Auth::check()){
            $cities = City::where('status',1)->orderBy('name')->pluck('name');
            return view('frontend.pages.careers',compact('cities'));
        }else{
            return redirect('user/login');
        }

    }


    public function save_careers_page_form(Request $request){

        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'contact'=>'string|required|max:10|min:10',
            'email'=>'email',
            'city'=>'string|required|max:30',

        ]);

        $rand= rand();
        $requestData = $request->all();

        if ($request->hasFile('resume')) {
            $filename=Str::slug($requestData['name']).$request->file('resume')->getClientOriginalName();
            $request->resume->move(public_path('/frontend/uploads'), $filename);
            $requestData['resume'] ='/frontend/uploads/'.$filename;

        }
        $career=CareerFormLead::create($requestData);
        if(isset($career)){
            return redirect()->back()->with('success', 'Thank you for your details! Our team will get in touch with you.');

        }else{
        return response('Something went wrong.', 500);
        }

    }

    public function companyprofile()
    {
        return view('comapanyprofile');
    }

    public function royale_touche_brands()
    {
        return view('royale_touche_brands');
    }

    public function achievements()
    {
        return view('achivements');
    }

    public function corporatevideo()
    {
        return view('corporatevideo');
    }

    public function guide(Request $request){

        if($request->applications){
            Session::put('applications',$request->applications);

            $laminates = Laminate::where('status',1)->orderBy('sort_order','asc')->get();
            return view('frontend.pages.guide_laminates',compact('laminates'));
        }

        if($request->laminates){

            Session::put('laminates',$request->laminates);
            
            $textures = Texture::where('status',1)->get();
            return view('frontend.pages.guide_textures',compact('textures'));
        }

        if($request->textures){

            $textures =$request->textures;
            // Session::put('textures',$textures);
            $laminates = Session::get('laminates');
            $applications = Session::get('applications');

            return redirect('products?laminates='.$laminates.'&applications='.$applications.'&textures='.$textures.'');
            

        }


        $applications = Application::where('status',1)->get();
        return view('frontend.pages.guide_applications',compact('applications'));
    }  

    public function contactus()
    {
        return view('contactus');
    }

    public function quality()
    {
        return view('frontend.pages.quality');
    }

    public function blog()
    {
        return view('blog');
    }


    public function downloadimg($img){
        $img ="https://royaletouchene.s3.ap-south-1.amazonaws.com/".$img;
         header("Cache-Control: public");
         header("Content-Description: File Transfer");
         header("Content-Disposition: attachment; filename=" . basename($img));
         header("Content-Type: image/jpeg");
          echo readfile($img);

    }


    public function calculate_fright_charge(Request $request){

        $validator = Validator::make($request->all(),[
            'pincode' => 'required|integer|regex:/\b\d{6}\b/|exists:pincodes,pincode',
        ],[
            'pincode.regex'=>'Please enter a valid 6 digit pincode',
            'pincode.required' => 'The pincode field is required',
            'pincode.exists' => 'Pincode is not exists',
        ]);

       if($validator->fails()){
          return response()->json($validator->messages(), 200);
       }

       $pincode =  Pincode::where('pincode',$request->pincode)->select('freight_charge','pincode','minimum_bundle_qty')->first()->toArray();
        
       $cart_product_qty =  get_cart_product_qty();
       
       for($i=1; $i<=$cart_product_qty; $i++){

        $check = $pincode['minimum_bundle_qty']*$i;
        if($cart_product_qty <=$check){
            $pincode['freight_charge']=$pincode['freight_charge']*$i;
            break;
        }
       }

       Session::put('freight_charge', $pincode );
      return response()->json($pincode , 200);
    }

    public function save_order_note(Request $request){

       Session::put('order_note', $request->order_note );

      return response()->json( 200);

        
    }

  


}

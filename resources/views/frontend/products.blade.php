@extends('layouts.app')
@section('content')
   <style>
    .spinner-wrapper 
             { 
               position: fixed; 
               z-index: 999999; 
               top: 0; right: 0; 
               bottom: 0; left: 0; 
               background: #fff; 
               opacity:0.6;
            } 
            .spinner 
            { 
              position: absolute; 
              top: 50%; 
              /* centers the loading animation vertically one the screen */ 
              left: 50%; 
              /* centers the loading animation horizontally one the screen */ 
              width: 3.75rem; 
              height: 1.25rem; 
              margin: -0.625rem 0 0 -1.875rem; 
              /* is width and height divided by two */ 
              text-align: center; 
            } 
            .spinner > div 
            {
               display: inline-block; 
               width: 1rem; 
               height: 1rem; 
               border-radius: 100%; 
               background-color: #4D4D4D; 
               -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both; 
               animation: sk-bouncedelay 1.4s infinite ease-in-out both; 
             } 
             .spinner .bounce1 
             { 
               -webkit-animation-delay: -0.32s; 
               animation-delay: -0.32s; 
             } 
             .spinner .bounce2         
             { 
               -webkit-animation-delay: -0.16s; 
               animation-delay: -0.16s; 
             }
             @-webkit-keyframes sk-bouncedelay 
             { 
               0%, 80%, 100% 
               { 
                 -webkit-transform: scale(0); 
               } 
               40% 
               { 
                 -webkit-transform: scale(1.0); 
               } 
             } 
             @keyframes  sk-bouncedelay 
             {
                0%, 80%, 100% 
                { 
                  -webkit-transform: scale(0); 
                  -ms-transform: scale(0); 
                  transform: scale(0); 
                } 
                40% 
                { 
                  -webkit-transform: scale(1.0); 
                  -ms-transform: scale(1.0); 
                  transform: scale(1.0); 
                } 
             }
    
    </style>
    
    <div class="spinner-wrapper" id="spinner-wrapper">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <input type="hidden" name="productType" id="productType" value="1">
    <input type="hidden" name="pageValue" id="pageValue" value="{{ isset($pageValue)?$pageValue:0 }}">
        <main class="main">
            @if($pageType == 'Shop By Products' || $pageType == 'Shop By Categories')
             <input type="hidden" name="pageType" id="pageType" value="0">
            @else
             <input type="hidden" name="pageType" id="pageType" value="{{@$catId}}">
            @endif
<!--
            <div class="page-header text-center" style="background-image: url('{{URL::asset('assets/images/page-header-bg.jpg')}}')">
                <div class="container"> 
                    <h1 class="page-title">{{$pageType}}<span>Shop</span></h1>
                </div>
            </div>
-->
           <div class="page-header p-0 text-center">
				<picture>
					<source media="(max-width:767px)" srcset="assets/images/new/about/about-banner.png">
					<source media="(min-width:768px)" srcset="assets/images/new/about/about-banner.png">
					<img src="assets/images/new/about/about-banner.png" class="img-fluid" alt="aboutBanner">
				</picture>
			</div>
            
            
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item " aria-current="page">Product Categories</li>
                        <li class="breadcrumb-item active" aria-current="page">{{$pageType}}</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" id="productListings">
                           
                            @include('frontend.productlisting')
                               
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
            // $(document).ready(function() {
                // $(function() {
                    // $("#slider-range").slider({
                    //     range: true,
                    //     min: 0,
                    //     max: {{$maxValue}},
                    //     values: [ 0, {{$maxValue}} ],
                    //     slide: function( event, ui ) 
                    //     {
                    //         $( "#amount" ).val( "₹" + ui.values[ 0 ] + " - ₹" + ui.values[ 1 ] );
                    //         $('.spinner-wrapper').show();

                    //         var sizes = [];
                    //         var colors = [];
                    //         var fabrics = [];
                    //         var orientations = null;
                    //         var pageType = $('#pageType').val();
                    //         var min = ui.values[0];
                    //         var max = ui.values[1];

                    //         $('*[id*=size-]:visible').each(function() 
                    //         {   
                    //             console.log($(this).is(':checked'));                    
                    //             if($(this).is(':checked'))
                    //             {  
                    //                 sizes.push( $(this).data('id'));
                    //                 //$(this).trigger("change");
                    //             }
                    //         });

                    //         $('*[id*=color-]').each(function() 
                    //         {       
                    //             var isChecked = $(this).is(':checked')?true:false; 
                    //             console.log(isChecked);                 
                    //             if(isChecked)
                    //             {  
                    //                 colors.push($(this).val());
                    //                 //$(this).trigger("change");
                    //             }
                    //         });

                    //         $('*[id*=fabric-]:visible').each(function() 
                    //         {   
                    //             console.log('fabric' ,$(this).is(':checked'));                    
                    //             if($(this).is(':checked'))
                    //             {  
                    //                 fabrics.push( $(this).data('id'));
                    //                 //$(this).trigger("change");
                    //             }
                    //         });

                    //         $('*[id*=orientation-]:visible').each(function() 
                    //         {   
                    //             console.log('o',$(this).is(':checked'));                    
                    //             if($(this).is(':checked'))
                    //             {  
                    //                 orientations = $(this).data('id');
                    //                 //$(this).trigger("change");
                    //             }
                    //         });

                    //         $.ajax({
                    //                 url:"/filter-product",
                    //                 data:{
                    //                     sizes:sizes,
                    //                     colors:colors,
                    //                     fabrics:fabrics,
                    //                     min:min,
                    //                     max:max,
                    //                     orientations:orientations,
                    //                     pageType:pageType
                    //                 },
                    //                 type:"POST",
                    //                 success:function(response)
                    //                 {  
                    //                     $('#productListings').empty().append(response);
                    //                     $('.spinner-wrapper').hide();
                    //                 }
                    //         }); 
                    //     }
                    // });

                    // $( "#amount" ).val( "₹" + $( "#slider-range" ).slider( "values", 0 ) + " - ₹" + $( "#slider-range" ).slider( "values", 1 ) );
                // });
            // });
        </script>
        <script>
         $(document).ready(function() 
          {  
               $('.spinner-wrapper').hide();
               $(document).on('click','.customFilterData', function()
               {  
                    $('.spinner-wrapper').show();
                    if($(this).hasClass("imChecked"))
                    {
                        $(this).removeClass("imChecked");
                        $(this).prop('checked', false);
                    }
                    else
                    {
                        $(this).prop('checked', true);
                        $(this).addClass("imChecked");
                        //colors.push($(this).val());
                    }    
                    filterData();                             
               });

               $(document).on('change','.filterBySort', function()
               {  
                   $('.spinner-wrapper').show();
                   filterData();           
               });

               $(document).on('click', '.pagination a', function(ev) {                   
                    ev.preventDefault();
                    $('.spinner-wrapper').show();
                    var url = $(this).attr('href');   
                
                    var pageValue = $('#pageValue').val();
                    var sizes = [];
                    var colors = [];
                    var fabrics = [];
                    var orientations = null;
                    var price = [];
                    var pageType = $('#pageType').val();
                    var min = 0;
                    var max = "{{@$maxValue}}";
                    var flag = 0;
                    var value = $('.filterBySort').val();                  

                    $('*[id*=size-]:visible').each(function() 
                    {   
                        console.log($(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            sizes.push( $(this).data('id'));
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=color-]').each(function() 
                    {       
                        var isChecked = $(this).is(':checked')?true:false; 
                        console.log(isChecked);                 
                        if(isChecked)
                        {  
                            colors.push($(this).val());
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=fabric-]:visible').each(function() 
                    {   
                        console.log('fabric' ,$(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            fabrics.push( $(this).data('id'));
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=orientation-]:visible').each(function() 
                    {   
                        console.log('o',$(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            orientations = $(this).data('id');
                            //$(this).trigger("change");
                        }
                    });

                    // if(value != '')
                    // {
                    //     $("#slider-range").slider({
                    //         range: true,
                    //         min: 0,
                    //         max: {{$maxValue}},
                    //         values: [ 0, {{$maxValue}} ]
                    //     });   
                        
                    //     $( "#amount" ).val( "₹" + 0 + " - ₹" + {{$maxValue}} ); 

                    //     flag = 1;
                    // }
                    // else
                    // {
                    //     min = $("#slider-range").slider("values")[0];;
                    //     max = $("#slider-range").slider("values")[1];
                    // } 

                    $.ajax({
                        url:url,
                        data:{
                            '_token':"{{ csrf_token() }}",
                            sizes:sizes,
                            colors:colors,
                            fabrics:fabrics,
                            orientations:orientations,
                            pageType:pageType,
                            value:value,
                            min:min,
                            max:max,
                            flag:flag,
                            pageValue:pageValue
                        },
                        type:"POST",
                        success:function(response)
                        {  
                           $('#productListings').empty().append(response);
                           $('.spinner-wrapper').hide();
                        }
                    }); 
                }); 

                                
             function filterData()
             {
                    var sizes = [];
                    var colors = [];
                    var fabrics = [];
                    var orientations = null;
                    var pageType = $('#pageType').val();
                    var value = $('.filterBySort').val(); 
                    var min = 0;
                    var max = "{{@$maxValue}}";
                    var pageValue = $('#pageValue').val();

                    $('*[id*=size-]:visible').each(function() 
                    {   
                        console.log($(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            sizes.push( $(this).data('id'));
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=color-]').each(function() 
                    {       
                        var isChecked = $(this).is(':checked')?true:false; 
                        console.log(isChecked);                 
                        if(isChecked)
                        {  
                            if($(this).hasClass("imChecked"))
                            {
                                colors.push($(this).val());
                                // $(this).removeClass("imChecked");
                                // $(this).prop('checked', false);
                            }
                            else
                            {
                                        $(this).prop('checked', true);
                                        $(this).addClass("imChecked");
                                        colors.push($(this).val());
                            }    
                            
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=fabric-]:visible').each(function() 
                    {   
                        console.log('fabric' ,$(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            fabrics.push( $(this).data('id'));
                            //$(this).trigger("change");
                        }
                    });

                    $('*[id*=orientation-]:visible').each(function() 
                    {   
                        console.log('o',$(this).is(':checked'));                    
                        if($(this).is(':checked'))
                        {  
                            orientations = $(this).data('id');
                            //$(this).trigger("change");
                        }
                    });

                    // if(value != '')
                    // {
                    //     $("#slider-range").slider({
                    //         range: true,
                    //         min: 0,
                    //         max: {{$maxValue}},
                    //         values: [ 0, {{$maxValue}} ]
                    //     });   

                    //     $( "#amount" ).val( "₹" + 0 + " - ₹" + {{$maxValue}} ); 
                    //     // flag = 1;
                    // }
                    // else
                    // {
                    //     min = $("#slider-range").slider("values")[0];;
                    //     max = $("#slider-range").slider("values")[1];
                    // }   

                    $.ajax({
                            url:"/filter-product",
                            data:{
                                sizes:sizes,
                                colors:colors,
                                fabrics:fabrics,
                                orientations:orientations,
                                pageType:pageType,
                                value:value,
                                min:min,
                                max:max,
                                pageValue:pageValue
                            },
                            type:"POST",
                            success:function(response)
                            {  
                               $('#productListings').empty().append(response);
                               $('.spinner-wrapper').hide();
                            }
                    });    
             }
          
          });
        </script>
@endsection
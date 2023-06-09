<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use File;

class MediaController extends Controller
{
    protected $perPage;

    public function __construct(Request $request)
    { 
        $this->perPage = 25;
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $media  = Media::where('media_type', 'LIKE', "%$keyword%")
                ->orwhere('short_desc', 'LIKE', "%$keyword%")
                ->latest()->paginate($this->perPage);
        } else {
            $media = Media::latest()->paginate($this->perPage);
        }
        return view('backend.media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        if($request->media_type == 'Image')
        {
            $this->validate($request,[  
                'media_type'=>'required',
                'thumbnail_image'=>'required',
           ]);
        }
        else if($request->media_type == 'Video')
        {
            $this->validate($request,[  
                'media_type'=>'required',
                'title'=>'required',
                'short_desc'=>'required',
                'date'=>'required',
                'video_link'=>'required',
                'thumbnail_image'=>'required',
           ]);
        }
        else  if($request->media_type == 'News')
        {
            $this->validate($request,[  
                'media_type'=>'required',
                'title'=>'required',
                'short_desc'=>'required',
                'date'=>'required',
                'thumbnail_image'=>'required',
                'news_link'=>'required',
                'news_url'=>'required',
           ]);
        }
        else 
        {
            return redirect()->back()->with('message','Please Choose  Media Type!!');
        }
        
       if(file_exists($request->thumbnail_image))
       {
           $file = $request->thumbnail_image;
           $thumbnail_image = time() . '_'. $file->getClientOriginalName();
           $path = public_path('/images/media/thumbnail_image');
           
           if (!File::isDirectory($path)) 
           {
               File::makeDirectory($path, 0777, true, true);
           }
           $file->move($path,$thumbnail_image);
           $data['thumbnail_image'] = '/images/media/thumbnail_image/'.$thumbnail_image;
       }

       
        $blog = Media::create($data);

        if($blog)
        {
            request()->session()->flash('success','Media Successfully created');
        }else
        {
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('media.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('backend.media.edit',compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        $data = $request->all();
        
        if($request->media_type == 'Image')
        {
            $this->validate($request,[  
                'media_type'=>'required',
           ]);
        }
        else if($request->media_type == 'Video')
        {
            $this->validate($request,[  
                'media_type'=>'required',
                'title'=>'required',
                'short_desc'=>'required',
                'date'=>'required',
                'video_link'=>'required',
           ]);
        }
        else  if($request->media_type == 'News')
        {
            $this->validate($request,[  
                'media_type'=>'required',
                'title'=>'required',
                'short_desc'=>'required',
                'date'=>'required',
                'news_link'=>'required',
                'news_url'=>'required',
           ]);
        }
        else 
        {
            return redirect()->back()->with('message','Please Choose  Media Type!!');
        }

        if(file_exists($request->thumbnail_image))
       {
           $file = $request->thumbnail_image;
           $thumbnail_image = time() . '_'. $file->getClientOriginalName();
           $path = public_path('/images/media/thumbnail_image');
           
           if (!File::isDirectory($path)) 
           {
               File::makeDirectory($path, 0777, true, true);
           }
           $file->move($path,$thumbnail_image);
           $data['thumbnail_image'] = '/images/media/thumbnail_image/'.$thumbnail_image;
       }

        $media->fill($data)->save();

        if($media)
        {
            return redirect()->route('media.index')->with('success','Media Successfully updated'); 
        }
        else
        {
            request()->session()->flash('error','Media try again!!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::find($id);
        $media->delete();
        request()->session()->flash('success','Media Successfully deleted');
    }
}

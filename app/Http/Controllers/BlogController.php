<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use File;
use Str;

class BlogController extends Controller
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
            $blogs  = Blog::where('title', 'LIKE', "%$keyword%")
                ->orwhere('slug', 'LIKE', "%$keyword%")
                ->orwhere('tag', 'LIKE', "%$keyword%")
                ->orwhere('description', 'LIKE', "%$keyword%")
                ->orwhere('short_desc', 'LIKE', "%$keyword%")
                ->latest()->paginate($this->perPage);
        } else {
            $blogs = Blog::latest()->paginate($this->perPage);
        }
        return view('backend.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $related_blogs = Blog::where('status',1)->get();
        return view('backend.blogs.create',compact('related_blogs'));
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
        
        $this->validate($request,[  
            'title'=>'required',
            'description'=>'required',
            'short_desc'=>'required',
            'date'=>'required',
            'tag'=>'required',
            'thumbnail_image'=>'required',
            'image'=>'required',
       ]);

        $slug = Str::slug($request->title);
        $count= Blog::where('slug',$slug)->count();
        if($count>0)
        {
            $slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug'] = $slug;
        $data['is_expert_speaks'] = $request->input('is_expert_speaks',0);
        $data['is_trends']        = $request->input('is_trends',0);
        $data['is_popular']        = $request->input('is_popular',0);
        $data['related_blogs']=@$request->related_blogs && count($request->related_blogs) ? serialize($request->related_blogs) :null;

       if(file_exists($request->thumbnail_image))
       {
           $file = $request->thumbnail_image;
           $thumbnail_image = time() . '_'. $file->getClientOriginalName();
           $path = public_path('/images/blogs/thumbnail_image');
           
           if (!File::isDirectory($path)) 
           {
               File::makeDirectory($path, 0777, true, true);
           }
           $file->move($path,$thumbnail_image);
           $data['thumbnail_image'] = '/images/blogs/thumbnail_image/'.$thumbnail_image;
       }

        if(file_exists($request->image))
        {
            $file = $request->image;
            $image = time() . '_'. $file->getClientOriginalName();
            $path = public_path('/images/blogs');
            
            if (!File::isDirectory($path)) 
            {
                File::makeDirectory($path, 0777, true, true);
            }
            $file->move($path,$image);
            $data['image'] = '/images/blogs/'.$image;

        }

        $blog = Blog::create($data);

        if($blog)
        {
            request()->session()->flash('success','Blog Successfully created');
        }else
        {
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('blogs.index');
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
        $blog = Blog::findOrFail($id);
        $related_blogs   = Blog::orderBy('title')->where('status',1)->get();
        $relatedBlogsList = unserialize($blog->related_blogs);
        return view('backend.blogs.edit',compact('blog','related_blogs','relatedBlogsList'));
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

       $data = $request->all();
        $blog = Blog::findOrFail($id);

        $this->validate($request,[  
            'title'=>'required',
            'description'=>'required',
            'short_desc'=>'required',
            'date'=>'required',
            'tag'=>'required',
       ]);

       $slug = Str::slug($request->title);
       $count= Blog::where('slug',$slug)->count();
       if($count>0)
       {
           $slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
       }
        $data['slug'] = $slug;
        $data['is_expert_speaks'] = $request->input('is_expert_speaks',0);
        $data['is_trends']        = $request->input('is_trends',0);
        $data['is_popular']        = $request->input('is_popular',0);
        $data['related_blogs']=@$request->related_blogs && count($request->related_blogs) ? serialize($request->related_blogs) :null;

        if(file_exists($request->thumbnail_image))
       {
           $file = $request->thumbnail_image;
           $thumbnail_image = time() . '_'. $file->getClientOriginalName();
           $path = public_path('/images/blogs/thumbnail_image');
           
           if (!File::isDirectory($path)) 
           {
               File::makeDirectory($path, 0777, true, true);
           }
           $file->move($path,$thumbnail_image);
           $data['thumbnail_image'] = '/images/blogs/thumbnail_image/'.$thumbnail_image;
       }

        if(file_exists($request->image))
        {
            $file = $request->image;
            $image = time() . '_'. $file->getClientOriginalName();
            $path = public_path('/images/blogs');
            
            if (!File::isDirectory($path)) 
            {
                File::makeDirectory($path, 0777, true, true);
            }
            $file->move($path,$image);
            $data['image'] = '/images/blogs/'.$image;

        }

        $blog->fill($data)->save();

        if($blog)
        {
            return redirect()->route('blogs.index')->with('success','Blog Successfully updated'); 
            // request()->session()->flash('success','Blog Successfully updated');
        }
        else
        {
            request()->session()->flash('error','Blog try again!!');
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
        $blog = Blog::find($id);
        $blog->delete();
        request()->session()->flash('success','Blog Successfully deleted');
    }
}

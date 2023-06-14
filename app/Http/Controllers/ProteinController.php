<?php

namespace App\Http\Controllers;

use App\Models\Protein;
use Illuminate\Http\Request;

class ProteinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proteins =  Protein::where('status',1)->orderBy('name')->paginate(25);
        return view('backend.protein.index')->with('proteins',$proteins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.protein.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|unique:proteins,name' ,
            'status'=>'required'
        ]);
        Protein::create($request->all());
        request()->session()->flash('success','Protein Successfully created');
        return redirect()->route('proteins.index');
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
        $protein = Protein::find($id);
        return view('backend.protein.edit',compact('protein'));
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
        Protein::where('id',$id)->update(['name' =>  $request->name,'status' => $request->status]);
        request()->session()->flash('success','proteins Successfully updated');
        return redirect()->route('proteins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $protein = Protein::findOrfail($id);
        $protein->delete();
        return redirect()->route('protein.index')->with('success', 'Protein deleted!');
    }
}

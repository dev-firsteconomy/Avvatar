<?php

namespace App\Http\Controllers;

use App\Models\Flavour;
use Illuminate\Http\Request;

class FlavourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flavours =  Flavour::where('status',1)->orderBy('name')->paginate(25);
        return view('backend.flavours.index')->with('flavours',$flavours);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.flavours.create');
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
            'name'=>'required|unique:flavours,name' ,
        ]);
        Flavour::create($request->all());
        request()->session()->flash('success','Flavour Successfully created');
        return redirect()->route('flavours.index');
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
        $flavour = Flavour::find($id);
        return view('backend.flavours.edit',compact('flavour'));
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
        Flavour::where('id',$id)->update(['name' =>  $request->name,'status' => $request->status]);
        request()->session()->flash('success','Flavours Successfully updated');
        return redirect()->route('flavours.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flavour = Flavour::findOrfail($id);
        $flavour->delete();
        return redirect()->route('flavours.index')->with('success', 'Flavour deleted!');
    }
}

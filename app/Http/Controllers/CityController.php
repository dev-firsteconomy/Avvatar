<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $cities =  City::where('status',1)->whereHas('state',function($q){
           $q->orderBy('name');
       })->paginate(50);
       return view('backend.city.index')->with('cities',$cities);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::where('status',1)->get();
        return view('backend.city.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        City::create($request->all());
        request()->session()->flash('success','City Successfully created');
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states = State::where('status',1)->get();
        $city = City::find($city->id);
        return view('backend.city.edit',compact('city','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        City::where('id',$city->id)->update(['state_id' => $request->state_id, 'name' =>  $request->name,'status' => $request->status]);
        request()->session()->flash('success','City Successfully updated');
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }

    public function get_cities_by_state_id(Request $request){


       $cities =  City::where('status',1)->where('state_id',$request->state_id)->orderBy('name')->pluck('name','id')->toArray();

        return $cities;
    }
}

<?php

namespace App\Http\Controllers;

use App\Country;
use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //

    public  function  index(){

        $locations=Location::all();

        return view('locations.index',compact('locations'));
    }

    public  function  create(){

        return view('locations.create');
    }

    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',

        ]);


        $update=Location::where('LocationID','=',$id)->update([
            'LocationName'=>$request->input('name'),
        ]);

        if ($update){
            return \redirect()->route('location.index')->
            with('success','Location updated successfully');

        }
    }


    public  function  destroy($id){

        $find=Location::where('LocationID','=',$id);


        if ($find->delete()){

            return \redirect()->route('location.index')->with('success','Location deleted successfully');
        }


    }


    public  function  store( Request $request){

        $request->validate([
            'name'=>'required',
        ]);

        $create=Location::create([

            'LocationName'=>$request->input('name'),

        ]);

        if ($create)

        {
            return \redirect()->route('location.index')->with('success','Location deleted successfully');

        }

    }
    public  function  edit($id){
        $location = Location::where('LocationID','=',$id)->first();

        return view ('locations.edit',compact('location'));

    }

}

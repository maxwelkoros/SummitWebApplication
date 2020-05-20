<?php

namespace App\Http\Controllers;

use App\Country;
use App\Currency;
use App\Industry;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //

    public  function  index(){

        $countries=Country::all();

        return view('countries.index',compact('countries'));
    }

    public  function  create(){

        return view('countries.create');
    }

    public  function  edit($id){
        $country = Country::where('CountryID','=',$id)->first();

        return view ('countries.edit',compact('country'));

    }

    public  function  destroy($id){

        $find=Country::where('CountryID','=',$id);


        if ($find->delete()){

            return \redirect()->route('country.index')->with('success','Country deleted successfully');
        }


    }


    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',

        ]);


        $update=Country::where('CountryID','=',$id)->update([
            'CountryName'=>$request->input('name'),
        ]);

        if ($update){
            return \redirect()->route('country.index')->
            with('success','Currency updated successfully');

        }
    }

    public  function  store( Request $request){

        $request->validate([
            'name'=>'required',
        ]);

        $create=Country::create([

            'CountryName'=>$request->input('name'),

        ]);

        if ($create)

        {
            return \redirect()->route('country.index')->with('success','Currency deleted successfully');

        }

    }


}

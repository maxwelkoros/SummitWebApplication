<?php

namespace App\Http\Controllers;

use App\LanguageList;
use App\Location;
use App\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public  function  index(){

        $specializations=Specialization::all();

        return view('specializationManagement.index',compact('specializations'));
    }

    public  function  create(){

        return view('specializationManagement.create');
    }

    public  function  destroy($id){

        $find=Specialization::where('SpecializationID','=',$id);


        if ($find->delete()){

            return \redirect()->route('specialization.index')->with('success','Location deleted successfully');
        }


    }

    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',

        ]);


        $update=Specialization::where('SpecializationID','=',$id)->update([
            'SpecializationTitle'=>$request->input('name'),
        ]);

        if ($update){
            return \redirect()->route('specialization.index')->
            with('success','Location updated successfully');

        }
    }

    public  function  edit($id){
        $specialization = Specialization::where('SpecializationID','=',$id)->first();

        return view ('specializationManagement.edit',compact('specialization'));

    }


    public  function  store( Request $request){

        $request->validate([
            'name'=>'required',
        ]);

        $create=Specialization::create([

            'SpecializationTitle'=>$request->input('name'),

        ]);

        if ($create)

        {
            return \redirect()->route('specialization.index')->with('success','Location deleted successfully');

        }

    }
}

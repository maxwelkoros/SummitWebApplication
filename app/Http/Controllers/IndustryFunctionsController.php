<?php

namespace App\Http\Controllers;


use App\IndustryFunctions;
use Illuminate\Http\Request;

class IndustryFunctionsController extends Controller
{

    public function index(){

        $industries=IndustryFunctions::all();

        return view('industryFunctions.index',compact('industries'));





    }

    public  function  destroy($id){

        $find=IndustryFunctions::where('ID','=',$id);


        if ($find->delete()){

            return \redirect()->route('industry_function.index')->with('success','Industry deleted successfully');
        }


    }

    public  function  edit($id){
        $industry = IndustryFunctions::where('ID','=',$id)->first();

        return view ('industryFunctions.edit',compact('industry'));


    }

    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $update=IndustryFunctions::where('ID','=',$id)->update([

            'Name'=>$request->input('name'),
            'Details'=>$request->input('description')


        ]);

        if ($update){

            return \redirect()->route('industry_function.index')->with('success',' Industry saved successfully');

        }

    }

    public  function  store( Request $request){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
           
        ]);

        $create=IndustryFunctions::create([

            'Name'=>$request->input('name'),
            'Details'=>$request->input('description')

        ]);

        if ($create)

        {
            return \redirect()->route('industry_function.index')->with('success',' Industry saved successfully');
        }

    }

    public function create(){


        return view('industryFunctions.create');





    }

}

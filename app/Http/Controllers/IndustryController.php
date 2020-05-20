<?php

namespace App\Http\Controllers;

use App\Industry;
use App\JobAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class IndustryController extends Controller
{
    public  function  index(){


        $industries=DB::table('industry')->get();

        return view('industry.index',compact('industries'));
    }

    public  function  destroy($id){

        $find=Industry::where('ID','=',$id);


        if ($find->delete()){

            return \redirect()->route('industry.index')->with('success','Industry deleted successfully');
        }


    }

    public  function  show($id){

        return view('industry.view', ['industry' => Industry::findOrFail($id)]);

    }

    public  function  edit($id){
        $industry = Industry::where('ID','=',$id)->first();

        return view ('industry.edit',compact('industry'));


    }

    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'parent'=>'required'
        ]);

        $update=Industry::where('ID','=',$id)->update([

            'Parent'=>$request->input('parent'),
            'Name'=>$request->input('name'),
            'Details'=>$request->input('description')


        ]);

        if ($update){

            return \redirect()->route('industry.index')->with('success',' Industry saved successfully');

        }

    }

    public  function  create(){
        return view('industry.create');
    }

    public  function  store( Request $request){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'parent'=>'required'
        ]);

        $create=Industry::create([

            'Parent'=>$request->input('parent'),
            'Name'=>$request->input('name'),
            'Details'=>$request->input('description')

        ]);

        if ($create)

        {
            return \redirect()->route('industry.index')->with('success',' Industry saved successfully');
        }

    }
}

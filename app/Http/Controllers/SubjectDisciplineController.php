<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectDiscipline;

class SubjectDisciplineController extends Controller
{
    public function index(){

        $industries=SubjectDiscipline::all();

        return view('disciplineManagement.index',compact('industries'));

    }

    public  function  destroy($id){

        $find=SubjectDiscipline::find($id);


        if ($find->delete()){

            return \redirect()->route('sd.index')->with('success','Industry deleted successfully');
        }


    }

    public  function  edit($id){
        $industry = SubjectDiscipline::where('id','=',$id)->first();

        return view ('disciplineManagement.edit',compact('industry'));


    }
    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',
        ]);

        $update=SubjectDiscipline::where('id','=',$id)->update([

            'title'=>$request->input('name'),


        ]);

        if ($update){

            return \redirect()->route('sd.index')->with('success',' Industry saved successfully');

        }

    }

    public  function  store( Request $request){

        $request->validate([
            'name'=>'required',
            
           
        ]);

        $create=SubjectDiscipline::create([

            'title'=>$request->input('name'),

        ]);

        if ($create)

        {
            return \redirect()->route('sd.index')->with('success',' Industry saved successfully');
        }

    }

    public function create(){


        return view('disciplineManagement.create');


    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HardSkill;
class HardSkillsController extends Controller
{
    public function index(){

        $industries=HardSkill::all();

        return view('hard_skills.index',compact('industries'));





    }

    public  function  edit($id){
        $industry = HardSkill::where('ID','=',$id)->first();

        return view ('hard_skills.edit',compact('industry'));


    }

    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $update=HardSkill::where('ID','=',$id)->update([

            'Name'=>$request->input('name'),
            'Details'=>$request->input('description')


        ]);

        if ($update){

            return \redirect()->route('hard_skills.index')->with('success',' Industry saved successfully');

        }

    }

    public  function  destroy($id){

        $find=HardSkill::where('ID','=',$id);


        if ($find->delete()){

            return \redirect()->route('hard_skills.index')->with('success','Industry deleted successfully');
        }


    }


    public  function  store( Request $request){

        $request->validate([
            'name'=>'required',
            'description'=>'required',
           
        ]);

        $create=HardSkill::create([

            'Name'=>$request->input('name'),
            'Details'=>$request->input('description')

        ]);

        if ($create)

        {
            return \redirect()->route('hard_skills.index')->with('success',' Industry saved successfully');
        }

    }

    public function create(){


        return view('hard_skills.create');





    }
}

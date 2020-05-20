<?php

namespace App\Http\Controllers;

use App\Location;
use App\ProfQualTitles;
use Illuminate\Http\Request;

class ProfessionalQController extends Controller
{
    //

    public  function  edit($id){
        $prof = ProfQualTitles::where('profqualtitleID','=',$id)->first();

        return view ('profQualifications.edit',compact('prof'));

    }

    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',

        ]);


        $update=ProfQualTitles::where('profqualtitleID','=',$id)->update([
            'profqualtitle'=>$request->input('name'),
        ]);

        if ($update){
            return \redirect()->route('pq.index')->
            with('success','Location updated successfully');

        }
    }

    public  function  destroy($id){

        $find=ProfQualTitles::where('profqualtitleID','=',$id);


        if ($find->delete()){

            return \redirect()->route('pq.index')->with('success','Location deleted successfully');
        }


    }
    public  function  index(){

        $professionals=ProfQualTitles::all();

        return view('profQualifications.index',compact('professionals'));
    }

    public  function  create(){

        return view('profQualifications.create');
    }

    public  function  store( Request $request){

        $request->validate([
            'name'=>'required',
        ]);

        $create=ProfQualTitles::create([

            'profqualtitle'=>$request->input('name'),

        ]);

        if ($create)

        {
            return \redirect()->route('pq.index')->with('success','Location deleted successfully');

        }

    }
}

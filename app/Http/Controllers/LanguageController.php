<?php

namespace App\Http\Controllers;

use App\Country;
use App\Language;
use App\LanguageList;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //


    public  function  index(){

        $languages=LanguageList::all();

        return view('language.index',compact('languages'));
    }

    public  function  create(){

        return view('language.create');
    }

    public  function  edit($LanguageListID){
        $language = LanguageList::where('LanguageListID','=',$LanguageListID)->first();

        return view ('language.edit',compact('language'));

    }

    public  function  destroy($LanguageListID){

        $find=LanguageList::where('LanguageListID','=',$LanguageListID);


        if ($find->delete()){

            return \redirect()->route('language.index')->with('success','Language deleted successfully');
        }


    }


    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',

        ]);


        $update=LanguageList::where('LanguageListID','=',$id)->update([
            'LanguageName'=>$request->input('name'),
        ]);

        if ($update){
            return \redirect()->route('language.index')->
            with('success','Language updated successfully');

        }
    }


    public  function  store( Request $request){

        $request->validate([
            'name'=>'required',
        ]);

        $create=LanguageList::create([

            'LanguageName'=>$request->input('name'),

        ]);

        if ($create)

        {
            return \redirect()->route('language.index')->with('success','Language deleted successfully');

        }

    }

}

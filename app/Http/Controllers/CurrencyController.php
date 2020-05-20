<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Industry;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public  function  index(){


        $currencies=Currency::all();


        return view('currencies.index',compact('currencies'));

    }


    public  function  edit($id){
        $currency = Currency::where('CurrencyID','=',$id)->first();

        return view ('currencies.edit',compact('currency'));


    }


    public  function  create(){

        return view('currencies.create');
    }

    public  function  show($id){

        $currencies=Currency::where('CurrencyID','=',$id)->first();

        return view('currencies.show', compact('currencies'));

    }

    public  function  update(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'rate'=>'required'
        ]);


        $update=Currency::where('CurrencyID','=',$id)->update([
            'CurrencyName'=>$request->input('name'),
            'CurrencyRate'=>$request->input('rate')
        ]);

        if ($update){
            return \redirect()->route('currency.index')->
            with('success','Currency updated successfully');

        }
    }

    public  function  destroy($id){

        $find=Currency::where('CurrencyID','=',$id);


        if ($find->delete()){

            return \redirect()->route('currency.index')->with('success','Currency deleted successfully');
        }


    }

    public  function store(Request $request){

        $request->validate([
            'name'=>'required',
            'rate'=>'required'
        ]);


        $create=Currency::create([
            'CurrencyName'=>$request->input('name'),
            'CurrencyRate'=>$request->input('rate')
        ]);

        if ($create){
            return \redirect()->route('currency.index')->
            with('success','Currency created successfully');

        }


    }
}

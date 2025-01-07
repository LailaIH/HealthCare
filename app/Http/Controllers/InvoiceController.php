<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){ 
        $invoices = Invoice::orderBy('created_at','desc')->get(); 
        return view('invoices.index',compact('invoices')); 
    } 
 
    public function create(){ 
        $users = User::where('type','patient')->get(); 
        return view('invoices.create',compact('users')); 
    } 
 
    public function store(Request $request){ 
       $data = $request->validate([ 
            'user_id'=>'required', 
            'total'=>'required', 
            'status'=>'required', 
        ]); 
 
 
        Invoice::create($data); 
        return redirect()->route('invoices.index')->with('success','invoice was added successfully'); 
 
    } 
 
    public function edit($id){ 
        $invoice = Invoice::findOrFail($id); 
        return view('invoices.edit',compact('invoice'));
         
    }

    public function update(Request $request,$id){
        $request->validate(['status'=>'required']);
        $invoice = Invoice::findOrFail($id); 
        $invoice->status = $request->status;
        $invoice->save();
        return redirect()->route('invoices.index')->with('success','invoice was updated successfully'); 

    }

    public function delete($id){
        $invoice = Invoice::findOrFail($id); 
        $invoice->delete();
        return redirect()->route('invoices.index')->withErrors(['fail','invoice was deleted']); 

    }
}

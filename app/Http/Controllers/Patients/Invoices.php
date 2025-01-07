<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Invoices extends Controller
{
    public function myInvoices(){
        $user = auth()->user();
        $invoices = $user->invoices;

        return view('patientsPanel.invoices',compact('invoices'));
    }
}

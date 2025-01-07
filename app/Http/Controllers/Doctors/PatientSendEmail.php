<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Mail\SendToPatient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PatientSendEmail extends Controller
{
    public function sendEmailView($id){

        $user = User::findOrFail($id);
        return view('doctorsPanel.sendEmail',compact('user'));

    }


    public function doctorSendEmail(Request $request ,$id){

        $request->validate(['message'=>'required']);
        $user = User::findOrFail($id);
        $doctor = User::findOrFail(auth()->user()->id);
        Mail::to($user->email)->send(new SendToPatient($user->name, $request->message ,$doctor->name));
        return redirect()->route('doctorsPanel.myPatients')->with('success','email was sent successfully');
    }
}

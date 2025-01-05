<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Mail\SendApprovedMeeting;
use App\Mail\SendRejectedMeeting;
use App\Models\DoctorPatient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PatientRequests extends Controller
{
    public function pendingRequests(){

        $user = auth()->user();
        $doctor = $user->doctor;
        $requests = DoctorPatient::where('doctor_id',$doctor->id)
        ->where('status','pending')->get();
        return view('doctorsPanel.pendingRequests',compact('requests'));
    }

    public function approvedRequests(){

        $user = auth()->user();
        $doctor = $user->doctor;
        $requests = DoctorPatient::where('doctor_id',$doctor->id)
        ->where('status','approved')->get();
        return view('doctorsPanel.approvedRequests',compact('requests'));
    }

    public function rejectedRequests(){

        $user = auth()->user();
        $doctor = $user->doctor;
        $requests = DoctorPatient::where('doctor_id',$doctor->id)
        ->where('status','rejected')->get();
        return view('doctorsPanel.rejectedRequests',compact('requests'));
    }

    

    public function approveRequest($id){
        $meeting = DoctorPatient::findOrFail($id);
        $meeting->status = 'approved';
        $meeting->save();
        $patient = $meeting->patient;
        $user = $patient->user;
        Mail::to($user->email)->send(new SendApprovedMeeting($user->name, $meeting->date,$meeting->time ,$meeting->doctor->user->name));

        return redirect()->route('doctorsPanel.approvedRequests')->with('success','meeting was successfully approved');
    }

    public function rejectRequest($id){
        $meeting = DoctorPatient::findOrFail($id);
        $meeting->status = 'rejected';
        $meeting->save();

        $patient = $meeting->patient;
        $user = $patient->user;
        Mail::to($user->email)->send(new SendRejectedMeeting($user->name, $meeting->date,$meeting->time ,$meeting->doctor->user->name));

        return redirect()->route('doctorsPanel.rejectedRequests')->withErrors(['fail','request was rejected']);

    }
}
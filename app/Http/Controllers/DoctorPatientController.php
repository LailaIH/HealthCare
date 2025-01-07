<?php

namespace App\Http\Controllers;

use App\Models\DoctorPatient;
use App\Models\Treatment;
use Illuminate\Http\Request;

class DoctorPatientController extends Controller
{
    public function pendingMeetings(){
        $requests = DoctorPatient::where('status','pending')->get();
        return view('meetings.pendingMeetings',compact('requests'));
    }

    public function approvedMeetings(){
        $requests = DoctorPatient::where('status','approved')->get();
        return view('meetings.approvedMeetings',compact('requests'));
    }

    public function rejectedMeetings(){
        $requests = DoctorPatient::where('status','rejected')->get();
        return view('meetings.rejectedMeetings',compact('requests'));
    }

    public function finishedMeetings(){
        $requests = DoctorPatient::where('status','finished')->get();
        return view('meetings.finishedMeetings',compact('requests'));
    }

    public function fullTreatment($id){
        $treatment = Treatment::findOrFail($id);
        return view('meetings.fullTreatment',compact('treatment'));
    }
}

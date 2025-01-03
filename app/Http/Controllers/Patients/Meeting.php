<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorPatient;
use Illuminate\Http\Request;

class Meeting extends Controller
{

    // patients schedules with doctors (pending,finished or rejected)
    public function mySchedules(){
        $user = auth()->user();
        $patient = $user->patient;
        $schedules = $patient->doctors;

        return view('patientsPanel.mySchedules',compact('schedules'));
    }
    
    // to request a meeting with a certain doctor
    public function showRequestMeetingView($id){
        $doctor = Doctor::find($id);
        if($doctor){
            return view('patientsPanel.requestMeeting',compact('doctor'));
        }
        else{
            return redirect()->back()->withErrors(['fail'=>'doctor doesn\'t exist']);
        }

    }

    public function requestMeeting(Request $request,$id){

        $existingMeeting = DoctorPatient::where('doctor_id',$id)
        ->where('date',$request->date)
        ->where('time',$request->time)
        ->whereNotIn('status', ['rejected']) // Correct syntax for whereNotIn
        ->first();
        if($existingMeeting){
            return redirect()->back()->withErrors(['fail','a meeting already booked or requested before , please select another time']);
        }

        $doctor = Doctor::findOrFail($id);
        $user = auth()->user();
        $patient = $user->patient;
        DoctorPatient::create([

            'doctor_id'=>$doctor->id,
            'patient_id'=>$patient->id,
            'status'=>'pending',
            'visit_type'=>$request->visit_type,
            'time'=>$request->time,
            'date'=>$request->date,
        ]);

        return redirect()->route('patientsPanel.mySchedules')->with('success','request was send successfully');
    }

    // delete pending meeting
    public function deleteMeeting($id){
        $schedule = DoctorPatient::findOrFail($id);
        $schedule->delete();
        return redirect()->back()->withErrors(['fails'=>'schedule was successfully deleted']);
    }
}

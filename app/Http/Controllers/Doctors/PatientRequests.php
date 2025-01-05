<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Mail\SendAddedTreatment;
use App\Mail\SendApprovedMeeting;
use App\Mail\SendRejectedMeeting;
use App\Models\DoctorPatient;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Treatment;
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

        public function finishedRequests(){

            $user = auth()->user();
            $doctor = $user->doctor;
            $requests = DoctorPatient::where('doctor_id',$doctor->id)
            ->where('status','finished')->get();
            return view('doctorsPanel.finishedRequests',compact('requests'));
        }


        public function showAddTreatments($id){
            $meeting = DoctorPatient::findOrFail($id);
            return view('doctorsPanel.showAddTreatments',compact('meeting'));

        }


        public function addTreatmentAndInvoice(Request $request ,$id){
            $request->validate(['treatment'=>'required','total'=>'required']);
            $meeting = DoctorPatient::findOrFail($id);
            $meeting->status ='finished';
            $meeting->save();
            Treatment::create([
                'doctor_patient_id'=>$meeting->id,
                'treatment'=>$request->treatment
            ]);

            Invoice::create([
                'user_id'=> $meeting->patient->user->id,
                'total'=>$request->total,
            ]);

            $patient = $meeting->patient;
            $user = $patient->user;
            Mail::to($user->email)->send(new SendAddedTreatment($user->name,$meeting->doctor->user->name,$request->total));
            return redirect()->route('doctorsPanel.finishedRequests')->with('success','treatment was added successfully');
        }


        public function fullTreatment($id){
            $treatment = Treatment::findOrFail($id);
            return view('doctorsPanel.fullTreatment',compact('treatment'));
        }


        public function myPatients(){

            $user = auth()->user();
            $doctor = $user->doctor;
            $requests = DoctorPatient::where('doctor_id', $doctor->id)
            ->whereIn('status', ['finished', 'approved'])->get();

            return view('doctorsPanel.myPatients',compact('requests'));
        }


        public function showDocuments($id){
            $patient = Patient::where('id', $id)->firstOrFail();
            if(!isset($patient->documents)){
                abort(404);
            }
            $document = public_path('patientDocuments/'.$patient->documents);
            if (!file_exists($document)) {
                abort(404);
            }
    
            return response()->file($document);
    
        
        }
}

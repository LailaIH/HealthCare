<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Profile extends Controller
{
    public function editMyInformation(){
        $user = auth()->user();
        $patient = $user->patient;

        return view('patientsPanel.editMyInformation',compact('user','patient'));
    }

    public function updateMyInformation(Request $request){

        $user = User::findOrFail(auth()->user()->id);
        $patient = $user->patient;

       $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'phone' =>['required','min:10','max:10'],
        'age'=>['required','numeric','min:1','max:95'],
        'documents' => ['nullable', 'file', 'mimes:pdf'], // Ensure the file is a PDF

        ]);

        if ($request->hasFile('documents')) {
            $documents = $request->file('documents');
            $documentsName =   $documents->getClientOriginalName();
            $documents->move(public_path('patientDocuments'), $documentsName);
            $patient->documents = $documentsName;
            $patient->save();
        }

        $user->update($data);
        return redirect()->route('patients.panel')->with('suceess','your data was updated successfully');


        
    }
}

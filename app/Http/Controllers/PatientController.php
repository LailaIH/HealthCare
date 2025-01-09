<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        $patients = Patient::orderBy('created_at','desc')->get();
        return view('patients.index',compact('patients'));
    }



    public function create(){
        return view('patients.create');
    }

    // admin storing new patient as a patient and a user
    public function store(Request $request){

        $userController = new UserController();
        $data = $userController->validateData($request);
        $data['type'] = 'patient';
        $user = User::create($data);
        Patient::create([
            'user_id' => $user->id ,

        ]) ;

        return redirect()->route('patients.index')->with('success','patient was created successfully');


    }

    public function edit($id){
        $patient = Patient::findOrFail($id);
        if($patient){

            return view('patients.edit',compact('patient'));

        }

        else{
            return redirect()->route('patients.index')->withErrors(['fail'=>'patient does\'nt exist']);
        }
    }

    public function update(Request $request , $id){

        $patient = Patient::findOrFail($id);
        $user = $patient->user;
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
            $data['documents'] =  $documentsName;
        }

        $data['is_online'] = $request->has('is_online')?1:0;

        $patient->update($data);
        $user->update($data);
        return redirect()->route('patients.index')->with('success','patient was updated successfully');


    }

    public function registerRequestView(){
        return view('patients.registerRequest');
    }


    // patient request to register in the system
    public function registerRequest(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' =>['required','min:10','max:10'],
            'age'=>['required','numeric','min:1','max:95'],
            'documents' => ['required', 'file', 'mimes:pdf'], // Ensure the file is a PDF


        ]);

        if ($request->hasFile('documents')) {
            $documents = $request->file('documents');
            $documentsName =   $documents->getClientOriginalName();
            $documents->move(public_path('patientDocuments'), $documentsName);
            $data['documents'] =  $documentsName;
        }

        $data['type'] = 'patient';
        $data['status'] = 'pending';

        User::create($data);

        return view('patients.requestSent');



    }

        public function removeAccount($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->withErrors(['fail','patient was removed']);
    }
}

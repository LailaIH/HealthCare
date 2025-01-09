<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{


    public function index(){
        $doctors = Doctor::orderBy('created_at','desc')->get();
        return view('doctors.index',compact('doctors'));
    }



    public function create(){
        $specialties = Specialty::all();
        return view('doctors.create',compact('specialties'));
    }

    // admin storing new doctor as a doctor and a user
    public function store(Request $request){

        $request->validate(['specialty_id'=>'required']);
        $userController = new UserController();
        $data = $userController->validateData($request);
        $data['type'] = 'doctor';
        $user = User::create($data);
        Doctor::create([
            'user_id' => $user->id ,
            'specialty_id'=>$request->input('specialty_id'),
        ]) ;

        return redirect()->route('doctors.index')->with('success','doctor was created successfully');


    }

    public function edit($id){
        $doctor = Doctor::findOrFail($id);
        if($doctor){

            return view('doctors.edit',compact('doctor'));

        }

        else{
            return redirect()->route('doctors.index')->withErrors(['fail'=>'doctor does\'nt exist']);
        }
    }

    public function update(Request $request , $id){

        $doctor = Doctor::findOrFail($id);
        $user = $doctor->user;
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' =>['required','min:10','max:10'],
            'age'=>['required','numeric','min:1','max:95'],

        ]);


        $data['is_online'] = $request->has('is_online')?1:0;

        $user->update($data);
        return redirect()->route('doctors.index')->with('success','doctor was updated successfully');


    }

    public function registerRequestView(){
        $specialties = Specialty::all();
        return view('doctors.registerRequest',compact('specialties'));
    }


    // doctor request to register in the system
    public function registerRequest(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' =>['required','min:10','max:10'],
            'age'=>['required','numeric','min:1','max:95'],
            'specialty_id' => ['required', 'string', 'max:255'], 
        ]);

        $data['type'] = 'doctor';
        $data['status'] = 'pending';
        $data['password'] = 'default';
        
        User::create($data);

        return view('doctors.requestSent');



    }

    public function removeAccount($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->withErrors(['fail','doctor was removed']);
    }
}

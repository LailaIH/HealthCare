<?php

namespace App\Http\Controllers;

use App\Mail\SendPasswordMail;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
   
    public function index(){
        $admins = User::where('type','admin')
        ->orderBy('created_at','desc')->get();
        return view('admins.index',compact('admins'));
    }


    public function create(){
        return view('admins.create');
    }

    public function store(Request $request){
 
        $userController = new UserController();
        $data = $userController->validateData($request);
        $data['type'] = 'admin';
        User::create($data);
        
        return redirect()->route('admins.index')->with('success','admin was created successfully');

    }

    public function edit($id){
        $admin = User::findOrFail($id);
        return view('admins.edit',compact('admin'));
    }

    public function update(Request $request , $id){
        $admin = User::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' =>['required','min:10','max:10'],
            'age'=>['required','numeric','min:1','max:95'],

        ]);
        $data['is_online'] = $request->has('is_online')?1:0;


        $admin->update($data);
        return redirect()->route('admins.index')->with('success','admin was updated successfully');


    }

    public function showPendingRegistrationRequests(){
        $users = User::where('status','pending')
        ->where('type','patient')
        ->orderBy('created_at','desc')
        ->get();
        return view('admins.pendingRegstrationRequests',compact('users'));
    }

    public function showSetPatientPasswordView($id){

        $user= User::findOrFail($id);
        if($user){
        return view('admins.setPassword',compact('user'));
        }
        else{
            return redirect()->route('/admin')->withErrors(['fail'=>'user does\'nt exist']);
        }
    }

    public function acceptPatientAndSetPassword(Request $request , $id){
        $user= User::findOrFail($id);
        $request->validate([
            'password'=>['required', 'string', 'min:8'],
        ]);

        $user->status ='accepted';
        $user->password = Hash::make($request->password);
        $user->save();
        Patient::create([
        'user_id'=>$user->id ,
       'documents'=>$user->documents]); 


        $password = $request->password;

        Mail::to($user->email)->send(new SendPasswordMail($user, $password));
        return redirect()->route('patients.index')->with('success','patient was accepted');



    }



    public function showPendingRegistrationRequestsDoctors(){
        $users = User::where('status','pending')
        ->where('type','doctor')
        ->orderBy('created_at','desc')
        ->get();
        return view('admins.pendingRegstrationRequestsDoctors',compact('users'));
    }

    public function showSetDoctorPasswordView($id){

        $user= User::findOrFail($id);
        if($user){
        return view('admins.setPasswordDoctor',compact('user'));
        }
        else{
            return redirect()->route('/admin')->withErrors(['fail'=>'user does\'nt exist']);
        }
    }

    public function acceptDoctorAndSetPassword(Request $request , $id){
        $user= User::findOrFail($id);
        $request->validate([
            'password'=>['required', 'string', 'min:8'],
        ]);

        $user->status ='accepted';
        $user->password = Hash::make($request->password);
        $user->save();
        Doctor::create([
        'user_id'=>$user->id ,
        'specialty_id'=>$user->specialty_id]); 


        $password = $request->password;

        Mail::to($user->email)->send(new SendPasswordMail($user, $password));
        return redirect()->route('doctors.index')->with('success','doctor was accepted');



    }
}

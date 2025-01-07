<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorProfile extends Controller
{
    public function editMyInformation(){
        $user = auth()->user();
        $doctor = $user->doctor;

        return view('DoctorsPanel.editMyInformation',compact('user','doctor'));
    }

    public function updateMyInformation(Request $request){

        $user = User::findOrFail(auth()->user()->id);

       $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'phone' =>['required','min:10','max:10'],
        'age'=>['required','numeric','min:1','max:95'],

        ]);



        $user->update($data);
        return redirect()->route('doctors.panel')->with('done','your data was updated successfully');


        
    }
}

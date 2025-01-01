<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
   


    public function create(){
        $categories = Category::all();
        return view('specialties.create',compact('categories'));
    }

    public function validateData(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'category_id'=>'required',
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName =   $img->getClientOriginalName();
            $img->move(public_path('specialtyImages'), $imgName);
            $data['img'] =  $imgName;
        }
        return $data ;
    }

    public function store(Request $request){
        $data = $this->validateData($request);

        Specialty::create($data);
        return redirect()->route('categories.showSpecialties',$request->category_id)->with('success','specialty was created successfully');
    }

    public function edit($id){
        $specialty = Specialty::find($id);
        if($specialty){
            return view('specialties.edit',compact('specialty'));
        }
        else{
            return redirect()->back()->withErrors(['fail'=>'specialty dosn\'t exist']);
        }
    }

    public function update(Request $request ,$id){
       $data = $this->validateData($request);
        $specialty = Specialty::findOrFail($id);
        $specialty->update($data);
        return redirect()->route('categories.showSpecialties',$request->category_id)->with('success','specialty was updated successfully');


    }

    public function showDoctors($id){
        $specialty = Specialty::find($id);
        if($specialty){
          $doctors = $specialty->doctors ;
          return view('specialties.showDoctors',compact('doctors','specialty'));  

        }
        else{
            return redirect()->back()->withErrors(['fail'=>'specialty dosn\'t exist']);
        }

    }
}

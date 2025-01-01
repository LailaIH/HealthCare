<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Specialty;
use Illuminate\Http\Request;

class ExploreCategories extends Controller
{


    public function allCategories(){
        $categories = Category::all();
        return view('patientsPanel.categories',compact('categories'));

    }

    // show all specialties of a certain category
    public function categorySpecialties($id){
        $category = Category::find($id);
        if($category){

            $specialties = $category->specialties;
            return view('patientsPanel.showCategorySpecialties'
            ,compact('category','specialties'));
        }
        else{
            return back()->withErrors(['fail'=>'category doesn\'t exist']);
        }
    }

    // show all doctors that belong to certain specialty
    public function showDoctors($id){
        $specialty = Specialty::find($id);
        if($specialty){
            $doctors = $specialty->doctors ;
            return view('patientsPanel.showSpecialtyDoctors'
            ,compact('specialty','doctors'));

        }

        else{
            return back()->withErrors(['fail'=>'specialty doesn\'t exist']);
        }
    }
    
}

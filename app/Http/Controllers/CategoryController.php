<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(){
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function validateData(Request $request){
        $data = $request->validate([
            'name'=>'required',
        ]);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName =   $img->getClientOriginalName();
            $img->move(public_path('categoryImages'), $imgName);
            $data['img'] =  $imgName;
        }
        return $data ;
    }

    public function store(Request $request){
        $data = $this->validateData($request);

        Category::create($data);
        return redirect()->route('categories.index')->with('success','category was created successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        if($category){
            return view('categories.edit',compact('category'));
        }
        else{
            return redirect()->back()->withErrors(['fail'=>'category dosn\'t exist']);
        }
    }

    public function update(Request $request ,$id){
       $data = $this->validateData($request);
        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect()->route('categories.index')->with('success','category was updated successfully');


    }

    public function showSpecialties($id){
        $category = Category::find($id);
        if($category){
            $specialties = $category->specialties;

            return view('categories.showSpecialties',compact('category','specialties'));
        }
        else{
            return redirect()->back()->withErrors(['fail'=>'category dosn\'t exist']);
        }
    
    }
}

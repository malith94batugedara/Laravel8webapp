<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){

           $data = $request->validated();

           $category = new Category;

           $category->name = $data['name'];
           $category->slug = $data['slug'];
           $category->description = $data['description'];

           if($request->hasfile('image')){
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/category',$filename);
                $category->image = $filename;
           }

           $category->meta_title = $data['meta_title'];
           $category->meta_description = $data['meta_description'];
           $category->meta_keyword = $data['meta_keyword'];

           $category->navbar_status = $request->navbar_status == true ? '1' : '0' ;
           $category->status = $request->status == true ? '1' : '0' ;

           $category->created_by = Auth::user()->id;

           $category->save();

           return redirect(route('admin.category'))->with('status','Category Added Successfully!');
    }

    public function edit($categoryId){
            $category = Category::find($categoryId);
            return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $request,$categoryId){

        $data = $request->validated();

        $category = Category::find($categoryId);

           $category->name = $data['name'];
           $category->slug = $data['slug'];
           $category->description = $data['description'];

        if($request->hasfile('image')){

            $destination ='uploads/category/'.$category->image;
            if(File::exists($destination)){
                 File::delete($destination);
            }

             $file=$request->file('image');
             $filename=time().'.'.$file->getClientOriginalExtension();
             $file->move('uploads/category/',$filename);
             $category->image=$filename;
        }

           $category->meta_title = $data['meta_title'];
           $category->meta_description = $data['meta_description'];
           $category->meta_keyword = $data['meta_keyword'];

           $category->navbar_status = $request->navbar_status == true ? '1' : '0' ;
           $category->status = $request->status == true ? '1' : '0' ;

           $category->created_by = Auth::user()->id;

           $category->update();

           return redirect(route('admin.category'))->with('status','Category Updated Successfully!');

    }

    public function delete($categoryId){
        $category = Category::find($categoryId);
        if($category){
            $destination ='uploads/category/'.$category->image;
            if(File::exists($destination)){
                 File::delete($destination);
            }
            $category->delete();
            return redirect(route('admin.category'))->with('status','Category Deleted Successfully');
        }
        else{
            return redirect(route('admin.category'))->with('status','Category ID Not Found!'); 
        }

    }
}

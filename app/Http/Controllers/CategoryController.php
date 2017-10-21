<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AddCategory(){
        return view('admin.category.add-category');
    }
    public function storeCategory(Request $request){
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('/add-category')->with('message','Category Created Successfully');
    }
    public function AllCategoryList(){
        $categoryList = Category::all();
        return view('admin.category.manage-category',['categoryList'=>$categoryList]);
    }
    public function UnpublishCategory($cat_id){
        $category = Category::find($cat_id);
        $category->publication_status = 0;
        $category->save();
        return redirect('/manage-category')->with('message','Category Unpublished successfully');
    }
    public function PublishCategory($cat_id){
        $category = Category::find($cat_id);
        $category->publication_status = 1;
        $category->save();
        return redirect('/manage-category')->with('message','Category published successfully');
    }
    public function EditCategory($cat_id){
        $category = Category::find($cat_id);
        return view('admin.category.edit-category',['category'=>$category]);
    }
    public function UpdateCategory(Request $request){
        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('/manage-category')->with('message','Category info updated successfully');
    }
    public function DeleteCategory($id){
            $category = Category::find($id);
            $category->delete();
            return redirect('/manage-category')->with('message','Category info deleted successfully');
        }

}

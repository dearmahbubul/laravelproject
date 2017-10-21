<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }
    public function storeBrand(Request $request){
        $this->validate($request,[
           'brand_name'=>'required|max:15',
           'brand_description'=>'required'
        ]);
        // Save data using query builder
        DB::table('brands')->insert([
            'brand_name'=> $request->brand_name,
            'brand_description'=> $request->brand_description,
            'publication_status'=> $request->publication_status
        ]);
        //Save data using any process of ElequentORM
        //Brand::create($request->all());
        return redirect('/add-brand')->with('message','Brand Info Saved Successfully');
    }
    public function allBrand(){
        $brandList = Brand::all();
        return view('admin.brand.manage-brand',['brandList'=>$brandList]);
    }
    public function unpublishBrand($brand_id){
        $brand = Brand::find($brand_id);
        $brand->publication_status = 0;
        $brand->save();
        return redirect('/manage-brand')->with('message','Brand Unpublished');
    }
    public function publishBrand($brand_id){
        $brand = Brand::find($brand_id);
        $brand->publication_status = 1;
        $brand->save();
        return redirect('/manage-brand')->with('message','Brand Unpublished');
    }
    public function editBrand($brand_id){
        $brand = Brand::find($brand_id);
        return view('admin.brand.edit-brand',['brand'=>$brand]);
    }
    public function updateBrand(Request $request){
        $brand = Brand::find($request->id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description= $request->brand_description;
        $brand->publication_status= $request->publication_status;
        $brand->save();
        return redirect('/manage-brand')->with('message','Brand Information updated');
    }
    public function deleteBrand($brand_id){
        $brand = Brand::find($brand_id);
        $brand->delete();
        return redirect('/manage-brand')->with('message','Brand Information Deleted');
    }
}

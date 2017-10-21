<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();
        return view('admin.product.add-product',['categories'=>$categories,'brands'=>$brands]);
    }
    public function storeProduct(Request $request){
        $this->validate($request,[
            'product_name'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'product_quantity'=>'required',
            'product_price'=>'required',
            'product_code'=>'required'
        ]);
        $productImage = $request->file('product_image');
        $directory = 'product-images/';
        $imageName = substr(md5(time()),2, 10).rand(10000,999999).time().'.'.$productImage->getClientOriginalExtension();
        $imageUrl = $directory.$imageName;
        /*$product = new Product();
        $product->*/
        DB::table('products')->insert([
            'category_id'=> $request->category_id,
            'product_name'=> $request->product_name,
            'brand_id'=> $request->brand_id,
            'short_description'=> $request->short_description,
            'long_description'=> $request->long_description,
            'product_code'=> $request->product_code,
            'product_price'=> $request->product_price,
            'product_quantity'=> $request->product_quantity,
            'product_image'=> $imageUrl,
            'publication_status'=> $request->publication_status
        ]);
        /*Image uploade without any third party package, just usin glaravel
        $productImage->move($directory,$imageName);
        Image uploade with intervention third party package*/


        Image::make($productImage)->resize(300,400)->save($imageUrl);
        return redirect('/add-product')->with('message','Product Info Saved Successfully');
    }
    public function allProduct(){
        $productList = DB::table('products')
                            ->join('categories','products.category_id','=','categories.id')
                            ->join('brands','products.brand_id','=','brands.id')
                            ->select('products.*','categories.category_name','brands.brand_name')
                            ->get();
        //return view('admin.product.manage-product',['productList'=>$productList]);
        return view('admin.product.manage-product',compact( 'productList'));
    }
    public function unpublishProduct($product_id){
        $product = Product::find($product_id);
        $product->publication_status = 0;
        $product->save();
        return redirect('/manage-product')->with('message','Product Unpublished');
    }
    public function publishProduct($product_id){
        $product = Product::find($product_id);
        $product->publication_status = 1;
        $product->save();
        return redirect('/manage-product')->with('message','Product Unpublished');
    }
    public function editProduct($product_id){
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();
        $product = Product::find($product_id);
        return view('admin.product.edit-product',[
            'product'=>$product,
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }
    public function updateProduct(Request $request){
        $product = Product::find($request->id);
    }
    public function deleteProduct($product_id){
        $product = Product::find($product_id);
        $product->delete();
        return redirect('/manage-product')->with('message','Product Information Deleted');
    }
}

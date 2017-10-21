@extends('admin.master')
@section('content')
    <br>
    <div class="row">
        <div class="col-sm-12">
            @if($message = Session::get('message'))
                <p class="alert" style="display:block;background-color: #61d864;padding:7px;color:#fff;text-align: center;">{{ $message }}</p>
            @endif
            <div class="well">
                <form action="{{ url('/store-product') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="col-sm-3">Category</label>
                        <div class="col-sm-9">
                            <select name="category_id" id="" class="form-control">
                                <option>---Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Brand</label>
                        <div class="col-sm-9">
                            <select name="brand_id" id="" class="form-control">
                                <option>---Select Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                            <p style="color:red;">{{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="product_name" class="form-control">
                            <p style="color:red;">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Product_short_description" class="col-sm-3">Product Short Description</label>
                        <div class="col-sm-9">
                            <textarea name="short_description" id="Product_short_description" rows="3" class="form-control"></textarea>
                            <p style="color: red">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</p>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="long_description" class="col-sm-3">Product Long Description</label>
                        <div class="col-sm-9">
                            <textarea name="long_description" id="long_description" rows="10" class="form-control"></textarea>
                            <p style="color: red">{{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</p>
                        </div>
                         <script>
                             // Replace the <textarea id="editor1"> with a CKEditor
                             // instance, using default configuration.
                             CKEDITOR.replace( 'long_description' );
                         </script>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Product Code</label>
                        <div class="col-sm-9">
                            <input type="text" name="product_code" class="form-control">
                            <p style="color:red;">{{ $errors->has('product_code') ? $errors->first('product_code') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Product price</label>
                        <div class="col-sm-9">
                            <input type="text" name="product_price" class="form-control">
                            <p style="color:red;">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Product Quantity</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_quantity" class="form-control">
                            <p style="color:red;">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Product Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="product_image" class="form-control" accept="image/*">
                            <p style="color:red;">{{ $errors->has('product_image') ? $errors->first('product_image') : ' ' }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="publication_status" id="" class="form-control">
                                <option>---Select Publication Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Brand">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
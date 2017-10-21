@extends('admin.master')
@section('content')
    <br>
    <div class="row">
        <div class="col-sm-12">
            @if($message = Session::get('message'))
                <p class="alert" style="display:block;background-color: #61d864;padding:7px;color:#fff;text-align: center;">{{ $message }}</p>
            @endif
            <div class="well">
                <form action="{{ url('/store-brand') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="col-sm-3">Brand Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="brand_name" class="form-control">
                            <p style="color:red;">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' ' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="brand_description" class="col-sm-3">Brand Description</label>
                        <div class="col-sm-9">
                            <textarea name="brand_description" id="brand_description" rows="5" class="form-control"></textarea>
                            <p style="color: red">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ' ' }}</p>
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
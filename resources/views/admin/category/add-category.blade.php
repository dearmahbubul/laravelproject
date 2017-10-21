@extends('admin.master')
@section('content')
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-lg-12 text-center">
                @if($message = Session::get('message'))
                    <p class="alert" style="background-color: #61d864;padding:7px;color:#fff;">{{ $message }}</p>
                @endif
            </div>
            <div class="well">
                <form action="{{ url('/store-category') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="category_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category_description" class="col-sm-3">Category Description</label>
                        <div class="col-sm-9">
                            <textarea name="category_description" id="category_description" rows="5" class="form-control"></textarea>
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
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Category">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
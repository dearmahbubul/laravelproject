@extends('admin.master')
@section('content')
    <br>
    <div class="row">
        <div class="col-sm-12">
            {{ Session::get('message') }}
            <div class="well">
                <form action="{{ url('/update-category') }}" method="POST" class="form-horizontal" name="updateCategoryForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ $category->category_name }}" name="category_name" class="form-control">
                            <input type="hidden" value="{{ $category->id }}" name="id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category_description" class="col-sm-3">Category Description</label>
                        <div class="col-sm-9">
                            <textarea name="category_description" id="category_description" rows="5" class="form-control">{{ $category->category_description }}</textarea>
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
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Category">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.forms['updateCategoryForm'].elements['publication_status'].value='{{$category->publication_status}}';
    </script>

@endsection
@extends('admin.master')
@section('content')
    <br>
    <div class="row">
        <div class="col-sm-12">
            {{ Session::get('message') }}
            <div class="well">
                <form action="{{ url('/update-brand') }}" method="POST" class="form-horizontal" name="updatebrandForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="col-sm-3">Brand Name</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ $brand->brand_name }}" name="brand_name" class="form-control">
                            <input type="hidden" value="{{ $brand->id }}" name="id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="brand_description" class="col-sm-3">Brand Description</label>
                        <div class="col-sm-9">
                            <textarea name="brand_description" id="brand_description" rows="5" class="form-control">{{ $brand->brand_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="publication_status" id="" class="form-control">
                                <option>---Select Publication Status</option>
                                <option value="1" {{ $brand->publication_status == 1 ? 'selected': '' }}>Published</option>
                                <option value="0" {{ $brand->publication_status == 0 ? 'selected': '' }}>Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Brand">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--<script>
        document.forms['updatebrandForm'].elements['publication_status'].value='{{$brand->publication_status}}';
    </script>--}}
@endsection
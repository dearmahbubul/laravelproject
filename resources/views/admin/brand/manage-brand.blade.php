@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 text-center">
            @if($message = Session::get('message'))
                <p class="alert" style="background-color: #61d864;padding:7px;color:#fff;">{{ $message }}</p>
            @endif
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Brand List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>S.L</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0 ?>
                        @foreach($brandList as $brand)

                            <tr class="odd gradeX">
                                <td>{{++$i}}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td>{{ $brand->brand_description }}</td>
                                <td>{{ $brand->publication_status==1? 'Published':'Unpublished' }}</td>
                                <td class="center">
                                    @if($brand->publication_status==1)
                                        <a href="{{ url('/unpublish-brand/'.$brand->id) }}" title="Publication Change" class="btn btn-success"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
                                    @else
                                        <a href="{{ url('/publish-brand/'.$brand->id) }}" title="Publication Change" class="btn btn-warning"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                                    @endif
                                    <a href="{{ url('/edit-brand/'.$brand->id) }}" title="Edit brand" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="{{ url('/delete-brand/'.$brand->id) }}" title="Delete brand" onclick="return confirm('Are you sure to delete this brand')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection
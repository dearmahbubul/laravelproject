@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 text-center">
            @if($message = Session::get('message'))
                <p class="page-header" style="background-color: #61d864;padding:7px;color:#fff;">{{ $message }}</p>
            @endif
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Category List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>S.L</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0 ?>
                         @foreach($categoryList as $category)

                            <tr class="odd gradeX">
                                <td>{{++$i}}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_description }}</td>
                                <td>{{ $category->publication_status==1? 'Published':'Unpublished' }}</td>
                                <td class="center">
                                    @if($category->publication_status==1)
                                        <a href="{{ url('/unpublish-category/'.$category->id) }}" title="Publication Change" class="btn btn-success"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
                                    @else
                                        <a href="{{ url('/publish-category/'.$category->id) }}" title="Publication Change" class="btn btn-warning"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                                    @endif
                                    <a href="{{ url('/edit-category/'.$category->id) }}" title="Edit Category" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="{{ url('/delete-category/'.$category->id) }}" title="Delete Category" onclick="return confirm('Are you sure to delete this category')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
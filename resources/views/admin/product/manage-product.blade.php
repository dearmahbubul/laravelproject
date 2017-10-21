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
                    All Product List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>S.L</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0 ?>
                        @foreach($productList as $product)

                            <tr class="odd gradeX">
                                <td>{{++$i}}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td><img src="{{ $product->product_image }}" style="height: 80px;width: 120px;" alt=""></td>
                                <td>$ {{ $product->product_price }}</td>
                                <td class="center">
                                    <a href="{{ url('/view-product/'.$product->id) }}" title="View product" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    @if($product->publication_status==1)
                                        <a href="{{ url('/unpublish-product/'.$product->id) }}" title="Publication Change" class="btn btn-success"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
                                    @else
                                        <a href="{{ url('/publish-product/'.$product->id) }}" title="Publication Change" class="btn btn-warning"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                                    @endif
                                        <a href="{{ url('/edit-product/'.$product->id) }}" title="Edit product" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="{{ url('/delete-product/'.$product->id) }}" title="Delete product" onclick="return confirm('Are you sure to delete this brand')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
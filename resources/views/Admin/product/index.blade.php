
@extends('layouts.admin')

@section('title')

    <title>San pham</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'products ', 'key' => 'list'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Add Product</a>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Products Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">id</th>
                                        <th>title</th>
                                        <th>slug</th>
                                        <th>image</th>
                                        <th>type</th>
                                        <th>price</th>
                                        <th>discount</th>
                                        <th>quantity</th>
                                        <th>qrCode</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $item)

                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                {{ $item->slug }}
                                            </td>
                                            <td>
                                                <img src="{{ $item->feature_image_name }}" width="250" alt="">
                                            </td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->discount }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>
                                                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->errorCorrection('H')
                        ->generate('fascine.com.vn/'. $item->slug)) !!} ">
                                            </td>
                                            <td>
                                                <a href="{{ route('products.edit', ['id' => $item->id]) }}" class="btn btn-default">Edit</a>
                                                <a href="{{ route('products.delete', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $products->links() }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



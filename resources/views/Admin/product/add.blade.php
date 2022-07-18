
@extends('layouts.admin')

@section('title')

    <title>Tao - San pham</title>

    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('template/admin/product/add/add.css') }}" rel="stylesheet">
@endsection

@section('css')


@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Add Product', 'key' => ''])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" id="title">
                                    </div>
                                    <!-- summary -->
                                    <div class="form-group">
                                        <label for="title">Summary</label>
                                        <input type="text" name="summary" class="form-control" id="summary">
                                    </div>
                                    <!-- type -->
                                    <div class="form-group">
                                        <label for="type">type</label>
                                        <select class="form-control" name="type">
                                            <option value="0">-- value --</option>
{{--                                            {!! $htmlOption !!}--}}
                                            <option value="1">san pham moi</option>
                                            <option value="2">san pham uu dai</option>
                                            <option value="3">san pham ban chay</option>
                                        </select>
                                    </div>
                                    <!-- sku -->
                                    <div class="form-group">
                                        <label for="title">SKU</label>
                                        <input type="text" name="sku" class="form-control" id="sku">
                                    </div>
                                    <!-- price -->
                                    <div class="form-group">
                                        <label for="title">Price</label>
                                        <input type="text" name="price" class="form-control" id="price">
                                    </div>
                                    <!-- discount -->
                                    <div class="form-group">
                                        <label for="title">discount</label>
                                        <input type="text" name="discount" class="form-control" id="discount">
                                    </div>
                                    <!-- quantity -->
                                    <div class="form-group">
                                        <label for="title">Quantity</label>
                                        <input type="text" name="quantity" class="form-control" id="quantity">
                                    </div>
                                    <!-- shop -->
                                    <div class="form-group">
                                        <label for="title">shop</label>
                                        <input type="text" name="shop" class="form-control" id="shop">
                                    </div>
                                    <!-- content -->
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea type="text" name="content" rows="15" class="form-control content_text" id="content"></textarea>
                                    </div>

                                    <!-- image -->
                                    <div class="form-group">
                                        <label for="title">Image</label>
                                        <input type="file" name="image" class="form-control-file" id="image">
                                    </div>

                                    <!-- image -->
                                    <div class="form-group">
                                        <label for="image_path">Image more</label>
                                        <input type="file" multiple name="image_path[]" class="form-control-file" id="image_path">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2_init" multiple name="category">

                                            {!! $htmlOption !!}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tag</label>
                                        <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('template/admin/product/add/add.js') }}"></script>

@endsection

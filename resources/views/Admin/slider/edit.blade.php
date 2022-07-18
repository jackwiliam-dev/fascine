
@extends('layouts.admin')

@section('title')

    <title>Edit Slider</title>

    <link rel="stylesheet" href="{{ asset('template/admin/slider/add/add.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Edit Slider', 'key' => ''])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Slider</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{ route('sliders.update') }}" enctype="multipart/form-data">
                                @csrf <!-- {{ csrf_field() }} -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="title" value="{{ $slider->name }}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Description</label>
                                        <textarea type="text" name="description" class="form-control " id="description" rows="15" value="{{ $slider->description }}"></textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="title">Image</label>
                                        <input type="file" name="image_path" class="form-control-file @error('image_path') is-invalid @enderror" id="image_path">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <img class="image_slider" src="{{ $slider->image_path }}" alt="">
                                            </div>
                                        </div>
                                        @error('image_path')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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



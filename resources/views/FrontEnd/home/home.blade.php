@extends('layouts.front_end')


@section('title')
<title>Home Page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection


@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    <!--/slider-->
    @include('FrontEnd.home.components.slider')
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                @include('FrontEnd.components.sidebar')

                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('FrontEnd.home.components.feature_product')
                    <!--features_items-->

                    <!--category-tab-->
                    @include('FrontEnd.home.components.category_tab')
                    <!--/category-tab-->

                    <!--recommended_items-->
                    @include('FrontEnd.home.components.recommend_product')
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection



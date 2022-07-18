<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            @foreach($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{$category->slug}}">
                                <span class="badge pull-right">
                                    @if($category->categoryChildrent->count())
                                        <i class="fa fa-plus"></i>
                                    @endif
                                </span>
                                {{ $category->title }}
                            </a>
                        </h4>
                    </div>


                    <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($category->categoryChildrent as $categoryChilrent)
                                    <li>
                                        <a href="{{ route('category.product',
                                        ['slug' => $categoryChilrent->slug, 'id' => $categoryChilrent->id]) }}">
                                            {{ $categoryChilrent->title }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            @endforeach

        </div><!--/category-products-->


    </div>
</div>

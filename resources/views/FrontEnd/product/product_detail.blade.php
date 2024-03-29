<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            @if(empty($product->feature_image_name))
            <img src="{{ $product->feature_image_name }}" alt="" />
            @endif
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    @foreach($product_image as $item)

                    <a href=""><img src="{{ $item->image_path }}" alt=""></a>

                    @endforeach
                </div>


            </div>

            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />

            <h2>{{ $product->title }}</h2>


            <p>{{ $product->sku }}</p>

            <img src="images/product-details/rating.png" alt="" />
            <span>
									<span>{{ $product->price }}</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> E-SHOPPER</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->

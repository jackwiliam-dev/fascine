<?php

namespace App\Http\Controllers\Admin\Product;

use App\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProductController extends Controller
{
    use StorageImageTrait;
    public function index() {
        $products = Product::latest()->where('deleted', 0)->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    public function getViewCreateProduct()
    {
        $htmlOption = $this->getCategory(0);
        return view('admin.product.add', compact('htmlOption'));
    }

    public function createProduct(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'user_id' => auth()->id(),
                'title' => $request->input('title'),
                'metaTitle' => str_slug($request->input('title')),
                'slug' => str_slug($request->input('title')),
                'summary' => $request->input('summary'),
                'type' => $request->input('type'),
                'sku' => $request->input('sku'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'quantity' => $request->input('quantity'),
                'shop' => $request->input('shop'),
                'created_at' => Carbon::now(),
                'publishedAt' => Carbon::now(),
                'startsAt' => Carbon::now(),
                'endsAt' => Carbon::now(),
                'content' => $request->input('content'),
                'deleted' => 0,
                'views_count' => 0
            ];

            $dataUpload = $this->storageTraitUpload($request, 'image', 'products');

            if (!empty($dataUpload)){
                $dataProductCreate['feature_image_name'] = $dataUpload['file_path'];
            }

            $product = Product::create($dataProductCreate);

            //Insert data to product_images

            if ($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'products');
                    ProductImage::create([
                        'productId' => $product->id,
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            //Insert tags to product_tag
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = Tag::firstOrCreate(['name' => $tagItem]);

                    ProductTag::create([
                        'product_id' => $product->id,
                        'tag_id' => $tagInstance->id
                    ]);
                }
            }


            ProductCategory::create([
                'productId' => $product->id,
                'categoryId' => $request->category,

            ]);

            DB::commit();

            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            dump($exception);
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage(). 'line:' . $exception->getLine());
        }

    }

    public function getCategory($parentId)
    {
        $data = Category::all()->where('deleted', 0);
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $productCategory = ProductCategory::all()->where('productId', $product->id);
        $category = Category::all()->where('id', $productCategory->categoriId);
        return view('', compact('product', 'category'));
    }

    public function update($id, Request $request)
    {
        Product::find($id)->updated([
            'title' => $request->input('title'),
            'metaTitle' => $request->input('metaTitle'),
            'slug' => str_slug($request->input('slug')),
            'summary' => $request->input('summary'),
            'type' => $request->input('type'),
            'sku' => $request->input('sku'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'quantity' => $request->input('quantity'),
            'shop' => $request->input('shop'),
            'updated_At' => Carbon::now(),
            'publishedAt' => Carbon::now(),
            'content' => $request->input('content')
        ]);

        ProductCategory::find($request->input(''))->update([

        ]);

        return redirect()->route('products.index');
    }

    public function delete($id){
        Product::find($id)->update([
            'deleted' => 1
        ]);

        return redirect()->route('products.index');
    }
}

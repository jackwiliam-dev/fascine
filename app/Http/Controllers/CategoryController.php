<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;

class CategoryController extends Controller
{
    private $category;

    public function __construstor(Category $category)
    {
        $this->category = $category;
    }

    public function create()
    {
        $htmlOption = $this->getCategory(0);
        return view('admin.category.add', compact('htmlOption'));
    }

    public function index()
    {
        $categories = Category::latest()->where('deleted', 0)->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create([
            'title' => $request->input('title'),
            'parentId' => $request->input('parent_id'),
            'slug' => str_slug($request->input('title')),
            'deleted' => 0
        ]);

        return redirect()->route('categories.index');
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

        $category = Category::find($id);
        $htmlOption = $this->getCategory($category->parentId);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        Category::find($id)->update([
            'title' => $request->title,
            'parentId' => $request->parent_id,
            'slug' => str_slug($request->title)
        ]);
        return redirect()->route('categories.index');

    }

    public function delete($id)
    {
        Category::find($id)->update([
            'deleted' => 1
        ]);
        return redirect()->route('categories.index');
    }


}

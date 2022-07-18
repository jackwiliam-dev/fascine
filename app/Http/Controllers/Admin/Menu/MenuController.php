<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        $menus = Menu::latest()->where('deleted', 0)->paginate(5);
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        $htmlOption = $this->getMenu(0);
        return view('admin.menu.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {

        Menu::create([
            'title' => $request->input('title'),
            'parentId' => $request->input('parent_id'),
            'slug' => str_slug($request->input('title')),
            'deleted' => false
        ]);

        return redirect()->route('menus.index');
    }

    public function getMenu($parentId)
    {
        $data = Menu::all()->where('deleted', 0);
        $recusive = new Recusive($data);
        $htmlOption = $recusive->menuRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {

        $menus = Menu::find($id);
        $htmlOption = $this->getMenu($menus->parentId);
        return view('admin.menu.edit', compact('menus', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        Menu::find($id)->update([
            'title' => $request->title,
            'parentId' => $request->parent_id,
            'slug' => str_slug($request->title)
        ]);
        return redirect()->route('menus.index');

    }

    public function delete($id)
    {
        Menu::find($id)->update([
            'deleted' => 1
        ]);
        return redirect()->route('menus.index');
    }
}

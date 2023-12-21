<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Components\Recursive;
use Illuminate\Support\Str;



class MenuController extends Controller
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;

    }

    public function index(){
        $menus = $this->menu->latest()->paginate(5);

        return view('admin.menu.index', ['menus' => $menus]);

    }

    public function create(){

        $htmlOption = $this->getMenu($parentId = '');

        return view('admin.menu.create',['htmlOption' => $htmlOption]);
    }

    public function store(Request $request){

        // $rules = [
        //     'title' => 'required',
        //     'category_id' => 'required',
        //     'buyer_id' => 'required',
        // ];
        // $messages = [
        //     'title.required' => '必須項目です。',
        //     'category_id.required' => '必須項目です。',
        //     'end_date.required' => '必須項目です。',

        // ];
        // $validator = Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $this->menu->create([
            'name' => $request->menu_name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->menu_name),

        ]);

        return redirect()->route('menus.index');

    }

    public function edit($id){
        $menu = $this->menu->find($id);
        $htmlOption = $this->getMenu($menu->parent_id);
        return view('admin.menu.edit', ['menu' => $menu, 'htmlOption' => $htmlOption]);
    }

    public function update($id, Request $request){
        $this->menu->find($id)->update([
            'name' => $request->menu_name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->menu_name),
        ]);

        return redirect()->route('menus.index');
    }

    public function delete($id){
        $this->menu->find($id)->delete();

        return redirect()->route('menus.index');
    }

    public function getMenu( $parentId){
        $data = $this->menu->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->menuRecursive($parentId);

        return $htmlOption;
    }
}

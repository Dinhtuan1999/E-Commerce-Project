<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Components\Recursive;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;

    }

    public function index(){
        $categories = $this->category->latest()->paginate(5);

        return view('admin.category.index', ['categories' => $categories]);

    }

    public function create(){

        $htmlOption = $this->getCategory($parentId = '');

        return view('admin.category.create',['htmlOption' => $htmlOption]);
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

        $this->category->create([
            'name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->category_name),
        ]);

        return redirect()->route('categories.index');

    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', ['category' => $category, 'htmlOption' => $htmlOption]);
    }

    public function update($id, Request $request){
        $this->category->find($id)->update([
            'name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->category_name),
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id){
        $this->category->find($id)->delete();

        return redirect()->route('categories.index');
    }

    public function getCategory( $parentId){
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);

        return $htmlOption;
    }
}

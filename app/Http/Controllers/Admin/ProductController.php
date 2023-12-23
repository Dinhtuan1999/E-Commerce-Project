<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Components\Recursive;

class ProductController extends Controller
{
    private $product;
    private $category;
    public function __construct(Category $category,Product $product){
        $this->product = $product;
        $this->category = $category;
    }

    public function index(){
        $products = $this->product->latest()->paginate(5);

        return view("admin.product.index", ['products'=> $products]);

    }

    public function create(){

        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.create', ['htmlOption' => $htmlOption]);

    }

    public function store(Request $request){
        dd($request->all());
    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }

    public function getCategory( $parentId){
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);

        return $htmlOption;
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index(){

    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){
        
    }
}

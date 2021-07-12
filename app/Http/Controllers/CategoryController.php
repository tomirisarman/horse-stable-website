<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Horse;
use App\Category;
use App\Color;
use App\Line;

class CategoryController extends Controller
{
    public function index(){
        $cats = Category::all();
        return view('admin-categories', compact('cats'));
    }

    public function show_create(){
        return view('admin-create-category');
    }

    public function create_category(Request $request){
        $cat = new Category();

        $request->validate([
            'name' => 'required',
        ]);

        $cat->cat_name = $request->get('name');

        $cat->save();

        return redirect()->route('admin.categories')->with('success', 'Запись добавлена!');

    }

    public function delete_category($id){
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->route('admin.categories')->with('success', 'Запись удалена!');
    }
    public function edit_category(Request $request, $id){

        $cat = Category::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $cat->cat_name = $request->get('name');

        $cat->save();

        return redirect()->route('admin.categories')->with('success', 'Изменено!');
    }

    public function show_edit($id){
        $cat = Category::find($id);
        return view('admin-edit-category', compact('cat'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Horse;
use App\Category;
use App\Color;
use App\Line;

class HorseController extends Controller
{
    public function index(){
        $horses = Horse::all();
        return view('admin-horses', compact('horses'));
    }

    public function show_create(){
        $categories = Category::all();
        $colors = Color::all();
        $lines =  Line::all();
        return view('admin-create-horse', compact('categories', 'colors', 'lines'));
    }

    public function create_horse(Request $request){
        $horse = new Horse();

        $request->validate([
            'name' => 'required',
            'cat_id' => 'required',
            'col_id' => 'required',
            'l_id' => 'required',
            'year' => 'required',
            'height' => 'required',
            'length' => 'required',
            'chest' => 'required',
            'img' => 'sometimes|image',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $image = file_get_contents($file);
            $horse->img = $image;
        }
        $horse->name = $request->get('name');
        $horse->cat_id = $request->get('cat_id');
        $horse->col_id = $request->get('col_id');
        $horse->l_id = $request->get('l_id');
        $horse->year = $request->get('year');
        $horse->height = $request->get('height');
        $horse->length = $request->get('length');
        $horse->chest = $request->get('chest');

        $horse->save();

        return redirect()->route('admin.horses')->with('success', 'Запись добавлена!');

    }
    public function delete_horse($id){
        $horse = Horse::find($id);
        $horse->delete();
        return redirect()->route('admin.horses')->with('success', 'Запись удалена!');
    }
    public function edit_horse(Request $request, $id){

        $horse = Horse::find($id);

        $request->validate([
            'name' => 'required',
            'cat_id' => 'required',
            'col_id' => 'required',
            'l_id' => 'required',
            'year' => 'required',
            'height' => 'required',
            'length' => 'required',
            'chest' => 'required',
            'img' => 'sometimes|image',
        ]);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $image = file_get_contents($file);
            $horse->img = $image;
        }
        $horse->name = $request->get('name');
        $horse->cat_id = $request->get('cat_id');
        $horse->col_id = $request->get('col_id');
        $horse->l_id = $request->get('l_id');
        $horse->year = $request->get('year');
        $horse->height = $request->get('height');
        $horse->length = $request->get('length');
        $horse->chest = $request->get('chest');

        $horse->save();

        return redirect()->route('admin.horses')->with('success', 'Изменено!');
    }

    public function show_edit($id){
        $horse = Horse::find($id);
        $categories = Category::all();
        $colors = Color::all();
        $lines =  Line::all();
        return view('admin-edit-horse', compact('horse', 'categories', 'colors', 'lines'));
    }

    public function show_horses($locale, $cat_id){
        $horses = Horse::where('cat_id', $cat_id)->get();
        return view('horses', ['horses' => $horses, 'cat_id' => $cat_id]);
    }

    public function show_info($locale, $id){
        $horse = Horse::find($id);
        $category = Category::find($horse->cat_id)->cat_name;
        $color = Color::find($horse->col_id)->col_name;
        $line = Line::find($horse->l_id)->l_name;
        return view('info', compact('horse', 'category', 'color', 'line'));
    }

    public function for_sale($locale){
        $cats = Category::all();
        return view('forsale', compact('cats'));
    }
}

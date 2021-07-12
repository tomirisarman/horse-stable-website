<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
class ColorController extends Controller
{
    public function index(){
        $colors = Color::all();
        return view('admin-colors', compact('colors'));
    }

//    public function show_create(){
//        return view('admin-create-color');
//    }

    public function create_color(Request $request){
        $col = new Color();

        $request->validate([
            'name' => 'required',
        ]);

        $col->col_name = $request->get('name');

        $col->save();

        return redirect()->route('admin.colors')->with('success', 'Запись добавлена!');

    }

    public function delete_color($id){
        $col = Color::find($id);
        $col->delete();
        return redirect()->route('admin.colors')->with('success', 'Запись удалена!');
    }
    public function edit_color(Request $request, $id){

        $col = Color::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $col->col_name = $request->get('name');

        $col->save();

        return redirect()->route('admin.colors')->with('success', 'Изменено!');
    }

    public function show_edit($id){
        $col = Color::find($id);
        return view('admin-edit-color', compact('col'));
    }
}

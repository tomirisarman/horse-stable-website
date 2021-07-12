<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Line;
class LineController extends Controller
{
    public function index(){
        $lines = Line::all();
        return view('admin-lines', compact('lines'));
    }

    public function create_line(Request $request){
        $line = new Line();

        $request->validate([
            'name' => 'required',
        ]);

        $line->l_name = $request->get('name');

        $line->save();

        return redirect()->route('admin.lines')->with('success', 'Запись добавлена!');

    }

    public function delete_line($id){
        $line = Line::find($id);
        $line->delete();
        return redirect()->route('admin.lines')->with('success', 'Запись удалена!');
    }
    public function edit_line(Request $request, $id){

        $line = Line::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $line->l_name = $request->get('name');

        $line->save();

        return redirect()->route('admin.lines')->with('success', 'Изменено!');
    }

    public function show_edit($id){
        $line = Line::find($id);
        return view('admin-edit-line', compact('line'));
    }
}

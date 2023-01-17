<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function display(){
        return view('welcome')->with('todos', Todo::all());
    }

    public function create(Request $request){
        $todo = new Todo;
        $todo->description = $request->description;
        $todo->status = 'pending';
        $todo->save();

        return redirect()->route('welcome')->with('success', 'New todo added!');
    }

}

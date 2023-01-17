<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function display(){
        return view('welcome')->with('todos', Todo::orderByDesc('created_at')->get());
    }

    public function create(Request $request){
        $todo = new Todo;
        $todo->description = $request->description;
        $todo->status = 'pending';
        $todo->save();

        return redirect()->route('welcome')->with('success', 'New todo added!');
    }

    public function done(Request $request){
        $todo = Todo::find($request->id);
        $todo->status = 'done';
        $todo->save();

        return redirect()->route('welcome')->with('success', $todo->description.' completed!');
    }

    public function delete(Request $request){
        $todo = Todo::find($request->id);
        $todo->delete();

        return redirect()->route('welcome')->with('success', $todo->description.' deleted!');
    }

}

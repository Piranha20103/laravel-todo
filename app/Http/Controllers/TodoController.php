<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
      $todo = Todo::all();
      return view('index')->with('todos', $todo);

      // return view('index', ['todos' => Todo::all()]);
    }
    
    public function create(){
      return view('create');
    }
    
    public function store(){
      try {
        $this->validate(request(), [
            'name' => ['required'],
            'description' => ['required']
        ]);
      } catch (ValidationException $e) {
      }
    
      $data = request()->all();
    
      $todo = new Todo();
      $todo->name = $data['name'];
      $todo->description = $data['description'];
      $todo->save();
    
      session()->flash('success', 'Todo created succesfully');
    
      return redirect('/');
    }
    
    public function details(Todo $todo){
      return view('details')->with('todos', $todo);
    }
    
    public function edit(Todo $todo){
      return view('edit')->with('todos', $todo);
    }
    
    public function update(Todo $todo){  
      try {
        $this->validate(request(), [
            'name' => ['required'],
            'description' => ['required']
        ]);
      } catch (ValidationException $e) {
      }

      $data = request()->all();

      $todo->name = $data['name'];
      $todo->description = $data['description'];
      $todo->save();

      session()->flash('success', 'Todo updated successfully');

      return redirect('/');
      
    }

    public function delete(Todo $todo){
      $todo->delete();
      return redirect('/');
    }

}

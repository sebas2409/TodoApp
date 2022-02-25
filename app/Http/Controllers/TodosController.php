<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Index para mostrar los elementos
     * store guardar
     * update actualizar
     * destroy
     * edit para mostrar el formulario de edición
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
           'title'=>'required|min:3'
        ]);

        $todo = new Todo();
        $todo->title=$request->title;
        $todo->save();

        return redirect()->route('todos')->with('success','Tarea creada correctamente!');
    }

    public function index(): Factory|View|Application
    {
        $todos=Todo::all();
        return view('Todos.index',['todos'=>$todos]);
    }
    public function show($id): Factory|View|Application
    {
        $todos=Todo::find($id);
        return view('Todos.show',['todo'=>$todos]);
    }

    public function update(Request $request,$id): RedirectResponse
    {
        $todos = Todo::find($id);
        $todos->title = $request->title;
        $todos->save();
        //dd($todos); es como un consolelog
        return redirect()->route('todos')->with('success','Tarea actualizada!');
    }
    public function destroy($id): RedirectResponse
    {
        $todos=Todo::find($id);
        $todos->delete();
        return redirect()->route('todos')->with('success','Tarea Eliminada!');
    }
}

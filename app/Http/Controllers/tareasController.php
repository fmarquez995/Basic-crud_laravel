<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tareas;

class tareasController extends Controller
{
    /*Index para mostrar
    store para guardar
    update para actualizar
    destroy para eliminar
    edit para mostrar el form de edición
    */



    //INSERT
    public function store(Request $request){
        $request->validate([
            'title'=>'required|min:3'

        ]);

        $tareas=new tareas;
        $tareas->title=$request->title;
        $tareas->save();

        return redirect()->route('tareas')->with('success','Tarea creada correctamente');
    }


    //SELECT * FROM ...
    public function index(){
        $tareas=tareas::all();
        return view('tareas.index',['tareas'=>$tareas]);

    }


    public function show($id){
        $tareas=tareas::find($id);
        return view('tareas.show',['tareas'=>$tareas]);

    }


    public function update(Request $request,$id){
        $tareas=tareas::find($id);
        $tareas->title=$request->title;
        $tareas->save();
        //return view('tareas.index',['success'=>'tarea actualizada']);
        return redirect()->route('tareas')->with('success','tarea actualizada');
    }


    public function destroy($id){
        $tareas=tareas::find($id);
        $tareas->delete();
        return redirect()->route('tareas')->with('success','tarea eliminada');


    }
}

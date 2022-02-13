<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareaRequest;
use App\Models\Tarea;

class TareaController extends Controller
{
    
    public function index()
    {
        return view('welcome')->with([
            'tareas'=> Tarea::all(),
        ]);
    }

    
    public function create()
    {
        //
    }

   
    public function store(TareaRequest $request)
    {
        /* $tarea = Tarea::create($request->validated()); */

        
        $tarea = Tarea::create([
            'nombre'=> request()->nombre,
            'descripcion' => request()->descripcion
        ]);
        
        return redirect()->route('main');
    }

    
    public function show(Tarea $tarea)
    {
        //
    }

    
    public function edit(Tarea $tarea)
    {
        return view('edit')->with([
            'tarea' => $tarea,
        ]);
    }

    
    public function update(TareaRequest $request, Tarea $tarea)
    {

        $tarea->update($request->all());

        return redirect()->route('main');
    }

    
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('main');
    }
}

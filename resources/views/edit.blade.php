@extends('layout/plantilla')

@section('contenido')

<div class="row">
    <div class="col-12">
        <h1>Editar Tareas</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{route('tareas.update', ['tarea' => $tarea->id])}}" >
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="nombre" value="{{old('nombre') ?? $tarea->nombre}}" required>
                            </div>
                            <div class="form-row">
                                <label>Descripcion</label>
                                <input class="form-control" type="text" name="descripcion" value="{{old('descripcion') ?? $tarea->descripcion}}" required>
                            </div>
                            <button type="submit" class="btn btn-primary input-group-prepend mt-3">Actualizar Tarea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
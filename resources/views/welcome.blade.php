@extends('layout/plantilla')

@section('contenido')

<div class="row">
    <div class="col-12">
        <h1 class="text-center">Lista de Tareas</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{route('tareas.store')}}" >
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{old('nombre')}}" required>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{old('descripcion')}}" required>
                            <button type="submit" class="btn btn-primary input-group-prepend">Agregar Tarea</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tareas as $tarea)
                                <tr>
                                    @if ($tarea->estado == 'completo')
                                    <td>
                                        <form method="post" action="{{route('tareas.update', ['tarea' => $tarea->id])}}">
                                            @csrf
                                            @method('PUT')
                                            <input type="checkbox" class="btn-check" value="incompleto" name="estado" id="btn-check-outlined{{print($tarea->id);}}" autocomplete="off" checked>
                                            <button class="btn btn-outline-warning" for="btn-check-outlined{{print($tarea->id);}}"><i class="bi bi-dash-lg"></i></button>
                                        </form>
                                    </td>
                                    <td><s>{{$tarea->nombre}}</s></td>
                                    <td><s>{{$tarea->descripcion}}</s></td>
                                    <td><span class="badge bg-success">{{$tarea->estado}}</span></td>
                                    @else
                                    <td>
                                        <form method="post" action="{{route('tareas.update', ['tarea' => $tarea->id])}}">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="btn-check" value="completo" name="estado" id="btn-check-outlined{{print($tarea->id);}}" autocomplete="off">
                                            <button class="btn btn-outline-success" for="btn-check-outlined{{print($tarea->id);}}"><i class="bi bi-check2"></i></button>
                                        </form>
                                    </td>
                                    <td>{{$tarea->nombre}}</td>
                                    <td>{{$tarea->descripcion}}</td>
                                    <td><span class="badge bg-warning text-dark">{{$tarea->estado}}</span></td>
                                    @endif
                                    
                                    <td>
                                        <a href="{{route('tareas.edit', ['tarea' => $tarea->id])}}" class="btn btn-primary pr-2">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{route('tareas.destroy', ['tarea'=>$tarea->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
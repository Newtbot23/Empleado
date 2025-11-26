@extends('layouts.app')
@section('content')
<div class="conteiner">


{{-- //recibe la funcion mensaje desde el controler para mostrar un mensaje  --}}
@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('mensaje') }}
    </div>
@endif

    <h1>Lista de Empleados</h1>
    <a href="{{ route('empleado.create') }}" class="btn btn-success">Registrar Nuevo Empleado</a>
    <table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th class="Info">#</th>
            <th class="Info">Foto</th>
            <th class="Info">Nombre</th>
            <th class="Info">P. Apellido</th>
            <th class="Info">S. Apellido</th>
            <th class="Info">Correo</th>
            <th class="Info">Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $datos)
        <tr>
            <td>{{$datos->id}}</td>
            <td><img src="{{ asset('storage').'/'.$datos->Foto }}" alt="imagen usuario"></td>
            <td>{{$datos->Nombre}}</td>
            <td>{{$datos->PriApellido}}</td>
            <td>{{$datos->SegApellido}}</td>
            <td>{{$datos->Correo}}</td>
            <td>
                <a href="{{ route('empleado.edit', $datos->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ url('/empleado/'.$datos->id) }}" method="post">
                        @csrf
                   {{ method_field('DELETE') }}
                   <input type="submit" onclick="return confirm('¿Estas seguro de eliminar?')" value="Borrar" class="btn btn-danger">
                </form> </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection    
</body>
</html>
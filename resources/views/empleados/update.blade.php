@extends('layouts.app')
@section('content')
<div class="conteiner">
    <form action="{{ route('empleado.update', $empleado->id) }}" method="POST" enctype="multipart/form-data">
        @csrf   
        {{ method_field('PATCH') }}
        @include('empleados.form' , ['modo'=>'Actualizar'])
    </form> 
</div>
@endsection
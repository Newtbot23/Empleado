@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <form action="{{ route('empleado.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('empleados.form', ['modo'=>'Guardar'])
</form>
</div>
@endsection


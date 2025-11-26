@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<a href="{{url('empleado')}}" class="btn btn-primary mb-3 mx-5 ">Ver Empleados Registrados</a>
<input type="text" class="form-control mb-3 mx-5" name="Nombre" id="Nombre" placeholder="Introduzca Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}"><br>
    <input type="text"class="form-control mb-3 mx-5" name="PriApellido" id="PriApellido" placeholder="Introduzca Primer Apellido" value="{{ isset($empleado->PriApellido)?$empleado->PriApellido:''}}"><br>
    <input type="text"class="form-control mb-3 mx-5" name="SegApellido" id="SegApellido" placeholder="Introduzca Segundo Apellido" value="{{ isset($empleado->SegApellido)?$empleado->SegApellido:''}}"   ><br>
    <input type="text"class="form-control mb-3 mx-5" name="Correo" id="Correo" placeholder="Introduzca Email" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}"><br>
    <input type="file"class="form-control mb-3 mx-5" name="Foto" id="Foto" value="{{ isset($empleado->Foto)?$empleado->Foto:'' }}"><br>
    <br class="mb-3 mx-5">Imagen Actual<br>
    <img src="{{ (isset($empleado->Foto))?asset('storage').'/'.$empleado->Foto : '' }}" alt="imagen usuario" class="img-thumbnail mb-3 mx-5">
    <input type="submit" value="{{ $modo }} Registro"class="btn btn-success mt-2 mb-3 mx-5">
<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listado['empleados'] = empleado::paginate(5);
        return view('empleados.index', $listado);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validacion de los campos al crear un registro
        $validacion = [
            'Nombre' => 'required|string|max:90',
            'PriApellido' => 'required|string|max:90',
            'SegApellido' => 'required|string|max:90',
            'Correo' => 'required|string|max:90',
            'Foto' => 'required|image|max:10240',
        ];
        $msj = [
            'required' => 'El :attribute es requerido',
        ];
        if ($request->hasfile('Foto')) {
            $validacion = ['Foto' => 'required|max:10000|mimes:jpg,png,jpeg'];
            $msj = ['Foto.required' => 'La :attribute es obligatoria'];
        }
        $this->validate($request, $validacion, $msj);
        //imprimir los datos del formulario
        $datosEmpleado = $request->except('_token');
        if ($request->hasFile('Foto')) {
            $datosEmpleado['Foto'] = $request->file('Foto')->store('fotos', 'public');
        }
        empleado::insert($datosEmpleado);
        return redirect('empleado')->with('mensaje', 'Registro Ingresado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = empleado::findOrFail($id);
        return view('empleados.update', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosEmpleado = $request->except(['_token', '_method']);

        // verificacion foto nueva 
        if ($request->hasfile('Foto')) {
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
        empleado::where('id', '=', $id)->update($datosEmpleado);
        $empleado = empleado::findOrFail($id);
        return redirect('empleados')->with('mensaje', 'Registro Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = empleado::findOrFail($id);
        if (Storage::delete('public/' . $empleado->Foto)) {
            empleado::destroy($id);
        }
        return redirect('empleado')->with('mensaje', 'Registro Eliminado con exito');
    }
}

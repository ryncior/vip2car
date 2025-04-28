<?php

namespace App\Http\Controllers;

use App\Models\encuesta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EncuestaController extends Controller
{
    public function showFormCar()
    {   
        return view('car.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Placa' => 'required|string|max:255',
            'Marca' => 'required|string|max:255',
            'fecha_fab' => 'required|date',
            'Nombre' => 'required|string|max:255',
            'Apellido' => 'required|string|max:255',
            'dni' => 'required|integer',
            'mail' => 'required|email|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Encuesta::create($request->all());

        return redirect()->route('car.add')
            ->with('success', 'Encuesta creada exitosamente.');
    }

    public function showListCar()
    {   
        $encuestas= Encuesta::all();
        return view('car.list',compact('encuestas'));
    
    }

    public function DeleteCar($id)
    {   
        $Encuesta = Encuesta::findOrFail($id);
        $Encuesta->delete();       
        $encuestas= Encuesta::all();
        return view('car.list',compact('encuestas'));
    
    }
    public function showEditCar($id)
    {   
        $car = Encuesta::findOrFail($id);
        return view('car.edit', compact('car'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Placa' => 'required|string|max:20|unique:encuestas,Placa,'.$id,
            'Marca' => 'required|string|max:50',
            'fecha_fab' => 'required|date',
            'Nombre' => 'required|string|max:50',
            'Apellido' => 'required|string|max:50',
            'dni' => 'required|numeric|digits_between:1,20',
            'mail' => 'required|email|max:100',
            'telefono' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $encuesta = Encuesta::findOrFail($id);
        $encuesta->update([
            'Placa' => $request->Placa,
            'Marca' => $request->Marca,
            'fecha_fab' => $request->fecha_fab,
            'Nombre' => $request->Nombre,
            'Apellido' => $request->Apellido,
            'dni' => $request->dni,
            'mail' => $request->mail,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('car.list')
            ->with('success', 'Vehículo actualizado correctamente');
    }
}

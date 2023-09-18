<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\User;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function crear_cargo(){
        $departamentos = Departamento::all();
        return view('/cargo/crearCargo', compact('departamentos'));
    }

    public function salvar_cargo(Request $campos){
        $cargo = new Cargo();

        $cargo->nombre = $campos->nombre;
        $cargo->dep_id = $campos->departamento;
        $cargo->fec_creacion = $campos->fecha;

        $cargo->save();

        return redirect()->route('index.User');
    }

    public function eliminar_cargo($id){
        $cargo = Cargo::findOrFail($id);

        $cargo->delete();

        return redirect()->route('index.User');
    }

    public function act_cargo($id){
        $cargo = Cargo::findOrFail($id);


        $departamentos = Departamento::all();
        return view('/cargo/act_cargo', compact('cargo', 'departamentos'));
    }

    public function actualizar_cargo(Request $campos, $id){
        $elemento = Cargo::findOrFail($id);

        $elemento->nombre = $campos->input('nombre');
        $elemento->dep_id = $campos->input('departamento');
        $elemento->fec_creacion = $campos->input('fecha');

        $elemento->save();

        return redirect()->route('index.User');
    }
}

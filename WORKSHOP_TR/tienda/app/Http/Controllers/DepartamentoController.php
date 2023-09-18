<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function crear_dpto(){
        return view('/departamento/crear_dpto');
    }

    public function salvar_dpto(Request $campos){
        $arr_errores = [];
        $dpto = new Departamento();

        $dpto->nombre = $campos->nombre;
        $dpto->fec_creacion = $campos->fecha;

        if(!$campos->nombre){
            $arr_errores[] = "falta el nombre del departamento";
        }

        if(!$campos->fecha){
            $arr_errores[] = "falta la fecha de creacion";
        }

        if(empty($arr_errores)){
            $dpto->save();

            return redirect()->route('index.User');
        } else{
            return redirect()->route('dpto.crear_view')->with('falto el nombre o la fecha de creacion');
        }



    }

    public function eliminar_dpto($id){
        $dpto = Departamento::findOrFail($id);

        $dpto->delete();

        return redirect()->route('index.User');
    }

    public function act_dpto($id){
        $dpto = Departamento::findOrFail($id);
        return view('/departamento/act_departamento', compact('dpto'));
    }

    public function actualizar_dpto(Request $campos, $id){
        $departamento = Departamento::findOrFail($id);

        $departamento->nombre = $campos->input('nombre');
        $departamento->fec_creacion = $campos->input('fecha');

        $departamento->save();

        return redirect()->route('index.User');
    }
}

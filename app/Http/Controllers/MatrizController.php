<?php

namespace App\Http\Controllers;

use App\Models\matriz;
use App\Models\matrizFinal;
use App\Models\dato;
use App\Models\datoFinal;
use Illuminate\Http\Request;

class MatrizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return redirect('/4');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matrizGenerada = $request->input('matrizGenerada');
        $matrizTemp = $request->input('matrizTemp');
    
        // Crear una instancia de Matriz
        $matriz = Matriz::create([
            'x' => count($matrizGenerada[0]),
            'y' => count($matrizGenerada),
        ]);
    
        // Crear una instancia de MatrizFinal
        $matrizFinal = MatrizFinal::create([
            'id_matriz' => $matriz->id,
            'x' => count($matrizTemp[0]),
            'y' => count($matrizTemp),
        ]);
    
        // Guardar los datos de la matriz original (matrizGenerada) en la tabla 'dato'
        foreach ($matrizGenerada as $fila => $valores) {
            foreach ($valores as $columna => $valor) {
                Dato::create([
                    'id_matriz' => $matriz->id,
                    'x' => $fila,
                    'y' => $columna,
                    'valor' => $valor,
                ]);
            }
        }
    
        // Guardar los datos de la matriz temporal (matrizTemp) en la tabla 'dato_final'
        foreach ($matrizTemp as $fila => $valores) {
            foreach ($valores as $columna => $valor) {
                DatoFinal::create([
                    'id_matriz_final' => $matrizFinal->id,
                    'x' => $fila,
                    'y' => $columna,
                    'valor' => $valor,
                ]);
            }
        }
    
        return "true";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\matriz  $matriz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matriz = Matriz::find($id);
        $matrizFinal = MatrizFinal::where('id_matriz', $id)->first();
        $datosMatriz = Dato::where('id_matriz', $id)->get();
        $datosMatrizFinal = DatoFinal::where('id_matriz_final', $matrizFinal->id)->get();

    return response()->json([
        'matriz' => $matriz,
        'matrizFinal' => $matrizFinal,
        'datosMatriz' => $datosMatriz,
        'datosMatrizFinal' => $datosMatrizFinal
    ]);
    }

    public function showLastId()
    {
        $lastId = Matriz::orderBy('id', 'desc')->first()->id;
        $newId = $lastId + 1;

        return view('ejercicio4-p2', compact('newId'));
    }
}

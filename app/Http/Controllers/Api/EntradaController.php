<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entrada;
use Validator;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEntradas()
    {
        return Entrada::all();
    }

    
    public function createEntrada(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validData->fails()){
            return response()->json(['Error, Missing Data'],404);
        }else{
            $entrada = new Entrada;
            $entrada->name = $request->input('name');
            if($entrada->save()){
                return response()->json(['Success'=>'entrada added'],200);
            }else{
                return response()->json(['Error Saving Data'],404);
            }
        }
    }

}

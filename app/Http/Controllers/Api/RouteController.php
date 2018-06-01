<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DriverPosition;
use Validator;


class RouteController extends Controller
{
    
    public function getDriverPosition($id){
        return DriverPosition::where('id_driver','=',$id)->with(['user' => function($query) { $query->select('id', 'name', 'avatar');}])->get();
    }

}

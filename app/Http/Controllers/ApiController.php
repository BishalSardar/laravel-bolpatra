<?php

namespace App\Http\Controllers;

use App\Models\Bolpatra;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function allBolpatra()
    {
        $bolpatra = Bolpatra::all();
        return response([
            'status' => '200',
            'data' => $bolpatra,
        ]);
    }

    function singleBolpatra($id)
    {
        $bolpatra = Bolpatra::find($id);
        return response([
            'status' => '200',
            'data' => $bolpatra,
        ]);
    }
}

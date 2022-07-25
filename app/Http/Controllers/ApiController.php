<?php

namespace App\Http\Controllers;

use App\Models\Bolpatra;
use App\Models\Save;
use Exception;
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

    function save(Request $request)
    {
        try {

            $bookmark = new Save();
            $bookmark->user_id = $request->user_id;
            $bookmark->bolpatra_id = $request->bolpatra_id;
            $bookmark->save();

            return response([
                'status' => '200',
            ]);
        } catch (Exception $exception) {
            return response([
                'status' => '400',
                'exception' => 'error' . $exception
            ]);
        }
    }

    function allSave()
    {
        $save = Save::all();
        return response([
            'status' => '200',
            'bookmark' => $save,
        ]);
    }

    function search(Request $request)
    {
        $title = $request->title;
        $bolpatra = Bolpatra::where('title', 'LIKE', $title)->get();
        return response([
            'status' => '200',
            'bolpatra' => $bolpatra
        ]);
    }
}

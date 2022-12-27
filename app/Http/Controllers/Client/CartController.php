<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart($id) {
        $request = new Request();
        // $data = $request->except('_token');

        // return dd($request);

        // return json_decode($request->product_list);
        // return response()->json($request);

        return [
            'status' => 'sucess',
            'message' => 'ok'
        ];
    }
}

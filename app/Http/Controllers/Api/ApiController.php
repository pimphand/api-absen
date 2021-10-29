<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function api(Request $request)
    {
        $validator = Validator::make( $request->all(),[
            "method" => ['required']
        ],
        [
            "method.required" => "data yang anda masukan tidak valid"
        ]);
        if($validator->fails()){
            return response()->json([
                "status" => 99,
                "message" => "REQUEST TIDAK VALID"
            ]);
        }

        if($request->method){
            switch ($request->method){
                case 'login':
                    return AuthController::store($request);
                    break;
                case 'absen':
                    return AbsenController::store($request);
                    break;
            }
        }else{
            return response()
            ->json([
                "status" => "99",
                "message" => "REQUEST TIDAK VALID"
            ]);
        }
    }
}

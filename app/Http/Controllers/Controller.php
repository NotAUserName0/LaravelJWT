<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['free']]);
    }

    public function login(Request $request){
        try{
            $jsonUser = $request->json()->all();

            $user = Product::where('correo',$jsonUser['correo'])->get();

            return response()->json([
                'status'=>'accepted',
                'user'=>$user
            ],200);
        }catch(QE $exception){
            return response()->json([
                'status'=>'rejected',
                'message'=>$exception->errorInfo,
            ],400);
        }
    }
}

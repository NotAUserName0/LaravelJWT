<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \Illuminate\Database\QueryException as QE;
use App\Models\UserLogin;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

   /* public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['free']]);
    }*/

    public function index(){
        return response()->json([
            'status'=>'accepted',
        ],200);
    }

    public function login(Request $request){
        try{
            $jsonUser = $request->json()->all();

            $user = User::where('email',$jsonUser['email'])->get();

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

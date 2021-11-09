<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\TabelPemilikHewan;

class ApiLoginController extends Controller
{
    public function login( Request $request){
       $request->validate([
            'username' => 'required',
            'password' => 'required'
       ]);

       $user = TabelPemilikHewan::where('username', $request->username)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {

            return response()->json([
                'result'  => 'gagal',
                'message' => 'invalid login'
            ]);
            
        }

        return response()->json([
            'result'   => 'berhasil',
            'id'       => $user->id,
            'nama'     => $user->name

        ]);
    }

    public function get_profil (Request $request){
        $user = TabelPemilikHewan::where('id', $request->id)->first();
        return response()->json(
            
                $user
            
        );
    }
}

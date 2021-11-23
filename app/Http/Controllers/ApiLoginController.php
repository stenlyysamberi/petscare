<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\TabelPemilikHewan;
use Throwable;

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
            'id'       => $user->id_pemilik_hewan,
            'nama'     => $user->name

        ]);
    }

    public function get_profil (Request $request){
        $user = TabelPemilikHewan::where('id_pemilik_hewan', $request->id)->first();
        return response()->json(
            
                $user
            
        );
    }


    public function edit_profil(Request $request, $id){
        $request->validate([
            
            'name'       => 'required',
            'alamat'     => 'required',
            'phone'      => 'required'
            
        ]);

        try{
            TabelPemilikHewan::find($id)->update($request->all());
            return response()->json([
                'result' => 'berhasil'
            ]);
        }catch(Throwable $th){
            return response()->json([
                'result' => $th->getMessage()
            ]);
        }

       
    }
}

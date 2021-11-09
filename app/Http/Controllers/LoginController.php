<?php

namespace App\Http\Controllers;
use App\User;
use Dotenv\Regex\Result;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){

        // return User:: all();
        return view('login',[
           
            'title' => 'Admin'
        ]);
    }

    


    public function authenticate(Request $request){
        $credentials = $request->validate([
            
            "username"    => 'required',
            "password"    => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginGagal', 'Login failed');
        
    //dd($credentials);
    }

    public function keluar(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');

    }


    public function create_dokter(Request $request){
        
        $simpan =  $request->validate([
            'nama'       => 'required',
            'username'   => 'required',
            'phone' => 'required',
            'password'   => 'required',
            'level'      => 'required',
            'remember_token' => 'required',
            'image'       => 'image|file|max:1024'
          
        ]);

        if($request->file('image')){
            $simpan['image'] = $request->file('image')->store('image-file');
        }

        $simpan['password'] = Hash::make($simpan['password']);
        User::create($simpan);
 
        $request->session()->flash('user', ',has been created');
        return redirect('/dokter');

    }


    public function hapus( Request $request, $id){
        User::where('id', $id)-> delete();
        $request->session()->flash('user', 'has been deleted');
        return redirect('/dokter');
    }

    public function update(Request $request, $id){

        //return dd($id);
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'level' => 'required',
            'remember_token' => 'required',
            'gambar' => 'image|file|max:2024'
        ]);

        if($request->file('gambar')){
            $simpan['gambar'] = $request->file('gambar')->store('image-file');
        }

        User::find($id)->update($request->all());
        $request->session()->flash('user', 'news update has been successfuly!');
        return redirect('/dokter');

        // User::find($id)->update($request->all());
    }

    
}

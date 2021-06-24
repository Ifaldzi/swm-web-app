<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;
use App\Models\DataDiriPetugas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AuthenticationController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validator($request);



        if(Auth::attempt($request->only('username','password'))){
            //Authentication passed...
            return redirect()
                ->intended(route('home'))
                ->with('status','You are Logged in as Admin!');
        }
        //Authentication failed...
        return $this->loginFailed();
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'username'    => 'required|exists:administrator',
            'password' => 'required|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'username.exists'       => 'Username tersebut tidak ada',
            'password.required'     => 'Password wajib diisi',
            'password.min'     => 'Password minimal 4 karakter',
            'password.max'     => 'Password minimal 255 karakter',
        ];

        //validate the request.
        $request = Validator::make($request->all(), $rules, $messages);
    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    public function showFormRegistration()
    {
        return view('registration');
    }

    public function registration(Request $request)
    {
        $id = 1 ;
        DB::table('data_diri_petugas')->insert([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'id_petugas' => $id
        ]);
        return redirect('/registration');
 
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('status','Admin has been logged out!');
    }
}

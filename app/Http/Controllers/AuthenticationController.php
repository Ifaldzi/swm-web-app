<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KendaraanPengangkutSampah;
use App\Models\DataDiriPetugas;
use App\Models\PetugasKebersihan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;


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
        if(Auth::attempt($request->only('username','password'))){
            //Authentication passed...
            return redirect()
            ->intended(route('home'))
            ->with('status','You are Logged in as Admin!');
        }
        else{
            //Authentication failed...
            return $this->loginFailed($request);
        }
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'username'    => 'required|exists:administrator',
            'password'    => 'required|exists:administrator,password',

            'username_petugas'    => 'required|unique:petugas_kebersihan',
            'password_petugas' => 'required|min:4|max:255',
            'id_truk' => 'required',
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required|min:11|max:13',
            'alamat' => 'required|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'username.exists'       => 'Username tersebut tidak ada',
            'password.required'     => 'Password wajib diisi',
            'password.exists'       => 'Password salah',

            'username_petugas.required'     => 'Username wajib diisi',
            'username_petugas.unique'     => 'Username tersebut telah digunakan',
            'password_petugas.required'     => 'Password wajib diisi',
            'password_petugas.min'     => 'Password minimal 4 karakter',
            'password_petugas.max'     => 'Password minimal 255 karakter',
            'id_truk.required'     => 'truk wajib dipilih',
            'nama.required'     => 'nama wajib diisi',
            'nama.max'     => 'Nama maksimal 255 karakter',
            'jenis_kelamin.required'     => 'jenis kelamin wajib dipilih',
            'no_telp.required'     => 'Nomor Telepon wajib diisi',
            'no_telp.min'     => 'Nomor Telepon min 11 digit',
            'no_telp.max'     => 'Nomor Telepon maks 13 digit',
            'no_telp.numeric'     => 'Nomor Telepon harus berupa angka',
            'alamat.required'     => 'Alamat wajib diisi',
            'alamat.max'     => 'Alamat maksimal 255 karakter',
        ];

        $password = Hash::make($request->password);
        $input = $request->all();
        Arr::set($input, 'password', $password);

        //validate the request.
        return Validator::make($input, $rules, $messages);
    }

    private function loginFailed(Request $request){
        $validator=$this->validator($request);

        if($validator->fails())
        {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
    }

    public function showFormRegistration()
    {
        $trucks = KendaraanPengangkutSampah::all();
        // return view('monitoring/truk',['trucks'=>$trucks]);
        return view('registration',['trucks'=>$trucks]);
    }

    public function registration(Request $request)
    {
        $validator=$this->validator($request);
        if($validator->fails())
        {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        $id_administrator = Auth::id();
        $petugasKebersihan = PetugasKebersihan::create([
            'username_petugas' => $request->username_petugas,
            'password_petugas' =>  Hash::make($request->password_petugas),
            'id_truk' => $request->id_truk,
            'id_administrator' => $id_administrator,
        ]);

            DataDiriPetugas::insert([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'id_petugas' => $petugasKebersihan->id,
        ]);
        return redirect('/registration');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('status','Admin has been logged out!');
    }
}

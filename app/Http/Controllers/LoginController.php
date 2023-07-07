<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {  
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            if (Auth::User()->role == "1")
            {
                return \Redirect::to('/admin/home');
            }
            elseif (Auth::User()->role == "2") {
                return \Redirect::to('/sekolah/home');
            }else{
                \Session::flash('msg_login','Email Atau Password Salah!');
                return \Redirect::to('/');
            }

        }
        else
        {
            \Session::flash('msg_login','Email Atau Password Salah!');
            return \Redirect::to('/');
        }
    }
    public function daftar() {
        return view('daftar');
    }
    function prosesDaftar(Request $request) {
        DB::beginTransaction();
        try {
            $namafoto = "Logo"."  ".$request->name." ".date("Y-m-d H-i-s");
            $extention = $request->file('logo')->extension();
            $photo = sprintf('%s.%0.8s', $namafoto, $extention);
            $destination = base_path() .'/public/logo';
            $request->file('logo')->move($destination,$photo);

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->telepon = $request->telepon;
            $user->alamat = $request->alamat;
            $user->logo = $photo;
            $user->role = 2;
            $user->password = bcrypt($request->password);
            $user->save();

            DB::commit();
            \Session::flash('msg_success','Berhasil Mendaftar!');
            return \Redirect::route('daftar');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_login','Somethings Wrong!');
            return \Redirect::route('daftar');
        }
    }
    public function logout(){
        Auth::logout();
      return \Redirect::to('/');
    }
}

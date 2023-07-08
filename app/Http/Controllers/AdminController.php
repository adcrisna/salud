<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Pengajuan;
use Redirect;
use Auth;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function index(){
        $data['title'] = "Dashboard";
        $data['nama'] = Auth::user()->name;
        $data['sekolah'] = User::where('role',2)->get();
        $data['pengajuan'] = Pengajuan::where('status','Review')->get();
        $data['jadwal'] = Jadwal::all();
        return view('Admin/index',$data);
    }
    public function profile()
    {
        $data['title'] = "Profile";
        $data['nama'] = Auth::user()->name;
        $data['admin'] = User::find(Auth::user()->id);
        return view('Admin/profile',$data);
    }
    public function updateProfile(Request $request){
        DB::beginTransaction();
        try {
            if (empty($request->logo)) {
                if (empty($request->password)) {
                    $user = User::find($request->id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->telepon = $request->telepon;
                    $user->alamat = $request->alamat;
                    $user->save();
                }else {
                    $user = User::find($request->id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->telepon = $request->telepon;
                    $user->alamat = $request->alamat;
                    $user->password = bcrypt($request->password);
                    $user->save();
                }
            }else {
                if (empty($request->password)) {
                    $user = User::find($request->id);

                    \File::delete(public_path('logo/'.$user->logo));

                    $namafoto = "Logo"."  ".$request->name." ".date("Y-m-d H-i-s");
                    $extention = $request->file('logo')->extension();
                    $photo = sprintf('%s.%0.8s', $namafoto, $extention);
                    $destination = base_path() .'/public/logo';
                    $request->file('logo')->move($destination,$photo);

                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->telepon = $request->telepon;
                    $user->alamat = $request->alamat;
                    $user->logo = $photo;
                    $user->save();
                }else {
                    $user = User::find($request->id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->telepon = $request->telepon;
                    $user->alamat = $request->alamat;
                    $user->logo = $photo;
                    $user->password = bcrypt($request->password);
                    $user->save();
                }
            }
             DB::commit();
            \Session::flash('msg_success','Profile Berhasil Diubah!');
            return Redirect::route('admin.profile');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.profile');
        }
    }

    public function sekolah(){
        $data['title'] = "Data Sekolah";
        $data['nama'] = Auth::user()->name;
        $data['sekolah'] = User::where('role',2)->get();
        return view('Admin/sekolah',$data);
    }
    public function addSekolah(Request $request){
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
            \Session::flash('msg_success','Sekolah Berhasil Ditambah!');
            return Redirect::route('admin.sekolah');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.sekolah');
        }
    }
    public function updateSekolah(Request $request){
        DB::beginTransaction();
        try {
            if (empty($request->logo)) {
                if (empty($request->password)) {
                    $user = User::find($request->id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->telepon = $request->telepon;
                    $user->alamat = $request->alamat;
                    $user->save();
                }else {
                    $user = User::find($request->id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->telepon = $request->telepon;
                    $user->alamat = $request->alamat;
                    $user->password = bcrypt($request->password);
                    $user->save();
                }
            }else {
                if (empty($request->password)) {
                    $user = User::find($request->id);

                    \File::delete(public_path('logo/'.$user->logo));

                    $namafoto = "Logo"."  ".$request->name." ".date("Y-m-d H-i-s");
                    $extention = $request->file('logo')->extension();
                    $photo = sprintf('%s.%0.8s', $namafoto, $extention);
                    $destination = base_path() .'/public/logo';
                    $request->file('logo')->move($destination,$photo);

                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->telepon = $request->telepon;
                    $user->alamat = $request->alamat;
                    $user->logo = $photo;
                    $user->save();
                }else {
                    $user = User::find($request->id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->telepon = $request->telepon;
                    $user->alamat = $request->alamat;
                    $user->logo = $photo;
                    $user->password = bcrypt($request->password);
                    $user->save();
                }
            }
             DB::commit();
            \Session::flash('msg_success','Sekolah Berhasil Diubah!');
            return Redirect::route('admin.sekolah');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.sekolah');
        }
    }
    public function deleteSekolah($id)
    {
        DB::beginTransaction();
        try {
            $getSekolah = User::where('id',$id)->first();
            \File::delete(public_path('logo/'.$getSekolah->logo));
            $sekolah = User::where('id',$id)->delete();
            DB::commit();
            \Session::flash('msg_success','Data Sekolah Berhasil Dihapus!');
            return Redirect::route('admin.sekolah');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.sekolah');
        }
    }

    public function pengajuan(){
        $data['title'] = "Data Pengajuan";
        $data['nama'] = Auth::user()->name;
        $data['pengajuan'] = Pengajuan::where('status','!=','null')->get();
        return view('Admin/pengajuan',$data);
    }
    public function detailPengajuan($id){
        $data['title'] = "Detail Pengajuan";
        $data['nama'] = Auth::user()->name;
        $data['detail'] = Pengajuan::where('id',$id)->first();
        return view('Admin/detailPengajuan',$data);
    }
    public function updatePengajuan(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->status == 'Diterima') {
                $pengajuan = Pengajuan::find($request->id);
                $pengajuan->status = $request->status;
                $pengajuan->save();

                $jadwal = new Jadwal;
                $jadwal->sekolah_id = $pengajuan->sekolah_id;
                $jadwal->pengajuan_id = $pengajuan->id;
                $jadwal->jumlah_siswa = $pengajuan->jumlah_siswa;
                $jadwal->waktu_penjadwalan = $request->waktuPengajuan." ".$request->jam;
                $jadwal->save();
            }else{
                $pengajuan = Pengajuan::find($request->id);
                $pengajuan->status = $request->status;
                $pengajuan->save();
            }
            DB::commit();
            \Session::flash('msg_success','Pengajuan Berhasil Update!');
            return Redirect::route('admin.pengajuan');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.pengajuan');
        }
    }

    public function jadwal(){
        $data['title'] = "Data Jadwal";
        $data['nama'] = Auth::user()->name;
        $data['jadwal'] = Jadwal::all();
        return view('Admin/jadwal',$data);
    }

    public function laporan(Request $request) {
        $jadwal = Jadwal::whereBetween('waktu_penjadwalan', [date('Y-m-d 23:59:00', strtotime($request->tanggalAwal)), date('Y-m-d 23:59:00', strtotime($request->tanggalAkhir))])->get();
        $sekolah = User::find(Auth::user()->id);
        $pdf = Pdf::loadView('Admin.laporan', compact('jadwal','sekolah'));
        return $pdf->stream();
    }
}

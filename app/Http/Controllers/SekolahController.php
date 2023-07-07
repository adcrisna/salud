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

class SekolahController extends Controller
{
    public function index(){
        $data['title'] = "Dashboard";
        $data['nama'] = Auth::user()->name;
        $data['pengajuan'] = Pengajuan::where('sekolah_id',Auth::user()->id)->get();
        $data['jadwal'] = Jadwal::where('sekolah_id',Auth::user()->id)->get();
        return view('Sekolah/index',$data);
    }
    public function profile()
    {
        $data['title'] = "Profile";
        $data['nama'] = Auth::user()->name;
        $data['sekolah'] = User::find(Auth::user()->id);
        return view('Sekolah/profile',$data);
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
            return Redirect::route('sekolah.profile');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sekolah.profile');
        }
    }

    public function pengajuan(){
        $data['title'] = "Data Pengajuan";
        $data['nama'] = Auth::user()->name;
        $data['sekolah'] = User::find(Auth::user()->id);
        $data['pengajuan'] = Pengajuan::where('sekolah_id',Auth::user()->id)->get();
        return view('Sekolah/pengajuan',$data);
    }
    public function addPengajuan(Request $request){
        DB::beginTransaction();
        try {
            $pengajuan = new Pengajuan;
            $pengajuan->sekolah_id = $request->id;
            $pengajuan->jumlah_siswa = $request->jumlahSiswa;
            $pengajuan->no_surat = $request->surat;
            $pengajuan->perihal = $request->perihal;
            $pengajuan->kepala_sekolah = $request->kepalaSekolah;
            $pengajuan->nip = $request->nip;
            $pengajuan->status = null;
            $pengajuan->lampiran = null;
            $pengajuan->save();

            DB::commit();
            \Session::flash('msg_success','Sekolah Berhasil Ditambah!');
            return Redirect::route('sekolah.pengajuan');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sekolah.pengajuan');
        }
    }

    public function jadwal(){
        $data['title'] = "Data Jadwal";
        $data['nama'] = Auth::user()->name;
        $data['jadwal'] = Jadwal::where('sekolah_id',Auth::user()->id)->get();
        return view('Sekolah/jadwal',$data);
    }

    public function pdfPengajuan($id) {
        $pengajuan = Pengajuan::find($id);
        $sekolah = User::find($pengajuan->sekolah_id);
        $pdf = Pdf::loadView('Pdf.pengajuan', compact('pengajuan','sekolah'));
        return $pdf->stream();
    }
    public function sendPengajuan(Request $request)
    {
        DB::beginTransaction();
        try {
            $pengajuan = Pengajuan::find($request->id);
            $namalampiran = "Lampiran"."  ".$pengajuan->Sekolah->name." ".date("Y-m-d H-i-s");
            $extention = $request->file('lampiran')->extension();
            $lampiran = sprintf('%s.%0.8s', $namalampiran, $extention);
            $destination = base_path() .'/public/lampiran';
            $request->file('lampiran')->move($destination,$lampiran);

            $pengajuan->status = "Review";
            $pengajuan->lampiran = $lampiran;
            $pengajuan->save();

            DB::commit();
            \Session::flash('msg_success','Pengajuan Berhasil Diupload!');
            return Redirect::route('sekolah.pengajuan');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sekolah.pengajuan');
        }
    }
}

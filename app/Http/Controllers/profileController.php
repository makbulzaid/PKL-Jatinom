<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\office;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //dashboard
    //view
    public function beranda(){
        return view('dashboard');
    }


    //office
    //view //read
    public function office(){
        $dtOffice = office::all();
        return view('pegawai-office', compact('dtOffice'));
    }
    //create
    public function store_office(Request $request)
    {
        $this->validate($request, rules:[
            'id_office' => 'required',
            'nama_office' => 'required',
            'nik_office' => '',
            'ktp_office' => '',
            'alamat_office' => 'required',
            'tempat_lahir_office' => 'required',
            'tgl_lahir_office' => 'required',
            'usia_office' => 'required',
            'riwayat_pendidikan_office' => 'required',
            'golongan_darah_office' => '',
            'jenis_kelamin_office' => 'required',
            'status_office' => 'required',
            'jumlah_anak_office' => 'required',
            'ibu_office' => 'required',
            'tgl_masuk_office' => 'required',
            'masa_kerja_office' => 'required',
            'pekerja_office' => 'required',
            'bagian_office' => 'required',
            'gaji_office' => 'required',
            'no_kpj_office' => '',
            'tgl_masuk_bpjsket_office' => '',
            'tgl_keluar_bpjsket_office' => '',
            'no_peserta_office' => '',
            'tgl_masuk_bpjskes_office' => '',
            'tgl_keuar_bpjskes_office' => '',
        ]);

        office::create ([
            'id_office' => $request->id_office,
            'nama_office' => $request->nama_office,
            'nik_office' => $request->nik_office,
            'ktp_office' => $request->ktp_office,
            'alamat_office' => $request->alamat_office,
            'tempat_lahir_office' => $request->tempat_lahir_office,
            'tgl_lahir_office' => $request->tgl_lahir_office,
            'usia_office' => $request->usia_office,
            'riwayat_pendidikan_office' => $request->riwayat_pendidikan_office,
            'golongan_darah_office' => $request->golongan_darah_office,
            'jenis_kelamin_office' => $request->jenis_kelamin_office,
            'status_office' => $request->status_office,
            'jumlah_anak_office' => $request->jumlah_anak_office,
            'ibu_office' => $request->ibu_office,
            'tgl_masuk_office' => $request->tgl_masuk_office,
            'masa_kerja_office' => $request->masa_kerja_office,
            'pekerja_office' => $request->pekerja_office,
            'bagian_office' => $request->bagian_office,
            'gaji_office' => $request->gaji_office,
            'no_kpj_office' => $request->no_kpj_office,
            'tgl_masuk_bpjsket_office' => $request->tgl_masuk_bpjsket_office,
            'tgl_keluar_bpjsket_office' => $request->tgl_keluar_bpjsket_office,
            'no_peserta_office' => $request->no_peserta_office,
            'tgl_masuk_bpjskes_office' => $request->tgl_masuk_bpjskes_office,
            'tgl_keluar_bpjskes_office' => $request->tgl_keluar_bpjskes_office,
        ]);

        return redirect('/office')->with('success', 'Data Berhasil Disimpan!');
    }
    //update
    public function edit_office(Request $request, $id_office)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            office::where(['id_office'=>$id_office])->update([
            'nama_office'=>$data['nama_office'],
            'nik_office'=>$data['nik_office'],
            'ktp_office'=>$data['ktp_office'],
            'alamat_office'=>$data['alamat_office'],
            'tempat_lahir_office'=>$data['tempat_lahir_office'],
            'tgl_lahir_office'=>$data['tgl_lahir_office'],
            'usia_office'=>$data['usia_office'],
            'riwayat_pendidikan_office'=>$data['riwayat_pendidikan_office'],
            'golongan_darah_office'=>$data['golongan_darah_office'],
            'jenis_kelamin_office'=>$data['jenis_kelamin_office'],
            'status_office'=>$data['status_office'],
            'jumlah_anak_office'=>$data['jumlah_anak_office'],
            'ibu_office'=>$data['ibu_office'],
            'tgl_masuk_office'=>$data['tgl_masuk_office'],
            'masa_kerja_office'=>$data['masa_kerja_office'],
            'pekerja_office'=>$data['pekerja_office'],
            'bagian_office'=>$data['bagian_office'],
            'gaji_office'=>$data['gaji_office'],
            'no_kpj_office'=>$data['no_kpj_office'],
            'tgl_masuk_bpjsket_office'=>$data['tgl_masuk_bpjsket_office'],
            'tgl_keluar_bpjsket_office'=>$data['tgl_keluar_bpjsket_office'],
            'no_peserta_office'=>$data['no_peserta_office'],
            'tgl_masuk_bpjskes_office'=>$data['tgl_masuk_bpjskes_office'],
            'tgl_keluar_bpjskes_office'=>$data['tgl_keluar_bpjskes_office'],
          ]);
          return redirect('/office')->with('success', 'Data Berhasil Diubah!');
        }
    }
    //delete
    public function destroy_office($id_office)
    {
        $dtOffice = office::find($id_office);
        $dtOffice->delete();
        return redirect('/office')->with('success', 'Data Berhasil Dihapus!');
    }


    //fmjimbe
    //view
    public function fmjimbe(){
        return view('pegawai-fm-jimbe');
    }
    //create
    //read
    //update
    //delete


    //fmjatinom
    //view
    public function fmjatinom(){
        return view('pegawai-fm-jatinom');
    }
    //create
    //read
    //update
    //delete


    //gpsjimbe
    //view
    public function gpsjimbe(){
        return view('pegawai-gps-jimbe');
    }
    //create
    //read
    //update
    //delete


    //gpspikatan
    //view
    public function gpspikatan(){
        return view('pegawai-gps-pikatan');
    }
    //create
    //read
    //update
    //delete


    //gpsponggok
    //view
    public function gpsponggok(){
        return view('pegawai-gps-ponggok');
    }
    //create
    //read
    //update
    //delete



    //induk
    //view
    public function induk(){
        return view('pegawai-ps-induk');
    }
    //create
    //read
    //update
    //delete



    //psbali
    //view
    public function psbali(){
        return view('pegawai-ps-bali');
    }
    //create
    //read
    //update
    //delete



    //psponorogo
    //view
    public function psponorogo(){
        return view('pegawai-ps-ponorogo');
    }
    //create
    //read
    //update
    //delete



    //pspikatan
    //view
    public function pspikatan(){
        return view('pegawai-ps-pikatan');
    }
    //create
    //read
    //update
    //delete


    //pstrisula
    //view
    public function pstrisula(){
        return view('pegawai-ps-trisula');
    }
    //create
    //read
    //update
    //delete


    //psgading
    //view
    public function psgading(){
        return view('pegawai-ps-gading');
    }
    //create
    //read
    //update
    //delete


    //pssidorejo
    //view
    public function pssidorejo(){
        return view('pegawai-ps-sidorejo');
    }
    //create
    //read
    //update
    //delete


    //psamphibi
    //view
    public function psamphibi(){
        return view('pegawai-ps-amphibi');
    }
    //create
    //read
    //update
    //delete


    //psrejotangan
    //view
    public function psrejotangan(){
        return view('pegawai-ps-rejotangan');
    }
    //create
    //read
    //update
    //delete


    //psponggok
    //view
    public function psponggok(){
        return view('pegawai-ps-ponggok');
    }
    //create
    //read
    //update
    //delete


    //psbintang
    //view
    public function psbintang(){
        return view('pegawai-ps-bintang');
    }
    //create
    //read
    //update
    //delete


    //pspare
    //view
    public function pspare(){
        return view('pegawai-ps-pare');
    }
    //create
    //read
    //update
    //delete


    //psaulia
    //view
    public function psaulia(){
        return view('pegawai-ps-aulia');
    }
    //create
    //read
    //update
    //delete


    //jfblitar
    //view
    public function jfblitar(){
        return view('pegawai-jf-blitar');
    }
    //create
    //read
    //update
    //delete


    //jfmadiun
    //view
    public function jfmadiun(){
        return view('pegawai-jf-madiun');
    }
    //create
    //read
    //update
    //delete


    //divkend
    //view
    public function divkend(){
        return view('pegawai-divkend');
    }
    //create
    //read
    //update
    //delete


    //rpa
    //view
    public function rpa(){
        return view('pegawai-rpa');
    }
    //create
    //read
    //update
    //delete
}

<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Land;
use App\Models\Vehicle;
use App\Http\Requests\StoreLandRequest;
use App\Http\Requests\UpdateLandRequest;
use App\Imports\LandImportC;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = "Aset Tanah";
        $status = "!=";
        
        if (request('owner')) {
            if($nama = Land::firstWhere('slug_pemilik', request('owner'))){
                $header = $nama->pemilik;
            }
            else{
                $header = "Arsip Tanah";
                $status = "=";
            }
        }
        
        return view ('land.index', [
            'lands' => Land::latest()
            ->filter(request(['search', 'owner']))
            ->where('status', $status, 6)
            ->get(),
            'header' => $header,
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! Gate::allows('admin')){
            abort(403);
        }   
        return view ('land.create', [
            'companies' => Company::all(),
            'header' => 'Tambah Tanah',
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLandRequest $request)
    {
        if(! Gate::allows('admin')){
            abort(403);
        }
        $validationData = $request->validate([
            //informasi tanah
            'nomor_sertifikat' => 'required',
            'status' => 'required',
            'posisi_sertifikat' => 'required',
            'pemilik' => 'required',
            'slug_pemilik' => 'required',
            'nomor_sppt' => 'nullable',
            'njop' => 'nullable',
            'luas' => 'required',
            'lokasi' => 'required',
            'alamat' => 'required',
            'harga_pembelian' => 'required',
            'tanggal_pembelian' => 'required',
            'keterangan' => 'nullable',
            //penjaminan
            'penjaminan' => 'nullable',
            'tanggal_penjaminan' => 'nullable',
            'tanggal_kembali_penjaminan' => 'nullable',
            'keterangan_penjaminan' => 'nullable',
            'keterangan' => 'nullable',
            //dijual
            'tanggal_dijual' => 'nullable',
            //file
            'foto' => 'image|file|max:2056|nullable',
            'berkas.*' => 'file|mimes:pdf|max:5120',
            'nama_berkas' => 'nullable',
        ]);

        if($request->file('foto')){
            $validationData['foto'] = $request->file('foto')->store('foto-tanah', 'public');
        }
        if($request->file('berkas')){
            foreach($request->file('berkas') as $berkas){
                $arr[] = $berkas->store('berkas-tanah/'.$validationData['nomor_sertifikat'], 'public');
                $arr2[] = pathinfo($berkas->getClientOriginalName(), PATHINFO_FILENAME);
            }
            $validationData['berkas'] = implode(",", $arr);
            $validationData['nama_berkas'] = implode(",", $arr2);
        }
        
        $request = Land::create($validationData);
        return redirect('/land')->with('success', 'Data tanah telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function show(Land $land)
    {
        return view('land.show', [
            'lands' => $land,
            'header' => $land->nomor_sertifikat,
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function edit(Land $land)
    {
        if(! Gate::allows('admin')){
            abort(403);
        }
        return view('land.edit', [
            'lands' => $land,
            'header' => $land->nomor_sertifikat,
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLandRequest  $request
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLandRequest $request, Land $land)
    {
        if(! Gate::allows('admin')){
            abort(403);
        }
        $validationData = $request->validate([
            //informasi tanah
            'nomor_sertifikat' => 'required',
            'status' => 'required',
            'posisi_sertifikat' => 'required',
            'pemilik' => 'required',
            'slug_pemilik' => 'required',
            'nomor_sppt' => 'nullable',
            'njop' => 'nullable',
            'luas' => 'required',
            'lokasi' => 'required',
            'alamat' => 'required',
            'harga_pembelian' => 'required',
            'tanggal_pembelian' => 'required',
            'keterangan' => 'nullable',
            //penjaminan
            'penjaminan' => 'nullable',
            'tanggal_penjaminan' => 'nullable',
            'tanggal_kembali_penjaminan' => 'nullable',
            'keterangan_penjaminan' => 'nullable',
            'keterangan' => 'nullable',
            //dijual
            'tanggal_dijual' => 'nullable',
            //file
            'foto' => 'image|file|max:2056|nullable',
            'berkas.*' => 'file|mimes:pdf|max:5120',
            'nama_berkas' => 'nullable',
        ]);

        if($request->file('foto')){
            if($land->foto){
                Storage::disk('public')->delete($land->foto);
            }
            $validationData['foto'] = $request->file('foto')->store('foto-tanah', 'public');
        }
        if($request->file('berkas')){
            if($land->berkas){
                $arr3 = explode(',', $land->berkas);
                for ($i=0; $i < count($arr3); $i++) { 
                    Storage::disk('public')->delete($arr3[$i]);
                }
            }
            foreach($request->file('berkas') as $berkas){
                $arr[] = $berkas->store('berkas-tanah/'.$validationData['nomor_sertifikat'], 'public');
                $arr2[] = pathinfo($berkas->getClientOriginalName(), PATHINFO_FILENAME);
            }
            $validationData['berkas'] = implode(",", $arr);
            $validationData['nama_berkas'] = implode(",", $arr2);
        }
        
        $land->update($validationData);
        return redirect('/land')->with('success', 'Data tanah telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function destroy(Land $land)
    {
        if(! Gate::allows('admin')){
            abort(403);
        }
        if($land->foto){
            Storage::disk('public')->delete($land->foto);
        }
        if($land->berkas){
            Storage::disk('public')->deleteDirectory('berkas-tanah/'.$land->nomor_sertifikat);
        }
        
        Land::destroy($land->id);
        return redirect('/land')->with('success', 'Tanah telah dihapus!');
    }

    public function arsip(Request $request, $nomor_sertifikat)
    {
        if(! Gate::allows('admin')){
            abort(403);
        }
        $arsip = $request->validate([
            'status' => 'required',
        ]);

        $arsip = Arr::add($arsip, 'tanggal_dijual', Carbon::now()->toDateString());

        Land::where('nomor_sertifikat', $nomor_sertifikat)->update($arsip);
        return redirect('/land')->with('success', 'Data tanah telah diarsipkan!');
    }

    public function import(Request $request)
    {
        if(! Gate::allows('admin')){
            abort(403);
        }
        
        Excel::import(new LandImportC, $request->file('import'));
                
        return redirect('/land')->with('success', 'Data Tanah telah diimport!');
    }

    public function berkas(Request $request, Land $land)
    {
        if(! Gate::allows('admin')){
            abort(403);
        }
        $arr3 = explode(',', $land->berkas);
        for ($i=0; $i < count($arr3); $i++) { 
            if($arr3[$i] == $request['berkas']){
                $path = 'storage/'.$arr3[$i];
            }
        }
        
        return response()->file($path);
    }
}

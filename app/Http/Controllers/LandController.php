<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Land;
use App\Models\Vehicle;
use App\Http\Requests\StoreLandRequest;
use App\Http\Requests\UpdateLandRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

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
            'foto' => 'image|file|max:2056',
            'berkas' => 'file|mimes:pdf|max:5120',
        ]);

        if($request->file('foto')){
            $validationData['foto'] = $request->file('foto')->store('foto-tanah', 'public');
        }
        if($request->file('berkas')){
            $validationData['berkas'] = $request->file('berkas')->store('berkas-tanah', 'public');
        }

        
        $request = Land::create($validationData);
        return redirect('/land')->with('success', 'Tanah telah ditambahkan!');
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
            'foto' => 'image|file|max:2056',
            'berkas' => 'file|mimes:pdf|max:5120',
        ]);

        if($request->file('foto')){
            if($land->foto){
                Storage::disk('public')->delete($land->foto);
            }
            $validationData['foto'] = $request->file('foto')->store('foto-tanah', 'public');
        }
        if($request->file('berkas')){
            if($land->berkas){
                Storage::disk('public')->delete($land->berkas);
            }
            $validationData['berkas'] = $request->file('berkas')->store('berkas-tanah', 'public');
        }
        
        $land->update($validationData);
        return redirect('/land')->with('success', 'Tanah telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function destroy(Land $land)
    {
        if($land->foto){
            Storage::disk('public')->delete($land->foto);
        }
        if($land->berkas){
            Storage::disk('public')->delete($land->berkas);
        }
        
        Land::destroy($land->id);
        return redirect('/land')->with('success', 'Tanah telah dihapus!');
    }

    public function arsip(Request $request, $nomor_sertifikat){
        $arsip = $request->validate([
            'status' => 'required',
        ]);

        $arsip = Arr::add($arsip, 'tanggal_dijual', Carbon::now()->toDateString());

        Land::where('nomor_sertifikat', $nomor_sertifikat)->update($arsip);
        return redirect('/land')->with('success', 'Tanah telah diarsipkan!');
    }
}

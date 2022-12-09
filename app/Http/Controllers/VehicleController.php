<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Land;
use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = "Semua Kendaraan";
        $status = '!=';
        
        if (request('status')) {
            if(request('status') == 'aset'){
                $header = "Aset Kendaraan";
            }
            elseif(request('status') == 'peminjaman'){
                $header = "Peminjaman Kendaraan";
            }
            elseif(request('status') == 'penitipan'){
                $header = "Penitipan Kendaraan";
            }
            else{
                $header = "Arsip Kendaraan";
                $status = '=';
            }
        }
        
        return view ('vehicle.index', [
            'vehicles' => Vehicle::latest()
            ->filter(request(['search', 'status']))
            ->where('status', $status, 4)
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
        return view ('vehicle.create', [
            'vehicles' => Vehicle::all(),
            'header' => 'Tambah Kendaraan',
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        $validationData = $request->validate([
            'nomor_bpkb' => 'required',
            'status' => 'required',
            'nomor_polisi_bpkb' => 'required',
            'nomor_polisi_lama' => 'nullable',
            'nama_bpkb' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'jenis' => 'required',
            'model' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            'bulan_jatuh_tempo' => 'required',
            'bagian_lokasi' => 'required',
            //peminjaman
            'nama_peminjaman' => 'nullable',
            'tanggal_peminjaman' => 'nullable',
            'tanggal_kembali_peminjaman' => 'nullable',
            'keterangan_peminjaman' => 'nullable',
            //penitipan
            'nama_penitipan' => 'nullable',
            'tanggal_penitipan' => 'nullable',
            'tanggal_kembali_penitipan' => 'nullable',
            'keterangan_penitipan' => 'nullable',
            'keterangan' => 'nullable',
            //dijual
            'tanggal_dijual' => 'nullable',
            //foto
            'foto' => 'image|file|max:2056',
            'berkas' => 'file|mimes:pdf|max:2056',
        ]);

        if($request->file('foto')){
            $validationData['foto'] = $request->file('foto')->store('foto-kendaraan', 'public');
        }
        if($request->file('berkas')){
            $validationData['berkas'] = $request->file('berkas')->store('berkas-kendaraan', 'public');
        }

        
        $request = Vehicle::create($validationData);
        return redirect('/vehicle')->with('success', 'Kendaraan telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view ('vehicle.show', [
            'vehicles' => $vehicle,
            'header' => 'Detail Kendaraan',
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view ('vehicle.edit', [
            'vehicles' => $vehicle,
            'header' => $vehicle->nomor_bpkb,
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleRequest  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $validationData = $request->validate([
            'nomor_bpkb' => 'required',
            'status' => 'required',
            'nomor_polisi_bpkb' => 'required',
            'nomor_polisi_lama' => 'nullable',
            'nama_bpkb' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'jenis' => 'required',
            'model' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            'bulan_jatuh_tempo' => 'required',
            'bagian_lokasi' => 'required',
            //peminjaman
            'nama_peminjaman' => 'nullable',
            'tanggal_peminjaman' => 'nullable',
            'tanggal_kembali_peminjaman' => 'nullable',
            'keterangan_peminjaman' => 'nullable',
            //penitipan
            'nama_penitipan' => 'nullable',
            'tanggal_penitipan' => 'nullable',
            'tanggal_kembali_penitipan' => 'nullable',
            'keterangan_penitipan' => 'nullable',
            'keterangan' => 'nullable',
            //dijual
            'tanggal_dijual' => 'nullable',
            //foto
            'foto' => 'image|file|max:2056',
            'berkas' => 'file|mimes:pdf|max:2056',
        ]);

        if($request->file('foto')){
            if($vehicle->foto){
                Storage::disk('public')->delete($vehicle->foto);
            }
            $validationData['foto'] = $request->file('foto')->store('foto-kendaraan', 'public');
        }
        if($request->file('berkas')){
            if($vehicle->berkas){
                Storage::disk('public')->delete($vehicle->berkas);
            }
            $validationData['berkas'] = $request->file('berkas')->store('berkas-kendaraan', 'public');
        }

        
        $vehicle->update($validationData);
        return redirect('/vehicle')->with('success', 'Kendaraan telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        if($vehicle->foto){
            Storage::disk('public')->delete($vehicle->foto);
        }
        if($vehicle->berkas){
            Storage::disk('public')->delete($vehicle->berkas);
        }

        Vehicle::destroy($vehicle->id);
        return redirect('/vehicle')->with('success', 'Kendaraan telah dihapus!');
    }

    public function arsip(Request $request, $nomor_bpkb){
        $arsip = $request->validate([
            'status' => 'required',
        ]);

        $arsip = Arr::add($arsip, 'tanggal_dijual', Carbon::now()->toDateString());

        Vehicle::where('nomor_bpkb', $nomor_bpkb)->update($arsip);
        return redirect('/vehicle')->with('success', 'Kendaraan telah diarsipkan!');
    }
}

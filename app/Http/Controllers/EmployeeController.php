<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Land;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = "Jatinom Indah Grup";
        $arsip = 0;
        
        if (request('company')) {
            if($nama = Company::firstWhere('slug_company', request('company'))){
                $header = $nama->nama_company;    
            }
            else{
                $header = "Arsip Karyawan";
                $arsip = 1;
            }
        }
        
        return view ('employee.index', [
            'employees' => Employee::with('companies')
            ->where('keluar', $arsip)
            ->filter(request(['search', 'company']))
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
        return view('employee.create', [
            'employees' => Employee::all(),
            'header' => "Jatinom Indah Grup",
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validationData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'jumlah_anak' => 'required',
            'nama_ibu' => 'required',
            'pendidikan' => 'required',
            'golongan_darah' => 'required',
            'ktp' => 'required',
            'nomor_telepon' => 'nullable',
            // informasi pekerjaan
            'nomor_induk' => 'required',
            'tanggal_masuk' => 'required',
            'bagian' => 'required',
            'jabatan' => 'nullable',
            'lokasi' => 'required',
            'klasifikasi_karyawan' => 'required',
            'klasifikasi_gaji' => 'required',
            'nomor_bpjsket' => 'nullable',
            'tanggal_masuk_bpjsket' => 'nullable',
            'tanggal_keluar_bpjsket' => 'nullable',
            'nomor_bpjskes' => 'nullable',
            'tanggal_masuk_bpjskes' => 'nullable',
            'tanggal_keluar_bpjskes' => 'nullable',
            // riwayat
            'riwayat_pekerjaan' => 'nullable',
            'riwayat_pendidikan' => 'nullable',
            'riwayat_pelanggaran' => 'nullable',
            'keterangan' => 'nullable',
            //keluar
            'tanggal_keluar' => 'nullable',
            //foto
            'foto' => 'image|file|max:2056',
            'berkas' => 'file|mimes:pdf|max:5120',
        ]);

        if($request->file('foto')){
            $validationData['foto'] = $request->file('foto')->store('foto-karyawan', 'public');
        }
        if($request->file('berkas')){
            $validationData['berkas'] = $request->file('berkas')->store('berkas-karyawan', 'public');
        }

        
        $request = Employee::create($validationData)->companies()->sync((array)$request->input('company_id'));
        return redirect('/employee')->with('success', 'Karyawan telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        
        return view('employee.show', [
            'employees' => $employee,
            'header' => $employee->nama,
            'age' => Carbon::parse($employee->tanggal_lahir)->age,
            'masakerja' => Carbon::parse($employee->tanggal_masuk)->age,
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            'employees' => $employee,
            'header' => $employee->nama,
            //sidebar
            'companies' => Company::all(),
            'landside' => Land::all()->sortBy('pemilik'),
            'landtmp' => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validationData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'jumlah_anak' => 'required',
            'nama_ibu' => 'required',
            'pendidikan' => 'required',
            'golongan_darah' => 'required',
            'ktp' => 'required',
            'nomor_telepon' => 'nullable',
            // informasi pekerjaan
            'nomor_induk' => 'required',
            'tanggal_masuk' => 'required',
            'bagian' => 'required',
            'jabatan' => 'nullable',
            'lokasi' => 'required',
            'klasifikasi_karyawan' => 'required',
            'klasifikasi_gaji' => 'required',
            'nomor_bpjsket' => 'nullable',
            'tanggal_masuk_bpjsket' => 'nullable',
            'tanggal_keluar_bpjsket' => 'nullable',
            'nomor_bpjskes' => 'nullable',
            'tanggal_masuk_bpjskes' => 'nullable',
            'tanggal_keluar_bpjskes' => 'nullable',
            // riwayat
            'riwayat_pekerjaan' => 'nullable',
            'riwayat_pendidikan' => 'nullable',
            'riwayat_pelanggaran' => 'nullable',
            'keterangan' => 'nullable',
            //keluar
            'tanggal_keluar' => 'nullable',
            //foto
            'foto' => 'image|file|max:2056',
            'berkas' => 'file|mimes:pdf|max:5120',
        ]);
        
        if($request->file('foto')){
            if($employee->foto){
                Storage::disk('public')->delete($employee->foto);
            }
            $validationData['foto'] = $request->file('foto')->store('foto-karyawan', 'public');
        }
        if($request->file('berkas')){
            if($employee->berkas){
                Storage::disk('public')->delete($employee->berkas);
            }
            $validationData['berkas'] = $request->file('berkas')->store('berkas-karyawan', 'public');
        }

        
        $employee->update($validationData);
        $employee->companies()->sync((array)$request->input('company_id'));

        return redirect('/employee')->with('success', 'Karyawan telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if($employee->foto){
            Storage::disk('public')->delete($employee->foto);
        }
        
        Employee::destroy($employee->id);
        return redirect('/employee')->with('success', 'Karyawan telah dihapus!');
    }

    public function keluar(Request $request, $nomor_induk){
        $keluar = $request->validate([
            'keluar' => 'required',
        ]);

        $keluar = Arr::add($keluar, 'tanggal_keluar', Carbon::now()->toDateString());

        Employee::where('nomor_induk', $nomor_induk)->update($keluar);
        return redirect('/employee')->with('success', 'Karyawan telah diarsipkan!');
    }
}

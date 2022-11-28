<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
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
        $karyawankeluar = 0;
        
        if (request('company')) {
            if($nama = Company::firstWhere('slug_company', request('company'))){
                $header = $nama->nama_company;
                $karyawankeluar = 0;    
            }
            else{
                $header = "Arsip Karyawan";
                $karyawankeluar = 1;
            }
        }
        
        return view ('employee', [
            'employees' => Employee::with('companies')
            ->where('keluar_jig', $karyawankeluar)
            ->filter(request(['search', 'company']))
            ->get(),
            // ->paginate(25)
            // ->withQueryString(),
            'companies' => Company::all(),
            'link' => request('company'),
            'header' => $header
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            'employees' => Employee::all(),
            'companies' => Company::all(),
            'link' => request('company'),
            'header' => "Jatinom Indah Group"
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
        // ddd($request);
        
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
            'nomor_telepon' => 'required',
            // informasi pekerjaan
            'nomor_induk' => 'required',
            'tanggal_masuk' => 'required',
            'bagian' => 'required',
            'jabatan' => 'nullable',
            'lokasi' => 'required',
            'klasifikasi_pegawai' => 'required',
            'klasifikasi_gaji' => 'required',
            'nomor_bpjsket' => 'nullable',
            'tanggal_masuk_bpjsket' => 'nullable',
            'tanggal_keluar_bpjsket' => 'nullable',
            'nomor_bpjskes' => 'nullable',
            'tanggal_masuk_bpjskes' => 'nullable',
            'tanggal_keluar_bpjskes' => 'nullable',
            // riwayat
            'tanggal_keluar_jig' => 'nullable',
            'riwayat_pekerjaan' => 'nullable',
            'riwayat_pendidikan' => 'nullable',
            'riwayat_pelanggaran' => 'nullable',
            //foto
            'foto' => 'image|file|max:2056',
        ]);

        if($request->file('foto')){
            $validationData['foto'] = $request->file('foto')->store('foto-pegawai', 'public');
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
        
        return view('show2', [
            'employees' => $employee,
            'companies' => Company::all(),
            'link' => request('company'),
            'header' => $employee->nama,
            'age' => Carbon::parse($employee->tanggal_lahir)->age,
            'masakerja' => Carbon::parse($employee->tanggal_masuk)->age,
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
        return view('edit', [
            'employees' => $employee,
            'companies' => Company::all(),
            'link' => request('company'),
            'header' => 'Jatinom Indah Grup'
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
            'nomor_telepon' => 'required',
            // informasi pekerjaan
            'nomor_induk' => 'required',
            'tanggal_masuk' => 'required',
            'bagian' => 'required',
            'jabatan' => 'nullable',
            'lokasi' => 'required',
            'klasifikasi_pegawai' => 'required',
            'klasifikasi_gaji' => 'required',
            'nomor_bpjsket' => 'nullable',
            'tanggal_masuk_bpjsket' => 'nullable',
            'tanggal_keluar_bpjsket' => 'nullable',
            'nomor_bpjskes' => 'nullable',
            'tanggal_masuk_bpjskes' => 'nullable',
            'tanggal_keluar_bpjskes' => 'nullable',
            // riwayat
            'tanggal_keluar_jig' => 'nullable',
            'riwayat_kantor1' => 'nullable',
            'riwayat_pekerjaan' => 'nullable',
            'riwayat_pendidikan' => 'nullable',
            'riwayat_pelanggaran' => 'nullable',
            //foto
            'foto' => 'image|file|max:2056',
        ]);
        
        if($request->file('foto')){
            if($employee->foto){
                Storage::disk('public')->delete($employee->foto);
            }
            $validationData['foto'] = $request->file('foto')->store('foto-pegawai', 'public');
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
            'keluar_jig' => 'required',
        ]);

        $keluar = Arr::add($keluar, 'tanggal_keluar_jig', Carbon::now()->toDateString());
        
        // dd($keluar);

        Employee::where('nomor_induk', $nomor_induk)->update($keluar);
        return redirect('/employee')->with('success', 'Karyawan telah diarsipkan!');
    }
}

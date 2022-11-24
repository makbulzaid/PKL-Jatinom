@extends('layouts.main')

@section('title')
    Tambah Karyawan
@endsection

@section('header')
    <h1>{{ $header }}</h1>

    <div class="section-header-breadcrumb">
        <a href="#" class="btn btn-lg icon-left btn-secondary"><i class="fas fa-edit"></i> Tambah</a>
    </div>
@endsection

@section('container')
    <div class="card">
        <div class="card-body p-0">
            <form action="/employee" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Karyawan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input name="nama" id="nama" type="text" class="form-control" value="{{ old('nama') }}" required autofocus>
                                    
                                    <label class="mt-2" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" type="text" class="form-control select2" required autofocus>
                                        <option value="Laki-Laki" @if(old('jenis_kelamin') == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan</option>
                                    </select>

                                    <label class="mt-2" for="tempat_lahir">Tempat Lahir</label>
                                    <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" value="{{ old('tempat_lahir') }}" required autofocus>
                                    
                                    <label class="mt-2" for="tanggal_lahir">Tanggal Lahir</label>
                                    <input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control datepicker" value="{{ old('tanggal_lahir') }}" required autofocus>
                                    
                                    <label class="mt-2" for="alamat">Alamat</label>
                                    <input name="alamat" id="alamat" type="text" class="form-control" value="{{ old('alamat') }}" required autofocus>
                                    
                                    <label class="mt-2"for="status">Status</label>
                                    <select name="status" id="status" type="text" class="form-control select2" required autofocus>
                                        <option value="Belum Menikah" @if(old('status') == 'Belum Menikah') selected @endif>Belum Menikah</option>
                                        <option value="Menikah" @if(old('status') == 'Menikah') selected @endif>Menikah</option>
                                        <option value="Janda/Duda" @if(old('Janda/Duda') == 'O') selected @endif>Janda/Duda</option>
                                    </select>
                                    
                                    <label class="mt-2" for="jumlah_anak">Jumlah Anak</label>
                                    <input name="jumlah_anak" id="jumlah_anak" type="text" class="form-control" value="{{ old('jumlah_anak') }}" required autofocus>
                                    
                                    <label class="mt-2" for="nama_ibu">Nama Ibu</label>
                                    <input name="nama_ibu" id="nama_ibu" type="text" class="form-control" value="{{ old('nama_ibu') }}" required autofocus>

                                    <label class="mt-2" for="pendidikan">Pendidikan</label>
                                    <select name="pendidikan" id="pendidikan" type="text" class="form-control select2" required autofocus>
                                        <option value="Tidak Bersekolah" @if(old('pendidikan') == 'Tidak Bersekolah') selected @endif>Tidak Bersekolah</option>
                                        <option value="SD" @if(old('pendidikan') == 'SD') selected @endif>SD</option>
                                        <option value="SMP" @if(old('pendidikan') == 'SMP') selected @endif>SMP</option>
                                        <option value="SMA" @if(old('pendidikan') == 'SMA') selected @endif>SMA</option>
                                        <option value="D1/D2/D3" @if(old('pendidikan') == 'D1/D2/D3') selected @endif>D1/D2/D3</option>
                                        <option value="D4/S1" @if(old('pendidikan') == 'D4/S1') selected @endif>D4/S1</option>
                                        <option value="S2" @if(old('pendidikan') == 'S2') selected @endif>S2</option>
                                        <option value="S3" @if(old('pendidikan') == 'S3') selected @endif>S3</option>
                                    </select>

                                    <label class="mt-2" for="golongan_darah">Golongan Darah</label>
                                    <select name="golongan_darah" id="golongan_darah" type="text" class="form-control select2" required autofocus>
                                        <option value="O" @if(old('golongan_darah') == 'O') selected @endif>O</option>
                                        <option value="A" @if(old('golongan_darah') == 'A') selected @endif>A</option>
                                        <option value="B" @if(old('golongan_darah') == 'B') selected @endif>B</option>
                                        <option value="AB" @if(old('golongan_darah') == 'AB') selected @endif>AB</option>
                                    </select>
                                    
                                    <label class="mt-2" for="nomor_induk">Nomor Induk Kependudukan KTP</label>
                                    <input name="ktp" id="ktp" type="text" class="form-control" value="{{ old('ktp') }}" required autofocus>
                                    
                                    <label class="mt-2" for="ktp">Nomor Induk Karyawan</label>
                                    <input name="nomor_induk" id="nomor_induk" type="text" class="form-control" value="{{ old('nomor_induk') }}" required autofocus>
                                    
                                    <label class="mt-2" for="tanggal_masuk">Tanggal Masuk</label>
                                    <input name="tanggal_masuk" id="tanggal_masuk" type="date" class="form-control datepicker" value="{{ old('tanggal_masuk') }}" required autofocus>
                                    
                                    <label class="mt-2" for="id_company">Perusahaan</label>
                                    <select name="company_id[]" id="company_id[]" class="form-control select2" multiple="multiple" required autofocus>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}" @if(old('company_id') == $company->id) selected @endif>{{ $company->nama_company }}</option>
                                        @endforeach
                                    </select>
                
                                    <label class="mt-2"for="jabatan">Jabatan</label>
                                    <input name="jabatan" id="jabatan" type="text" class="form-control" value="{{ old('jabatan') }}" required autofocus>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    
                                    <label class="mt-2"for="bagian">Bagian</label>
                                    <input name="bagian" id="bagian" type="text" class="form-control" value="{{ old('bagian') }}" required autofocus>
                                    
                                    <label class="mt-2" for="lokasi">Lokasi</label>
                                    <input name="lokasi" id="lokasi" type="text" class="form-control" value="{{ old('lokasi') }}" required autofocus>
                                    
                                    <label class="mt-2" for="klasifikasi_pegawai">Klasifikasi Pegawai</label>
                                    <select name="klasifikasi_pegawai" id="klasifikasi_pegawai" type="text"
                                        class="form-control select2">
                                        <option value="Tetap" @if(old('klasifikasi_pegawai') == 'Tetap') selected @endif>Tetap</option>
                                        <option value="Kontrak" @if(old('klasifikasi_pegawai') == 'Kontrak') selected @endif>Kontrak</option>
                                        <option value="Harian" @if(old('klasifikasi_pegawai') == 'Harian') selected @endif>Harian</option>
                                    </select>
                                    
                                    <label class="mt-2" class=""for="klasifikasi_gaji">Klasifikasi Gaji</label>
                                    <select name="klasifikasi_gaji" id="klasifikasi_gaji" type="text" class="form-control select2">
                                        <option value="Bulanan" @if(old('klasifikasi_gaji') == 'Bulanan') selected @endif>Bulanan</option>
                                        <option value="Harian" @if(old('klasifikasi_gaji') == 'Harian') selected @endif>Harian</option>
                                    </select>
                                    
                                    <label class="mt-2" for="nomor_bpjsket">Nomor BPJS Ketenagakerjaan</label>
                                    <input name="nomor_bpjsket" id="nomor_bpjsket" type="text" class="form-control" value="{{ old('nomor_bpjsket') }}" required autofocus>
                                    
                                    <label class="mt-2" for="tanggal_masuk_bpjsket">Tanggal Masuk BPJS Ketenagakerjaan</label>
                                    <input name="tanggal_masuk_bpjsket" id="tanggal_masuk_bpjsket" type="date" class="form-control datepicker" value="{{ old('tanggal_masuk_bpjsket') }}" required autofocus>
                                    
                                    <label class="mt-2" for="tanggal_keluar_bpjsket">Tanggal Keluar BPJS Ketenagakerjaan</label>
                                    <input name="tanggal_keluar_bpjsket" id="tanggal_keluar_bpjsket" type="date" class="form-control datepicker" value="{{ old('tanggal_keluar_bpjsket') }}" required autofocus>
                                    
                                    <label class="mt-2" for="nomor_bpjskes">Nomor BPJS Kesehatan</label>
                                    <input name="nomor_bpjskes" id="nomor_bpjskes" type="text" class="form-control" value="{{ old('nomor_bpjskes') }}" required autofocus>
                                               
                                    <label class="mt-2" for="tanggal_masuk_bpjskes">Tanggal Masuk BPJS Kesehatan</label>
                                    <input name="tanggal_masuk_bpjskes" id="tanggal_masuk_bpjskes" type="date" class="form-control datepicker" value="{{ old('tanggal_masuk_bpjskes') }}" required autofocus>
                                        
                                   <label class="mt-2" for="tanggal_keluar_bpjskes">Tanggal Keluar BPJS Kesehatan</label>
                                   <input name="tanggal_keluar_bpjskes" id="tanggal_keluar_bpjskes" type="date" class="form-control datepicker" value="{{ old('tanggal_keluar_bpjskes') }}" required autofocus>
                                   
                                   <label class="mt-2" for="riwayat_kantor1">Riwayat Kantor 1</label>
                                   <input name="riwayat_kantor1" id="riwayat_kantor1" type="text" class="form-control" value="{{ old('riwayat_kantor1') }}">
                                   <label class="mt-2" for="riwayat_jabatan1">Riwayat Jabatan 1</label>
                                   <input name="riwayat_jabatan1" id="riwayat_jabatan1" type="text" class="form-control" value="{{ old('riwayat_jabatan1') }}">
                                   <label class="mt-2" for="riwayat_kantor2">Riwayat Kantor 2</label>
                                   <input name="riwayat_kantor2" id="riwayat_kantor2" type="text" class="form-control" value="{{ old('riwayat_kantor2') }}">
                                   <label class="mt-2" for="riwayat_jabatan2">Riwayat Jabatan 2</label>
                                   <input name="riwayat_jabatan2" id="riwayat_jabatan2" type="text" class="form-control" value="{{ old('riwayat_jabatan2') }}">
                                   <label class="mt-2" for="riwayat_kantor3">Riwayat Kantor 3</label>
                                   <input name="riwayat_kantor3" id="riwayat_kantor3" type="text" class="form-control" value="{{ old('riwayat_kantor3') }}">
                                   <label class="mt-2" for="riwayat_jabatan3">Riwayat Jabatan 3</label>
                                   <input name="riwayat_jabatan3" id="riwayat_jabatan3" type="text" class="form-control" value="{{ old('riwayat_jabatan3') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg icon-left btn-primary ml-3 mb-3">Tambah Karyawan</button>
            </form>
        </div>
    </div>
@endsection

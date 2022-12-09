@extends('layouts.main')

@section('title')
    Tambah Kendaraan
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
            <form action="/vehicle" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Kendaraan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="mt-2" for="nomor_bpkb">Nomor BPKB</label>
                                    <input name="nomor_bpkb" id="nomor_bpkb" type="text" class="form-control" value="{{ old('nomor_bpkb')}}" required autofocus>
                                    
                                    <label class="mt-2" for="status">Status</label>
                                    <select name="status" id="status" type="text" class="form-control select2" required autofocus>
                                        <option value="1" @if(old('status') == '1') selected @endif>Aset</option>
                                        <option value="2" @if(old('status') == '2') selected @endif>Peminjaman</option>
                                        <option value="3" @if(old('status') == '3') selected @endif>Penitipan</option>
                                        <option value="4" @if(old('status') == '4') selected @endif>Arsip</option>
                                    </select>
                                    
                                    <label class="mt-2" for="nomor_polisi_bpkb">Nomor Polisi BPKB</label>
                                    <input name="nomor_polisi_bpkb" id="nomor_polisi_bpkb" type="text" class="form-control" value="{{ old('nomor_polisi_bpkb') }}" required autofocus>
                                    
                                    <label class="mt-2" for="nomor_polisi_lama">Nomor Polisi Lama</label>
                                    <input name="nomor_polisi_lama" id="nomor_polisi_lama" type="text" class="form-control" value="{{ old('nomor_polisi_lama') }}" autofocus>

                                    <label class="mt-2" for="nama_bpkb">Nama BPKB</label>
                                    <input name="nama_bpkb" id="nama_bpkb" type="text" class="form-control" value="{{ old('nama_bpkb') }}" required autofocus>
                                            
                                    <label class="mt-2" for="merk">Merk</label>
                                    <input name="merk" id="merk" type="text" class="form-control" value="{{ old('merk') }}" required autofocus>
                                    
                                    <label class="mt-2" for="tipe">Tipe</label>
                                    <input name="tipe" id="tipe" type="text" class="form-control" value="{{ old('tipe') }}" required autofocus>
                                    
                                    <label class="mt-2" for="jenis">Jenis</label>
                                    <input name="jenis" id="jenis" type="text" class="form-control" value="{{ old('jenis') }}" required autofocus>
                                    
                                    <label class="mt-2" for="model">Model</label>
                                    <input name="model" id="model" type="text" class="form-control" value="{{ old('model') }}" required autofocus>
                                    
                                    <label class="mt-2" for="tahun">Tahun</label>
                                    <input name="tahun" id="tahun" type="text" class="form-control" value="{{ old('tahun') }}" required autofocus>
                                    
                                    <label class="mt-2" for="warna">Warna</label>
                                    <input name="warna" id="warna" type="text" class="form-control" value="{{ old('warna') }}" required autofocus>
                                    
                                    <label class="mt-2" for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
                                    <input name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo" type="date" class="form-control" value="{{ old('tanggal_jatuh_tempo') }}" required autofocus>
                                    
                                    <label class="mt-2" for="bulan_jatuh_tempo">Bulan Jatuh Tempo</label>
                                    <input name="bulan_jatuh_tempo" id="bulan_jatuh_tempo" type="text" class="form-control" value="{{ old('bulan_jatuh_tempo') }}" required autofocus>

                                    <label class="mt-2" for="bagian_lokasi">Divisi/Lokasi</label>
                                    <input name="bagian_lokasi" id="bagian_lokasi" type="text" class="form-control" value="{{ old('bagian_lokasi') }}" required autofocus>
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
                                    <label class="mt-2" for="nama_peminjaman">Nama Peminjaman</label>
                                    <input name="nama_peminjaman" id="nama_peminjaman" type="text" class="form-control" value="{{ old('nama_peminjaman') }}" autofocus>
                                    
                                    <label class="mt-2" for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                    <input name="tanggal_peminjaman" id="tanggal_peminjaman" type="date" class="form-control" value="{{ old('tanggal_peminjaman') }}" autofocus>
                                    
                                    <label class="mt-2" for="tanggal_kembali_peminjaman">Tanggal Kembali Peminjaman</label>
                                    <input name="tanggal_kembali_peminjaman" id="tanggal_kembali_peminjaman" type="date" class="form-control" value="{{ old('tanggal_kembali_peminjaman') }}" autofocus>
                                    
                                    <label class="mt-2" for="keterangan_peminjaman">Keterangan Peminjaman</label>
                                    <input name="keterangan_peminjaman" id="keterangan_peminjaman" type="text" class="form-control" value="{{ old('keterangan_peminjaman') }}" autofocus>

                                    <label class="mt-2" for="nama_penitipan">Nama Penitipan</label>
                                    <input name="nama_penitipan" id="nama_penitipan" type="text" class="form-control" value="{{ old('nama_penitipan') }}" autofocus>
                                    
                                    <label class="mt-2" for="tanggal_penitipan">Tanggal Penitipan</label>
                                    <input name="tanggal_penitipan" id="tanggal_penitipan" type="date" class="form-control" value="{{ old('tanggal_penitipan') }}" autofocus>
                                    
                                    <label class="mt-2" for="tanggal_kembali_penitipan">Tanggal Kembali Penitipan</label>
                                    <input name="tanggal_kembali_penitipan" id="tanggal_kembali_penitipan" type="date" class="form-control" value="{{ old('tanggal_kembali_penitipan') }}" autofocus>
                                    
                                    <label class="mt-2" for="keterangan_penitipan">Keterangan Penitipan</label>
                                    <input name="keterangan_penitipan" id="keterangan_penitipan" type="text" class="form-control" value="{{ old('keterangan_penitipan') }}" autofocus>
                                    
                                    <label class="mt-2" for="keterangan">Keterangan</label>
                                    <input name="keterangan" id="keterangan" type="text" class="form-control" value="{{ old('keterangan') }}" autofocus>
                                    
                                    <label class="mt-2" for="tanggal_dijual">Tanggal Dijual</label>
                                    <input name="tanggal_dijual" id="tanggal_dijual" type="date" class="form-control" value="{{ old('tanggal_dijual') }}" autofocus>
                                    
                                    <label class="mt-2" for="foto">Foto</label>                                    
                                    <img class="img-preview img-fluid mb-2 p-0 col-sm-3">
                                    <input name="foto" id="foto" type="file" class="form-control" onchange="previewImage()" style="padding: 7px 15px" autofocus>

                                    <label class="mt-2" for="berkas">Berkas (PDF)</label>                                    
                                    <input name="berkas" id="berkas" type="file" class="form-control" style="padding: 7px 15px" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg icon-left btn-primary ml-3 mb-3">Tambah Tanah</button>
            </form>
        </div>
    </div>
@endsection

@section('extrajs')
<script>

    function previewImage() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();

        oFReader.readAsDataURL(foto.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection

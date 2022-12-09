@extends('layouts.main')

@section('title')
    {{ $header }}
@endsection

@section('header')
<h1>{{ $header }}</h1>

<div class="section-header-breadcrumb">
    <a href="#" class="btn btn-lg icon-left btn-secondary mr-2"><i class="fas fa-edit"></i> Edit</a>
    
    @if($lands->status == 6)
    <form action="/land/{{ $lands->nomor_sertifikat }}" method="post" style="display: inline;">
        @method('delete')
        @csrf
        <button class="btn btn-lg icon-left btn-danger" onclick="return confirm('Menghapus Data Permanen?')"><i class="fas fa-times"></i> Hapus</button>
    </form>  
    @else    
    <form action="/land/arsip/{{ $lands->nomor_sertifikat }}" method="post"
        style="display: inline;">
        @method('put')
        @csrf
        <input type="hidden" value="6" name="status" id="status">
        <input type="hidden" value="{{ $lands->nomor_sertifikat }}" name="nomor_sertifikat" id="nomor_sertifikat">
        <button class="btn btn-lg icon-left btn-danger" onclick="return confirm('Memindahkan Data ke Arsip?')"><i class="fas fa-times"></i> Hapus</button>
    </form>
    @endif
</div>
@endsection

@section('container')
    <div class="card">
        <div class="card-body p-0">
            <form action="/land/{{ $lands->nomor_sertifikat }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Tanah</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="mt-2" for="nomor_sertifikat">Nomor Sertifikat</label>
                                    <input name="nomor_sertifikat" id="nomor_sertifikat" type="text" class="form-control" value="{{ old('nomor_sertifikat', $lands->nomor_sertifikat) }}" required autofocus>

                                    <label class="mt-2" for="status">Status</label>
                                    <select name="status" id="status" type="text" class="form-control select2" required autofocus>
                                        <option value="1" @if(old('status', $lands->status) == '1') selected @endif>Sertifikat</option>
                                        <option value="2" @if(old('status', $lands->status) == '2') selected @endif>Belum Sertifikat</option>
                                        <option value="3" @if(old('status', $lands->status) == '3') selected @endif>Proses</option>
                                        <option value="4" @if(old('status', $lands->status) == '4') selected @endif>Petok</option>
                                        <option value="5" @if(old('status', $lands->status) == '5') selected @endif>Jaminan</option>
                                        <option value="6" @if(old('status', $lands->status) == '6') selected @endif>Arsip</option>
                                    </select>
                                    
                                    <label class="mt-2" for="posisi_sertifikat">Posisi Sertifikat</label>
                                    <select name="posisi_sertifikat" id="posisi_sertifikat" type="text" class="form-control select2" required autofocus>
                                        <option value="Pemilik" @if(old('posisi_sertifikat', $lands->posisi_sertifikat) == 'Pemilik') selected @endif>Pemilik</option>
                                        <option value="Jaminan" @if(old('posisi_sertifikat', $lands->posisi_sertifikat) == 'Jaminan') selected @endif>Jaminan</option>
                                        <option value="Proses" @if(old('posisi_sertifikat', $lands->posisi_sertifikat) == 'Proses') selected @endif>Proses</option>
                                    </select>
                                    
                                    <label class="mt-2" for="pemilik">Pemilik</label>
                                    <input name="pemilik" id="pemilik" type="text" class="form-control" value="{{ old('pemilik', $lands->pemilik) }}" required autofocus>
                                    
                                    <label class="mt-2" for="slug_pemilik">Inisial Pemilik</label>
                                    <input name="slug_pemilik" id="slug_pemilik" type="text" class="form-control" value="{{ old('slug_pemilik', $lands->slug_pemilik) }}" required autofocus>
                                    
                                    <label class="mt-2" for="nomor_sppt">Nomor SPPT</label>
                                    <input name="nomor_sppt" id="nomor_sppt" type="text" class="form-control" value="{{ old('nomor_sppt', $lands->nomor_sppt) }}" autofocus>
                                    
                                    <label class="mt-2" for="njop">NJOP</label>
                                    <input name="njop" id="njop" type="text" class="form-control" value="{{ old('njop', $lands->njop) }}" autofocus>
                                    
                                    <label class="mt-2" for="luas">Luas</label>
                                    <input name="luas" id="luas" type="text" class="form-control" value="{{ old('luas', $lands->luas) }}" required autofocus>

                                    <label class="mt-2" for="lokasi">Lokasi</label>
                                    <input name="lokasi" id="lokasi" type="text" class="form-control" value="{{ old('lokasi', $lands->lokasi) }}" required autofocus>
                                    
                                    <label class="mt-2"for="alamat">Alamat</label>
                                    <input name="alamat" id="alamat" type="text" class="form-control" value="{{ old('alamat', $lands->alamat) }}" required autofocus>
                                    
                                    <label class="mt-2"for="harga_pembelian">Harga Pembelian</label>
                                    <input name="harga_pembelian" id="harga_pembelian" type="text" class="form-control" value="{{ old('harga_pembelian', $lands->harga_pembelian) }}" required autofocus>
                                    
                                    <label class="mt-2" for="tanggal_pembelian">Tanggal Pembelian</label>
                                    <input name="tanggal_pembelian" id="tanggal_pembelian" type="date" class="form-control" value="{{ old('tanggal_pembelian', $lands->tanggal_pembelian) }}" required autofocus>
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
                                    
                                    
                                    <label class="mt-2" for="penjaminan">Penjaminan</label>
                                    <input name="penjaminan" id="penjaminan" type="text" class="form-control" value="{{ old('penjaminan', $lands->penjaminan) }}" autofocus>

                                    <label class="mt-2" for="tanggal_penjaminan">Tanggal Penjaminan</label>
                                    <input name="tanggal_penjaminan" id="tanggal_penjaminan" type="text" class="form-control" value="{{ old('tanggal_penjaminan', $lands->tanggal_penjaminan) }}" autofocus>
                                    
                                    <label class="mt-2" for="tanggal_kembali_penjaminan">Tanggal Kembali Penjaminan</label>
                                    <input name="tanggal_kembali_penjaminan" id="tanggal_kembali_penjaminan" type="date" class="form-control" value="{{ old('tanggal_kembali_penjaminan', $lands->tanggal_kembali_penjaminan) }}" autofocus>
        
                                    <label class="mt-2" for="keterangan_penjaminan">Keterangan Penjaminan</label>
                                    <input name="keterangan_penjaminan" id="keterangan_penjaminan" type="text" class="form-control" value="{{ old('keterangan_penjaminan', $lands->keterangan_penjaminan) }}" autofocus>

                                    <label class="mt-2" for="keterangan">Keterangan</label>
                                    <input name="keterangan" id="keterangan" type="text" class="form-control" value="{{ old('keterangan', $lands->keterangan) }}" autofocus>

                                    <label class="mt-2" for="tanggal_dijual">Tanggal Dijual</label>
                                    <input name="tanggal_dijual" id="tanggal_dijual" type="date" class="form-control" value="{{ old('tanggal_dijual', $lands->tanggal_dijual) }}" autofocus>
                                    
                                    <label class="mt-2" for="foto">Foto</label>                                    
                                    @if ($lands->foto)
                                    <img src="{{ asset('storage/' . $lands->foto) }}" class="img-preview img-fluid mb-2 p-0 col-sm-3 d-block">
                                    @else
                                    <img class="img-preview img-fluid mb-2 p-0 col-sm-3">
                                    @endif
                                    <input name="foto" id="foto" type="file" class="form-control" onchange="previewImage()" style="padding: 7px 15px" autofocus>

                                    <label class="mt-2" for="berkas">Berkas (PDF)</label>                                    
                                    <input name="berkas" id="berkas" type="file" class="form-control" style="padding: 7px 15px" autofocus>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg icon-left btn-primary ml-3 mb-3">Edit Tanah</button>
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

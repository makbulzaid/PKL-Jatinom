@extends('layouts.main')

@section('title')
    {{ $lands->nomor_sertifikat }}
@endsection

@section('extracss')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/sb-1.4.0/sl-1.5.0/datatables.min.css"/>
@endsection

@section('header')
    <h1>Detail Tanah</h1>
    <div class="section-header-breadcrumb">
        <a href="/land/{{ $lands->nomor_sertifikat }}/edit" class="btn btn-lg icon-left btn-primary mr-2"><i
                class="fas fa-edit"></i> Edit</a>
        
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

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive p-5">
                <table class="table table-striped table-md" id="table">
                    <thead>
                        <td></td>
                        <td></td>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Foto</td>
                            <td> <img src="{{ asset('storage/' . $lands->foto) }}"></td>
                        </tr>
                        <tr>
                            <td>Berkas (PDF)</td>
                            <td> <img src="{{ asset('storage/' . $lands->berkas) }}"></td>
                        </tr>
                        <tr>
                            <th>Nomor Sertifikat</th>
                            <td>{{ $lands->nomor_sertifikat }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $lands->status }}</td>
                        </tr>
                        <tr>
                            <th>Posisi Sertifikat</th>
                            <td>{{ $lands->posisi_sertifikat }}</td>
                        </tr>
                        <tr>
                            <th>Pemilik</th>
                            <td>{{ $lands->pemilik }}</td>
                        </tr>
                        <tr>
                            <th>Nomor SPPT</th>
                            <td>{{ $lands->nomor_sppt }}</td>
                        </tr>
                        <tr>
                            <th>NJOP</th>
                            <td>{{ $lands->njop }}</td>
                        </tr>
                        <tr>
                            <th>Luas</th>
                            <td>{{ $lands->luas }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $lands->lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $lands->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Harga Pembelian</th>
                            <td>{{ $lands->harga_pembelian }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pembelian</th>
                            <td>{{ $lands->tanggal_pembelian }}</td>
                        </tr>
                        <tr>
                            <th>Penjaminan</th>
                            <td>{{ $lands->penjaminan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Penjaminan</th>
                            <td>{{ $lands->tanggal_penjaminan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali Penjaminan</th>
                            <td>{{ $lands->tanggal_kembali_penjaminan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan Penjaminan</th>
                            <td>{{ $lands->keterangan_penjaminan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $lands->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Dijual</th>
                            <td>{{ $lands->tanggal_dijual }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extrajs')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/sb-1.4.0/sl-1.5.0/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#table').DataTable({
            buttons: [
                'pdfHtml5',
                'excelHtml5',
            ],
            dom: 'Bfrtip',
            paging: false,
            searching: false,
            ordering: false,
            info: false,
        });
});
</script>
@endsection

@extends('layouts.main')

@section('title')
    {{ $vehicles->nomor_polisi_bpkb }}
@endsection

@section('extracss')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/sb-1.4.0/sl-1.5.0/datatables.min.css"/>
@endsection

@section('header')
    <h1>{{ $header }}</h1>
    @can('admin') 
    <div class="section-header-breadcrumb">
        <a href="/vehicle/{{ $vehicles->nomor_polisi_bpkb }}/edit" class="btn btn-lg icon-left btn-primary mr-2"><i
                class="fas fa-edit"></i> Edit</a>
        
        @if($vehicles->status == 4)
        <form action="/vehicle/{{ $vehicles->nomor_polisi_bpkb }}" method="post" style="display: inline;">
            @method('delete')
            @csrf
            <button class="btn btn-lg icon-left btn-danger" onclick="return confirm('Menghapus Data Permanen?')"><i class="fas fa-times"></i> Hapus</button>
        </form>  
        @else    
        <form action="/vehicle/arsip/{{ $vehicles->nomor_polisi_bpkb }}" method="post"
            style="display: inline;">
            @method('put')
            @csrf
            <input type="hidden" value="4" name="status" id="status">
            <input type="hidden" value="{{ $vehicles->nomor_polisi_bpkb }}" name="nomor_polisi_bpkb" id="nomor_polisi_bpkb">
            <button class="btn btn-lg icon-left btn-danger" onclick="return confirm('Memindahkan Data ke Arsip?')"><i class="fas fa-times"></i> Hapus</button>
        </form>
        @endif
    </div>
    @endcan
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
                            <td style="font-weight:bold; font-size:24px">Informasi Kendaraan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td> 
                                @if($vehicles->foto)
                                <img src="{{ asset('storage/' . $vehicles->foto) }}">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Berkas (PDF)</th>
                            <td>
                                @if ($vehicles->berkas)
                                @php
                                $berkas = explode(',', $vehicles->berkas);
                                $nama_berkass = explode(',', $vehicles->nama_berkas);
                                @endphp
                                @for ($i=0; $i<count($berkas); $i++)
                                <a href="/employee/berkas?berkas={{ $berkas[$i] }}" class="badge badge-info mb-2" type="button"><i class="far fa-file-alt"></i><span> {{ $nama_berkass[$i] }}</span></a><br>
                                @endfor
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nomor Polisi BPKB</th>
                            <td>{{ $vehicles->nomor_polisi_bpkb }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($vehicles->status == 1)
                                Aset
                                @elseif($vehicles->status == 2)
                                Peminjaman
                                @elseif($vehicles->status == 3)
                                Penitipan
                                @elseif($vehicles->status == 4)
                                Arsip
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nomor Polisi Lama</th>
                            <td>{{ $vehicles->nomor_polisi_lama }}</td>
                        </tr>
                        <tr>
                            <th>Nama BPKB</th>
                            <td>{{ $vehicles->nama_bpkb }}</td>
                        </tr>
                        <tr>
                            <th>Merk</th>
                            <td>{{ $vehicles->merk }}</td>
                        </tr>
                        <tr>
                            <th>Tipe</th>
                            <td>{{ $vehicles->tipe }}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>{{ $vehicles->jenis }}</td>
                        </tr>
                        <tr>
                            <th>Model</th>
                            <td>{{ $vehicles->model }}</td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td>{{ $vehicles->tahun }}</td>
                        </tr>
                        <tr>
                            <th>Warna</th>
                            <td>{{ $vehicles->warna }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Jatuh Tempo</th>
                            <td>{{ $vehicles->tanggal_jatuh_tempo }}</td>
                        </tr>
                        <tr>
                            <th>Bulan Jatuh Tempo</th>
                            <td>{{ $vehicles->bulan_jatuh_tempo }}</td>
                        </tr>
                        <tr>
                            <th>Divisi/Lokasi</th>
                            <td>{{ $vehicles->bagian_lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Riwayat</th>
                            <td>
                                @foreach (explode(',', $vehicles->riwayat) as $riwayat)
                                {{ $riwayat }}
                                <br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; font-size:24px">Informasi Peminjaman</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Nama Peminjaman</th>
                            <td>{{ $vehicles->nama_peminjaman }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Peminjaman</th>
                            <td>{{ $vehicles->tanggal_peminjaman }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali Peminjaman</th>
                            <td>{{ $vehicles->tanggal_kembali_peminjaman }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan Peminjaman</th>
                            <td>{{ $vehicles->keterangan_peminjaman }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; font-size:24px">Informasi Penitipan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Nama Penitipan</th>
                            <td>{{ $vehicles->nama_penitipan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Penitipan</th>
                            <td>{{ $vehicles->tanggal_penitipan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali Penitipan</th>
                            <td>{{ $vehicles->tanggal_kembali_penitipan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan Penitipan</th>
                            <td>{{ $vehicles->keterangan_penitipan }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $vehicles->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Dijual</th>
                            <td>{{ $vehicles->tanggal_dijual }}</td>
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

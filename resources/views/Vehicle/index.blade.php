@extends('layouts.main')

@section('title')
    {{ $header }}
@endsection

@section('extracss')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/rr-1.3.1/sc-2.0.7/sb-1.4.0/sl-1.5.0/datatables.min.css"/>

@endsection

@section('header')
    <h1>{{ $header }}</h1>
    @can('admin')
    <div class="section-header-breadcrumb">
        <a href="/vehicle/create" class="btn btn-lg icon-left btn-primary"><i class="fas fa-edit"></i> Tambah</a>
        <button class="btn btn-success btn-lg icon-lect ml-2" data-toggle="modal" data-target="#Modal"><i class="fas fa-edit"></i> Import</button>
    </div>
    @endcan
@endsection

@section('success')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
@endsection

@section('container')
    <div class="card">
        <div class="card-body p-0">
            <div class="p-3">
                <table class="display" style="width:100%" id="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nomor Polisi BPKB</th>
                            <th>Status</th>
                            <th>Nomor Polisi Lama</th>
                            <th>Nama BPKB</th>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>Jenis</th>
                            <th>Model</th>
                            <th>Tahun</th>
                            <th>Warna</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Bulan Jatuh Tempo</th>
                            <th>Divisi/Lokasi</th>
                            <th>Riwayat</th>
                            <th>Nama Peminjaman</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Kembali Peminjaman</th>
                            <th>Keterangan Peminjaman</th>
                            <th>Nama Penitipan</th>
                            <th>Tanggal Penitipan</th>
                            <th>Tanggal Kembali Penitipan</th>
                            <th>Keterangan Penitipan</th>
                            <th>Keterangan</th>
                            <th>Tanggal Dijual</th>
                            @can('admin') 
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                            <tr>
                                <td></td>
                                <td><a class="text-decoration-none" href="/vehicle/{{ $vehicle->nomor_polisi_bpkb }}"> {!! $vehicle->nomor_polisi_bpkb !!}</a></td>
                                <td>
                                    @if($vehicle->status == 1)
                                    Aset
                                    @elseif($vehicle->status == 2)
                                    Peminjaman
                                    @elseif($vehicle->status == 3)
                                    Penitipan
                                    @elseif($vehicle->status == 4)
                                    Arsip
                                    @endif
                                </td>
                                <td>{{ $vehicle->nomor_polisi_lama }}</td>
                                <td>{{ $vehicle->nama_bpkb }}</td>
                                <td>{{ $vehicle->merk }}</td>
                                <td>{{ $vehicle->tipe }}</td>
                                <td>{{ $vehicle->jenis }}</td>
                                <td>{{ $vehicle->model }}</td>
                                <td>{{ $vehicle->tahun }}</td>
                                <td>{{ $vehicle->warna }}</td>
                                <td>{{ $vehicle->tanggal_jatuh_tempo }}</td>
                                <td>{{ $vehicle->bulan_jatuh_tempo }}</td>
                                <td>{{ $vehicle->bagian_lokasi }}</td>
                                <td>
                                    @foreach (explode(',', $vehicle->riwayat) as $riwayat)
                                    {{ $riwayat }}
                                    <br>
                                    @endforeach
                                </td>
                                <td>{{ $vehicle->nama_peminjaman }}</td>
                                <td>{{ $vehicle->tanggal_peminjaman }}</td>
                                <td>{{ $vehicle->tanggal_kembali_peminjaman }}</td>
                                <td>{{ $vehicle->keterangan_peminjaman }}</td>
                                <td>{{ $vehicle->nama_penitipan }}</td>
                                <td>{{ $vehicle->tanggal_penitipan }}</td>
                                <td>{{ $vehicle->tanggal_kembali_penitipan }}</td>
                                <td>{{ $vehicle->keterangan_penitipan }}</td>
                                <td>{{ $vehicle->keterangan }}</td>
                                <td>{{ $vehicle->tanggal_dijual }}</td>
                                @can('admin') 
                                <td>
                                    {{-- <a href="/vehicle/{{ $vehicle->nomor_polisi_bpkb }}"
                                        class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>
                                        Detail</a> --}}
                                    <a href="/vehicle/{{ $vehicle->nomor_polisi_bpkb }}/edit"
                                        class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>  Edit </a>
                                    @if(request('status') == 'arsip')
                                    <form action="/vehicle/{{ $vehicle->nomor_polisi_bpkb }}" method="post" style="display: inline;">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-icon icon-left btn-danger" onclick="return confirm('Menghapus Data Permanen?')"><i class="fas fa-times"></i> Hapus</button>
                                    </form>  
                                    @else    
                                    <form action="/vehicle/arsip/{{ $vehicle->nomor_polisi_bpkb }}" method="post"
                                        style="display: inline;">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="4" name="status" id="status">
                                        <input type="hidden" value="{{ $vehicle->nomor_polisi_bpkb }}" name="nomor_sertifikat" id="nomor_sertifikat">
                                        <button class="btn btn-icon icon-left btn-danger" onclick="return confirm('Memindahkan Data ke Arsip?')"><i class="fas fa-times"></i> Hapus</button>
                                    </form>
                                    @endif
                                </td>
                                @endcan
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="ml-3">
                {{-- {{ $employees->links() }} --}}
            </div>
        </div>
    </div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
    <div class="modal-dialog" role="document">
        <form action="/vehicle/import" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Import Data Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <div class="input-group mt-4 ml-2">
                    <input name="import" id="import" type="file" class="form-control" style="padding: 7px 15px">
                    <div class="input-group-append">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit">Import</button>
              </div>
            </div>
        </form>
    </div>
  </div>
  @endsection

@section('extrajs') 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/rr-1.3.1/sc-2.0.7/sb-1.4.0/sl-1.5.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.13.1/pagination/simple_numbers_no_ellipses.js"></script>

    
    <script>
        $(document).ready(function () {
            var t = $('#table').DataTable({
                buttons: [
                    'colvis',
                    'searchBuilder',
                    {
                        extend: 'pdf',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        split: {
                            extend: 'pdf',
                            text: 'PDF-onlyshow',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            exportOptions: {
                                columns: ':visible' 
                            },
                        }
                    },
                    {
                        extend: 'excel',
                        split: {
                            extend: 'excel',
                            text: 'Excel-onlyshow',
                            exportOptions: {
                                columns: ':visible'
                            },
                        }
                    },
                ],
                dom: 'Bfrtip',
                "columnDefs": [{
                    "visible": false,
                    "targets": [3, 5, 6, 8, 9, 10,  11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 24]
                },
                {
                    sortable: false,
                    "class": "index",
                    targets: 0,
                },
                ],
                order: [[ 1, 'asc' ]],
                colReorder: true,
                fixedColumns: true,
                fixedColumns: {
                    left: 2
                },
                paging: true,
                pagingType: "simple_numbers_no_ellipses",
                deferRender: true,
                scrollY: 620,
                scrollX: true,
                scrollCollapse: true,
            });
            t.on('order.dt search.dt', function () {
                let i = 1;
         
                t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                    this.data(i++);
                });
            }).draw();
    });

    </script>
@endsection

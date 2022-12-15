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
        <a href="/land/create" class="btn btn-lg icon-left btn-primary"><i class="fas fa-edit"></i> Tambah</a>
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
                            <th>Nomor Sertifikat</th>
                            <th>Status</th>
                            <th>Posisi Sertifikat</th>
                            <th>Pemilik</th>
                            <th>Nomor SPPT</th>
                            <th>NJOP</th>
                            <th>Luas</th>
                            <th>Lokasi</th>
                            <th>Alamat</th>
                            <th>Harga Pembelian</th>
                            <th>Tanggal Pembelian</th>
                            <th>Penjaminan</th>
                            <th>Tanggal Penjaminan</th>
                            <th>Tanggal Kembali Penjaminan</th>
                            <th>Keterangan Penjaminan</th>
                            <th>Keterangan</th>
                            <th>Tanggal Dijual</th>
                            @can('admin') 
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lands as $land)
                            <tr>
                                <td></td>
                                <td><a class="text-decoration-none" href="/land/{{ $land->nomor_sertifikat }}"> {!! $land->nomor_sertifikat !!}</a></td>
                                <td>
                                    @if($land->status == 1)
                                    Sertifikat
                                    @elseif($land->status == 2)
                                    Belum Sertifikat
                                    @elseif($land->status == 3)
                                    Proses
                                    @elseif($land->status == 4)
                                    Petok
                                    @elseif($land->status == 5)
                                    Jaminan
                                    @elseif($land->status == 6)
                                    Arsip
                                    @endif
                                </td>
                                <td>{{ $land->posisi_sertifikat }}</td>
                                <td>{{ $land->pemilik }}</td>
                                <td>{{ $land->nomor_sppt }}</td>
                                <td>{{ $land->njop }}</td>
                                <td>{{ $land->luas }}</td>
                                <td>{{ $land->lokasi }}</td>
                                <td>{{ $land->alamat }}</td>
                                <td>{{ $land->harga_pembelian }}</td>
                                <td>{{ $land->tanggal_pembelian }}</td>
                                <td>{{ $land->penjaminan }}</td>
                                <td>{{ $land->tanggal_penjaminan }}</td>
                                <td>{{ $land->tanggal_kembali_penjaminan }}</td>
                                <td>{{ $land->keterangan_penjaminan }}</td>
                                <td>{{ $land->keterangan }}</td>
                                <td>{{ $land->tanggal_dijual }}</td>
                                @can('admin') 
                                <td>
                                    {{-- <a href="/land/{{ $land->nomor_sertifikat }}"
                                        class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>
                                        Detail</a> --}}
                                    <a href="/land/{{ $land->nomor_sertifikat }}/edit"
                                        class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>  Edit </a>
                                    @if(request('owner') == 'arsip')
                                    <form action="/land/{{ $land->nomor_sertifikat }}" method="post" style="display: inline;">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-icon icon-left btn-danger" onclick="return confirm('Menghapus Data Permanen?')"><i class="fas fa-times"></i> Hapus</button>
                                    </form>  
                                    @else    
                                    <form action="/land/arsip/{{ $land->nomor_sertifikat }}" method="post"
                                        style="display: inline;">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="6" name="status" id="status">
                                        <input type="hidden" value="{{ $land->nomor_sertifikat }}" name="nomor_sertifikat" id="nomor_sertifikat">
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
                {{-- {{ $lands->links() }} --}}
            </div>
        </div>
    </div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
    <div class="modal-dialog" role="document">
        <form action="/land/import" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Import Data Tanah</h5>
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
                    "targets": [5, 6, 9, 10, 11, 12, 13, 14, 15, 16, 17]
                },
                {
                    sortable: false,
                    "class": "index",
                    targets: 0,
                },
                ],
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
                // scrollX: 50,
                // scroller: true,
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

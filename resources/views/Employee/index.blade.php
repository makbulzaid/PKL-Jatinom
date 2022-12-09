@extends('layouts.main')

@section('title')
    {{ $header }}
@endsection

@section('extracss')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/rr-1.3.1/sc-2.0.7/sb-1.4.0/sl-1.5.0/datatables.min.css"/>

@endsection

@section('header')
    <h1>{{ $header }}</h1>
    <div class="section-header-breadcrumb">
        <a href="/employee/create" class="btn btn-lg icon-left btn-primary"><i class="fas fa-edit"></i> Tambah</a>
    </div>
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
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Jumlah Anak</th>
                            <th>Nama Ibu</th>
                            <th>Pendidikan</th>
                            <th>Golongan Darah</th>
                            <th>Nomor KTP</th>
                            <th>Nomor Telepon</th>
                            <th>Nomor Induk Karyawan</th>
                            <th>Tanggal Masuk</th>
                            <th>Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Bagian</th>
                            <th>Lokasi</th>
                            <th>Klasifikasi Karyawan</th>
                            <th>Klasifikasi Gaji</th>
                            <th>Nomor BPJS Ketenagakerjaan</th>
                            <th>Tanggal Masuk BPJS Ketenagakerjaan</th>
                            <th>Tanggal Keluar BPJS Ketenagakerjaan</th>
                            <th>Nomor BPJS Kesehatan</th>
                            <th>Tanggal Masuk BPJS Kesehatan</th>
                            <th>Tanggal Keluar BPJS Kesehatan</th>
                            <th>Riwayat Pekerjaan</th>
                            <th>Riwayat Pendidikan</th>
                            <th>Riwayat Pelanggaran</th>
                            <th>Keterangan</th>
                            <th>Tanggal Keluar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td></td>
                                <td><a class="text-decoration-none" href="/employee/{{ $employee->nomor_induk }}"> {!! $employee->nama !!}</a></td>
                                <td>{{ $employee->jenis_kelamin }}</td>
                                <td>{{ $employee->tempat_lahir }}</td>
                                <td>{!! $employee->tanggal_lahir !!}</td>
                                <td>{!! $employee->alamat !!}</td>
                                <td>{{ $employee->status }}</td>
                                <td>{{ $employee->jumlah_anak }}</td>
                                <td>{{ $employee->nama_ibu }}</td>
                                <td>{{ $employee->pendidikan }}</td>
                                <td>{{ $employee->golongan_darah }}</td>
                                <td>{!! $employee->ktp !!}</td>
                                <td>{!! $employee->nomor_telepon !!}</td>
                                <td>{!! $employee->nomor_induk !!}</td>
                                <td>{{ $employee->tanggal_masuk }}</td>
                                <td>
                                    @foreach ($employee->companies as $company)
                                        {!! $company->nama_company !!}
                                        <br>
                                    @endforeach
                                </td>
                                <td>{!! $employee->jabatan !!}</td>
                                <td>{!! $employee->bagian !!}</td>
                                <td>{!! $employee->lokasi !!}</td>
                                <td>{{ $employee->klasifikasi_karyawan }}</td>
                                <td>{{ $employee->klasifikasi_gaji }}</td>
                                <td>{{ $employee->nomor_bpjsket }}</td>
                                <td>{{ $employee->tanggal_masuk_bpjsket }}</td>
                                <td>{{ $employee->tanggal_keluar_bpjsket }}</td>
                                <td>{{ $employee->nomor_bpjskes }}</td>
                                <td>{{ $employee->tanggal_masuk_bpjskes }}</td>
                                <td>{{ $employee->tanggal_keluar_bpjskes }}</td>
                                <td>
                                    @foreach (explode(',', $employee->riwayat_pekerjaan) as $riwayat_pekerjaan)
                                    {{ $riwayat_pekerjaan }}
                                    <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach (explode(',', $employee->riwayat_pendidikan) as $riwayat_pendidikan)
                                    {{ $riwayat_pendidikan }}
                                    <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach (explode(',', $employee->riwayat_pelanggaran) as $riwayat_pelanggaran)
                                    {{ $riwayat_pelanggaran }}
                                    <br>
                                    @endforeach
                                </td>
                                <td>{{ $employee->keterangan }}</td>
                                <td>{{ $employee->tanggal_keluar }}</td>
                                <td>
                                    {{-- <a href="/employee/{{ $employee->nomor_induk }}"
                                        class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i>
                                        Detail</a> --}}
                                    <a href="/employee/{{ $employee->nomor_induk }}/edit"
                                        class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>  Edit </a>
                                    @if(request('company') == 'arsip')
                                    <form action="/employee/{{ $employee->nomor_induk }}" method="post" style="display: inline;">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-icon icon-left btn-danger" onclick="return confirm('Menghapus Data Permanen?')"><i class="fas fa-times"></i> Hapus</button>
                                    </form>  
                                    @else    
                                    <form action="/employee/keluar/{{ $employee->nomor_induk }}" method="post"
                                        style="display: inline;">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="1" name="keluar" id="keluar">
                                        <input type="hidden" value="{{ $employee->nomor_induk }}" name="nomor_induk" id="nomor_induk">
                                        <button class="btn btn-icon icon-left btn-danger" onclick="return confirm('Memindahkan Data ke Arsip?')"><i class="fas fa-times"></i> Hapus</button>
                                    </form>
                                    @endif
                                </td>
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
                    "targets": [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31]
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

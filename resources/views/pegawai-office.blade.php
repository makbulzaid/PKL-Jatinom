@extends('index')

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
@endpush

@section('pegawai')
    class=active
@endsection

@section('satu')
    class=active
@endsection

@section('judul')
    Office
@endsection

@section('content')

@if (session('success'))
    <div id="sukses" class="alert alert-success">
        {{session('success')}}
    </div>
@endif


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pegawai</h6>
    </div>
    
    <div class="col-sm-6">
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalAdd1"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Pegawai
        </a>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table id="satu" border="1" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Bagian</th>
                        <th>Aksi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtOffice as $of)
                    <tr>
                        <td>{{$of->id_office}}</td>
                        <td>{{$of->nama_office}}</td>
                        <td>{{$of->ktp_office}}</td>
                        <td>{{$of->alamat_office}}</td>
                        <td>{{$of->bagian_office}}</td>
                        <td>
                            <div class="dropdown d-inline mr-2">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalEdit1{{ $of->id_office }}">Edit</a>
                                  <a class="dropdown-item" href=""data-toggle="modal" data-target="#modalDelete1">Hapus</a>
                                </div>
                              </div>
                        </td>
                        <td>
                            <div class="buttons">
                                <button  type="button" class="btn btn-info" data-target="#modalDetail1" data-toggle="modal"
                                    data-id_office="{{ $of->id_office }}"
                                    data-nama_office="{{ $of->nama_office }}"
                                    data-nik_office="{{ $of->nik_office }}"
                                    data-ktp_office="{{ $of->ktp_office }}"
                                    data-alamat_office="{{ $of->alamat_office }}"
                                    data-tempat_lahir_office="{{ $of->tempat_lahir_office }}"
                                    data-tgl_lahir_office="{{date('d-m-Y',strtotime ($of->tgl_lahir_office)) }}"
                                    data-usia_office="{{ $of->usia_office }}"
                                    data-riwayat_pendidikan_office="{{ $of->riwayat_pendidikan_office }}"
                                    data-golongan_darah_office="{{ $of->golongan_darah_office }}"
                                    data-jenis_kelamin_office="{{ $of->jenis_kelamin_office }}"
                                    data-status_office="{{ $of->status_office }}"
                                    data-jumlah_anak_office="{{ $of->jumlah_anak_office }}"
                                    data-ibu_office="{{ $of->ibu_office }}"
                                    data-tgl_masuk_office="{{ date('d-m-Y',strtotime ($of->tgl_masuk_office)) }}"
                                    data-masa_kerja_office="{{ $of->masa_kerja_office }}"
                                    data-pekerja_office="{{ $of->pekerja_office }}"
                                    data-bagian_office="{{ $of->bagian_office }}"
                                    data-gaji_office="{{ $of->gaji_office }}"
                                    data-no_kpj_office="{{ $of->no_kpj_office }}"
                                    data-tgl_masuk_bpjsket_office="{{date('d-m-Y',strtotime ($of->tgl_masuk_bpjsket_office)) }}"
                                    data-tgl_keluar_bpjsket_office="{{ date('d-m-Y',strtotime ($of->tgl_keluar_bpjsket_office)) }}"
                                    data-no_peserta_office="{{ $of->no_peserta_office }}"
                                    data-tgl_masuk_bpjskes_office="{{date('d-m-Y',strtotime ($of->tgl_masuk_bpjskes_office)) }}"
                                    data-tgl_keluar_bpjskes_office="{{ date('d-m-Y',strtotime ($of->tgl_keluar_bpjskes_office)) }}">
                                Detail</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('modal.detail.detail-pegawai-office')
@include('modal.tambah.tambah-pegawai-office')
@include('modal.edit.edit-pegawai-office')
@include('modal.hapus.hapus-pegawai-office')

@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.js"></script>

<script>
$('#satu').DataTable({
    dom: 'Bfrtip',
    pageLength: 5,
    buttons:[
        'copy','pdf','print','colvis',
    ]

});
</script>

@endpush
@extends('index')

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
@endpush

@section('pegawai')
    class=active
@endsection

@section('delapanbelas')
    class=active
@endsection

@section('judul')
    PS Pare
@endsection

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pegawai</h6>
    </div>
    
    <div class="col-sm-6">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalAdd18"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Pegawai
        </a>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table id="delapanbelas" border="1" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bradley Greer</td>
                        <td>Software Engineer</td>
                        <td>
                            <div class="dropdown d-inline mr-2">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalEdit18">Edit</a>
                                    <a class="dropdown-item" href=""data-toggle="modal" data-target="#modalDelete18">Hapus</a>
                                </div>
                              </div>
                        </td>
                        <td>
                            <div class="buttons">
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modalDetail18">Detail</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('modal.detail.detail-pegawai-ps-pare')
@include('modal.tambah.tambah-pegawai-ps-pare')
@include('modal.edit.edit-pegawai-ps-pare')
@include('modal.hapus.hapus-pegawai-ps-pare')

@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.js"></script>

<script>
$('#delapanbelas').DataTable({
    dom: 'Bfrtip',
    pageLength: 5,
    buttons:[
        'copy','pdf','print','colvis'
    ]

});
</script>

@endpush
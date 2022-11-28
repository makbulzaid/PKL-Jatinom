    @extends('layouts.main')

    @section('title')
        {{ $employees->nama }}
    @endsection

    @section('extracss')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/sb-1.4.0/sl-1.5.0/datatables.min.css"/>
    @endsection

    @section('header')
        <h1>Detail Karyawan</h1>
        <div class="section-header-breadcrumb">
            <a href="/employee/{{ $employees->nomor_induk }}/edit" class="btn btn-lg icon-left btn-primary mr-2"><i
                    class="fas fa-edit"></i> Edit</a>
            
            @if($employees->keluar_jig == 1)
            <form action="/employee/{{ $employees->nomor_induk }}" method="post" style="display: inline;">
                @method('delete')
                @csrf
                <button class="btn btn-lg icon-left btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i> Hapus</button>
            </form>  
            @else    
            <form action="/employee/keluar/{{ $employees->nomor_induk }}" method="post"
                style="display: inline;">
                @method('put')
                @csrf
                <input type="hidden" value="1" name="keluar_jig" id="keluar_jig">
                <input type="hidden" value="{{ $employees->nomor_induk }}" name="nomor_induk" id="nomor_induk">
                <button class="btn btn-lg icon-left btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i> Hapus</button>
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
                                <td style="font-weight:bold; font-size:24px">Informasi Pribadi</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td> <img src="{{ asset('storage/' . $employees->foto) }}"></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $employees->nama }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $employees->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $employees->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $employees->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Usia</th>
                                <td>{{ $age }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $employees->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $employees->status }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Anak</th>
                                <td>{{ $employees->jumlah_anak }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td>{{ $employees->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td>{{ $employees->pendidikan }}</td>
                            </tr>
                            <tr>
                                <th>Golongan Darah</th>
                                <td>{{ $employees->golongan_darah }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Kependudukan</th>
                                <td>{{ $employees->ktp }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>{{ $employees->nomor_telepon }}</td>
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
                                <td style="font-weight:bold; font-size:24px">Informasi Pekerjaan</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Nomor Induk Karyawan</th>
                                <td>{{ $employees->nomor_induk }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk</th>
                                <td>{{ $employees->tanggal_masuk }}</td>
                            </tr>
                            <tr>
                                <th>Perusahaan</th>
                                <td>
                                    @foreach ($employees->companies as $company)
                                        {{ $company->nama_company }}
                                        <br>
                                        <br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>{{ $employees->jabatan }}</td>
                            </tr>
                            <tr>
                                <th>Bagian</th>
                                <td>{{ $employees->bagian }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>{{ $employees->lokasi }}</td>
                            </tr>
                            <tr>
                                <th>Masa Kerja</th>
                                <td>{{ $masakerja }} Tahun</td>

                            </tr>
                            <tr>
                                <th>Klasifikasi Pegawai</th>
                                <td>{{ $employees->klasifikasi_pegawai }}</td>
                            </tr>
                            <tr>
                                <th>Klasifikasi Gaji</th>
                                <td>{{ $employees->klasifikasi_gaji }}</td>
                            </tr>
                            <tr>
                                <th>Nomor BPJS Ketenagakerjaan</th>
                                <td>{{ $employees->nomor_bpjsket }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk BPJS Ketenagakerjaan</th>
                                <td>{{ $employees->tanggal_masuk_bpjsket }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Keluar BPJS Ketenagakerjaan</th>
                                <td>{{ $employees->tanggal_keluar_bpjsket }}</td>
                            </tr>
                            <tr>
                                <th>Nomor BPJS Kesehatan</th>
                                <td>{{ $employees->nomor_bpjskes }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk BPJS Kesehatan</th>
                                <td>{{ $employees->tanggal_masuk_bpjskes }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Keluar BPJS Kesehatan</th>
                                <td>{{ $employees->tanggal_keluar_bpjskes }}</td>
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
                                <td style="font-weight:bold; font-size:24px">Riwayat</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Tanggal Keluar Jatinom Indah Group</th>
                                <td>{{ $employees->tanggal_keluar_bpjskes }}</td>
                            </tr>
                            <tr>
                                <th>Riwayat Pekerjaan</th>
                                <td>
                                    @foreach (explode(',', $employees->riwayat_pekerjaan) as $riwayat_pekerjaan)
                                    {{ $riwayat_pekerjaan }}
                                    <br>
                                    <br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Riwayat Pendidikan</th>
                                <td>
                                    @foreach (explode(',', $employees->riwayat_pendidikan) as $riwayat_pendidikan)
                                    {{ $riwayat_pendidikan }}
                                    <br>
                                    <br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Riwayat Pelanggaran</th>
                                <td>
                                    @foreach (explode(',', $employees->riwayat_pelanggaran) as $riwayat_pelanggaran)
                                    {{ $riwayat_pelanggaran }}
                                    <br>
                                    <br>
                                    @endforeach
                                </td>
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

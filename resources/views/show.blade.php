    @extends('layouts.main')

    @section('title')
        {{ $employees->nama_employee }}
    @endsection

    @section('header')
        <h1>Detail Karyawan</h1>
        <div class="section-header-breadcrumb">
            <a href="/employee/{{ $employees->nik_employee }}/edit" class="btn btn-lg icon-left btn-primary mr-2"><i class="fas fa-edit"></i> Edit</a>
            <form action="/employee/{{ $employees->nik_employee }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-lg icon-left btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i> Hapus</button>
            </form>
        </div>
    @endsection

    @section('container')
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ringkasan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $employees->nama_employee }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Induk Karyawan</th>
                                    <td>{{ $employees->nik_employee }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Induk Kependudukan</th>
                                    <td>{{ $employees->ktp_employee }}</td>
                                </tr>
                                <tr>
                                    <th>Perusahaan</th>
                                    <td>
                                        @foreach ($employees->companies as $company)
                                        {{ $company->nama_company }}
                                        <br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $employees->nama_lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Bagian</th>
                                    <td>{{ $employees->bagian_employee }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Pribadi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $employees->jenis_kelamin_employee }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $employees->alamat_employee }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td>{{ $employees->tempat_lahir_employee }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{ $employees->tgl_lahir_employee }}</td>
                                    <th>Usia</th>
                                    <td>{{ $age }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <th>Pendidikan</th>
                                    <td>{{ $employees->pendidikan_employee }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <th>Golongan Darah</th>
                                    <td>{{ $employees->golongan_darah_employee }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $employees->status_employee }}</td>
                                    <th>Jumlah Anak</th>
                                    <td>{{ $employees->jumlah_anak_employee }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Ibu</th>
                                    <td>{{ $employees->ibu_employee }}</td>
                                    <td colspan="3"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Infomrasi Karyawan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>Tanggal Masuk</th>
                                    <td>{{ $employees->tgl_masuk_employee }}</td>
                                    <th>Masa Kerja</th>
                                    <td>{{ $masakerja }} Tahun</td>
                                </tr>
                                <tr>
                                    <th>Klasifikasi Karyawan</th>
                                    <td>{{ $employees->klasifikasi_employee }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <th>Klasifikasi Gaji</th>
                                    <td>{{ $employees->gaji_employee }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <th colspan="4"></th>
                                </tr>
                                <tr>
                                    <th>Nomor BPJS Ketenagakerjaan</th>
                                    <td>{{ $employees->no_kpj_employee }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Masuk</th>
                                    <td>{{ $employees->tgl_masuk_bpjsket_employee }}</td>
                                    <th>Tanggal Keluar</th>
                                    <td>{{ $employees->tgl_keluar_bpjsket_employee }}</td>
                                </tr>
                                <tr>
                                    <th colspan="4"></th>
                                </tr>
                                <tr>
                                    <th>Nomor BPJS Kesehatan</th>
                                    <td>{{ $employees->no_peserta_employee }}</td>
                                    <td colspan="3"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Masuk</th>
                                    <td>{{ $employees->tgl_masuk_bpjskes_employee }}</td>
                                    <th>Tanggal Keluar</th>
                                    <td>{{ $employees->tgl_keluar_bpjskes_employee }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

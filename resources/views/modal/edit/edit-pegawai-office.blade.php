@foreach ($dtOffice as $of)

<form action="{{ url ('/edit/'.$of->id_office) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="modalEdit1{{ $of->id_office }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user"></i> {{ __('Edit Data Pegawai') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Id') }}:</strong>
                            <input type="text" class="form-control" id="id_office" name="id_office" placeholder="Id" value="{{ $of->id_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Nama') }}:</strong>
                            <input type="text" class="form-control" id="nama_office" name="nama_office" placeholder="Nama Lengkap" value="{{ $of->nama_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('NIK') }}:</strong>
                            <input type="text" class="form-control" id="nik_office" name="nik_office" placeholder="NIK" value="{{ $of->nik_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('No. KTP') }}:</strong>
                            <input type="text" class="form-control" id="ktp_office" name="ktp_office" placeholder="No. KTP" value="{{ $of->ktp_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Alamat') }}:</strong>
                            <textarea class="form-control" id="alamat_office" name="alamat_office" placeholder="Alamat">{{ $of->alamat_office }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tempat Lahir') }}:</strong>
                            <input type="text" class="form-control" id="tempat_lahir_office" name="tempat_lahir_office" placeholder="Tempat Lahir" value="{{ $of->tempat_lahir_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Lahir') }}:</strong>
                            <input type="text" class="form-control" id="tgl_lahir_office" name="tgl_lahir_office" placeholder="Tanggal Lahir" value="{{ $of->tgl_lahir_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Usia') }}:</strong>
                            <input type="text" class="form-control" id="usia_office" name="usia_office" placeholder="Usia" value="{{ $of->usia_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Riwayat Pendidikan') }}:</strong>
                            <input type="text" class="form-control" id="riwayat_pendidikan_office" name="riwayat_pendidikan_office" placeholder="Riwayat Pendidikan" value="{{ $of->riwayat_pendidikan_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Golongan Darah') }}:</strong>
                            <input type="text" class="form-control" id="golongan_darah_office" name="golongan_darah_office" placeholder="Golongan Darah" value="{{ $of->golongan_darah_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Jenis Kelamin') }}:</strong>
                            <input type="text" class="form-control" id="jenis_kelamin_office" name="jenis_kelamin_office" placeholder="Jenis Kelamin" value="{{ $of->jenis_kelamin_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Status') }}:</strong>
                            <input type="text" class="form-control" id="status_office" name="status_office" placeholder="Status" value="{{ $of->status_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Jumlah Anak') }}:</strong>
                            <input type="text" class="form-control" id="jumlah_anak_office" name="jumlah_anak_office" placeholder="Jumlah Anak" value="{{ $of->jumlah_anak_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Nama Ibu Kandung') }}:</strong>
                            <input type="text" class="form-control" id="ibu_office" name="ibu_office" placeholder="Nama Ibu Kandung" value="{{ $of->ibu_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Masuk') }}:</strong>
                            <input type="text" class="form-control" id="tgl_masuk_office" name="tgl_masuk_office" placeholder="Tanggal Masuk" value="{{ $of->tgl_masuk_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Masa Kerja') }}:</strong>
                            <input type="text" class="form-control" id="masa_kerja_office" name="masa_kerja_office" placeholder="Masa Kerja" value="{{ $of->masa_kerja_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Pekerja') }}:</strong>
                            <input type="text" class="form-control" id="pekerja_office" name="pekerja_office" placeholder="Pekerja" value="{{ $of->pekerja_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Bagian') }}:</strong>
                            <input type="text" class="form-control" id="bagian_office" name="bagian_office" placeholder="Bagian" value="{{ $of->bagian_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Klasifikasi Gaji') }}:</strong>
                            <input type="text" class="form-control" id="gaji_office" name="gaji_office" placeholder="Klasifikasi Gaji" value="{{ $of->gaji_office }}">
                        </div>
                    </div>
                    <h6> {{ __('BPJS Ketenagakerjaan') }}</h6>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('No.KPJ') }}:</strong>
                            <input type="text" class="form-control" id="no_kpj_office" name="no_kpj_office" placeholder="No. KPJ" value="{{ $of->no_kpj_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Masuk') }}:</strong>
                            <input type="text" class="form-control" id="tgl_masuk_bpjsket_office" name="tgl_masuk_bpjsket_office" placeholder="Tanggal Masuk" value="{{ $of->tgl_masuk_bpjsket_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Keluar') }}:</strong>
                            <input type="text" class="form-control" id="tgl_keluar_bpjsket_office" name="tgl_keluar_bpjsket_office" placeholder="Tanggal Keluar" value="{{ $of->tgl_keluar_bpjsket_office }}">
                        </div>
                    </div>
                    <h6> {{ __('BPJS Kesehatan') }}</h6>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('No.Peserta') }}:</strong>
                            <input type="text" class="form-control" id="no_peserta_office" name="no_peserta_office" placeholder="No. Peserta" value="{{ $of->no_peserta_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Masuk') }}:</strong>
                            <input type="text" class="form-control" id="tgl_masuk_bpjskes_office" name="tgl_masuk_bpjskes_office" placeholder="Tanggal Masuk" value="{{ $of->tgl_masuk_bpjskes_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Keluar') }}:</strong>
                            <input type="text" class="form-control" id="tgl_keluar_bpjskes_office" name="tgl_keluar_bpjskes_office" placeholder="Tanggal Keluar" value="{{ $of->tgl_keluar_bpjskes_office }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">{{ __('Kembali') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endforeach
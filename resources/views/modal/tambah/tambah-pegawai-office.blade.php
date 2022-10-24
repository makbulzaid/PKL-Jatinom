<form action="{{ route('simpan') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="modalAdd1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user"></i> {{ __('Tambah Pegawai Baru') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Id') }}:</strong>
                            <input type="text" class="form-control" id="id_office" name="id_office" placeholder="Id">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Nama') }}:</strong>
                            <input type="text" class="form-control" id="nama_office" name="nama_office" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('NIK') }}:</strong>
                            <input type="text" class="form-control" id="nik_office" name="nik_office" placeholder="NIK">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('No. KTP') }}:</strong>
                            <input type="text" class="form-control" id="ktp_office" name="ktp_office" placeholder="No. KTP">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Alamat') }}:</strong>
                            <textarea class="form-control" id="alamat_office" name="alamat_office" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tempat Lahir') }}:</strong>
                            <input type="text" class="form-control" id="tempat_lahir_office" name="tempat_lahir_office" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Lahir') }}:</strong>
                            <input type="date" class="form-control" id="tgl_lahir_office" name="tgl_lahir_office" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Usia') }}:</strong>
                            <input type="text" class="form-control" id="usia_office" name="usia_office" placeholder="Usia">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Riwayat Pendidikan') }}:</strong>
                            <input type="text" class="form-control" id="riwayat_pendidikan_office" name="riwayat_pendidikan_office" placeholder="Riwayat Pendidikan">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Golongan Darah') }}:</strong>
                            <input type="text" class="form-control" id="golongan_darah_office" name="golongan_darah_office" placeholder="Golongan Darah">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Jenis Kelamin') }}:</strong>
                            <input type="text" class="form-control" id="jenis_kelamin_office" name="jenis_kelamin_office" placeholder="Jenis Kelamin">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Status') }}:</strong>
                            <input type="text" class="form-control" id="status_office" name="status_office" placeholder="Status">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Jumlah Anak') }}:</strong>
                            <input type="text" class="form-control" id="jumlah_anak_office" name="jumlah_anak_office" placeholder="Jumlah Anak">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Nama Ibu Kandung') }}:</strong>
                            <input type="text" class="form-control" id="ibu_office" name="ibu_office" placeholder="Nama Ibu Kandung">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Masuk') }}:</strong>
                            <input type="date" class="form-control" id="tgl_masuk_office" name="tgl_masuk_office" placeholder="Tanggal Masuk">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Masa Kerja') }}:</strong>
                            <input type="text" class="form-control" id="masa_kerja_office" name="masa_kerja_office" placeholder="Masa Kerja">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Pekerja Tetap/Pekerja Kontrak') }}:</strong>
                            <input type="text" class="form-control" id="pekerja_office" name="pekerja_office" placeholder="Pekerja">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Bagian') }}:</strong>
                            <input type="text" class="form-control" id="bagian_office" name="bagian_office" placeholder="Bagian">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Klasifikasi Gaji') }}:</strong>
                            <input type="text" class="form-control" id="gaji_office" name="gaji_office" placeholder="Klasifikasi Gaji">
                        </div>
                    </div>
                    <h6> {{ __('BPJS Ketenagakerjaan') }}</h6>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('No.KPJ') }}:</strong>
                            <input type="text" class="form-control" id="no_kpj_office" name="no_kpj_office" placeholder="No. KPJ">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Masuk') }}:</strong>
                            <input type="date" class="form-control" id="tgl_masuk_bpjsket_office" name="tgl_masuk_bpjsket_office" placeholder="Tanggal Masuk">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Keluar') }}:</strong>
                            <input type="date" class="form-control" id="tgl_keluar_bpjsket_office" name="tgl_keluar_bpjsket_office" placeholder="Tanggal Keluar">
                        </div>
                    </div>
                    <h6> {{ __('BPJS Kesehatan') }}</h6>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('No.Peserta') }}:</strong>
                            <input type="text" class="form-control" id="no_peserta_office" name="no_peserta_office" placeholder="No. Peserta">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Masuk') }}:</strong>
                            <input type="date" class="form-control" id="tgl_masuk_bpjskes_office" name="tgl_masuk_bpjskes_office" placeholder="Tanggal Masuk">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Keluar') }}:</strong>
                            <input type="date" class="form-control" id="tgl_keluar_bpjskes_office" name="tgl_keluar_bpjskes_office" placeholder="Tanggal Keluar">
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
<form action="{{ '/proses-form' }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="modalEdit16" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <input type="text" class="form-control" id="id" name="id" placeholder="Id">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Nama') }}:</strong>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('NIK') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="NIK">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('No. KTP') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="No. KTP">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Alamat') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tempat Lahir') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Lahir') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Usia') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Usia">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Riwayat Pendidikan') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Riwayat Pendidikan">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Golongan Darah') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Golongan Darah">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Jenis Kelamin') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Jenis Kelamin">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Status') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Status">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Jumlah Anak') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Jumlah Anak">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Nama Ibu Kandung') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nama Ibu Kandung">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Masuk') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Tanggal Masuk">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Masa Kerja') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masa Kerja">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Kontrak/Tetap') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Kontrak/Tetap">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Bagian') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Bagian">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Klasifikasi Gaji') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Klasifikasi Gaji">
                        </div>
                    </div>
                    <h6> {{ __('BPJS Ketenagakerjaan') }}</h6>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('No.KPJ') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="No. KPJ">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Masuk') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Tanggal Masuk">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Keluar') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Tanggal Keluar">
                        </div>
                    </div>
                    <h6> {{ __('BPJS Kesehatan') }}</h6>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('No.Peserta') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="No. Peserta">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Masuk') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Tanggal Masuk">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Tanggal Keluar') }}:</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Tanggal Keluar">
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
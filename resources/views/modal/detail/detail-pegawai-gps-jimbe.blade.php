{{-- <form action="{{ '/proses-form' }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }} --}}
    <div class="modal fade text-left" id="modalDetail4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-info-circle"></i> {{ __('Detail') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-borderless no-margin">
                        <tbody>
                            <tr>
                                <th style="width:35%">{{ __('Id') }}</th>
                                <td>: <span id="no_agenda"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Nama') }}</th>
                                <td>: <span id="no_surat"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('NIK') }}</th>
                                <td>: <span id="pengirim"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('No. KTP') }}</th>
                                <td>: <span id="tgl_surat"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Alamat') }}</th>
                                <td>: <span id="tgl_terima"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Tempat Lahir') }}</th>
                                <td>: <span id="perihal"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Tanggal Lahir') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                              <th style="">{{ __('Usia') }}</th>
                              <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                  <th style="">{{ __('Riwayat Pendidikan') }}</th>
                                  <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                  <th style="">{{ __('Golongan Darah') }}</th>
                                  <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                  <th style="">{{ __('Jenis Kelamin') }}</th>
                                  <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Status') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Jumlah Anak') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Nama Ibu Kandung') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Tanggal Masuk') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Masa Kerja') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Kontrak/Tetap') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Bagian') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Klasifikasi Gaji') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('BPJS Ketenagakerjaan') }}</th>
                            </tr>
                            <tr>
                                <th style="">{{ __('No.KPJ') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Tanggal Masuk') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Tanggal Keluar') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('BPJS Kesehatan') }}</th>
                            </tr>
                            <tr>
                                <th style="">{{ __('No.Peserta') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Tanggal Masuk') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                            <tr>
                                <th style="">{{ __('Tanggal Keluar') }}</th>
                                <td>: <span id="dokumen"></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">{{ __('Kembali') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  {{-- </form> --}}
  
  
  
  
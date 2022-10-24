  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('assets/modules/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
  <script src="{{ asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/index.js') }}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>


  <script>
    $('#modalDetail1').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget)
        var id_office = button.data('id_office')
        var nama_office = button.data('nama_office')
        var nik_office = button.data('nik_office')
        var ktp_office = button.data('ktp_office')
        var alamat_office = button.data('alamat_office')
        var tempat_lahir_office = button.data('tempat_lahir_office')
        var tgl_lahir_office = button.data('tgl_lahir_office')
        var usia_office = button.data('usia_office')
        var riwayat_pendidikan_office = button.data('riwayat_pendidikan_office')
        var golongan_darah_office = button.data('golongan_darah_office')
        var jenis_kelamin_office = button.data('jenis_kelamin_office')
        var status_office = button.data('status_office')
        var jumlah_anak_office = button.data('jumlah_anak_office')
        var ibu_office = button.data('ibu_office')
        var tgl_masuk_office = button.data('tgl_masuk_office')
        var masa_kerja_office = button.data('masa_kerja_office')
        var pekerja_office = button.data('pekerja_office')
        var bagian_office = button.data('bagian_office')
        var gaji_office = button.data('gaji_office')
        var no_kpj_office = button.data('no_kpj_office')
        var tgl_masuk_bpjsket_office = button.data('tgl_masuk_bpjsket_office')
        var tgl_keluar_bpjsket_office = button.data('tgl_keluar_bpjsket_office')
        var no_peserta_office = button.data('no_peserta_office')
        var tgl_masuk_bpjskes_office = button.data('tgl_masuk_bpjskes_office')
        var tgl_keluar_bpjskes_office = button.data('tgl_keluar_bpjskes_office')
        

        var modal =$(this)
        modal.find('.modal-body #id_office').text(id_office);
        modal.find('.modal-body #nama_office').text(nama_office);
        modal.find('.modal-body #nik_office').text(nik_office);
        modal.find('.modal-body #ktp_office').text(ktp_office);
        modal.find('.modal-body #alamat_office').text(alamat_office);
        modal.find('.modal-body #tempat_lahir_office').text(tempat_lahir_office);
        modal.find('.modal-body #tgl_lahir_office').text(tgl_lahir_office);
        modal.find('.modal-body #usia_office').text(usia_office);
        modal.find('.modal-body #riwayat_pendidikan_office').text(riwayat_pendidikan_office);
        modal.find('.modal-body #golongan_darah_office').text(golongan_darah_office);
        modal.find('.modal-body #jenis_kelamin_office').text(jenis_kelamin_office);
        modal.find('.modal-body #status_office').text(status_office);
        modal.find('.modal-body #jumlah_anak_office').text(jumlah_anak_office);
        modal.find('.modal-body #ibu_office').text(ibu_office);
        modal.find('.modal-body #tgl_masuk_office').text(tgl_masuk_office);
        modal.find('.modal-body #masa_kerja_office').text(masa_kerja_office);
        modal.find('.modal-body #pekerja_office').text(pekerja_office);
        modal.find('.modal-body #bagian_office').text(bagian_office);
        modal.find('.modal-body #gaji_office').text(gaji_office);
        modal.find('.modal-body #no_kpj_office').text(no_kpj_office);
        modal.find('.modal-body #tgl_masuk_bpjsket_office').text(tgl_masuk_bpjsket_office);
        modal.find('.modal-body #tgl_keluar_bpjsket_office').text(tgl_keluar_bpjsket_office);
        modal.find('.modal-body #no_peserta_office').text(no_peserta_office);
        modal.find('.modal-body #tgl_masuk_bpjskes_office').text(tgl_masuk_bpjskes_office);
        modal.find('.modal-body #tgl_keluar_bpjskes_office').text(tgl_keluar_bpjskes_office);
    })
</script>

<script>
    $("#flash-data").fadeTo(2000, 500).slideUp(500, function(){
    $("#flash-data").slideUp(500);
});
</script>

<script>
    $("#sukses").fadeTo(2000, 500).slideUp(500, function(){
    $("#sukses").slideUp(500);
});
</script>

  @stack('scripts')
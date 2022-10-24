<div class="modal fade" id="modalDelete17" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">Data Yang Terhapus Tidak Dapat Kembali.</div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">{{ __('Kembali') }}</button>
                <form action=
                            {{-- "/surat-masuk/{{ $item->id }}" --}}
                             method="post">
                    @csrf
                    @method('delete')
                    <input class="btn btn-danger" type="submit" value="Hapus">
                </form>
            </div>
    </div>
</div>

<form action="{{ route('penerbit.update', $item->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="modal-body">
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="form-group">
            <label>Penerbit :</label>
            <input type="text" class="form-control" name="nama_penerbit" value="{{ $item->nama_penerbit }}">
        </div>
        <div class="form-group">
            <label>Bidang :</label>
            <input type="text" class="form-control" name="bidang" value="{{ $item->bidang }}">
        </div>
        <div class="form-group">
            <label>Keterangan :</label>
            <textarea class="form-control" name="keterangan" value="{{ $item->keterangan }}">{{ $item->keterangan }}</textarea>
        </div>
    </div>
    <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<form action="{{ route('kategori.update', $item->id) }}" method="POST" id="form-edit">
    @csrf
    @method('PATCH')
    <div class="modal-body">
        <input type="hidden" name="id" value="{{ $item->id }}" id="id_data">
        <div class="form-group">
            <label>Nama Kategori:</label>
            <input type="text" class="form-control" name="nama_kategori" value="{{ $item->nama_kategori }}">
        </div>
        <div class="form-group">
            <label>Keterangan :</label>
            <textarea type="text" class="form-control" name="keterangan"
                value="{{ $item->keterangan }}">{{ $item->keterangan }}</textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-update">Update</button>
        </div>
    </div>
</form>

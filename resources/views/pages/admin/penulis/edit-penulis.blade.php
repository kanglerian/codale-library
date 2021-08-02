<form action="{{ route('penulis.update', $item->id) }}" method="POST" id="form-edit">
    @csrf
    @method('PATCH')
    <div class="modal-body">
        <input type="hidden" name="id" value="{{ $item->id }}" id="id_data">
        <div class="form-group">
            <label>Nama Penulis:</label>
            <input type="text" class="form-control" name="nama_penulis" value="{{ $item->nama_penulis }}">
        </div>
        <div class="form-group">
            <label>Profesi:</label>
            <input type="text" class="form-control" name="profesi" value="{{ $item->profesi }}">
        </div>
        <div class="form-group">
            <label>Tentang :</label>
            <textarea type="text" class="form-control" name="tentang"
                value="{{ $item->tentang }}">{{ $item->tentang }}</textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-update">Update</button>
        </div>
    </div>
</form>

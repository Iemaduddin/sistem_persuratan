<div class="modal fade text-left" id="updateDataLetter-{{ $letter->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalUpdateDataLetter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalUpdateDataLetter">Update Data</h4>
                <i class="fa fa-times close cursor-pointer" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form action="{{ route('letter.update', $letter->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body text-start">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Nomor Surat</label>
                            <div class="form-group">
                                <input type="number" placeholder="000" class="form-control" name="nomor_surat"
                                    value="{{ $letter->nomor_surat }}">
                            </div>
                            <label>Departemen</label>
                            <div class="form-group">
                                <select name="department" class="form-select">
                                    <option value="Internal" {{ $letter->department == 'Internal' ? 'selected' : '' }}>
                                        Internal</option>
                                    <option value="PSDM" {{ $letter->department == 'PSDM' ? 'selected' : '' }}>PSDM
                                    </option>
                                    <option value="RMB" {{ $letter->department == 'RMB' ? 'selected' : '' }}>RMB
                                    </option>
                                    <option value="Eksternal"
                                        {{ $letter->department == 'Eksternal' ? 'selected' : '' }}>
                                        Eksternal</option>
                                    <option value="Kominfo" {{ $letter->department == 'Kominfo' ? 'selected' : '' }}>
                                        Kominfo</option>
                                </select>
                            </div>
                            <label>Nama Singkatan Kegiatan</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="singkatan_nama_kegiatan"
                                    value="{{ $letter->singkatan_nama_kegiatan }}">
                            </div>
                            <label>Kode</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="kode_unik"
                                    value="{{ $letter->kode_unik }}">
                            </div>
                            <label>Nama Kegiatan</label>
                            <div class="form-group">
                                <textarea type="text-area"class="form-control" rows="5" name="nama_kegiatan">{{ $letter->nama_kegiatan }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Hari Kegiatan</label>
                            <div class="form-group">
                                <select name="hari_kegiatan" class="form-select">
                                    <option value="Senin" {{ $letter->hari_kegiatan == 'Senin' ? 'selected' : '' }}>
                                        Senin</option>
                                    <option value="Selasa" {{ $letter->hari_kegiatan == 'Selasa' ? 'selected' : '' }}>
                                        Selasa</option>
                                    <option value="Rabu" {{ $letter->hari_kegiatan == 'Rabu' ? 'selected' : '' }}>
                                        Rabu</option>
                                    <option value="Kamis" {{ $letter->hari_kegiatan == 'Kamis' ? 'selected' : '' }}>
                                        Kamis</option>
                                    <option value="Jum'at" {{ $letter->hari_kegiatan == 'Jumat' ? 'selected' : '' }}>
                                        Jum'at</option>
                                    <option value="Sabtu" {{ $letter->hari_kegiatan == 'Sabtu' ? 'selected' : '' }}>
                                        Sabtu</option>
                                    <option value="Minggu" {{ $letter->hari_kegiatan == 'Minggu' ? 'selected' : '' }}>
                                        Minggu</option>
                                </select>
                            </div>
                            <label>Tanggal Kegiatan</label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="tanggal_kegiatan"
                                    value="{{ $letter->tanggal_kegiatan }}" </div>
                            </div>
                            <label>Jam Mulai</label>
                            <div class="form-group">
                                <input type="time" placeholder="00.00" class="form-control" name="jam_mulai"
                                    value="{{ $letter->jam_mulai }}">
                            </div>
                            <label>Jam Selesai</label>
                            <div class="form-group">
                                <input type="time" placeholder="00.00" class="form-control" name="jam_selesai"
                                    value="{{ $letter->jam_selesai }}">
                            </div>
                            <label>Contact Person</label>
                            <div class="form-group">
                                <input type="text" placeholder="CP" class="form-control" name="contact_person"
                                    value="{{ $letter->contact_person }}">
                            </div>
                            <label>Jumlah Lampiran</label>
                            <div class="form-group">
                                <input type="number" placeholder="00" class="form-control" name="jumlah_lampiran"
                                    value="{{ $letter->jumlah_lampiran }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</div>

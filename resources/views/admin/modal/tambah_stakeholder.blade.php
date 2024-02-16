<div class="modal fade text-left" id="tambahStakeholder" tabindex="-1" role="dialog" aria-labelledby="modalTambahOc"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahStakeholder">Tambah Data </h4>
                <i class="fa fa-times close cursor-pointer" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form action="{{ route('stakeholder.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Nomor Surat</label>
                            <div class="form-group">
                                <input type="number" placeholder="000" class="form-control" name="nomor_surat"
                                    required>
                            </div>
                            <label>Departemen</label>
                            <div class="form-group">
                                <select name="department" class="form-select">
                                    <option value="Internal">Internal</option>
                                    <option value="PSDM">PSDM</option>
                                    <option value="RMB">RMB</option>
                                    <option value="Eksternal">Eksternal</option>
                                    <option value="Kominfo">Kominfo</option>
                                </select>
                            </div>
                            <label>Nama Singkatan Kegiatan</label>
                            <div class="form-group">
                                <input type="text" placeholder="Proker/Agenda" class="form-control"
                                    name="singkatan_nama_kegiatan" required>
                            </div>
                            <label>Kode</label>
                            <div class="form-group">
                                <input type="text" placeholder="XXX" class="form-control" name="kode_unik" required>
                            </div>
                            <label>Nama Kegiatan</label>
                            <div class="form-group">
                                <input type="text"placeholder="Program Kerja" class="form-control"
                                    name="nama_kegiatan" required>
                            </div>
                            <label>Hari Kegiatan</label>
                            <div class="form-group">
                                <select name="hari_kegiatan" class="form-select">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jum'at">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Tanggal Kegiatan</label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="tanggal_kegiatan">
                            </div>
                            <label>Jam Mulai</label>
                            <div class="form-group">
                                <input type="time" placeholder="00.00" class="form-control" name="jam_mulai"
                                    required>
                            </div>
                            <label>Jam Selesai</label>
                            <div class="form-group">
                                <input type="time" placeholder="00.00" class="form-control" name="jam_selesai"
                                    required>
                            </div>
                            <label>Contact Person</label>
                            <div class="form-group">
                                <input type="text" placeholder="CP" class="form-control" name="contact_person"
                                    required>
                            </div>
                            <label>Jumlah Lampiran</label>
                            <div class="form-group">
                                <input type="number" placeholder="00" class="form-control" name="jumlah_lampiran">
                            </div>
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

<div class="modal fade text-left" id="tambahDocument-{{ $no }}" tabindex="-1" role="dialog"
    aria-labelledby="modalTambahDocument" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahDocument">Tambah Data Document</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @php
                use App\Models\Sender;
                use App\Models\Document;
                $lastSender = Sender::max('id');
                $otherAllotment = Document::whereNotNull('allotment')
                    ->pluck('allotment')
                    ->unique()
                    ->filter(function ($value) {
                        return $value != 'SK Aktif';
                    });
            @endphp
            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        @if ($no == 1)
                            <div class="col">
                                <label>Kategori</label>
                                <div class="form-group mb-3">
                                    <input type="hidden" class="form-control" name="category" value="Surat Masuk"
                                        required>
                                    <input type="text" class="form-control" name="category" value="Surat Masuk"
                                        disabled>
                                </div>
                                <label>Nomor Surat</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder=".../.../.../..." class="form-control"
                                        name="no_surat" required>
                                </div>
                                <label>Pengirim</label>
                                <div class="form-group mb-3">
                                    <select name="sender_id" class="form-select" id="sender_select">
                                        <optgroup label="OKI"></optgroup>
                                        @foreach ($sendersOki as $oki)
                                            <option value="{{ $oki->id }}">{{ $oki->name }}</option>
                                        @endforeach
                                        <optgroup label="Naungan"></optgroup>
                                        @foreach ($sendersNaungan as $naungan)
                                            <option value="{{ $naungan->id }}">{{ $naungan->name }}</option>
                                        @endforeach
                                        <optgroup label="Others"></optgroup>
                                        @foreach ($sendersOthers as $other)
                                            <option value="{{ $other->id }}">{{ $other->name }}</option>
                                        @endforeach
                                        <option value="{{ $lastSender + 1 }}">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3" id="other_sender_input" style="display: none;">
                                    <label for="other_sender" class="text-primary">*Masukkan Nama Pengirim
                                        Lainnya:</label>
                                    <input type="text" id="other_sender" name="other_sender" class="form-control">
                                </div>
                                <label>Event</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Event" class="form-control" name="event"
                                        required>
                                </div>
                                <label>File Surat</label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" name="fileDocument" required>
                                </div>
                            </div>
                        @elseif($no == 2)
                            <div class="col">
                                <label>Kategori</label>
                                <div class="form-group mb-3">
                                    <input type="hidden" class="form-control" name="category" value="Surat Keluar"
                                        required>
                                    <input type="text" class="form-control" name="category" value="Surat Keluar"
                                        disabled>
                                </div>
                                <label>Nomor Surat</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder=".../.../.../..." class="form-control"
                                        name="no_surat" required>
                                </div>
                                <label>Departemen</label>
                                <div class="form-group mb-3">
                                    <select name="department_id" class="form-select" id="departmentSelect">
                                        <option value="">Pilih Departemen</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3" id="departNull" style="display: none;">
                                    <label>Kategori Kebutuhan</label>
                                    <div class="form-group mb-3">
                                        <select name="allotment" class="form-select" id="need_category_selected">
                                            <option value="" disabled selected>Pilih Kategori Kebutuhan</option>
                                            <option value="SK Aktif">SK Aktif</option>
                                            @foreach ($otherAllotment as $otherAllot)
                                                <option value="{{ $otherAllot }}">{{ $otherAllot }}</option>
                                            @endforeach
                                            <option value="">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3" id="other_need_category" style="display: none;">
                                    <label for="other_needCategory" class="text-primary">*Masukkan Kategori Kebutuhan
                                        Lainnya:</label>
                                    <input type="text" id="other_needCategory" name="other_needCategory"
                                        class="form-control">
                                </div>
                                <div id="typeEventSelect">
                                    <label>Jenis Event</label>
                                    <div class="form-group mb-3">
                                        <select name="eventCategory" class="form-select" id="typeEventInput">
                                            <option value="" disabled selected>Pilih Jenis Event</option>
                                            <option value="Proker">Proker</option>
                                            <option value="Agenda">Agenda</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="eventDiv">
                                    <label>Event</label>
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Event" class="form-control"
                                            name="event" id="eventInput">
                                    </div>
                                </div>
                                <label>Description</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Description" class="form-control"
                                        name="description" required>
                                </div>
                                <label>File Surat</label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" name="fileDocument" required>
                                </div>
                            </div>
                        @else
                            <div class="col">
                                <div class="form-group mb-3">
                                    @if ($no == 3)
                                        <label>Jenis Proposal</label>
                                        <div class="form-group mb-3">
                                            <select name="category" class="form-select">
                                                <option value="" disabled selected>Pilih Jenis Proposal</option>
                                                <option value="Proposal AA">Proposal AA</option>
                                                <option value="Proposal Real">Proposal Real</option>
                                            </select>
                                        </div>
                                    @elseif($no == 4)
                                        <label>Jenis LPJ</label>
                                        <div class="form-group mb-3">
                                            <select name="category" class="form-select">
                                                <option value="" disabled selected>Pilih Jenis LPJ</option>
                                                <option value="LPJ AA">LPJ AA</option>
                                                <option value="LPJ Real">LPJ Real</option>
                                            </select>
                                        </div>
                                    @elseif($no == 5)
                                        <label>Proposal Naungan</label>
                                        <div class="form-group mb-3">
                                            <select name="category" class="form-select">
                                                <option value="" disabled selected>Pilih Jenis Proposal Naungan
                                                </option>
                                                <option value="Proposal WRI">Proposal WRI</option>
                                                <option value="Proposal ITDEC">Proposal ITDEC</option>
                                            </select>
                                        </div>
                                    @elseif($no == 6)
                                        <label>LPJ Naungan</label>
                                        <div class="form-group mb-3">
                                            <select name="category" class="form-select">
                                                <option value="" disabled selected>Pilih Jenis LPJ Naungan
                                                </option>
                                                <option value="LPJ WRI">LPJ WRI</option>
                                                <option value="LPJ ITDEC">LPJ ITDEC</option>
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                @if ($no == 3 || $no == 4)
                                    <label>Departemen</label>
                                    <div class="form-group mb-3">
                                        <select name="department_id" class="form-select" id="departmentSelect"
                                            required>
                                            <option value="" disabled selected>Pilih Departemen</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if ($no == 3 || $no == 4)
                                    <label>Program Kerja</label>
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Program Kerja" class="form-control"
                                            name="event" required>
                                    </div>
                                @elseif($no == 5 || $no == 6)
                                    <label>Event</label>
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Event" class="form-control"
                                            name="event" required>
                                    </div>
                                @endif
                                <label>Description</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Description" class="form-control"
                                        name="description">
                                </div>
                                <label>File Surat</label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" name="fileDocument" required>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var senderSelect = document.getElementById('sender_select');
        var otherSenderInput = document.getElementById('other_sender_input');

        function senderSelected() {
            if (senderSelect.value === '{{ $lastSender + 1 }}') {
                otherSenderInput.style.display = 'block';
            } else {
                otherSenderInput.style.display = 'none';
            }
        }
        senderSelect.addEventListener('change', function() {
            senderSelected();
        });
        senderSelected();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var departmentSelect = document.getElementById('departmentSelect');
        var typeEventSelect = document.getElementById('typeEventSelect');
        var typeEventInput = document.getElementById('typeEventInput');
        var departNull = document.getElementById('departNull');
        var needCategorySelect = document.getElementById('need_category_selected');
        var otherNeedCategory = document.getElementById('other_need_category');
        var otherNeedCategoryInput = document.getElementById('other_needCategory');
        var eventDiv = document.getElementById('eventDiv');
        var eventInput = document.getElementById('eventInput');

        function needCategorySelected() {
            if (needCategorySelect.value === '') {
                otherNeedCategory.style.display = 'block';
                other_needCategory.setAttribute('required', 'true');
            } else {
                otherNeedCategory.style.display = 'none';
            }
        }

        function departmentSelected() {
            if (departmentSelect.value === '') {
                departNull.style.display = 'block';
                eventDiv.style.display = 'none';
                typeEventSelect.style.display = 'none';
                needCategorySelect.addEventListener('change', function() {
                    needCategorySelected();
                });
                needCategorySelected();

            } else {
                departNull.style.display = 'none';
                typeEventSelect.style.display = 'block';
                typeEventInput.setAttribute('required', 'true')
                eventInput.setAttribute('required', 'true');
                otherNeedCategory.style.display = 'none';
                eventDiv.style.display = 'block';
            }
        }
        departmentSelect.addEventListener('change', function() {
            departmentSelected();
        });

        // departmentSelected();
        // needCategorySelected();
    });
</script>

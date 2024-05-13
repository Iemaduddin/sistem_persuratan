<div class="modal fade text-left" id="updateDataDocument-{{ $document->id }}-{{ $no }}" tabindex="-1"
    role="dialog" aria-labelledby="modalEditDocument" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalEditDocument">Edit Data Document</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @php
                use App\Models\Sender;
                use App\Models\Document;
                $lastSender = Sender::max('id');
                $allotments = Document::whereNotNull('allotment')->pluck('allotment')->unique();
                $eventCategories = Document::whereNotNull('eventCategory')->pluck('eventCategory')->unique();
            @endphp
            <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        @if ($no == 1)
                            <div class="col">
                                <label>Kategori</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="category"
                                        value="{{ $document->category }}" disabled>
                                    <input type="hidden" class="form-control" name="category"
                                        value="{{ $document->category }}">
                                </div>
                                <label>Nomor Surat</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="no_surat"
                                        value="{{ $document->no_surat }}" required>
                                </div>
                                <label>Pengirim</label>
                                <div class="form-group mb-3">
                                    <select name="sender_id" class="form-select"
                                        id="edit_sender_select_{{ $document->id }}">
                                        <optgroup label="OKI"></optgroup>
                                        @foreach ($sendersOki as $oki)
                                            <option value="{{ $oki->id }}"
                                                {{ $document->sender_id == $oki->id ? 'selected' : '' }}>
                                                {{ $oki->name }}
                                            </option>
                                        @endforeach
                                        <optgroup label="Naungan"></optgroup>
                                        @foreach ($sendersNaungan as $naungan)
                                            <option value="{{ $naungan->id }}"
                                                {{ $document->sender_id == $naungan->id ? 'selected' : '' }}>
                                                {{ $naungan->name }}
                                            </option>
                                        @endforeach
                                        <optgroup label="Others"></optgroup>
                                        @foreach ($sendersOthers as $other)
                                            <option value="{{ $other->id }}"
                                                {{ $document->sender_id == $other->id ? 'selected' : '' }}>
                                                {{ $other->name }}
                                            </option>
                                        @endforeach
                                        <option value="{{ $lastSender + 1 }}"
                                            {{ $document->sender_id == $lastSender + 1 ? 'selected' : '' }}>
                                            Lainnya
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-3" id="edit_other_sender_input_{{ $document->id }}"
                                    style="display: none;">
                                    <label for="edit_other_sender_{{ $document->id }}" class="text-primary">*Masukkan
                                        Nama
                                        Pengirim Lainnya:</label>
                                    <input type="text" id="edit_other_sender_{{ $document->id }}"
                                        name="other_sender" class="form-control">
                                </div>
                                <label>Event</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Event" class="form-control" name="event"
                                        value="{{ $document->event }}" required>
                                </div>
                                <label>File Surat (@if ($document->fileDocument)
                                        <a href="{{ asset('storage/' . $document->fileDocument) }}"
                                            target="_blank">Lihat
                                            File</a>
                                    @endif)
                                </label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" name="fileDocument">
                                </div>
                            </div>
                        @elseif ($no == 2)
                            <div class="col">
                                <label>Kategori</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="category"
                                        value="{{ $document->category }}" disabled>
                                    <input type="hidden" class="form-control" name="category"
                                        value="{{ $document->category }}">
                                </div>
                                <label>Nomor Surat</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="no_surat"
                                        value="{{ $document->no_surat }}" required>
                                </div>
                                @if ($document->department_id != null)
                                    <label>Departemen</label>
                                    <div class="form-group mb-3">
                                        <select name="department_id" class="form-select"
                                            id="edit_department_select_{{ $document->id }}">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    {{ $department->id === $document->department_id ? 'selected' : '' }}>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if ($document->allotment != null)
                                    <label>Peruntukkan</label>
                                    <div class="form-group mb-3">
                                        <select name="allotment" class="form-select"
                                            id="edit_allotment_select_{{ $document->id }}">
                                            <option value="">Pilih Peruntukan</option>
                                            @foreach ($allotments as $allotment)
                                                <option value="{{ $allotment }}"
                                                    {{ $document->allotment === $allotment ? 'selected' : '' }}>
                                                    {{ $allotment }}</option>
                                            @endforeach
                                            <option value="">Lainnya</option>
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group mb-3" id="edit_other_allotment_input_{{ $document->id }}"
                                    style="display: none;">
                                    <label for="edit_other_allotment_{{ $document->id }}"
                                        class="text-primary">*Masukkan
                                        Peruntukkan Lainnya:</label>
                                    <input type="text" id="edit_other_allotment_{{ $document->id }}"
                                        name="other_allotment" class="form-control">
                                </div>
                                @if ($document->eventCategory != null)
                                    <label>Kategori Event</label>
                                    <div class="form-group mb-3">
                                        <select name="eventCategory" class="form-select"
                                            id="edit_eventCategory_select_{{ $document->id }}">
                                            <option value="">Pilih Kategori Event</option>
                                            @foreach ($eventCategories as $eventCategory)
                                                <option value="{{ $eventCategory }}"
                                                    {{ $document->eventCategory === $eventCategory ? 'selected' : '' }}>
                                                    {{ $eventCategory }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <label>Event</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Event" class="form-control" name="event"
                                        value="{{ $document->event }}">
                                </div>
                                <label>Description</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Description" class="form-control"
                                        name="description" value="{{ $document->description }}">
                                </div>
                                <label>File Surat (@if ($document->fileDocument)
                                        <a href="{{ asset('storage/' . $document->fileDocument) }}"
                                            target="_blank">Lihat
                                            File</a>
                                    @endif)
                                </label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" name="fileDocument">
                                </div>
                            </div>
                        @else
                            <div class="col">
                                <label>Kategori</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="category"
                                        value="{{ $document->category }}" disabled>
                                    <input type="hidden" class="form-control" name="category"
                                        value="{{ $document->category }}">
                                </div>
                                <label>Departemen</label>
                                <div class="form-group mb-3">
                                    <select name="department_id" class="form-select">
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $department->id === $document->department_id ? 'selected' : '' }}>
                                                {{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Event</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Event" class="form-control" name="event"
                                        value="{{ $document->event }}" required>
                                </div>
                                <label>Description</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Description" class="form-control"
                                        name="description" value="{{ $document->description }}">
                                </div>
                                <label>File Surat (@if ($document->fileDocument)
                                        <a href="{{ asset('storage/' . $document->fileDocument) }}"
                                            target="_blank">Lihat
                                            File</a>
                                    @endif)
                                </label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" name="fileDocument">
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
@if ($no == 1)
    <script>
        var editSenderSelect_{{ $document->id }} = document.getElementById('edit_sender_select_{{ $document->id }}');
        var editOtherSenderInput_{{ $document->id }} = document.getElementById(
            'edit_other_sender_input_{{ $document->id }}');

        editSenderSelect_{{ $document->id }}.addEventListener('change', function() {
            if (editSenderSelect_{{ $document->id }}.value === '{{ $lastSender + 1 }}') {
                editOtherSenderInput_{{ $document->id }}.style.display = 'block';
            } else {
                editOtherSenderInput_{{ $document->id }}.style.display = 'none';
            }
        });
    </script>
@elseif ($no == 2)
    <script>
        var editAllotmentSelect_{{ $document->id }} = document.getElementById(
            'edit_allotment_select_{{ $document->id }}');
        var editOtherAllotmentInput_{{ $document->id }} = document.getElementById(
            'edit_other_allotment_input_{{ $document->id }}');

        editAllotmentSelect_{{ $document->id }}.addEventListener('change', function() {
            if (editAllotmentSelect_{{ $document->id }}.value === '') {
                editOtherAllotmentInput_{{ $document->id }}.style.display = 'block';
            } else {
                editOtherAllotmentInput_{{ $document->id }}.style.display = 'none';
            }
        });
        editOtherAllotmentInput_{{ $document->id }}.addEventListener('input', function() {
            editAllotmentSelect_{{ $document->id }}.value = this.value;
        });
    </script>
@endif

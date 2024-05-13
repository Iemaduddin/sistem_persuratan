<div class="modal fade text-left" id="viewDataDocument-{{ $document->id }}-{{ $no }}" tabindex="-1"
    role="dialog" aria-labelledby="modalViewDataDocument" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            @if ($no == 1)
                <div class="modal-header">
                    <h4 class="modal-title" id="modalViewDataDocument">{{ $document->sender->name }}
                        ({{ $document->event }}) </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $document->fileDocument) }}" width="100%"
                        height="600px"></iframe>
                </div>
            @elseif($no == 2)
                <div class="modal-header">
                    <h4 class="modal-title" id="modalViewDataDocument">{{ $document->category }}
                        ({{ $document->event }}) </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $document->fileDocument) }}" width="100%"
                        height="600px"></iframe>
                </div>
            @elseif ($no == 3 || $no == 4)
                <div class="modal-header">
                    <h4 class="modal-title" id="modalViewDataDocument">{{ $document->department->name }}
                        ({{ $document->category }} {{ $document->event }}) </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $document->fileDocument) }}" width="100%"
                        height="600px"></iframe>
                </div>
            @elseif ($no == 5 || $no == 6)
                <div class="modal-header">
                    <h4 class="modal-title" id="modalViewDataDocument">{{ $document->category }}
                        ({{ $document->event }})</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $document->fileDocument) }}" width="100%"
                        height="600px"></iframe>
                </div>
            @endif
        </div>
    </div>
</div>

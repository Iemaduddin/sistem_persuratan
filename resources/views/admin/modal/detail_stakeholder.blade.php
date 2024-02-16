<div class="modal fade text-left" id="detailDataStakeholder-{{ $stakeholder->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalDetailDataStakeholder" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="card position-relative">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalUpdateDataStakeholder">Detail Data</h4>
                    <i class="fa fa-times close cursor-pointer" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="card-body pt-0">
                    <div class="text-start mt-4">
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    @if ($stakeholder->nip != null)
                                        <td class="text-bold">NIP</td>
                                        <td colspan="2" class="text-end">{{ $stakeholder->nip }}</td>
                                    @elseif($stakeholder->nim != null)
                                        <td class="text-bold">NIM</td>
                                        <td colspan="2" class="text-end">{{ $stakeholder->nim }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="text-bold">Nama Lengkap</td>
                                    <td colspan="2" class="text-end">{{ $stakeholder->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Jabatan</td>
                                    <td colspan="2" class="text-end">{{ $stakeholder->jabatan }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center mt-0 mb-3">
                            @if ($stakeholder->nip != null)
                                {!! QrCode::size(100)->generate("$stakeholder->nip") !!}
                            @elseif($stakeholder->nim != null)
                                {!! QrCode::size(100)->generate("$stakeholder->nim") !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

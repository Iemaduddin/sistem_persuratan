<div class="modal fade text-left" id="detailDataOc-{{ $oc->id ?? auth()->user()->oc_id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalDetailDataOc" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="card card-profile position-relative">
                <img src="/img/bg-oc.png" alt="Image placeholder" style="height: 250px; object-fit: cover;">
                <i class="fa fa-times close text-light-secondary fs-4 cursor-pointer position-absolute top-0 end-0 p-3"
                    data-bs-dismiss="modal" aria-label="Close"></i>
                <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                        <div class="mt-lg-n7 mb-2 mb-lg-0">
                            <a href="javascript:;">
                                @if ($oc->foto == null)
                                    <img src="/img/team-2.jpg"
                                        class="rounded-circle img-fluid border border-3 border-white">
                                @else
                                    <img src="{{ asset('storage/' . $oc->foto) }}"
                                        class="rounded-circle img-fluid border border-3 border-white">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-start mt-4">
                        <div class="text-center mt-0">
                            <p><b>{{ $oc->nama }}</b><br>{{ $oc->department }}
                            </p>
                            {!! QrCode::size(100)->generate("$oc->nim") !!}
                        </div>
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td class="text-bold">NIM</td>
                                    <td colspan="2" class="text-end">{{ $oc->nim }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Tempat, Tanggal Lahir</td>
                                    <td colspan="2" class="text-end">{{ $oc->tempat_lahir }},
                                        {{ $oc->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Jenis Kelamin</td>
                                    <td colspan="2" class="text-end">{{ $oc->jk }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Program Studi</td>
                                    <td colspan="2" class="text-end">{{ $oc->prodi }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">No. HP/WA</td>
                                    <td colspan="2" class="text-end">{{ $oc->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Email</td>
                                    <td colspan="2" class="text-end">{{ $oc->email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Username</td>
                                    <td colspan="2" class="text-end">{{ $oc->username }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Status</td>
                                    <td colspan="2" class="text-end">{{ $oc->status_keaktifan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

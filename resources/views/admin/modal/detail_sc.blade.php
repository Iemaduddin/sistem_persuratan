<div class="modal fade text-left" id="detailDataSc-{{ $sc->id ?? auth()->user()->sc_id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalDetailDataSc" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="card card-profile position-relative">
                <img src="/img/bg-sc.jpg" alt="Image placeholder" style="height: 250px; object-fit: cover;">
                <i class="fa fa-times close text-light-secondary fs-4 cursor-pointer position-absolute top-0 end-0 p-3"
                    data-bs-dismiss="modal" aria-label="Close"></i>
                <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                        <div class="mt-lg-n7 mb-2 mb-lg-0">
                            <a href="javascript:;">
                                @if ($sc->foto == null)
                                    <img src="/img/team-2.jpg"
                                        class="rounded-circle img-fluid border border-3 border-white">
                                @else
                                    <img src="{{ asset('storage/' . $sc->foto) }}"
                                        class="rounded-circle img-fluid border border-3 border-white">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-start mt-4">
                        <div class="text-center mt-0">
                            <p><b>{{ $sc->nama }}</b><br>{{ $sc->role == 'Sekum' ? 'Sekretaris Umum' : 'SC Kestari' }}
                            </p>
                            {!! QrCode::size(100)->generate($sc->nif) !!}
                        </div><br>
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td class="text-bold">NIF</td>
                                    <td colspan="2" class="text-end">{{ $sc->nif }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Tempat, Tanggal Lahir</td>
                                    <td colspan="2" class="text-end">{{ $sc->tempat_lahir }},
                                        {{ $sc->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Jenis Kelamin</td>
                                    <td colspan="2" class="text-end">{{ $sc->jk }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Program Studi</td>
                                    <td colspan="2" class="text-end">{{ $sc->prodi }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Departemen</td>
                                    <td colspan="2" class="text-end">{{ $sc->department }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">No. HP/WA</td>
                                    <td colspan="2" class="text-end">{{ $sc->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Email</td>
                                    <td colspan="2" class="text-end">{{ $sc->email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Username</td>
                                    <td colspan="2" class="text-end">{{ $sc->username }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="detailDataLetter-{{ $letter->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalDetailDataLetter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="card position-relative">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalUpdateDataLetter">Detail Data</h4>
                    <i class="fa fa-times close cursor-pointer" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <div class="card-body pt-0">
                    <div class="text-start mt-4">
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td class="text-bold">Nomor Surat</td>
                                    <td colspan="2" class="text-end">{{ $letter->nomor_surat }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Departemen</td>
                                    <td colspan="2" class="text-end">{{ $letter->department }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Singkatan Nama Kegiatan</td>
                                    <td colspan="2" class="text-end">{{ $letter->singkatan_nama_kegiatan }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Kode</td>
                                    <td colspan="2" class="text-end">{{ $letter->kode_unik }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Nama Kegiatan</td>
                                    <td colspan="2" class="text-end">
                                        {{ substr($letter->nama_kegiatan, 0, 30) }}{{ strlen($letter->nama_kegiatan) > 50 ? '...' : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Pelaksanaan</td>
                                    <td colspan="2" class="text-end">{{ $letter->hari_kegiatan }},
                                        {{ $letter->tanggal_kegiatan }}
                                        ({{ $letter->jam_mulai }}-{{ $letter->jam_selesai }})</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Contact Person</td>
                                    <td colspan="2" class="text-end">{{ $letter->contact_person }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold">Jumlah Lampiran</td>
                                    @if ($letter->jumlah_lampiran != null)
                                        <td colspan="2" class="text-end">{{ $letter->jumlah_lampiran }}</td>
                                    @else
                                        <td colspan="2" class="text-end">-</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.partials.topnav', ['title' => 'Detail Surat'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-8 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <iframe src="{{ asset('template-import-data/template-data-oc.xlsx') }}" width="100%"
                            height="800px"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title" style="color: black">Jurnal SPK - MABAC</h3>
                        <hr>
                        <h6 class="card-title" style="color: black">Penulis:</h6>
                        <p class="card-text">Tugiono, Hafizah, Khairun Nisa
                        </p>
                        <h6 class="card-title" style="color: black">Judul:</h6>
                        <p class="card-text">Optimalisasi Metode MABAC Dalam Menentukan Prioritas Penerima Pinjaman
                            Koperasi.
                            <br><br> <a href="https://ojs.trigunadharma.ac.id/index.php/jsk/article/view/5825"
                                target="_blank" class="btn btn-secondary me-4"><i class="bi bi-link-45deg fa-2x"></i>
                                PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

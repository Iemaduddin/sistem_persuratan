
<?php $__env->startSection('title'); ?>
    Dashboard Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/admin-resources/admin-resources.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboard
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Welcome, <?php echo e(Auth::user()->nama); ?> !
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-2 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <a href="<?php echo e(route('doc.suratMasuk')); ?>" class="card-body d-flex align-items-center">
                            <div class="flex-grow-1">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Surat Masuk</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?php echo e($suratMasukCount); ?>">0</span> Surat
                                </h4>
                            </div>

                            <div class="flex-shrink-0 text-end dash-widget">
                                <i class="mdi mdi-file-import-outline text-success"
                                    style="width: 3rem; height: 3rem; font-size: 4rem;"></i>
                            </div>
                        </a><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-2 col-md-6">
                    <!-- card -->
                    <a href="<?php echo e(route('doc.suratKeluar')); ?>" class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-grow-1">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Surat Keluar</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?php echo e($suratKeluarCount); ?>">0</span> Surat
                                </h4>
                            </div>

                            <div class="flex-shrink-0 text-end dash-widget">
                                <i class="mdi mdi-file-export-outline text-dark"
                                    style="width: 3rem; height: 3rem; font-size: 4rem;"></i>
                            </div>
                        </div><!-- end card body -->
                    </a><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-2 col-md-6">
                    <!-- card -->
                    <a href="<?php echo e(route('doc.proposalHmti')); ?>" class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-grow-1">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Proposal HMTI</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?php echo e($proposalHmtiCount); ?>">0</span>
                                    Proposal
                                </h4>
                            </div>

                            <div class="flex-shrink-0 text-end dash-widget">
                                <i class="mdi mdi-book-arrow-up-outline text-warning"
                                    style="width: 3rem; height: 3rem; font-size: 4rem;"></i>
                            </div>
                        </div><!-- end card body -->
                    </a><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-2 col-md-6">
                    <!-- card -->
                    <a href="<?php echo e(route('doc.lpjHmti')); ?>" class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-grow-1">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">LPJ HMTI</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?php echo e($lpjHmtiCount); ?>">0</span> LPJ
                                </h4>
                            </div>

                            <div class="flex-shrink-0 text-end dash-widget">
                                <i class="mdi mdi-book-check-outline text-warning"
                                    style="width: 3rem; height: 3rem; font-size: 4rem;"></i>
                            </div>
                        </div><!-- end card body -->
                    </a><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-2 col-md-6">
                    <!-- card -->
                    <a href="<?php echo e(route('doc.proposalNaungan')); ?>" class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-grow-1">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Proposal Naungan</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?php echo e($proposalNaunganCount); ?>">0</span> Proposal
                                </h4>
                            </div>

                            <div class="flex-shrink-0  dash-widget">
                                <i class="mdi mdi-file-upload-outline text-info"
                                    style="width: 3rem; height: 3rem; font-size: 4rem;"></i>
                            </div>
                        </div><!-- end card body -->
                    </a><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-2 col-md-6">
                    <!-- card -->
                    <a href="<?php echo e(route('doc.lpjNaungan')); ?>" class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-grow-1">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">LPJ Naungan</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?php echo e($lpjNaunganCount); ?>">0</span> LPJ
                                </h4>
                            </div>

                            <div class="flex-shrink-0 text-end dash-widget">
                                <i class="mdi mdi-file-check-outline text-info"
                                    style="width: 3rem; height: 3rem; font-size: 4rem;"></i>
                            </div>
                        </div><!-- end card body -->
                    </a><!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end col -->
        </div>
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div id="chartRadial" class="m-3"></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div id="chartBar" class="m-3"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="col-md-1 m-3 mb-0">
                    <select class="form-select form-select-sm mb-0 my-n1" id="selectYear">
                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($year); ?>">Tahun <?php echo e($year); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>
                <div id="chartLine" class="m-3"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net/datatables.net.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js')); ?>">
    </script>
    <script src="<?php echo e(URL::asset('assets/js/pages/datatables.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/admin-resources/admin-resources.min.js')); ?>"></script>
    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/dashboard.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan elemen select tahun
            var selectYear = document.getElementById('selectYear');

            // Tambahkan event listener untuk perubahan nilai pada select tahun
            selectYear.addEventListener('change', function() {
                var selectedYear = selectYear.value;
                fetchData(selectedYear);
            });

            // Panggil fetchData() dengan nilai tahun saat halaman dimuat
            fetchData(selectYear.value);
        });
        fetchData(selectYear.value);

        var colorsChart = ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4',
            '#90ee7e',
            '#f48024', '#69d2e7'
        ]; // Lakukan fetch dengan nilai tahun yang dipilih
        function fetchData(selectedYear) {
            fetch("<?php echo e(route('getDataChart')); ?>?year=" + selectedYear)
                .then(response => response.json())
                .then(data => {
                    // Bersihkan konten chart sebelum memuat data baru
                    document.querySelector("#chartRadial").innerHTML = '';
                    document.querySelector("#chartBar").innerHTML = '';
                    document.querySelector("#chartLine").innerHTML = '';
                    var nameCategory = data.nameCategoryRadial;
                    var totalCategory = data.totalCategoryRadial;
                    var chartSuratKeluarPerDepartAllotment = {
                        series: totalCategory,
                        chart: {
                            height: 400,
                            type: 'radialBar',
                            toolbar: {
                                show: true
                            },
                        },
                        colors: colorsChart,
                        title: {
                            text: 'SURAT KELUAR',
                            align: 'center',
                            margin: 30,
                            offsetX: 0,
                            offsetY: 0,
                            floating: false,
                            style: {
                                fontSize: '14px',
                                fontWeight: 'bold',
                                fontFamily: undefined,
                                color: '#263238'
                            },
                        },
                        plotOptions: {
                            radialBar: {
                                offsetY: 0,
                                startAngle: 0,
                                endAngle: 270,
                                hollow: {
                                    margin: 5,
                                    size: '30%',
                                    background: 'transparent',
                                    image: undefined,
                                },
                                dataLabels: {
                                    name: {
                                        fontSize: '22px',
                                    },
                                    value: {
                                        fontSize: '16px',
                                        formatter: function(val) {
                                            return val;
                                        },
                                    },
                                    total: {
                                        show: true,
                                        label: 'Total',
                                        formatter: function(w) {
                                            // Hitung total keseluruhan dari totalCategory
                                            var totalOverall = Object.values(totalCategory).reduce(
                                                function(
                                                    accumulator, currentValue) {
                                                    return accumulator + currentValue;
                                                }, 0);
                                            return totalOverall;
                                        },
                                    }
                                }
                            }
                        },
                        legend: {
                            show: true,
                            floating: true,
                            fontSize: '16px',
                            position: 'left',
                            offsetX: 30,
                            offsetY: 20,
                            labels: {
                                useSeriesColors: true,
                            },
                            markers: {
                                size: 0
                            },
                            formatter: function(seriesName, opts) {
                                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                            },
                            itemMargin: {
                                vertical: 3
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                legend: {
                                    show: false
                                }
                            }
                        }],
                        labels: nameCategory,
                    };


                    // Line Chart

                    // Inisialisasi objek untuk menyimpan nilai kategori per bulan
                    var nilaiKategoriPerBulan = {};

                    // Loop melalui setiap bulan dalam data kategori per bulan
                    for (var bulan in data.kategoriPerBulan) {
                        // Inisialisasi objek untuk menyimpan nilai kategori dalam bulan ini
                        var nilaiKategoriBulanIni = {};

                        // Loop melalui setiap kategori dalam bulan ini
                        for (var kategori in data.kategoriPerBulan[bulan]) {
                            // Ambil nilai kategori dan simpan dalam objek nilaiKategoriBulanIni
                            nilaiKategoriBulanIni[kategori] = data.kategoriPerBulan[bulan][kategori];
                        }

                        // Simpan objek nilai kategori untuk bulan ini dalam objek nilaiKategoriPerBulan
                        nilaiKategoriPerBulan[bulan] = nilaiKategoriBulanIni;
                    }

                    var namaKategori = [];
                    // Loop melalui setiap bulan dalam data kategori per bulan
                    for (var bulan in data.kategoriPerBulan) {
                        // Ambil semua kategori dalam bulan saat ini
                        var kategoriBulanIni = Object.keys(data.kategoriPerBulan[bulan]);

                        // Loop melalui setiap kategori dalam bulan ini
                        kategoriBulanIni.forEach(function(kategori) {
                            // Jika kategori belum ada dalam array namaKategori, tambahkan
                            if (!namaKategori.includes(kategori)) {
                                namaKategori.push(kategori);
                            }
                        });
                    }
                    namaKategori.sort();
                    namaKategori.reverse();
                    // Line Chart
                    var series = [];

                    // Loop melalui setiap kategori dalam array namaKategori
                    namaKategori.forEach(function(nama) {
                        // Inisialisasi array data untuk kategori ini
                        var dataKategori = [];

                        // Loop melalui setiap bulan dalam objek nilaiKategoriPerBulan
                        for (var bulan in nilaiKategoriPerBulan) {
                            // Ambil array nilai untuk bulan ini
                            var nilaiBulanIni = nilaiKategoriPerBulan[bulan];

                            // Tambahkan nilai untuk bulan ini ke dalam array dataKategori
                            var nilai = nilaiBulanIni[nama] || 0; // Jika nilai tidak ada, gunakan 0
                            dataKategori.push(nilai);
                        }
                        // Tambahkan objek series untuk kategori ini ke dalam array series
                        series.push({
                            name: nama,
                            data: dataKategori
                        });
                    });
                    var dokumenPerBulan = {
                        series: series,
                        chart: {
                            height: 320,
                            type: 'line',
                            dropShadow: {
                                enabled: true,
                                color: '#000',
                                top: 18,
                                left: 7,
                                blur: 10,
                                opacity: 0.2
                            },
                            toolbar: {
                                show: true
                            }
                        },
                        colors: colorsChart,
                        dataLabels: {
                            enabled: true,
                        },
                        stroke: {
                            curve: 'smooth'
                        },
                        title: {
                            text: 'Dokumen/Bulan',
                            align: 'left'
                        },
                        grid: {
                            borderColor: '#e7e7e7',
                            row: {
                                colors: ['#f3f3f3',
                                    'transparent'
                                ], // takes an array which will be repeated on columns
                                opacity: 0.5
                            },
                        },
                        markers: {
                            size: 1
                        },
                        xaxis: {
                            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                                'Agustus',
                                'September', 'Oktober', 'November', 'Desember'
                            ],
                            title: {
                                text: 'Bulan',
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Jumlah Dokumen'
                            },
                            min: 1,
                        },
                        legend: {
                            position: 'top',
                            horizontalAlign: 'center',
                            floating: true,
                            offsetY: -30,
                            offsetX: 0,
                        }
                    };

                    // Bar Chart
                    var nameCategoryAll = Object.keys(data.kategoriAll);
                    var valueCategoryAll = Object.values(data.kategoriAll);
                    var chartBarDokumenAll = {
                        series: [{
                            data: valueCategoryAll,
                        }],
                        chart: {
                            type: 'bar',
                            height: 385
                        },
                        plotOptions: {
                            bar: {
                                barHeight: '100%',
                                distributed: true,
                                horizontal: true,
                                dataLabels: {
                                    position: 'bottom'
                                },
                            }
                        },
                        colors: colorsChart,
                        dataLabels: {
                            enabled: true,
                            textAnchor: 'start',
                            style: {
                                colors: ['#fff']
                            },
                            formatter: function(val, opt) {
                                return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                            },
                            offsetX: 0,
                            dropShadow: {
                                enabled: true
                            }
                        },
                        stroke: {
                            width: 1,
                            colors: ['#fff']
                        },
                        xaxis: {
                            categories: nameCategoryAll,
                        },
                        yaxis: {
                            labels: {
                                show: false
                            }
                        },
                        title: {
                            text: 'Jumlah Dokumen Keseluruhan',
                            align: 'center',
                            floating: true
                        },
                        tooltip: {
                            theme: 'light',
                            x: {
                                show: true
                            },
                            y: {
                                title: {
                                    formatter: function() {
                                        return ''
                                    }
                                }
                            }
                        }
                    };
                    var chartSuratKeluar = new ApexCharts(document.querySelector("#chartRadial"),
                        chartSuratKeluarPerDepartAllotment);
                    var chartDokumenPerBulan = new ApexCharts(document.querySelector("#chartLine"),
                        dokumenPerBulan);
                    var chartDokumenAll = new ApexCharts(document.querySelector("#chartBar"), chartBarDokumenAll);
                    chartDokumenAll.render();
                    chartSuratKeluar.render();
                    chartDokumenPerBulan.render();
                });
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/admin/index.blade.php ENDPATH**/ ?>
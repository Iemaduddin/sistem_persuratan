<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Sistem Persuratan HMTI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/LOGO HMTI.png') }}">
    @include('layouts.head-css')
</head>

@section('body')
    @include('layouts.body')
@show
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.topbar')
    @include('layouts.sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
@include('layouts.right-sidebar')
<!-- /Right-bar -->
@include('sweetalert::alert')

<!-- JAVASCRIPT -->
@include('layouts.vendor-scripts')
<script>
    $(document).on('click', '.confirm-delete', function(event) {
        event.preventDefault(); // Menghentikan tindakan default dari tombol submit
        let form = $(this).closest("form");
        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data akan terhapus secara permanen.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#1c84ee",
            cancelButtonColor: "#fd625e",
            confirmButtonText: "Ya, delete!"
        }).then(function(result) {
            if (result.value) {
                form.submit();
                Swal.fire("Deleted!", "Data berhasil dihapus.", "success");
            }
        });
    });
</script>
</body>

</html>

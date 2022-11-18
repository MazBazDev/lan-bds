<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="title" content="@yield('title') | Admin BDS Ynov Lyon">
    <meta name="description" content="Retrouvez toutes les infos de la YPARTY du BDE/BDS Ynov Campus Lyon">
    <meta name="robots" content="index, follow">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="language" content="French">
    <meta name="author" content="MazBaz">
    <meta name="theme-color" content="#6a66ab">
    <link rel="icon" href="{{ asset("assets/img/logobds.svg") }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Admin BDS Ynov Lyon</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ asset("assets/vendor/admin/fontawesome-free/css/all.min.css") }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset("assets/css/admin/sb-admin-2.css") }}">

    @stack('scripts')
    @stack('styles')

    <style>
        .translate {
            transition: all 0.3s ease-out;
        }

        .translate:hover {
            translate: 0 -8px;
            filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
            transition: all 0.3s ease-out;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.elements.admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('layouts.elements.admin.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @include('layouts.elements.admin.alerts')
                    
                    @yield('content')
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.elements.admin.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include("layouts.elements.disconnect")
    <!-- Bootstrap core JavaScript-->
    {{-- <script src="{{ asset('assets/vendor/admin/jquery/jquery.min.js') }}"></script> --}}

    <script src="{{ asset('assets/vendor/admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/admin/jquery-easing/jquery.easing.min.js') }}"></script>
    

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/admin/sb-admin-2.min.js') }}"></script>
    
    @stack('footer-scripts')
</body>

</html>
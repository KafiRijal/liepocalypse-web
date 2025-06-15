<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liepocalypse</title>
    @include('template/styles')
</head>

<body>
    <!-- ====================================== Loader ===================================== -->
    <div class="page-loader">
        <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <p>Liepocalypse</p>
    </div>
    @include('template/header')
    @yield('content')
    @include('template/footer')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Login Diperlukan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    Silakan login terlebih dahulu untuk menggunakan fitur deteksi hoaks.
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>


    @include('template/scripts')
    @yield('template_scripts')
</body>

</html>

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

    @include('template/scripts')
    @yield('template_scripts')
</body>

</html>

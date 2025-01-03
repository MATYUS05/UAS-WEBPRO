<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grow Community Church</title>
    <link rel="icon" type="image/x-icon" href="/img/logo.png">     
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


</head>

<body id="page-top"">
    

<div>

</div>
    <!-- Page Wrapper -->
    <div id="wrapper">
        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">
            <!-- Main Content -->
            <div id="content" class="" >
                <!-- Topbar -->
                @include('layouts.topbar') 
                <!-- ini niatnya sih buat menu menu kayak home, children, class, event, renungan, attendance. Tpi ku blm nemu soalnya kegabung mulu hehe -->
                <!-- End of Topbar -->
                @include('layouts.sidebar')


                <!-- Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>

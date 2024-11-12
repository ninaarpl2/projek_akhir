<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.sidebar')



        <div class="body-wrapper">
            @include('layouts.header')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
    </div> --}}

  @include ('layouts.footer')
</body>

</html>

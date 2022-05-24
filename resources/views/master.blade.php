<!DOCTYPE html>
<html lang="en">

<head>
  @stack('prepend-style')
  @include('layout.head')
</head>

<body class="g-sidenav-show  bg-gray-100">
  @include('layout.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('konten')
            @include('layout.footer')
        </div>
    </main>
  
    @include('layout.sidenav')
    @include('layout.script')
    @stack('addon-script')

</body>

</html>
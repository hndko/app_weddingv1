<!DOCTYPE html>
<html lang="en">

<head>
    @include('wedding.layout.head')
</head>

<body>
    <div id="loader" class="fh5co-loader"></div>
    @include('wedding.layout.splashscreen')

    <!-- ============== MUSIK =============== -->
    <audio loop="true" src="{{ asset('assets/musik/lagu-nikah.mp3') }}" id="audio"></audio>
    <!-- ============== MUSIK =============== -->

    @yield('content')

    @include('wedding.layout.javascript')
</body>

</html>

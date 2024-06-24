<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Wedding Invitation - Atep &amp; Arty </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{ asset('assets/img/kita.png') }}">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <meta property="og:title" content="Wedding Invitation - Atep &amp; Arty ">
    <meta property="og:description" content="Hello ! Kamu Di Undang..">
    <meta property="og:type" content="article">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">


    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/css-animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('assets/css/css-icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('assets/css/css-bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/css-magnific-popup.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('assets/css/css-owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/css-owl.theme.default.min.css') }}">

    <!--lightbox-->
    <link href="{{ asset('assets/css/lightbox.css') }}" rel="stylesheet">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('assets/css/css-style.css') }}">


    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
        integrity="sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/css/material-components-web.css') }}" rel="stylesheet">


    <!-- Modernizr JS -->
    <script src="{{ asset('assets/js/js-modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->

    <link rel="stylesheet" href="{{ asset('assets/css/ket2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ket.css') }}">
    <script src="{{ asset('assets/js/2.1.3-jquery.min.js') }}"></script>

</head>

<body>


    <div id="loader" class="fh5co-loader"></div>
    <!-- SPLASHSCREEN -->
    <div id="splashscreen">
        <div class="splashscreen-bg"></div>
        <div class="tengah">
            <p>The Wedding Of</p>
            <h1 style="font-size:80px;color:white;margin-top:-30px;">Arty &amp; Atep </h1>
            <p style="margin-top:30px;">
                Kepada Yth.<br>
                <span id="recipient-name">Guest & Guest</span> <br>
                <a href="#" onclick="return OpenInvitation();">
                    <button class="btn-depan btn-4 btn-sep-depan icon-send popup1_open" data-popup-ordinal="0"
                        id="open_92089009">BUKA</button>
                </a>
        </div>
    </div>

    <!-- END SPLASHSCREEN -->

    <!-- ============== MUSIK =============== -->
    <audio loop="true" src="{{ asset('assets/musik/lagu-nikah.mp3') }}" id="audio"></audio>
    <!-- ============== MUSIK =============== -->

    <div style="display: none;" id="page"><a href="#"
            class="js-fh5co-nav-toggle fh5co-nav-toggle fh5co-nav-white"><i></i></a>
        <div id="fh5co-offcanvas"></div>
        <header id="fh5co-header" class="fh5co-cover" role="banner" data-stellar-background-ratio="0.5"
            style="background-position: -25px -25px;">
            <div id="fh5co-header">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <div class="display-t">
                                <div class="display-tc animate-box fadeIn animated-fast" data-animate-effect="fadeIn">
                                    <div style="color:#fff;margin-top:250px;">

                                        <p>The Wedding Of</p>

                                        <h1 style="margin-top:-40px">
                                            Arty &amp; Atep </h1>
                                        <p><span>06 - 06 - 2021</span></p>
                                        <p>
                                            <a href="#fh5co-couple" class="icon-scroll"></a>
                                        </p>
                                    </div>
                                    <div style="clear:both">
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <div id="fh5co-couple">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center animate-box fadeInUp animated-fast">
                        <h1 style="color:#304058;font-size:50px">Hello!</h1>
                        <p><i style="white-space:pre-line;">Assalamu'alaikum warahmatullahi wabarakatuh
                                Izinkan kami mengundang sekaligus mengharapkan doa restu dari bapak/ibu dan
                                rekan-rekan dalam acara pernikahan kami</i>
                        </p>
                    </div>
                </div>
                <div class="couple-wrap animate-box fadeInUp animated-fast">
                    <div class="couple-half">
                        <div class="groom"> <img src="{{ asset('assets/img/groom.png?nocache=1440') }}"
                                alt="groom" class="img-responsive">
                        </div>
                        <div class="desc-groom">
                            <h3 style="color:#304058;">
                                Atep Jaenudin</h3>
                            <!-- untuk deskripsi mempelai -->
                            <p><i style="font-size:12px;">Putra dari :</i>
                                <br>
                                Bapak H Enyang &amp; Ibu H Atik
                            </p>
                        </div>
                    </div>
                    <p class="heart text-center"><i class="icon-heart2" style="color:#304058;"></i></p>
                    <div class="couple-half">
                        <div class="bride"> <img src="{{ asset('assets/img/bride.png?nocache=1440') }}"
                                alt="groom" class="img-responsive">
                        </div>
                        <div class="desc-bride">
                            <h3 style="color:#304058;">
                                Arty Artya Melinda</h3>
                            <!-- untuk deskripsi mempelai -->
                            <p>
                                <i style="font-size:12px;">Putri dari :</i>
                                <br>
                                Bapak Arbi Sahtiadin &amp; Ibu Oneng Nurhayati
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="text-align:center;font-size:12px;">
                    <br><i style="white-space:pre-line;">''
                        Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari
                        jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya
                        diantaramu rasa kasih dan sayang. Sesungguhnya pada yang demikian itu benar-benar
                        terdapat tanda-tanda bagi kaum yang berfikir.
                        ''
                        QS Ar-Rum : 21</i>
                </div>
            </div>
        </div>


        <!-- ============== PHP GET DATA TANGGAL =============== -->
        <div id="fh5co-event" class="fh5co-bg paralax-acara" style="background-color:#304058; min-height:0px;">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="col-md-10 col-md-offset-1">


                                <div class="col-md-6 col-sm-6 text-center" style="margin-bottom:10px;">
                                    <div class="event-wrap animate-box fadeInUp animated-fast">
                                        <h3>Akad</h3>
                                        <div class="event-col">
                                            <i class="icon-clock"></i>
                                            <span>
                                                80.00 Pagi </span>
                                        </div>
                                        <div class="event-col"> <i class="icon-calendar"></i> <span>Minggu, 6
                                                Juni 2021</span> </div>
                                        <p>
                                            <label style="font-weight:normal; font-size:22px;">
                                                Gedung Herlina Mutiara </label>
                                            <br>
                                            Jl. Pramuka, Bojong, Karangtengah, Kabupaten Cianjur, Jawa Barat
                                            43281
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center" style="margin-bottom:10px;">
                                    <div class="event-wrap animate-box fadeInUp animated-fast">
                                        <h3>Resepsi</h3>
                                        <div class="event-col">
                                            <i class="icon-clock"></i> <span>
                                                10.00 - 14.00 </span>
                                        </div>
                                        <div class="event-col"> <i class="icon-calendar"></i> <span>Minggu, 6
                                                Juni 2021</span> </div>
                                        <p>
                                            <label style="font-weight:normal; font-size:22px;">
                                                Gedung Herlina Mutiara </label>
                                            <br>
                                            Jl. Pramuka, Bojong, Karangtengah, Kabupaten Cianjur, Jawa Barat
                                            43281
                                        </p>
                                    </div>
                                </div>


                                <div class="col-md-8 col-md-offset-2 text-center animate-box fadeInUp animated-fast">
                                    <a href="https://youtu.be/Ev-Rgy8HabA" target="_blank"
                                        class="streaming mdc-button mdc-button--raised">
                                        <i class="material-icons mdc-button__icon">play_arrow</i>
                                        LIVE STREAMING
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-couple-story">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
                        <h1 style="color:#304058;">Cerita Kita</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-md-offset-0">
                        <ul class="timeline animate-box fadeInUp animated-fast">
                            <!-- GET DATA -->
                            <!-- ELSE -->
                            <li class="timeline-inverted animate-box fadeInUp animated-fast">
                                <div class="timeline-badge"
                                    style="background-color:#304058; background-image:url({{ asset('assets/img/couple-1.png') }});">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3 class="timeline-title">Pertama bertemu</h3>
                                        <img src="{{ asset('assets/img/album1.png') }}" alt="img"
                                            class="timeline-img">
                                        <span class="date">14 Januari 2020</span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Waktu Pertama Kali
                                            Kulihat Dirimu Hadir
                                            Rasa hati ini inginkan dirimu </p>
                                    </div>
                                </div>
                            </li>
                            <!--TUTUP PHP -->
                            <!-- GET DATA -->
                            <li class="animate-box fadeInUp animated-fast">
                                <div class="timeline-badge"
                                    style="background-color:#304058; background-image:url({{ asset('assets/img/couple-1.png') }});">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3 class="timeline-title">Jatuh Cinta</h3>
                                        <img src="{{ asset('assets/img/album2.png') }}" alt="img"
                                            class="timeline-img">
                                        <span class="date">15 Maret 2020</span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>
                                            Hati tenang mendengar
                                            suara indah menyapa
                                            Geloranya hati ini
                                            Tak ku sangka.. </p>
                                    </div>
                                </div>
                            </li>
                            <!-- ELSE -->
                            <!--TUTUP PHP -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="fh5co-gallery" class="fh5co-section-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
                        <h1 style="color:#304058;">Gallery</h1>
                    </div>
                </div>
                <div class="row row-bottom-padded-md">
                    <div class="col-md-12">
                        <ul id="fh5co-gallery-list">
                            <!-- GET DATA -->
                            <!-- GET DATA -->
                            <li class="one-third animate-box fadeIn animated-fast" data-animate-effect="fadeIn"
                                style="background-image: url({{ asset('assets/img/album1.png') }});">
                                <a href="{{ asset('assets/img/album1.png') }}" data-lightbox="roadtrip">
                                    <div class="case-studies-summary"> <span></span>
                                        <h2></h2>
                                    </div>
                                </a>
                            </li>
                            <!-- CLOSE DATA -->
                            <!-- GET DATA -->
                            <li class="one-third animate-box fadeIn animated-fast" data-animate-effect="fadeIn"
                                style="background-image: url({{ asset('assets/img/album2.png') }});">
                                <a href="{{ asset('assets/img/album2.png') }}" data-lightbox="roadtrip">
                                    <div class="case-studies-summary"> <span></span>
                                        <h2></h2>
                                    </div>
                                </a>
                            </li>
                            <!-- CLOSE DATA -->

                            <!-- GET DATA YT -->
                            <div class="videoWrapper" style="width:100%;">
                                <center>
                                    <object data="https://www.youtube.com/embed/hrVyGEvVu7k"> </object>
                                </center>
                            </div>
                            <!-- CLOSE DATA -->


                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="fh5co-maps" class="fh5co-bg scrolltomap" style="background-color:#304058;">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center animate-box  fadeInUp animated-fast">
                        <h1 class="color-putih" style="margin-top:30px;">Temukan Kami</h1>

                        <p style="color:#fff;">
                            Gedung Herlina Mutiara <br>
                            Jl. Pramuka, Bojong, Karangtengah, Kabupaten Cianjur, Jawa Barat 43281 </p>
                    </div>
                </div>
                <div class="row">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="col-md-10 col-md-offset-1">
                                <div style="text-align:center;">
                                    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
                                    <style>
                                        @media (max-width: 575.98px) {
                                            .maps iframe {
                                                width: 100%;
                                                height: 350px;
                                            }
                                        }

                                        @media (min-width: 576px) {
                                            .maps iframe {
                                                width: 100%;
                                                height: 350px;
                                            }
                                        }

                                        @media (min-width: 768px) {
                                            .maps iframe {
                                                width: 100%;
                                                height: 450px;
                                            }
                                        }

                                        @media (min-width: 992px) {
                                            .maps iframe {
                                                width: 100%;
                                                height: 500px;
                                            }
                                        }
                                    </style>
                                    <div style="margin-bottom:50px;" id="maps">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.751637300924!2d106.80867927474999!3d-6.1640066938232145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f67128be6201%3A0xaa7f88e00f77e7c0!2sJl.%20Petojo%20Bar.%20IV%2C%20RW.4%2C%20Petojo%20Utara%2C%20Kecamatan%20Gambir%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2010130!5e0!3m2!1sen!2sid!4v1718982456923!5m2!1sen!2sid"
                                            width="800" height="600" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer>
            <p> &copy; Copyright {{ date('Y') }}, Kode Kreatif ID. All Rights Reserved
            </p>
        </footer>


        <!-- MUTE BUTTON -->
        <a id="mute" href="#/" onclick="mute()" class="floatmute">
            <i color="#fff" class="fa fa-volume-up my-float"></i>
        </a>
        <!-- MUTE BUTTON -->

    </div>

    <div class="gototop js-top">
        <a href="#fh5co-header" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <script src="{{ asset('assets/js/js-bootstrap.min.js') }}"></script>
    <!-- jQuery -->
    <!-- <script src="assets/js/jquery.min.js"></script> -->
    <!-- jQuery Easing -->
    <script src="{{ asset('assets/js/js-jquery.easing.1.3.js') }}"></script>
    <!-- JS AREA -->
    <script src="{{ asset('assets/js/moment-with-locales.js') }}"></script>

    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/less@3.13"></script> -->
    <!-- Waypoints -->
    <script src="{{ asset('assets/js/js-jquery.waypoints.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('assets/js/js-owl.carousel.min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('assets/js/js-jquery.countTo.js') }}"></script>

    <!-- Stellar -->
    <script src="{{ asset('assets/js/js-jquery.stellar.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/js/js-jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('assets/js/js-simplyCountdown.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('assets/js/js-main.js') }}"></script>

    <script src="{{ asset('assets/js/js-index.js') }}"></script>

    <!-- VALIDASI DONASI -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.popupoverlay.min.js') }}"></script>


    <!--script mute-->

    <script>
        $(document).ready(function() {
            // load splashscreen
            const splashscreen = $("#splashscreen");
            const page = $("#page");

            window.OpenInvitation = function() {
                splashscreen.hide();
                page.show();
                let audio = $('#audio')[0];
                audio.muted = false;
                audio.volume = 0.9;
                audio.play();
                button.html('<i color="#fff" class="fa fa-volume-up my-float"></i>');
                localStorage.setItem('mute', 0);
            };

            // get data name
            function getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, '\\$&');
                let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, '&')); // Replace + with %20
            }

            // Get 'to' parameter from URL and update recipient name
            let recipient = getParameterByName('to');
            if (recipient) {
                recipient = recipient.replace(/-/g, ' ').replace(/&/g, ' & ');
                $('#recipient-name').text(recipient);
            }
        });

        function OpenInvitation() {
            $('#splashscreen').hide();
            $('#page').show();
            return false; // Prevent default link action
        }

        // Function to mute/unmute audio and toggle mute button icon
        function mute() {
            let audio = $('#audio')[0];
            let button = $('#mute');
            let isMute = +localStorage.getItem('mute');
            if (!isMute) {
                audio.muted = true;
                audio.pause();
                button.html('<i color="#000" class="fa fa-volume-off my-float"></i>');
                localStorage.setItem('mute', 1);
            } else {
                audio.muted = false;
                audio.volume = 0.9; // Adjust the volume as needed
                audio.play();
                button.html('<i color="#fff" class="fa fa-volume-up my-float"></i>');
                localStorage.setItem('mute', 0);
            }
        }
    </script>
</body>

</html>

<div class="gototop js-top">
    <a href="#fh5co-header" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
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
<script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.popupoverlay.min.js') }}"></script>
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

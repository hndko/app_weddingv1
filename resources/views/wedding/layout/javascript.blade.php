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
<!-- Include Moment.js with locales -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
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
    moment.locale('id');
</script>
<script>
    $(document).ready(function() {
        // load splashscreen
        const splashscreen = $("#splashscreen");
        const page = $("#page");

        updateRecipient();
        loadMessages();

        $('#messageForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Serialize form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Ucapan Anda telah dikirim.",
                        icon: "success",
                        button: "OK",
                    }).then(function() {
                        // Reset form
                        $('#messageForm')[0].reset();
                        updateRecipient();
                        // Load messages
                        loadMessages();
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr
                        .responseJSON.message : "Terjadi kesalahan saat mengirim ucapan.";
                    Swal.fire({
                        title: "Gagal!",
                        text: errorMessage,
                        icon: "error",
                        button: "OK",
                    });
                }
            });
        });

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

        // Set the target date
        var targetDate = new Date($('.countdown').data('count')).getTime();

        // Update the countdown every 1 second
        var countdown = setInterval(function() {
            var now = new Date().getTime();
            var distance = targetDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the respective elements
            $('#days').text(days);
            $('#hours').text(hours);
            $('#minutes').text(minutes);
            $('#seconds').text(seconds);

            // If the countdown is over, write some text
            if (distance < 0) {
                clearInterval(countdown);
                $('.countdown').text("Acara telah berlangsung");
            }
        }, 1000);
    });

    function loadMessages() {
        $.ajax({
            url: '{{ route('pesan.get') }}',
            type: 'GET',
            dataType: 'json',
            success: function(messages) {
                var messageList = $('#message-list');
                messageList.empty(); // Clear the existing messages

                $.each(messages, function(index, message) {
                    var attendanceBadge = message.attendance === 'Hadir' ? 'rgb(0, 255, 42)' :
                        'rgb(255, 0, 0)';
                    var messageItem = '<ul class="list-group"><li class="list-group-item">' +
                        '<span class="badge">' + moment(message.created_at).fromNow() + '</span>' +
                        '<span class="badge" style="background-color: ' + attendanceBadge + '">' +
                        message.attendance + '</span>' +
                        message.guest_name + '<hr>' +
                        '<span>' + message.message + '</span>' +
                        '</li>' +
                        '</ul>';
                    messageList.append(messageItem);
                });

                // Initialize pagination
                pagination();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Pagination function
    function pagination() {
        var itemsPerPage = 5;
        var items = $("#message-list .list-group-item");
        var numItems = items.length;
        var numPages = Math.ceil(numItems / itemsPerPage);

        var pagination = $("#pagination");
        pagination.empty(); // Clear existing pagination

        // Function to show items for a given page
        function showPage(page) {
            items.hide();
            var start = (page - 1) * itemsPerPage;
            var end = start + itemsPerPage;
            items.slice(start, end).show();
        }

        // Generate pagination buttons
        for (var i = 1; i <= numPages; i++) {
            $("<li class='page-item'><a class='page-link' href='#'>" + i + "</a></li>").appendTo(pagination);
        }

        // Add click event for pagination buttons
        pagination.find("li:first").addClass("active");
        pagination.on("click", "li", function(event) {
            event.preventDefault();
            var page = $(this).index() + 1;
            showPage(page);
            pagination.find("li").removeClass("active");
            $(this).addClass("active");
        });

        // Show the first page initially
        showPage(1);
    }

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
    function updateRecipient() {
        let recipient = getParameterByName('to');
        console.log('Recipient:', recipient); // Log recipient for debugging
        if (recipient) {
            recipient = recipient.replace(/-/g, ' ').replace(/&/g, ' & ');
            $('#recipient-name').text(recipient);
            $('#nama_tamu').val(recipient);
        }
    }

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
<script>
    function() {
        "use strict";

        /**
         * Easy selector helper function
         */
        const select = (el, all = false) => {
            el = el.trim()
            if (all) {
                return [...document.querySelectorAll(el)]
            } else {
                return document.querySelector(el)
            }
        }

        /**
         * Easy event listener function
         */
        const on = (type, el, listener, all = false) => {
            let selectEl = select(el, all)
            if (selectEl) {
                if (all) {
                    selectEl.forEach(e => e.addEventListener(type, listener))
                } else {
                    selectEl.addEventListener(type, listener)
                }
            }
        }

        /**
         * Easy on scroll event listener 
         */
        const onscroll = (el, listener) => {
            el.addEventListener('scroll', listener)
        }

        /**
         * Back to top button
         */
        let backtotop = select('.back-to-top')
        if (backtotop) {
            const toggleBacktotop = () => {
                if (window.scrollY > 100) {
                    backtotop.classList.add('active')
                } else {
                    backtotop.classList.remove('active')
                }
            }
            window.addEventListener('load', toggleBacktotop)
            onscroll(document, toggleBacktotop)
        }

        /**
         * Countdown timer
         */
        let countdown = select('.countdown');
        const output = countdown.innerHTML;

        const countDownDate = function() {
            let timeleft = new Date(countdown.getAttribute('data-count')).getTime() - new Date().getTime();

            let days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            let hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

            countdown.innerHTML = output.replace('%d', days).replace('%h', hours).replace('%m', minutes).replace(
                '%s', seconds);
        }
        countDownDate();
        setInterval(countDownDate, 1000);

    }
</script>

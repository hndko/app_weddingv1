@extends('wedding.layout.app')
@section('content')
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
                                        <p>{{ $data['wedding']->title }}</p>
                                        <h1 style="margin-top:-40px">
                                            {{ $data['wedding']->groom_name }} &amp; {{ $data['wedding']->bride_name }}
                                        </h1>
                                        <p>
                                            <span>{{ \Carbon\Carbon::parse($data['wedding']->wedding_date)->translatedFormat('d - m - Y') }}</span>
                                        </p>
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
                        <h1 style="color:#304058;font-size:50px">Hallo!</h1>
                        <p><i style="white-space:pre-line;">{{ $data['wedding']->invitation_message }}</i></p>
                    </div>
                </div>
                <div class="couple-wrap animate-box fadeInUp animated-fast">
                    <div class="couple-half">
                        <div class="groom">
                            <img src="{{ asset($data['wedding']->groom->image) }}" alt="groom" class="img-responsive">
                        </div>
                        <div class="desc-groom">
                            <h3 style="color:#304058;">{{ $data['wedding']->groom->name }}</h3>
                            <!-- untuk deskripsi mempelai -->
                            <p><i style="font-size:12px;">Putra dari :</i><br>{{ $data['wedding']->groom->description }}</p>
                        </div>
                    </div>
                    <p class="heart text-center"><i class="icon-heart2" style="color:#304058;"></i></p>
                    <div class="couple-half">
                        <div class="bride">
                            <img src="{{ asset($data['wedding']->bride->image) }}" alt="bride" class="img-responsive">
                        </div>
                        <div class="desc-bride">
                            <h3 style="color:#304058;">{{ $data['wedding']->bride->name }}</h3>
                            <!-- untuk deskripsi mempelai -->
                            <p><i style="font-size:12px;">Putri dari :</i><br>{{ $data['wedding']->bride->description }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="text-align:center;font-size:12px;">
                    <br><i style="white-space:pre-line;">{{ $data['wedding']->quran_verse }}</i>
                </div>
            </div>
        </div>

        <div id="fh5co-event" class="fh5co-bg paralax-acara" style="background-color:#304058; min-height:0px;">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="col-md-10 col-md-offset-1">
                                @foreach ($data['events'] as $event)
                                    <div class="col-md-6 col-sm-6 text-center" style="margin-bottom:10px;">
                                        <div class="event-wrap animate-box fadeInUp animated-fast">
                                            <h3>{{ $event->name }}</h3>
                                            <div class="event-col">
                                                <i class="icon-clock"></i>
                                                <span>
                                                    @if ($event->name === 'Akad')
                                                        {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                                                    @else
                                                        {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} -
                                                        {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="event-col">
                                                <i class="icon-calendar"></i>
                                                <span>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, j F Y') }}</span>
                                            </div>
                                            <p>
                                                <label style="font-weight:normal; font-size:22px;">
                                                    {{ $event->location_name }}
                                                </label>
                                                <br>
                                                {{ $event->address }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
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
                            @foreach ($data['wedding']->stories as $index => $story)
                                <li
                                    class="{{ $index % 2 == 0 ? 'timeline-inverted' : '' }} animate-box fadeInUp animated-fast">
                                    <div class="timeline-badge"
                                        style="background-color:#304058; background-image:url({{ asset('assets/img/couple-1.png') }});">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">{{ $story->title }}</h3>
                                            <img src="{{ asset($story->image) }}" alt="img" class="timeline-img">
                                            <span
                                                class="date">{{ \Carbon\Carbon::parse($story->date)->translatedFormat('d F Y') }}</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{ $story->description }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
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
                            @foreach ($data['wedding']->galleries as $gallery)
                                <li class="one-third animate-box fadeIn animated-fast" data-animate-effect="fadeIn"
                                    style="background-image: url({{ asset($gallery->image) }});">
                                    <a href="{{ asset($gallery->image) }}" data-lightbox="roadtrip">
                                        <div class="case-studies-summary">
                                            <span></span>
                                            <h2></h2>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                            <div class="videoWrapper" style="width:100%;">
                                <center>
                                    <object data="https://www.youtube.com/embed/hrVyGEvVu7k"> </object>
                                </center>
                            </div>
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
                        <h1 class="color-putih" style="margin-top:30px;">Buku Tamu</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <div class="event-wrap animate-box fadeInUp animated-fast">
                                        <h3>Buku Tamu</h3>

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
@endsection

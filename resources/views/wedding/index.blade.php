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
                                        <h1 style="font-size: 50px; margin-top:-40px">
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

        @if ($data['events']->isNotEmpty())
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
                                                            {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                                                            -
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
        @endif

        @if ($data['wedding']->stories->isNotEmpty())
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
        @endif

        @if ($data['wedding']->galleries->isNotEmpty())
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($data['wedding']->gifts->isNotEmpty())
            <div id="fh5co-event" class="fh5co-bg paralax-acara" style="background-color:#304058; min-height:0px;">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center animate-box fadeInUp animated-fast">
                            <h1 style="color:#ffffff; font-size:50px">Kirim Kado</h1>
                            <p style="color: #ffffff">
                                <i> Bagi Anda yang ingin memberikan tanda kasih untuk kami berupa
                                    kado digital, dapat dikirim melalui rekening dibawah ini.</i>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="display-t">
                            <div class="display-tc">
                                <div class="col-md-10 col-md-offset-1">
                                    @foreach ($data['wedding']->gifts as $gift)
                                        <div class="col-md-6 col-sm-6 text-center" style="margin-bottom:10px;">
                                            <div class="event-wrap animate-box fadeInUp animated-fast">
                                                <h3>{{ $gift->bank_name }}</h3>
                                                <p class="text-center">
                                                    <img src="{{ asset($gift->qr_code_image) }}" alt=""
                                                        style="width: 150px; max-width: 100%; height: auto;">
                                                    <label style="font-weight:normal; font-size:18px;">
                                                        No Rekening : {{ $gift->account_number }} a/n
                                                        {{ $gift->account_name }}
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($data['wedding']->messages->isNotEmpty())
            <div id="fh5co-maps" class="fh5co-bg scrolltomap" style="background-color:#304058;">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center animate-box fadeInUp animated-fast">
                            <h1 class="color-putih" style="margin-top:30px;">Ucapan & Doa</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <form action="{{ route('messages.store') }}" method="POST"
                                        style="background-color: transparent">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_tamu">Nama Tamu</label>
                                            <input type="text" class="form-control" name="nama_tamu" id="nama_tamu"
                                                autocomplete="off" style="background: transparent">
                                        </div>
                                        <div class="form-group">
                                            <label for="kehadiran">Kehadiran</label>
                                            <select name="kehadiran" id="kehadiran" class="form-control" required>
                                                <option value="">Konfirmasi Kehadiran</option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Tidak Hadir">Tidak Hadir</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ucapan">Ucapan</label>
                                            <textarea name="ucapan" id="ucapan" class="form-control" cols="30" rows="5" required></textarea>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            @foreach ($data['wedding']->messages as $message)
                                <ul class="list-group" id="message-list">
                                    <li class="list-group-item">
                                        <span class="badge">{{ $message->created_at->diffForHumans() }}</span>
                                        <span class="badge"
                                            style="background-color: {{ $message->attendance == 'Hadir' ? 'rgb(0, 255, 42)' : 'rgb(255, 0, 0)' }}">
                                            {{ $message->attendance }}
                                        </span>
                                        {{ $message->guest_name }}
                                        <hr>
                                        <span>{{ $message->message }}</span>
                                    </li>
                                </ul>
                            @endforeach

                            <div class="text-center">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination" id="pagination">
                                        <!-- Pagination items will be generated by jQuery -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <footer>
            <p> &copy; Copyright {{ date('Y') }}, Kode Kreatif ID. All Rights Reserved
            </p>
        </footer>

        <a id="mute" href="#/" onclick="mute()" class="floatmute">
            <i color="#fff" class="fa fa-volume-up my-float"></i>
        </a>
    </div>
@endsection

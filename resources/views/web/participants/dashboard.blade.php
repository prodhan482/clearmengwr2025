@extends('layouts.web')

@section('content')





    @if ($participant_count == 1)
        <section class="section-padding" id="section_3">

            {{-- ================== MATCHED VIEW ================== --}}
            <div class="participantcontainer">


                <!-- Welcome Section -->
                <div class="welcome-box">
                    <h3>🎉 Congratulations, {{ $matched[0]->name }}!</h3>
                    <p>Thank you for participating in the <strong>Clear Men Guinness World Records (Official
                            Attempt)</strong>.
                    </p>
                </div>

                <!-- Matched Participant Card -->
                <div class="participant-card-bg view-attempts" data-name="{{ $participant->name }}"
                    data-image="{{ $participant->drive_image_file_id }}" data-video="{{ $participant->drive_video_file_id }}">

                    <iframe src="https://drive.google.com/file/d/{{ $participant->drive_image_file_id }}/preview?rm=minimal"
                        class="participant-bg-iframe" frameborder="0"></iframe>

                    <div class="play-icon">▶</div>

                    <div class="participant-overlay">
                        <h1 class="participant-name">{{ $participant->name }}</h1>
                        <p class="participant-info text-white">
                            Phone: {{ $participant->phone }} <br>
                            Email: {{ $participant->email }}
                        </p>

                        <div class="participant-button-wrapper">
                            <a href="https://docs.google.com/forms/d/18NWtKOTJbH8zbqUo8OFHNTiJBW5eTfHhRJn2u-abcde/viewform"
                                target="_blank" class="participant-btn-outline">
                                Click Here To Issue Your Certificate
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($participant_count == 2)
        <section class="section-padding" id="section_3">
            <div class="container">
                <div class="welcome-box">
                    <h3>🎉 Congratulations, {{ $matched[0]->name }}!</h3>
                    <p>Thank you for participating in the <strong>Clear Men Guinness World Records (Official
                            Attempt)</strong>.
                    </p>
                </div>
                <div class="row">

                    @foreach ($matched as $m)
                        <div class="col-lg-6 col-md-6 col-12 mb-4">
                            <div class="participant-card-bg view-attempts" data-name="{{ $m->name }}"
                                data-image="{{ $m->drive_image_file_id }}" data-video="{{ $m->drive_video_file_id }}">

                                <iframe
                                    src="https://drive.google.com/file/d/{{ $m->drive_image_file_id }}/preview?rm=minimal"
                                    class="participant-bg-iframe" frameborder="0"></iframe>

                                <div class="play-icon">▶</div>

                                <div class="participant-overlay">
                                    <h1 class="participant-name">{{ $m->name }}</h1>
                                    <p class="participant-info text-white">
                                        Phone: {{ $m->phone }} <br>
                                        Email: {{ $m->email }}
                                    </p>

                                    <div class="participant-button-wrapper">
                                        <a href="https://docs.google.com/forms/d/18NWtKOTJbH8zbqUo8OFHNTiJBW5eTfHhRJn2u-abcde/viewform"
                                            target="_blank" class="participant-btn-outline">
                                            Click Here To Issue Your Certificate
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @elseif($participant_count > 2)
        <section class="section-padding" id="section_3">
            <div class="container">
                <div class="welcome-box">
                    <h3>🎉 Congratulations, {{ $matched[0]->name }}!</h3>
                    <p>Thank you for participating in the <strong>Clear Men Guinness World Records (Official
                            Attempt)</strong>.
                    </p>
                </div>
                <div class="row">

                    @foreach ($matched as $m)
                        <div class="col-lg-6 col-md-6 col-12 mb-4">
                            <div class="participant-card-bg view-attempts" data-name="{{ $m->name }}"
                                data-image="{{ $m->drive_image_file_id }}" data-video="{{ $m->drive_video_file_id }}">

                                <iframe
                                    src="https://drive.google.com/file/d/{{ $m->drive_image_file_id }}/preview?rm=minimal"
                                    class="participant-bg-iframe" frameborder="0"></iframe>

                                <div class="play-icon">▶</div>

                                <div class="participant-overlay">
                                    <h1 class="participant-name">{{ $m->name }}</h1>
                                    <p class="participant-info text-white">
                                        Phone: {{ $m->phone }} <br>
                                        Email: {{ $m->email }}
                                    </p>

                                    <div class="participant-button-wrapper">
                                        <a href="https://docs.google.com/forms/d/18NWtKOTJbH8zbqUo8OFHNTiJBW5eTfHhRJn2u-abcde/viewform"
                                            target="_blank" class="participant-btn-outline">
                                            Click Here To Issue Your Certificate
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @else
        {{-- ================== UNMATCHED VIEW ================== --}}
        <section class="section-padding" id="section_3">
            <div class="usercontainer">
                <div class="row">
                    <div class="col-lg-12 text-center mb-4">
                        <h3 style="font-family: Arial, sans-serif; font-weight: bold; font-size: 28px;">
                            WELCOME TO
                            <strong style="color: #031038; font-size: 32px;">
                                CLEAR MEN GUINNESS WORLD RECORDS (<span style="color: #FF5733 !important;">OFFICIAL
                                    ATTEMPTS</span>)
                            </strong>
                        </h3>


                        <p class="mt-2">Here are some official attempt videos you can watch:</p>
                    </div>
                </div>

                <div class="row g-4">
                    @foreach ($participants as $p)
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="custom-block-wrap position-relative view-attempts" data-name="{{ $p->name }}"
                                data-image="{{ $p->drive_image_file_id ?? '' }}"
                                data-video="{{ $p->drive_video_file_id ?? '' }}">

                                <div class="video-wrapper"
                                    style="position:relative; padding-bottom:100%;overflow:hidden;border-radius:10px;">
                                    <iframe
                                        src="https://drive.google.com/file/d/{{ $p->drive_image_file_id ?? '' }}/preview"
                                        class="video-thumbnail"
                                        style="position:absolute;top:0;left:-10px;width:100%;height:100%;transform:scale(1.4);border:0;"
                                        allowfullscreen></iframe>

                                    <div class="hover-play-icon d-flex justify-content-center align-items-center">
                                        <i class="fas fa-play-circle"
                                            style="font-size: 60px; color: rgba(255,255,255,0.8);"></i>
                                    </div>
                                </div>

                                <div class="custom-block mt-2 text-center">
                                    <a href="javascript:void(0);" class="custom-btn btn">{{ $p->name }}</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif





    @include('web.participants.attempts-modal')


    {{-- ====================== STYLES ====================== --}}
    <style>
        /* Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap');

        body {
            font-family: "Lato", sans-serif;
        }

        /* Welcome message */
        .welcome-box {
            text-align: center;
            margin-bottom: 25px;
        }

        .welcome-box h3 {
            font-weight: bold;
            color: #147698;
        }

        /* Matched container */
        .participantcontainer {
            max-width: 700px;
            margin: auto;
            padding: 20px;
        }

        .participant-card-bg {
            position: relative;
            height: 600px;
            border-radius: 18px;
            overflow: hidden;
            /* crop the larger iframe */
        }

        .participant-bg-iframe {
            position: absolute;
            width: 120%;
            /* slightly larger than container */
            height: 150%;
            top: -10%;
            /* center the zoom */
            left: -10%;
            pointer-events: none;
            transition: 0.3s;
        }


        .participant-card-bg:hover {
            transform: scale(1.03);
        }

        /* Play Icon */
        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 70px;
            color: #fff;
            opacity: 0;
            transition: 0.3s;
            text-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
            z-index: 10;
        }

        .participant-card-bg:hover .play-icon {
            opacity: 1;
        }

        /* Overlay */
        .participant-overlay {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(5px);
            padding: 20px;
            text-align: center;
            color: white;
        }

        /* Buttons */
        .participant-btn-outline {
            border: 1px solid #00d4ff;
            color: #00d4ff;
            padding: 10px 20px;
            border-radius: 24px;
            text-decoration: none;
            transition: 0.3s;
        }

        .participant-btn-outline:hover {
            background: #00d4ff;
            color: white;
        }

        /* Unmatched view effects */
        .usercontainer {
            max-width: 100%;
            margin: auto;
            padding: 20px;
        }

        .hover-play-icon {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: 0.3s;
        }

        .custom-block-wrap:hover .hover-play-icon {
            opacity: 1;
        }

        .video-thumbnail {
            transition: transform 0.3s;
        }

        .custom-block-wrap:hover .video-thumbnail {
            transform: scale(1.5) !important;
        }
    </style>


    {{-- ====================== JS ====================== --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Shared modal handler
        $(document).on('click', '.view-attempts', function() {

            let name = $(this).data('name');
            let imageId = $(this).data('image');
            let videoId = $(this).data('video');

            $('#attemptsModalLabel').text(`${name} - Attempts`);

            $('#attemptsImage').attr('src',
                imageId ? `https://drive.google.com/file/d/${imageId}/preview` : ''
            ).css({
                'transform': '', // remove scaling
                'transform-origin': '',
                'transition': 'transform 0.4s ease'
            });

            // ensure parent container hides overflow when zooming
            $('#attemptsImage').parent().css('overflow', imageId ? 'hidden' : '');

            // video: reset any zoom and set src normally
            $('#attemptsVideo').attr('src',
                videoId ? `https://drive.google.com/file/d/${videoId}/preview` : ''
            ).css({
                'transform': '',

            });


            new bootstrap.Modal('#attemptsModal').show();
        });

        // Wipe data when closed
        $('#attemptsModal').on('hidden.bs.modal', function() {
            $('#attemptsImage, #attemptsVideo').attr('src', '');
        });
    </script>

@endsection

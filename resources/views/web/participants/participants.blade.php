@extends('layouts.web')

@section('content')
    <div class="participant-container">

        @if($participant)

            <!-- Welcome Text -->
            <div class="welcome-box">
                <h2>🎉 Congratulations, {{ $participant->name }}!</h2>
                <p>
                    Thank you for participating in the
                    <strong>Clear Men Guinness World Records Official Attempt</strong>.
                </p>
                <p>Your participation video and image are shown below.</p>
            </div>

            <!-- Card -->
            <div class="participant-card-bg" data-bs-toggle="modal" data-bs-target="#participantMediaModal">

                <!-- Google Drive Iframe Background -->
                <iframe src="https://drive.google.com/file/d/{{ $participant->drive_image_file_id }}/preview"
                    class="participant-bg-iframe" frameborder="0">
                </iframe>

                <!-- Play Icon -->
                <div class="play-icon">
                    ▶
                </div>

                <!-- Overlay -->
                <div class="participant-overlay">
                    <h1 class="participant-name">{{ $participant->name }}</h1>
                    <p class="participant-info">
                        Phone: {{ $participant->phone }} <br>
                        Email: {{ $participant->email }}
                    </p>

                    <div class="participant-button-wrapper">
                        <a href="https://docs.google.com/forms/d/18NWtKOTJbH8zbqUo8OFHNTiJBW5eTfHhRJn2u-abcde/viewform"
                            target="_blank" class="participant-btn-outline">
                            Fill the Form
                        </a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="participantMediaModal" tabindex="-1" aria-labelledby="participantMediaModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ $participant->name }} – Media Preview
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">

                            <!-- Image Preview -->
                            <div class="ratio ratio-16x9 mb-3">
                                <iframe src="https://drive.google.com/file/d/{{ $participant->drive_image_file_id }}/preview"
                                    frameborder="0" allow="autoplay">
                                </iframe>
                            </div>

                            <!-- Optional Download Buttons -->
                            <a href="https://drive.google.com/uc?id={{ $participant->drive_image_file_id }}&export=download"
                                class="btn btn-success btn-sm mb-3" target="_blank">
                                Download Image
                            </a>

                            <hr>

                            <!-- Video Preview -->
                            <div class="ratio ratio-16x9">
                                <iframe src="https://drive.google.com/file/d/{{ $participant->drive_video_file_id }}/preview"
                                    frameborder="0" allow="autoplay" allowfullscreen>
                                </iframe>
                            </div>

                            <a href="https://drive.google.com/uc?id={{ $participant->drive_video_file_id }}&export=download"
                                class="btn btn-primary btn-sm mt-3" target="_blank">
                                Download Video
                            </a>

                        </div>

                    </div>
                </div>
            </div>

        @else
            <div class="participant-alert alert alert-warning text-center p-4 rounded-4 shadow-sm">
                <h4>No Participant Data Found</h4>
                <p>Your phone number does not match any record.</p>
            </div>
        @endif

    </div>


    <style>
        /* Google Fonts */
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

        .welcome-box h2 {
            font-weight: bold;
            color: #0d6efd;
        }

        /* Container */
        .participant-container {
            max-width: 700px;
            margin: auto;
            padding: 20px;
        }

        /* Card */
        .participant-card-bg {
            position: relative;
            height: 600px;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            cursor: pointer;
            transition: 0.3s;
        }

        .participant-card-bg:hover {
            transform: scale(1.03);
        }

        /* Background iframe */
        .participant-bg-iframe {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        /* Play icon */
        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 70px;
            color: white;
            opacity: 0;
            transition: opacity .3s;
            text-shadow: 0 0 20px rgba(0, 0, 0, .7);
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
            color: white;
            padding: 20px;
            text-align: center;
            z-index: 5;
        }

        .participant-name {
            font-family: "Righteous", cursive;
            font-size: 2rem;
        }

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

        /* Alert */
        .participant-alert {
            max-width: 500px;
            margin: auto;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
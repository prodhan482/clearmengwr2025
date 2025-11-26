@extends('layouts.web')

@section('content')
<div class="participant-container">

    @if($participant)
        <div class="participant-card-bg">
            <!-- Drive Image as iframe background -->
            <iframe 
                src="https://drive.google.com/file/d/{{ $participant->drive_image_file_id }}/preview" 
                frameborder="0" 
                allowfullscreen
                class="participant-bg-iframe"></iframe>

            <!-- Overlay with info -->
            <div class="participant-overlay">
                <h1 class="participant-name">{{ $participant->name }}</h1>
                <p class="participant-info">Phone: {{ $participant->phone }} <br/> Email: {{ $participant->email }}</p>
                <div class="participant-button-wrapper">
                    <button class="participant-btn-outline" data-bs-toggle="modal" data-bs-target="#participantMediaModal">
                        View Media
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="participantMediaModal" tabindex="-1" aria-labelledby="participantMediaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="participantMediaModalLabel">{{ $participant->name }} Media</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <!-- Image iframe -->
                        <div class="ratio ratio-16x9 mb-3">
                            <iframe src="https://drive.google.com/file/d/{{ $participant->drive_image_file_id }}/preview" allowfullscreen frameborder="0"></iframe>
                        </div>
                        <hr>
                        <!-- Video iframe -->
                        <div class="participant-video-ratio ratio ratio-16x9">
                            <iframe src="https://drive.google.com/file/d/{{ $participant->drive_video_file_id }}/preview" allowfullscreen frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="participant-alert alert alert-warning text-center p-4 rounded-4 shadow-sm">
            <h4>No Participant Data Found</h4>
            <p>Your phone number is not matched with any participant record.</p>
        </div>
    @endif

</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap');

body {
    font-family: 'Lato', sans-serif;
}

.participant-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.participant-card-bg {
    position: relative;
    width: 100%;
    max-width: 600px;
    height: 700px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    cursor: pointer;
    transition: transform 0.3s ease;
}

.participant-card-bg:hover {
    transform: scale(1.05);
}

/* Iframe as background */
.participant-bg-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none; /* so overlay buttons work */
}

/* Overlay info */
.participant-overlay {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(17, 25, 40, 0.6);
    color: #fff;
    padding: 20px;
    backdrop-filter: blur(8px);
    text-align: center;
    z-index: 2;
}

.participant-name {
    font-family: 'Righteous', cursive;
    font-size: 2rem;
    margin-bottom: 10px;
}

.participant-info {
    font-size: 0.9rem;
    line-height: 1.4;
    margin-bottom: 15px;
}

.participant-button-wrapper .participant-btn-outline {
    border-radius: 24px;
    padding: 10px 20px;
    font-weight: bold;
    border: 1px solid #00d4ff;
    background: transparent;
    color: #00d4ff;
    transition: all 0.3s ease;
}

.participant-button-wrapper .participant-btn-outline:hover {
    background: #00d4ff;
    color: #fff;
    transform: scale(1.1);
}

/* Modal styles */
.participant-video-ratio iframe {
    border-radius: 12px;
}

.participant-alert {
    width: 100%;
    max-width: 500px;
}
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

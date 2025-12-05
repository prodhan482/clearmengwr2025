@extends('layouts.dashboard_layout')

@section('custom_style')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 25px;
            background-color: #ffffff;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        h1.h2 {
            font-weight: 700;
            font-size: 1.8rem;
            color: #17a2b8;
        }

        .info-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 10px;
        }

        .info-card {
            flex: 1 1 45%;
            background-color: #f1f9fb;
            border-radius: 12px;
            padding: 15px 20px;
            box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.03);
        }

        .info-card h5 {
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-card p {
            margin-bottom: 0;
            color: #6c757d;
            word-break: break-word;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 20px;
            color: #fff;
        }

        .active-badge {
            background-color: #28a745;
        }

        .inactive-badge {
            background-color: #dc3545;
        }

        .fa-icon {
            font-size: 18px;
        }

        .drive-link {
            display: inline-block;
            font-size: 14px;
            color: #17a2b8;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .info-card {
                flex: 1 1 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-lg-4">
        <div class="row justify-content-center">
            <div class="col-lg-10 mt-4">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="h2 mb-0">Participant Details</h1>
                        <a href="{{ route('participants.index') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-backward mr-1"></i> Back
                        </a>
                    </div>

                    <div class="info-section">
                        <div class="info-card">
                            <h5><i class="fas fa-calendar-alt fa-icon"></i> Date Taken</h5>
                            <p>{{ $participant->date_taken ?? 'N/A' }}</p>
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-map-marker-alt fa-icon"></i> Location</h5>
                            <p>{{ $participant->location ?? 'N/A' }}</p>
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-camera fa-icon"></i> Camera No.</h5>
                            <p>{{ $participant->camera_no ?? 'N/A' }}</p>
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-user fa-icon"></i> Name</h5>
                            <p>{{ $participant->name }}</p>
                        </div>



                        <div class="info-card">
                            <h5><i class="fas fa-video fa-icon"></i> Drive Video</h5>
                            @if ($participant->drive_video_file_id)
                                <iframe
                                    src="https://drive.google.com/file/d/{{ $participant->drive_video_file_id }}/preview"
                                    width="100%" height="550" frameborder="0"
                                    allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen class="drive-link"
                                    style="border-radius:8px;"></iframe>
                            @else
                                <p>N/A</p>
                            @endif
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-image fa-icon"></i> Drive Image</h5>
                            @if ($participant->drive_image_file_id)
                                <iframe
                                    src="https://drive.google.com/file/d/{{ $participant->drive_image_file_id }}/preview"
                                    width="100%" height="550" frameborder="0"
                                    allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen class="drive-link"
                                    style="border-radius:8px;"></iframe>
                            @else
                                <p>N/A</p>
                            @endif
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-envelope fa-icon"></i> Email</h5>
                            <p>{{ $participant->email ?? 'N/A' }}</p>
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-images fa-icon"></i> Image Library File No.</h5>
                            <p>{{ $participant->image_library_file_no ?? 'N/A' }}</p>
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-video fa-icon"></i> Video Library File No.</h5>
                            <p>{{ $participant->video_library_file_no ?? 'N/A' }}</p>
                        </div>

                       

                        <div class="info-card">
                            <h5><i class="fas fa-link fa-icon"></i> Video Chain Serial</h5>
                            <p>{{ $participant->video_chain_serial ?? 'N/A' }}</p>
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-clock fa-icon"></i> Video Length</h5>
                            <p>{{ $participant->video_length ?? 'N/A' }}</p>
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-running fa-icon"></i> Action Performed</h5>
                            <p>{{ $participant->action_performed ?? 'N/A' }}</p>
                        </div>


                        {{-- <div class="info-card">
                            <h5><i class="fas fa-toggle-on fa-icon"></i> Status</h5>
                            <span class="status-badge {{ $participant->is_active ? 'active-badge' : 'inactive-badge' }}">
                                <i class="fas {{ $participant->is_active ? 'fa-check' : 'fa-times' }}"></i>
                                {{ $participant->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div> --}}
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-primary btn-lg"
                            style="width: 40%;">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.dashboard_layout')

@section('custom_style')
    <style>
        /* Toggle Styling */
        .toggle-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            user-select: none;
        }

        .toggle-wrapper input {
            display: none;
        }

        .toggle-switch {
            width: 50px;
            height: 26px;
            background: #ccc;
            border-radius: 15px;
            position: relative;
            transition: background 0.3s;
        }

        .toggle-switch::after {
            content: "";
            width: 22px;
            height: 22px;
            background: #fff;
            border-radius: 50%;
            position: absolute;
            top: 2px;
            left: 2px;
            transition: transform 0.3s;
        }

        input:checked+.toggle-switch {
            background: #28a745;
        }

        input:checked+.toggle-switch::after {
            transform: translateX(24px);
        }

        .toggle-icon {
            font-size: 22px;
            color: #dc3545;
            transition: color 0.3s;
        }

        input:checked~.toggle-icon {
            color: #28a745;
        }

        .form-top-row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-top-row .form-group {
            flex: 1;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Edit Participant</h1>
                            <a href="{{ route('participants.index') }}"
                                class="d-none d-sm-inline-block btn-sm btn-danger shadow-sm">
                                <i class="fa fa-backward mr-2"></i>Back
                            </a>
                        </div>

                        {!! Form::model($participant, [
                            'route' => ['participants.update', $participant->id],
                            'method' => 'PUT',
                        ]) !!}

                        @csrf

                        {{-- Activation Toggle --}}
                        <div class="form-group mb-3">
                            <label>Activation</label>
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="is_active" id="is_active"
                                    {{ $participant->is_active ? 'checked' : '' }}>
                                <span class="toggle-switch"></span>
                                <i class="fas toggle-icon" id="toggleIcon"></i>
                            </label>
                        </div>

                        {{-- Top Row: Date Taken, Location, Camera No --}}
                        <div class="form-top-row">
                            <div class="form-group">
                                <label>Date Taken <span class="text-danger">*</span></label>
                                {!! Form::text('date_taken', $participant->date_taken, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                {!! Form::text('location', $participant->location, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Camera No.</label>
                                {!! Form::text('camera_no', $participant->camera_no, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Phone (Bangladesh)</label>
                                {!! Form::text('phone', $participant->phone, [
                                    'class' => 'form-control',
                                    'placeholder' => 'e.g. 01XXXXXXXXX or +8801XXXXXXXXX',
                                    'pattern' => '^(?:\+?88)?01[3-9]\d{8}$',
                                    'title' => 'Bangladeshi mobile number. Allowed: 01XXXXXXXXX or +8801XXXXXXXXX',
                                    'inputmode' => 'tel',
                                ]) !!}
                                <small class="form-text text-muted">Format: 01XXXXXXXXX or +8801XXXXXXXXX</small>
                            </div>
                        </div>

                        {{-- Second Row: Name, Email --}}
                        <div class="form-top-row mt-3">
                            <div class="form-group">
                                <label>Participant Name <span class="text-danger">*</span></label>
                                {!! Form::text('name', $participant->name, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                {!! Form::email('email', $participant->email, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        {{-- Third Row: Drive Video & Image --}}
                        <div class="form-top-row mt-3">
                            <div class="form-group">
                                <label>Drive Video File ID / URL</label>
                                {!! Form::text('drive_video_file_id', $participant->drive_video_file_id, [
                                    'class' => 'form-control',
                                    'placeholder' => 'File ID or full Google Drive URL',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label>Drive Image File ID / URL</label>
                                {!! Form::text('drive_image_file_id', $participant->drive_image_file_id, [
                                    'class' => 'form-control',
                                    'placeholder' => 'File ID or full Google Drive URL',
                                ]) !!}
                            </div>
                        </div>

                        {{-- Fourth Row: Image/Video Library & Chain Serial --}}
                        <div class="form-top-row mt-3">
                            <div class="form-group">
                                <label>Image Library File No.</label>
                                {!! Form::text('image_library_file_no', $participant->image_library_file_no, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Video Library File No.</label>
                                {!! Form::text('video_library_file_no', $participant->video_library_file_no, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Video Chain Serial</label>
                                {!! Form::text('video_chain_serial', $participant->video_chain_serial, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        {{-- Fifth Row: Video Length & Action Performed --}}
                        <div class="form-top-row mt-3">
                            <div class="form-group">
                                <label>Video Length (in seconds or mm:ss)</label>
                                {!! Form::text('video_length', $participant->video_length, [
                                    'class' => 'form-control',
                                    'placeholder' => 'e.g. 120 or 02:00',
                                ]) !!}
                            </div>

                            <div class="form-group">
                                <label>Action Performed</label>
                                {!! Form::text('action_performed', $participant->action_performed, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Describe action performed',
                                ]) !!}
                            </div>
                        </div>


                        {{-- Submit --}}
                        <div class="mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Participant</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const isActive = document.getElementById('is_active');
            const toggleIcon = document.getElementById('toggleIcon');

            function updateToggleIcon() {
                toggleIcon.classList.remove('fa-times-circle', 'fa-check-circle');
                toggleIcon.classList.add(isActive.checked ? 'fa-check-circle' : 'fa-times-circle');
            }

            isActive.addEventListener('change', updateToggleIcon);
            updateToggleIcon();
        });
    </script>
@endsection

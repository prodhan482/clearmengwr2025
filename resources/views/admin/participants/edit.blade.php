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
                        <a href="{{ route('participants.index') }}" class="d-none d-sm-inline-block btn-sm btn-danger shadow-sm">
                            <i class="fa fa-backward mr-2"></i>Back
                        </a>
                    </div>

                    {!! Form::model($participant, [
                        'route' => ['participants.update', $participant->id],
                        'method' => 'PUT'   {{-- Use PUT, not PATCH --}}
                    ]) !!}
                        @csrf {{-- CSRF token --}}
                        
                        {{-- Activation Toggle --}}
                        <div class="form-group mb-3">
                            <label>Activation</label>
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="is_active" id="is_active" {{ $participant->is_active ? 'checked' : '' }}>
                                <span class="toggle-switch"></span>
                                <i class="fas toggle-icon" id="toggleIcon"></i>
                            </label>
                        </div>

                        {{-- Participant Fields --}}
                        <div class="form-top-row">
                            <div class="form-group">
                                <label>Serial Number</label>
                                <input type="text" name="serial_number" class="form-control" value="{{ $participant->serial_number }}">
                            </div>
                            <div class="form-group">
                                <label>Code Number</label>
                                <input type="text" name="code_number" class="form-control" value="{{ $participant->code_number }}">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $participant->name }}">
                            </div>
                        </div>

                        <div class="form-top-row mt-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $participant->email }}">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $participant->phone }}">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label>Notes</label>
                            <textarea name="notes" class="form-control" rows="3">{{ $participant->notes }}</textarea>
                        </div>

                        <div class="form-top-row mt-3">
                            <div class="form-group">
                                <label>Drive Video File ID</label>
                                <input type="text" name="drive_video_file_id" class="form-control" value="{{ $participant->drive_video_file_id }}">
                            </div>
                            <div class="form-group">
                                <label>Drive Image File ID</label>
                                <input type="text" name="drive_image_file_id" class="form-control" value="{{ $participant->drive_image_file_id }}">
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
document.addEventListener('DOMContentLoaded', function () {
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

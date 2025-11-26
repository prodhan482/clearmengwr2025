@extends('layouts.dashboard_layout')

@section('custom_style')
    <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('page_errors')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@section('content')
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h1 class="h2 text-info font-weight-bold">Create New Participant</h1>
                        <a href="{{ route('participants.index') }}" class="btn-sm btn-danger shadow-sm">
                            <i class="fa fa-backward mr-2"></i> Back
                        </a>
                    </div>
                </div>
            </div>

            <!-- Form Column -->
            <div class="col-md-12 mt-4">
                <div class="card card-body">

                    {!! Form::open(['route' => 'participants.store', 'method' => 'POST']) !!}

                    <div class="row">

                        {{-- Date Taken --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Date Taken <span class="text-danger">*</span>:</strong>
                                {!! Form::date('date_taken', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        {{-- Location --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Location:</strong>
                                {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location']) !!}
                            </div>
                        </div>

                        {{-- Camera No --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Camera No.:</strong>
                                {!! Form::text('camera_no', null, ['class' => 'form-control', 'placeholder' => 'Camera Number']) !!}
                            </div>
                        </div>

                        {{-- Participant Name --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Participant Name <span class="text-danger">*</span>:</strong>
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full Name', 'required']) !!}
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Email Address:</strong>
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Phone Number (Bangladesh):</strong>
                                {!! Form::tel('phone', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'e.g. 01XXXXXXXXX or +8801XXXXXXXXX',
                                    'pattern' => '^(\+?88)?01[3-9][0-9]{8}$',
                                    'title' => 'Enter a Bangladeshi mobile number. Accepts 01XXXXXXXXX or +8801XXXXXXXXX formats.',
                                    'maxlength' => 14
                                ]) !!}
                            </div>
                        </div>

                        {{-- Drive Image File ID --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Drive Image File ID / URL:</strong>
                                {!! Form::text('drive_image_file_id', null, ['class' => 'form-control', 'placeholder' => 'File ID or full Google Drive URL']) !!}
                            </div>
                        </div>

                        {{-- Drive Video File ID --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Drive Video File ID / URL:</strong>
                                {!! Form::text('drive_video_file_id', null, ['class' => 'form-control', 'placeholder' => 'File ID or full Google Drive URL']) !!}
                            </div>
                        </div>

                        {{-- Image Library File No --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Image Library File No.:</strong>
                                {!! Form::text('image_library_file_no', null, ['class' => 'form-control', 'placeholder' => 'Image Library #']) !!}
                            </div>
                        </div>

                        {{-- Video Library File No --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Video Library File No.:</strong>
                                {!! Form::text('video_library_file_no', null, ['class' => 'form-control', 'placeholder' => 'Video Library #']) !!}
                            </div>
                        </div>

                        {{-- Video Chain Serial --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong>Video Chain Serial:</strong>
                                {!! Form::text('video_chain_serial', null, ['class' => 'form-control', 'placeholder' => 'Video Chain Serial']) !!}
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                        </div>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    <script src="{{ asset('/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
@endsection
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
                    <div class="card-body">

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h2 mb-0 text-info font-weight-bold">Create New Participant</h1>

                            <a href="{{ route('participants.index') }}" class="btn-sm btn-danger shadow-sm">
                                <i class="fa fa-backward mr-2"></i> Back
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Form Column -->
            <div class="col-md-12 mt-4">
                <div class="card card-body">

                    {!! Form::open(['route' => 'participants.store', 'method' => 'POST']) !!}

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Code Number:</strong>
                                {!! Form::text('code_number', null, ['class' => 'form-control', 'placeholder' => 'Code Number']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Phone:</strong>
                                {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone Number']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Drive Image File ID:</strong>
                                {!! Form::text('drive_image_file_id', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Google Drive Image ID',
                                ]) !!}
                                <small class="text-muted">Only the **file ID** (not the full URL)</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Drive Video File ID:</strong>
                                {!! Form::text('drive_video_file_id', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Google Drive Video ID',
                                ]) !!}
                                <small class="text-muted">Only the **file ID**</small>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Notes:</strong>
                                {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Notes']) !!}
                            </div>
                        </div>

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

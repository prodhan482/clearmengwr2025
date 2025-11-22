@extends('layouts.dashboard_layout')

@section('custom_style')
    <!-- DataTables CSS -->
    <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css">

    <style>
        th {
            text-align: center !important;
            vertical-align: middle !important;
        }

        td {
            vertical-align: middle !important;
        }

        tr td:last-child {
            white-space: nowrap;
            text-align: center;
            width: 20%;
        }

        img.thumb {
            height: 40px;
            width: auto;
            border-radius: 5px;
        }

        .gradient-header {
            background: linear-gradient(to right, #ec2F4B, #009FFF);
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-lg-4">

        <!-- Page Header -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h2 class="text-info font-weight-bold">Participants Management</h2>

                        <div>
                            <a href="{{ route('participants.singlycreate') }}" class="btn btn-primary btn-sm shadow-sm">
                                <i class="fa fa-plus"></i> Add New Participant
                            </a>

                            <a href="{{ route('participants.create') }}" class="btn btn-success btn-sm shadow-sm ml-1">
                                <i class="fa fa-file-import"></i> Import CSV/Excel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card py-3 shadow-sm">
                    <div class="table-responsive px-3">

                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr class="text-white font-weight-bold gradient-header">
                                    <th>No</th>
                                    <th>Serial Number</th>
                                    <th>Code Number</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Notes</th>
                                    <th>Drive Video</th>
                                    <th>Drive Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($participants as $participant)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $participant->serial_number }}</td>
                                        <td>{{ $participant->code_number }}</td>
                                        <td>{{ $participant->name }}</td>
                                        <td>{{ $participant->email }}</td>
                                        <td>{{ $participant->phone }}</td>
                                        <td>{{ $participant->notes }}</td>

                                        <!-- Google Drive Video -->
                                        <td class="text-center">
                                            @if ($participant->drive_video_file_id)
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#videoModal{{ $participant->id }}">
                                                    View Video
                                                </button>

                                                <!-- Video Modal -->
                                                <div class="modal fade" id="videoModal{{ $participant->id }}"
                                                    tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Video Preview –
                                                                    {{ $participant->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item"
                                                                        src="https://drive.google.com/file/d/{{ $participant->drive_video_file_id }}/preview"
                                                                        allowfullscreen>
                                                                    </iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <!-- Google Drive Image -->
                                        <td class="text-center">
                                            @if ($participant->drive_image_file_id)
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#imageModal{{ $participant->id }}">
                                                    View Image
                                                </button>

                                                <!-- Image Modal -->
                                                <div class="modal fade" id="imageModal{{ $participant->id }}"
                                                    tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Image Preview –
                                                                    {{ $participant->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="https://drive.google.com/uc?export=view&id={{ $participant->drive_image_file_id }}"
                                                                    class="img-fluid rounded shadow-sm" alt="Image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <!-- Action Buttons -->
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('participants.show', $participant->id) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('participants.edit', $participant->id) }}">
                                                Edit
                                            </a>

                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['participants.destroy', $participant->id],
                                                'style' => 'display:inline',
                                            ]) !!}
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3">
                            {{ $participants->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('extra_js')
    <!-- DataTables -->
    <script src="{{ asset('/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
@endsection

@extends('layouts.dashboard_layout')

@section('custom_style')
    <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

    <style>
        tr td:last-child {
            width: 18%;
            white-space: nowrap;
            text-align: center;
        }

        th {
            text-align: center;
        }

        /* Optional thumbnail styling for any image/video preview */
        img.thumb {
            height: 40px;
            width: auto;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 mt-lg-4 mt-4">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Participants Management</h1>
                                <div>
                                    <a href="{{ route('participants.singlycreate') }}"
                                        class="d-none d-sm-inline-block btn-sm btn-primary shadow-sm">
                                        <i class="fa fa-plus"></i> Add New Participant
                                    </a>
                                    <a href="{{ route('participants.create') }}"
                                        class="d-none d-sm-inline-block btn-sm btn-success shadow-sm">
                                        <i class="fa fa-file-import"></i> Import CSV/Excel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Participants Table -->
            <div class="col-md-12 mt-4">
                <div class="card py-3">
                    <div class="table-responsive">
                        <table class="table table-striped zero-configuration">
                            <thead>
                                <tr class="text-white font-weight-bold"
                                    style="background: linear-gradient(to right, #ec2F4B, #009FFF);">
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
                                        <td>
                                            @if($participant->drive_video_file_id)
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#videoModal{{ $participant->id }}">
                                                    View Video
                                                </button>

                                                <!-- Video Modal -->
                                                <div class="modal fade" id="videoModal{{ $participant->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="videoModalLabel{{ $participant->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Video Preview - {{ $participant->name }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item"
                                                                        src="https://drive.google.com/file/d/{{ $participant->drive_video_file_id }}/preview"
                                                                        allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td>
                                            @if($participant->drive_image_file_id)
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#imageModal{{ $participant->id }}">
                                                    View Image
                                                </button>

                                                <!-- Image Modal -->
                                                <div class="modal fade" id="imageModal{{ $participant->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="imageModalLabel{{ $participant->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Image Preview - {{ $participant->name }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ $participant->drive_image_file_id }}"
                                                                    class="img-fluid rounded" alt="Participant Image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td>
                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('participants.show', $participant->id) }}" title="View"><i
                                                    class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('participants.edit', $participant->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['participants.destroy', $participant->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $participants->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
    <script src="{{ asset('/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection
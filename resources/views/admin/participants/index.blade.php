{{-- @extends('layouts.dashboard_layout')

@section('custom_style')
    <!-- DataTables CSS -->
    <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

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

        .fullscreen-iframe-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 70vh;
            height: 0;
            overflow: hidden;
            border-radius: 10px;
        }

        .modal .fullscreen-iframe-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .gradient-header {
            background: linear-gradient(to right, #ec2F4B, #009FFF);
            color: white;
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
                                <tr class="gradient-header font-weight-bold text-center">
                                    <th>No</th>
                                    <th>Date Taken</th>
                                    <th>Location</th>
                                    <th>Camera No</th>
                                    <th>Participant Name</th>
                                    <th>Email</th>
                                    <th>Image Library #</th>
                                    <th>Video Library #</th>
                                    <th>Video Chain Serial</th>
                                    <th>Drive Video</th>
                                    <th>Drive Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($participants as $participant)
                                                            <tr>
                                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                                <td>{{ $participant->date_taken }}</td>
                                                                <td>{{ $participant->location }}</td>
                                                                <td>{{ $participant->camera_no }}</td>
                                                                <td>{{ $participant->name }}</td>
                                                                <td>{{ $participant->email }}</td>
                                                                <td>{{ $participant->image_library_file_no }}</td>
                                                                <td>{{ $participant->video_library_file_no }}</td>
                                                                <td>{{ $participant->video_chain_serial }}</td>

                                                                <!-- Drive Video -->
                                                                <td class="text-center">
                                                                    @if ($participant->drive_video_file_id)
                                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                                            data-target="#videoModal{{ $participant->id }}">
                                                                            View Video
                                                                        </button>

                                                                        <div class="modal fade" id="videoModal{{ $participant->id }}" tabindex="-1"
                                                                            role="dialog">
                                                                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Video Preview – {{ $participant->name }}
                                                                                        </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                                            <span>&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="fullscreen-iframe-wrapper">
                                                                                            <iframe
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

                                                                <!-- Drive Image -->
                                                                <td class="text-center">
                                                                    @if ($participant->drive_image_file_id)
                                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                                            data-target="#imageModal{{ $participant->id }}">
                                                                            View Image
                                                                        </button>

                                                                        <div class="modal fade" id="imageModal{{ $participant->id }}" tabindex="-1"
                                                                            role="dialog">
                                                                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Image Preview – {{ $participant->name }}
                                                                                        </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                                            <span>&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="fullscreen-iframe-wrapper">
                                                                                            <iframe
                                                                                                src="https://drive.google.com/file/d/{{ $participant->drive_image_file_id }}/preview"
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

                                                                <!-- Actions -->
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
                                        'style' => 'display:inline'
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
    <script src="{{ asset('/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.dataTables_wrapper .dataTables_paginate .paginate_button.previous a')
                    .html('<i class="fa fa-chevron-left"></i>');

                $('.dataTables_wrapper .dataTables_paginate .paginate_button.next a')
                    .html('<i class="fa fa-chevron-right"></i>');
            }, 100);
        });
    </script>
@endsection --}}



@extends('layouts.dashboard_layout')

@section('custom_style')

<!-- DataTables CSS -->
<link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
    }

    /* Responsive iframe */
    .fullscreen-iframe-wrapper {
        position: relative;
        width: 100%;
        padding-bottom: 70vh;
        height: 100%;
        overflow: hidden;
        border-radius: 10px;
    }

    .fullscreen-iframe-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .gradient-header {
        background: linear-gradient(to right, #ec2F4B, #009FFF);
        color: white;
        font-weight: bold;
    }

    /* Mobile Fixes */
    @media(max-width:768px) {
        .modal-xl {
            max-width: 100% !important;
        }

        .fullscreen-iframe-wrapper {
            padding-bottom: 50vh !important;
        }
    }
</style>

@endsection


@section('content')
<div class="container-fluid px-lg-4">

    <!-- Header -->
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

                    <table class="table table-striped table-bordered" id="participants-table">
                        <thead class="gradient-header text-center">
                            <tr>
                                <th>No</th>
                                <th>Date Taken</th>
                                <th>Location</th>
                                <th>Camera No</th>
                                <th>Participant Name</th>
                                <th>Email</th>
                                <th>Image Library #</th>
                                <th>Video Library #</th>
                                <th>Video Chain Serial</th>
                                <th>Drive Video</th>
                                <th>Drive Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal for Viewing Image/Video -->
<div class="modal fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="previewTitle"></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="fullscreen-iframe-wrapper">
                    <iframe id="previewIframe" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection



@section('extra_js')

<script src="{{ asset('/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {

    let table = $('#participants-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('participants.json.admin') }}",  // <-- Must match your route
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'date_taken', name: 'date_taken' },
            { data: 'location', name: 'location' },
            { data: 'camera_no', name: 'camera_no' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'image_library_file_no', name: 'image_library_file_no' },
            { data: 'video_library_file_no', name: 'video_library_file_no' },
            { data: 'video_chain_serial', name: 'video_chain_serial' },

            {
                data: 'drive_video_file_id',
                name: 'drive_video_file_id',
                render: function (data, type, row) {
                    return data
                        ? `<button class="btn btn-primary btn-sm viewPreview" data-type="Video" data-id="${data}" data-name="${row.name}">View</button>`
                        : "N/A";
                }
            },

            {
                data: 'drive_image_file_id',
                name: 'drive_image_file_id',
                render: function (data, type, row) {
                    return data
                        ? `<button class="btn btn-success btn-sm viewPreview" data-type="Image" data-id="${data}" data-name="${row.name}">View</button>`
                        : "N/A";
                }
            },

            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        pageLength: 25,
        responsive: true,
    });

    // Handle Preview Modal
    $(document).on("click", ".viewPreview", function () {
        let type = $(this).data("type");
        let id = $(this).data("id");
        let name = $(this).data("name");

        $("#previewTitle").text(`${type} Preview – ${name}`);
        $("#previewIframe").attr("src", `https://drive.google.com/file/d/${id}/preview`);

        $("#previewModal").modal("show");
    });

});
</script>

@endsection

{{-- @extends('layouts.web')

@section('title', 'Home | Clear Men Guinness World Records')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<div class="container py-4">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-6 fw-bold">Official Attempts List</h1>
            <p class="text-muted mb-4">Search participants and view their recorded attempts.</p>
        </div>
    </div>
</div>

<div class="p-5">
    <table id="datatable-json" class="table table-striped table-bordered table-hover w-100">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participant)
            <tr>
                <td>{{ $participant->id }}</td>
                <td>{{ $participant->name }}</td>
                <td>{{ $participant->phone }}</td>
                <td>
                    <button class="btn btn-primary btn-sm view-attempts" data-name="{{ $participant->name }}"
                        data-video="{{ $participant->drive_video_file_id }}"
                        data-image="{{ $participant->drive_image_file_id }}">
                        View Attempts
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Admin-style Modal -->
<div class="modal fade" id="attemptsModal" tabindex="-1" aria-labelledby="attemptsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attemptsModalLabel">Attempts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Left column: Image -->
                    <div class="col-md-6 mb-3">
                        <iframe id="attemptsImage" class="fullscreen-iframe-wrapper"
                            style="width:100%; height:400px; border:none;"></iframe>
                    </div>

                    <!-- Right column: Video -->
                    <div class="col-md-6 mb-3">
                        <iframe id="attemptsVideo" class="fullscreen-iframe-wrapper"
                            style="width:100%; height:400px; border:none;" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#datatable-json').DataTable({
            responsive: true,
            paging: true,
            pageLength: 25,
            lengthMenu: [5, 10, 25, 50],
            searching: true,
            ordering: true,
            info: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search attempts..."
            }
        });

        // Handle View Attempts button click
        $('.view-attempts').click(function () {
            var modalEl = document.getElementById('attemptsModal');
            var modal = new bootstrap.Modal(modalEl);

            var name = $(this).data('name');
            var imageId = $(this).data('image');
            var videoId = $(this).data('video');

            $('#attemptsModalLabel').text(name + ' - Attempts');

            // Set Image iframe
            if (imageId) {
                $('#attemptsImage')
                    .attr('src', 'https://drive.google.com/file/d/' + imageId + '/preview')
                    .css({
                        'width': '100%',   // Customize image width
                        'height': '600px', // Customize image height
                    });
            } else {
                $('#attemptsImage').attr('src', '').css({ 'width': '', 'height': '' });
            }

            // Set Video iframe
            if (videoId) {
                $('#attemptsVideo')
                    .attr('src', 'https://drive.google.com/file/d/' + videoId + '/preview')
                    .css({
                        'width': '100%',   // Customize video width
                        'height': '600px', // Customize video height
                    });
            } else {
                $('#attemptsVideo').attr('src', '').css({ 'width': '', 'height': '' });
            }

            modal.show();
        });

        // Clear modal content on close
        $('#attemptsModal').on('hidden.bs.modal', function () {
            $('#attemptsImage, #attemptsVideo').attr('src', '').css({ 'width': '', 'height': '' });
        });

    });
</script>

@endsection --}}



@extends('layouts.web')

@section('title', 'Home | Clear Men Guinness World Records')

@section('content')

{{-- CSS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<style>
    /* Responsive Modal Iframe */
    #attemptsImage, #attemptsVideo {
        width: 100%;
        height: 500px;
        border: none;
        border-radius: 8px;
    }

    /* Mobile Size */
    @media (max-width: 768px) {
        #attemptsImage, #attemptsVideo {
            height: 300px;
        }
    }

    /* Table scroll on mobile */
    .dataTables_wrapper .dataTables_scroll {
        overflow-x: auto;
    }
</style>

<div class="container py-4">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-6 fw-bold">Official Attempts List</h1>
            <p class="text-muted mb-4">Search participants and view their recorded attempts.</p>
        </div>
    </div>
</div>

<div class="p-3">
    <div class="table-responsive">
        <table id="datatable-json" class="table table-striped table-bordered w-100">
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="attemptsModal" tabindex="-1" aria-labelledby="attemptsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attemptsModalLabel">Attempts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    {{-- Image --}}
                    <div class="col-md-6 col-sm-12 mb-3">
                        <iframe id="attemptsImage"></iframe>
                    </div>

                    {{-- Video --}}
                    <div class="col-md-6 col-sm-12 mb-3">
                        <iframe id="attemptsVideo" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- JS --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {

        // FAST SERVER-SIDE DATATABLE
        $('#datatable-json').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('participants.json') }}",
            columns: [
                { data: 'video_chain_serial', name: 'video_chain_serial' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'location', name: 'location' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            pageLength: 25,
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search participants..."
            }
        });

        // Modal handler
        $(document).on('click', '.view-attempts', function() {
            let name = $(this).data('name');
            let imageId = $(this).data('image');
            let videoId = $(this).data('video');

            $('#attemptsModalLabel').text(name + " - Attempts");

            // Image
            // Image
            $('#attemptsImage')
                .attr('src', imageId ? `https://drive.google.com/file/d/${imageId}/preview` : '')
                .css({
                    width: '100%',
                    height: window.matchMedia('(max-width: 768px)').matches ? '300px' : '600px',
                    border: 'none',
                    'border-radius': '8px'
                });

            // Video
            $('#attemptsVideo')
                .attr('src', videoId ? `https://drive.google.com/file/d/${videoId}/preview` : '')
                .css({
                    width: '100%',
                    height: window.matchMedia('(max-width: 768px)').matches ? '300px' : '600px',
                    border: 'none',
                    'border-radius': '8px'
                })
                .attr('allowfullscreen', videoId ? true : null);

            new bootstrap.Modal('#attemptsModal').show();
        });

        // Clear modal content on close
        $('#attemptsModal').on('hidden.bs.modal', function() {
            $('#attemptsImage, #attemptsVideo').attr('src', '');
        });

    });
</script>

@endsection

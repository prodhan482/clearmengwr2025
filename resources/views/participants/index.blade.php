@extends('layouts.web.layouts')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-white via-blue-50 to-white p-8">
        <div class="max-w-7xl mx-auto rounded-3xl shadow-2xl p-6 bg-white/60 backdrop-blur-2xl border border-white/30">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">👤 Participants</h1>

            <table id="participantTable" class="display w-full text-gray-800 text-sm rounded-xl">
                <thead class="bg-white/40 backdrop-blur-md">
                    <tr>
                        <th>ID</th>
                        <th>Serial</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Hover Preview -->
    <div id="hoverPreview"
        class="hidden absolute bg-white/80 backdrop-blur-lg rounded-xl p-3 shadow-2xl border border-white/40 w-72 transition-all duration-300 transform scale-0">
        <img id="previewImage" src="" alt="Preview Image" class="w-full rounded-md mb-2 shadow-md">
        <video id="previewVideo" class="w-full rounded-md shadow-md" autoplay muted loop></video>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        /* Light Glassmorphism */
        #participantTable tbody tr {
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
        }

        #participantTable tbody tr:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
        }

        .action-btn {
            background: linear-gradient(145deg, #e0f7ff, #b3e5fc);
            color: #0a192f;
            padding: 6px 14px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            border: none;
            transition: all 0.3s;
        }

        .action-btn:hover {
            transform: scale(1.08);
            background: linear-gradient(145deg, #bbdefb, #e3f2fd);
            box-shadow: 0 4px 12px rgba(0, 136, 255, 0.2);
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            const table = $('#participantTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('participants.index') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'serial_number',
                        name: 'serial_number'
                    },
                    {
                        data: 'code_number',
                        name: 'code_number'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                pageLength: 25,
                responsive: true,
                order: [
                    [1, 'asc']
                ]
            });

            const hoverBox = $('#hoverPreview');
            $(document).on('mouseenter', '.action-btn', function(e) {
                const img = $(this).data('img');
                const vid = $(this).data('vid');
                $('#previewImage').attr('src', img);
                $('#previewVideo').attr('src', vid);
                hoverBox.css({
                    top: e.pageY + 15 + 'px',
                    left: e.pageX + 15 + 'px'
                }).removeClass('hidden').addClass('scale-100');
            }).on('mouseleave', '.action-btn', function() {
                hoverBox.addClass('hidden').removeClass('scale-100');
            });
        });
    </script>
@endpush

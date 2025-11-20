@extends('layouts.dashboard_layout')

@section('custom_style')
    <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        /* Upload Area */
        .upload-area {
            border: 2px dashed #17a2b8;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.18s ease, border-color 0.18s ease;
            position: relative;
            overflow: hidden;
        }

        .upload-area.dragover {
            background-color: #e9f7fa;
            border-color: #138496;
        }

        .upload-area .fa-image {
            font-size: 44px;
            color: #17a2b8;
            margin-bottom: 8px;
        }

        .upload-area p {
            margin: 0;
            font-size: 14px;
            color: #6c757d;
        }

        .upload-area input[type="file"] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        #preview {
            margin-top: 20px;
            max-width: 50vw;
            height: auto;
            display: block;
        }

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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Upload New Image</h1>

                                <a href="{{ route('admin.images.index') }}"
                                    class="d-none d-sm-inline-block btn-sm btn-danger shadow-sm">
                                    <i class="fa fa-backward mr-2"></i>Back
                                </a>

                            </div>
                        </div>

                        {!! Form::open(['route' => 'admin.images.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <input type="hidden" name="type" value="hero">

                        <div class="form-group">
                            <label>Link (optional)</label>
                            <input type="url" name="link" class="form-control">
                        </div>


                        {{-- Stylish Active Toggle --}}
                        <div class="form-group mt-3">
                            <label>Activation</label>
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="is_active" id="is_active" checked>
                                <span class="toggle-switch"></span>
                                <i class="fas fa-check-circle toggle-icon" id="toggleIcon"></i>
                            </label>
                        </div>




                        {{-- Drag & Drop File Upload --}}
                        <div class="form-group">
                            <label>Image <small class="text-muted">(Recommended size: 1540×400)</small></label>
                            <div class="upload-area" id="uploadArea">
                                <i class="fas fa-image"></i>
                                <p>Drag & drop your file here or click to browse</p>
                                <input type="file" name="image" id="fileInput" accept="image/*" required>
                            </div><br>
                            <small class="alert alert-warning" role="alert">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                <strong>Warning:</strong> Select an image, activate before uploading, and make sure it is 1540×400 for best display.
                            </small>
                            {{-- <div class="alert alert-warning">
                                <strong>Warning:</strong> Select an image, activate before uploading, and make sure it is 1540×400 for best display.
                            </div> --}}
                            <div class="mt-8 d-flex justify-content-end">
                                <button type="submit" id="uploadBtn" class="btn btn-primary" disabled>Upload</button>
                            </div>
                            <img id="preview" src="{{ asset('assets/img/default.gif') }}" alt="Preview">
                        </div>





                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('fileInput');
            const preview = document.getElementById('preview');
            const isActive = document.getElementById('is_active');
            const uploadBtn = document.getElementById('uploadBtn');
            const toggleIcon = document.getElementById('toggleIcon');
            const defaultImage = "{{ asset('assets/img/default.gif') }}";

            function updateSubmitState() {
                const hasFile = fileInput.files && fileInput.files.length > 0;
                uploadBtn.disabled = !(hasFile && isActive.checked);

                toggleIcon.classList.remove('fa-times-circle', 'fa-check-circle');
                toggleIcon.classList.add(isActive.checked ? 'fa-check-circle' : 'fa-times-circle');
            }

            function previewImage(file) {
                if (!file || !file.type.startsWith('image/')) {
                    preview.src = defaultImage;
                    return;
                }
                const reader = new FileReader();
                reader.onload = e => preview.src = e.target.result;
                reader.readAsDataURL(file);
            }

            fileInput.addEventListener('change', e => {
                previewImage(e.target.files[0]);
                updateSubmitState();
            });

            isActive.addEventListener('change', updateSubmitState);

            // Initialize with default active checked
            updateSubmitState();
        });
    </script>
@endsection
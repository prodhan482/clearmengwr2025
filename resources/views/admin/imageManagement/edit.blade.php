@extends('layouts.dashboard_layout')

@section('custom_style')
    <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        /* Upload/Change Image Area */
        .upload-area {
            border: 2px dashed #17a2b8;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.18s ease, border-color 0.18s ease;
            position: relative;
            overflow: hidden;
            margin-top: 15px;
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

        /* Preview Image */
        #preview,
        .current-thumb {
            display: block;
            margin-top: 15px;
            max-width: 50vw;
            height: auto;
            border-radius: 6px;
            border: 1px solid #ddd;
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

        /* Layout */
        .form-top-row {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-top-row .form-group {
            margin-bottom: 0;
        }

        .btn-bottom {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
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
                            <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Edit Image</h1>
                            <a href="{{ route('admin.images.index') }}"
                                class="d-none d-sm-inline-block btn-sm btn-danger shadow-sm">
                                <i class="fa fa-backward mr-2"></i>Back
                            </a>
                        </div>

                        {!! Form::model($image, ['method' => 'PATCH', 'route' => ['admin.images.update', $image->id], 'enctype' => 'multipart/form-data']) !!}

                        {{-- Current Image --}}
                        <div class="form-group">
                            <label>Current Image</label>
                            <img src="{{ asset('storage/' . $image->image) }}" class="current-thumb">
                        </div>

                        {{-- Top row: Type hidden + Activation toggle --}}
                        <div class="form-top-row">
                            <input type="hidden" name="type" value="{{ $image->type }}">
                            <div class="form-group">
                                <label>Activation</label>
                                <label class="toggle-wrapper">
                                    <input type="checkbox" name="is_active" id="is_active" {{ $image->is_active ? 'checked' : '' }}>
                                    <span class="toggle-switch"></span>
                                    <i class="fas toggle-icon" id="toggleIcon"></i>
                                </label>
                            </div>
                        </div>

                        {{-- Title --}}
                        <div class="form-group mt-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $image->title }}">
                        </div>

                        {{-- Link --}}
                        <div class="form-group">
                            <label>Link (optional)</label>
                            <input type="url" name="link" class="form-control" value="{{ $image->link }}">
                        </div>

                        {{-- Drag & Drop Change Image --}}
                        <div class="form-group">
                            <label>Change Image</label>
                            <div class="upload-area" id="uploadArea">
                                <i class="fas fa-image"></i>
                                <p>Drag & drop your file here or click to browse</p>
                                <input type="file" name="image" id="fileInput" accept="image/*">
                            </div>
                            <div class="btn-bottom">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>






                            <img id="preview" src="{{ asset('assets/img/default.gif') }}" alt="Preview">
                        </div>

                        {{-- <div class="mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" style="width: 40%;">Update</button>
                        </div> --}}
                        {{-- Update button --}}

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
            const uploadArea = document.getElementById('uploadArea');
            const fileInput = document.getElementById('fileInput');
            const preview = document.getElementById('preview');

            // Toggle icon
            function updateToggleIcon() {
                toggleIcon.classList.remove('fa-times-circle', 'fa-check-circle');
                toggleIcon.classList.add(isActive.checked ? 'fa-check-circle' : 'fa-times-circle');
            }
            isActive.addEventListener('change', updateToggleIcon);
            updateToggleIcon();

            // Drag & Drop
            uploadArea.addEventListener('dragover', e => {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });
            uploadArea.addEventListener('dragleave', e => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
            });
            uploadArea.addEventListener('drop', e => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                if (!e.dataTransfer.files || e.dataTransfer.files.length === 0) return;
                fileInput.files = e.dataTransfer.files;
                previewImage(fileInput.files[0]);
            });

            fileInput.addEventListener('change', e => {
                if (e.target.files.length > 0) {
                    previewImage(e.target.files[0]);
                }
            });

            function previewImage(file) {
                if (!file) return;
                const reader = new FileReader();
                reader.onload = e => preview.src = e.target.result;
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
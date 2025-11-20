@extends('layouts.dashboard_layout')

@section('custom_style')
    <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 25px;
            background-color: #ffffff;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        h1.h2 {
            font-weight: 700;
            font-size: 1.8rem;
            color: #17a2b8;
        }

        .image-preview {
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
            border: 1px solid #e1e1e1;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            margin-bottom: 15px;
        }

        .info-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 10px;
        }

        .info-card {
            flex: 1 1 45%;
            background-color: #f1f9fb;
            border-radius: 12px;
            padding: 15px 20px;
            box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.03);
        }

        .info-card h5 {
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-card p {
            margin-bottom: 0;
            color: #6c757d;
            word-break: break-word;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 20px;
            color: #fff;
        }

        .active-badge {
            background-color: #28a745;
        }

        .inactive-badge {
            background-color: #dc3545;
        }

        .fa-icon {
            font-size: 18px;
        }

        #preview {
            margin-top: 20px;
            max-width: 50vw;
            height: auto;
            display: block;
        }

        @media (max-width: 768px) {
            .info-card {
                flex: 1 1 100%;
            }

            .image-preview {
                max-width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-lg-4">
        <div class="row justify-content-center">
            <div class="col-lg-10 mt-4">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="h2 mb-0">Image Details</h1>
                        <a href="{{ route('admin.images.index') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-backward mr-1"></i> Back
                        </a>
                    </div>

                    <div class="row g-4">
                        {{-- Left Column: Image --}}
                        <div id="preview" class="col-md-6 text-center">
                            <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid img-thumbnail"
                                style="max-width: 50vw; height: auto;">
                        </div>

                        {{-- Right Column: Info Cards --}}
                        <div class="col-md-6">
                            <div class="info-section">
                                <div class="info-card">
                                    <h5><i class="fas fa-heading fa-icon"></i> Title</h5>
                                    <p>{{ $image->title }}</p>
                                </div>

                                <div class="info-card">
                                    <h5><i class="fas fa-link fa-icon"></i> Link</h5>
                                    <p>{{ $image->link ?? 'N/A' }}</p>
                                </div>

                                <div class="info-card">
                                    <h5><i class="fas fa-tags fa-icon"></i> Type</h5>
                                    <p>{{ $image->type }}</p>
                                </div>

                                <div class="info-card">
                                    <h5><i class="fas fa-toggle-on fa-icon"></i> Status</h5>
                                    <span class="status-badge {{ $image->is_active ? 'active-badge' : 'inactive-badge' }}">
                                        <i class="fas {{ $image->is_active ? 'fa-check' : 'fa-times' }}"></i>
                                        {{ $image->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        <a href="{{ route('admin.images.edit', $image->id) }}" class="btn btn-primary btn-lg"
                            style="width: 40%;">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
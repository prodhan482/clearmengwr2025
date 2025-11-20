@extends('layouts.dashboard_layout')

@section('custom_style')
    <link href="{{asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
        tr td:last-child {
            width: 18%;
            white-space: nowrap;
            text-align: center;
        }

        th {
            text-align: center
        }

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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Image Management</h1>
                                <a href="{{ route('admin.images.create') }}"
                                    class="d-none d-sm-inline-block btn-sm btn-primary shadow-sm">
                                    <i class="fa fa-upload"></i> Upload New Image
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="col-md-12 mt-4">
                <div class="card py-3">
                    <div class="table-responsive">
                        <table class="table table-striped zero-configuration">
                            <thead>
                                <tr class="text-white font-weight-bold"
                                    style="background: linear-gradient(to right, #ec2F4B, #009FFF);">
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Image</th>
                                    <th>Active?</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $image)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $image->title }}</td>
                                        <td>{{ $image->type }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $image->image) }}" alt="" class="thumb">
                                        </td>
                                        <td>
                                            @if($image->is_active)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ route('admin.images.show', $image->id) }}"
                                                title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('admin.images.edit', $image->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.images.destroy', $image->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
    <script src="{{asset('/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
@endsection
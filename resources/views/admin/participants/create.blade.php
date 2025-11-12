@extends('layouts.app')
@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold mb-4">Add Participant</h1>
        <form method="POST" action="{{ route('admin.participants.store') }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <x-input label="Serial Number" name="serial_number" />
            <x-input label="Code Number" name="code_number" />
            <x-input label="Name" name="name" />
            <x-input label="Email" name="email" />
            <x-input label="Drive Video File ID" name="drive_video_file_id" />
            <x-input label="Drive Image File ID" name="drive_image_file_id" />
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
@endsection

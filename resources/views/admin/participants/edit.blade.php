@extends('layouts.app')
@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold mb-4">Edit Participant</h1>
        <form method="POST" action="{{ route('admin.participants.update', $participant->id) }}"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf @method('PUT')
            <x-input label="Serial Number" name="serial_number" :value="$participant->serial_number" />
            <x-input label="Code Number" name="code_number" :value="$participant->code_number" />
            <x-input label="Name" name="name" :value="$participant->name" />
            <x-input label="Email" name="email" :value="$participant->email" />
            <x-input label="Drive Video File ID" name="drive_video_file_id" :value="$participant->drive_video_file_id" />
            <x-input label="Drive Image File ID" name="drive_image_file_id" :value="$participant->drive_image_file_id" />
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection

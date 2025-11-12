@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Admin Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }} (Admin)</p>
        <div class="mt-6">
            <a href="{{ route('participants.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Manage
                Participants</a>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold mb-4">Manage Participants</h1>
        <a href="{{ route('admin.participants.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">+ Add New</a>


        <table class="min-w-full bg-white border mt-4">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2">Serial</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Code</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($participants as $p)
                    <tr class="border-b">
                        <td class="p-2">{{ $p->serial_number }}</td>
                        <td class="p-2">{{ $p->name }}</td>
                        <td class="p-2">{{ $p->code_number }}</td>
                        <td class="p-2 flex gap-2">
                            <a href="{{ route('admin.participants.edit', $p->id) }}"
                                class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                            <form method="POST" action="{{ route('admin.participants.destroy', $p->id) }}">@csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-2 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="mt-4">{{ $participants->links() }}</div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-6 text-center">Registered Participants</h1>
        <table class="min-w-full bg-white border rounded-xl">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2">Serial</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Code</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($participants as $p)
                    <tr class="border-b">
                        <td class="p-2">{{ $p->serial_number }}</td>
                        <td class="p-2">{{ $p->name }}</td>
                        <td class="p-2">{{ $p->code_number }}</td>
                        <td class="p-2 text-right"><button @click="openModal({{ $p->id }})"
                                class="bg-blue-600 text-white px-3 py-1 rounded">View</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $participants->links() }}</div>
    </div>


    <div x-data="participantModal()" x-init="init()">
        <div x-show="open" class="fixed inset-0 bg-black/50 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-2/3 p-4">
                <h3 class="text-xl font-semibold mb-2" x-text="participant.name"></h3>
                <iframe class="w-full aspect-video rounded" :src="drivePreviewUrl(participant.drive_video_file_id)"
                    frameborder="0" allowfullscreen></iframe>
                <div class="text-right mt-3"><button class="bg-gray-600 text-white px-3 py-1 rounded"
                        @click="close()">Close</button></div>
            </div>
        </div>
    </div>


    <script>
        function participantModal() {
            return {
                open: false,
                participant: {},
                init() {},
                openModal(id) {
                    fetch(`/participants/${id}`).then(r => r.json()).then(j => {
                        this.participant = j;
                        this.open = true
                    });
                },
                close() {
                    this.open = false;
                },
                drivePreviewUrl(id) {
                    return `https://drive.google.com/file/d/${id}/preview`;
                }
            }
        }
    </script>
@endsection

@extends('layouts.app')
@section('content')
    <!-- Hero Section with 3D Animation -->
    <section
        class="relative h-[400px] flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-2">Clearmen Guinness World Record</h1>
            <p class="text-lg">Join the record-breaking event!</p>
        </div>
        <canvas id="hero-canvas" class="absolute inset-0"></canvas>
    </section>


    <!-- Registration Form -->
    <section class="py-10 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-2xl font-semibold mb-4 text-center">Register Now</h2>
            <form action="{{ route('register.store') }}" method="POST"
                class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow">
                @csrf
                <div class="mb-4"><label>Serial Number</label><input type="number" name="serial_number" class="input">
                </div>
                <div class="mb-4"><label>Code Number</label><input type="text" name="code_number" class="input"></div>
                <div class="mb-4"><label>Name</label><input type="text" name="name" class="input"></div>
                <div class="mb-4"><label>Email</label><input type="email" name="email" class="input"></div>
                <div class="mb-4"><label>Google Drive Video File ID</label><input type="text"
                        name="drive_video_file_id" class="input"></div>
                <div class="mb-4"><label>Google Drive Image File ID</label><input type="text"
                        name="drive_image_file_id" class="input"></div>
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Submit</button>
            </form>
        </div>
    </section>


    <!-- Video Grid -->
    <section class="container mx-auto py-10">
        <h2 class="text-2xl font-semibold mb-6 text-center">Highlight Videos</h2>
        <div id="video-grid" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach ($participants->take(4) as $v)
                <iframe class="rounded-lg w-full aspect-video"
                    src="https://drive.google.com/file/d/{{ $v->drive_video_file_id }}/preview" allowfullscreen></iframe>
            @endforeach
        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r152/three.min.js"></script>
    <script>
        const canvas = document.getElementById('hero-canvas');
        const renderer = new THREE.WebGLRenderer({
            canvas,
            alpha: true
        });
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const geometry = new THREE.BoxGeometry();
        const material = new THREE.MeshNormalMaterial();
        const cube = new THREE.Mesh(geometry, material);
        scene.add(cube);
        camera.position.z = 3;

        function animate() {
            requestAnimationFrame(animate);
            cube.rotation.x += 0.01;
            cube.rotation.y += 0.01;
            renderer.setSize(window.innerWidth, 400);
            renderer.render(scene, camera);
        }
        animate();
    </script>
@endsection

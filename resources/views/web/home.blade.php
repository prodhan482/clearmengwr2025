@extends('layouts.web')

@section('title', 'Home | Clear Men Guinness World Records')


@section('content')

    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($images as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image) }}"
                                        class="carousel-image img-fluid d-block w-100"
                                        alt="{{ $image->alt_text ?? 'Hero Image' }}">

                                    {{-- Optional caption --}}
                                    {{--
                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>{{ $image->title }}</h1>
                                        <p>{{ $image->description }}</p>
                                    </div>
                                    --}}
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>







    @guest
        <section class="cta-section section-padding section-bg">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-6 col-12 ms-auto">
                        <h2 class="mb-0" style="font-size: 30px;">
                            Register Below👇 to watch the attempts
                        </h2>



                    </div>

                    <div class="col-lg-5 col-12">
                        <a href="/login" class="me-4">Already a member?</a>

                        <a href="/login" class="custom-btn btn smoothscroll">Login here</a>
                    </div>

                </div>
            </div>
        </section>
    @endguest


    @auth
        <section class="cta-section section-padding section-bg">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-6 col-12 ms-auto">
                        <h2 class="mb-0" style="font-size: 30px;">
                            Hii , {{ Auth::user()->name }}!
                        </h2>
                    </div>

                    <div class="col-lg-5 col-12">
                        <h2 style="font-size: 30px">Click here to view all attempts.</h2>

                        <a href="{{'participants'}}" class="custom-btn btn smoothscroll">
                            G<i class="fas fa-thin fa-futbol" style="animation: bounce 1s infinite;"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>

    @endauth





    @guest
        <section class="volunteer-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12">
                        <h2 class="text-white mb-4">Register Here</h2>

                        <form class="custom-form volunteer-form" action="{{ route('register.create') }}" method="POST"
                            role="form">
                            @csrf

                            <!-- Inputs -->
                            <input type="text" name="name" id="full-name" class="form-control mb-3" placeholder="Full Name"
                                value="{{ old('name') }}" required>

                            <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Email address"
                                value="{{ old('email') }}" required>

                            <input type="password" name="password" id="password" class="form-control mb-3"
                                placeholder="Password (min 4 characters)" minlength="4" required>

                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control mb-3" placeholder="Confirm Password" minlength="4" required>

                            <button type="submit" class="form-control">Submit</button>
                        </form>

                    </div>

                </div>
            </div>
        </section>
    @endguest




    {{-- <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <!-- Section Title -->
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>OFFICIAL ATTEMPTS</h2>
                </div>

                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <!-- Google Drive Video Embed -->
                        <div class="video-wrapper"
                            style="position: relative; padding-bottom: 100%; height: 0; overflow: hidden;">
                            <iframe src="https://drive.google.com/file/d/1zV7shmNpL54DzJR4yQr_lMCSZWwxXKWw/preview"
                                style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border: 0;"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        </div>

                        <div class="custom-block">


                            <a href="" class="custom-btn btn">Name/Any Info</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <div class="video-wrapper"
                            style="position: relative; padding-bottom: 100%; height: 0; overflow: hidden;">
                            <iframe src="https://drive.google.com/drive/folders/1bFBp1RypzFn-7CISRB8ZTsLEIAkoQKFX/preview"
                                style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border: 0;"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        </div>

                        <div class="custom-block">
                            <div class="custom-block">


                                <a href="" class="custom-btn btn">Name</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="custom-block-wrap">
                        <div class="video-wrapper"
                            style="position: relative; padding-bottom: 100%; height: 0; overflow: hidden;">
                            <iframe src="https://drive.google.com/drive/folders/1EAHE-Thc_i80mwea8BTSy7BfouKVWp5m/preview"
                                style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border: 0;"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        </div>

                        <div class="custom-block">


                            <a href="" class="custom-btn btn">Name</a>
                        </div>
                    </div>
                </div>
            </div><br><br><br><br>


            <div class="row">

                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <!-- Google Drive Video Embed -->
                        <div class="video-wrapper"
                            style="position: relative; padding-bottom: 100%; height: 0; overflow: hidden;">
                            <iframe src="https://drive.google.com/file/d/1zV7shmNpL54DzJR4yQr_lMCSZWwxXKWw/preview"
                                style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border: 0;"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        </div>

                        <div class="custom-block">


                            <a href="" class="custom-btn btn">Name/Any Info</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <div class="video-wrapper"
                            style="position: relative; padding-bottom: 100%; height: 0; overflow: hidden;">
                            <iframe src="https://drive.google.com/drive/folders/1bFBp1RypzFn-7CISRB8ZTsLEIAkoQKFX/preview"
                                style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border: 0;"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        </div>

                        <div class="custom-block">
                            <div class="custom-block">


                                <a href="" class="custom-btn btn">Name</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="custom-block-wrap">
                        <div class="video-wrapper"
                            style="position: relative; padding-bottom: 100%; height: 0; overflow: hidden;">
                            <iframe src="https://drive.google.com/drive/folders/1EAHE-Thc_i80mwea8BTSy7BfouKVWp5m/preview"
                                style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border: 0;"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        </div>

                        <div class="custom-block">


                            <a href="" class="custom-btn btn">Name</a>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Show More Button -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="/participants"><button class="btn btn-primary custom-btn">Show More</button></a>
                </div>
            </div>


            <!-- Register to View All -->

        </div>
    </section> --}}




    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Play Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2>OFFICIAL ATTEMPTS</h2>
                </div>
            </div>

            <div class="row g-4">
                @foreach($participants as $participant)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="custom-block-wrap position-relative viewPreview" style="cursor:pointer;"
                            data-id="{{ $participant->drive_video_file_id }}" data-name="{{ $participant->name ?? 'Name' }}"
                            data-type="Video">

                            <!-- Video Thumbnail with Zoom -->
                            <div class="video-wrapper"
                                style="position: relative; padding-bottom: 100%; overflow: hidden; border-radius: 10px;">
                                <iframe src="https://drive.google.com/file/d/{{ $participant->drive_image_file_id }}/preview"
                                    class="video-thumbnail"
                                    style="position: absolute; top:0; left: 0; width: 100%; height: 100%; border: 0; transform: scale(1.3); object-fit: cover;"
                                    allowfullscreen>
                                </iframe>

                                <!-- Hover Play Icon -->
                                <div class="hover-play-icon d-flex justify-content-center align-items-center">
                                    <i class="fas fa-play-circle" style="font-size: 60px; color: rgba(255,255,255,0.8);"></i>
                                </div>
                            </div>

                            <div class="custom-block mt-2 text-center">
                                <a href="javascript:void(0);" class="custom-btn btn">{{ $participant->name ?? 'Name' }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Show More Button -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="/participants">
                        <button class="btn btn-primary custom-btn">Show More</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap 5 Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- modal-xl for larger/resizable -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="fullscreen-iframe-wrapper"
                        style="position:relative;padding-bottom:20%;height:800px;overflow:hidden;">
                        <iframe id="previewIframe" style="position:absolute;top:0;left:10%;width:80%;height:100%;border:0;"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        .hover-play-icon {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.3s;
            background: rgba(0, 0, 0, 0.2);
        }

        .custom-block-wrap:hover .hover-play-icon {
            opacity: 1;
        }

        /* Optional: smooth zoom on hover */
        .video-thumbnail {
            transition: transform 0.3s ease;
        }

        .custom-block-wrap:hover .video-thumbnail {
            transform: scale(1.35);
            /* zoom more on hover */
        }
    </style>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery for click handling -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Modal Script -->
    <script>
        $(document).on("click", ".viewPreview", function () {
            let type = $(this).data("type");
            let id = $(this).data("id");
            let name = $(this).data("name");

            $("#previewTitle").text(`${type} Preview – ${name}`);
            $("#previewIframe").attr("src", `https://drive.google.com/file/d/${id}/preview`);

            // Show modal using Bootstrap 5
            var previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
            previewModal.show();
        });

        // Stop video when modal is closed
        var modalEl = document.getElementById('previewModal');
        modalEl.addEventListener('hidden.bs.modal', function () {
            $("#previewIframe").attr("src", '');
        });
    </script>






    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        // Validation errors
        @if ($errors->any())
            let errorMessages = "";
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}\n";
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Fill up all required fields correctly',
                text: errorMessages,
                confirmButtonColor: '#0cf8c9'
            });
        @endif

        // Success message after registration
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true
            });
        @endif
    </script>

@endsection
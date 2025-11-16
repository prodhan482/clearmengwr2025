


@extends('layouts.web.layouts')

@section('title', 'Home | Clear Men Guinness World Records')

@section('content')

    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/slide/slide1.jpg" class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>be a Kind Heart</h1>

                                    <p>Professional charity theme based on Bootstrap 5.2.2</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="assets/images/slide/slide2.png" class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>Non-profit</h1>

                                    <p>You can support us to grow more</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="assets/images/slide/slide3.jpg" class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>Humanity</h1>

                                    <p>Please tell your friends about our website</p>
                                </div>
                            </div>
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






    <section class="cta-section section-padding section-bg">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-lg-6 col-12 ms-auto">
                    <h2 class="mb-0" style="font-size: 30px;">
                        Register Below👇 to watch the attempts
                    </h2>



                </div>

                <div class="col-lg-5 col-12">
                    <a href="#" class="me-4">Already a member?</a>

                    <a href="#section_4" class="custom-btn btn smoothscroll">Login here</a>
                </div>

            </div>
        </div>
    </section>




    <section class="volunteer-section section-padding" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12">
                    <h2 class="text-white mb-4">Register Here</h2>

                    <form class="custom-form volunteer-form" action="#" method="post" role="form">
                        <!-- Full Name -->
                        <input type="text" name="full-name" id="full-name" class="form-control mb-3"
                            placeholder="Full Name" required>

                        <!-- Phone (Bangladesh valid number) -->
                        <input type="tel" name="phone" id="phone" class="form-control mb-3"
                            placeholder="Phone (e.g., 01XXXXXXXXX)" pattern="01[3-9][0-9]{8}"
                            title="Enter a valid Bangladesh mobile number" required>

                        <!-- Password (min 4 characters) -->
                        <input type="password" name="password" id="password" class="form-control mb-3"
                            placeholder="Password (min 4 characters)" minlength="4" required>

                        <!-- Submit Button -->
                        <button type="submit" class="form-control">Submit</button>
                    </form>

                </div>

                <!-- <div class="col-lg-6 col-12">
                            <img src="images/smiling-casual-woman-dressed-volunteer-t-shirt-with-badge.jpg"
                                class="volunteer-image img-fluid" alt="">

                            <div class="custom-block-body text-center">
                                <h4 class="text-white mt-lg-3 mb-lg-3">About Volunteering</h4>

                                <p class="text-white">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm
                                    tokito Professional charity theme based</p>
                            </div>
                        </div> -->

            </div>
        </div>
    </section>



    <section class="section-padding" id="section_3">
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

            </div>

            <!-- Show More Button -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <button class="btn btn-primary">Show More</button>
                </div>
            </div>

            <!-- Register to View All -->

        </div>
    </section>

@endsection


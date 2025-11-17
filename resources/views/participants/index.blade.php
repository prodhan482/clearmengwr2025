@extends('layouts.web.layouts')

@section('title', 'Home | Clear Men Guinness World Records')

@section('content')

    <div class="p-5">
        <table id="datatable-json" class="table table-striped table-bordered table-hover w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>+1 123-456-7890</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="John Doe"
                            data-images="assets/images/slide/slide1.jpg,assets/images/slide/slide2.png"
                            data-video="https://www.youtube.com/embed/dQw4w9WgXcQ"
                            data-drive="https://drive.google.com/file/d/yourfileid/view">View Attempts</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>+1 987-654-3210</td>
                    <td>
                        <button class="btn btn-primary btn-sm view-attempts" data-name="Jane Smith"
                            data-images="assets/images/slide/slide3.jpg" data-video="https://www.youtube.com/embed/VIDEO_ID"
                            data-drive="https://drive.google.com/file/d/anotherfileid/view">View Attempts</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="attemptsModal" tabindex="-1" aria-labelledby="attemptsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attemptsModalLabel">Attempts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="attemptsImages" class="mb-3 d-flex flex-wrap gap-3"></div>
                    <div class="mb-3">
                        <iframe id="attemptsVideo" width="100%" height="400" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div>
                        <a id="attemptsDrive" href="#" target="_blank" class="btn btn-success">Open Drive Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#datatable-json').DataTable({
                responsive: true
            });

            // Handle View Attempts button click
            $('.view-attempts').click(function () {
                var name = $(this).data('name');
                var images = $(this).data('images').split(',');
                var video = $(this).data('video');
                var drive = $(this).data('drive');

                $('#attemptsModalLabel').text(name + ' - Attempts');

                // Images
                var html = '';
                images.forEach(function (src) {
                    html += `<img src="${src}" class="img-fluid rounded" style="max-height:200px;">`;
                });
                $('#attemptsImages').html(html);

                // Video
                $('#attemptsVideo').attr('src', video);

                // Drive Link
                $('#attemptsDrive').attr('href', drive);

                // Show modal
                var modal = new bootstrap.Modal(document.getElementById('attemptsModal'));
                modal.show();
            });

            // Clear modal content on close
            $('#attemptsModal').on('hidden.bs.modal', function () {
                $('#attemptsImages').html('');
                $('#attemptsVideo').attr('src', '');
                $('#attemptsDrive').attr('href', '#');
            });
        });
    </script>

@endsection
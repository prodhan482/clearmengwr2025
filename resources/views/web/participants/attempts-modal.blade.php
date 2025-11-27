

<div class="modal fade" id="attemptsModal" tabindex="-1" aria-labelledby="attemptsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="attemptsModalLabel">Attempts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    {{-- Image --}}
                    <div class="col-md-6 col-sm-12 mb-3">
                        <iframe id="attemptsImage" class="w-100" style="height:650px;" allowfullscreen>
                        </iframe>
                    </div>

                    {{-- Video --}}
                    <div class="col-md-6 col-sm-12 mb-3">
                        <iframe id="attemptsVideo" class="w-100" style="height:650px;" allowfullscreen>
                        </iframe>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@extends('admin.layouts.master', [
    'page_header' => __('admin.edit'),
])
@section('content')

    <div class="card">
        <div class="" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
            <div style="display: inline-flex; gap:15px;" class="pt-5 ps-5 pe-5">
                <button class="btn btn-danger m-1" id="go-back-button">
                    <i class="fas fa-undo"></i>{{ __('admin.return_to_the_previous_page') }}
                </button>
            </div>
        </div>
        <div class="card-body pt-7">
            <form class="form" method="POST" id="edit-form" action="{{ route($update_route, $record->id) }}"
                enctype="multipart/form-data" data-parsley-validate>
                @method('PUT')
                @csrf
                <div class="d-flex flex-column scroll-y me-n7 pe-7">
                    @yield('form')
                </div>
                <div class="text-center pt-15">
                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit" id="submitBtn"
                        onclick="disableButton(event)">
                        <span class="indicator-label">{{ __('admin.submit') }}</span>
                    </button>
                    <button type="reset" class="btn btn-danger me-3">
                        {{ __('admin.reset_fields') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const goBackButton = document.getElementById('go-back-button');

            goBackButton.addEventListener('click', function(event) {
                event.preventDefault();
                window.history.back();
            });
        });

        function disableButton() {
            // Get a reference to the form and the submit button
            var form = document.getElementById('edit-form');
            var submitBtn = document.getElementById('submitBtn');

            // Disable the button
            submitBtn.disabled = true;
            console.log("Button disabled");

            // Check form validity
            if (form.checkValidity()) {
                form.submit();

                // Set a timeout to re-enable the button after 2 seconds
                setTimeout(function() {
                    submitBtn.disabled = false;
                    console.log("Button re-enabled");
                }, 2000);
            } else {
                // Re-enable the button immediately if form is invalid
                submitBtn.disabled = false;
            }
        }
    </script>
@endpush

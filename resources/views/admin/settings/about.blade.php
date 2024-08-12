@extends('admin.layouts.master', [
    'page_header' => __('admin.edit'),
])
@section('content')
    <!--begin::Repeater-->
    <div class="card">
        <div class="card-body pt-7">
            <div id="about">
                <form action="{{ route('admin.settings.about.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div data-repeater-list="about">
                            @if ($about->isEmpty())
                                <div data-repeater-item>
                                    <div class="form-group row mt-2">
                                        <div class="col-md-3">
                                            <label class="form-label">{{ __('admin.title') }}:</label>
                                            <input type="text" name="title" class="form-control mb-2 mb-md-0"
                                                placeholder="{{ __('admin.title') }}" />
                                        </div>
                                        <div class="col-md-7">
                                            <label class="form-label">{{ __('admin.content') }}:</label>
                                            <input type="text" name="content" class="form-control mb-2 mb-md-0"
                                                placeholder="{{ __('admin.content') }}" />
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:;" data-repeater-delete
                                                class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span><span
                                                        class="path4"></span><span class="path5"></span></i>
                                                {{ __('admin.delete') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @foreach ($about as $item)
                                    <div data-repeater-item>
                                        <div class="form-group row mt-2">
                                            <div class="col-md-3">
                                                <label class="form-label">{{ __('admin.title') }}:</label>
                                                <input type="text" name="title" class="form-control mb-2 mb-md-0"
                                                    placeholder="{{ __('admin.title') }}" value="{{ $item->title }}" />
                                            </div>
                                            <div class="col-md-7">
                                                <label class="form-label">{{ __('admin.content') }}:</label>
                                                <input type="text" name="content" class="form-control mb-2 mb-md-0"
                                                    placeholder="{{ __('admin.content') }}" value="{{ $item->value }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:;" data-repeater-delete
                                                    class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                    <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span
                                                            class="path2"></span><span class="path3"></span><span
                                                            class="path4"></span><span class="path5"></span></i>
                                                    {{ __('admin.delete') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="text-center pt-15">
                        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                            <i class="ki-duotone ki-plus fs-3"></i>
                            {{ __('admin.add') }}
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">{{ __('admin.submit') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('dashboard/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    <script>
        $('#about').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
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

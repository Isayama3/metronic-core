@push('css')
    <link rel="stylesheet" href={{ asset('dashboard/extensions/filepond/filepond.css') }}>
    <link rel="stylesheet"
        href={{ asset('dashboard/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}>
    <link rel="stylesheet" href={{ asset('dashboard/extensions/toastify-js/src/toastify.css') }}>
@endpush
<div class="form-group {{ $errors->has($name) ? 'is-invalid' : '' }}" id="{{ __('admin.' . $name) }}_wrap">
    <label class="mb-1" for="{{ $name }}">{{ __('admin.' . $label) }}</label>
    <input type="file" class="multiple-files-filepond" name="{{ $name }}[]" multiple {{ $required == 'true' ? 'required' : '' }}>
        @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>


@push('scripts')
    <script
        src={{ asset('dashboard/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}>
    </script>
    <script
        src={{ asset('dashboard/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}>
    </script>
    <script src={{ asset('dashboard/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}></script>
    <script
        src={{ asset('dashboard/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}>
    </script>
    <script src={{ asset('dashboard/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}>
    </script>
    <script src={{ asset('dashboard/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}>
    </script>
    <script src={{ asset('dashboard/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}>
    </script>
    <script src={{ asset('dashboard/extensions/filepond/filepond.js') }}></script>
    <script src={{ asset('dashboard/extensions/toastify-js/src/toastify.js') }}></script>
    <script src={{ asset('dashboard/static/js/pages/filepond.js') }}></script>
@endpush

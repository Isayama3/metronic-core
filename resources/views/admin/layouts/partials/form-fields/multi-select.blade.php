@push('styles')
    <link href="{{ asset('dashboard/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

<div class="form-group mb-5 {{ $errors->has($name) ? 'is-invalid' : '' }}">
    <label class="mb-1" for="{{ $name }}">{{ __('admin.' . $label) }}</label>
    <div style="text-align: center;">
        <select class="form-select" id="js-example-basic-single" data-control="select2"
            data-placeholder="Select an option">
            <option></option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
        </select>

    </div>
        @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>
@push('scripts')
    <script>
        $('#js-example-basic-single').select2({
            placeholder: 'Select an option'
        });
    </script>
    <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
@endpush

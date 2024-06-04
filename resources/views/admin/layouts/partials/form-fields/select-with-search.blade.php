@push('styles')
    <!-- Include Select2 CSS -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" /> --}}
@endpush

<div class="form-group {{ $errors->has($name) ? 'is-invalid' : '' }}">
    <label class="mb-1" for="{{ $name }}">{{ __('admin.' . $label) }}</label>
    <div style="text-align: center;">
        <select class="form-select select2" data-control="select2" data-placeholder="Select an option" name="{{ $name }}"
            placeholder="{{ $placeholder ? __('admin.' . $placeholder) : __('admin.' . $label) }}"
            {{ $disabled == true ? 'disabled' : '' }}>
            @foreach ($options ?? [] as $key => $value)
                <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>{{ $value }}
                </option>
            @endforeach
        </select>
    </div>
        @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>

@push('scripts')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JavaScript -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script> --}}
    <script>
        // Initialize Select2
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush

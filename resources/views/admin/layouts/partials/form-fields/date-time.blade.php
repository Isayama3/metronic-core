@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

<div class="mb-5 {{ $errors->has($name) ? 'is-invalid' : '' }}">
    <label for="{{ $name }}" class="form-label">{{ __('admin.' . $label) }}</label>
    <input name="{{ $name }}" class="form-control form-control"
        placeholder="{{ $placeholder ? __('admin.' . $placeholder) : __('admin.' . $label) }}" id="{{ $name }}"
        readonly="readonly" value="{{ $value == null ? old($name) : $value }}"
        {{ $required == 'true' ? 'required' : '' }} {{ $disabled == true ? 'disabled' : '' }}>
    @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#{{ str_replace(['[', ']'], ['\\\\[', '\\\\]'], $name) }}", {
                enableTime: true,
                dateFormat: "Y-m-d H:i"
            });
        });
    </script>
@endpush

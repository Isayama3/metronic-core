<div class="form-group mb-5 {{ $errors->has($name) ? 'is-invalid' : '' }}">
    <label class="mb-2" for="{{ $name }}">{{ __('admin.' . $label) }}</label>
    <input type="number" class="form-control" id="{{ $name }}" name={{ $name }}
        placeholder="{{ $placeholder ? __('admin.' . $placeholder) : __('admin.' . $label) }}" spellcheck="false"
        data-ms-editor="true" {{ $required == 'true' ? 'required' : '' }}
        value="{{ $value == null ? old($name) : $value }}" {{ $disabled == true ? 'disabled' : '' }}>
    @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif

</div>

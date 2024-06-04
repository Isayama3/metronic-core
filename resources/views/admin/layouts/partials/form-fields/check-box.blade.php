<div class="form-group mb-5 {{ $errors->has($name) ? 'is-invalid' : '' }}" id="{{ __('admin.' . $name) }}_wrap">
    <label class="form-label" for="{{ $name }}">{{ __('admin.' . $label) }}</label>

    <div class="row" style="padding-right: 0.8rem;">
        @foreach ($options as $key => $value)
            <div class="form-check mb-3 col-md-2">
                <input class="form-check-input" type="checkbox" value="{{ $key }}" id="{{ $key }}"
                    name="{{ $name }}[]" {{ $disabled == true ? 'disabled' : '' }}
                    {{ in_array($key, old($name, [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $key }}">
                    {{ Str::limit($value, 25) }}
                </label>
            </div>
        @endforeach
    </div>

    @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>

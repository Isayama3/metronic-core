<div class="form-group mb-5 {{ $errors->has($name) ? 'is-invalid' : '' }}">
    <label class="mb-1" for="{{ $name }}">{{ __('admin.' . $label) }}</label>
    <div style="text-align: center;">
        <select class="form-select" data-placeholder="Select an option">
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


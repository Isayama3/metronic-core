<div class="form-group mb-5">
    <label class="mb-1" for="{{ $name }}">{{ __('admin.' . $label) }}</label>
    <textarea class="form-control" id="{{ $name }}" rows="3" spellcheck="false" data-ms-editor="true"
        style="height: 71px;" placeholder="{{ __('admin.' . $label) }}" value="{{ $value ?? old($name) }}"
        placeholder="{{ $placeholder ? __('admin.' . $placeholder) : __('admin.' . $label) }}"
        {{ $disabled == true ? 'disabled' : '' }}></textarea>
    @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>
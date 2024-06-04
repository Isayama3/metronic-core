<div class="form-switch">
    <input onchange="toggleBoolean(this , '{{ $url }}')" name="{{ $name }}"
        class="form-check-input toggle-boolean" type="checkbox" id="flexSwitchCheckDefault"
        {{ $model->$name == 1 || $model->$name == true ? 'checked' : '' }} {{ $disabled }}>
        @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>

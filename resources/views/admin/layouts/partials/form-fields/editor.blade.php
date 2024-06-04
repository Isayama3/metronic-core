<div class="form-group {{ $errors->has($name) ? 'is-invalid' : '' }}" id="{{ __('admin.' . $name) }}_wrap">
    <label for="{{ $name }}">{{ __('admin.' . $label) }}</label>
    <div class="">
        {!! Form::textarea($name, $value, [
            'class' => 'form-control ' . $plugin,
            'id' => $name,
            'placeholder' => $placeholder ? __('admin.' . $placeholder) : __('admin.' . $label),
            'rows' => 10,
        ]) !!}
    </div>
        @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>

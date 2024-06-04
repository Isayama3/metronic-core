<!--begin::Image input placeholder-->
<style>
    .image-input-placeholder {
        background-image: url("{{ asset('dashboard/media/svg/avatars/blank-dark.svg') }}");
    }

    [data-bs-theme="dark"] .image-input-placeholder {
        background-image: url("{{ asset('dashboard/media/svg/avatars/blank-dark.svg') }}");
    }
</style>

<div class="form-group mb-5 {{ $errors->has($name) ? 'is-invalid' : '' }}" id="{{ __('admin.' . $name) }}_wrap">
    {{-- <label class="mb-1" for="{{ $name }}">{{ __('admin.' . $label) }}</label> --}}
    <br>
    <div class="image-input image-input-empty" data-kt-image-input="true">
        <div class="image-input-wrapper w-150px h-150px" style="background-image: url({{ $old_image }})"></div>
        @if (!$disabled)
            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                title="Change avatar">
                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>
                <input type="file" name="{{ $name }}" accept=".png, .jpg, .jpeg" {{ $required }}>
                <input type="hidden" name="{{ $name }}_remove" />
            </label>
        @endif
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel avatar">
            <i class="ki-outline ki-cross fs-3"></i>
        </span>
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove avatar">
            <i class="ki-outline ki-cross fs-3"></i>
        </span>
    </div>
    @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>

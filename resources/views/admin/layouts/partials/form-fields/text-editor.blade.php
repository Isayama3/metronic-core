@push('styles')
    <style>
        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            background-color: var(--bs-body-bg) !important;
        }

        .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
        .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
            border-radius: 0.375rem !important;
            background-color: var(--bs-body-bg) !important;

        }
    </style>
@endpush

<div class="form-group mb-3" id="">
    <label class="mb-1" for="{{ $name }}">{{ __('admin.' . $label) }}</label>
    <div id="editor_{{ $name }}">
        <textarea class="form-control ckeditor" id="{{ $name }}" name="{{ $name }}" rows="3" spellcheck="false"
            data-ms-editor="true" style="height: 71px;" placeholder="{{ __('admin.' . $label) }}"
            {{ $disabled == true ? 'disabled' : '' }}>{{ $value ?? old($name) }}</textarea>
    </div>
        @if ($errors->has($name))
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
            <strong id="{{ $name }}_error">{{ $errors->first($name) }}</strong>
        </div>
    @endif
</div>

@push('scripts')
    <script src="{{ asset('dashboard/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.getElementById('editor_{{ $name }}'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

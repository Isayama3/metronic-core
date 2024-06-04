@extends('admin.layouts.partials.crud-components.create-page')

@section('form')

    @inject('permissionModel', 'Spatie\Permission\Models\Permission')
    @inject('roleModel', 'Spatie\Permission\Models\Role')

    @php
        $permissions = $permissionModel::select('group')->groupBy('group')->get();
    @endphp

    {{ \App\Base\Helper\Field::text(name: 'name', label: 'name', required: 'false', placeholder: 'name') }}
    {{ \App\Base\Helper\Field::text(name: 'description', label: 'description', required: 'false', placeholder: 'description') }}

    <div class="form-group mb-5 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" id="permissions_wrap">
        <label class="form-label mb-1" for="permissions">{{ __('admin.permissions') }}</label>
        <br>
        <div class="mb-3">
            <input type="checkbox" id="selectAll" class="form-check-input">
            <label style="font-size: 15px; font-weight: 600" for="selectAll">{{ __('admin.select_all') }}</label>
        </div>
        @foreach ($permissions as $permission)
            <div class="mb-3">
                <input type="checkbox" class="selectSameGroup form-check-input"
                    id="{{ str_replace(' ', '_', __($permission->group)) }}">
                <label style="font-size: 15px; font-weight: 600"
                    for="{{ str_replace(' ', '_', __($permission->group)) }}">{{ $permission->group . ' - ' . __('admin.select_all') }}</label>
                <div class="row mt-5 ps-2 pe-2 mx-10">
                    @foreach ($permissionModel->where('group', $permission->group)->get() as $value)
                        <div class="form-check mb-3 col-md-2" style="margin: 0px 4px;">
                            <input type="checkbox" id="{{ $value->id }}"
                                class="form-check-input {{ str_replace(' ', '_', __($permission->group)) }}"
                                {{ $roleModel->hasPermissionTo($value) ? 'checked' : '' }} value="{{ $value->id }}"
                                name="permissions[]">
                            <label class="form-check-label"
                                for="{{ $value->id }}">{{ Str::limit($value->name, 25) }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        @if ($errors->has('permissions'))
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                <strong id="permissions_error">{{ $errors->first('permissions') }}</strong>
            </div>
        @endif
    </div>

@stop

@push('scripts')
    <script>
        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
        });

        $(".selectSameGroup").click(function() {
            let group = $(this).attr('id');
            $('.' + group).prop('checked', $(this).prop('checked'));
        });
    </script>
@endpush

@push('styles')
    <style>
        /* Reset Select2 styles */
        .select2 {
            display: block;
            width: 100%;
            padding: 5px;
            margin: 5px 0px;
            font-size: 1.1rem;
            font-weight: 500;
            line-height: 1.5;
            color: var(--bs-gray-700);
            background-color: var(--bs-body-bg);
            background-repeat: no-repeat;
            background-position: left 1rem center;
            background-size: 16px 12px;
            border: 1px solid var(--bs-gray-300);
            border-radius: 0.475rem;
            box-shadow: false;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            appearance: none;
        }

        .select2-selection__placeholder {
            margin: 0px;
        }

        @media (prefers-reduced-motion: reduce) {
            .select2 {
                transition: none;
            }
        }

        /* Optionally, you might want to target specific Select2 elements */
        .select2-container .select2-selection--single {
            background-color: transparent !important;
            border: none !important;
            padding: 0 !important;
            box-shadow: none !important;
            /* Reset other properties as needed */
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: normal !important;
            color: inherit !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-top: 5px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            margin-top: 0px !important;
        }
    </style>
@endpush
@php
    $bank_accounts = App\Models\BankAccount::select('id', 'account_number', 'bank_name')->get();
@endphp

@extends('admin.layouts.partials.crud-components.full-create-page')
@section('form')
    {{ \App\Base\Helper\Field::fileWithPreview(name: 'receipt', label: 'receipt', required: 'true', placeholder: 'receipt') }}
    <hr />

    <div class="row row-cols-md-2">
        {{ \App\Base\Helper\Field::number(name: 'amount', label: 'amount', required: 'true', placeholder: 'amount') }}
        <div class="form-group {{ $errors->has('bank_account_id') ? 'is-invalid' : '' }}">
            <label class="mb-1" for="{{ 'bank_account_id' }}">{{ __('admin.bank_account') }}</label>
            <div style="text-align: center;">
                <select class="form-select select2 select21" data-control="select2"
                    data-placeholder="{{ __('admin.bank_name') . ' - ' . __('admin.account_number') }}"
                    name="{{ 'bank_account_id' }}" required>
                    <option value="" disabled="" selected>
                        {{ __('admin.bank_account') }}
                    </option>
                    @foreach ($bank_accounts ?? [] as $bank_account)
                        <option value="{{ $bank_account['id'] }}">
                            {{ $bank_account['account_number'] . ' - ' . $bank_account['bank_name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('bank_account_id'))
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    <strong id="{{ 'bank_account_id' }}_error">{{ $errors->first('bank_account_id') }}</strong>
                </div>
            @endif
        </div>
    </div>

@stop
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.select2').select2();
        });
    </script>
@endpush

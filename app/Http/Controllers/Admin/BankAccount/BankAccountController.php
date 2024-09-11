<?php

namespace App\Http\Controllers\Admin\BankAccount;

use App\Base\Controllers\BaseWebController;
use App\Http\Controllers\Admin\BankAccount\BankAccountTransactionController;
use App\Http\Requests\Admin\BankAccountRequest as FormRequest;
use App\Models\BankAccount as Model;
use App\Services\BankAccountService as Service;

class BankAccountController extends BaseWebController
{
    protected $BankAccountService;

    public function __construct(
        FormRequest $request,
        Model $model,
        Service $service,
    ) {
        parent::__construct(
            $request,
            $model,
            $service,
            hasDelete: true,
            hasShow: true,
            hasCreate: true,
            hasEdit: true,
            view_path: 'admin.bank-accounts.'
        );

        $this->BankAccountService = $service;
        $this->BankAccountService->setIndexRelations([]);
        $this->BankAccountService->setOneItemRelations(['transactions']);
        $this->BankAccountService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => false,
            'callback' => function ($q) {
            },
        ];
    }

    public function show($id)
    {
        if (!$this->hasShow) {
            return redirect()->back()->with('error', __('admin.show_is_not_allowed'));
        }

        $request = request();
        $request->merge(['filter[bank_account_id]' => $id]);
        return redirect()->action([BankAccountTransactionController::class, 'index'], request()->all());

        $record = $this->service->findOrFail($id, ['transactions', 'transactions.agent', 'transactions.status'], true);
        $transactions = $record->transactions()->paginate(15);
        return view($this->view_path . __FUNCTION__, compact('record', 'transactions'));
    }
}

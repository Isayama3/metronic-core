<?php

namespace App\Http\Controllers\Admin\Wallet;

use App\Base\Controllers\BaseWebController;
use App\Http\Requests\Admin\CollectTicketRequest;
use App\Http\Requests\Admin\WalletTicketRequest as FormRequest;
use App\Models\WalletTicket as Model;
use App\Services\WalletTicketService as Service;

class WalletTicketController extends BaseWebController
{
    protected $WalletTicketService;

    public function __construct(
        FormRequest $request,
        Model $model,
        Service $service,
    ) {
        parent::__construct(
            $request,
            $model,
            $service,
            hasDelete: false,
            hasShow: false,
            hasCreate: false,
            hasEdit: false,
            view_path: 'admin.wallet-tickets.'
        );

        $this->WalletTicketService = $service;
        $this->WalletTicketService->setIndexRelations([]);
        $this->WalletTicketService->setOneItemRelations([]);
        $this->WalletTicketService->setCustomWhen($this->customWhen());
    }

    public function customWhen(): array
    {
        return [
            'condition' => true,
            'callback' => function ($q) {
                if (auth('admin')->user()->role == 'agent') {
                    $q->where('agent_id', auth()->user()->id);
                }
            },
        ];
    }

    public function collectMoney(CollectTicketRequest $request, $id)
    {
        $this->WalletTicketService->collectMoney($request->validated(), $id);
        return redirect()->back()->with('success', __('admin.money_collected_successfully'));
    }

    public function reject($id)
    {
        $this->WalletTicketService->reject($id);
        return redirect()->back()->with('success', __('admin.rejected_successfully'));
    }
}

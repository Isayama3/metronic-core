<?php

namespace App\Services;

use App\Base\Services\BaseService;
use App\Repositories\WalletRepository;

class WalletService extends BaseService
{
    protected WalletRepository $WalletRepository;

    public function __construct(WalletRepository $WalletRepository)
    {
        parent::__construct($WalletRepository);
        $this->WalletRepository = $WalletRepository;
    }

    public function show($id)
    {
        $this->repository->setRelations($this->getOneItemRelations());
        $this->repository->setRelationWithSpecificCount('transactions', 10);
        return $this->repository->findOrFail($id);
    }

    public function checkIfUserExceedsTheWalletLimit()
    {
        $user = auth('user-api')->user()->load('wallet');
        $wallet = $this->WalletRepository->findOrFail($user->wallet->id);

        if ($wallet->balance > 1000) {
            return $this->throwHttpExceptionForWebAndApi(__('main.wallet_limit_exceeded'), 422);
        }
    }

    public function getUserWallet($user_id)
    {
        return $this->WalletRepository->getUserWallet($user_id);
    }
}

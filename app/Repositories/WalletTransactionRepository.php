<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\WalletTransaction;

class WalletTransactionRepository extends BaseRepository
{
    /**
     * WalletTransactionRepository constructor.
     * @param WalletTransaction $model
     */
    public function __construct(WalletTransaction $model)
    {
        parent::__construct($model);
    }

    public function findByRideRequestId($ride_request_id)
    {
        return $this->model->where('ride_request_id', $ride_request_id)->first();
    }

    public function getLastRideRequestWalletTransaction($ride_request_id)
    {
        return $this->model->where('ride_request_id', $ride_request_id)->orderBy('id', 'desc')->first();
    }

    public function findAllByStatus($status)
    {
        return $this->model->where('status_id', $status)->get();
    }

    public function updateStatus(array $ids, $status)
    {
        $this->model->whereIn('id', $ids)->update(['status_id' => $status]);
    }
}

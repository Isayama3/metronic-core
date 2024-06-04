<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\Country;

class CountryRepository extends BaseRepository
{
    /**
     * CountryRepository constructor.
     * @param Country $model
     */
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }
}

<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\Language;

class LanguageRepository extends BaseRepository
{
     /**
     * LanguageRepository constructor.
     * @param Language $model
     */
    public function __construct(Language $model)
    {
        parent::__construct($model);
    }

}



<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\Contact;

class ContactUsRepository extends BaseRepository
{
     /**
     * ContactUsRepository constructor.
     * @param Contact $model
     */
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }

}



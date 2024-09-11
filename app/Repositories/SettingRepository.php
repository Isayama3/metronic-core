<?php

namespace App\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Models\Setting;

class SettingRepository extends BaseRepository
{
    /**
     * SettingRepository constructor.
     * @param Setting $model
     */
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    public function whereKey($key)
    {
        return $this->model->where('key', $key)->get();
    }

    public function whereTitle($title)
    {
        return $this->model->where('title', $title)->first();
    }

    public function whereKeyAndTitle($key, $title)
    {
        return $this->model->where('key', $key)->where('title', $title)->first();
    }

    public function updateManyByKey($data, $key)
    {
        $this->model->where('key', $key)->delete();

        foreach ($data ?? [] as $value) {
            $this->model->create([
                'key' => $key,
                'title' => $value['title'],
                'value' => $value['content'],
            ]);
        }
        return $this->model->where('key', $key)->get();
    }

    public function updateMainConfig($data)
    {
        $main_config = $this->model->where('key', 'main_config')->get();
        foreach ($data as $key => $value) {
            $main_config->where('title', $key)->first()->update(['value' => $value]);
        }
    }
}

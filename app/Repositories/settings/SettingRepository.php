<?php

namespace App\Repositories\Settings;

use App\Models\Setting;
use App\Models\Socialmedia;
use App\Repositories\BaseRepository;
use App\Contracts\Settings\SettingContract;

class SettingRepository extends BaseRepository implements SettingContract
{
    public function __construct(Setting $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function updateSetting(array $params)
    {
        $collection = collect($params)->except('_token', 'logo', 'favicon');

        $setting = Setting::first()->fill($collection->all());
        return $setting->update() ? $setting : false;
    }

    public function updateSocialMedia(array $params)
    {
        $collection = collect($params)->except('_token');

        $socialMedia = Socialmedia::first()->fill($collection->all());
        return $socialMedia->update() ? $socialMedia : false;
    }
}

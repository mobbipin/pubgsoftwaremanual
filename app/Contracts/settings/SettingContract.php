<?php

namespace App\Contracts\Settings;

interface SettingContract
{
    public function updateSetting(array $params);
    public function updateSocialMedia(array $params);
}

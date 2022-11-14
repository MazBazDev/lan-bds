<?php

use RyanChandler\LaravelJsonSettings\Facades\Settings;

if (!function_exists('createSettings')) {
    function createSettings(array $settings)
    {   
        foreach($settings as $key => $value) {
            Settings::set($key, $value, true);
        }
    }
}

if (!function_exists('setting')) {
    function setting(string $setting, $default = null)
    {   
        return Settings::get($setting, $default);
    }
}
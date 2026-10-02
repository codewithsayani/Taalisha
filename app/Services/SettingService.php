<?php
namespace App\Services;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService {
    public function get(string $key, $default = null) {
        return Cache::rememberForever('setting_' . $key, function () use ($key, $default) {
            $setting = Setting::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }
    public function set(string $key, $value): void {
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget('setting_' . $key);
    }
}
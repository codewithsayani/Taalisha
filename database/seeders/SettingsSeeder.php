<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Talisha Software',
            'site_tagline' => 'Transforming Ideas into Digital Reality',
            'contact_email' => 'hello@talishasoftware.tech',
            'contact_phone' => '+1 (555) 123-4567',
            'address' => '123 Tech Lane, Innovation City',
            'footer_text' => '© 2026 Talisha Software. All rights reserved.',
            'hero_title' => 'Building the Future of Software',
            'hero_subtitle' => 'We create enterprise-grade applications with a focus on design and performance.',
            'hero_primary_cta' => 'Our Services',
            'hero_secondary_cta' => 'Contact Us',
            'homepage_seo_title' => 'Talisha Software - Custom Software Development',
            'homepage_seo_description' => 'Talisha Software provides top-tier custom software development, mobile apps, and web solutions.',
        ];

        foreach ($settings as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}

<?php

$migrationsDir = __DIR__ . '/database/migrations/';
$modelsDir = __DIR__ . '/app/Models/';
$enumsDir = __DIR__ . '/app/Enums/';
if (!is_dir($enumsDir)) mkdir($enumsDir, 0755, true);

// Enums
$enums = [
    'ServiceStatus' => ['draft' => 'draft', 'published' => 'published'],
    'IndustryStatus' => ['draft' => 'draft', 'published' => 'published'],
    'CaseStudyStatus' => ['draft' => 'draft', 'published' => 'published'],
    'ArticleStatus' => ['draft' => 'draft', 'published' => 'published'],
    'JobStatus' => ['open' => 'open', 'closed' => 'closed', 'draft' => 'draft'],
    'JobApplicationStatus' => ['new' => 'new', 'reviewing' => 'reviewing', 'shortlisted' => 'shortlisted', 'interview' => 'interview', 'rejected' => 'rejected', 'hired' => 'hired'],
    'ContactInquiryStatus' => ['new' => 'new', 'in_progress' => 'in_progress', 'contacted' => 'contacted', 'qualified' => 'qualified', 'closed' => 'closed', 'spam' => 'spam'],
    'ContactInquiryPriority' => ['low' => 'low', 'medium' => 'medium', 'high' => 'high'],
    'TestimonialStatus' => ['pending' => 'pending', 'approved' => 'approved', 'rejected' => 'rejected'],
    'NewsletterStatus' => ['subscribed' => 'subscribed', 'unsubscribed' => 'unsubscribed'],
];

foreach ($enums as $name => $cases) {
    $content = "<?php\n\nnamespace App\Enums;\n\nenum {$name}: string\n{\n";
    foreach ($cases as $key => $val) {
        $content .= "    case " . strtoupper($key) . " = '{$val}';\n";
    }
    $content .= "}\n";
    file_put_contents($enumsDir . $name . '.php', $content);
}

// Policies, Services, Requests
$dirs = ['app/Policies', 'app/Services', 'app/Http/Requests/Admin', 'app/Http/Requests/Public', 'app/Http/Controllers/Admin', 'app/Http/Controllers/Public', 'app/Http/Controllers/Auth'];
foreach ($dirs as $dir) {
    if (!is_dir(__DIR__ . '/' . $dir)) mkdir(__DIR__ . '/' . $dir, 0755, true);
}

// MediaStorageService
$mediaService = <<<EOT
<?php
namespace App\Services;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MediaStorageService {
    public function storePublic(UploadedFile \$file, string \$path): string {
        \$filename = Str::random(40) . '.' . \$file->getClientOriginalExtension();
        return \$file->storeAs(\$path, \$filename, 'public');
    }
    public function storePrivate(UploadedFile \$file, string \$path): string {
        \$filename = Str::random(40) . '.' . \$file->getClientOriginalExtension();
        return \$file->storeAs(\$path, \$filename, 'private');
    }
    public function delete(string \$path, string \$disk = 'public'): void {
        if (Storage::disk(\$disk)->exists(\$path)) {
            Storage::disk(\$disk)->delete(\$path);
        }
    }
}
EOT;
file_put_contents(__DIR__ . '/app/Services/MediaStorageService.php', $mediaService);

$settingService = <<<EOT
<?php
namespace App\Services;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService {
    public function get(string \$key, \$default = null) {
        return Cache::rememberForever('setting_' . \$key, function () use (\$key, \$default) {
            \$setting = Setting::where('key', \$key)->first();
            return \$setting ? \$setting->value : \$default;
        });
    }
    public function set(string \$key, \$value): void {
        Setting::updateOrCreate(['key' => \$key], ['value' => \$value]);
        Cache::forget('setting_' . \$key);
    }
}
EOT;
file_put_contents(__DIR__ . '/app/Services/SettingService.php', $settingService);

// We won't generate the 20 migrations fully here to save space, but we'll modify DatabaseSeeder and tests.
echo "Foundations generated.\n";

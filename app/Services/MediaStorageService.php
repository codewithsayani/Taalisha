<?php
namespace App\Services;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MediaStorageService {
    public function storePublic(UploadedFile $file, string $path): string {
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($path, $filename, 'public');
    }
    public function storePrivate(UploadedFile $file, string $path): string {
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($path, $filename, 'private');
    }
    public function delete(string $path, string $disk = 'public'): void {
        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }
}
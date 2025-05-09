<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService
{
    public function storeCourrier(UploadedFile $file, $reference)
    {
        $fileName = $reference . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        return Storage::disk('courriers')->putFileAs('', $file, $fileName);
    }

    public function moveToArchive($filePath)
    {
        if (Storage::disk('courriers')->exists($filePath)) {
            $content = Storage::disk('courriers')->get($filePath);
            Storage::disk('archives')->put($filePath, $content);
            Storage::disk('courriers')->delete($filePath);
            return true;
        }
        return false;
    }

    public function getFile($path, $disk = 'courriers')
    {
        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->get($path);
        }
        return null;
    }
}

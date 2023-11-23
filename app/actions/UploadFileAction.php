<?php

declare(strict_types=1);

namespace App\actions;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadFileAction
{
    public function execute(UploadedFile $file, ?string $path = null): string
    {
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $timestamp = now()->format('YmdHis');

        $fileName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $timestamp . '.' . $extension;

        $filePath = $path ? $path . '/' : '/';

        return Storage::disk('s3')->putFileAs($filePath, $file, $fileName);
    }
}

<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class PublicImageStorage
{
    public function store(UploadedFile $image, string $directory): string
    {
        $extension = $image->guessExtension();

        if (! $extension) {
            throw new RuntimeException('Unable to determine the uploaded image file type.');
        }

        $baseName = Str::limit(
            Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)),
            100,
            ''
        ) ?: 'image';
        $disk = Storage::disk('public');
        $fileName = $baseName.'.'.$extension;
        $suffix = 2;

        while ($disk->exists($directory.'/'.$fileName)) {
            $fileName = $baseName.'-'.$suffix.'.'.$extension;
            $suffix++;
        }

        $path = $image->storeAs($directory, $fileName, 'public');

        if (! $path) {
            throw new RuntimeException('The uploaded image could not be stored.');
        }

        return $path;
    }
}

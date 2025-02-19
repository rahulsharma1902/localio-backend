<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    public function uploadMedia(UploadedFile $file, string $directory = 'uploads'): Media
    {
        $filePath = $file->store($directory, 'public');
        $fileName = basename($filePath);
        return Media::create([
            'dir_path' => $directory,
            'file_name' => $fileName,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
        ]);
    }

    public function getMediaById(int $id): ?Media
    {
        return Media::find($id);
    }

    public function deleteMedia(int $id): bool
    {
        $media = Media::find($id);
        if ($media) {
            Storage::disk('public')->delete($media->dir_path . '/' . $media->file_name);
            return $media->delete();
        }
        return false;
    }

    public function getMediaUrl(Media $media): string
    {
        return Storage::disk('public')->url($media->dir_path . '/' . $media->file_name);
    }

}


?>

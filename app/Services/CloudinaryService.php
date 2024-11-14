<?php

namespace App\Services;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class CloudinaryService{

    public static function uploadImage($image, string $folder = 'default'){
        try{
            $path = $image instanceof UploadedFile ? $image->getRealPath() : $image;
            $result = Cloudinary::upload($path, [
                'folder' => $folder,
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ]);
            return $result->getSecurePath();
        }catch(Exception $e){
           Log::error('Erreur cloudinary upload ' . $e->getMessage());
           return null;
        }
    }
}
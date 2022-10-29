<?php
namespace App\Services;

class Media {
    public static function upload($media,$dir)
    {
        $newMediaName = $media->hashName();
        $media->move(public_path("images\{$dir}"),$newMediaName);
        return $newMediaName;
    }

    public static function delete($mediaPath)
    {
        if(file_exists($mediaPath)){
            unlink($mediaPath);
            return true;
        }
        return false;
    }
}

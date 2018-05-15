<?php
/**
 *
 */
namespace App\evaLib\Services;
use Storage;

class GoogleFiles
{
    public function doSomethingUseful()
    {
        return 'Output from DemoOne';
    }

    /**
     * Stores a file in remote storage service returning url
     *
     * @param [type] $filePost
     * @return void
     */
    public function storeFile($filePost)
    {
        if (!$filePost) {
            return '';
        }
        //debug         //$entityBody = file_get_contents('php://input');
        $disk = Storage::disk('gcs');      
        $hola = $disk->put('evius/events', $filePost);
        Storage::disk('gcs')->setVisibility($hola, 'public');
        return 'https://storage.googleapis.com/herba-images/'.$hola;
    }
}

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
     * @param file $fileContent, this param is the file content,
     * You can get more information at "https://github.com/Superbalist/laravel-google-cloud-storage"
     * @return void
     */
    public function storeFile($fileContent, $fileName = '')
    {

        if (!$fileContent) {
            return '';
        }

        if (empty($fileName)) {
            $fileName = time() . ".png";
        }

        $path = 'evius/events/' . $fileName;

        //debug         //$entityBody = file_get_contents('php://input');
        $disk = Storage::disk('gcs');

        if (!is_object($fileContent)) {
            $file = $disk->put($path, $fileContent);
            $url = $disk->url($path);
            Storage::disk('gcs')->setVisibility($path, 'public');
            return $url;
        } else {
            $hola = $disk->put('evius/events', $fileContent);
            Storage::disk('gcs')->setVisibility($hola, 'public');
            return 'https://storage.googleapis.com/eviusauth.appspot.com/' . $hola;
        }

    }
}

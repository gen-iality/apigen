<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\evaLib\Services\GoogleFiles;

class FilesController extends Controller
{


/**
 * Uploads provided file though HTTPFile and returns full file URL.
 * default field_name(key) for the file is file but it could be changed using 
 * additional parameter field_name to reference file using another field_name
 * HTTPFile could be just one file on multiple files, 
 * for one file this function returns  a string with the url
 * for multiple files It returns an array of URLS.
 *
 * @param Request $request
 * @param string $field_name 
 * @param GoogleFiles $gfService 
 * @return string of file uploaded url  or  array of urls for multiple files
 */
    public function upload(Request $request,string $field_name = null, GoogleFiles $gfService)
    {   //@debug post $entityBody = file_get_contents('php://input');
        $imgurls = [];
       
        //valor por defecto de campo que contiene el archivo
        $field_name = ($field_name)?$field_name:"file";

        //No viene ningun archivo
        if (!$request->hasFile($field_name)){
            return "";
        }
        $files = $request->file($field_name);

        //convertimos un solo elemento a array
        $files = is_array($files)?$files:[$files];

        foreach ($files as $file) {
            $imgurls[] = $gfService->storeFile($file);
        }
        
        //devolvemos una cadena o un arreglo segun sea el caso
        return (count($imgurls)>1)?$imgurls:reset($imgurls);
        
    }    
}

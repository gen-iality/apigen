<?php

namespace App\Http\Controllers;

use App\SharePhoto;
use Illuminate\Http\Request;

class SharePhotoController extends Controller
{
    
    public function index()
    {
        $share_photos = SharePhoto::all();
        return response()->json($share_photos);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $data = $request->json()->all();
        $share_photo = new SharePhoto($data);
        $share_photo->save();
        
        return response()->json($share_photo, 201);
    }

    
    public function show($share_photo)
    {
        $share_photo = SharePhoto::findOrFail($share_photo);

        return $share_photo;
    }
    
    public function update(Request $request, $share_photo)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $data = $request->json()->all();
        $share_photo = SharePhoto::findOrFail($share_photo);
        $share_photo->update($data);
        
        return response()->json($share_photo, 200);
    }

    
    public function destroy($share_photo)
    {
        $share_photo = SharePhoto::findOrFail($share_photo);
        $share_photo->delete();

        return response()->json([], 204);
    }
}

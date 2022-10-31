<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\Event;
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
            'event_id' => 'required|string',
        ]);

        $event = Event::where('_id', $request->event_id)->first();

        if(isset($event->dynamics)){
            $dynamics = $event->dynamics;
            $dynamics["share_photo"] = true;
        }else{
            $dynamics["share_photo"] = true;
        }
        $event->dynamics = $dynamics;
        $event->save();

        $data = $request->json()->all();
        $share_photo = new SharePhoto($data);
        $share_photo->save();

        return response()->json($share_photo, 201);
    }

    public function SharePhotobyEvent(string $event_id)
    {
        $share_photo = SharePhoto::where('event_id', $event_id)->first();
        return $share_photo;
    }

    public function show($share_photo)
    {
        $share_photo = SharePhoto::findOrFail($share_photo);

        return $share_photo;
    }

    public function update(Request $request, $share_photo)
    {
        $data = $request->json()->all();
        $share_photo = SharePhoto::findOrFail($share_photo);
        $share_photo->update($data);

        return response()->json($share_photo, 200);
    }

    public function addOnePost(Request $request, SharePhoto $share_photo)
    {
        $request->validate([
            'event_user_id' => 'required|string',
            'image' => 'required|string',
            'thumb' => 'required|string',
            'title' => 'required|string',
        ]);

        $data = $request->json()->all();
        $user_exist = Attendee::where('event_id', $share_photo->event_id)
            ->where('_id', $data['event_user_id'])
            ->first();

        if (!isset($user_exist)) {
            return response()->json(['error' => 'User not found'], 404);
        }

        //validacion de que el usuario no haya compartido antes
        if(isset($share_photo->posts)){
            foreach($share_photo->posts as $post){
                if($post['event_user_id'] == $data['event_user_id']){
                    return response()->json(['error' => 'User already posted'], 404);
                }
            }
        }

        $posts = isset($share_photo->posts) ? $share_photo->posts : [];

        $data['id'] = uniqid('');
        $data['user_name'] = $user_exist->properties['names'];
        $data['picture'] = $user_exist->user->picture ? $user_exist->user->picture : null;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['likes'] = [];

        array_push($posts, $data);
        $share_photo->posts = $posts;
        $share_photo->save();

        return response()->json($share_photo, 200);
    }

    public function removePost(SharePhoto $share_photo, $post_id)
    {
        $posts = isset($share_photo->posts) ? $share_photo->posts : [];
        $new_posts = [];
        foreach ($posts as $post) {
            if ($post['id'] != $post_id) {
                array_push($new_posts, $post);
            }
        }
        $share_photo->posts = $new_posts;
        $share_photo->save();

        return response()->json($share_photo, 200);
    }

    public function addOneLike(Request $request, SharePhoto $share_photo, $post_id)
    {
        $request->validate([
            'event_user_id' => 'required|string',
        ]);

        $data = $request->json()->all();

        $data['created_at'] = date('Y-m-d H:i:s');
        $postsCopy = [];

        foreach ($share_photo->posts as $post) {
            if ($post['id'] == $post_id) {
                $likes = isset($post['likes']) ? $post['likes'] : [];
                //Validacion de que el usuario no haya dado like antes al mismo post
                foreach($likes as $like){
                    if($like['event_user_id'] == $data['event_user_id']){
                        return response()->json(['error' => 'User already liked'], 404);
                    }
                }
                array_push($likes, $data);
                $post['likes'] = $likes;
                array_push($postsCopy, $post);
            } else {
                array_push($postsCopy, $post);
            }
        }
        $share_photo->posts = $postsCopy;
        $share_photo->save();
        return response()->json($share_photo, 200);
    }

    public function unlike(Request $request, SharePhoto $share_photo, $post_id)
    {
        $request->validate([
            'event_user_id' => 'required|string',
        ]);

        $postsCopy = [];
        $likesCopy = [];

        foreach ($share_photo->posts as $post) {
            if ($post['id'] == $post_id) {
                foreach ($post['likes'] as $like) {
                    if ($like['event_user_id'] != $request->event_user_id) {
                        array_push($likesCopy, $like);
                    }
                }
                $post['likes'] = $likesCopy;
                array_push($postsCopy, $post);
            } else {
                array_push($postsCopy, $post);
            }
        }
        $share_photo->posts = $postsCopy;
        $share_photo->save();
        return response()->json($share_photo, 200);
    }

    public function destroy($share_photo)
    {

        $share_photo = SharePhoto::findOrFail($share_photo);
        $event = Event::where('_id', $share_photo->event_id)->first();
        if(isset($event->dynamics)){
            $dynamics = $event->dynamics;
            $dynamics["share_photo"] = false;
        }else{
            $dynamics["share_photo"] = false;
        }
        $event->dynamics = $dynamics;
        $event->save();
        $share_photo->delete();

        return response()->json([], 204);
    }
}

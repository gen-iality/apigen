<?php

namespace App\Http\Controllers;

use App\PreviewLanding;
use Illuminate\Http\Request;
use App\Http\Resources\PreviewResource;

class PreviewLandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $previews = PreviewLanding::all();
        return response()->json($previews);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'index' => 'required|numeric',
            'name' => 'required|string',
            'status' => 'required|boolean',
            'event_id' => 'required|string'
        ]);

        $data = $request->json()->all();
        $preview = new PreviewLanding($data);
        $preview->save();

        return response()->json($preview, 201);
    }

    /**
     * AddonbyUser_: search of Addons by user.
     * 
     * @urlParam user required  user_id
     *
     */
    public function PreviewsbyEvent(string $event_id)
    {
        return PreviewResource::collection(
            PreviewLanding::where('event_id', $event_id)
                ->latest()
                ->paginate(config('app.page_size'))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PreviewLanding  $preview
     * @return \Illuminate\Http\Response
     */
    public function show($preview)
    {
        $preview = PreviewLanding::findOrFail($preview);

        return $preview;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PreviewLanding  $preview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $preview)
    {
        $data = $request->json()->all();
        $preview  = PreviewLanding::findOrFail($preview);
        $preview->fill($data);
        $preview->save();

        return response()->json($preview);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PreviewLanding  $preview
     * @return \Illuminate\Http\Response
     */
    public function destroy($preview)
    {
        $preview = PreviewLanding::findOrFail($preview);
        $preview->delete();

        return response()->json([], 204);
    }
}

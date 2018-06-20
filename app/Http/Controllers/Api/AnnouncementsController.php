<?php

namespace App\Http\Controllers\Api;

use App\Announcement;
use App\AnnouncementType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnnouncementResource;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\AnnouncementResource
     */
    public function index(Request $request)
    {
        $query = Announcement::query();

        if ($request->has('current')) {
            $query->current();
        }

        if (request()->has('page')) {
            return AnnouncementResource::collection(
                $query->paginate(request('per_page', 15))
            );
        }

        return AnnouncementResource::collection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\AnnouncementResource
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'message' => ['required', 'string'],
            'type' => ['required', 'string', Rule::in(array_values(AnnouncementType::toArray()))],
            'published_at' => ['required', 'date_format:Y-m-d H:i:s'],
            'expires_at' => ['required', 'date_format:Y-m-d H:i:s', 'after:published_at'],
        ]);

        return new AnnouncementResource(Announcement::publish($data, $request->user()));
    }

    /**
     * Display the specified resource.
     *
     * @param  Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return new AnnouncementResource($announcement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'message' => ['required', 'string'],
            'type' => ['required', 'string', Rule::in(array_values(AnnouncementType::toArray()))],
            'expires_at' => ['required', 'date_format:Y-m-d H:i:s'],
        ]);

        $announcement->update($data);

        return new AnnouncementResource($announcement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return response()->json(null, 204);
    }
}

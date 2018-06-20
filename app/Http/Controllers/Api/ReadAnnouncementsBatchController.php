<?php

namespace App\Http\Controllers\Api;

use App\Announcement;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnnouncementResource;

class ReadAnnouncementsBatchController extends Controller
{
    public function store()
    {
        request()->validate([
            'announcement_ids' => ['required', 'array']
        ]);

        $announcements = Announcement::whereIn('id', request('announcement_ids'))->get();

        return AnnouncementResource::collection($announcements->each->markAsRead());
    }
}

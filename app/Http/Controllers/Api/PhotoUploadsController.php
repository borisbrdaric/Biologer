<?php

namespace App\Http\Controllers\Api;

use App\UploadedPhoto;
use App\Http\Requests\PhotoUpload;
use App\Http\Controllers\Controller;

class PhotoUploadsController extends Controller
{
    /**
     * Store uploaded photo.
     *
     * @param  \App\Http\Requests\PhotoUpload  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PhotoUpload $request)
    {
        return $request->process();
    }

    /**
     * Delete uploaded photo.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($photo)
    {
        abort_unless(UploadedPhoto::exists($photo), 404);

        UploadedPhoto::delete($photo);

        return response()->json(null, 204);
    }
}

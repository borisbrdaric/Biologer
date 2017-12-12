<?php

namespace App\Http\Controllers\Admin;

use App\FieldObservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendingObservationsController extends Controller
{
    public function index()
    {
        return view('admin.pending-observations.index');
    }

    public function edit($id)
    {
        $pendingObservation = FieldObservation::pending()->findOrFail($id);

        return view('admin.pending-observations.edit', [
            'observation' => $pendingObservation,
        ]);
    }
}
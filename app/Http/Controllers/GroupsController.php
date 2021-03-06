<?php

namespace App\Http\Controllers;

use App\ViewGroup;

class GroupsController extends Controller
{
    /**
     * Display page to browse groups.
     *
     * @return \Illuminate\Http\View
     */
    public function index()
    {
        return view('groups.index', [
            'rootGroups' => ViewGroup::roots()->with('groups')->get(),
        ]);
    }
}

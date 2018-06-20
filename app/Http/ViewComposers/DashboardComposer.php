<?php

namespace App\Http\ViewComposers;

use App\Announcement;
use Illuminate\View\View;

class DashboardComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('announcements', Announcement::latest()->current()->get());
    }
}

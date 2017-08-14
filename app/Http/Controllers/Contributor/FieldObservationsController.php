<?php

namespace App\Http\Controllers\Contributor;

use App\Comment;
use App\FieldObservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Forms\NewFieldObservationForm;

class FieldObservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create']);
    }

    /**
     * Add new observation.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewFieldObservationForm $form)
    {
        $form->save();

        return redirect('/contributor/field-observations');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('field-observations.create');
    }
}

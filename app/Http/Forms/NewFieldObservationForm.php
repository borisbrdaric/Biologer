<?php

namespace App\Http\Forms;

use App\License;
use App\Rules\Day;
use App\Observation;
use App\Rules\Month;
use App\FieldObservation;
use Illuminate\Support\Facades\DB;
use App\DynamicFields\DynamicField;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DynamicField as DynamicFieldValidation;
use Illuminate\Validation\Rule;

class NewFieldObservationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'taxon_id' => 'nullable|exists:taxa,id',
            'taxon_suggestion' => 'nullable|string|max:255',
            'year' => 'bail|required|date_format:Y|before_or_equal:now',
            'month' => [
                'bail',
                'nullable',
                new Month($this->input('year')),
            ],
            'day' => [
                'bail',
                'nullable',
                new Day($this->input('year'), $this->input('month')),
            ],
            'latitude' => 'required|numeric|between:-90,90',
            'longitude'=> 'required|numeric|between:-180,180',
            'elevation'=> 'required|integer|max:10000',
            'accuracy' => 'required|integer',
            'source' => 'nullable|string',
            'data_license' => ['nullable', Rule::in(License::getIds())],
            'image_license' => ['nullable', Rule::in(License::getIds())],
            'photos' => [
                'nullable',
                'array',
                'max:'.config('biologer.photos_per_observation'),
            ],
            'dynamic_fields.*' => [
                'bail',
                'nullable',
                new DynamicFieldValidation(FieldObservation::dynamicFields())
            ],
        ];
    }

    /**
     * Store observation and related data.
     *
     * @return \App\Observation
     */
    public function save()
    {
        return tap($this->createObservation(), function ($observation) {
            if ($comment = trim($this->input('comment'))) {
                $observation->observation->addNewComment($comment);
            }

            $observation->addPhotos(
                $this->input('photos', []),
                $this->input('image_license') ?: $this->user()->settings()->get('image_license')
            );
        });
    }

    /**
     * Create observation.
     *
     * @return \App\Observation
     */
    protected function createObservation()
    {
        $fieldObservation = FieldObservation::create([
            'source' => $this->input('source') ?: $this->user()->full_name,
            'license' => $this->input('data_license') ?: $this->user()->settings()->get('data_license'),
            'taxon_suggestion' => $this->input('taxon_suggestion', null),
            'dynamic_fields' => $this->input('dynamic_fields', []),
        ]);

        $fieldObservation->observation()->create([
            'taxon_id' => $this->input('taxon_id', null),
            'year' => $this->input('year'),
            'month' => $this->input('month', null),
            'day' => $this->input('day', null),
            'location' => $this->input('location'),
            'latitude' => $this->input('latitude'),
            'longitude' => $this->input('longitude'),
            'mgrs10k' => mgrs10k($this->input('latitude'), $this->input('longitude')),
            'accuracy' => $this->input('accuracy'),
            'elevation' => $this->input('elevation'),
            'created_by_id' => auth()->user()->id,
        ]);

        return $fieldObservation;
    }
}

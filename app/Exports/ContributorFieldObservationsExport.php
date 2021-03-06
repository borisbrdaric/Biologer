<?php

namespace App\Exports;

use App\Export;

class ContributorFieldObservationsExport extends FieldObservationsExport
{
    /**
     * Database query to get the data for export.
     *
     * @param  \App\Export  $export
     * @return \Illuminate\Database\Query\Builder
     */
    protected function query(Export $export)
    {
        return parent::query($export)->createdBy($export->user);
    }
}

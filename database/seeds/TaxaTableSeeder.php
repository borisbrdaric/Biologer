<?php

use App\Taxon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TaxaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = __DIR__.'/data/'.snake_case(config('biologer.territory')).'_taxa.sql';

        if (Taxon::count() === 0 && File::exists($file)) {
            DB::unprepared(File::get($file));

            Taxon::rebuildAncestry();
        }
    }
}

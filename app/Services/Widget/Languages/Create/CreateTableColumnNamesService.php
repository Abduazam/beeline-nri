<?php

namespace App\Services\Widget\Languages\Create;

use App\Models\Area\Area\AreaTranslation;
use App\Models\Area\Branch\BranchTranslation;
use App\Models\Area\Region\RegionTranslation;
use App\Models\Widget\TableColumnName;
use Illuminate\Support\Facades\DB;

class CreateTableColumnNamesService
{
    public function __construct(protected string $slug)
    {
        $this->createTableColumnNames($this->slug);
    }

    private function createTableColumnNames(string $slug): void
    {
        $this->addDefaultColumnsLanguage($slug);
        $this->addDefaultBranches($slug);
        $this->addDefaultRegions($slug);
        $this->addDefaultAreas($slug);
    }

    /**
     * Private function to add automatic data to database => then it should convert to jobs or tasks.
     */
    private function addDefaultColumnsLanguage($slug): void
    {
        $tables = TableColumnName::query()->select('table_name')
            ->whereNotIn('table_name', function ($query) use ($slug) {
                $query->select('table_name')
                    ->from('table_column_names')
                    ->where('locale', '=', $slug);
            })
            ->distinct()
            ->get();

        if (count($tables) > 0) {
            foreach ($tables as $table) {
                $columns = DB::select("SHOW COLUMNS FROM $table->table_name");

                foreach ($columns as $column) {
                    TableColumnName::create([
                        'locale' => $slug,
                        'table_name' => $table->table_name,
                        'column_name' => $column->Field
                    ]);
                }
            }
        }
    }

    private function addDefaultBranches($slug): void
    {
        $translations = BranchTranslation::query()->select('branch_id')->groupBy('branch_id')->get();
        foreach ($translations as $translation) {
            BranchTranslation::create([
                'branch_id' => $translation->branch_id,
                'locale' => $slug
            ]);
        }
    }

    private function addDefaultRegions($slug): void
    {
        $translations = RegionTranslation::query()->select('region_id')->groupBy('region_id')->get();
        foreach ($translations as $translation) {
            RegionTranslation::create([
                'region_id' => $translation->region_id,
                'locale' => $slug
            ]);
        }
    }

    private function addDefaultAreas(string $slug): void
    {
        $translations = AreaTranslation::query()->select('area_id')->groupBy('area_id')->get();
        foreach ($translations as $translation) {
            AreaTranslation::create([
                'area_id' => $translation->area_id,
                'locale' => $slug
            ]);
        }
    }
}

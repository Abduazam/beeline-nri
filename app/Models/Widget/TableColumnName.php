<?php

namespace App\Models\Widget;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableColumnName extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'locale',
        'table_name',
        'column_name',
        'translation',
    ];

    public static function getColumnTranslation($table, $column)
    {
        $translation = TableColumnName::where('table_name', $table)
            ->where('column_name', $column)
            ->where('locale', App::getLocale())
            ->first();

        if ($translation && $translation->translation !== null) {
            return $translation->translation;
        }

        return ucfirst($column);
    }
}

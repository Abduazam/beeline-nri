<?php

namespace App\Models\Widget;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TextName extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'locale',
        'translation',
    ];

    public static function getTextTranslation($key)
    {
        $translation = TextName::where('key', $key)
            ->where('locale', App::getLocale())
            ->first();

        if ($translation && $translation->translation !== null) {
            return $translation->translation;
        }

        return $key;
    }
}

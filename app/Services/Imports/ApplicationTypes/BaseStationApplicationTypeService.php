<?php

namespace App\Services\Imports\ApplicationTypes;

use App\Helpers\Helper;
use App\Models\Data\ApplicationType\ApplicationType;
use App\Models\Data\ApplicationType\ApplicationTypeTranslation;

class BaseStationApplicationTypeService
{
    public function __construct(protected string $name) { }

    public function findOrCreate()
    {
        $app_type = ApplicationTypeTranslation::where('name', 'like', "%$this->name%")->first();
        if ($app_type) {
            return $app_type->type;
        } else {
            $translation = Helper::transliterate($this->name);

            $new_app_type = ApplicationType::create([
                'aim' => strtolower($translation),
                'for' => 'base-station',
            ]);

            ApplicationTypeTranslation::create([
                'application_type_id' => $new_app_type->id,
                'locale' => app()->getLocale(),
                'name' => $this->name
            ]);

            return  $new_app_type;
        }
    }
}

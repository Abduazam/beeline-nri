<?php

namespace App\Services\Widget\Languages\Delete;

use Exception;
use App\Models\Widget\TextName;
use App\Models\Widget\Language;
use Illuminate\Support\Facades\App;
use App\Models\Widget\TableColumnName;
use Illuminate\Support\Facades\Session;
use App\Models\Area\Area\AreaTranslation;
use App\Models\Area\Region\RegionTranslation;
use App\Models\Area\Branch\BranchTranslation;

class DeleteService
{
    public function delete(Language $language): bool|Exception
    {
        try {
            if (App::getLocale() === $language->slug) {
                $defaultLanguage = Language::query()->first();
                App::setLocale($defaultLanguage->slug);
                Session::put('locale', $defaultLanguage->slug);
            }

            if ($language->trashed()) {
                $this->forceDeleteLanguageTranslations($language->slug);

                $language->forceDelete();

                return false;
            } else {
                $language->delete();

                return true;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    private function forceDeleteLanguageTranslations($slug): void
    {
        TextName::where('locale', $slug)->delete();
        TableColumnName::where('locale', $slug)->forceDelete();
        BranchTranslation::where('locale', $slug)->forceDelete();
        RegionTranslation::where('locale', $slug)->forceDelete();
        AreaTranslation::where('locale', $slug)->forceDelete();
    }
}

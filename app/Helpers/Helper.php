<?php

namespace App\Helpers;

use App\Models\BaseStations\BaseStationDiapasons\BaseStationDiapason;
use Illuminate\Support\Facades\File;

class Helper
{
    public static function checkImage($image, $folder, $model = null)
    {
        if (isset($image)) {
            if (isset($model?->image) and File::exists(public_path('storage/' . $model?->image))) {
                unlink(storage_path('app/public/' . $model->image));
            }

            return $image->store($folder, 'public');
        }

        return null;
    }

    public static function anyKeyIsEmpty($array): bool
    {
        foreach ($array as $key => $value) {
            if (!isset($value)) {
                return true;
            }
        }

        return false;
    }

    public function decimalToDegree($value): string
    {
        $degrees = floor(abs($value));

        $minutes_decimal = (abs($value) - $degrees) * 60;
        $minutes = floor($minutes_decimal);

        $seconds = number_format(($minutes_decimal - $minutes) * 60, 1);

        $degree_coordinates = "{$degrees} {$minutes} {$seconds}";
        return $degree_coordinates;
    }

    public function degreeToDecimal(array $data, string $key): float
    {
        $degrees = $data[$key]['degree'];
        $minutes = $data[$key]['minute'];
        $seconds = $data[$key]['second'];

        $decimal = number_format($degrees + ($minutes / 60) + ($seconds / 3600), 6);
        return $decimal;
    }

    public static function transliterate($string): string
    {
        $translate = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'Kh', 'Ц' => 'Ts', 'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Shch',
            'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        ];

        return strtr($string, $translate);
    }

    public static function getBandAndTechnology(?string $bands, ?string $technologies, mixed $number = null): array
    {
        $return = [];

        $explodedTechs = explode("/", $technologies);
        foreach ($explodedTechs as $explodedTech) {
            if ($bands != "") {
                $explodeByN = explode("\n", $bands);
                if (count($explodeByN) >= 1) {
                    for ($i = 0; $i < count($explodeByN) - 1; $i++) {
                        $explodedB = explode(" ", $explodeByN[$i]);
                        if (array_key_exists(1, $explodedB)) {
                            $band =  str_replace('(', '', $explodedB[1]);
                        }

                        $return[$explodedTech][] = $band;
                    }
                }
            } else {
                $numbers = explode(',', $number);

                foreach ($numbers as $num) {
                    $bsd = BaseStationDiapason::where('number', $num)->first();
                    if ($bsd) {
                        $return[$explodedTech][] = $bsd->diapason->band;
                    }
                }
            }
        }

        return $return;
    }

}

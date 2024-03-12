<?php

namespace App\Models;

class Helper
{
    public static function jins($val = null)
    {
        $result = [
          '1' => 'Erkak',
          '2' => 'Ayol',
        ];
        return $val != null ? $result[$val] : $result;
    }
    public static function maqom($val = null)
    {
        $result = [
          '1' => 'Band ishlaydi',
          '2' => 'Ishsiz',
          '3' => 'Nafaqaxo\'r',
          '4' => 'Talaba',
        ];
        return $val != null ? $result[$val] : $result;
    }
    public static function xizmat($val = null)
    {
        $result = [
          '1' => 'Oddiy murojaat',
          '2' => 'Mulk huquqini tasdiqlovchi sertifikat berish',
          '3' => 'Mulk huquqini tasdiqlovchi davlat orderini berish',
        ];
        return $val != null ? $result[$val] : $result;
    }
    public static function tad($val = null)
    {
        $result = [
          '1' => 'Yo\'q',
          '2' => 'Ha',
        ];
        return $val != null ? $result[$val] : $result;
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class Appeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'fio',
        'hudud_id',
        'tuman_id',
        'manzil',
        'email',
        'tel',
        'tad',
        'tadname',
        'jins',
        'tugilgan',
        'maqom',
        'files',
        'xizmat',
        'vitext',
        'status',
        'generated_code',
    ];

    public const STATUS_NEW = 1;
    public const STATUS_IN_PROGRESS = 2;
    public const STATUS_COMPLETED = 3;

    public static function status($index = null)
    {
        $result = [
            self::STATUS_NEW => "<span class='btn btn-secondary'>Murojaatlar bilan ishlash bo'limida</span>",
            self::STATUS_IN_PROGRESS => "<span class='btn btn-primary'>Ko'rib chiqilmoqda</span>",
            self::STATUS_COMPLETED => "<span class='btn btn-successy'>Yopilgan</span>",
        ];
        return $index != null ? $result[$index] : $result;
    }

    public function hudud()
    {
        return $this->hasOne(Region::class, 'id', 'hudud_id');
    }
    public function tuman()
    {
        return $this->hasOne(Region::class, 'id', 'tuman_id');
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::parse($value)->locale('uz_UZ')->translatedFormat('j F Y'),
        );
    }
}

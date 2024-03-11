<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function region()
    {
        return $this->hasOne(Region::class);
    }
}

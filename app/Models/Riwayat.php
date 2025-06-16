<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $fillable = [
        'user_id',
        'input_text',
        'summary',
        'verdict',
        'related_articles',
    ];

    protected $casts = [
        'related_articles' => 'array',
    ];
}

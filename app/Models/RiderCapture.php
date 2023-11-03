<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderCapture extends Model
{
    use HasFactory;

    protected $table = 'rider_captures';
    protected $casts = [
        'lat' => 'decimal',
        'long' => 'decimal',
        'capture_time' => 'timestamp'
    ];

    protected $guarded = [];

    public function rider(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Rider::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = ['rota_id', 'driver_id', 'van_id', 'start_time', 'end_time', 'description',
    'clock_in_time', 'clock_out_time', 'clock_in_location', 'clock_out_location', 'clock_in_ip', 'clock_out_ip'];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function rota(): BelongsTo
    {
        return $this->belongsTo(Rota::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function van(): BelongsTo
    {
        return $this->belongsTo(Van::class);
    }
}

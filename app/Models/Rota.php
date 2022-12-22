<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rota extends Model
{
    use HasFactory;

    protected $fillable = ['date'];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function shifts(): HasMany
    {
        return $this->hasMany(Shift::class);
    }

    protected $casts = [
        'date' => 'datetime',
    ];
}

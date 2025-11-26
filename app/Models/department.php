<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'photo_path',
        'block_id',
        'hod_id', 
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(rooms::class);
    }

    public function block(): BelongsTo
    {
        return $this->belongsTo(block::class);
    }

    public function hod(): BelongsTo
    {
        return $this->belongsTo(employee::class, 'hod_id', 'id');
    }
}
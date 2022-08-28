<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mod extends Model
{
    use HasFactory;

    protected $fillable = ['name','auto_id'];

    public function auto(): BelongsTo
    {
        return $this->belongsTo(Auto::class);
    }

    public function date(): HasMany
    {
        return $this->hasMany(Date::class);
    }
}

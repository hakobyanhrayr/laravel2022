<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = ['brand'];

    /**
     * @return HasMany
     */
    public function mod(): HasMany
    {
        return $this->hasMany(Mod::class);
    }

}

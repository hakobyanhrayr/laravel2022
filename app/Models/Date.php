<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['date','mod_id'];
    public function auto(): BelongsTo
    {
        return $this->belongsTo(Auto::class);
    }
}

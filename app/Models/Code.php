<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'code',
        'user_id',
        'title',
    ];

    public function visits(): HasMany
    {
        return $this->hasMany(CodesVisit::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Morilog\Jalali\Jalalian;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function fa_created_at(): string
    {
        $date = $this->created_at;
        $date = Jalalian::fromDateTime($date)->format('%A, %d %B %Y');
        return $date;
    }

    public function fa_updated_at(): string
    {
        $date = $this->updated_at;
        $date = Jalalian::fromDateTime($date)->format('%A, %d %B %Y');
        return $date;
    }
}

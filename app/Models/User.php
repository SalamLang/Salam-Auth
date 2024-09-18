<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Morilog\Jalali\Jalalian;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function is_admin(): bool
    {
        return $this->role_id === 1;
    }

    public function is_user(): bool
    {
        return $this->role_id === 2;
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function codes(): HasMany
    {
        return $this->hasMany(Code::class);
    }

    public static function getProfilePhotoUrlAttribute(): null
    {
        return null;
    }

    public function codes_visits(): HasMany
    {
        return $this->hasMany(CodesVisit::class);
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

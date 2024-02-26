<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasActiveScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static search()
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasActiveScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function scopeSearch(Builder $query): void
    {
        $query->when(request()->filled('q'), fn($query) => $query
            ->where('first_name', 'like', '%' . request('q') . '%')
            ->orWhere('last_name', 'like', '%' . request('q') . '%')
            ->orWhere('email', 'like', '%' . request('q') . '%')
        );

    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->first_name . ' ' . $this->last_name,
        );
    }

    public function email(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => strtoupper($value)
        );
    }

    public function firstName(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucfirst($value)
        );
    }

}

<?php

namespace App\Models;

use App\Traits\HasActiveScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static searchTitle()
 */
class Post extends Model
{
    use HasFactory;
    use HasActiveScope;

//    protected $fillable = [
//        'title' ,
//        'description' ,
//        'user_id'
//    ];
    protected $guarded = [];

//    protected $hidden = [
//        'created_at',
//        'updated_at'
//    ];

//    protected $visible = [
//        'title',
//        'description',
//        'slug',
//        'image'
//    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeSearchTitle(Builder $query): void
    {
        $query->when(request()->filled('qt'),
            fn($query) => $query->where('title', 'like', '%' . request('qt') . '%'));

    }

    public function scopeSearchDescription(Builder $query): void
    {
        $query->when(request()->filled('qd'),
            fn($query) => $query->where('description', 'like', '%' . request('qd') . '%'));

    }

    public function scopeActive(Builder $query): Builder
    {
        $query->where('is_active', true);
        return $query;
    }
}

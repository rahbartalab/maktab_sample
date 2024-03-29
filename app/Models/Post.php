<?php

namespace App\Models;

use App\Traits\HasActiveScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    protected $with = [
//        'user'
    ];

    // region relation
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    // endregion

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

    public function scopeTagFilter(Builder $query): void
    {
        $query
            ->when(request()->filled('tag'), function (Builder $query) {
                $query->whereHas('tags', fn(Builder $query) => $query->where('tags.id', request('tag')));
            });

    }

    public function scopeUserFilter(Builder $query): void
    {
        $query->when(request()->filled('user'), function (Builder $query) {
            $query->where('user_id', request('user'));
        });
    }
}

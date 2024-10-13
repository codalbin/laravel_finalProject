<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder ;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id',
        'tag_id',
    ];

    protected $with = ['answers'];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    public function user(): BelongsTo { // Can access to the user from the question
        return $this->belongsTo(User::class) ;
    }

    public function tag(): BelongsTo {
        return $this->belongsTo(Tag::class) ;
    }

    public function scopeFilter(Builder $query, array $filters): void {
        $query->when(
            $filters['search'] ?? false, 
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        ) ;
        
        $query->when(
            $filters['tag'] ?? false,
            fn($query, $tag) =>
            $query->whereHas('tag', fn($query) => $query->where('slug', $tag))
        ) ;

        $query->when(
            $filters['user'] ?? false,
            fn($query, $user) =>
            $query->whereHas('user', fn($query) => $query->where('username', $user))
        ) ;
    }

}

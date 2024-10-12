<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'body'
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
    
    public function user(): BelongsTo { // Can access to the user from the question
        return $this->belongsTo(User::class) ;
    }
}

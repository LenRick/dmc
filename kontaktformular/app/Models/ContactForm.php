<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'user_id',
        'category_id',
    ];

    /**
     * Get the user that owns the ContactForm
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category of the ContactForm.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

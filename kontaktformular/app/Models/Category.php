<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    /**
     * Get the contact forms for the category.
     */
    public function contactForms(): HasMany
    {
        return $this->hasMany(ContactForm::class);
    }
}

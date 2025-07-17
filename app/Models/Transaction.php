<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    //
    protected $fillable = [
        'name',
        'category_id',
        'date_transaction',
        'amount',
        'note',
        'image',
    ];
    // belongs to category > categories
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // create scope for expense transactions
    public function scopeExpense($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expense', true);
        });
    }

    public function scopeIncome($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expense', false);
        });
    }
}

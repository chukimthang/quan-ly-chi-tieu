<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;

class Expense extends Model
{
    protected $table = 'expenses';

    protected $fillable = ['name', 'price', 'description', 'category_id', 
        'user_id'];

    public function scopeFilterByCategory($query, $categoryId)
    {
        return $categoryId != 0 ? $query->where('category_id', $categoryId) : 
            $query->orderBy('id', 'desc');
    }

    public function scopeFilterCategoryDate($query, $categoryId, 
        $start, $finish)
    {
        if ($categoryId != 0) {

            return $query->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $finish)
                ->where('category_id', $categoryId);
        }

        return $query->whereDate('created_at', '>=', $start)
            ->whereDate('created_at', '<=', $finish);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

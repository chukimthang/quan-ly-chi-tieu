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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expense;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}

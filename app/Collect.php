<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $table = 'collects';

    protected $fillable = ['price', 'description'];

    public function scopeFilterDate($query, $start, $finish)
    {
        return $query->whereDate('created_at', '>=', $start)
            ->whereDate('created_at', '<=', $finish);
    }
}

<?php

namespace App\Models;

use App\Models\Statistic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;

    public function statistics()
    {
        return $this->hasMany(Statistic::class) ;
    }
}

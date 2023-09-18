<?php

namespace App\Models;

use App\Models\Link;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statistic extends Model
{
    use HasFactory; 

    public function links()
    {
        return $this->belongsTo(Link::class) ;
    }
}

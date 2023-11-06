<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipPlotting extends Model
{
    use HasFactory;

    public function berkasplotting()
    {

        return $this->belongsTo(BerkasPloting::class, 'ploting_id', 'id');
    }
}

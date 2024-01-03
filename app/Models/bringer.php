<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bringer extends Model
{
    use HasFactory;
    protected $table = "bringerlist";
    protected $primaryKey = "bid";
}

?>
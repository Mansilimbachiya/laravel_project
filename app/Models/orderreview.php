<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderreview extends Model
{
    use HasFactory;
    protected $table = "orderreview";
    protected $primaryKey = "reviewid";
}

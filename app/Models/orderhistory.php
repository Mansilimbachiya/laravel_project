<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderhistory extends Model
{
    use HasFactory;
    protected $table = "orderhistory";
    protected $primaryKey = "orderhistoryid";
}

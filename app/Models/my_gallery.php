<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class my_gallery extends Model
{
    use HasFactory;
    protected $table = "my_gallery";
    protected $primaryKey = "gid";
}

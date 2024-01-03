<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockcarrier extends Model
{
    use HasFactory;
    protected $table = "stockcarrier";
    protected $primaryKey = "scid";
}

?>

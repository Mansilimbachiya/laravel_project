<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userlist extends Model
{
    use HasFactory;
    protected $table = 'userlist';
    protected $primaryKey = 'uid';
}

?>

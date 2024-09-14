<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodesVisit extends Model
{
    use HasFactory;

    protected $fillable = ['user_ip', 'user_agent', 'code_id', 'user_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class manage extends Model
{
    protected $table = 'manage';
    use HasFactory;
    public $timestamps = false;
}

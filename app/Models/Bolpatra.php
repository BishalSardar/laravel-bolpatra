<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolpatra extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'pdf', 'desc', 'start_date', 'ending_date'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=[
        'title',
        'task_date',
        'task_time',
        'task_location',
        'task_tag',
        'username'
    ];
}

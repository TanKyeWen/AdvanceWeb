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
        'tag_id',
        'username'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}

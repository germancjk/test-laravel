<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskRelCategory extends Model
{
    use HasFactory;

    protected $fillable = ['task_id', 'category_id'];
}

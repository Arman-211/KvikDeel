<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($id)
 * @method static create(array $validated)
 * @method static find(\Illuminate\Routing\Route|object|string|null $taskId)
 * @method static get()
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable =[
        'title' ,
        'description' ,
        'status',
        'due_date',
    ];
}

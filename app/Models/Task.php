<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'task_priority_id' ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($task) {

            if($task->task_priority_id != 3)
            {
                Task::where('task_priority_id', '!=', 3)->increment('task_priority_id');
            }


        });
    }

    /**
     * Get the priority associated with the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function priority()
    {
        return $this->belongsTo(TaskPriority::class, 'task_priority_id', 'id');
    }
}

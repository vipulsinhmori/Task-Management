<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
// use App\Models\TaskStatus;
use App\Models\User;

class Task extends Model
{
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function time()
    {
        return now()->format('H:i:s'); // Or your custom logic
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

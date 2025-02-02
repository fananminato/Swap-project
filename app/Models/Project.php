<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'user_id',
        'title',
        'details',
        'funding',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function projectUser()
    {
        return $this->hasMany(ProjectUser::class, 'project_id');
    }

    public function projectAssistants()
    {
        return $this->belongsToMany(User::class, 'project_users', 'project_id', 'user_id');
    }
}

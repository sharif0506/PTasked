<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    public function projects()
    {
        return $this->belongsToMany(Project::class)
            ->using(ProjectProjectGroup::class)
            ->withTimestamps();
    }

}

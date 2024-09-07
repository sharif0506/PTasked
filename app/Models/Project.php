<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    public function projectGroups()
    {
        return $this->belongsToMany(ProjectGroup::class)
            ->using(ProjectProjectGroup::class)
            ->withTimestamps();
    }
}

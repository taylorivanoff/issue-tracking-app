<?php

namespace App\Models;

use App\Models\Issue;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
		'name', 'description'
	];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}

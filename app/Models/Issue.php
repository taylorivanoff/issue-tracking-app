<?php

namespace App\Models;

use App\Models\IssueState;
use App\Models\Project;
use App\Models\States\Done;
use App\Models\States\InProgress;
use App\Models\States\Open;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class Issue extends Model
{
	use HasStates;

    protected $fillable = [
        'title', 'description', 'type', 'project_id'
    ];

	protected function registerStates(): void
    {
        $this
            ->addState('status', IssueState::class)
            ->default(Open::class)
            ->allowTransition(Open::class, InProgress::class)
            ->allowTransition(InProgress::class, Done::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

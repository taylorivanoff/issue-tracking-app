<?php

namespace App\Models\States;

use App\Models\IssueState;

class InProgress extends IssueState
{

    public function status(): string
    {
        return 'In Progress';
    }

    public function color(): string
    {
        return 'warning';
    }
}

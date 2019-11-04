<?php

namespace App\Models\States;

use App\Models\IssueState;

class Open extends IssueState
{
    public function status(): string
    {
        return 'Open';
    }

    public function color(): string
    {
        return 'danger';
    }
}
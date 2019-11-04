<?php

namespace App\Models\States;

use App\Models\IssueState;

class Done extends IssueState
{

    public function status(): string
    {
        return 'Done';
    }

    public function color(): string
    {
        return 'success';
    }
}
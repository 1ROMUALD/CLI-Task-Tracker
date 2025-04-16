<?php

class Task
{
    public $taskID;
    public $taskName;
    public $status;

    public function __construct($taskID, $taskName, $status)
    {
        $this->taskID = $taskID;
        $this->taskName = $taskName;
        $this->status = $status;
    }
}

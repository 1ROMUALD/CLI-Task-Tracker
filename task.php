<?php

class Task
{
    public $taskID;
    public $taskName;
    public $status;
    public $created_at;

    public function __construct($taskID, $taskName, $status)
    {
        $this->taskID = $taskID;
        $this->taskName = $taskName;
        $this->status = $status;
        $this->created_at = date('Y-m-d H:i:s');
    }

    /**
     * Get the value of taskID
     */ 
    public function getTaskID()
    {
        return $this->taskID;
    }

    /**
     * Set the value of taskID
     *
     * @return  self
     */ 
    public function setTaskID($taskID)
    {
        $this->taskID = $taskID;

        return $this;
    }

    /**
     * Get the value of taskName
     */ 
    public function getTaskName()
    {
        return $this->taskName;
    }

    /**
     * Set the value of taskName
     *
     * @return  self
     */ 
    public function setTaskName($taskName)
    {
        $this->taskName = $taskName;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
}

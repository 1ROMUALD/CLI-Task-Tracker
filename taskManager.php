<?php

class TaskManager
{
    private $tasksFile = 'tasks.json';

    /*Load tasks from the JSON file */
    private function loadTasks()
    {
        return json_decode(file_get_contents($this->tasksFile, true));
    }

    /* Save tasks to the JSON file */
    private function saveTasks($tasks)
    {
        file_put_contents($this->tasksFile, json_encode($tasks, JSON_PRETTY_PRINT));
    }


    /** Logic for adding a task */
    public function addTask($taskName) {
        
    }

    /** Logic for updating a task */
    public function updateTask($taskID, $newTaskName) {}

    /**Logic for deleting a task */
    public function deleteTask($taskID) {}

    /**Logic for marking task in progress */
    public function markInProgress($taskID) {}

    /**Logic for marking task as done */
    public function markDone($taskID) {}

    /**Logic for listing tasks */
    public function listTasks($status = null) {}
}

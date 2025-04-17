<?php
require_once 'task.php';

class TaskManager
{
    private $tasksFile = 'tasks.json';

    /*Load tasks from the JSON file */
    private function loadTasks()
    {
        if (!file_exists($this->tasksFile)) {
            echo "file doesn't exist \n";
            return [];
        }

        $content = file_get_contents($this->tasksFile);

        $tasks = json_decode($content, true);

        // Fallback in case JSON is invalid //Usefull when the file is empty
        if (!is_array($tasks)) {
            return [];
        }
        return $tasks;
    }

    /* Save tasks to the JSON file */
    private function saveTasks($tasks)
    {
        file_put_contents($this->tasksFile, json_encode($tasks, JSON_PRETTY_PRINT));
    }


    /**
     * Logic for adding a task
     *
     * @param  string $taskName
     * @param  string $taskStatus
     * @return void
     */
    public function addTask($description)
    {
        $status = 'todo';
        $tasks = $this->loadTasks();
        $id = count($tasks) + 1;
        $tasks[] = new Task(
            $id,
            $description,
            $status
        );
        $this->saveTasks($tasks);
        echo "Task added successfully (ID : $id) \n";
    }

    /**
     * Logic for updating a task
     *
     * @param  int $taskID
     * @param  string $newTaskName
     * @param  string $newTaskStatus
     * @return void
     */
    public function updateTask($taskID, $newTaskName = null, $newTaskStatus = null)
    {
        $tasks = $this->loadTasks();
        $found = false;
        //$task is a copy of the array element, not a reference. So the changes you're making don't affect the original $tasks array.
        // To fix this, you need to add a reference (&) in the foreach loop:
        foreach ($tasks as &$task) {
            if ($task['taskID'] == $taskID) {
                $newTaskName != " " ? $task['taskName'] = $newTaskName : null;
                $newTaskStatus != " " ? $task['status'] = $newTaskStatus : null;
                $found = true;
                // print_r($task);
                break;
            }
        }
        unset($task); // Important to avoid unintended reference issues
        if ($found) {
            $this->saveTasks($tasks);
            echo "Task $taskID updated. \n";
        } else {
            echo "Task $taskID not found.\n";
        }
    }

    /**
     * Logic for deleting a task 
     *
     * @param  int $taskID
     * @return void
     */
    public function deleteTask($taskID)
    {
        $tasks = $this->loadTasks();
        $filtered = array_filter($tasks, fn($task) => $task['taskID'] != $taskID);
        if (count($filtered) === count($tasks)) {
            echo "Task $taskID not found. \n";
            return;
        }

        //reindex IDs // don't know yet what is this for
        $filtered = array_values(array_map(function ($task, $taskID) {
            $task['taskID'] = $taskID + 1;
            return $task;
        }, $filtered, array_keys($filtered)));

        $this->saveTasks($filtered);
        echo "Taks $taskID deleted. \n";
    }

    /**Logic for marking task in progress */
    public function markInProgress($taskID)
    {
        $status = "In progress";
    }

    /**Logic for marking task as done */
    public function markDone($taskID)
    {
        $status = "Done";
    }

    /**
     * Logic for listing tasks
     *
     * @param  string $taskStatus Optionnal
     * @return void
     */
    // public function listTasks($taskStatus = null)
    // {
    //     $tasks = $this->loadTasks();
    //     if (empty($tasks)) {
    //         echo "No tasks found.\n";
    //         return;
    //     }
    //     foreach ($tasks as $task) {
    //         $formatedTask = new Task($task['taskID'], $task['taskName'], $task['status']);
    //         echo "\"Task\" " . $formatedTask->getTaskID() . " \"Name\" " . $formatedTask->getTaskName() . " \"Status\" " . $formatedTask->getStatus() . "\n";
    //     }
    // }
}

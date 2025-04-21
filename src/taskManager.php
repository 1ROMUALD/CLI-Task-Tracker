<?php
require_once 'task.php';

class TaskManager
{
    private $tasksFile;

    public function __construct($tasksFile = __DIR__.'/../data/tasks.json')
    {
        $this->tasksFile = $tasksFile;
        if (!file_exists($this->tasksFile)) {
            file_put_contents($this->tasksFile, []);
        }
    }

    /*Load tasks from the JSON file */
    //We made this public because we want to use this methods in the test file
    public function loadTasks()
    {
        $content = file_get_contents($this->tasksFile);

        $tasks = json_decode($content, true);

        // Fallback in case JSON is invalid //Usefull when the file is empty
        if (!is_array($tasks)) {
            return [];
        }
        return $tasks;
    }

    /**
     * Save tasks to the JSON file
     *
     * @param  mixed $tasks
     * @return void
     */
    private function saveTasks($tasks)
    {
        file_put_contents($this->tasksFile, json_encode($tasks, JSON_PRETTY_PRINT));
    }


    /**
     * Logic for adding a task
     *
     * @param  string $description
     * @return void
     */
    public function addTask($description)
    {
        $tasks = $this->loadTasks();
        $id = count($tasks) + 1;
        $tasks[] = new Task(
            $id,
            $description,
        );
        $this->saveTasks($tasks);
        echo "Task added successfully (ID : $id) \n";
    }

    /**
     * Logic for updating a task : description and status if provided
     *
     * @param  int $taskID
     * @param  string $newDescription
     * @param  string $newTaskStatus
     * @return void
     */
    public function updateTask($taskID, $newDescription = null, $newTaskStatus = null)
    {
        $tasks = $this->loadTasks();
        $found = false;
        //$task is a copy of the array element, not a reference. So the changes you're making don't affect the original $tasks array.
        // To fix this, you need to add a reference (&) in the foreach loop:
        foreach ($tasks as &$task) {
            if ($task['id'] == $taskID) {
                $newDescription != " " && isset($newDescription) ? $task['description'] = $newDescription : null;
                $newTaskStatus != " " && isset($newTaskStatus) ? $task['status'] = $newTaskStatus : null;
                $task['updatedAt'] = date('Y-m-d H:i:s');
                $found = true;
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
        $filtered = array_filter($tasks, fn($task) => $task['id'] != $taskID);
        if (count($filtered) === count($tasks)) {
            echo "Task $taskID not found. \n";
            return;
        }

        //reindex IDs 
        $filtered = array_values(array_map(function ($task, $taskID) {
            $task['id'] = $taskID + 1;
            return $task;
        }, $filtered, array_keys($filtered)));

        $this->saveTasks($filtered);
        echo "Taks $taskID deleted successfully. \n";
    }


    /**
     * Logic for listing tasks
     *
     * @param  string $taskStatus Optionnal
     * @return void
     */
    public function listTasks($taskStatus = null)
    {
        $display = false;
        $tasks = $this->loadTasks();
        if (empty($tasks)) {
            echo "No tasks found.\n";
            return;
        }

        foreach ($tasks as $task) {

            $formatedTask = new Task($task['id'], $task['description'], $task['status'], $task['updatedAt']);
            if (($taskStatus == " " || !isset($taskStatus)) || $task['status'] == $taskStatus) {
                $display = true;
                echo "\"Id\" " . $formatedTask->getId() . " \"Name\" " . $formatedTask->getDescription() . " \"Status\" " . $formatedTask->getStatus() . " \"created at\" " . $formatedTask->getCreatedAt() . " \"updated at\" " . $formatedTask->getUpdatedAt() . "\n";
            }
        }

        if (!$display && isset($taskStatus)) {
            echo "Not task with status $taskStatus found";
        } elseif (!isset($taskStatus) && !$display) {
            echo "No task found";
        }
    }
}

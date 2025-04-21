<?php
require_once '../todo-cli/src/taskManager.php';
$taskManager = new TaskManager();

//CLI routing
$command = $argv[1] ?? null;

switch ($command) {
    case "add":
        $description = $argv[2] ?? null;

        if (!isset($description)) {
            echo "Usage : php task-cli.php add \"task description\" \n";
            break;
        }
        $taskManager->addTask($description);
        break;

    case 'list':
        $status = $argv[2] ?? null;
        $taskManager->listTasks($status);
        break;

    case 'update':
        $id = $argv[2] ?? null;
        $newDescription = $argv[3] ?? null;
        $usage = "Usage : php task-cli.php update <task id> \"new description\" \n";
        if (!isset($id) || !isset($newDescription)) {
            echo "Provide a valid <task id> and the new task description \n";
            echo $usage;
            break;
        }
        $taskManager->updateTask((int) $id, $newDescription);
        break;

    case 'mark-in-progress':
        $id = $argv[2] ?? null;
        if (!isset($id)) {
            echo "Provide a valid <task id>";
            echo "Usage php task-cli.php mark-in-progress <task id>";
            break;
        }
        $taskManager->updateTask((int) $id, null, "in-progress");
        break;

    case 'mark-done':
        $id = $argv[2] ?? null;
        if (!isset($id)) {
            echo "Provide a valid <task id>";
            echo "Usage php task-cli.php mark-done <task id>";
            break;
        }
        $taskManager->updateTask((int) $id, null, "done");
        break;

    case 'delete':
        $id = $argv[2] ?? null;
        if (!isset($id)) {
            echo "Usage php task-cli.php delete <task id>";
            break;
        }
        $taskManager->deleteTask((int) $id);
        break;

    //need to change the update usage in here
    default:
        echo "Invalid command \n";
        echo "Usage:\n";
        echo "  php task-cli.php add \"task description\" ( create de new tas )\n";
        echo "  php task-cli.php list (List all task : you can add the status to only display the tasks with the provided status. ex: php ... list done)\n";
        echo "  php task-cli.php update <id> \"new description\" ( update a task description)\n";
        echo "  php task-cli.php mark-in-progress <id> ( mark a task as in progress )\n";
        echo "  php task-cli.php mark-done <task id> ( mark a task as done )\n";
        echo "  php task-cli.php delete <task id> (delete a task)\n";
        break;
}
<?php
require_once 'taskManager.php';
$taskManager = new TaskManager();

//CLI routing
$command = $argv[1] ?? null;

switch ($command) {
    case "add":
        $name = $argv[2] ?? null;
        $status = $argv[3] ?? null;

        if (!isset($name, $status)) {
            echo "Usage : php todo.php add \"task name\" \"task status\" \n";
            break;
        }
        $taskManager->addTask($name, $status);
        break;

    case 'list':
        $taskManager->listTasks();
        break;

    case 'update':
        $id = $argv[2] ?? null;
        $newName = $argv[3] ?? null;
        $newStatus = $argv[4] ?? null;
        $usage = "Usage : php todo.php update <task id> \"new name\" \"new status\"(optionnal) \n";
        if (!isset($id)) {
            echo "Give a valid <task id> \n";
            echo $usage;
            break;
        } else if (!isset($newName) && !isset($newStatus)) {
            echo "You must provide either the task name or status or both \n";
            echo $usage;
            break;
        }
        $taskManager->updateTask((int) $id, $newName, $newStatus);
        break;

    case 'delete':
        $id = $argv[2] ?? null;
        if (!isset($id)) {
            echo "Usage php todo.php delete <task id>";
            break;
        }
        $taskManager->deleteTask((int) $id);
        break;

    //need to change the update usage in here
    default:
        echo "Usage:\n";
        echo "  php todo.php add \"task name\" \"task status\" \n";
        echo "  php todo.php list\n";
        echo "  php todo.php update <id> \"new description\"\n";
        echo "  php todo.php delete <id>\n";
        break;
}
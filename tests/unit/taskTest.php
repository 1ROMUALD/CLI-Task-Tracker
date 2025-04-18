<?php
require_once '../todo-cli/src/task.php';

function test_can_create_task()
{
    $task = new Task(1, "Buy groceries");
    assert($task->getId() === 1, "Task id should set correctly");
    assert($task->getDescription() === "Buy groceries", "Task description should be set correctly");
    assert($task->getStatus() === "todo", "New Task status should be todo");
    assert(strtotime($task->getCreatedAt()) !== false, "Task createdAt value should be the current date");
    assert($task->getUpdatedAt() === null, "New Task updatedAt value should be null");
}

//Run the test
test_can_create_task();

echo "✅ TaskTest passed.\n";
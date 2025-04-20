<?php
require_once '../todo-cli/src/taskManager.php';
$taskManager = new TaskManager();

function testAddTask()
{
    $testFile = __DIR__ .'/../../data/test_tasks.json';

    //clean up before test
    // if (file_exists($testFile)) {
    //     unlink($testFile);
    // }

    //Run test 
    $manager = new TaskManager($testFile);
    $manager->addTask("Unit Tesk Task");

    $tasks = $manager->loadTasks();

    assert(count($tasks) === 1, "Should have 1 task");
    assert($tasks[0]['description'] === "Unit Tesk Task", "Task description should match");
    assert($tasks[0]['status'] === "todo", "Task status should be todo");
    assert(strtotime($tasks[0]['createdAt'])!== false, "Task createdAt value should be the current");
    assert($tasks[0]['updatedAt'] === null,"Task updatedAt value should be null");

    // Clean up after test
    unlink($testFile);

    echo "✅ TaskManagerTest: addTask() passed.\n";
}

//Run this test
testAddTask();
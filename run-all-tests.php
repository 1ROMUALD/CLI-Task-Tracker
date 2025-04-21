<?php
//delete the tasks.json file if it exist
$file = '../todo-cli/data/tasks.json';
if (file_exists($file))
    unlink($file);

echo " *** Running Unit Tests ***\n";
require_once 'tests/unit/taskTest.php';
require_once 'tests/unit/taskManagerTest.php';


echo "\n *** Running Integration Tests *** \n";
require_once 'tests/integration/addTaskTest.php';
// require_once 'tests/integration/listTaskTest.php';
require_once 'tests/integration/updateTaskTest.php';
require_once 'tests/integration/markInProgressTaskTest.php';
require_once 'tests/integration/markDoneTaskTest.php';
require_once 'tests/integration/deleteTaskTest.php';

unlink($file);
echo "\nAll tests completed. \n";
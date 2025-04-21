<?php

echo " *** Running Unit Tests ***\n";
require_once 'tests/unit/taskTest.php';
require_once 'tests/unit/taskManagerTest.php';


echo "\n *** Running Integration Tests *** \n";
require_once 'tests/integration/addTaskTest.php';
// require_once 'tests/integration/listTaskTest.php';
require_once 'tests/integration/updateTaskTest.php';
require_once 'tests/integration/markInProgressTaskTest.php';

echo "\nAll tests completed. \n";
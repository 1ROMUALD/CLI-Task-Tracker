<?php

$output = shell_exec('php ../todo-cli/task-cli.php add "Test CLI Task"');

if (strpos($output, "Task added successfully (ID : 1)") !== false) {
    echo "✅ AddTaskTest passed.\n";
} else {
    echo "❌ AddTaskTest failed. Output: $output\n";
}
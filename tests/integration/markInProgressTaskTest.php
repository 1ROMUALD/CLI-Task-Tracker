<?php
// MARK A TASK IN PROGRESS INTEGRATION TEST

/**
 * Run the shell script to set the status of a task to "in-progress"
 */

$output = shell_exec('php ../todo-cli/task-cli.php mark-in-progress 1');

if (strpos($output, "Task 1 updated") !== false) {
    echo "✅ mark task in progress passed.\n";
} else {
    echo "❌ mark task in progress failed. Output: $output\n";
}
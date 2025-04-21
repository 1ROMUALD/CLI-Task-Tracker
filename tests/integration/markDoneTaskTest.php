<?php
// MARK A TASK AS DONE INTEGRATION TEST

/**
 * Run the shell script to set the status of a task to "done"
 */

$output = shell_exec('php ../todo-cli/task-cli.php mark-done 1');

if (strpos($output, "Task 1 updated") !== false) {
    echo "✅ mark task status as \"done\" passed. \n";
} else {
    echo "❌ mark task status as \"done\" failed. Output: $output \n";
}
<?php
// UPDATE TASK INTEGRATION TEST

/**
 * Run the command to update mainly a task description and verify if the output is as espected. (successful task updated message)
 */

$output = shell_exec('php ../todo-cli/task-cli.php update 1 "Test CLI Task update"');

if (strpos($output, "Task 1 updated.") !== false) {
    echo "✅ update task test passed.\n";
} else {
    echo "❌ update task test failed. Output: $output\n";
}
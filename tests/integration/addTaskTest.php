<?php
// ADDING TASK INTEGRATION TEST

/**
 * Run the command to create a new task in the terminal and verify if the output is as espected. (successful task creation message)
 */

$output = shell_exec('php ../todo-cli/task-cli.php add "Test CLI Task creation"');

if (strpos($output, "Task added successfully (ID : 1)") !== false) {
    echo "✅ add task test passed.\n";
} else {
    echo "❌ add task test failed. Output: $output\n";
}
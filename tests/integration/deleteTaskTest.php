<?php
//DELETE A TASK INTEGRATION TEST

/**
 * Run the shell command to delete an existing class given his id
 */
$output = shell_exec('php ../todo-cli/task-cli.php delete 1');
if (strpos($output, "Taks 1 deleted successfully. ") !== false) {
    echo "✅ Task delete test passed.\n";
} else {
    echo "❌ Task delete test failed. Output: $output\n";
}
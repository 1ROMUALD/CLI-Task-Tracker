<?php

// Works well but still the created at variable is not guessable we have to use a way to make it fix only for testing;

$output = shell_exec('php ../todo-cli/task-cli.php list');

if (strpos($output, '"Id" 1 "Name" Test CLI Task "Status" todo "created at" 2025-04-21 01:56:03 "updated at"') !== false) {
    echo "✅ Task list display passed.\n";
} else {
    echo "❌ Task list display failed. Output: $output \n";
}
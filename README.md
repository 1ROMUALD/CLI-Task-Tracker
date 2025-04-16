Folder and File Setup
mkdir toto-cli
cd todo-cli
New Item todo.php tasks.json
echo "[]" > tasks.json #Initialise an empty JSON array

Basic CLI command Format
You'll run commands like : 
php todo.php add "Buy groceries"
php todo.php list
php todo.php update 1 "Buy milk"
php todo.php delete 1
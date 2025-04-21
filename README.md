# **CLI TASK TRACKER**

A simple yet powerful Task Tracker cli app that helps you create, manage, and track your tasks with ease using php.

## Table of contents

- About The projects
- Getting Started
- Usage
- Contributing
- Contact
- Aknowledgments

## About The projects

This project is part of the **[roadmap.sh](https://roadmap.sh/projects/task-tracker)** project ideas collection. It involves building a TasK Tracker app where users can:
- Add, update and delete tasks
- Mark tasks as completed
- View tasks
The goal is to help you practice programming skills, including working with filesystem, handling user inputs, and building a simple CLI application.

## Getting Started

To get a local copy up and running, follow these simple steps :

### Prerequisites

To install and use this app you must have **[php](https://www.php.net/)** installed

### Installation

You just need to clone and get into the repo

`git clone https://github.com/1ROMUALD/CLI-Task-Tracker.git`

`cd CLI-Task-Tracker`

## Usage

+ Create a new task : 
    `php task-cli.php add \"task description\"`

*$output :* Task added successfully (ID : 1)

+ Update a task : 
    `php task-cli.php update 1 \"new description\"`

*$output :* Task 1 updated.
 
+ Mark task as in progress : 
    `php task-cli.php mark-in-progress 1`

*$output :* Task 1 updated.

+ Mark task as done : 
    `php task-cli.php mark-done 1`

*$output :* Task 1 updated.

+ List all tasks : 
    `php task-cli.php list`

*$output : the list of all tasks in the file if found* 

+ List all tasks that are done : 
    `php task-cli.php list done`

*$output : the list of all tasks with status done if found*

+ List all tasks that are in progress : 
    `php task-cli.php list in-progress`

*$output : the list of all tasks with in-progress as status if found*

## Contributing

1. Fork the project
2. Create your feature branch `git checkout -b feature/task-edit`
3. Commit your changes `git commit -m 'Add edit task feature'`
4. Push to the branch `git push origin feature/task-edit`

## Contact

For any details or further explanations i'm available here

**MAIL** <tcheundjuiromualde@gmail.com>

My **[LINKEDIN](https://www.linkedin.com/in/tcheundjui)**


## Aknowledgments

* roadmap.sh for the project inspiration
* The **[php](https://www.php.net/)** website for helping me with a detailed and clair documentation.
* This **[GitHub Doc Page](https://docs.github.com/fr/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax#headings)** for the documentation about how to style a markdown file.
* This **[Article](https://www.lenovo.com/us/en/glossary/readme-file/?orgRef=https%253A%252F%252Fwww.google.com%252F)** for the guidance on how to write a usefull and readable markdown file
* ChatGPT for helping with the project architecture and best practices
* **[W3school website](https://www.w3schools.com/php)**
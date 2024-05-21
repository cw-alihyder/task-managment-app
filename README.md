# Task Management App

A task management application built with Laravel, designed to help you keep track of your tasks efficiently. 

## Features

- Create, read, and delete tasks
- Task categorization with priorities
- Drag and Drop priority update

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.0
- Composer
- MySQL or any other supported database

## Installation

Follow these steps to set up the project locally.

### 1. Clone the Repository

```bash
git clone https://github.com/cw-alihyder/task-managment-app.git

cd task-management-app

composer install


php artisan migrate:fresh --seed

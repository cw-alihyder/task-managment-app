# Task Management App

A task management application built with Laravel, designed to help you keep track of your tasks efficiently. 

## Features

- User authentication (registration, login, password reset)
- Create, read, update, and delete tasks
- Task categorization with tags
- Task status management (pending, in progress, completed)
- Due dates and priority levels for tasks
- Responsive design for mobile and desktop

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL or any other supported database

## Installation

Follow these steps to set up the project locally.

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/task-management-app.git

cd task-management-app

composer install


php artisan migrate:fresh --seed

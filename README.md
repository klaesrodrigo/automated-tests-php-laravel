# Todo List Project

This project is a simple todo list application with examples of automated tests. It serves as a demonstration for testing concepts in software development.

## How to Run the Project using Docker Compose

To run the project using Docker Compose, follow these steps:

1. Make sure you have Docker and Docker Compose installed on your system.
2. Clone this repository to your local machine.
3. Navigate to the project directory in your terminal.
4. Run the following command to start the project:

```bash
   docker-compose up -d
```

This command will build the Docker image and start the container with the todo list application.

## Accessing the Container

```bash
   docker exec -it {container-name} bash
```

## Running the Tests

To run the automated tests for this project, follow these steps:

1. Access the Docker container where the project is running.
2. Run the following command to execute the tests:

```bash
   php artisan test
```

This command will run all the automated tests and display the results.

## About Me

Connect with me on LinkedIn: <a href="https://www.linkedin.com/in/klaesrodrigo/">Rodrigo Klaes</a>

CREATE DATABASE todoListDb;

USE todoListDb;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('in_progress', 'done'),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    due_date DATE,
    reminder_date DATE,
    priority ENUM('Basse', 'Moyenne', 'Haute'),
        task_status VARCHAR(255),
    category VARCHAR(255)
);
    
SELECT * FROM tasks;
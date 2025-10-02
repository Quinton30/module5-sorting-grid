-- =====================================================
-- Module 5: Database Setup Script (db.sql)
-- Creates the `school` database and `students` table
-- with sample data for the sortable grid lab.
-- =====================================================

-- Step 1: Create the database
CREATE DATABASE IF NOT EXISTS school;
USE school;

-- Step 2: Drop table if it already exists (for reset)
DROP TABLE IF EXISTS students;

-- Step 3: Create the students table
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gpa DECIMAL(3,2) NOT NULL
);

-- Step 4: Insert sample student data
INSERT INTO students (name, age, gpa) VALUES
('Alice Johnson', 20, 3.80),
('Brian Smith', 22, 3.20),
('Clara Davis', 21, 3.60),
('Daniel Lee', 23, 2.90),
('Emily Clark', 20, 3.70),
('Frank Miller', 24, 3.10),
('Grace Taylor', 22, 3.95);

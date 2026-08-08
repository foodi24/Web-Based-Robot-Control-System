-- Add this table to your existing database.
CREATE TABLE IF NOT EXISTS speech_output (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text_output TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

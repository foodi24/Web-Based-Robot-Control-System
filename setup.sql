CREATE TABLE robot_state (
    id INT PRIMARY KEY,
    state CHAR(1) NOT NULL
);

INSERT INTO robot_state (id, state)
VALUES (1, 'S');

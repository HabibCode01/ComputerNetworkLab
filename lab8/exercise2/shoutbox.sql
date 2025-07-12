CREATE DATABASE shoutbox;
USE shoutbox;

CREATE TABLE shouts (
    shout_id INT(4) NOT NULL AUTO_INCREMENT,
    shout_text VARCHAR(255) NOT NULL COLLATE utf8mb4_general_ci,
    shout_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (shout_id)
);
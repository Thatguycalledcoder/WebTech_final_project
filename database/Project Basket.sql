DROP DATABASE IF EXISTS Project_Basket;

CREATE DATABASE Project_Basket;
USE Project_Basket;

CREATE TABLE Department(
    dept_name CHAR(70) NOT NULL,
    dept_head INT,
    PRIMARY KEY(dept_name)
);

CREATE TABLE Staff (
	staff_id INT NOT NULL AUTO_INCREMENT,
    fname CHAR(50) NOT NULL,
    lname CHAR(50) NOT NULL,
    gender ENUM('M','F'),
    department CHAR(70) NOT NULL,
    salary DECIMAL(8,2) NOT NULL,
    role CHAR(40) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    tel_number INT(12),
    startDate DATE NOT NULL,
    EndDate DATE,
    Descript TEXT,
    Image VARCHAR(100),
    PRIMARY KEY(staff_id),
    FOREIGN KEY(department) 
		REFERENCES Department(dept_name)
			ON UPDATE CASCADE
            ON DELETE CASCADE
);

CREATE TABLE Players(
	player_id INT NOT NULL AUTO_INCREMENT,
    fname CHAR(50) NOT NULL,
    lname CHAR(50) NOT NULL,
    gender ENUM('M','F'),
    salary DECIMAL(8,2) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    tel_number INT(12),
    startDate DATE NOT NULL,
    EndDate DATE,
    agent_name CHAR(80),
    agent_number INT(12),
    player_image VARCHAR(100),
    PRIMARY KEY(player_id)
);

CREATE TABLE Transfers (
	transfer_id INT NOT NULL AUTO_INCREMENT,
    fname CHAR(50) NOT NULL,
    lname CHAR(50) NOT NULL,
    status ENUM("Potential", "Pending", "Completed"),
    movement ENUM("Incoming", "Outgoing"),
    PRIMARY KEY(transfer_id)
);

CREATE TABLE Statistics (
	player_id INT NOT NULL,
    dunks INT(3),
    blocks INT(3),
    steals INT(3),
    threes INT(3),
    baskets INT(3),
    assists INT(3),
    rating DECIMAL(4,2) CHECK(rating <= 10 AND rating > 0),
    INDEX(dunks, blocks, steals, threes, baskets, assists),
    FOREIGN KEY(player_id) 
		REFERENCES Players(player_id) 
			ON UPDATE CASCADE 
			ON DELETE CASCADE
);

CREATE TABLE Trains (
	coach_id INT NOT NULL,
    player_id INT NOT NULL,
    FOREIGN KEY(coach_id) 
		REFERENCES Staff(staff_id) 
			ON UPDATE CASCADE 
			ON DELETE CASCADE,
	FOREIGN KEY(player_id) 
		REFERENCES Players(player_id) 
			ON UPDATE CASCADE 
			ON DELETE CASCADE
);

ALTER TABLE Department ADD 
	FOREIGN KEY(dept_head) 
		REFERENCES Staff(staff_id)
			ON UPDATE CASCADE
			ON DELETE CASCADE;
 
CREATE TABLE Fixtures(
	fixture_id INT NOT NULL,
    fixture_desc VARCHAR(300) NOT NULL,
    fixture_date DATETIME NOT NULL,
    opponent_team VARCHAR(50) NOT NULL,
    Primary KEY(fixture_id)
);

CREATE TABLE Fans(
	fan_id INT NOT NULL AUTO_INCREMENT,
    fname CHAR(50) NOT NULL,
    lname CHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    fan_password VARCHAR(70) NOT NULL,
    PRIMARY KEY(fan_id, email)
);

CREATE TABLE Fan_archive(
	archive_id INT NOT NULL AUTO_INCREMENT,
    fname CHAR(50) NOT NULL,
    lname CHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    fan_password VARCHAR(70) NOT NULL,
    PRIMARY KEY(archive_id)
);
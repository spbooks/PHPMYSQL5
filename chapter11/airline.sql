# Code to create a simple airline database

CREATE TABLE city (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

CREATE TABLE flight (
	number VARCHAR(10) PRIMARY KEY,
	origincityid INT NOT NULL,
	destinationcityid INT NOT NULL,
	departure DATETIME NOT NULL,
	duration TIME NOT NULL,
	stops INT NOT NULL,
	FOREIGN KEY (origincityid) REFERENCES city (id),
	FOREIGN KEY (destinationcityid) REFERENCES city (id)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;


# Some sample data

INSERT INTO city (id, name) VALUES
(1, 'Montreal'),
(2, 'Melbourne'),
(3, 'Sydney'),
(4, 'Honolulu');

INSERT INTO flight
(number, origincityid, destinationcityid, departure, duration, stops)
VALUES
('CP110', 1, 3, '2009-06-01 20:30:00', '23:00:00', 1),
('CP226', 3, 1, '2009-07-29 06:30:00', '23:00:00', 1),
('QF2026', 2, 3, '2009-06-01 08:30:00', '1:20:00', 0),
('QF2027', 3, 2, '2009-06-01 10:30:00', '1:20:00', 0);

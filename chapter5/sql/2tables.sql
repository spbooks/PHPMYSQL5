# Code to create a simple joke table that stores an author ID

CREATE TABLE joke (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	joketext TEXT,
	jokedate DATE NOT NULL,
	authorid INT
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

# Code to create a simple author table

CREATE TABLE author (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	email VARCHAR(255)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

# Adding authors to the database
# We specify the IDs so they are known when we add the jokes below.

INSERT INTO author SET
id = 1,
name = 'Kevin Yank',
email = 'thatguy@kevinyank.com';

INSERT INTO author (id, name, email)
VALUES (2, 'Joan Smith', 'joan@example.com');

# Adding jokes to the database

INSERT INTO joke SET
joketext = 'Why did the chicken cross the road? To get to the other side!',
jokedate = '2012-04-01',
authorid = 1;

INSERT INTO joke (joketext, jokedate, authorid)
VALUES (
'Knock-knock! Who\'s there? Boo! "Boo" who? Don\'t cry; it\'s only a joke!',
'2012-04-01',
1
);

INSERT INTO joke (joketext, jokedate, authorid)
VALUES (
'A man walks into a bar. "Ouch."',
'2012-04-01',
2
);

CREATE DATABASE college ;
USE college;

CREATE TABLE students (
    studNo bigint(8) unsigned AUTO_INCREMENT,
    name varchar(32),
    firstname varchar(32),
    postalCode int(4),
    city varchar(32),
    primary key(studNo)
);

INSERT INTO students (name, firstname, postalCode, city) VALUES ('Green','William',2000,'Antwerp');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Cook','James',2630,'Aartselaar');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Brown','Michael',2630,'Aartselaar');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Jones','Evelyn',2860,'SKW');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Davis','Ella',1000,'Brussels');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Miller','Jack',2860,'SKW');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Wilson','Scarlett',2590,'Berlaar');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Smith','Patrick',2560,'Bevel');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Henderson','Julian',2830,'Blaasveld');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Roberts','Madison',2530,'Boechout');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Bourne','Jason',2820,'Bonheiden');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Lee','Sarah',2221,'Booischot');
INSERT INTO students (name, firstname, postalCode, city) VALUES ('Williams','Justin',2850,'Boom');

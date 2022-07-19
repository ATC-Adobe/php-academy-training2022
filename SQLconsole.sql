SELECT * FROM Reservations;

ALTER TABLE Reservations ADD FOREIGN KEY (room_id)
    REFERENCES Rooms(id);

DESCRIBE Reservations;

SELECT Reservations.name, Rooms.id AS room_name FROM Reservations
         JOIN Rooms on Rooms.id = Reservations.room_id;

CREATE TABLE Users (
   id INT PRIMARY KEY AUTO_INCREMENT,
   name VARCHAR(32),
   surname VARCHAR(32),
   email VARCHAR(32),
   nickname VARCHAR(32),
   password VARCHAR(128),
   salt VARCHAR(32)
);

INSERT INTO Users(name, surname, email, nickname, password, salt)
VALUES ('Wojtek', 'Pokoj', 'wojciech.pokoj@accenture.com', 'wpokoj', 'pass','salt');

SELECT * FROM Users;
SELECT * FROM Rooms;

DESCRIBE Users;

DELETE FROM Users;


DESCRIBE Reservations;

ALTER TABLE Reservations DROP COLUMN user_id;
ALTER TABLE Reservations ADD COLUMN user_id INT;

ALTER TABLE Reservations MODIFY user_id INT NOT NULL;

ALTER TABLE Reservations ADD FOREIGN KEY (user_id)
    REFERENCES Users(id);

DROP TABLE Reservations;

CREATE TABLE Reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    room_id INT NOT NULL,
    user_id INT NOT NULL,
    time_from DATETIME,
    time_to DATETIME
)

INSERT INTO Reservations
(user_id, room_id, time_from,  time_to)
VALUES
    (
        '7',
        '1',
        STR_TO_DATE('21,5,2013','%d,%m,%Y'),
        STR_TO_DATE('21,5,2013','%d,%m,%Y')
    );

SELECT *,
       Rooms.name AS name,
       Reservations.id AS id,
       Rooms.id AS room_id,
       Rooms.name AS room_name,
       Rooms.floor AS floor
FROM Reservations
         JOIN Rooms ON Rooms.id = Reservations.room_id
         JOIN Users ON Users.id = Reservations.user_id;
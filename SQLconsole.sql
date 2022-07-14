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


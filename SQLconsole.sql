SELECT * FROM Reservations;

ALTER TABLE Reservations ADD FOREIGN KEY (room_id)
    REFERENCES Rooms(id);

DESCRIBE Reservations;

SELECT Reservations.name, Rooms.id AS room_name FROM Reservations
         JOIN Rooms on Rooms.id = Reservations.room_id;


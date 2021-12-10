#Get player names and statistics
SELECT p.player_id ,p.fname, p.lname, p.player_image, s.dunks, s.blocks, s.steals, s.threes, s.baskets, s.assists, s.rating, f.fname AS "Cfname", f.lname AS "Clname"
FROM Players p, Statistics s, Staff f
INNER JOIN Trains t
WHERE p.player_id = s.player_id AND p.player_id = t.player_id AND t.coach_id = f.staff_id;

#Get players and their trainers
SELECT p.fname, p.lname, s.fname AS "Cfname", s.lname AS "Clname"
FROM Players p, Staff s
INNER JOIN Trains t
WHERE p.player_id = t.player_id AND t.coach_id = s.staff_id;
     
#Get the list outgoing potential transfers
SELECT *
FROM Transfers
WHERE movement LIKE "Incoming";

#Get players with ratings greater than 7
SELECT p.*, s.rating
FROM Players p
INNER JOIN Statistics s
WHERE s.rating > 7 AND p.player_id = s.player_id;

#Get number of staff of each department in ascending order
SELECT department, COUNT(department) AS "Number of employees"
FROM STAFF
GROUP BY department
ORDER BY department ASC;

SELECT * 
FROM Staff
WHERE department = "Marketing";
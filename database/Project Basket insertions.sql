USE Project_Basket;

INSERT INTO Department(dept_name) VALUES 
		("Analysis"),
        ('Coaching'),
        ('Registrar'),
        ('Scouting'),
        ('Marketing');
 
INSERT INTO Staff(fname, lname, gender, department, salary, role, email, tel_number, startDate, EndDate, Descript, Image) VALUES
		("John", "Dip", 'M', "Analysis", 20000.00, "Analyst", "jdip@hotmail.com", 0556325321, "2020-01-01", NULL, "One of the best and hardworking analysts the team could have. He goes the extra mile of giving suggestions on how to improve the team's and players' performance.", "http://localhost/Endings/assets/analyst1.jpg"),
        ('Allister', 'Ghanawi', 'M', "Coaching", 30000.00, 'Coach', "Aghanawi@gmail.com", 0555432764, '2019-11-10', NULL, "The main coach of the Berekuso Ballers. He has been with the team for the past five years, sharing his passion with the players and pushes them to their limits. Fun fact: He loves ice-cream and handles.", "http://localhost/Endings/assets/coach1.jpg"),
        ('Mark', 'Galawey', 'M', "Coaching", 30000.00, 'Coach', "marlawey@gmail.com", 0505432764, '2019-11-10', NULL, "The assistant coach of the Berekuso Ballers. He has been with the team for the past eight years, relinquishing his role as head coach after three years with the team in order to spend time with his family. Fun fact: He loves hip-life music.", "http://localhost/Endings/assets/coach2.jpg"),
 		('Mursal', 'Jadati', 'F', "Registrar", 10000.00, 'Registrar', "Murdati@gmail.com", 0777987689, '2020-02-15', NULL, "When looking for a highly organized, time-conscious and reliable person, she is the one to count on. Without her, the team would be in shambles. Fun fact: She loves Indian food and music.", "http://localhost/Endings/assets/registrar1.jpg"),
 		('Jakil', 'Manono', 'M', "Scouting", 15000.00, 'Scout', "Janono@hotmail.com", 0734238967, '2020-03-01', NULL, "A highly analytical genius in the field of scouting. He is able to gauge a player's abilities after just one game. He uses this talent to help our players improve and also find potential talents for the club. Fun fact: He loves movies with a lot of investigations.", "http://localhost/Endings/assets/scout1.jpg"),
 		('Aziz', 'Haruna', 'M', 'Marketing', 25000.00, 'Marketer', 'aharuna@yahoo.com', 0704356789,'2020-04-03', NULL, "Aziz Haruna is referred to as 'Manager #2' within the club. His marketing skills helped to put the club in the minds of many, helping as to gain many fans and much attention. Fun fact: He is also a mentor and counsellor to the players.", "http://localhost/Endings/assets/marketer1.jpg");


INSERT INTO Players(fname, lname, gender, salary, email, tel_number, startDate, EndDate, agent_name, agent_number, player_image) VALUES
		("Dhaku", "Haku", 'M', 50000.00, 'dhahaku@gmail.com', 0502514532, '2019-04-04', NULL, "Danny Lopez", 0526543235, "http://localhost/Endings/database/player1.jpg"),
        ('Mensah', 'Kwashie', 'M', 50000.00, 'menkwashie@hotmail.com', 0548700041, '2021-01-6', '2021-09-9', NULL, NULL, "http://localhost/Endings/database/player2.jpg"),
		('Nathaniel', 'Oppong', 'M', 50000.00, 'nathaniel.oppong@gmail.com', 0506743321, '2021-02-7', '2021-11-9', NULL, NULL, "http://localhost/Endings/database/player3.jpg"),
		('Kofi', 'Berko', 'M', 50000.00, 'kofi.berko@gmail.com', 0579768990, '2021-02-5', '2021-10-9', NULL, NULL, "http://localhost/Endings/database/player4.jpg"),
		('Luke', 'Kusi', 'M', 55000.00, 'luke.kusi@gmail.com', 0543878654, '2021-03-8', '2021-11-9', "Larry Davis", 0243521235, "http://localhost/Endings/database/player5.jpg"),
        ("Daniel", "Hamu", 'M', 50000.00, 'damu@gmail.com', 0572514532, '2019-04-04', NULL, NULL, NULL, "http://localhost/Endings/database/player6.jpg"),
        ('Mensah', 'Quaye', 'M', 50000.00, 'menquay@hotmail.com', 0518700041, '2021-01-6', '2021-09-9', NULL, NULL, "http://localhost/Endings/database/player7.jpg" ),
		('Steven', 'Oppong', 'M', 50000.00, 'steveoppong@gmail.com', 0526743321, '2021-02-7', '2021-11-9', NULL, NULL, "http://localhost/Endings/database/player8.jpg" ),
		('Kwaku', 'Berko', 'M', 50000.00, 'kwaberko@gmail.com', 0539768990, '2021-02-5', '2021-10-9', NULL, NULL, "http://localhost/Endings/database/player9.jpg" ),
        ('Kusi', 'Breko', 'M', 50000.00, 'kusi.breko@gmail.com', 0549768990, '2021-02-5', '2021-10-9', NULL, NULL, "http://localhost/Endings/database/player10.jpg" );

INSERT INTO Trains VALUES 
		(2,1),
        (2,2),
        (1,3),
        (1,4),
        (1,5),
        (1,6),
        (2,7),
        (2,8),
        (2,9),
        (1,10);
        
INSERT INTO Transfers VALUES
		(1, "Mark", 'Johnson', 'Pending', "Outgoing"),
        (2, "Abel", "Fisher", 'Potential', "Incoming"),
        (3, 'Duke', 'Sams', 'Completed', "Outgoing"),
        (4, 'Dave', 'King', 'Potential', "Incoming"),
        (5, "O'neil", 'Samson', 'Potential', "Incoming");


INSERT INTO Statistics VALUES
		(1, 5, 7, 3, 5, 10, 4, 8),
        (2, 5, 6, 8, 4, 7, 6, 7),
        (3, 2, 6, 7, 2, 6, 7, 7),
        (4, 3, 7, 3, 5, 10, 4, 8),
        (5, 4, 6, 8, 4, 12, 6, 9),
        (6, 1, 6, 7, 2, 6, 7, 7),
        (7, 1, 7, 3, 5, 10, 4, 8),
        (8, 3, 6, 8, 4, 7, 6, 7),
        (9, 4, 6, 7, 2, 6, 7, 7),
        (10, 3, 7, 3, 5, 10, 4, 8);
        
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS Question;
DROP TABLE IF EXISTS Customer;


CREATE TABLE Customer
(
    CID INTEGER PRIMARY KEY,
    NAME VARCHAR(64) NOT NULL,
    EMAIL VARCHAR(64)
);

INSERT INTO Customer  VALUES
(1, 'Allan McGregor', 'Allan@gmail.com'),
(2, 'Zachary Cripps', 'email@email.com'),
(3, 'Sofie Cripps', 'testingEmail5@email.com'),
(4, 'XRay Zulu', '');

CREATE TABLE Post
(
    PID INTEGER PRIMARY KEY,
    DISHNAME VARCHAR(30) NOT NULL,
    LOCATION VARCHAR (40) NOT NULL, 
    CATEGORY VARCHAR(64) NOT NULL,
    IMAGE BLOB,
    RATING INTEGER (1),
    DISHDESCRIPTION VARCHAR(64) NOT NULL,
    CID INTEGER,
    FOREIGN KEY (CID) REFERENCES Customer(CID)
);

INSERT INTO Post VALUES
(1,'steak n fires', 'Gold Coast','steak', '', 3, 'good steak with nice sauce', 1),
(2,'Sushi','Cheeky Moneky, Brisbane' ,'Sushi', '', 4, 'fish was fresh', 2),
(3,'deep fry pizza','Joes Pizza, Brisbane' ,'Pizza', '', 5, 'Simply awesome and tasty', 3),
(4,'Nigiri','Cheeky Moneky, Brisbane' ,'Sushi', '', 4, 'fish was fresh and rice was bouncey', 1),
(5,'Sushi','Down Town Mexico, Sydney' ,'Sushi', '', 2, 'the tastes was good but way to much oil ', 2);

CREATE TABLE Question
(
    QID INTEGER PRIMARY KEY,
    SUBJECT VARCHAR(30) NOT NULL,
    QUESTIONDESCRIPTION VARCHAR(64) NOT NULL,
    CID INTEGER,
    FOREIGN KEY (CID) REFERENCES Customer(CID)
);

INSERT INTO Question VALUES
(1, 'wesbite broke', 'when i click on the search bar the website shits the bed', 2),
(2, 'still broken', 'I am good at complaining', 2),
(3, 'can"t post anyting', 'I click submit and it does nothing and stats on the same page', 1);
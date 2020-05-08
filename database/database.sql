DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS Question;
DROP TABLE IF EXISTS Customer;


CREATE TABLE Customer
(
    CID INTEGER PRIMARY KEY,
    NAME VARCHAR(64) NOT NULL,
    EMAIL VARCHAR(64) NOT NULL

);

INSERT INTO Customer  VALUES
(1, 'Allan McGregor', 'Allan@gmail.com'),
(2, 'XRay Zulu', 'XZ@gmail.com')
;

CREATE TABLE Post
(
    PID INTEGER PRIMARY KEY,
    DISHNAME VARCHAR(30),
    CATEGORY VARCHAR(64) NOT NULL,
    IMAGE BLOB NOT NULL,
    RATING INTEGER (4) NOT NULL,
    DISHDESCRIPTION VARCHAR(64) NOT NULL,
    CID INTEGER,
    FOREIGN KEY (CID) REFERENCES Customer(CID)
);

INSERT INTO Post VALUES
(1,'steak n fires', 'steak', '', 3, 'good steak with nice sauce', 1),
(2,'Nigiri', 'Sushi', '', 4, 'fish was fresh', 1)
;

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
(2, 'still broken', 'I am good at complaining', 2);
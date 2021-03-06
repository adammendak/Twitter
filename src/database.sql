CREATE DATABASE Twitter;

CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    hashed_password VARCHAR(255) NOT NULL
);

CREATE TABLE Tweet (
    id INT NOT NULL AUTO_INCREMENT,
    userId INT NOT NULL,
    text VARCHAR(140) NOT NULL,
    creationDate DATE NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(userId)
    REFERENCES Users(id)
);

CREATE TABLE  Comment (
    id INT NOT NULL AUTO_INCREMENT,
    Id_usera int NOT NULL,
    Id_postu int NOT NULL,
    text VARCHAR(60) NOT NULL,
    creationDate DATE NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(Id_usera)REFERENCES Users(id),
    FOREIGN KEY(Id_postu)REFERENCES Tweet(id)
);

CREATE TABLE Message (
  id INT NOT NULL AUTO_INCREMENT,
  senderId INT NOT NULL,
  receiverId INT NOT NULL,
  message VARCHAR(255) NOT NULL,
  messageRead INT NOT NULL,
  creationDate DATE NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(senderId)REFERENCES Users(id),
  FOREIGN KEY(receiverId)REFERENCES Users(id)
  );


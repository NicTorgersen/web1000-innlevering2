CREATE TABLE IF NOT EXISTS `klasse` (
    `klassekode` varchar(3) NOT NULL,
    `klassenavn` varchar(50) NOT NULL,
    PRIMARY KEY(`klassekode`)
);

CREATE TABLE IF NOT EXISTS `student` (
    `brukernavn` varchar(2) NOT NULL,
    `fornavn` varchar(50) NOT NULL,
    `etternavn` varchar(50) NOT NULL,
    `klassekode` varchar(3) NOT NULL,
    PRIMARY KEY(`brukernavn`),
    FOREIGN KEY(`klassekode`) REFERENCES `klasse`(`klassekode`)
);

DROP TABLE `klasse`;
DROP TABLE `student`;
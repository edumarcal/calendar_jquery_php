CREATE DATABASE IF NOT EXISTS calendar_jquery_php;

CREATE TABLE IF NOT EXISTS events (
	id BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(256) NOT NULL,
	description TEXT,
	startDate DATETIME NOT NULL,
	endDate DATETIME,
	url VARCHAR(256)
);
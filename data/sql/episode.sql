CREATE TABLE episode(
  episode_number INT(11) AUTO_INCREMENT,
  category_id INT(11),
  link VARCHAR(128) UNIQUE,
  title VARCHAR(255) NOT NULL,
  description VARCHAR(1024) DEFAULT null,
  created_by VARCHAR(255) NOT NULL,
  created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (episode_number, category_id),
  FOREIGN KEY (category_id) REFERENCES category(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (created_by) REFERENCES user(username)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
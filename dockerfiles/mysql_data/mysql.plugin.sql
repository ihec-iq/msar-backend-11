USE mysql;
CREATE TABLE plugin (
  name CHAR(64) NOT NULL,
  dl CHAR(128) NOT NULL,
  PRIMARY KEY (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

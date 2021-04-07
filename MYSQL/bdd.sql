create table utilisateur(
  id int NOT NULL auto_increment,
  pseudo varchar(255) NOT NULL,
  pass varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  date_inscription date NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

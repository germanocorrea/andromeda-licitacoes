CREATE TABLE licitations (
  id int NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  end_date date NOT NULL,
  open_date date NOT NULL,
  state varchar(255) NOT NULL,

  PRIMARY KEY (id)
);

CREATE TABLE licitation_items (
  id int NOT NULL AUTO_INCREMENT,
  licitation_id int NOT NULL,
  name VARCHAR(255) NOT NULL,
  quantity int NOT NULL,
  description text NOT NULL,

  PRIMARY KEY (id)
);

CREATE TABLE proposals (
  id INT NOT NULL AUTO_INCREMENT,
  licitation_id INT NOT NULL,

#   fornecedor ID
  user_id INT NOT NULL,

  PRIMARY KEY (id)
);

CREATE TABLE proposal_items (
  id INT NOT NULL AUTO_INCREMENT,
  unity_value FLOAT NOT NULL,
  licitation_item_id INT NOT NULL,
  proposal_id INT NOT NULL,

  PRIMARY KEY (id)
);

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  cpf_cnpj VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  address  VARCHAR(255),
  role VARCHAR(255) NOT NULL,

  PRIMARY KEY (id)
);

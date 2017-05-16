create table licitation_items
(
  id int auto_increment
    primary key,
  licitation_id int not null,
  name varchar(255) not null,
  quantity int not null,
  description text not null
);

create table licitations
(
  id int auto_increment
    primary key,
  name varchar(255) not null,
  end_date date not null,
  open_date date not null,
  state varchar(255) not null
);

create table proposal_items
(
  id int auto_increment
    primary key,
  unity_value float not null,
  licitation_item_id int not null,
  proposal_id int not null
);

create table proposals
(
  id int auto_increment
    primary key,
  licitation_id int not null,
  user_id int not null,
  choosed tinyint(1) default '0' null
);

create table users
(
  id int auto_increment
    primary key,
  cpf_cnpj varchar(255) not null,
  email varchar(255) not null,
  name varchar(255) not null,
  password varchar(255) not null,
  address varchar(255) null,
  role varchar(255) not null
);
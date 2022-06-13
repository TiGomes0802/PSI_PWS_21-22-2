create database pws2122;

use pws2122;

CREATE TABLE empresas (
 id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 designacaosocial varchar(255) COLLATE latin1_bin NOT NULL,
 email varchar(255) COLLATE latin1_bin NOT NULL,
 telefone varchar(9) COLLATE latin1_bin NOT NULL,
 nif varchar(9) COLLATE latin1_bin NOT NULL,
 morada varchar(255) COLLATE latin1_bin NOT NULL,
 codigopostal varchar(255) COLLATE latin1_bin NOT NULL,
 localidade varchar(255) COLLATE latin1_bin NOT NULL,
 capitalsocial float COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB;

CREATE TABLE users (
 id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 username varchar(255) COLLATE latin1_bin NOT NULL,
 password varchar(255) COLLATE latin1_bin NOT NULL,
 email varchar(255) COLLATE latin1_bin NOT NULL,
 telefone varchar(9) COLLATE latin1_bin NOT NULL,
 nif varchar(9) COLLATE latin1_bin NOT NULL,
 morada varchar(255) COLLATE latin1_bin NOT NULL,
 codigopostal varchar(255) COLLATE latin1_bin NOT NULL,
 localidade varchar(255) COLLATE latin1_bin NOT NULL,
 role varchar(16) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB;

CREATE TABLE ivas (
 id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 percentagem varchar(255) COLLATE latin1_bin NOT NULL,
 descricao varchar(255) COLLATE latin1_bin NOT NULL,
 emvigor bool COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB;

CREATE TABLE produtos (
 id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 referencia varchar(255) COLLATE latin1_bin NOT NULL,
 descricao varchar(255) COLLATE latin1_bin NOT NULL,
 preco float COLLATE latin1_bin NOT NULL,
 stock int(11) COLLATE latin1_bin NOT NULL,
 iva_id int(11) COLLATE latin1_bin NOT NULL,
 FOREIGN KEY (iva_id) REFERENCES ivas(id)
) ENGINE=InnoDB;

CREATE TABLE faturas (
 id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 data datetime COLLATE latin1_bin DEFAULT CURRENT_TIMESTAMP NOT NULL,
 valortotal float COLLATE latin1_bin NOT NULL,
 ivatotal float COLLATE latin1_bin NOT NULL,
 estado varchar(16) COLLATE latin1_bin NOT NULL,
 empregado_id int(11) COLLATE latin1_bin NOT NULL,
 cliente_id int(11) COLLATE latin1_bin NOT NULL,
 FOREIGN KEY (empregado_id) REFERENCES users(id),
 FOREIGN KEY (cliente_id) REFERENCES users(id)
) ENGINE=InnoDB;

CREATE TABLE linhasfaturas (
 id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 valor float COLLATE latin1_bin NOT NULL,
 valoriva float COLLATE latin1_bin NOT NULL,
 quantidade int(11) COLLATE latin1_bin NOT NULL,
 produto_id int(11) COLLATE latin1_bin NOT NULL,
 fatura_id int(11) COLLATE latin1_bin NOT NULL,
 FOREIGN KEY (produto_id) REFERENCES produtos(id),
 FOREIGN KEY (fatura_id) REFERENCES faturas(id)
) ENGINE=InnoDB;
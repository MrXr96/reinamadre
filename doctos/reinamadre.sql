CREATE DATABASE reinamadre;

CREATE TABLE usuarios (
	id_user INT AUTO_INCREMENT,
	nivel INT,
	nickname VARCHAR(250),
	email VARCHAR(100),
	passwd TEXT,
	created_at DATETIME,
	deleted_at DATETIME,
	PRIMARY KEY (id_user)
);

CREATE TABLE empresas (
	id_empresa INT AUTO_INCREMENT,
	nombre_empresa VARCHAR(255),
	alias_empresa VARCHAR(10),
	created_at DATETIME,
	deleted_At DATETIME,
	PRIMARY KEY (id_empresa)
)ENGINE=INNODB;

CREATE TABLE departamentos (
	id_depa INT AUTO_INCREMENT,
	nombre_depa VARCHAR(255),
	created_at DATETIME,
	deleted_At DATETIME,
	PRIMARY KEY (id_depa)
)ENGINE=INNODB;

CREATE TABLE empleados (
	id_empleado INT AUTO_INCREMENT,
	apat_empleado VARCHAR(100),
	amat_empleado VARCHAR(100),
	nombre_empleado VARCHAR(100),
	nacimiento_empleado DATE,
	email_empleado VARCHAR(100),
	genero_empleado CHAR(1),
	tel_empleado VARCHAR(15),
	cel_empleado VARCHAR(15),
	ingreso DATE,
	created_at DATETIME,
	deleted_At DATETIME,
	PRIMARY KEY (id_empleado)
)ENGINE=INNODB;

CREATE TABLE det_empleado_empresa(
	id_det_em INT AUTO_INCREMENT,
	id_empresa INT,
	id_depa INT,
	id_empleado INT,
	PRIMARY KEY (id_det_em),
	FOREIGN KEY (id_empresa) REFERENCES empresas(id_empresa),
	FOREIGN KEY (id_depa) REFERENCES departamentos(id_depa),
	FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado)
)ENGINE=INNODB;

CREATE TABLE grupos(
	id_grupo INT AUTO_INCREMENT,
	grupo VARCHAR(100),
	PRIMARY KEY(id_grupo)
)ENGINE=INNODB;

CREATE TABLE det_empleado_grupo(
	id_det_eg INT AUTO_INCREMENT,
	id_grupo INT,
	id_empleado INT,
	PRIMARY KEY (id_det_eg),
	FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo),
	FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado)
)ENGINE=INNODB;
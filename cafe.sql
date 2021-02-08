create database Cafe;
use cafe;
create table Cafeticultor
(
	id_Agricultor int auto_increment primary key,
	nombre varchar(40) not null,
	apepat varchar(40) not null,
	apemat varchar(40) not null,
	numeroCel varchar(10)
 );
 select * from Cafeticultor;
 create table Consulta
 (
	id_Consulta int auto_increment primary key,
    id_Agricultor int not null,
	foto_cultivo blob,
    constraint FOREIGN KEY (id_Agricultor) REFERENCES Cafeticultor(id_Agricultor)
 );
 
  create table Predios
 (
	id_Predio int auto_increment primary key,
	id_Agricultor int not null,
	superficie varchar(100),
	localizacion point,
	constraint FOREIGN KEY (id_Agricultor) REFERENCES Cafeticultor(id_Agricultor)
 );
 create table Recomendacion
 (
	id_Recomendacion int auto_increment primary key,
    id_Consulta int not null,
    descripcion varchar(250) not null,
     constraint FOREIGN KEY (id_Consulta) REFERENCES Consulta(id_Consulta)
 );
 

  create table Cultivos
 (
	id_Cultivo int auto_increment primary key,
    id_Predio int not null,
	densidad smallint not null,
	tipo_Cultivo varchar(20) not null,
     constraint FOREIGN KEY (id_Predio) REFERENCES Predios(id_Predio)
 );
 
create table Problemas_Fitosanitarios
 (
	id_problema int auto_increment primary key,
    id_Recomendacion int not null,
    id_Cultivo int not null,
	nombre_Problema varchar(150) not null,
	intensidad varchar(20) not null, 
	causas varchar(200) not null,
     constraint FOREIGN KEY (id_Recomendacion) REFERENCES Recomendacion(id_Recomendacion),
     constraint FOREIGN KEY (id_Cultivo) REFERENCES Cultivos(id_Cultivo)
 );
 
 create table Usuarios
(
	Id int auto_increment primary key,
	Nombre varchar(200) not null,
	usuario varchar(100) not null,
	pwd varchar(100) not null
);

create table localizacion
(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	nombreU VARCHAR( 60 ) NOT NULL ,
    direccion VARCHAR( 80 ) NOT NULL ,
    latitud FLOAT NOT NULL ,
    longitud FLOAT NOT NULL 
);

Drop table localizacion;
select * from Cafeticultor;
select * from Consulta;
select * from Cultivos;
select * from Predios;
select * from problemas_Fitosanitarios;
select * from Recomendacion;
select * from Usuarios;
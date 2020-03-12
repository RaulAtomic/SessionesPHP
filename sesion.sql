CREATE DATABASE IF NOT EXISTS sesion;

USE sesion;

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuarios int AUTO_INCREMENT,
    nombre varchar(20),
    apellido varchar(20),
    usuario varchar(20),
    passwd varchar(20),
    rol varchar(20),
    PRIMARY KEY (id_usuarios)
)Engine=InnoDB default charset=latin1;
/*Existen tres tipos de usuarios:
    administrador
    gerente
    empleado
*/

INSERT INTO usuarios 
                (nombre, apellido, usuario, passwd, rol) 
                VALUES 
                ('Gustavo', 'Hernandez','gustavo','12345','administrador');
INSERT INTO usuarios 
                (nombre, apellido, usuario, passwd, rol) 
                VALUES 
                ('Manuel', 'Aguilar','manuel','12345','gerente');
INSERT INTO usuarios 
                (nombre, apellido, usuario, passwd, rol) 
                VALUES 
                ('Carlos', 'Rodriguez','carlos','12345','empleado');
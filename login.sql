CREATE DATABASE login;
USE login;

CREATE TABLE usuario(
  id int NOT null AUTO_INCREMENT, PRIMARY KEY pk_id(id),
  nombre_usuario varchar(50),UNIQUE idx_usuario(nombre_usuario),
  contraseña varchar(60),
  tipo_usuario varchar(50)
);

INSERT INTO `usuario`(`nombre_usuario`, `contraseña`, `tipo_usuario`) VALUES ('Admin','$2y$10$eTSBROHIEX6vHGUZpdvjN.epRckMovFmmsPTHF/5h078/BfZBbW/6','Administrador');
/*La contraseña del usuario Admin es Admin*/
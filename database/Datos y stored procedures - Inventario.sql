/*INSERT INTO tresponsable VALUES (NULL,'JUAN ABEL','CCARITA MAMANI','JEFE DE AREA','CONTRATADO',NOW(),NOW());
INSERT INTO tresponsable VALUES (NULL,'PEDRO MANUEL','ROMAN CUELLAR','JEFE DE AREA','NOMBRADO',NOW(),NOW());
INSERT INTO tresponsable VALUES (NULL,'JOSE GABRIEL','FLOREZ CCOA','RESPONSABLE DIRECTIVO','NOMBRADO',NOW(),NOW());
INSERT INTO tservicio VALUES (NULL,'CRED',1,NOW(),NOW());
INSERT INTO tservicio VALUES (NULL,'ESTADISTICA',2,NOW(),NOW());
INSERT INTO tservicio VALUES (NULL,'MEDICINA GENERAL',3,NOW(),NOW());

ALTER TABLE tbien AUTO_INCREMENT=1;
INSERT INTO tbien VALUES (NULL,'3','536565','COMPRADO','IMPRESORA LASER',1,'EPSON','1005','EX65435','PLOMO','65x14','NUEVO','FUNCIONAL','NINGUNA','1990/05/04',NOW(),NOW());
INSERT INTO tbien VALUES (NULL,'1','536566','COMPRADO','IMPRESORA LASER',1,'EPSON','1005','EX65445','PLOMO','65x14','BUENA','FUNCIONAL','RODILLOS CAMBIADOS','1998/02/02',NOW(),NOW());
INSERT INTO tbien VALUES (NULL,'3','454565','DONATIVO','MONITOR PANTALLA PLANA',1,'LG','EX-332','PR65465','NEGRO','40x24','NUEVO','FUNCIONAL','NINGUNA','2015/06/03',NOW(),NOW());
INSERT INTO tbien VALUES (NULL,'2','841565','DONATIVO','MOUSE',1,'GENIUS','ER546','345R343','BLANCO','15x10','MEDIO','FUNCIONAL','EL SENSOR OPTICO NO FUNCIONA A VECES','2006/07/01',NOW(),NOW());

ALTER TABLE tmovimiento AUTO_INCREMENT=1;
INSERT INTO tmovimiento VALUES (NULL,'3','2017/02/02 20:00:05','3','PRESTAMO PARA LA CAMPAÑA DE VACUNACION','NINGUNA',NOW(),NOW());
INSERT INTO tmovimiento VALUES (NULL,'1','2018/03/04','2','PRESTAMO PARA LA CAPACITACION DE NIÑO SANO','SE REALIZA EL PRESTAMO SIN EL CABLE',NOW(),NOW());
INSERT INTO tmovimiento VALUES (NULL,'2','2020/11/01','1','FALTA DE EQUIPOS EN EL AREA','NINGUNA',NOW(),NOW());

/* El primero usuario administrador CONTRASEÑA=admin12345 
INSERT INTO users VALUES (NULL,'ADMIN','ADMIN','admin','ADMINISTRADOR','$2y$10$vJy33so1szW3gJPMizSELuoap7OwhSohsw3jL5eFYDOmCxXeTDeam',NULL,NOW(),NOW());
*/
/*DELIMITER $$
CREATE PROCEDURE SP_recuperarPorID(IN id BIGINT)
BEGIN
	SELECT * FROM tbien WHERE idbien=id;
END$$
DELIMITER
#CALL SP_recuperarPorID(2)

DELIMITER $$
CREATE PROCEDURE SP_autoIdServicio(IN tableName VARCHAR(35))
BEGIN
SELECT AUTO_INCREMENT AS ID
FROM  INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'inventario'
AND   TABLE_NAME   = tableName;
END$$
DELIMITER
#CALL SP_autoId('tservicio')

DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaBienes(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED, IN estado VARCHAR(15))
BEGIN
	SELECT B.idbien, B.nombre, S.nombre AS servicio, B.cod_patrimonial
		FROM tbien B INNER JOIN tservicio S ON B.idservicio=S.idservicio
		WHERE (B.nombre LIKE CONCAT('%',busqueda,'%') OR B.idbien = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR B.cod_patrimonial = busqueda) AND B.estado LIKE CONCAT('%',estado,'%')
		LIMIT inicio,limite;
END$$
DELIMITER
CALL SP_listarBusquedaBienes('',0,15,'')*/

/*DELIMITER $$
CREATE PROCEDURE SP_contarBusquedaBienes(IN busqueda VARCHAR(100), IN estado VARCHAR(15))
BEGIN
	SELECT COUNT(B.idbien) AS cantidad
		FROM tbien B INNER JOIN tservicio S ON B.idservicio=S.idservicio
		WHERE (B.nombre LIKE CONCAT('%',busqueda,'%') OR B.idbien = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR B.cod_patrimonial = busqueda) AND B.estado LIKE CONCAT('%',estado,'%');	
END$$
DELIMITER
CALL SP_contarBusquedaBienes('','BAJA')*/

/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaMovimientos(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	CREATE TEMPORARY TABLE T1
		SELECT M.idmovimiento,B.cod_patrimonial,M.fecha,M.idservicio
			FROM tmovimiento M INNER JOIN tbien B ON M.idbien=B.idbien;
	SELECT T.idmovimiento,T.cod_patrimonial,T.fecha,S.nombre AS servicio
		FROM T1 T INNER JOIN tservicio S ON T.idservicio=S.idservicio
		WHERE T.idmovimiento = busqueda OR T.cod_patrimonial=busqueda OR T.fecha LIKE CONCAT('%',busqueda,'%') OR S.nombre LIKE CONCAT('%',busqueda,'%')
		LIMIT inicio,limite;
	DROP TABLE T1;
END
$$ DELIMITER

DELIMITER $$
CREATE PROCEDURE SP_contarBusquedaMovimientos(IN busqueda VARCHAR(100))
BEGIN
	CREATE TEMPORARY TABLE T1
		SELECT M.idmovimiento,B.cod_patrimonial,M.fecha,M.idservicio
			FROM tmovimiento M INNER JOIN tbien B ON M.idbien=B.idbien;
	SELECT COUNT(T.idmovimiento) AS cantidad
		FROM T1 T INNER JOIN tservicio S ON T.idservicio=S.idservicio
		WHERE T.idmovimiento = busqueda OR T.cod_patrimonial=busqueda OR T.fecha LIKE CONCAT('%',busqueda,'%') OR S.nombre LIKE CONCAT('%',busqueda,'%');
	DROP TABLE T1;
END
$$ DELIMITER*/
/*CALL SP_contarBusquedaMovimientos('Cre')*/

/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaResponsables(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT idresponsable, nombres, apellidos
		FROM tresponsable
		WHERE idresponsable = busqueda OR nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%')
		LIMIT inicio,limite;
END$$
DELIMITER

DELIMITER $$
CREATE PROCEDURE SP_contarBusquedaResponsables(IN busqueda VARCHAR(100))
BEGIN
	SELECT COUNT(idresponsable) AS cantidad
		FROM tresponsable
		WHERE idresponsable = busqueda OR nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%');
END$$
DELIMITER*/

/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaServicios(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT S.idservicio,S.nombre, CONCAT(R.nombres,' ',R.apellidos) AS responsable, S.fecha_inicio, S.fecha_fin
		FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
		WHERE S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%') OR S.fecha_inicio LIKE CONCAT('%',busqueda,'%') OR S.fecha_fin LIKE CONCAT('%',busqueda,'%')
		LIMIT inicio,limite;
END$$
DELIMITER

DELIMITER $$
CREATE PROCEDURE SP_contarBusquedaServicios(IN busqueda VARCHAR(100))
BEGIN
	SELECT COUNT(S.idservicio) AS cantidad
		FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
		WHERE S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%') OR S.fecha_inicio LIKE CONCAT('%',busqueda,'%') OR S.fecha_fin LIKE CONCAT('%',busqueda,'%');
END$$
DELIMITER*/

/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaUsuarios(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT id,nombres,apellidos,usuario
		FROM users
		WHERE nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%') OR usuario LIKE CONCAT('%',busqueda,'%')
		LIMIT inicio,limite;
END$$
DELIMITER

DELIMITER $$
CREATE PROCEDURE SP_contarBusquedaUsuarios(IN busqueda VARCHAR(100))
BEGIN
	SELECT COUNT(id) AS cantidad
		FROM users
		WHERE nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%') OR usuario LIKE CONCAT('%',busqueda,'%');
END$$
DELIMITER*/

/*DELIMITER $$
CREATE TRIGGER TG_actualizarServicioBien BEFORE INSERT ON tmovimiento
	FOR EACH ROW
	BEGIN
		SET @newidbien=NEW.idbien;
		SET @newidservicio=NEW.idservicio;
		UPDATE tbien
		SET idservicio=@newidservicio
		WHERE idbien=@newidbien;
	END
$$ DELIMITER*/

/*DELIMITER $$
CREATE PROCEDURE SP_actualizarFechaFinServicio(IN fecha_fin2 DATE, IN nombre2 VARCHAR(50), IN idservicio2 BIGINT)
BEGIN
	UPDATE tservicio
		SET fecha_fin = DATE_SUB(fecha_fin2, INTERVAL 1 DAY)
		WHERE nombre = nombre2 AND idservicio=idservicio2 AND fecha_fin IS NULL;
END$$
DELIMITER*/

/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaServicios(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED,IN  tipo_listado VARCHAR(20))
BEGIN
	IF(tipo_listado='TODO')
	THEN
		SELECT S.idservicio,S.nombre, CONCAT(R.nombres,' ',R.apellidos) AS responsable, S.fecha_inicio, S.fecha_fin
			FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
			WHERE S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%') OR S.fecha_inicio LIKE CONCAT('%',busqueda,'%') OR S.fecha_fin LIKE CONCAT('%',busqueda,'%') 
			LIMIT inicio,limite;
	ELSEIF(tipo_listado='ACTIVO') THEN
		SELECT S.idservicio,S.nombre, CONCAT(R.nombres,' ',R.apellidos) AS responsable, S.fecha_inicio, S.fecha_fin
			FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
			WHERE (S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%') OR S.fecha_inicio LIKE CONCAT('%',busqueda,'%') OR S.fecha_fin LIKE CONCAT('%',busqueda,'%')) AND S.fecha_fin IS NULL
			LIMIT inicio,limite;
	ELSE 
		SELECT S.idservicio,S.nombre, CONCAT(R.nombres,' ',R.apellidos) AS responsable, S.fecha_inicio, S.fecha_fin
			FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
			WHERE (S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%') OR S.fecha_inicio LIKE CONCAT('%',busqueda,'%') OR S.fecha_fin LIKE CONCAT('%',busqueda,'%')) AND S.fecha_fin IS NOT NULL
			LIMIT inicio,limite;
	END IF;
END$$
DELIMITER

DELIMITER $$
CREATE PROCEDURE SP_contarBusquedaServicios(IN busqueda VARCHAR(100),IN  tipo_listado VARCHAR(20))
BEGIN
	IF (tipo_listado='TODO') THEN
		SELECT COUNT(S.idservicio) AS cantidad
			FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
			WHERE S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%') OR S.fecha_inicio LIKE CONCAT('%',busqueda,'%') OR S.fecha_fin LIKE CONCAT('%',busqueda,'%');
	ELSEIF (tipo_listado='ACTIVO') THEN
		SELECT COUNT(S.idservicio) AS cantidad
			FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
			WHERE (S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%') OR S.fecha_inicio LIKE CONCAT('%',busqueda,'%') OR S.fecha_fin LIKE CONCAT('%',busqueda,'%')) AND S.fecha_fin IS NULL;
	ELSE
		SELECT COUNT(S.idservicio) AS cantidad
			FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
			WHERE (S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%') OR S.fecha_inicio LIKE CONCAT('%',busqueda,'%') OR S.fecha_fin LIKE CONCAT('%',busqueda,'%')) AND S.fecha_fin IS NOT NULL;
	END IF;	
END$$
DELIMITER*/
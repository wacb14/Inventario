#INSERT INTO tresponsable VALUES (NULL,'JUAN ABEL','CCARITA MAMANI','JEFE DE AREA','CONTRATADO',NOW(),NOW());
#INSERT INTO tresponsable VALUES (NULL,'PEDRO MANUEL','ROMAN CUELLAR','JEFE DE AREA','NOMBRADO',NOW(),NOW());
#INSERT INTO tresponsable VALUES (NULL,'JOSE GABRIEL','FLOREZ CCOA','RESPONSABLE DIRECTIVO','NOMBRADO',NOW(),NOW());
#INSERT INTO tservicio VALUES (NULL,'CRED',1,NOW(),NOW());
#INSERT INTO tservicio VALUES (NULL,'ESTADISTICA',2,NOW(),NOW());
#INSERT INTO tservicio VALUES (NULL,'MEDICINA GENERAL',3,NOW(),NOW());

#ALTER TABLE tbien AUTO_INCREMENT=1;
#INSERT INTO tbien VALUES (NULL,'3','536565','COMPRADO','IMPRESORA LASER',1,'EPSON','1005','EX65435','PLOMO','65x14','NUEVO','FUNCIONAL','NINGUNA','1990/05/04',NOW(),NOW());
#INSERT INTO tbien VALUES (NULL,'1','536566','COMPRADO','IMPRESORA LASER',1,'EPSON','1005','EX65445','PLOMO','65x14','BUENA','FUNCIONAL','RODILLOS CAMBIADOS','1998/02/02',NOW(),NOW());
#INSERT INTO tbien VALUES (NULL,'3','454565','DONATIVO','MONITOR PANTALLA PLANA',1,'LG','EX-332','PR65465','NEGRO','40x24','NUEVO','FUNCIONAL','NINGUNA','2015/06/03',NOW(),NOW());
#INSERT INTO tbien VALUES (NULL,'2','841565','DONATIVO','MOUSE',1,'GENIUS','ER546','345R343','BLANCO','15x10','MEDIO','FUNCIONAL','EL SENSOR OPTICO NO FUNCIONA A VECES','2006/07/01',NOW(),NOW());

#ALTER TABLE tmovimiento AUTO_INCREMENT=1;
#INSERT INTO tmovimiento VALUES (NULL,'3','2017/02/02 20:00:05','3','PRESTAMO PARA LA CAMPAÑA DE VACUNACION','NINGUNA',NOW(),NOW());
#INSERT INTO tmovimiento VALUES (NULL,'1','2018/03/04','2','PRESTAMO PARA LA CAPACITACION DE NIÑO SANO','SE REALIZA EL PRESTAMO SIN EL CABLE',NOW(),NOW());
#INSERT INTO tmovimiento VALUES (NULL,'2','2020/11/01','1','FALTA DE EQUIPOS EN EL AREA','NINGUNA',NOW(),NOW());

#INSERT INTO users VALUES (NULL,'ADMIN','ADMIN','admin','admin12345',NOW(),NOW());

#DELIMITER $$
#CREATE PROCEDURE SP_recuperarPorID(IN id BIGINT)
#BEGIN
#	SELECT * FROM tbien WHERE idbien=id;
#END$$
#DELIMITER
#CALL SP_recuperarPorID(2)

#DELIMITER $$
#CREATE PROCEDURE SP_autoIdServicio(IN tableName VARCHAR(35))
#BEGIN
#SELECT AUTO_INCREMENT AS ID
#FROM  INFORMATION_SCHEMA.TABLES
#WHERE TABLE_SCHEMA = 'inventario'
#AND   TABLE_NAME   = tableName;
#END$$
#DELIMITER
#CALL SP_autoIdServicio('tservicio')

/*DELIMITER $$
CREATE PROCEDURE SP_listarResponsables(IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT idresponsable,nombres,apellidos FROM tresponsable
	LIMIT inicio,limite;
END$$
DELIMITER*/
#CALL SP_listarResponsables()

/*DELIMITER $$
CREATE PROCEDURE SP_listarServiciosResponsable(IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT S.idservicio,S.nombre, CONCAT(R.nombres,' ',R.apellidos) AS responsable
		FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
		LIMIT inicio,limite;
END$$
DELIMITER*/
#CALL SP_listarServiciosResponsable()

/*DELIMITER $$
CREATE PROCEDURE SP_listarMovimientosBienServicio(IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	CREATE TEMPORARY TABLE T1
		SELECT M.idmovimiento,B.nombre,M.fecha,M.idservicio
			FROM tmovimiento M INNER JOIN tbien B ON M.idbien=B.idbien;
	SELECT T.idmovimiento,T.nombre AS bien,T.fecha,S.nombre AS servicio
			FROM T1 T INNER JOIN tservicio S ON T.idservicio=S.idservicio
			LIMIT inicio,limite;
END$$
DELIMITER*/
#CALL SP_listarMovimientosBienServicio()

/*DELIMITER $$
CREATE PROCEDURE SP_listarBienesServicio(IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT B.idbien, B.nombre, S.nombre AS servicio, B.cod_patrimonial
		FROM tbien B INNER JOIN tservicio S ON B.idservicio=S.idservicio
		LIMIT inicio,limite;
END$$
DELIMITER*/
#CALL SP_listarBienesServicio(1,2)
/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaBienes(IN busqueda VARCHAR(100))
BEGIN
	SELECT B.idbien, B.nombre, S.nombre AS servicio, B.cod_patrimonial
		FROM tbien B INNER JOIN tservicio S ON B.idservicio=S.idservicio
		WHERE B.nombre LIKE CONCAT('%',busqueda,'%') OR B.idbien = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR B.cod_patrimonial = busqueda;
END$$
DELIMITER*/
#CALL SP_listarBusquedaBienesServicio('4')

/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaMovimientos(IN busqueda VARCHAR(100))
BEGIN
	CREATE TEMPORARY TABLE T1
		SELECT M.idmovimiento,B.nombre,M.fecha,M.idservicio
			FROM tmovimiento M INNER JOIN tbien B ON M.idbien=B.idbien;
	SELECT T.idmovimiento,T.nombre AS bien,T.fecha,S.nombre AS servicio
			FROM T1 T INNER JOIN tservicio S ON T.idservicio=S.idservicio
			WHERE T.idmovimiento = busqueda OR T.nombre LIKE CONCAT('%',busqueda,'%') OR T.fecha = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%');
END
$$ DELIMITER */

/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaResponsables(IN busqueda VARCHAR(100))
BEGIN
	SELECT *
		FROM tresponsable
		WHERE idresponsable = busqueda OR nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%');
END$$
DELIMITER*/

/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaServicios(IN busqueda VARCHAR(100))
BEGIN
	SELECT S.idservicio,S.nombre, CONCAT(R.nombres,' ',R.apellidos) AS responsable
		FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
		WHERE S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%');
END$$
DELIMITER*/

/*DELIMITER $$
CREATE PROCEDURE SP_listarBusquedaUsuarios(IN busqueda VARCHAR(100))
BEGIN
	SELECT id,nombres,apellidos,usuario
		FROM users
		WHERE nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%') OR usuario LIKE CONCAT('%',busqueda,'%');
END$$
DELIMITER*/

/*DELIMITER $$
CREATE PROCEDURE SP_listarUsuarios(IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT id,nombres,apellidos,usuario
	FROM users
	LIMIT inicio,limite;
END$$
DELIMITER*/
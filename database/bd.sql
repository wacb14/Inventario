-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para inventario
CREATE DATABASE IF NOT EXISTS `inventario` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventario`;

-- Volcando estructura para tabla inventario.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.migrations: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_05_16_221311_create_tresponsable_table', 1),
	(5, '2021_05_16_222350_create_tservicio_table', 1),
	(6, '2021_05_16_224224_create_tbien_table', 1),
	(7, '2021_05_16_233019_create_tmovimiento_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para procedimiento inventario.SP_autoId
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_autoId`(
	IN `tableName` VARCHAR(35)
)
BEGIN
SELECT AUTO_INCREMENT AS ID
FROM  INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'inventario'
AND   TABLE_NAME   = tableName;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_contarBusquedaBienes
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_contarBusquedaBienes`(IN busqueda VARCHAR(100), IN estado VARCHAR(15))
BEGIN
	SELECT COUNT(B.idbien) AS cantidad
		FROM tbien B INNER JOIN tservicio S ON B.idservicio=S.idservicio
		WHERE (B.nombre LIKE CONCAT('%',busqueda,'%') OR B.idbien = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR B.cod_patrimonial = busqueda) AND B.estado LIKE CONCAT('%',estado,'%');	
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_contarBusquedaMovimientos
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_contarBusquedaMovimientos`(IN busqueda VARCHAR(100))
BEGIN
	CREATE TEMPORARY TABLE T1
		SELECT M.idmovimiento,B.cod_patrimonial,M.fecha,M.idservicio
			FROM tmovimiento M INNER JOIN tbien B ON M.idbien=B.idbien;
	SELECT COUNT(T.idmovimiento) AS cantidad
		FROM T1 T INNER JOIN tservicio S ON T.idservicio=S.idservicio
		WHERE T.idmovimiento = busqueda OR T.cod_patrimonial=busqueda OR T.fecha LIKE CONCAT('%',busqueda,'%') OR S.nombre LIKE CONCAT('%',busqueda,'%');
	DROP TABLE T1;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_contarBusquedaResponsables
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_contarBusquedaResponsables`(IN busqueda VARCHAR(100))
BEGIN
	SELECT COUNT(idresponsable) AS cantidad
		FROM tresponsable
		WHERE idresponsable = busqueda OR nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%');
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_contarBusquedaServicios
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_contarBusquedaServicios`(IN busqueda VARCHAR(100))
BEGIN
	SELECT COUNT(S.idservicio) AS cantidad
		FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
		WHERE S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%');
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_contarBusquedaUsuarios
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_contarBusquedaUsuarios`(IN busqueda VARCHAR(100))
BEGIN
	SELECT COUNT(id) AS cantidad
		FROM users
		WHERE nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%') OR usuario LIKE CONCAT('%',busqueda,'%');
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaBienes
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaBienes`(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED, IN estado VARCHAR(15))
BEGIN
	SELECT B.idbien, B.nombre, S.nombre AS servicio, B.cod_patrimonial
		FROM tbien B INNER JOIN tservicio S ON B.idservicio=S.idservicio
		WHERE (B.nombre LIKE CONCAT('%',busqueda,'%') OR B.idbien = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR B.cod_patrimonial = busqueda) AND B.estado LIKE CONCAT('%',estado,'%')
		LIMIT inicio,limite;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaMovimientos
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaMovimientos`(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	CREATE TEMPORARY TABLE T1
		SELECT M.idmovimiento,B.cod_patrimonial,M.fecha,M.idservicio
			FROM tmovimiento M INNER JOIN tbien B ON M.idbien=B.idbien;
	SELECT T.idmovimiento,T.cod_patrimonial,T.fecha,S.nombre AS servicio
		FROM T1 T INNER JOIN tservicio S ON T.idservicio=S.idservicio
		WHERE T.idmovimiento = busqueda OR T.cod_patrimonial=busqueda OR T.fecha LIKE CONCAT('%',busqueda,'%') OR S.nombre LIKE CONCAT('%',busqueda,'%')
		LIMIT inicio,limite;
	DROP TABLE T1;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaResponsables
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaResponsables`(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT idresponsable, nombres, apellidos
		FROM tresponsable
		WHERE idresponsable = busqueda OR nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%')
		LIMIT inicio,limite;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaServicios
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaServicios`(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT S.idservicio,S.nombre, CONCAT(R.nombres,' ',R.apellidos) AS responsable
		FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
		WHERE S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%')
		LIMIT inicio,limite;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaUsuarios
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaUsuarios`(IN busqueda VARCHAR(100), IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT id,nombres,apellidos,usuario
		FROM users
		WHERE nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%') OR usuario LIKE CONCAT('%',busqueda,'%')
		LIMIT inicio,limite;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_recuperarPorID
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_recuperarPorID`(IN id BIGINT)
BEGIN
	SELECT * FROM tbien WHERE idbien=id;
END//
DELIMITER ;

-- Volcando estructura para tabla inventario.tbien
CREATE TABLE IF NOT EXISTS `tbien` (
  `idbien` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idservicio` bigint(20) unsigned NOT NULL,
  `cod_patrimonial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedencia` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `marca` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_serie` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medidas` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_conservacion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `fecha_ult_inventario` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idbien`),
  UNIQUE KEY `tbien_cod_patrimonial_unique` (`cod_patrimonial`),
  KEY `tbien_idservicio_foreign` (`idservicio`),
  CONSTRAINT `tbien_idservicio_foreign` FOREIGN KEY (`idservicio`) REFERENCES `tservicio` (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.tbien: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tbien` DISABLE KEYS */;
INSERT INTO `tbien` (`idbien`, `idservicio`, `cod_patrimonial`, `procedencia`, `nombre`, `cantidad`, `marca`, `modelo`, `num_serie`, `color`, `medidas`, `estado_conservacion`, `estado`, `observacion`, `fecha_adquisicion`, `fecha_ult_inventario`, `created_at`, `updated_at`) VALUES
	(1, 1, '536565', 'COMPRADO', 'IMPRESORA LASER', 1, 'EPSON', '1005', 'EX65435', 'PLOMO', '65x14', 'NUEVO', 'BAJA', 'NINGUNA2', '1990-05-04', '2021-07-19', '2021-07-03 19:47:31', '2021-07-19 03:39:56'),
	(3, 3, '454565', 'DONATIVO', 'MONITOR PANTALLA PLANA', 1, 'LG', 'EX-332', 'PR65465', 'NEGRO', '40x24', 'NUEVO', 'FUNCIONAL', 'NINGUNA', '2015-06-03', '2021-07-18', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(4, 2, '841565', 'DONATIVO', 'MOUSE', 1, 'GENIUS', 'ER546', '345R343', 'BLANCO', '15x10', 'MEDIO', 'FUNCIONAL', 'EL SENSOR OPTICO NO FUNCIONA A VECES', '2006-07-01', '2021-07-18', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(9, 3, '987987', '564466', 'TV LG', 1, '456456456', '456456456', '464655', '44646', '4654', '46446', 'BAJA', '45645645645646', '2021-07-07', '2021-07-18', '2021-07-04 04:09:15', '2021-07-18 23:30:13');
/*!40000 ALTER TABLE `tbien` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.tmovimiento
CREATE TABLE IF NOT EXISTS `tmovimiento` (
  `idmovimiento` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idbien` bigint(20) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `idservicio` bigint(20) unsigned NOT NULL,
  `motivo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idmovimiento`),
  KEY `tmovimiento_idbien_foreign` (`idbien`),
  KEY `tmovimiento_idservicio_foreign` (`idservicio`),
  CONSTRAINT `tmovimiento_idbien_foreign` FOREIGN KEY (`idbien`) REFERENCES `tbien` (`idbien`),
  CONSTRAINT `tmovimiento_idservicio_foreign` FOREIGN KEY (`idservicio`) REFERENCES `tservicio` (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.tmovimiento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tmovimiento` DISABLE KEYS */;
INSERT INTO `tmovimiento` (`idmovimiento`, `idbien`, `fecha`, `idservicio`, `motivo`, `observaciones`, `created_at`, `updated_at`) VALUES
	(2, 1, '2018-03-04', 2, 'PRESTAMO PARA LA CAPACITACION DE NIÑO SANO', 'SE REALIZA EL PRESTAMO SIN EL CABLE', '2021-07-03 19:47:31', '2021-07-23 16:46:21'),
	(11, 4, '2021-07-29', 1, '123', '123', '2021-07-20 15:26:10', '2021-07-20 15:26:10');
/*!40000 ALTER TABLE `tmovimiento` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.tresponsable
CREATE TABLE IF NOT EXISTS `tresponsable` (
  `idresponsable` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modalidad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idresponsable`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.tresponsable: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tresponsable` DISABLE KEYS */;
INSERT INTO `tresponsable` (`idresponsable`, `nombres`, `apellidos`, `cargo`, `modalidad`, `created_at`, `updated_at`) VALUES
	(1, 'JUAN ABEL', 'CCARITA MAMANI', 'JEFE DE AREA', 'CONTRATADO', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(2, 'PEDRO MANUEL', 'ROMAN CUELLAR', 'JEFE DE AREA', 'NOMBRADO', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(3, 'JOSE GABRIEL', 'FLOREZ CCOA', 'RESPONSABLE DIRECTIVO', 'NOMBRADO', '2021-07-03 19:47:31', '2021-07-03 19:47:31');
/*!40000 ALTER TABLE `tresponsable` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.tservicio
CREATE TABLE IF NOT EXISTS `tservicio` (
  `idservicio` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idresponsable` bigint(20) unsigned NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idservicio`),
  KEY `tservicio_idresponsable_foreign` (`idresponsable`),
  CONSTRAINT `tservicio_idresponsable_foreign` FOREIGN KEY (`idresponsable`) REFERENCES `tresponsable` (`idresponsable`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.tservicio: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tservicio` DISABLE KEYS */;
INSERT INTO `tservicio` (`idservicio`, `nombre`, `idresponsable`, `fecha_inicio`, `fecha_fin`, `created_at`, `updated_at`) VALUES
	(1, 'CRED', 1, '2021-07-16', NULL, '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(2, 'ESTADISTICA', 2, '2021-07-16', NULL, '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(3, 'MEDICINA GENERAL', 3, '2021-07-16', NULL, '2021-07-03 19:47:31', '2021-07-03 19:47:31');
/*!40000 ALTER TABLE `tservicio` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_usuario_unique` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nombres`, `apellidos`, `usuario`, `tipo_usuario`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'ADMIN', 'ADMIN', 'admin', 'ADMINISTRADOR', '$2y$10$vJy33so1szW3gJPMizSELuoap7OwhSohsw3jL5eFYDOmCxXeTDeam', NULL, '2021-07-03 20:01:32', '2021-07-03 20:01:32'),
	(2, 'Willy Aldair', 'Cruz Bejar', 'wacb14', 'ADMINISTRADOR', '$2y$10$RICaPp/Of17g9aiuHTIdmOWsAlKqW.FJu2KaaOM2B6i8yy5MKURIm', NULL, '2021-07-09 03:49:19', '2021-07-09 03:49:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para disparador inventario.TG_actualizarServicioBien
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TG_actualizarServicioBien` BEFORE INSERT ON `tmovimiento` FOR EACH ROW BEGIN
		SET @newidbien=NEW.idbien;
		SET @newidservicio=NEW.idservicio;
		UPDATE tbien
		SET idservicio=@newidservicio
		WHERE idbien=@newidbien;
	END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

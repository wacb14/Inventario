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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.migrations: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2021_05_16_221311_create_tresponsable_table', 1),
	(2, '2021_05_16_222350_create_tservicio_table', 1),
	(3, '2021_05_16_224224_create_tbien_table', 1),
	(4, '2021_05_16_233019_create_tmovimiento_table', 1),
	(5, '2021_05_16_233459_create_tusuario_table', 1),
	(9, '2014_10_12_000000_create_users_table', 2),
	(10, '2014_10_12_100000_create_password_resets_table', 2),
	(11, '2019_08_19_000000_create_failed_jobs_table', 2);
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

-- Volcando estructura para procedimiento inventario.SP_listarBienesServicio
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBienesServicio`(IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT B.idbien, B.nombre, S.nombre AS servicio, B.cod_patrimonial
		FROM tbien B INNER JOIN tservicio S ON B.idservicio=S.idservicio
		LIMIT inicio,limite;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaBienes
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaBienes`(
	IN `busqueda` VARCHAR(100)



)
BEGIN
	SELECT B.idbien, B.nombre, S.nombre AS servicio, B.cod_patrimonial
		FROM tbien B INNER JOIN tservicio S ON B.idservicio=S.idservicio
		WHERE B.nombre LIKE CONCAT('%',busqueda,'%') OR B.idbien = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR B.cod_patrimonial = busqueda;			
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaMovimientos
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaMovimientos`(IN busqueda VARCHAR(100))
BEGIN
	CREATE TEMPORARY TABLE T1
		SELECT M.idmovimiento,B.nombre,M.fecha,M.idservicio
			FROM tmovimiento M INNER JOIN tbien B ON M.idbien=B.idbien;
	SELECT T.idmovimiento,T.nombre AS bien,T.fecha,S.nombre AS servicio
			FROM T1 T INNER JOIN tservicio S ON T.idservicio=S.idservicio
			WHERE T.idmovimiento = busqueda OR T.nombre LIKE CONCAT('%',busqueda,'%') OR T.fecha = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%');
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaResponsables
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaResponsables`(IN busqueda VARCHAR(100))
BEGIN
	SELECT *
		FROM tresponsable
		WHERE idresponsable = busqueda OR nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%');
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaServicios
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaServicios`(IN busqueda VARCHAR(100))
BEGIN
	SELECT S.idservicio,S.nombre, CONCAT(R.nombres,' ',R.apellidos) AS responsable
		FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
		WHERE S.idservicio = busqueda OR S.nombre LIKE CONCAT('%',busqueda,'%') OR CONCAT(R.nombres,' ',R.apellidos) LIKE CONCAT('%',busqueda,'%');
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarBusquedaUsuarios
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarBusquedaUsuarios`(
	IN `busqueda` VARCHAR(100)
)
BEGIN
	SELECT id,nombres,apellidos,usuario
		FROM users
		WHERE nombres LIKE CONCAT('%',busqueda,'%') OR apellidos LIKE CONCAT('%',busqueda,'%') OR usuario LIKE CONCAT('%',busqueda,'%');
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarMovimientosBienServicio
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarMovimientosBienServicio`(IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	CREATE TEMPORARY TABLE T1
		SELECT M.idmovimiento,B.nombre,M.fecha,M.idservicio
			FROM tmovimiento M INNER JOIN tbien B ON M.idbien=B.idbien;
	SELECT T.idmovimiento,T.nombre AS bien,T.fecha,S.nombre AS servicio
			FROM T1 T INNER JOIN tservicio S ON T.idservicio=S.idservicio
			LIMIT inicio,limite;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarResponsables
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarResponsables`(IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT idresponsable,nombres,apellidos FROM tresponsable
	LIMIT inicio,limite;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarServiciosResponsable
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarServiciosResponsable`(IN inicio SMALLINT UNSIGNED, IN limite SMALLINT UNSIGNED)
BEGIN
	SELECT S.idservicio,S.nombre, CONCAT(R.nombres,' ',R.apellidos) AS responsable
		FROM tservicio S INNER JOIN tresponsable R ON S.idresponsable=R.idresponsable
		LIMIT inicio,limite;
END//
DELIMITER ;

-- Volcando estructura para procedimiento inventario.SP_listarUsuarios
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_listarUsuarios`(
	IN `inicio` SMALLINT UNSIGNED,
	IN `limite` SMALLINT UNSIGNED
)
BEGIN
	SELECT id,nombres,apellidos,usuario
	FROM users
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
  `cod_patrimonial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idbien`),
  KEY `tbien_idservicio_foreign` (`idservicio`),
  CONSTRAINT `tbien_idservicio_foreign` FOREIGN KEY (`idservicio`) REFERENCES `tservicio` (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.tbien: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tbien` DISABLE KEYS */;
INSERT INTO `tbien` (`idbien`, `idservicio`, `cod_patrimonial`, `procedencia`, `nombre`, `cantidad`, `marca`, `modelo`, `num_serie`, `color`, `medidas`, `estado_conservacion`, `estado`, `observacion`, `fecha_adquisicion`, `created_at`, `updated_at`) VALUES
	(1, 3, '536565', 'COMPRADO', 'IMPRESORA LASER', 1, 'EPSON', '1005', 'EX65435', 'PLOMO', '65x14', 'NUEVO', 'FUNCIONAL', 'NINGUNA', '1990-05-04', '2021-05-25 16:10:28', '2021-05-25 16:10:28'),
	(2, 1, '536566', 'COMPRADO', 'IMPRESORA LASER XP', 1, 'EPSON', '1005', 'EX65445', 'PLOMO', '65x14', 'BUENA', 'FUNCIONAL', 'RODILLOS CAMBIADOS', '1998-02-02', '2021-05-25 16:10:28', '2021-06-05 22:05:26'),
	(3, 3, '454565', 'DONATIVO', 'MONITOR PANTALLA PLANA', 1, 'LG', 'EX-332', 'PR65465', 'NEGRO5', '40x24', 'NUEVO', 'FUNCIONAL', 'NINGUNA', '2015-06-03', '2021-05-25 16:10:28', '2021-06-02 01:58:48'),
	(4, 2, '841565', 'DONATIVO', 'MOUSE', 1, 'GENIUS', 'ER546', '345R343', 'BLANCO', '15x10', 'MEDIO', 'FUNCIONAL', 'EL SENSOR OPTICO NO FUNCIONA A VECES', '2006-07-01', '2021-05-25 16:10:28', '2021-05-25 16:10:28');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.tmovimiento: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tmovimiento` DISABLE KEYS */;
INSERT INTO `tmovimiento` (`idmovimiento`, `idbien`, `fecha`, `idservicio`, `motivo`, `observaciones`, `created_at`, `updated_at`) VALUES
	(1, 4, '2018-03-01', 3, 'PRESTAMO PARA LA CAPACITACION DE NIÑO SANO', 'SE REALIZA EL PRESTAMO SIN EL CABLE', '2021-05-25 16:13:02', '2021-06-05 22:01:22'),
	(2, 2, '2020-11-01', 1, 'FALTA DE EQUIPOS EN EL AREA', 'NINGUNA', '2021-05-25 16:13:02', '2021-05-25 16:13:02'),
	(3, 3, '2017-02-02', 3, 'PRESTAMO PARA LA CAMPAÑA DE VACUNACION', 'NINGUNA', '2021-05-25 16:15:38', '2021-05-25 16:15:38'),
	(6, 2, '2021-06-16', 2, 'NO SE', 'NINGUNA', '2021-06-05 21:23:40', '2021-06-05 21:23:40');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.tresponsable: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `tresponsable` DISABLE KEYS */;
INSERT INTO `tresponsable` (`idresponsable`, `nombres`, `apellidos`, `cargo`, `modalidad`, `created_at`, `updated_at`) VALUES
	(1, 'JUAN ABEL', 'CCARITA MAMANI', 'JEFE DE AREA', 'CONTRATADO', '2021-05-23 16:27:32', '2021-05-23 16:27:32'),
	(2, 'PEDRO MANUEL', 'ROMAN CUELLAR', 'JEFE DE AREA', 'NOMBRADO', '2021-05-23 16:27:32', '2021-05-23 16:27:32'),
	(3, 'JOSE GABRIELO', 'FLOREZ CCOA', 'RESPONSABLE DIRECTIVO', 'NOMBRADO', '2021-05-23 16:27:32', '2021-06-20 12:20:59'),
	(5, 'QWAS', 'ASD', 'ASDAD', 'ASDAD', '2021-06-20 12:23:22', '2021-06-20 12:23:22'),
	(6, 'ASDAD', 'ASDAD', 'ASDAD', 'AAAA', '2021-06-20 12:23:29', '2021-06-20 12:23:29'),
	(7, 'PEDRO', 'SDFSF', 'SDFSDF', 'SDFSF', '2021-06-20 12:23:38', '2021-06-20 17:10:24'),
	(8, 'SDFSFS', 'SDFSF', 'SFSFS', 'SSSS', '2021-06-20 12:23:46', '2021-06-20 12:23:46'),
	(10, 'WERWRW', 'WERWRRW', 'WRWWW', 'WWWW', '2021-06-20 12:24:02', '2021-06-20 12:24:02'),
	(11, 'WWWWWEEE', 'WWWW', 'WWW', 'EEE', '2021-06-20 12:24:11', '2021-06-20 12:24:11'),
	(12, 'EEE', 'EE', 'EE', 'EEE', '2021-06-20 12:24:17', '2021-06-20 12:24:17'),
	(13, 'WERWR', 'WERW', 'WR', 'WW', '2021-06-20 12:24:23', '2021-06-20 12:24:23'),
	(14, 'TTTT', 'TTT', 'TTT', 'TTT', '2021-06-20 12:24:31', '2021-06-20 12:24:31'),
	(15, 'WRWWR', 'WRWRWR', 'WRWRWRW', 'WRWRWR', '2021-06-20 12:24:38', '2021-06-20 12:24:38'),
	(16, 'DGDGDDDDDD', 'DGDGD', 'DDDD', 'DDDDD', '2021-06-20 12:24:48', '2021-06-20 12:24:48'),
	(17, 'adad', 'adad', 'adad', 'adada', '2021-06-21 13:37:01', '2021-06-21 13:37:01');
/*!40000 ALTER TABLE `tresponsable` ENABLE KEYS */;

-- Volcando estructura para tabla inventario.tservicio
CREATE TABLE IF NOT EXISTS `tservicio` (
  `idservicio` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idresponsable` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idservicio`),
  KEY `tservicio_idresponsable_foreign` (`idresponsable`),
  CONSTRAINT `tservicio_idresponsable_foreign` FOREIGN KEY (`idresponsable`) REFERENCES `tresponsable` (`idresponsable`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.tservicio: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tservicio` DISABLE KEYS */;
INSERT INTO `tservicio` (`idservicio`, `nombre`, `idresponsable`, `created_at`, `updated_at`) VALUES
	(1, 'CRED', 2, '2021-05-23 16:27:32', '2021-06-05 21:51:33'),
	(2, 'ESTADISTICA', 1, '2021-05-23 16:27:32', '2021-06-05 21:51:50'),
	(3, 'MEDICINA GENERAL', 3, '2021-05-23 16:27:32', '2021-05-23 16:27:32');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla inventario.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nombres`, `apellidos`, `usuario`, `tipo_usuario`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Willy Aldair', 'Cruz Bejar', 'wacb14', 'ADMINISTRADOR', '$2y$10$ctaQ0vhiY4kXp5dJRHAC0e7d.TRT/8VltA4K.5DEF3l3LJ4RChbgK', NULL, '2021-06-24 23:39:12', '2021-07-02 16:28:07'),
	(2, 'Juan Manuel', 'Roman Cuellar', 'juan_roman', 'COMUN', '$2y$10$c8XISCtP1Q1qP3craJKtrefwVsvAHGYXOYmZLMqjT5s.VHBbEUCYG', NULL, '2021-06-25 14:36:52', '2021-07-02 17:26:47'),
	(3, 'Juan Pablo', 'Pumaorcco Quispe', 'juan_pablo', 'COMUN', '$2y$10$EGSelAo3eTdWBWFKYDif1epmA82QcuQsdexkGHmVmnNWluB5DTO8.', NULL, '2021-06-28 12:24:56', '2021-07-02 17:56:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

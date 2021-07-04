-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla inventario.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

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

-- Volcando datos para la tabla inventario.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando datos para la tabla inventario.tbien: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `tbien` DISABLE KEYS */;
INSERT INTO `tbien` (`idbien`, `idservicio`, `cod_patrimonial`, `procedencia`, `nombre`, `cantidad`, `marca`, `modelo`, `num_serie`, `color`, `medidas`, `estado_conservacion`, `estado`, `observacion`, `fecha_adquisicion`, `created_at`, `updated_at`) VALUES
	(1, 3, '536565', 'COMPRADO', 'IMPRESORA LASER', 1, 'EPSON', '1005', 'EX65435', 'PLOMO', '65x14', 'NUEVO', 'FUNCIONAL', 'NINGUNA2', '1990-05-04', '2021-07-03 19:47:31', '2021-07-04 04:13:03'),
	(2, 1, '536566', 'COMPRADO', 'IMPRESORA LASER', 1, 'EPSON', '1005', 'EX65445', 'PLOMO', '65x14', 'BUENA', 'FUNCIONAL', 'RODILLOS CAMBIADOS', '1998-02-02', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(3, 3, '454565', 'DONATIVO', 'MONITOR PANTALLA PLANA', 1, 'LG', 'EX-332', 'PR65465', 'NEGRO', '40x24', 'NUEVO', 'FUNCIONAL', 'NINGUNA', '2015-06-03', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(4, 2, '841565', 'DONATIVO', 'MOUSE', 1, 'GENIUS', 'ER546', '345R343', 'BLANCO', '15x10', 'MEDIO', 'FUNCIONAL', 'EL SENSOR OPTICO NO FUNCIONA A VECES', '2006-07-01', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(5, 3, '536565', 'COMPRADO', 'IMPRESORA LASER', 1, 'EPSON', '1005', 'EX65435', 'PLOMO', '65x14', 'NUEVO', 'FUNCIONAL', 'NINGUNA', '1990-05-04', '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(6, 1, '536566', 'COMPRADO', 'IMPRESORA LASER', 1, 'EPSON', '1005', 'EX65445', 'PLOMO', '65x14', 'BUENA', 'FUNCIONAL', 'RODILLOS CAMBIADOS', '1998-02-02', '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(7, 3, '454565', 'DONATIVO', 'MONITOR PANTALLA PLANA', 1, 'LG', 'EX-332', 'PR65465', 'NEGRO', '40x24', 'NUEVO', 'FUNCIONAL', 'NINGUNA', '2015-06-03', '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(8, 2, '841565', 'DONATIVO', 'MOUSE', 1, 'GENIUS', 'ER546', '345R343', 'BLANCO', '15x10', 'MEDIO', 'FUNCIONAL', 'EL SENSOR OPTICO NO FUNCIONA A VECES', '2006-07-01', '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(9, 1, '454', '564466', '45654645', 10, '456456456', '456456456', '46465', '44646', '4654', '46446', '4', '45645645645646', '2021-07-07', '2021-07-04 04:09:15', '2021-07-04 04:09:15');
/*!40000 ALTER TABLE `tbien` ENABLE KEYS */;

-- Volcando datos para la tabla inventario.tmovimiento: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `tmovimiento` DISABLE KEYS */;
INSERT INTO `tmovimiento` (`idmovimiento`, `idbien`, `fecha`, `idservicio`, `motivo`, `observaciones`, `created_at`, `updated_at`) VALUES
	(1, 3, '2017-02-02', 3, 'PRESTAMO PARA LA CAMPAÑA DE VACUNACION', 'NINGUNA', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(2, 1, '2018-03-04', 2, 'PRESTAMO PARA LA CAPACITACION DE NIÑO SANO', 'SE REALIZA EL PRESTAMO SIN EL CABLE', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(3, 2, '2020-11-01', 1, 'FALTA DE EQUIPOS EN EL AREA', 'NINGUNA', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(4, 3, '2017-02-02', 3, 'PRESTAMO PARA LA CAMPAÑA DE VACUNACION', 'NINGUNA', '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(5, 1, '2018-03-04', 2, 'PRESTAMO PARA LA CAPACITACION DE NIÑO SANO', 'SE REALIZA EL PRESTAMO SIN EL CABLE', '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(6, 2, '2020-11-01', 1, 'FALTA DE EQUIPOS EN EL AREA', 'NINGUNA', '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(7, 1, '2021-06-30', 1, '45666666666', '4564646464664', '2021-07-04 04:30:12', '2021-07-04 04:30:12'),
	(8, 9, '2021-06-29', 1, '44444\r\n4546564', '456446466', '2021-07-04 04:30:43', '2021-07-04 04:30:43'),
	(9, 8, '2021-07-03', 1, '45444\r\n454444', '4444444444444', '2021-07-04 04:32:58', '2021-07-04 04:32:58'),
	(10, 9, '2021-07-03', 1, 'perro\r\ngato', '4564464646', '2021-07-04 04:34:03', '2021-07-04 04:34:03');
/*!40000 ALTER TABLE `tmovimiento` ENABLE KEYS */;

-- Volcando datos para la tabla inventario.tresponsable: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tresponsable` DISABLE KEYS */;
INSERT INTO `tresponsable` (`idresponsable`, `nombres`, `apellidos`, `cargo`, `modalidad`, `created_at`, `updated_at`) VALUES
	(1, 'JUAN ABEL', 'CCARITA MAMANI', 'JEFE DE AREA', 'CONTRATADO', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(2, 'PEDRO MANUEL', 'ROMAN CUELLAR', 'JEFE DE AREA', 'NOMBRADO', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(3, 'JOSE GABRIEL', 'FLOREZ CCOA', 'RESPONSABLE DIRECTIVO', 'NOMBRADO', '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(4, 'JUAN ABEL', 'CCARITA MAMANI', 'JEFE DE AREA', 'CONTRATADO', '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(5, 'PEDRO MANUEL', 'ROMAN CUELLAR', 'JEFE DE AREA', 'NOMBRADO', '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(6, 'JOSE GABRIEL', 'FLOREZ CCOA', 'RESPONSABLE DIRECTIVO', 'NOMBRADO', '2021-07-03 19:48:20', '2021-07-03 19:48:20');
/*!40000 ALTER TABLE `tresponsable` ENABLE KEYS */;

-- Volcando datos para la tabla inventario.tservicio: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tservicio` DISABLE KEYS */;
INSERT INTO `tservicio` (`idservicio`, `nombre`, `idresponsable`, `created_at`, `updated_at`) VALUES
	(1, 'CRED', 1, '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(2, 'ESTADISTICA', 2, '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(3, 'MEDICINA GENERAL', 3, '2021-07-03 19:47:31', '2021-07-03 19:47:31'),
	(4, 'CRED', 1, '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(5, 'ESTADISTICA', 2, '2021-07-03 19:48:20', '2021-07-03 19:48:20'),
	(6, 'MEDICINA GENERAL', 3, '2021-07-03 19:48:20', '2021-07-03 19:48:20');
/*!40000 ALTER TABLE `tservicio` ENABLE KEYS */;

-- Volcando datos para la tabla inventario.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nombres`, `apellidos`, `usuario`, `tipo_usuario`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'ADMIN', 'ADMIN', 'admin', 'ADMINISTRADOR', '$2y$10$vJy33so1szW3gJPMizSELuoap7OwhSohsw3jL5eFYDOmCxXeTDeam', NULL, '2021-07-03 20:01:32', '2021-07-03 20:01:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;


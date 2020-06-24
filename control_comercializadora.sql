-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2020 a las 01:15:58
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_comercializadora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aduanas`
--

CREATE TABLE `aduanas` (
  `id` int(2) NOT NULL,
  `nombre_aduana` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aduanas`
--

INSERT INTO `aduanas` (`id`, `nombre_aduana`, `created_at`, `updated_at`) VALUES
(1, 'PROGRESO', '2020-06-01 23:07:54', '2020-06-01 23:07:54'),
(2, 'CANCUN', '2020-06-03 21:24:02', '2020-06-03 21:24:02'),
(3, 'MERIDA', '2020-06-03 21:24:10', '2020-06-03 21:24:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(2) UNSIGNED NOT NULL,
  `nombre_cliente` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_cliente`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'seadrill obreron', 1, '2020-06-02 15:15:20', '0000-00-00 00:00:00'),
(2, 'COTEMAR', 1, '2020-06-02 15:15:22', '2020-06-02 10:51:46'),
(3, 'PALACE RESORT', NULL, '2020-06-04 23:41:40', '2020-06-04 23:41:40'),
(4, 'PROTEINAS Y OLEICOS', NULL, '2020-06-09 22:48:22', '2020-06-09 22:48:22'),
(5, 'SEAMARITIMA', NULL, '2020-06-09 22:48:34', '2020-06-09 22:48:34'),
(10, 'POLIJJJ', NULL, '2020-06-24 03:13:11', '2020-06-24 03:13:11'),
(11, 'POLIDUCTOS', NULL, '2020-06-24 03:14:39', '2020-06-24 03:14:39'),
(12, 'QWERTY', NULL, '2020-06-24 10:21:08', '2020-06-24 10:21:08'),
(13, 'DEFASI', NULL, '2020-06-24 10:22:24', '2020-06-24 10:22:24'),
(14, 'PLAYA HOTEL', NULL, '2020-06-24 10:24:50', '2020-06-24 10:24:50'),
(15, 'SEADRILL DEFENDER', NULL, '2020-06-24 10:26:24', '2020-06-24 10:26:24'),
(16, 'COURAGENOS', NULL, '2020-06-24 10:29:51', '2020-06-24 10:29:51'),
(17, 'KEKEN', NULL, '2020-06-24 10:39:06', '2020-06-24 10:39:06'),
(18, 'SEADRILL JACK UP', NULL, '2020-06-24 10:50:57', '2020-06-24 10:50:57'),
(22, 'TOSKAY ENTREPRISE', NULL, '2020-06-24 11:00:27', '2020-06-24 11:00:27'),
(23, 'SERVICIOS INDUSTRIALES', NULL, '2020-06-24 11:04:46', '2020-06-24 11:04:46'),
(24, 'GEOVANNY', NULL, '2020-06-24 23:31:04', '2020-06-24 23:31:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejecutivos`
--

CREATE TABLE `ejecutivos` (
  `id` int(2) NOT NULL,
  `nombre_ejecutivo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ejecutivos`
--

INSERT INTO `ejecutivos` (`id`, `nombre_ejecutivo`, `created_at`, `updated_at`) VALUES
(1, 'CAROLINA PORTILLO PIZARRO', '2020-06-03 21:23:43', '2020-06-03 21:23:43'),
(2, 'ANNEKE SILVA', '2020-06-03 21:23:52', '2020-06-03 21:23:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id` int(2) NOT NULL,
  `nombre_estatus` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `nombre_estatus`, `created_at`, `updated_at`) VALUES
(1, 'ESTATUS 1', '2020-06-03 21:23:30', '2020-06-03 21:23:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_externo`
--

CREATE TABLE `proveedor_externo` (
  `id` int(2) NOT NULL,
  `nombre_proveedor` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor_externo`
--

INSERT INTO `proveedor_externo` (`id`, `nombre_proveedor`, `created_at`, `updated_at`) VALUES
(1, 'APURA SEADRILL', '2020-06-03 21:23:01', '2020-06-03 21:23:01'),
(2, 'PROVEEDOR 2', '2020-06-03 21:23:12', '2020-06-03 21:23:12'),
(3, 'COTEMAR', '2020-06-25 00:50:30', '2020-06-25 00:50:30'),
(4, 'ENERGY SOLAR', '2020-06-25 00:56:53', '2020-06-25 00:56:53'),
(5, 'SEADRILL NUEVO', '2020-06-25 00:58:06', '2020-06-25 00:58:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razon_social_datos_fac`
--

CREATE TABLE `razon_social_datos_fac` (
  `id` int(2) NOT NULL,
  `nombre_razon` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `razon_social_datos_fac`
--

INSERT INTO `razon_social_datos_fac` (`id`, `nombre_razon`, `created_at`, `updated_at`) VALUES
(1, 'SEADRILL', '2020-06-02 00:31:15', '2020-06-02 00:31:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(2) NOT NULL,
  `no_operacion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cliente` int(30) NOT NULL,
  `id_razon_datos_fac` int(30) NOT NULL,
  `ruta_razonsocial` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `contacto_facturas_pagos` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `forma_pago` int(2) DEFAULT NULL,
  `pagamos_mercancia` int(2) DEFAULT NULL,
  `id_proveedor` int(30) NOT NULL,
  `ruta_proveedor` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `valor_factura_ext` int(30) DEFAULT NULL,
  `ruta_factura_ext` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `se_emite_factura` int(2) DEFAULT NULL,
  `se_factura_valor_mercancia` int(2) DEFAULT NULL,
  `id_aduana` int(2) NOT NULL,
  `id_ejecutivo` int(2) NOT NULL,
  `id_estatus` int(2) NOT NULL,
  `descripcion_operacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `eta` date DEFAULT NULL,
  `fecha_despacho` date DEFAULT NULL,
  `cotizacion_cliente_mxp` int(10) DEFAULT NULL,
  `ruta_cotizacion_cliente` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `observaciones` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_deposito_cliente` date DEFAULT NULL,
  `importe_deposito_cliente` int(10) DEFAULT NULL,
  `ruta_importe_deposito_cliente` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `referencia` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `no_pedimento` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ruta_pedimento` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `importe_cg` int(10) DEFAULT NULL,
  `fecha_cg` date DEFAULT NULL,
  `folio_cg` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ruta_folio_cg` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `importe_facturado_cliente` int(10) DEFAULT NULL,
  `ruta_facturado_cliente` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `costeo_total` int(10) DEFAULT NULL,
  `ruta_costeo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cierre` int(2) DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `id_user` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `no_operacion`, `id_cliente`, `id_razon_datos_fac`, `ruta_razonsocial`, `contacto_facturas_pagos`, `forma_pago`, `pagamos_mercancia`, `id_proveedor`, `ruta_proveedor`, `valor_factura_ext`, `ruta_factura_ext`, `se_emite_factura`, `se_factura_valor_mercancia`, `id_aduana`, `id_ejecutivo`, `id_estatus`, `descripcion_operacion`, `eta`, `fecha_despacho`, `cotizacion_cliente_mxp`, `ruta_cotizacion_cliente`, `observaciones`, `fecha_deposito_cliente`, `importe_deposito_cliente`, `ruta_importe_deposito_cliente`, `referencia`, `no_pedimento`, `ruta_pedimento`, `importe_cg`, `fecha_cg`, `folio_cg`, `ruta_folio_cg`, `importe_facturado_cliente`, `ruta_facturado_cliente`, `costeo_total`, `ruta_costeo`, `cierre`, `fecha_cierre`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'TT1', 2, 1, NULL, '', 1, 1, 1, NULL, NULL, NULL, 1, 1, 2, 2, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-05 00:08:18', '2020-06-05 00:08:18'),
(2, 'TT2', 3, 1, 'Razon_TT2_dias_despacho_progreso.pdf', 'PRUEBA', 1, 1, 1, NULL, 2542, NULL, 1, 1, 2, 2, 1, '', NULL, NULL, NULL, NULL, 'EJEMPLO OBSERVACION', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-23 20:45:23', '2020-06-24 01:45:23'),
(3, 'TT3', 5, 1, 'Razon_TT3_dias_despacho_cancun.pdf', 'PRUEBA', 1, 1, 1, NULL, NULL, NULL, 1, 1, 2, 2, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-09 22:49:07', '2020-06-09 22:49:07'),
(4, 'TT4', 5, 1, 'Razon_TT4_dias_despacho_progreso.pdf', '', 2, 2, 1, NULL, NULL, NULL, 1, 1, 2, 2, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-17', 1, '2020-06-15 21:23:18', '2020-06-16 02:23:18'),
(5, 'TT5', 5, 1, NULL, '', 2, 2, 1, NULL, NULL, NULL, 1, 1, 2, 2, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-24 01:54:32', '2020-06-24 01:54:32'),
(6, 'TT6', 2, 1, 'Razon_TT6_dias_despacho_cancun.pdf', '', 1, 1, 1, NULL, 5678, 'facturaext_TT6_dias_despacho_merida.pdf', 2, 1, 2, 2, 1, '', '2020-06-10', '2020-06-17', 6757, 'Cotizacion_TT6_dias_despacho_progreso.pdf', '', '2020-06-25', NULL, NULL, '', '', NULL, 6767, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-23 21:00:23', '2020-06-24 02:00:23'),
(7, 'TT7', 2, 1, NULL, '', 1, 1, 1, NULL, NULL, NULL, 1, 1, 2, 2, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-24 02:30:00', '2020-06-24 02:30:00'),
(8, 'TT8', 2, 1, NULL, '', 1, 1, 1, NULL, NULL, NULL, 1, 1, 2, 2, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-23 21:31:04', '2020-06-24 02:30:18'),
(9, 'TT9', 12, 1, NULL, '', 1, 1, 1, NULL, NULL, NULL, 1, 1, 2, 2, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-24 10:21:47', '2020-06-24 10:21:47'),
(10, 'TT10', 16, 1, NULL, '', 1, 1, 1, NULL, NULL, NULL, 1, 1, 2, 2, 1, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-06-24 10:30:06', '2020-06-24 10:30:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backup_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` int(2) NOT NULL,
  `nivel` int(2) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `user`, `email`, `backup_password`, `password`, `estatus`, `nivel`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador Sistema', 'admin', 'geovannyp@aduanaldelvalle.mx', '123456', '$2y$10$o9MAyHFgbUfLueZ4e87rROZRIcEFWkeF8YzdRe6ERDXsZJZObVwOS', 1, 1, 'gCKmCqiJbwK1bNvgIiC1sdEvPKC1BSoSAwpRPcHlF388U87ZaP97Xi6Rnr3U', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aduanas`
--
ALTER TABLE `aduanas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ejecutivos`
--
ALTER TABLE `ejecutivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `proveedor_externo`
--
ALTER TABLE `proveedor_externo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `razon_social_datos_fac`
--
ALTER TABLE `razon_social_datos_fac`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aduanas`
--
ALTER TABLE `aduanas`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `ejecutivos`
--
ALTER TABLE `ejecutivos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor_externo`
--
ALTER TABLE `proveedor_externo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `razon_social_datos_fac`
--
ALTER TABLE `razon_social_datos_fac`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

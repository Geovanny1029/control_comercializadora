-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2020 a las 16:26:25
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id` int(100) NOT NULL,
  `nombre_pago` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
  `tipo_operacion` int(2) NOT NULL,
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
(1, 'Administrador Sistema', 'admin', 'geovannyp@aduanaldelvalle.mx', '123456', '$2y$10$o9MAyHFgbUfLueZ4e87rROZRIcEFWkeF8YzdRe6ERDXsZJZObVwOS', 1, 1, 'n6UwoY0fDtIoKyukhIjjbZfawt9yqiEX3H6FbEuIA6KVSoWctIfJz0aHpttc', NULL, NULL),
(2, 'GEOVANNY PEREZ', 'GEOVANNYP', 'jose_32127@hotmail.com', 'G190190', '$2y$10$wXJf.tyTcgpvGG5TnN6SPuoh8fuFZSnog.MieyPs2bzXwCQW3jqkO', 1, 1, NULL, '2020-06-28 00:18:30', '2020-06-28 00:18:53');

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
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
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
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejecutivos`
--
ALTER TABLE `ejecutivos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor_externo`
--
ALTER TABLE `proveedor_externo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

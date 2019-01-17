-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2018 a las 09:51:39
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bolsaempleo`
--
CREATE DATABASE IF NOT EXISTS `bolsaempleo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bolsaempleo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `puesto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcion_realizada` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_empresa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mes_anyo_inicio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mes_anyo_fin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `experiencias`
--

INSERT INTO `experiencias` (`id`, `puesto`, `funcion_realizada`, `empresa`, `sector_empresa`, `mes_anyo_inicio`, `mes_anyo_fin`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Camarero', 'Servir platos', 'Burguer king', 'Alimentación y restauración', '02-2000', '06-2006', 2, '2018-06-10 19:38:10', '2018-06-11 06:37:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacions`
--

CREATE TABLE `formacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `centro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finalizado` tinyint(4) NOT NULL DEFAULT '0',
  `anyo_finalizacion` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `formacions`
--

INSERT INTO `formacions` (`id`, `titulo`, `grado`, `centro`, `finalizado`, `anyo_finalizacion`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'ESO', 'Secundaria', 'Salesianos', 1, 2016, 2, '2018-06-10 19:40:47', '2018-06-10 19:41:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` int(10) UNSIGNED NOT NULL,
  `idioma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_hablado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_escrito` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_oficial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `idioma`, `nivel_hablado`, `nivel_escrito`, `titulo_oficial`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Ingles', 'A1', 'A1', 'Cambridge', 2, '2018-06-10 19:41:11', '2018-06-10 19:41:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscribes`
--

CREATE TABLE `inscribes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_oferta` int(10) UNSIGNED NOT NULL,
  `seleccionado` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inscribes`
--

INSERT INTO `inscribes` (`id`, `id_user`, `id_oferta`, `seleccionado`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '2018-06-10 19:52:48', '2018-06-10 19:55:45'),
(2, 3, 3, 1, '2018-06-10 19:53:00', '2018-06-10 19:55:56'),
(3, 2, 2, 0, '2018-06-10 19:53:58', '2018-06-10 19:53:58'),
(4, 2, 3, 1, '2018-06-10 19:54:06', '2018-06-10 19:55:54');

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
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2018_03_12_084747_create_formacions_table', 1),
(31, '2018_03_12_084803_create_idiomas_table', 1),
(32, '2018_03_12_084830_create_experiencias_table', 1),
(33, '2018_03_12_084851_create_titulos_table', 1),
(34, '2018_03_12_084904_create_sectores_table', 1),
(35, '2018_03_15_122143_create_ofertas_table', 1),
(36, '2018_03_15_122210_create_inscribes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_limite` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `titulo`, `descripcion`, `empresa`, `sector`, `fecha_limite`, `created_at`, `updated_at`) VALUES
(1, 'Programador', 'Trabajo como programador en php', 'CadizElectronic', 'Servicios a empresas', '2018-06-01', '2018-06-10 19:44:25', '2018-06-10 19:44:25'),
(2, 'Camarero', 'Trabajo de camarero a jornada completa', 'Mc Donals', 'Alimentación y restauración', '2018-07-13', '2018-06-10 19:45:09', '2018-06-10 19:46:38'),
(3, 'Profesor de lengua', 'Trabajo de profesor de lengua horario escolar', 'Salesianos', 'Servicios a empresas', '2018-08-25', '2018-06-10 19:46:13', '2018-06-10 19:46:13'),
(4, 'Actividad 2', 'Oferta de actividad', 'CbC', 'Químico, farmacéutico y sanitario', '2018-08-18', '2018-06-11 07:48:33', '2018-06-11 07:48:33'),
(5, 'Ingeneria', 'Descripcion de la oferta', 'Asas', 'Alimentación y restauración', '2018-08-11', '2018-06-11 07:49:26', '2018-06-11 07:49:26'),
(6, 'Ingeneria', 'Oferta descripciom', 'Airbus', 'Servicios a empresas', '2018-11-10', '2018-06-11 07:49:52', '2018-06-11 07:49:52'),
(7, 'Investigador', 'Oferta de investigador', 'Estado', 'Químico, farmacéutico y sanitario', '2018-11-03', '2018-06-11 07:50:30', '2018-06-11 07:50:30');

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
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Automoción y transporte', NULL, NULL),
(2, 'Químico, farmacéutico y sanitario', NULL, NULL),
(3, 'Textil, calzado y confección', NULL, NULL),
(4, 'Construcción', NULL, NULL),
(5, 'Alimentación y restauración', NULL, NULL),
(6, 'Siderurgia, metalurgia, fabricación y comercialización de maquinaria', NULL, NULL),
(7, 'Servicios a empresas', NULL, NULL),
(8, 'Papel, cartón, artes gráficas, edición', NULL, NULL),
(9, 'Servicios recreativos, culturales, ocio', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos`
--

CREATE TABLE `titulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `titulos`
--

INSERT INTO `titulos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ESO', NULL, NULL),
(2, 'Bachillerato', NULL, NULL),
(3, 'FP Basica', NULL, NULL),
(4, 'Ciclo Formativo', NULL, NULL),
(5, 'Carrera', NULL, NULL),
(6, 'Master', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehiculo` tinyint(4) NOT NULL DEFAULT '0',
  `tipo` tinyint(4) NOT NULL DEFAULT '0',
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'defecto.png',
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `second_name`, `provincia`, `localidad`, `direccion`, `telefono`, `fecha_nac`, `email`, `password`, `dni`, `vehiculo`, `tipo`, `foto`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'cadiz', 'cadiz', 'cadiz', '123456789', '1995-02-03', 'admin@admin.com', '$2y$10$6iglfyEQALWZpPZG6EzIp.FPNPQZ0NUVjLxIaKmeV4e6dbdxfBLia', '12345678A', 0, 1, 'admin.png', 1, NULL, 'iJzgZu2flAJiEyJrwWRb5gOisV1Uji7vrcmKqJaHmmwMdbcAfoh1DmSlS9hX', NULL, NULL),
(2, 'Miguel', 'Novo Martinez', 'Cadiz', 'Cadiz', 'Cadiz', '123456789', '1995-08-25', 'e4b.novo23@gmail.coms', '$2y$10$ArHV33fB/vZ.T67JeQcMkeppyThiCDeRfYsHeryDjuh9nn38LmvqO', '77395013', 1, 0, 'defecto.png', 1, NULL, '2WJnRgbutMmAsVrXbQvvMHKLXvUilIWMD760ipKk1FRdo3L5Hmyk6NtZIyhk', '2018-06-10 19:35:03', '2018-06-10 19:50:21'),
(3, 'Prueba', 'Prueba Prueba', 'Cadiz', 'Cadiz', 'Cadiz', '1212121212', '2005-06-23', 'cai@gmail.com', '$2y$10$FqcRMNKZxY3Cax9siDK9ieTqg6tQCcqksCfFhKJrpOZ.XD/TlfoQS', '12345678P', 0, 0, 'ODhiD4ynuLXcChf790pOw6Upam9gO53tv8Yk9KVK.jpeg', 1, NULL, 'IArxCWZFpP0R9Yk4HFI6tG9ZkyBQBp8lCITMX9ZfgZhd3lbiXDsdJ872BwZN', '2018-06-10 19:51:59', '2018-06-10 19:51:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiencias_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `formacions`
--
ALTER TABLE `formacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formacions_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idiomas_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `inscribes`
--
ALTER TABLE `inscribes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscribes_id_user_foreign` (`id_user`),
  ADD KEY `inscribes_id_oferta_foreign` (`id_oferta`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `titulos`
--
ALTER TABLE `titulos`
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
-- AUTO_INCREMENT de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formacions`
--
ALTER TABLE `formacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inscribes`
--
ALTER TABLE `inscribes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `formacions`
--
ALTER TABLE `formacions`
  ADD CONSTRAINT `formacions_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD CONSTRAINT `idiomas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscribes`
--
ALTER TABLE `inscribes`
  ADD CONSTRAINT `inscribes_id_oferta_foreign` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscribes_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

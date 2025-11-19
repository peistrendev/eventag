-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2025 a las 14:10:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventag`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `hour` time NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `evento_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `name`, `description`, `start_date`, `hour`, `location`, `author`, `evento_id`, `created_at`, `updated_at`) VALUES
(1, 'Importacion desde china', 'Te explico como puedes importar productos desde china', '2025-11-04', '11:11:00', 'Tarima', 'Empresa XYZ', 1, '2025-11-04 16:11:50', '2025-11-04 16:11:50'),
(2, 'Show en vivo Stand Up', 'Stand Up Comedy', '2025-11-04', '10:24:00', 'tarima', 'EDN', 2, '2025-11-04 16:24:13', '2025-11-04 16:24:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `name`, `description`, `location`, `logo`, `start_date`, `finish_date`, `created_at`, `updated_at`) VALUES
(1, 'ExpoCILARA 2025', 'Un evento de la Camara de industriales del estado lara', 'C.C. Arena Plaza, Barquisimeto', 'logo/20251015233117.png', '2025-10-24', '2025-10-26', '2025-10-16 04:31:17', '2025-10-16 04:31:17'),
(2, 'Evento de Ejemplo', 'Nose', 'Barquisimeto', 'logo/20251029112127.jpg', '2025-10-29', '2025-11-01', '2025-10-29 16:21:27', '2025-10-29 16:21:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expositor`
--

CREATE TABLE `expositor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pagina_web` varchar(255) NOT NULL,
  `prod_ofrece` longtext NOT NULL,
  `prod_demanda` longtext NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `evento_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `expositor`
--

INSERT INTO `expositor` (`id`, `name`, `description`, `logo`, `location`, `phone`, `email`, `pagina_web`, `prod_ofrece`, `prod_demanda`, `tipo`, `evento_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Organizacion Pitagoras C.A.', 'Somos la respuesta inteligente a las necesidades de Planificación Estratégica de los Recursos Humanos con proyectos eficaces de Consultoría Organizacional, ajustados y eficientes procesos de atracción, selección y retención del Talento Humano, excelentes programas formativos de actualización profesional, capacitación técnica y desarrollo de grandes eventos empresariales, que integrados entre sí, permiten el crecimiento sostenido y el éxito esperado por todas las organizaciones en las que intervenimos.', 'logo/20251016183929.png', 'CC PARQUE JARDIN', '04264660872', 'info@organizacionpitagoras.com', 'https://organizacionpitagoras.com/', '1.abc\r\n2.Abc\r\n3aBc', '1.abc\r\n2.Abc\r\n3aBc', 'Organizador', 1, 2, '2025-10-16 05:13:09', '2025-10-16 23:39:29'),
(2, 'Humaniz', 'Humaniz Group', 'logo/20251016184030.png', 'Caracas', '04126240231', 'info@humaniz.com', 'humaniz.com', 'n/a', 'n/a', 'Patrocinante', 1, 3, '2025-10-16 23:40:30', '2025-10-16 23:40:30'),
(3, 'Hajali Tractor', 'Hajali', 'logo/20251016184828.png', 'Barquisimeto', '04126240231', 'h@gmail.com', 'hajali.com', 'n/a', 'n/a', 'Patrocinante', 1, 4, '2025-10-16 23:48:28', '2025-10-16 23:48:28'),
(4, 'SERVIPLOTCA', 'serviplot', 'logo/20251016184920.jpg', 'barquisimeto', '04126873158', 's@gmail.com', 'servi.com', 'n/a', 'n/a', 'Patrocinante', 1, 6, '2025-10-16 23:49:20', '2025-10-16 23:49:20'),
(5, 'Concaribe', 'conca', 'logo/20251016185011.jpg', 'barquisimeto', '04126240231', 'conca@gmai.com', 'concaribe.com', 'n/a', 'n/a', 'Patrocinante', 1, 7, '2025-10-16 23:50:11', '2025-10-16 23:50:11'),
(6, 'primazol', 'prima', 'logo/20251016185114.png', 'barquisimeto', '04126873158', 'pr@gmail.com', 'primazol.com', 'n/a', 'n/a', 'Patrocinante', 1, 5, '2025-10-16 23:51:14', '2025-10-16 23:51:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_24_163719_create_rol_table', 1),
(5, '2025_09_24_163728_create_usuario_table', 1),
(6, '2025_09_24_165448_create_evento_table', 1),
(7, '2025_09_24_165527_create_expositor_table', 1),
(8, '2025_09_24_165622_create_visitante_table', 1),
(9, '2025_09_24_165928_create_actividad_table', 1),
(10, '2025_09_24_170009_create_visitantexexpositor_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2025-10-16 03:26:53', '2025-10-16 03:26:53'),
(2, 'Expositor', '2025-10-16 03:26:53', '2025-10-16 03:26:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4pDYkQoEhXbk5HX4P6cqVpikHLJtmAuJseM2dzem', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGpkbVRielBicnVyWHVmdEZiNktDblpnVHZDYk8wc1EySkxhSjhnayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3QvRXZlblRhZy9ldmVudGFnLWFwcC9wdWJsaWMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1763132435),
('akFYmaVWyf1vHjAECytn33RrWqZ5IpRKIFO0wkHj', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVTk2dE51ZGI4NE5QMHcxdlpLa0JpbEVtTW5waDNUTWYwd3BPZmFwRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzE6Imh0dHA6Ly9sb2NhbGhvc3QvRXZlblRhZy9ldmVudGFnLWFwcC9wdWJsaWMvZXZlbnQvZGFzaD9ldmVudG9zPTEmbWVzPTEwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1762273276),
('ghQ0oow6IZBDQVUwSBL3WVTERKUANrcqulTeZqHc', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlp2a1dQZko1bzVXWG5nZHhnY3oyeGZMZVlCN0t4VlZUb3M3QkhjaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9sb2NhbGhvc3QvRXZlblRhZy9ldmVudGFnLWFwcC9wdWJsaWMvZXZlbnQvZGFzaCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1762286340),
('IRnN2r8SJNz20jYZNQZRXIfoeYut1Qa9di0GDXHM', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkMxbmVBSW8zaThhRGNCcktreURjSEZKUFBpaHRHVTBMaGhBYTJtayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3QvRXZlblRhZy9ldmVudGFnLWFwcC9wdWJsaWMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1762945838),
('n0YvKeLi7qlsNeWgEMKbFsYpO64GFdrhxRbI6CGH', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYzV6NTZzUXJUSm8zYVNtQ0pVbGhYeUtNTUJwV3ZiWGM0elZabmZGRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9sb2NhbGhvc3QvRXZlblRhZy9ldmVudGFnLWFwcC9wdWJsaWMvZXZlbnQvZGFzaCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1762945857),
('Wxf32hiDuH6FqgAlhxfy4125MLDefKUUCpgw1i9R', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGE1akxWOG93QnRsU2d4UWJRSk5aUU4yOTB4d3h3RERPVU5BTFhLNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3QvRXZlblRhZy9ldmVudGFnLWFwcC9wdWJsaWMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1763557768);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rol_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `name`, `rol_id`, `created_at`, `updated_at`) VALUES
(1, 'pitagorasevento1@gmail.com', 'pita3099', 'Jesus Pastran', 1, '2025-10-16 03:27:32', '2025-10-19 03:56:48'),
(2, 'orgpitagoras1@gmail.com', '$2y$12$MHy9BnYK16i4V3jOO9zcNu3UZ/GgfyLHg4fz/BlUFbyrBr/cT.AbK', 'Luis Marin', 2, '2025-10-16 05:07:59', '2025-10-16 05:07:59'),
(3, 'jn@humaniz.com', '$2y$12$b6L0h2k.AhEWRZ/dSoZ.SuYqXHPC0LB7vnbiPnUFWEjswghJCCDEy', 'Juan Diaz', 2, '2025-10-16 23:38:48', '2025-10-16 23:38:48'),
(4, 'hajali@gmail.com', '$2y$12$nzd4NKvV5zXbZwW0mllkk.1zoaj3s.q3hkbvd6zC8eJh0FEtxSxBm', 'hecto jali', 2, '2025-10-16 23:46:20', '2025-10-16 23:46:20'),
(5, 'jd@boom.com', '$2y$12$FofcT9k9j4tj1Txj9SV6W.R3zA1udFdbpvqP2mDNIih5HJ3OlUO3W', 'Jon Doe', 2, '2025-10-16 23:46:46', '2025-10-16 23:46:46'),
(6, 'la@servi.com', '$2y$12$eZr8N57AIKJ6dwJHvBQzr.rqXgzsa9yK7IwpyXjSB4WOrmQQJ5qSy', 'loeris anular', 2, '2025-10-16 23:47:15', '2025-10-16 23:47:15'),
(7, 'gr@gmail.com', '$2y$12$rq1M8fIdbLZDiWTlwwyhHOUvaMAVkD38DiPQGnVCsrJQ65HxVZIX.', 'Giorgio reni', 2, '2025-10-16 23:47:37', '2025-10-16 23:47:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante`
--

CREATE TABLE `visitante` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  `razon` varchar(255) NOT NULL,
  `evento_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`id`, `document`, `name`, `phone`, `email`, `location`, `razon`, `evento_id`, `created_at`, `updated_at`) VALUES
(1, 30105189, 'Jesus Pastran', '04245161945', 'jesuas1507@gmail.com', 'Barquisimeto', 'Particular', 1, '2025-10-16 04:39:50', '2025-10-16 04:39:50'),
(5, 4803935, 'Ramona Perez', '04245593261', 'rperez@gmail.com', 'Barquisimeto', 'Particular', 1, '2025-10-17 03:10:39', '2025-10-17 03:10:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitantexexpositor`
--

CREATE TABLE `visitantexexpositor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visitante_id` bigint(20) UNSIGNED NOT NULL,
  `expositor_id` bigint(20) UNSIGNED NOT NULL,
  `clasification` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visitantexexpositor`
--

INSERT INTO `visitantexexpositor` (`id`, `created_at`, `updated_at`, `visitante_id`, `expositor_id`, `clasification`, `comments`) VALUES
(2, '2025-10-16 05:45:11', '2025-10-16 05:45:11', 1, 1, 'Visitante', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actividad_id_unique` (`id`),
  ADD KEY `actividad_evento_id_foreign` (`evento_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `evento_id_unique` (`id`);

--
-- Indices de la tabla `expositor`
--
ALTER TABLE `expositor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expositor_id_unique` (`id`),
  ADD KEY `expositor_evento_id_foreign` (`evento_id`),
  ADD KEY `expositor_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rol_id_unique` (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id_unique` (`id`),
  ADD KEY `usuario_rol_id_foreign` (`rol_id`);

--
-- Indices de la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitante_id_unique` (`id`),
  ADD KEY `visitante_evento_id_foreign` (`evento_id`);

--
-- Indices de la tabla `visitantexexpositor`
--
ALTER TABLE `visitantexexpositor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitantexexpositor_id_unique` (`id`),
  ADD KEY `visitantexexpositor_visitante_id_foreign` (`visitante_id`),
  ADD KEY `visitantexexpositor_expositor_id_foreign` (`expositor_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `expositor`
--
ALTER TABLE `expositor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `visitante`
--
ALTER TABLE `visitante`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `visitantexexpositor`
--
ALTER TABLE `visitantexexpositor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `expositor`
--
ALTER TABLE `expositor`
  ADD CONSTRAINT `expositor_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expositor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD CONSTRAINT `visitante_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `visitantexexpositor`
--
ALTER TABLE `visitantexexpositor`
  ADD CONSTRAINT `visitantexexpositor_expositor_id_foreign` FOREIGN KEY (`expositor_id`) REFERENCES `expositor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visitantexexpositor_visitante_id_foreign` FOREIGN KEY (`visitante_id`) REFERENCES `visitante` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

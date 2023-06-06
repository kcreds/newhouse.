-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2023, 21:36
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `newhouse`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact_tidings`
--

CREATE TABLE `contact_tidings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `immovables` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `immovablesSlug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isread` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `contact_tidings`
--

INSERT INTO `contact_tidings` (`id`, `email`, `immovables`, `immovablesSlug`, `message`, `isread`, `created_at`, `updated_at`) VALUES
(1, 'przykladowymail@gmail.com', 'Apartament Nowy Jork, Central Park', 'apartament-nowy-jork-central-park', 'Przykładowa wiadomość', 0, '2023-06-06 17:29:19', '2023-06-06 17:29:19');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `immovables`
--

CREATE TABLE `immovables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metarobots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_head` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_head` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `immovables`
--

INSERT INTO `immovables` (`id`, `name`, `meta_name`, `meta_desc`, `metarobots`, `slug`, `price`, `extent`, `address`, `short_desc`, `main_photo`, `long_desc`, `first_head`, `first_desc`, `first_photo`, `second_head`, `second_desc`, `second_photo`, `created_at`, `updated_at`) VALUES
(1, 'Apartament Nowy Jork, Central Park', 'Apartament Nowy Jork, Central Park - newhouse', 'Apartament Nowy Jork, Central Park', 'noindex, nofollow', 'apartament-nowy-jork-central-park', '84000', '50', 'Central Park W 57th New York St Ph 217, New York, NY 10019', '<p>Odkryj niezwykłe doświadczenie pobytu w apartamencie w Central Park. Luksusowe wnętrza, panoramiczne widoki, wysokiej jakości wyposażenie i dostęp do bogatych udogodnień - to wszystko czeka na Ciebie. Ciesz się bliskością zielonych przestrzeni parku, relaksuj się w eleganckim salonie, delektuj się posiłkami w w pełni wyposażonej kuchni. To idealne miejsce dla wymagających podr&oacute;żnych, kt&oacute;rzy pragną połączyć komfort z doskonałą lokalizacją.</p>', '1686061727-pexels-vecislavas-popa-1571460.jpg', '<div class=\"flex flex-grow flex-col gap-3\">\r\n<div class=\"min-h-[20px] flex flex-col items-start gap-4 whitespace-pre-wrap break-words\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert dark\">\r\n<div class=\"flex flex-grow flex-col gap-3\">\r\n<div class=\"min-h-[20px] flex flex-col items-start gap-4 whitespace-pre-wrap break-words\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert dark\">\r\n<p style=\"text-align: center;\">Zapraszamy do mieszkania w Central Park - idealnego miejsca do życia, kt&oacute;re łączy komfort, styl i doskonałą lokalizację. To przestronne i nowoczesne mieszkanie o powierzchni [dopisz metraż] zapewni Ci wygodę i funkcjonalność.</p>\r\n<p style=\"text-align: center;\">Wchodząc do mieszkania, natychmiast poczujesz się jak w domu. Jasne wnętrza o dużych oknach zapewniają mn&oacute;stwo naturalnego światła, tworząc przyjemną atmosferę. Przestronny salon jest idealnym miejscem do relaksu i spotkań z rodziną i przyjaci&oacute;łmi.</p>\r\n<p style=\"text-align: center;\">Kuchnia w pełni wyposażona w wysokiej jakości sprzęt i eleganckie wykończenia zachęca do eksperymentowania kulinarne. Przygotowywanie posiłk&oacute;w stanie się prawdziwą przyjemnością. Dodatkowo, przestronna jadalnia to idealne miejsce do wsp&oacute;lnych posiłk&oacute;w i spotkań przy stole.</p>\r\n<p style=\"text-align: center;\">Sypialnie są przytulne i zapewniają prywatną przestrzeń do odpoczynku. Duże okna umożliwiają cieszenie się widokiem na okolicę i wpuszczają poranny blask słońca. Łazienka jest nowoczesna i funkcjonalna, zapewniając przyjemne doświadczenie podczas codziennych rytuał&oacute;w.</p>\r\n<p style=\"text-align: center;\">Mieszkanie w Central Park oferuje wiele dodatkowych udogodnień, takich jak dostęp do prywatnego parkingu, siłowni i basenu. Możesz korzystać z tych udogodnień, aby zadbać o swoje zdrowie i kondycję.</p>\r\n<p style=\"text-align: center;\">Lokalizacja mieszkania jest doskonała. Znajduje się w samym sercu miasta, w pobliżu restauracji, sklep&oacute;w i miejsc rozrywki. Możesz spacerować po pięknych parkach, cieszyć się widokiem na zielone tereny i korzystać z licznych atrakcji dostępnych w okolicy.</p>\r\n<p style=\"text-align: center;\">Nie przegap możliwości zamieszkania w mieszkaniu w Central Park. To idealne miejsce dla os&oacute;b ceniących wygodę, styl i bliskość wszystkiego, czego potrzebują. Skontaktuj się z nami już teraz, aby um&oacute;wić się na prezentację i odkryć, jak to mieszkanie może stać się Twoim wymarzonym domem.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Wygodna kuchnia', '<p>Apartament został zaprojektowany z myślą o Twojej wygodzie. W pełni wyposażona kuchnia z najnowszymi urządzeniami pozwoli Ci przygotowywać ulubione potrawy. Przestronny salon jest doskonałym miejscem do spotkań z rodziną i przyjaci&oacute;łmi. A wygodna sypialnia z dużym ł&oacute;żkiem zagwarantuje Ci doskonały sen i wypoczynek.</p>\r\n<div class=\"notranslate\" style=\"all: initial;\">&nbsp;</div>', '1686061727-pexels-mark-mccammon-2724748.jpg', 'Serce Nowego Jorku', '<p>Lokalizacja mieszkania jest doskonała. Znajduje się w samym sercu miasta, w pobliżu restauracji, sklep&oacute;w i miejsc rozrywki. Możesz spacerować po pięknych parkach, cieszyć się widokiem na zielone tereny i korzystać z licznych atrakcji dostępnych w okolicy.</p>', '1686061727-pexels-pixabay-327502.jpg', '2023-06-06 12:28:47', '2023-06-06 12:34:25');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2023_06_02_193639_tidings', 2),
(31, '2023_05_29_115505_immovables', 4),
(32, '2023_06_02_210713_contact_tidings', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', NULL, '$2y$10$PsL2svBbRmD2hZshpJZwu.aqmz3jj9kQ5KP3GthrMNLDe2BCACl6W', 'Gt5s76QNAX0KLZ0Qb7bINaYrHowGW9ciYrec68iO9otVpF6hHlE7J2nq3m42', 1, NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `contact_tidings`
--
ALTER TABLE `contact_tidings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `immovables`
--
ALTER TABLE `immovables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `immovables_slug_unique` (`slug`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `contact_tidings`
--
ALTER TABLE `contact_tidings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `immovables`
--
ALTER TABLE `immovables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

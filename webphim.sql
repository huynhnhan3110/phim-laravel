-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 03:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webphim`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `slug`, `status`, `sort`) VALUES
(9, 'Phim thuyết minh', 'Phim thuyết minh mới 2021', 'phim-thuyet-minh', 1, 4),
(10, 'Phim hoạt hình', 'Phim hoạt hình mới cập nhật', 'phim-hoat-hinh', 1, 0),
(11, 'Phim lẻ mới', 'Phim lẻ mới cập nhật', 'phim-le-moi', 1, 5),
(12, 'Phim bộ', 'Phim bộ mới', 'phim-bo', 0, 2),
(13, 'Phim chiếu rạp', 'Phim chiếu rạp mới nhất', 'phim-chieu-rap', 1, 1),
(14, 'Phim mới', 'Phim mới nhất', 'phim-moi', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `slug`, `status`, `sort`) VALUES
(5, 'Phim Mỹ', 'Phim Mỹ', 'phim-my', 1, 2),
(6, 'Phim Hàn Quốc', 'Phim Hàn Quốc', 'phim-han-quoc', 1, 3),
(7, 'Phim Nhật Bản', 'Phim Nhật Bản', 'phim-nhat-ban', 1, 4),
(8, 'Phim Thái Lan', 'Phim Thái Lan', 'phim-thai-lan', 1, 1),
(9, 'Phim Hồng Kông', 'Phim Hồng Kông', 'phim-hong-kong', 1, 5),
(10, 'Phim Philippin', 'Phim Philippin', 'phim-philippin', 1, 6),
(11, 'Phim Đài Loan', 'Phim Đài Loan', 'phim-dai-loan', 1, 7),
(12, 'Phim Italia', 'Phim Italia', 'phim-italia', 1, 8),
(13, 'Phim Ấn Độ', 'Phim Ấn Độ', 'phim-an-do', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `episode` int(11) NOT NULL,
  `link_phim` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `slug`, `status`, `sort`) VALUES
(4, 'Gấy cấn', 'Gấy cấn', 'gay-can', 1, 4),
(5, 'Hài hước', 'Hài hước', 'hai-huoc', 1, 1),
(6, 'Tâm lý', 'Tâm lý', 'tam-ly', 1, 0),
(7, 'Thần thoại', 'Thần thoại', 'than-thoai', 1, 3),
(8, 'Thể thao', 'Thể thao', 'the-thao', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `phimhot` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `image`, `phimhot`, `slug`, `category_id`, `genre_id`, `country_id`, `status`) VALUES
(7, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 1, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(8, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 1, 'arcane-lien-minh-huyen-thoai', 10, 8, 10, 1),
(9, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 1, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(10, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 10, 8, 10, 1),
(11, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 10, 8, 10, 1),
(12, 'Moi nhat ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 10, 8, 10, 1),
(13, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(14, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(15, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(16, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(17, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(18, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(19, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(20, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(21, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(22, 'HOT ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 1, 'hot-arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(23, 'ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 0, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(24, 'Moi nhat ARCANE: LIÊN MINH HUYỀN THOẠI', 'Arcane: Liên Minh Huyền Thoại (Phần 1) - Arcane: League of Legends (Season 1), Arcane: League of Legends (Season 1) 2021 Season 1 Lấy bối cảnh Piltover không tưởng và thế giới ngầm bị áp bức của Zaun, câu chuyện kể về nguồn gốc của hai nhà vô địch Liên minh mang tính biểu tượng – và sức mạnh có thể chia cắt họ.', 'arcane3178.jpg', 1, 'arcane-lien-minh-huyen-thoai', 9, 8, 10, 1),
(25, 'LỆNH TRUY NÃ ĐỎ – RED NOTICE', 'Lệnh Truy Nã Đỏ - Red Notice, Red Notice 2021 Full Một đặc vụ Interpol theo dõi tên trộm nghệ thuật bị truy nã gắt gao nhất thế giới.', '618e2676625c02681.jpg', 1, 'lenh-truy-na-do-–-red-notice', 11, 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nhanchance', 'nhanchance2021@gmail.com', NULL, '$2y$10$xTzpaBNjbNirb1WYdgLL5u14kns5cGNvImiDhyx5eyD2tQfqGE2Ei', NULL, '2021-12-02 08:15:11', '2021-12-02 08:15:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 03:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `desc`, `recorded_at`) VALUES
(1, 'raden', '$2y$10$6I1x9iBd7g1WQQk5PSBC3OFUwvK8DR6HeKyngX5M75//IUBbHWBTm', 'admin pertama web dev', '2023-07-08 15:09:15'),
(2, 'uneff2023', '$2y$10$GzvAEvmfqPxh4uf/9lhrpucUVcr.Wb/X.N0zvPYASK2GuUcEpdgn2', 'admin kedua operator atau ketua panitia', '2023-07-08 15:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `json_data`
--

CREATE TABLE `json_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `json_data`
--

INSERT INTO `json_data` (`id`, `data`) VALUES
(1, '{\"Profile\":{\"Title\":\"Profileezzz\",\"Banner\":\"/image/profile.png\",\"Detail\":\"Unej Film Festival merupakan program yang digagas oleh HIMAFISI Universitas Jember. Program festival HIMAFISI pertama kali diselenggarakan pada tahun 2016 dengan nama \'Hi-FEST\' Program ini akan berlangsung setiap tahun dibawah program kerja divisi Media Kreatif HIMAFISI.\"}}'),
(2, '{\"Rules\":{\"ExternalFormLink\":\"https:\\/\\/docs.google.com\\/forms\\/d\\/e\\/1FAIpQLSe2TIOZyk421APzVp-RQfda1ZxuxpNL6lZAP84Zu1-dT0FV6Q\\/viewform?usp=sf_link\",\"Title\":\"Penerimaan Karya Unej Film Festival 2023\",\"Section\":[{\"Title\":\"Peraturan\",\"List\":[\"Ada peraturan yang harus dipatuhi\",\"Ada persyaratan yang harus disesuaikan\",\"Ada beberapa tambahan yang harus dilihat\",\"Peraturan dapat berubah\"]},{\"Title\":\"Persyaratan\",\"List\":[\"Persyaratan pertama\",\"Persyaratan kedua\",\"Persyaratan ketiga\",\"Persyaratan keempat\"]},{\"Title\":\"Tambahan\",\"List\":[\"Tambahan pertama\",\"Tambahan kedua\",\"Tambahan ketiga\",\"Tambahan keempat\"]}]}}');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_01_223008_create_accounts_table', 1),
(6, '2023_07_02_072535_create_posts_table', 1),
(7, '2023_07_07_125503_create_json_data_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `content`, `posted_at`, `updated_at`, `author_id`) VALUES
(1, 'Blanditiis nisi expedita voluptas odio veniam placeat non molestias.', 'quas-beatae-velit-quos-eaque-quibusdam-qui-mollitia', 'https://picsum.photos/id/50/5000/3333', 'Facere nihil ratione a reiciendis explicabo dolore consequuntur. Commodi occaecati eum maiores neque. Aut minus ipsam laborum qui amet nesciunt. Corrupti eligendi illo aut omnis quidem possimus.\n\nIpsam soluta sit impedit odit quas expedita. Excepturi quo eum temporibus et laudantium ut aut iste. Necessitatibus autem error ea et.\n\nHic repudiandae ut reprehenderit fugit vero architecto eum. Sed deleniti consectetur sint laboriosam voluptatem. Id deleniti quia voluptatem doloribus voluptas nesciunt nihil. Quia hic rem nihil eveniet eos.', '2023-02-21 01:43:46', '2023-06-09 22:13:13', 2),
(2, 'Id quas minus consequuntur sunt laudantium quasi fugit.', 'dolor-voluptas-voluptatem-sit-alias', 'https://picsum.photos/id/74/5000/3333', 'Minima odio aspernatur tempore natus quibusdam assumenda et eos. Natus eos consequatur nesciunt rerum ipsa. Amet officia neque nam expedita. Error odit qui aut earum culpa et qui quaerat.\n\nOmnis voluptate aperiam necessitatibus odit quis sed. Rerum eum a quia et adipisci placeat. Omnis omnis quia dolorum voluptatem. Fugiat aut est voluptate dolor saepe blanditiis.\n\nIpsa occaecati perferendis quisquam aut rerum in culpa culpa. Qui et qui eaque ut sint a inventore.', '2023-02-17 19:22:20', '2023-02-28 07:29:56', 2),
(3, 'Quia animi saepe est ex in commodi ipsa.', 'odio-id-nesciunt-repudiandae-illum-ullam-quaerat-et', 'https://picsum.photos/id/88/5000/3333', 'Autem totam aut mollitia nostrum itaque animi aspernatur. Nam voluptas architecto laudantium quia est nobis nulla. Illum omnis velit a dolorem. Corrupti sunt quos sed voluptatibus rem.\n\nDignissimos sint eveniet nulla dolor. Doloremque cupiditate id aliquam aut quo quidem. Recusandae ut quaerat facere cum at et. Nostrum quis est voluptas et.\n\nDistinctio debitis ipsam quasi sunt quas consequuntur et. Ut et et a et repellat ut voluptatem. Rem quas in culpa ducimus amet.', '2023-03-18 10:29:02', NULL, 1),
(4, 'Nostrum eos sit nulla quaerat culpa ut quasi.', 'facilis-dicta-autem-sed-rerum-sint', 'https://picsum.photos/id/5/5000/3333', 'Veritatis accusamus vero sed consequatur libero. Suscipit totam ipsa mollitia qui vero. Enim dicta consequuntur et vel sed nihil autem itaque. Quia consequatur ut voluptatibus velit at veritatis molestiae.\n\nQuibusdam consectetur aliquid rem numquam. Exercitationem quos eum eos culpa corrupti. At officia laboriosam et sed magni eveniet.\n\nAliquid odio error omnis ut qui. Ab nesciunt sit est alias. Sit fuga explicabo corporis assumenda autem omnis. Ullam ullam officiis voluptas cumque ducimus non.', '2023-05-29 10:38:26', NULL, 1),
(5, 'Cumque quia nesciunt ea est earum iure laborum.', 'itaque-dolor-ea-est-nemo', 'https://picsum.photos/id/33/5000/3333', 'Enim sed aperiam est et quia provident. Vel sunt molestiae quidem voluptate voluptatem dolorem dicta sed. Ipsam dolor non vel ut voluptas debitis.\n\nDolores cumque deleniti magni est vero. Itaque inventore deleniti iusto sunt quia reprehenderit. Qui est est molestias iste qui. Illo omnis dolore nesciunt soluta.\n\nNobis omnis amet officia aut sequi. Explicabo dolores ducimus nihil repudiandae aut eum iusto. Amet pariatur eum exercitationem.', '2023-04-27 04:55:06', '2023-03-24 07:19:34', 2),
(6, 'Temporibus cupiditate debitis enim voluptas libero.', 'ab-facere-consequatur-esse-dolor', 'https://picsum.photos/id/80/5000/3333', 'Vitae dolorem eos in molestiae quae et. Atque iste ducimus impedit eius repellat. Sit cum quia adipisci suscipit optio fugit. Ipsa possimus tempore est labore numquam non.\n\nQuaerat ab velit voluptates deleniti expedita. At est ut aut at soluta totam et sapiente. Assumenda laborum sequi ut quis repudiandae iure. Doloremque inventore rerum ullam nemo. Est veritatis veritatis tempora temporibus accusamus iste.\n\nAsperiores asperiores voluptatem et voluptatem. Qui rerum dolorem et cupiditate animi. Harum dolor sequi officiis est ea modi nobis. Deserunt consequatur necessitatibus amet consequatur facilis voluptas sunt aspernatur.', '2023-04-03 21:46:07', NULL, 1),
(7, 'Vero eos beatae et hic doloribus fuga quibusdam.', 'voluptates-temporibus-enim-repudiandae-sed', 'https://picsum.photos/id/18/5000/3333', 'Quidem ab dignissimos vero quo ipsa. Autem est suscipit in vero ad. Tempore sunt qui unde rerum rerum.\n\nOfficia qui numquam quibusdam incidunt. Dolorem illum eaque sunt libero quidem neque. Et optio voluptate quia est et. Nobis eos cupiditate molestias sint quae voluptas eaque.\n\nMolestiae itaque rerum eius. Maxime fuga et est. Magni quod recusandae amet. Delectus distinctio facere reiciendis rerum rem.', '2023-02-21 17:59:06', NULL, 1),
(8, 'Nobis nostrum iusto eos provident quod quibusdam.', 'qui-est-dolores-qui-incidunt-itaque-architecto-quaerat', 'https://picsum.photos/id/46/5000/3333', 'Non provident sed impedit reprehenderit ut. Aut magni sint voluptatibus voluptatum reprehenderit hic cupiditate quia. Adipisci incidunt voluptatem omnis magnam et impedit dolores.\n\nAspernatur molestias rerum ut. Sit animi blanditiis sunt aut illo doloremque fugiat. Quo quisquam dolorem modi consequatur repudiandae. Nemo natus magni fuga exercitationem reiciendis.\n\nReiciendis facilis accusamus doloremque mollitia architecto odio placeat. Laudantium est excepturi harum voluptatem voluptatem eos vel. Et exercitationem eligendi voluptas nobis laudantium inventore ullam. Officia ex dolore amet ea.', '2023-02-18 09:07:51', NULL, 2),
(9, 'Ea est facere possimus possimus consequatur minus maiores.', 'dignissimos-provident-molestiae-est-illum-perferendis-nostrum-perferendis', 'https://picsum.photos/id/9/5000/3333', 'Recusandae distinctio dolor rem veniam enim fugit autem eos. Qui consectetur error molestiae accusamus et. Maxime dolor officiis iusto. Tenetur incidunt nobis sunt rerum ratione error repudiandae.\n\nTenetur voluptatem ad quam culpa qui ex eius. Doloremque et itaque inventore odio laboriosam voluptatibus. Illum dolorem dolor rerum dolores accusamus.\n\nAut explicabo omnis architecto eveniet. Libero omnis eum et. Adipisci quae ad aut. Voluptatem earum facilis voluptates non delectus aut distinctio.', '2023-03-24 23:15:03', NULL, 1),
(10, 'Soluta quae eius reprehenderit voluptas quis fugit.', 'aspernatur-reiciendis-et-quia-ea-sed', 'https://picsum.photos/id/99/5000/3333', 'Quia natus quo quia nihil est asperiores doloribus. In nemo at iste quas consectetur accusantium.\n\nModi odio debitis eius qui expedita accusantium quis. Odio quo distinctio molestiae molestiae debitis. Delectus et aut dicta fugit omnis.\n\nAdipisci optio sunt est sint voluptatem. Necessitatibus quia aut enim ratione illo voluptates iusto voluptate. Officiis omnis autem omnis consequatur amet ad in eligendi.', '2023-03-30 22:22:50', '2023-01-26 12:46:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `json_data`
--
ALTER TABLE `json_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `json_data`
--
ALTER TABLE `json_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Jun 05, 2022 at 03:26 PM
-- Server version: 8.0.28
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postsDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220601161721', '2022-06-01 16:18:13', 121);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `author`, `subject`, `date`, `body`, `image_path`) VALUES
(3, 'Ah! Sun-flower', 'William Blake', 'Aspiration', '1794-06-01 19:28:21', 'Ah! sunflower, weary of time,\r\n        Who countest the steps of the sun,\r\n        Seeking after that sweet golden clime\r\n        Where the traveller\'s journey is done;\r\n\r\n        Where the youth pined away with desire,\r\n        And the pale virgin shrouded in snow,\r\n        Arise from their graves and aspire;\r\n        Where my sunflower wishes to go.', '/uploads/629cc70ad7019.jpg'),
(4, 'The Trees', 'Philip Larkin', 'Mortality', '1967-06-01 19:28:21', 'The trees are coming into leaf\r\n        Like something almost being said;\r\n        The recent buds relax and spread,\r\n        Their greenness is a kind of grief.\r\n\r\n        Is it that they are born again\r\n        And we grow old? No, they die too.\r\n        Their yearly trick of looking new\r\n        Is written down in rings of grain.\r\n        \r\n        Yet still the unresting castles thresh\r\n        In fullgrown thickness every May.\r\n        Last year is dead, they seem to say,\r\n        Begin afresh, afresh, afresh.', '/uploads/629cc717a9c62.jpg'),
(6, 'The Snow Man', 'Wallace Stevens', 'Absence', '1921-10-01 00:00:00', 'One must have a mind of winter\r\nTo regard the frost and the boughs\r\nOf the pine-trees crusted with snow;\r\n\r\nAnd have been cold a long time\r\nTo behold the junipers shagged with ice,\r\nThe spruces rough in the distant glitter\r\n\r\nOf the January sun; and not to think\r\nOf any misery in the sound of the wind,\r\nIn the sound of a few leaves,\r\n\r\nWhich is the sound of the land\r\nFull of the same wind\r\nThat is blowing in the same bare place\r\n\r\nFor the listener, who listens in the snow,\r\nAnd, nothing himself, beholds\r\nNothing that is not there and the nothing that is.', '/uploads/629a205849856.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

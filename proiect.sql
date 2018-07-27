-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 04:24 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiect`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration_name`) VALUES
(1, 'create_migration_table.php'),
(2, 'create_posts_table.php'),
(3, 'create_users_table.php');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `body` varchar(300) NOT NULL,
  `author` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `post_date`) VALUES
(2, 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris metus metus, euismod eget nunc quis, auctor interdum velit. Etiam sapien diam, sodales et vehicula sit amet, tempor vel ipsum. Cras.', 'admin', '2018-07-25 16:17:59'),
(3, ' Integer auctor ipsum sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae auctor odio. Nullam sit amet sodales tortor, nec laoreet dolor. Aenean justo mauris, aliquet quis rutrum vel, feugiat at lorem.', 'admin', '2018-07-25 16:18:14'),
(4, 'Vestibulum vulputate id ex sed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lacinia placerat congue. Duis non elit auctor, porttitor velit sed, congue diam. Maecenas feugiat risus porta, finibus odio non, pellentesque augue.', 'admin', '2018-07-25 16:18:34'),
(5, ' Aenean egestas odio mi, ultri', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt erat vitae lectus sollicitudin, non congue ipsum eleifend. Aliquam tincidunt nisl eros. Vestibulum nec lobortis eros. Nulla et sollicitudin nulla.', 'admin', '2018-07-25 16:19:04'),
(6, 'Cras eleifend sapien a suscipi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at metus pulvinar, lacinia eros et, sagittis lorem. Aliquam quis fermentum nisl, at bibendum tellus. Suspendisse maximus efficitur sodales. Nunc at.', 'admin', '2018-07-25 16:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `create_date`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-07-25 16:17:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

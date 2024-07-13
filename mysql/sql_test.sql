-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 05:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `column_name` varchar(255) NOT NULL,
  `old_val` varchar(255) NOT NULL,
  `new_val` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `table_name`, `column_name`, `old_val`, `new_val`) VALUES
(1, 'users', 'birthdate', '2003-07-01', '2003-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `out_of` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `marks`, `out_of`, `subject_id`, `user_id`) VALUES
(1, 25, 50, 1, 1),
(2, 33, 50, 2, 1),
(3, 44, 60, 3, 2),
(4, 21, 30, 4, 2),
(5, 33, 40, 1, 3),
(6, 31, 60, 3, 3),
(7, 44, 60, 4, 4),
(8, 25, 30, 2, 4),
(9, 15, 20, 1, 5),
(10, 23, 25, 4, 5),
(11, 41, 50, 2, 6),
(12, 38, 100, 3, 6),
(13, 16, 60, 1, 7),
(14, 45, 70, 4, 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `markslist`
-- (See below for the actual view)
--
CREATE TABLE `markslist` (
`id` int(11)
,`marks` int(11)
,`out_of` int(11)
,`subject_id` int(11)
,`user_id` int(11)
,`username` varchar(255)
,`subjectname` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(2, 'English'),
(1, 'Marathi'),
(3, 'Maths'),
(4, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birthdate`, `email`) VALUES
(1, 'bhushan', '2003-06-02', 'bhushan@gmail.com'),
(2, 'kalpak', '1993-06-28', 'kalpak@gmail.com'),
(3, 'sourabh', '2004-05-01', 'sourabh@gmail.com'),
(4, 'abhishek', '1997-06-28', 'abhishek@gmail.com'),
(5, 'manish', '2010-05-01', 'manish@gmail.com'),
(6, 'koustubh', '1995-09-28', 'koustubh@gmail.com'),
(7, 'mangesh', '2011-04-30', 'mangesh@gmail.com');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `update_log` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
  IF OLD.birthdate != NEW.birthdate THEN
    INSERT INTO log (table_name, column_name, old_val, new_val)
    VALUES ('users', 'birthdate', OLD.birthdate, NEW.birthdate);
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_2`
--

CREATE TABLE `users_2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_2`
--

INSERT INTO `users_2` (`id`, `name`, `birthdate`, `email`) VALUES
(8, 'bhushan', '2003-07-01', 'bhushan@gmail.com'),
(9, 'kalpak', '1993-06-28', 'kalpak@gmail.com'),
(10, 'sourabh', '2004-05-01', 'sourabh@gmail.com'),
(11, 'abhishek', '1997-06-28', 'abhishek@gmail.com'),
(12, 'manish', '2010-05-01', 'manish@gmail.com'),
(13, 'koustubh', '1995-09-28', 'koustubh@gmail.com'),
(14, 'mangesh', '2011-04-30', 'mangesh@gmail.com');

-- --------------------------------------------------------

--
-- Structure for view `markslist`
--
DROP TABLE IF EXISTS `markslist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `markslist`  AS SELECT `m`.`id` AS `id`, `m`.`marks` AS `marks`, `m`.`out_of` AS `out_of`, `m`.`subject_id` AS `subject_id`, `m`.`user_id` AS `user_id`, `u`.`name` AS `username`, `s`.`name` AS `subjectname` FROM ((`marks` `m` left join `subject` `s` on(`m`.`subject_id` = `s`.`id`)) left join `users` `u` on(`m`.`user_id` = `u`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `user_foreign` (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_2`
--
ALTER TABLE `users_2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_2`
--
ALTER TABLE `users_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `subject_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `user_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

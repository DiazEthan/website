-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2026 at 05:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `year`) VALUES
(1, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', 1937),
(2, '1984', 'George Orwell', 'Dystopian', 1949),
(3, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 1960),
(4, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Classic', 1925),
(5, 'Moby Dick', 'Herman Melville', 'Adventure', 1851),
(6, 'Harry Potter', 'J.K. Rowling', 'Fantasy', 1997),
(7, 'The Alchemist', 'Paulo Coelho', 'Fiction', 1988);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `book_id`, `member_id`, `loan_date`, `return_date`) VALUES
(1, 1, 1, '2025-01-01', '2025-01-10'),
(2, 2, 2, '2025-01-05', '2025-01-15'),
(3, 3, 3, '2025-01-10', '2025-01-20'),
(4, 4, 4, '2025-01-12', '2025-01-22'),
(5, 5, 5, '2025-01-15', '2025-01-25'),
(6, 6, 6, '2025-01-18', '2025-01-28'),
(7, 7, 7, '2025-01-20', '2025-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `join_date`) VALUES
(1, 'Alice Johnson', 'alice@example.com', '12345678', '2024-01-10'),
(2, 'Bob Smith', 'bob@example.com', '87654321', '2024-02-15'),
(3, 'Charlie Brown', 'charlie@example.com', '11223344', '2024-03-20'),
(4, 'Diana Prince', 'diana@example.com', '22334455', '2024-04-05'),
(5, 'Ethan Hunt', 'ethan@example.com', '33445566', '2024-05-12'),
(6, 'Fiona Green', 'fiona@example.com', '44556677', '2024-06-18'),
(7, 'George King', 'george@example.com', '55667788', '2024-07-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 01:43 PM
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
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nationality` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `name`, `nationality`) VALUES
(1, 'Jane Austen', 'English'),
(2, 'Fyodor Dostoevsky', 'Russian'),
(3, 'Harper Lee', 'American'),
(4, 'George Orwell', 'English'),
(5, 'J.K. Rowling', 'British'),
(6, 'Leo Tolstoy', 'Russian');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `publication_date` date DEFAULT NULL,
  `availability_status` enum('available','borrowed','reserved') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `isbn`, `title`, `author_id`, `genre_id`, `publication_date`, `availability_status`) VALUES
(1, '9780141393040', 'Sense and Sensibility', 1, 1, '1811-01-01', 'available'),
(2, '9780141439610', 'Mansfield Park', 1, 1, '1814-05-09', 'available'),
(3, '9780486280615', 'Anna Karenina', 6, 1, '1877-03-01', 'available'),
(4, '9780486835300', 'The Brothers Karamazov', 2, 1, '1880-11-11', 'available'),
(5, '9780743273565', 'To Kill a Mockingbird', 3, 3, '1960-07-11', 'available'),
(6, '9780451524935', '1984', 4, 4, '1949-06-08', 'available'),
(7, '9780345339683', 'Fahrenheit 451', 4, 4, '1953-10-19', 'available'),
(8, '9780743273565', 'The Catcher in the Rye', 1, 3, '1951-07-16', 'available'),
(9, '9781400033416', 'The Great Gatsby', 2, 3, '1925-04-10', 'available'),
(10, '9780451524935', 'Harry Potter and the Chamber of Secrets', 5, 5, '1998-07-02', 'available'),
(11, '9780743273565', 'Harry Potter and the Prisoner of Azkaban', 5, 5, '1999-07-08', 'available'),
(12, '9781400031368', 'Harry Potter and the Goblet of Fire', 5, 5, '2000-07-08', 'available'),
(13, '9780439358071', 'Harry Potter and the Order of the Phoenix', 5, 5, '2003-06-21', 'available'),
(14, '9780439785969', 'Harry Potter and the Half-Blood Prince', 5, 5, '2005-07-16', 'available'),
(15, '9780545010221', 'Harry Potter and the Deathly Hallows', 5, 5, '2007-07-21', 'available'),
(16, '9780451524935', 'The Hobbit', 3, 5, '1937-09-21', 'available'),
(17, '9780261102217', 'The Lord of the Rings', 3, 5, '1954-07-24', 'available'),
(18, '9780007117116', 'A Game of Thrones', 4, 5, '1996-08-06', 'available'),
(19, '9780553381689', 'A Clash of Kings', 4, 5, '1998-11-16', 'available'),
(20, '9780553381696', 'A Storm of Swords', 4, 5, '2000-08-08', 'available'),
(21, '9780553381702', 'A Feast for Crows', 4, 5, '2005-10-17', 'available'),
(22, '9780553801477', 'A Dance with Dragons', 4, 5, '2011-07-12', 'available'),
(23, '9780140177398', 'One Hundred Years of Solitude', 5, 1, '1967-05-30', 'available'),
(24, '9780525565140', 'The Alchemist', 6, 1, '1988-01-01', 'available'),
(25, '9780061122415', 'The Diary of a Young Girl', 5, 1, '1947-06-25', 'available'),
(26, '9780446310789', 'To Kill a Mockingbird', 3, 3, '1960-07-11', 'available'),
(27, '9781400033423', 'Pride and Prejudice and Zombies', 4, 1, '2009-04-01', 'available'),
(28, '9780142000670', 'The Da Vinci Code', 3, 4, '2003-03-18', 'available'),
(29, '9780307594002', 'The Girl with the Dragon Tattoo', 2, 1, '2005-08-16', 'available'),
(30, '9780679764029', 'Into the Wild', 1, 3, '1996-01-20', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `borrowings`
--

CREATE TABLE `borrowings` (
  `borrowing_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrowing_date` datetime NOT NULL,
  `return_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowings`
--

INSERT INTO `borrowings` (`borrowing_id`, `member_id`, `book_id`, `borrowing_date`, `return_date`) VALUES
(11, 1, 1, '2024-01-10 10:00:00', '2024-01-20 10:00:00'),
(12, 2, 2, '2024-01-15 12:00:00', '2024-01-25 12:00:00'),
(13, 3, 3, '2024-01-20 09:00:00', '2024-01-30 09:00:00'),
(14, 4, 4, '2024-01-25 11:00:00', '2024-02-04 11:00:00'),
(15, 5, 5, '2024-02-01 08:00:00', '2024-02-11 08:00:00'),
(16, 6, 6, '2024-02-05 14:00:00', '2024-02-15 14:00:00'),
(17, 7, 1, '2024-02-10 10:00:00', '2024-02-20 10:00:00'),
(18, 8, 2, '2024-02-15 12:00:00', '2024-02-25 12:00:00'),
(19, 9, 3, '2024-02-20 09:00:00', '2024-03-01 09:00:00'),
(20, 10, 4, '2024-02-25 11:00:00', '2024-03-06 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `username`, `password`) VALUES
(9, 'admin', '$2y$10$9EjsDI8BXS6zG8xxy9yIc.Ve1RymBrj97tcnL8j01c7G4KLsjpRMG');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `position`, `contact_info`, `branch_id`) VALUES
(1, 'John Doe', 'Librarian', 'john.doe@example.com', 1),
(2, 'Alice Smith', 'Assistant Librarian', 'alice.smith@example.com', 2),
(3, 'Michael Johnson', 'Clerk', 'michael.johnson@example.com', 1),
(4, 'Emily Brown', 'Clerk', 'emily.brown@example.com', 2),
(5, 'Daniel Wilson', 'Janitor', 'daniel.wilson@example.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `fine_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `reason` text DEFAULT NULL,
  `payment_status` enum('paid','unpaid') DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`fine_id`, `member_id`, `amount`, `reason`, `payment_status`) VALUES
(1, 1, 5.00, 'Late return', 'unpaid'),
(2, 2, 7.50, 'Damaged book', 'unpaid'),
(3, 3, 10.00, 'Lost book', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `name`) VALUES
(1, 'Romance'),
(2, 'Psychological Fiction'),
(3, 'Coming-of-age Fiction'),
(4, 'Dystopian Fiction'),
(5, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `library_branches`
--

CREATE TABLE `library_branches` (
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_branches`
--

INSERT INTO `library_branches` (`branch_id`, `name`, `address`, `contact_info`) VALUES
(1, 'Main Library', '123 Main St, Cityville', 'mainlibrary@example.com'),
(2, 'Branch Library', '456 Elm St, Townsville', 'branchlibrary@example.com'),
(3, 'North Branch', '789 Oak St, Villagetown', 'northbranch@example.com'),
(4, 'South Branch', '101 Pine St, Hamletville', 'southbranch@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `contact_info`) VALUES
(1, 'Alice Johnson', 'alice.johnson@example.com'),
(2, 'Bob Williams', 'bob.williams@example.com'),
(3, 'Charlie Brown', 'charlie.brown@example.com'),
(4, 'Diana Garcia', 'diana.garcia@example.com'),
(5, 'Ethan Martinez', 'ethan.martinez@example.com'),
(6, 'Fiona Lee', 'fiona.lee@example.com'),
(7, 'Gregory Clark', 'gregory.clark@example.com'),
(8, 'Hannah Rodriguez', 'hannah.rodriguez@example.com'),
(9, 'Ian Scott', 'ian.scott@example.com'),
(10, 'Jessica Hall', 'jessica.hall@example.com'),
(11, 'Kevin Young', 'kevin.young@example.com'),
(12, 'Linda King', 'linda.king@example.com'),
(13, 'Mike Adams', 'mike.adams@example.com'),
(14, 'Nancy Taylor', 'nancy.taylor@example.com'),
(15, 'Olivia Wright', 'olivia.wright@example.com'),
(16, 'Patrick Martinez', 'patrick.martinez@example.com'),
(17, 'Rachel Hill', 'rachel.hill@example.com'),
(18, 'Samuel Baker', 'samuel.baker@example.com'),
(19, 'Tina White', 'tina.white@example.com'),
(20, 'Victor Carter', 'victor.carter@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `name`, `contact_info`) VALUES
(1, 'Penguin Random House', 'info@penguinrandomhouse.com'),
(2, 'HarperCollins', 'info@harpercollins.com'),
(3, 'Simon & Schuster', 'info@simonandschuster.com'),
(4, 'Macmillan Publishers', 'info@macmillan.com'),
(5, 'Hachette Livre', 'info@hachette.com'),
(6, 'Bloomsbury Publishing', 'info@bloomsbury.com'),
(7, 'Scholastic Corporation', 'info@scholastic.com'),
(8, 'Pearson Education', 'info@pearson.com');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `reservation_date` datetime NOT NULL,
  `status` enum('active','expired','fulfilled') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `member_id`, `book_id`, `reservation_date`, `status`) VALUES
(1, 1, 2, '2024-02-10 10:00:00', 'active'),
(2, 2, 3, '2024-02-15 12:00:00', 'active'),
(3, 3, 4, '2024-02-20 09:00:00', 'active'),
(4, 4, 5, '2024-02-25 11:00:00', 'active'),
(5, 5, 6, '2024-03-01 08:00:00', 'active'),
(6, 6, 1, '2024-03-05 14:00:00', 'active'),
(7, 7, 2, '2024-03-10 10:00:00', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`borrowing_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`fine_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `library_branches`
--
ALTER TABLE `library_branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `borrowing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `library_branches`
--
ALTER TABLE `library_branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);

--
-- Constraints for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`),
  ADD CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `library_branches` (`branch_id`);

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

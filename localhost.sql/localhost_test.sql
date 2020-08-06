--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for users
--

--
-- Metadata for test
--

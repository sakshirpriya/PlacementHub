--
-- Database: `db`
--
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Table structure for table `u1`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `u1` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `u1`:
--

--
-- Dumping data for table `u1`
--

INSERT INTO `u1` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `u2`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `u2` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `u2`:
--

--
-- Dumping data for table `u2`
--

INSERT INTO `u2` (`id`) VALUES
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `u3`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `u3` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `u3`:
--

--
-- Dumping data for table `u3`
--

INSERT INTO `u3` (`id`) VALUES
(4),
(5),
(6);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for u1
--

--
-- Metadata for u2
--

--
-- Metadata for u3
--

--
-- Metadata for db
--

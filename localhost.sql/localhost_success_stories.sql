--
-- Database: `success_stories`
--
CREATE DATABASE IF NOT EXISTS `success_stories` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `success_stories`;

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--
-- Creation: Jul 30, 2020 at 06:23 AM
--

CREATE TABLE `stories` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `item_imagepath` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `stories`:
--

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`name`, `email`, `phone`, `link`, `item_imagepath`, `content`) VALUES
('Sample', 'sample@gmail.com', 2147483647, 'https://www.linkedin.com/feed/', 'uploads/2019_11_29_12_25_21_52.jpg', 'qwertyuioplkjhgfdsazxcvbnm,'),
('Sample', 'abc@gmail.com', 2147483647, 'https://www.linkedin.com/feed/', 'uploads/2019_12_02_08_17_24_-6513977.jpg', 'testing '),
('Sample', 'sample@gmail.com', 2147483647, 'https://www.linkedin.com/feed/', 'uploads/2019_12_02_08_19_50_-9757643.jpg', 'Ritesh Agarwal has had an interesting childhood. He was never fond of studies so he dropped formal education out of his plans.The idea of Oravel Stays struck him when he was 18.The basic idea was a budget hotel chain that provides B&B. Realizing that no other service offered a room for a budget traveller,Ritesh took the idea from Oravel stays to OYO rooms and voila! Agarwal started OYO with 11 only rooms in a Gurgaon hotel.Today, OYO has 65000 rooms in about 5500 properties across 170 cities in India');


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for stories
--

--
-- Metadata for success_stories
--

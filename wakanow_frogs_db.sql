-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 13, 2021 at 12:08 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wakanow_frogs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `frogs`
--

CREATE TABLE `frogs` (
  `frog_id` int(11) NOT NULL,
  `pond_id` int(11) NOT NULL,
  `frogtype_id` int(11) NOT NULL,
  `frog_name` varchar(150) NOT NULL,
  `gender` enum('Male','Female') DEFAULT 'Female',
  `age` date NOT NULL,
  `color` varchar(150) NOT NULL,
  `weight` decimal(14,2) NOT NULL,
  `description` text,
  `status` enum('Healthy','Sicky','Dead') NOT NULL DEFAULT 'Healthy',
  `frog_image` varchar(150) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frogs`
--

INSERT INTO `frogs` (`frog_id`, `pond_id`, `frogtype_id`, `frog_name`, `gender`, `age`, `color`, `weight`, `description`, `status`, `frog_image`, `date_created`, `date_updated`, `added_by`) VALUES
(1, 1, 4, 'Frogmilky IX', 'Male', '2016-02-03', 'Milky Brown', '4.20', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623541133_wakanow.jpg', '2021-06-12 23:38:53', '2021-06-12 23:38:53', 2),
(2, 2, 2, 'Darty IV', 'Male', '2019-03-08', 'Blue with grey', '3.60', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623541218_wakanow.jpg', '2021-06-12 23:40:18', '2021-06-12 23:40:18', 2),
(3, 3, 3, 'Gold Frog III', 'Female', '2017-10-18', 'Golden brown', '7.30', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623541313_wakanow.jpeg', '2021-06-12 23:41:53', '2021-06-12 23:41:53', 2),
(4, 1, 6, 'Golie VIII', 'Female', '2019-11-15', 'Dark Grey', '23.60', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623541378_wakanow.jpg', '2021-06-12 23:42:58', '2021-06-12 23:42:58', 2),
(5, 2, 7, 'Mira Frog IX', 'Female', '2018-10-17', 'Camo Green', '4.60', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Sicky', '1623541442_wakanow.jpeg', '2021-06-12 23:44:02', '2021-06-12 23:44:02', 2),
(6, 2, 1, 'Redy IV', 'Female', '2020-06-17', 'Red', '3.80', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623541507_wakanow.jpeg', '2021-06-12 23:45:07', '2021-06-12 23:45:07', 2),
(7, 3, 5, 'Tomaty XV', 'Male', '2018-06-06', 'Brownish Orange', '5.30', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623541613_wakanow.jpeg', '2021-06-12 23:46:53', '2021-06-12 23:46:53', 2),
(8, 1, 7, 'Xtender XVL', 'Female', '2013-09-09', 'Camo Green', '6.70', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Dead', '', '2021-06-12 23:48:14', '2021-06-12 23:59:15', 2),
(9, 2, 2, 'Darto IV', 'Female', '2018-08-10', 'Blue', '3.20', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623541766_wakanow.jpg', '2021-06-12 23:49:26', '2021-06-12 23:49:26', 2),
(10, 2, 4, 'Milky IV', 'Female', '2019-12-31', 'Yellowish Grey', '5.21', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623541841_wakanow.jpg', '2021-06-12 23:50:41', '2021-06-12 23:50:41', 2),
(11, 1, 6, 'Frolie XYZ', 'Male', '2018-03-16', 'Green', '4.80', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Dead', '1623541918_wakanow.jpg', '2021-06-12 23:51:58', '2021-06-12 23:59:40', 2),
(12, 2, 3, 'Frogy XV', 'Female', '2019-12-20', 'Brown', '4.70', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Sicky', '1623541998_wakanow.jpg', '2021-06-12 23:53:18', '2021-06-12 23:53:18', 2),
(13, 2, 1, 'Reddo XV', 'Male', '2017-05-09', 'Red', '4.50', '', 'Healthy', '1623542061_wakanow.jpeg', '2021-06-12 23:54:21', '2021-06-12 23:54:21', 2),
(14, 1, 1, 'Tree Frog IV', 'Female', '2019-12-05', 'Red', '3.80', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623542148_wakanow.jpeg', '2021-06-12 23:55:48', '2021-06-12 23:55:48', 2),
(15, 1, 3, 'Nira XYZ', 'Female', '2019-06-11', 'Green', '3.40', '', 'Sicky', '', '2021-06-12 23:56:50', '2021-06-12 23:56:50', 2),
(16, 3, 6, 'Golie XYZ', 'Female', '2019-06-13', 'Golden Brown', '5.40', '', 'Healthy', '1623542266_wakanow.jpeg', '2021-06-12 23:57:46', '2021-06-12 23:57:46', 2),
(17, 2, 7, 'Lumi', 'Male', '2017-06-08', 'Camo Green', '4.90', 'The world’s tropical forests house a spectacular array of frogs. In fact, although found almost everywhere on Earth, frogs are at their most diverse in tropical regions—places like the Amazon rainforest and the forests of Equatorial Africa. The following are seven amazing types of frogs found exclusively in those environments, which typically are hot, wet, and densely vegetated—perfect for creatures specially adapted to both aquatic and terrestrial habitats.', 'Healthy', '1623542341_wakanow.jpeg', '2021-06-12 23:59:01', '2021-06-12 23:59:01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `frogtypes`
--

CREATE TABLE `frogtypes` (
  `frogtype_id` int(11) NOT NULL,
  `frogtype_name` varchar(100) NOT NULL,
  `frogtype_desc` text,
  `frogtype_image` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frogtypes`
--

INSERT INTO `frogtypes` (`frogtype_id`, `frogtype_name`, `frogtype_desc`, `frogtype_image`, `date_created`) VALUES
(1, 'Red-Eyed Tree Frog', 'The red-eyed tree frog (Agalychnis callidryas), a native of the tropical lowlands extending from southern Mexico to northern South America, is a favorite for its remarkable adaptations. Its bulging red eyes are its telltale feature, but it is also known for its neon-green body, accented with vertical blue and yellow stripes on the sides and bright orange or reddish feet. It is thought that when startled, the red-eyed tree frog flashes its exaggerated coloration, temporarily confusing its predators and thereby enabling its escape. The species has an impressive jumping ability, too, which earned it the nickname “monkey frog.” Its huge webbed feet, which are equipped with sticky pads, provide a secure grip as it leaps and climbs among the trees.', '1623536386_wakanow.jpeg', '2021-06-11 13:29:18'),
(2, 'Blue Poison Dart Frog', 'The blue poison dart frog (Dendrobates tinctorius &quot;azureus&quot;) is unquestionably beautiful—like sapphire. And similar to a precious gemstone, this species of frog is one of nature’s unique treasures, found only in the tropical forests that border the Sipaliwini Savanna of southern Suriname and extend into northern Brazil. As its bright warning coloration and common name suggest, the blue poison dart frog is poisonous, secreting a toxic substance through its skin. It is further distinguished by its physique, having long arms and a hunched back. Every individual of the species has a distinct pattern of black spots on its back and sides, a sort of fingerprint that can be used to tell them apart.', '1623536318_wakanow.jpeg', '2021-06-11 13:29:18'),
(3, 'Golden Poison Frog', 'Small and with big round eyes, the golden poison frog (Phyllobates terribilis) looks relatively harmless. But coating its brightly colored skin is a lethal substance known as batrachotoxin. A typical wild golden poison frog has from 700 to 1,900 micrograms of toxin in its system, a fraction of which—200 micrograms or less—is enough to kill a human. Although commonly yellow, adults may be anywhere from orange to pale green in color. Similar to many other brightly colored animals, its vividly painted body serves as a warning of its toxicity. Remarkably, the snake Liophis epinephelus is immune to the poison, making it the frog’s only known predator. The golden poison frog is native to five pockets of lowland habitat in the upper Río Saija drainage of the Amazonian rainforest, along Colombia’s Pacific coast. It is an endangered species, owing to its small populations, the limited extent of its range, and the ongoing decline of its habitat.', '1623533974_wakanow.jpeg', '2021-06-10 23:10:38'),
(4, 'Amazon Milk Frog', 'With alternating bands and patches of dark brown and light gray to blue skin, the Amazon milk frog (Trachycephalus resinifictrix) is a uniquely and beautifully colored species. The contrast between the colors is at its most vibrant in young frogs. As they age, the colors fade slightly, and their skin becomes increasingly granular in texture. The coloration helps the Amazon milk frog to blend into the trees in its habitat in the Amazon rainforest of northern South America. Its toe pads are also specially adapted for an arboreal lifestyle. The species’ genus name refers to its characteristically long snout, while the common name “milk frog” describes the milky white, poisonous secretions that exude from its skin when the animal is stressed. The Amazon milk frog is also known as the mission golden-eyed tree frog for the remarkable gold-and-black cross pattern in the iris of its eye.', '1623534102_wakanow.jpeg', '2021-06-10 23:10:50'),
(5, 'Tomato Frog', 'Red and plump, the tomato frog (Dyscophus antongilii) is very much like a big, ripe tomato. The brightest and largest individuals of the species are the females. In the both sexes, coloration serves as a warning sign—when threatened, the tomato frog secretes a white, glue-like substance from its skin, which serves as a deterrent to predators. The tomato frog is native to the tropical rainforests of northeastern Madagascar, specifically the area of Antongil Bay.', '1623534158_wakanow.jpeg', '2021-06-11 23:10:57'),
(6, 'Goliath Frog', 'The goliath frog (Conraua goliath) measures between 6.5 and 12.5 inches in length and weighs anywhere from about 1 to 7 pounds, making it the largest frog in the world. Tadpoles begin life the same size as the tadpoles of other frog species but grow to unusually large size within about three months. Goliath frogs also lack vocal sacs, instead using a sort of whistling sound for their mating call, and males typically are larger than females, a characteristic that is rare among frogs. The goliath frog inhabits rivers in the tropical forests of Equatorial Guinea and Cameroon. The species is endangered.', '1623536700_wakanow.jpg', '2021-06-12 21:44:38'),
(7, 'Mimic Poison Frog', 'The mimic poison frog (Ranitomeya imitator) is a favorite for its wide variation in color patterns. Four distinct morphs are known for the species, each a blend of vibrant hues. The morphs are thought to have evolved through a phenomenon called mimetic radiation, in which a species comes to closely resemble different model species. In the case of the mimic poison frog, those models are other species of poison frogs, like the splash-back poison frog (R. variabilis) and the red-headed poison frog (R. fantastica), that inhabit different geographical areas of central Peru—areas that all lie within the range of the mimic poison frog. At the edges of those areas, contact between different morphs of the mimic poison frog results in the generation of hybrids with truly unique color patterns. Some of those patterns may provide a reproductive advantage, suggesting that the mimic poison frog is evolving right in front of our eyes.', '1623534334_wakanow.jpeg', '2021-06-12 21:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `ponds`
--

CREATE TABLE `ponds` (
  `pond_id` int(11) NOT NULL,
  `pond_name` varchar(150) NOT NULL,
  `pond_desc` text,
  `pond_status` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ponds`
--

INSERT INTO `ponds` (`pond_id`, `pond_name`, `pond_desc`, `pond_status`, `date_created`) VALUES
(1, 'Alpha XYZ Pond', 'Alpha XYZ Pond', 'Active', '2021-06-12 13:22:24'),
(2, 'Luminus Xtra Pond', 'Luminus Xtra Pond', 'Active', '2021-06-12 13:22:40'),
(3, 'Tadpole Pond', 'Tadpole Pond', 'Active', '2021-06-12 13:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Super Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `emailaddress` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `firstname`, `lastname`, `emailaddress`, `password`, `date_created`, `date_updated`) VALUES
(1, 1, 'Yemi', 'Akinbamido', 'africpoet@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-12 23:23:03', '2021-06-12 23:23:03'),
(2, 1, 'Bako', 'Danladi', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-12 23:29:39', '2021-06-12 23:29:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frogs`
--
ALTER TABLE `frogs`
  ADD PRIMARY KEY (`frog_id`),
  ADD UNIQUE KEY `frog_name_UNIQUE` (`frog_name`),
  ADD KEY `fk_frogs_pond_id_idx` (`pond_id`),
  ADD KEY `fk_frogs_frogtype_id_idx` (`frogtype_id`),
  ADD KEY `fk_frogs_users_idx` (`added_by`);

--
-- Indexes for table `frogtypes`
--
ALTER TABLE `frogtypes`
  ADD PRIMARY KEY (`frogtype_id`),
  ADD UNIQUE KEY `frogtype_name_UNIQUE` (`frogtype_name`);

--
-- Indexes for table `ponds`
--
ALTER TABLE `ponds`
  ADD PRIMARY KEY (`pond_id`),
  ADD UNIQUE KEY `pond_name_UNIQUE` (`pond_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `emailaddress_UNIQUE` (`emailaddress`),
  ADD KEY `fk_users_role_id_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `frogs`
--
ALTER TABLE `frogs`
  MODIFY `frog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `frogtypes`
--
ALTER TABLE `frogtypes`
  MODIFY `frogtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ponds`
--
ALTER TABLE `ponds`
  MODIFY `pond_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `frogs`
--
ALTER TABLE `frogs`
  ADD CONSTRAINT `fk_frogs_frogtypes` FOREIGN KEY (`frogtype_id`) REFERENCES `frogtypes` (`frogtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_frogs_ponds` FOREIGN KEY (`pond_id`) REFERENCES `ponds` (`pond_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_frogs_users` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

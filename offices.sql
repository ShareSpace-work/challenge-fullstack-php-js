-- -------------------------------------------------------------
-- TablePlus 4.5.0(396)
--
-- https://tableplus.com/
--
-- Database: sharespace
-- Generation Time: 2021-10-27 14:26:05.8510
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `offices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `type` text,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `offices` (`id`, `name`, `description`, `deleted`, `photo`, `type`, `lat`, `lng`) VALUES
(1, 'Varso Place', 'The three buildings are home to offices, a hotel, an innovation centre, restaurants, coffee shops and convenient services, as well as the highest observation deck in Poland. Created with your comfort, safety and well-being in mind, Varso Place is a place that inspires action.', 0, 'https://cdn.sharespace.work/v7/files/uploads/buildings/5f105c7d35665.jpeg', 'Traditional Lease', 52.2285, 20.9973),
(2, 'Warsaw Spire', 'The Warsaw Spire is a complex of Neomodern office buildings in Warsaw, Poland constructed by the Belgian real estate developer Ghelamco. ', 0, 'https://cdn.sharespace.work/v7/files/uploads/buildings/5f105cd389d30.jpg', 'Traditional Lease', 52.2324, 20.9843),
(3, 'WeWork Mennica Legacy Tower', 'WeWork is a global network of workspaces where companies grow together. At this convenient address, discover floors of coworking and private offices that cater to needs you didn’t even know you had. Our spaces are designed to promote productivity whether you’re a team of one or 100, and month-to-month flexibility means your space is just as agile as you are. Plus, one all-inclusive rate makes things easy. ', 0, 'https://cdn.sharespace.work/v7/files/Venues/photo/421/5e4c22f66e8a5.jpg', 'Flexible Lease', 52.2326, 20.9926);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
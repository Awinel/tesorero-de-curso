In the project is missing the config folder and the database.php.
Because of security reasons I take it out but the connection in simple and here are the tables and the sql script to create the database using myPHPAdmin
SQL statement

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesorerodecurso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_tracking`
--

CREATE TABLE `payment_tracking` (
  `tracking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_1` int(11) DEFAULT NULL,
  `payment_2` int(11) DEFAULT NULL,
  `payment_3` int(11) DEFAULT NULL,
  `payment_4` int(11) DEFAULT NULL,
  `payment_5` int(11) DEFAULT NULL,
  `payment_6` int(11) DEFAULT NULL,
  `payment_7` int(11) DEFAULT NULL,
  `payment_8` int(11) DEFAULT NULL,
  `payment_9` int(11) DEFAULT NULL,
  `payment_10` int(11) DEFAULT NULL,
  `payment_11` int(11) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `extra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_information`
--

CREATE TABLE `user_information` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rut` varchar(255) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indices de la tabla `payment_tracking`
--
ALTER TABLE `payment_tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `payment_tracking`
--
ALTER TABLE `payment_tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_information`
--
ALTER TABLE `user_information`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `payment_tracking`
--
ALTER TABLE `payment_tracking`
  ADD CONSTRAINT `payment_tracking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

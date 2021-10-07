-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 03 May 2021, 21:58:32
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `recipesdb`
--
CREATE DATABASE IF NOT EXISTS `recipesdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `recipesdb`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recipeimages`
--

CREATE TABLE `recipeimages` (
  `id` int(11) NOT NULL,
  `recipeid` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `recipeimages`
--

INSERT INTO `recipeimages` (`id`, `recipeid`, `image`) VALUES
(45, 15, 'img/r1.JPGid_15.jpeg'),
(46, 16, 'img/r1.JPGid_16.jpeg'),
(47, 16, 'img/r2.JPGid_16.jpeg'),
(48, 0, 'img/s1.JPGid_0.jpeg'),
(49, 0, 'img/s2.JPGid_0.jpeg'),
(50, 0, 'img/s3.JPGid_0.jpeg'),
(51, 0, 'img/s4.JPGid_0.jpeg'),
(52, 0, 'img/s5.JPGid_0.jpeg'),
(53, 17, 'img/s1.JPGid_17.jpeg'),
(54, 17, 'img/s2.JPGid_17.jpeg'),
(55, 17, 'img/s3.JPGid_17.jpeg'),
(56, 17, 'img/s4.JPGid_17.jpeg'),
(57, 17, 'img/s5.JPGid_17.jpeg'),
(58, 0, 'img/t3.JPGid_0.jpeg'),
(59, 0, 'img/t3.JPGid_0.jpeg'),
(60, 0, 'img/t3.JPGid_0.jpeg'),
(61, 0, 'img/t3.JPGid_0.jpeg'),
(62, 18, 'img/t3.JPGid_18.jpeg'),
(63, 19, 'img/t3.JPGid_19.jpeg'),
(64, 20, 'img/sa1.JPGid_20.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `calories` double NOT NULL,
  `difficulty` int(11) NOT NULL,
  `cookingtime` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `ingredients` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `type`, `calories`, `difficulty`, `cookingtime`, `description`, `keywords`, `ingredients`) VALUES
(15, 'Air Fryer Coconut Shrimp', 'Cooking', 350, 3, 45, 'You can substitute the serrano chile with 2 teaspoons crushed red pepper.', 'food,cooking', '½ cup all-purpose flour,1 ½ teaspoons ground black pepper,2 large eggs,⅔ cup unsweetened flaked coconut,⅓ cup panko bread crumbs,12 ounces uncooked medium shrimp, peeled and deveined,cooking spray,½ teaspoon kosher salt, divided,¼ cup honey,¼ cup lime juice,1 serrano chile, thinly sliced,2 teaspoons chopped fresh cilantro'),
(16, 'Roast Chicken with Skillet Stuffing', 'Oven', 450, 4, 125, 'Sliced French bread soaks up roast chicken juices to make delicious skillet stuffing. Perfect for chilly winter evenings. Since it only uses one pan, cleanup is a breeze.', 'chicken', '2 tablespoons olive oil,¼ cup butter, divided,3 large onions, sliced,2 cups sliced celery,1 leek, sliced,2 teaspoons lemon zest,½ teaspoon dried thyme'),
(17, 'Pico De Gallo de Alicia', 'None', 150, 4, 300, 'An authentic Mexican salsa made with tomatoes, onions, and jalapenos. Serve with tacos, nachos, tortilla chips, black beans, refried beans, or fajitas or use as an ingredient in many Mexican recipes. My family uses it as a side in which to dip grilled steak. If you like it hot, then this is for you; this pico is not for the ', 'salad,tomato', '2 tomatoes diced,1 red onion, finely chopped,2 jalapeno peppers seeded and chopped,2 sprigs cilantro finely chopped,1 clove garlic pressed,½ small lime juiced,1 teaspoon garlic salt or to taste'),
(18, 'Crispy Pork Carnitas', 'Pan', 350, 2, 240, 'Theres nothing like carnitas. Cubes of fragrantly spiced pork are slowly cooked in lard until theyre crispy on the outside while at the same time remaining soft and succulent inside. ', 'Meat,carnitas,cube', '3 pounds boneless pork butt (shoulder),8 cloves garlic peeled,¼ cup olive oil,1 orange, juiced, orange parts of peel removed and sliced into thin strip,1 tablespoon kosher saltpepper'),
(19, 'Crispy Pork Carnitas', 'Pan', 350, 2, 240, 'Theres nothing like carnitas. Cubes of fragrantly spiced pork are slowly cooked in lard until theyre crispy on the outside while at the same time remaining soft and succulent inside. ', 'Meat,carnitas,cube', '3 pounds boneless pork butt (shoulder),8 cloves garlic peeled,¼ cup olive oil,1 orange, juiced, orange parts of peel removed and sliced into thin strip,1 tablespoon kosher saltpepper'),
(20, 'Homemade Ramp Mayonnaise', 'None', 250, 3, 6, 'This garlicky mayonnaise is delicious with cold cuts, grilled or fried fish, or as a dip. The amount of ramps to use is really up to your personal taste--anywhere from a couple of tablespoons to a small bunch.', 'mayonnaise', '1 large egg,2 large egg yolks,1 teaspoon Dijon mustard,salt to taste,¾ cup light olive oil, tablespoons extra-virgin olive oil');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recipesteps`
--

CREATE TABLE `recipesteps` (
  `id` int(11) NOT NULL,
  `recipeid` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `recipesteps`
--

INSERT INTO `recipesteps` (`id`, `recipeid`, `description`, `image`) VALUES
(34, 15, 'Stir together flour and pepper in shallow dish. Lightly beat eggs in a second shallow dish. Stir together coconut and panko in a third shallow dish. Hold each shrimp by the tail, dredge in flour mixture, and shake off excess. Then dip floured shrimp in egg, and allow any excess to drip off. Finally, dredge in coconut mixture, pressing to adhere. Place on a plate. Coat shrimp well with cooking spray.', 'img/r2.JPGid_15.jpeg'),
(35, 15, 'Preheat air fryer to 400 degrees F (200 degrees C). Place 1/2 the shrimp in the air fryer and cook about 3 minutes. Turn shrimp over and continue cooking until golden, about 3 minutes more. Season with 1/4 teaspoon salt. Repeat with remaining shrimp.', 'img/r3.JPGid_15.jpeg'),
(36, 15, 'Meanwhile, whisk together honey, lime juice, and serrano chile in small bowl for the dip.', 'img/r4.JPGid_15.jpeg'),
(37, 15, 'Sprinkle fried shrimp with cilantro and serve with dip.', 'img/r4.JPGid_15.jpeg'),
(38, 16, 'Preheat oven to 375 degrees F (190 degrees C).', 'img/id_16.jpeg'),
(39, 16, 'Heat olive oil and 2 tablespoons butter in a large oven-safe skillet over medium heat. Add onions, celery, and leek. Cook and stir until softened, about 10 minutes. Stir in lemon zest, thyme, garlic, and red pepper flakes. Cook until flavors combine, about 5 minutes. Mix in parsley. Remove from heat; transfer vegetable mixture to a bowl.', 'img/r2.JPGid_16.jpeg'),
(40, 16, 'Butterfly the chicken by removing the backbone, and pressing down on the breastbone to crack chicken open using a knife or kitchen shears. Open the 2 sides and spread them out like an open book. Rub the remaining 2 tablespoons butter all over the chicken. Season with salt and pepper.', 'img/r1.JPGid_16.jpeg'),
(41, 16, 'Lay bread onto the bottom of the same skillet; spread vegetable mixture over bread to make stuffing. Arrange chicken into a layer on top, skin side-up. Pour lemon juice over chicken.', 'img/r1.JPGid_16.jpeg'),
(42, 16, 'Bake, uncovered, in the preheated oven until no longer pink at the bone and the juices run clear, 1 hour to 1 hour 30 minutes. An instant-read thermometer inserted into the thickest part of the thigh, near the bone, should read 165 degrees F (74 degrees C).', 'img/r1.JPGid_16.jpeg'),
(43, 16, 'Remove chicken from the oven, cover with a doubled sheet of aluminum foil, and allow to rest in a warm area for 10 minutes before slicing into quarters. Spoon stuffing onto each serving patter and top with chicken.', 'img/r1.JPGid_16.jpeg'),
(44, 0, 'Mix tomato, red onion, jalapeno pepper, cilantro, garlic, and lime juice in a bowl; season with garlic salt and stir.', 'img/s5.JPGid_0.jpeg'),
(45, 0, 'Cover bowl with plastic wrap and refrigerate at least 4 hours.', 'img/s4.JPGid_0.jpeg'),
(46, 17, 'Mix tomato, red onion, jalapeno pepper, cilantro, garlic, and lime juice in a bowl; season with garlic salt and stir.', 'img/s4.JPGid_17.jpeg'),
(47, 17, 'Cover bowl with plastic wrap and refrigerate at least 4 hours.', 'img/s2.JPGid_17.jpeg'),
(48, 0, 'Preheat oven to 275 degrees F (135 degrees C).', 'img/t1.JPGid_0.jpeg'),
(49, 0, 'Remove fat from pork; cut pork meat into 2-inch cubes and roughly chop fat.', 'img/t2.JPGid_0.jpeg'),
(50, 0, 'Mix pork, garlic, olive oil, orange peel, orange juice, salt, bay leaves, black pepper, cumin, cinnamon, and 5-spice powder together in a bowl until pork is coated completely. Transfer mixture to a 9x13-inch baking dish. Place baking dish on a baking sheet and cover baking dish tightly with heavy-duty aluminum foil.', 'img/t3.JPGid_0.jpeg'),
(51, 0, 'Bake in the preheated oven until pork is fork-tender, about 3 1/2 hours.', 'img/t4.JPGid_0.jpeg'),
(52, 0, 'Transfer meat to a colander set over a bowl. Remove garlic, bay leaves, and orange peels from baking dish and pour accumulated juices from the baking dish over meat in colander into the bowl. Return meat to the baking dish and drizzle accumulated juices over each piece of meat.', 'img/t2.JPGid_0.jpeg'),
(53, 0, 'Cook meat under the preheated broiler for 3 minutes. Drizzle more accumulated juices over meat and continue broiling until crispy, 3 to 5 minutes. Transfer pork to a serving plate and drizzle more accumulated juices over the top.', 'img/t3.JPGid_0.jpeg'),
(54, 0, 'Preheat oven to 275 degrees F (135 degrees C).', 'img/t2.JPGid_0.jpeg'),
(55, 0, 'Remove fat from pork; cut pork meat into 2-inch cubes and roughly chop fat.', 'img/t4.JPGid_0.jpeg'),
(56, 0, 'Mix pork, garlic, olive oil, orange peel, orange juice, salt, bay leaves, black pepper, cumin, cinnamon, and 5-spice powder together in a bowl until pork is coated completely.', 'img/t1.JPGid_0.jpeg'),
(57, 0, 'Preheat oven to 275 degrees F', 'img/t3.JPGid_0.jpeg'),
(58, 0, 'Remove fat from pork; cut pork meat into 2-inch cubes and roughly chop fat.', 'img/t4.JPGid_0.jpeg'),
(59, 0, 'Mix pork, garlic, olive oil, orange peel, orange juice, salt, bay leaves, black pepper, cumin, cinnamon,', 'img/t1.JPGid_0.jpeg'),
(60, 20, 'Combine egg and egg yolk in a food processor and start processing. Slowly pour in light olive oil and extra virgin olive oil until mixture becomes thick and creamy. Add lemon juice and salt.', 'img/sa1.JPGid_20.jpeg'),
(61, 20, 'Transfer mayonnaise to a small bowl and stir in ramps. Spoon into a jar with a lid and refrigerate until serving.', 'img/sa1.JPGid_20.jpeg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `recipeimages`
--
ALTER TABLE `recipeimages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `recipesteps`
--
ALTER TABLE `recipesteps`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `recipeimages`
--
ALTER TABLE `recipeimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Tablo için AUTO_INCREMENT değeri `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `recipesteps`
--
ALTER TABLE `recipesteps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

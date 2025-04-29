-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2025 at 06:46 AM
-- Server version: 8.0.37
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `victori1_grub`
--
CREATE DATABASE IF NOT EXISTS `victori1_grub` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `victori1_grub`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int UNSIGNED NOT NULL,
  `commenter_user_id` int UNSIGNED NOT NULL,
  `recipe_id` int UNSIGNED NOT NULL,
  `comment_text` text NOT NULL,
  `comment_left_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `id` tinyint UNSIGNED NOT NULL,
  `diet` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`id`, `diet`) VALUES
(11, 'gluten-free'),
(8, 'heart healthy'),
(3, 'keto'),
(6, 'low-carb'),
(4, 'low-fat'),
(7, 'mediterranean'),
(5, 'no-sugar added'),
(12, 'none'),
(9, 'raw'),
(2, 'vegan'),
(1, 'vegetarian'),
(10, 'whole-food');

-- --------------------------------------------------------

--
-- Table structure for table `direction`
--

CREATE TABLE `direction` (
  `id` int UNSIGNED NOT NULL,
  `recipe_id` int UNSIGNED NOT NULL,
  `direction_line_item` tinyint UNSIGNED NOT NULL,
  `direction_text` varchar(255) NOT NULL,
  `sort_order` tinyint DEFAULT (`direction_line_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `direction`
--

INSERT INTO `direction` (`id`, `recipe_id`, `direction_line_item`, `direction_text`, `sort_order`) VALUES
(1, 1, 1, 'Peel and cut potatoes into even chunks.', 1),
(2, 1, 2, 'Boil potatoes in salted water for 15-20 minutes until fork-tender.', 2),
(3, 1, 3, 'Drain potatoes and return them to the pot.', 3),
(4, 1, 4, 'Mash potatoes while adding butter and milk.', 4),
(5, 1, 5, 'Season with salt and black pepper to taste.', 5),
(6, 1, 6, 'Serve warm and enjoy!', 6),
(7, 2, 1, 'Season steaks with salt and press crushed peppercorns onto both sides.', 1),
(8, 2, 2, 'Heat olive oil and butter in a pan over medium-high heat.', 2),
(9, 2, 3, 'Sear steaks for 3-4 minutes per side for medium-rare, then remove from pan and set aside.', 3),
(10, 2, 4, 'Carefully add cognac or brandy to the pan and ignite to burn off alcohol.', 4),
(11, 2, 5, 'Reduce heat and stir in heavy cream, simmering until thickened.', 5),
(12, 2, 6, 'Return steaks to the pan, spoon sauce over them, and serve immediately.', 6),
(13, 3, 1, 'Preheat oven to 350°F (175°C).', 1),
(14, 3, 2, 'Bring a pot of salted water to a boil and blanch the green beans for 3-4 minutes.', 2),
(15, 3, 3, 'Drain and transfer green beans to a large mixing bowl.', 3),
(16, 3, 4, 'Stir in condensed cream of mushroom soup, milk, black pepper, and garlic powder.', 4),
(17, 3, 5, 'Transfer the mixture to a baking dish and bake for 25 minutes.', 5),
(18, 3, 6, 'Remove from oven, sprinkle crispy fried onions on top, and bake for another 5 minutes.', 6),
(19, 3, 7, 'Let cool for a few minutes and serve warm.', 7),
(20, 4, 1, 'In a large bowl, whisk together flour, baking powder, salt, and sugar.', 1),
(21, 4, 2, 'In another bowl, beat the egg, then add milk and melted butter. Mix well.', 2),
(22, 4, 3, 'Gradually pour the wet ingredients into the dry ingredients and whisk until smooth.', 3),
(23, 4, 4, 'Heat a lightly oiled skillet or griddle over medium heat.', 4),
(24, 4, 5, 'Pour about 1/4 cup of batter onto the skillet for each pancake.', 5),
(25, 4, 6, 'Cook until bubbles form on the surface, then flip and cook until golden brown.', 6),
(26, 4, 7, 'Serve warm with butter, syrup, or desired toppings.', 7),
(27, 5, 1, 'Preheat oven to 325°F (163°C).', 1),
(28, 5, 2, 'Mix chocolate cookie crumbs with melted butter and press into the bottom of a springform pan.', 2),
(29, 5, 3, 'Bake for 10 minutes, then let cool.', 3),
(30, 5, 4, 'In a large bowl, beat cream cheese and sugar until smooth.', 4),
(31, 5, 5, 'Add eggs one at a time, mixing after each addition.', 5),
(32, 5, 6, 'Mix in sour cream, cocoa powder, vanilla extract, vinegar, and red food coloring.', 6),
(33, 5, 7, 'Pour the filling over the crust and smooth the top.', 7),
(34, 5, 8, 'Bake for 50-60 minutes or until the center is set.', 8),
(35, 5, 9, 'Turn off the oven and let the cheesecake cool inside for 1 hour with the door slightly open.', 9),
(36, 5, 10, 'Refrigerate for at least 4 hours or overnight.', 10),
(37, 5, 11, 'Beat cream cheese and butter until fluffy.', 11),
(38, 5, 12, 'Gradually add powdered sugar and vanilla, mixing until smooth.', 12),
(39, 5, 13, 'Spread the frosting evenly over the chilled cheesecake before serving.', 13),
(40, 6, 1, 'Preheat oven to 375°F (190°C).', 1),
(41, 6, 2, 'Spread tortilla chips in an even layer on a large baking sheet.', 2),
(42, 6, 3, 'Sprinkle shredded cheddar and Monterey Jack cheese over the chips.', 3),
(43, 6, 4, 'In a skillet over medium heat, cook the ground beef until browned.', 4),
(44, 6, 5, 'Drain excess fat, then stir in taco seasoning and water. Simmer for 2-3 minutes.', 5),
(45, 6, 6, 'Spread seasoned beef evenly over the chips and cheese.', 6),
(46, 6, 7, 'Add black beans and jalapeño slices.', 7),
(47, 6, 8, 'Bake for 8-10 minutes, or until the cheese is fully melted.', 8),
(48, 6, 9, 'Remove from the oven and top with diced tomatoes, red onions, sour cream, and guacamole.', 9),
(49, 6, 10, 'Garnish with green onions and cilantro before serving.', 10),
(50, 7, 1, 'Preheat oven to 425°F (218°C).', 1),
(51, 7, 2, 'Place the pre-made pizza crust on a baking sheet or pizza stone.', 2),
(52, 7, 3, 'Spread pizza sauce evenly over the crust.', 3),
(53, 7, 4, 'Sprinkle mozzarella cheese evenly over the sauce.', 4),
(54, 7, 5, 'Top with pepperoni slices, crumbled sausage, bacon, and diced ham.', 5),
(55, 7, 6, 'Add red onions and sprinkle Parmesan cheese on top.', 6),
(56, 7, 7, 'Drizzle olive oil over the pizza and sprinkle with Italian seasoning.', 7),
(57, 7, 8, 'Bake for 12-15 minutes or until cheese is melted and crust is golden brown.', 8),
(58, 7, 9, 'Remove from oven and let sit for a few minutes before slicing.', 9),
(59, 7, 10, 'Serve hot and enjoy!', 10),
(60, 9, 1, 'Preheat oven to 425°F (218°C) if baking, or heat oil in a deep fryer to 375°F (190°C) if frying.', 1),
(61, 9, 2, 'In a large bowl, mix flour, baking powder, salt, black pepper, garlic powder, and paprika.', 2),
(62, 9, 3, 'Pat chicken wings dry with paper towels, then toss in the flour mixture until evenly coated.', 3),
(63, 9, 4, 'For baking: Place wings on a wire rack over a baking sheet and spray lightly with cooking spray.', 4),
(64, 9, 5, 'Bake for 20-25 minutes, flipping halfway, until crispy and golden brown.', 5),
(65, 9, 6, 'For frying: Fry wings in hot oil for 8-10 minutes until crispy and fully cooked.', 6),
(66, 9, 7, 'In a separate bowl, whisk melted butter, hot sauce, vinegar, and Worcestershire sauce together.', 7),
(67, 9, 8, 'Toss cooked wings in the buffalo sauce until well coated.', 8),
(68, 9, 9, 'Serve immediately with ranch or blue cheese dressing and celery sticks.', 9),
(69, 10, 1, 'Preheat grill to medium-high heat (about 400°F).', 1),
(70, 10, 2, 'Rub steaks with olive oil, salt, black pepper, garlic powder, and paprika. Let sit for 10 minutes.', 2),
(71, 10, 3, 'Drizzle asparagus with olive oil, salt, and black pepper.', 3),
(72, 10, 4, 'Place steaks on the grill and cook for 4-5 minutes per side for medium-rare (longer for well-done).', 4),
(73, 10, 5, 'While steaks are grilling, place asparagus on the grill and cook for 3-5 minutes until tender and slightly charred.', 5),
(74, 10, 6, 'Remove steaks from the grill and let them rest for 5 minutes before serving.', 6),
(75, 10, 7, 'Drizzle grilled asparagus with lemon juice and sprinkle with Parmesan cheese.', 7),
(76, 10, 8, 'Serve steaks with grilled asparagus on the side.', 8),
(77, 11, 1, 'Heat water', 1),
(78, 11, 2, 'Add salt and grits', 2),
(79, 11, 4, 'Cook for 5 minutes', 4),
(80, 11, 5, 'Add butter and eat', 5),
(81, 12, 1, '1.	Preheat oven to 400°F (200°C). Grease a 9x9-inch baking pan.', 1),
(82, 12, 2, '2.	In a large bowl, whisk together the cornmeal, flour, sugar, baking powder, and salt.', 2),
(83, 12, 3, '3.	In a separate bowl, whisk together the milk, melted butter, and egg.', 3),
(84, 12, 4, '4.	Pour the wet ingredients into the dry ingredients and stir until just combined.', 4),
(85, 12, 5, '5.	Pour the batter into the greased baking pan and smooth the top.', 5),
(86, 12, 6, '6.	Bake for 20-25 minutes, or until a toothpick inserted in the center comes out clean.', 6),
(87, 12, 7, '7.	Let cool slightly before slicing and serving.', 7),
(88, 14, 1, 'Spray a 9×13 baking dish with nonstick spray. Sprinkle the dry cake mix evenly in the dish.', 1),
(89, 14, 2, 'Sprinkle the instant chocolate pudding mix evenly across the cake mix.', 2),
(90, 14, 3, 'Add the milk to the melted butter – make sure the butter is at room temperature and not hot, so the milk doesn’t curdle.', 3),
(91, 14, 4, 'Pour the milk/butter mix on top of the cake and pudding mix.', 4),
(92, 14, 5, 'Use a whisk to mix slightly – you don’t need to stir entirely, but you do want it slightly incorporated so that it bakes evenly', 5),
(93, 14, 6, 'Sprinkle the entire bag of chocolate chips across the top', 6),
(94, 14, 7, 'Bake in an oven preheated to 350°F for 40 to 45 minutes', 7),
(95, 15, 1, 'In a large bowl, combine the sliced cucumbers and red onion.', 1),
(96, 15, 2, 'In a small bowl, whisk together the vinegar, olive oil, sugar, salt, and black pepper', 2),
(97, 15, 3, 'Pour the dressing over the cucumbers and onions, tossing to coat evenly', 3),
(98, 15, 4, 'Sprinkle with fresh dill and mix gently', 4),
(99, 15, 5, 'Let the salad sit for at least 10 minutes before serving to allow flavors to meld', 5),
(100, 15, 6, 'Serve chilled or at room temperature.', 6),
(101, 16, 1, 'In a large bowl, combine the sliced cucumbers and red onion', 1),
(102, 16, 2, ' In a small bowl, whisk together the vinegar, olive oil, sugar, salt, and black pepper', 2),
(103, 16, 5, ' Pour the dressing over the cucumbers and onions, tossing to coat evenly.', 5),
(104, 16, 6, 'Sprinkle with fresh dill and mix gently', 6),
(105, 16, 7, 'Let the salad sit for at least 10 minutes before serving to allow flavors to meld', 7),
(106, 16, 8, 'Serve chilled or at room temperature', 8),
(107, 18, 1, 'In a large bowl, combine the sliced cucumbers and red onion.', 1),
(108, 18, 2, 'In a small bowl, whisk together the vinegar, olive oil, sugar, salt, and black pepper.', 2),
(109, 18, 3, 'Pour the dressing over the cucumbers and onions, tossing to coat evenly.', 3),
(110, 18, 4, 'Sprinkle with fresh dill and mix gently.', 4),
(111, 18, 5, 'Let the salad sit for at least 10 minutes before serving to allow flavors to meld.', 5),
(112, 18, 6, 'Serve chilled or at room temperature.', 6),
(113, 19, 1, 'Preheat oven to 400F (200C0. Grease a 9x9-inch baking pan.', 1),
(114, 19, 2, 'In a large bowl, whisk together the cornmeal, flour, sugar, baking powder, and salt.', 2),
(115, 19, 3, 'In a separate bowl, whisk together the milk, melted butter, and egg.', 3),
(116, 19, 4, 'Pour the wet ingredients into the dry ingredients and stir until just combined.', 4),
(117, 19, 5, 'Pour the batter into the greased baking pan and smooth the top.', 5),
(118, 19, 6, 'Bake for 20-25 minutes, or until a toothpick inserted in the center comes out clean.', 6),
(119, 19, 7, 'Let cool slightly before slicing and serving.', 7),
(120, 20, 1, 'Bring 4 quarts of water to a boil', 1),
(121, 20, 2, 'add pasta to boiling water while you start to cook your beef', 2),
(122, 20, 3, 'cook your ground beef until cooked thoroughly ', 3),
(123, 20, 4, 'Once pasta is done drain it then return it to the pot', 4),
(124, 20, 5, 'Add the meat and sauce to the cooked noodles', 5),
(125, 20, 6, 'mix all together then enjoy', 6),
(126, 21, 1, 'In a large bowl, combine the sliced cucumbers and red onion.', 1),
(127, 21, 2, 'In a small bowl, whisk together the vinegar, olive oil, sugar, salt, and black pepper.', 2),
(128, 21, 3, 'Pour the dressing over the cucumbers and onions, tossing to coat evenly.', 3),
(129, 21, 4, 'Sprinkle with fresh dill and mix gently.', 4),
(130, 21, 5, 'Let the salad sit for at least 10 minutes before serving to allow flavors to meld.', 5),
(131, 21, 6, 'Serve chilled or at room temperature.', 6),
(138, 24, 1, 'Start by adding your ground sausage to a large pot and brown it over medium-high heat, breaking it up into chunks as it cooks.', 1),
(139, 24, 2, 'Once your sausage is cooked through, remove it from the pot and set aside.', 2),
(140, 24, 3, 'In that same pot, add your chopped onion and cook for 1-2 minutes, then add in your chopped garlic and cook for another 30 seconds.', 3),
(141, 24, 4, 'Add in your sliced potatoes, cooked sausage, chicken bouillon, 4 cups bone broth, 1 cup water, and mix well.', 4),
(142, 24, 5, 'Bring it to a boil, then cover, reduce the heat and let it simmer for 15-20 minutes or until your potatoes are cooked through.', 5),
(143, 24, 6, 'While your soup is cooking, make your slurry by mixing 2 Tbsp of corn starch with 2 cups of milk and set aside.', 6),
(144, 24, 7, 'When your soup is done cooking, add in your kale and slurry mixture, and let it cook for 2-3 minutes.', 7),
(145, 24, 8, 'Give it a taste and add salt and pepper to preference.', 8),
(146, 25, 1, 'Start by heating a large skillet over medium-high heat and add in your ground beef. Cook until no longer pink, breaking it up in the process.', 1),
(147, 25, 2, 'Once your beef is cooked through, add in 24 ounces of pasta sauce, your seasonings, and salt and pepper to preference. Mix well and reduce the heat to low.', 2),
(148, 25, 3, 'For your alfredo sauce, in a blender or food processor, add your cottage cheese, milk, grated parmesan, and garlic cloves. Blend until smooth and then set aside.', 3),
(149, 25, 4, 'Cook your pasta according to the package directions. When done, strain it and set aside.', 4),
(150, 25, 5, 'Grab a 9x13 casserole dish and add your pasta. Pour your alfredo sauce on top, mix well, and spread out evenly.', 5),
(151, 25, 6, 'Add your meat sauce on top of your pasta and spread out evenly.', 6),
(152, 25, 7, 'Top with your shredded cheese, and place in the oven on 350F for 10-15 minutes or until your cheese is melted.', 7),
(153, 25, 8, 'When done, remove from the oven, give it a taste, and add salt and pepper to preference.', 8),
(154, 26, 1, 'Start by parboiling your chopped potatoes, strain them. Transfer then to a mixing bowl and season with 1/2 Tbsp garlic powder, 1/2 Tbsp onion powder, 1/2 Tbsp oregano, 1 tsp thyme, 1/2 tsp dill, and a little salt. Mix will and set aside.', 1),
(155, 26, 2, 'Season your chopped chicken with 1/2 Tbsp garlic powder, 1/2 Tbsp onion powder, 1 tsp smoked paprika, and a little salt. Mix and set aside.', 2),
(156, 26, 3, 'Heat a large skillet over medium-high heat and add in 1 Tbsp olive oil. Once your oil is hot add in your seasoned chicken and cook until no longer pink in the middle.', 3),
(157, 26, 4, 'Once your chicken is cooked through, reduce the heat to medium and add in your tomatoes. Let those cook until the skin on the tomatoes starts to blister. When that\'s done, remove from the skillet and set aside.', 4),
(158, 26, 5, 'Return that same skillet back to the stove over medium-high heat and add in 2 Tbsp of olive oil. Add in your seasoned potatoes and cook until golden brown.', 5),
(159, 26, 6, 'When you\'re happy with the cook on your potatoes, add your chicken and tomatoes back in, reduce the heat to low, mix, then top with your crumbled feta and black olives.', 6),
(160, 26, 7, 'Taste and add salt and pepper to preference.', 7),
(161, 29, 1, 'Start by cooking your rice using your preferred method.', 1),
(162, 29, 2, 'Season your chopped chicken with 1/2 Tbsp garlic powder, 1/2 Tbsp onion powder, mix well and set aside.', 2),
(163, 29, 3, 'Heat a large skillet over medium-high heat and add in 2 Tbsp of cooking oil. Once your oil is hot, add in your seasoned chicken and cook for 3-4 minutes on each side, then add in your sliced onions and cook for an additional 1-2 minutes.', 3),
(164, 29, 4, 'Once your onions are translucent, add in your carrots and potatoes. Mix everything together then add 3 cups of water.', 4),
(165, 29, 5, 'Bring to a boil, reduce the heat, cover, and let it simmer for about 15 minutes, or until your veggies are tender and your chicken is cooked through.', 5),
(166, 29, 6, 'When everything is cooked through, break up your curry seasoning block and add that in. Mix constantly until the curry is completely disolved.', 6),
(167, 29, 7, 'Let it continue to simmer uncovered for about 5 minutes, give it a taste, and add salt and pepper to preference.', 7),
(168, 29, 8, 'Serve over your rice.', 8),
(169, 30, 1, 'Add your packet of parmesan garlic seasoning to a bowl along with your water and your chopped garlic. Mix and set aside.', 1),
(170, 30, 2, 'Add your chicken breasts to a crockpot and pour in the parmesan sauce. Cover and cook on low for at least 4 hours, or until your chicken is cooked through.', 2),
(171, 30, 3, 'When your chicken is done cooking, remove it from the crockpot, chop it up, and set aside.', 3),
(172, 30, 4, 'Add 2 Tbsp of butter into the crockpot and stir to melt.', 4),
(173, 30, 5, 'Add in 1 cup of milk and let this cook on low, uncovered while you make your noodles.', 5),
(174, 30, 6, 'Cook your noodles according to the instructions on the package, and strain when done.', 6),
(175, 30, 7, 'Add your cooked noodles into the crockpot, along with your chopped chicken, 1 cup of shredded parmesan cheese, and 1/4 cup grated parmesan cheese. Mix well.', 7),
(176, 30, 8, 'Give it a taste and add salt and pepper to preference.', 8),
(177, 31, 1, 'Mix all ingredients.', 1),
(178, 31, 2, 'Bake at 350F until done.', 2),
(179, 32, 1, 'Preheat the oven to 350F.', 1),
(180, 32, 2, 'Slightly beat eggs and add all the ingredients except the pecans. Mix well with a wisk.', 2),
(181, 32, 3, 'Add the pecans and wisk again.', 3),
(182, 32, 4, 'Pour into an uncooked deep dish pie shell and bake for 35-45 minutes.', 4),
(183, 32, 5, 'Note: Be sure to place a sheet pan lined with aluminum on the rack under the pie to catch any filling that might bubble over during cooking. If you double the recipe, you can make three regular-sized pies.', 5),
(184, 33, 1, 'Start by adding your ground sausage to a large pot and brown it over medium-high heat, breaking it up into chunks as it cooks.', 1),
(185, 33, 2, 'Once your sausage is cooked through, remove it from the pot and set aside.', 2),
(186, 33, 3, 'In that same pot, add your chopped onion and cook for 1-2 minutes, then add in your chopped garlic and cook for another 30 seconds.', 3),
(187, 33, 4, 'Add in your sliced potatoes, cooked sausage, chicken bouillon, 4 cups bone broth, 1 cup water, and mix well.', 4),
(188, 33, 5, 'Bring it to a boil, then cover, reduce the heat and let it simmer for 15-20 minutes or until your potatoes are cooked through.', 5),
(189, 33, 6, 'While your soup is cooking, make your slurry by mixing 2 Tbsp of corn starch with 2 cups of milk and set aside.', 6),
(190, 33, 7, 'When your soup is done cooking, add in your kale and slurry mixture, and let it cook for 2-3 minutes.', 7),
(191, 33, 8, 'Give it a taste and add salt and pepper to preference.', 8),
(192, 34, 1, 'Start by heating a large skillet over medium-high heat and add in your ground beef. Cook until no longer pink, breaking it up in the process.', 1),
(193, 34, 2, 'Once your beef is cooked through, add in 24 ounces of pasta sauce, your seasonings, and salt and pepper to preference. Mix well and reduce the heat to low.', 2),
(194, 34, 3, 'For your alfredo sauce, in a blender or food processor, add your cottage cheese, milk, grated parmesan, and garlic cloves. Blend until smooth and then set aside.', 3),
(195, 34, 4, 'Cook your pasta according to the package directions. When done, strain it and set aside.', 4),
(196, 34, 5, 'Grab a 9x13 casserole dish and add your pasta. Pour your alfredo sauce on top, mix well, and spread out evenly.', 5),
(197, 34, 6, 'Add your meat sauce on top of your pasta and spread out evenly.', 6),
(198, 34, 7, 'Top with your shredded cheese, and place in the oven on 350F for 10-15 minutes or until your cheese is melted.', 7),
(199, 34, 8, 'When done, remove from the oven, give it a taste, and add salt and pepper to preference.', 8),
(202, 36, 1, 'Preheat your oven to 450F.', 1),
(203, 36, 2, 'In a large mixing bowl, add your chopped chicken, chopped onion, 1/2 Tbsp olive oil, 1 Tbsp ranch seasoning, 1 Tbsp garlic powder, 1/2 Tbsp parsley, 1 tsp paprika, and a little salt and pepper. Mix everything together and set aside.', 2),
(204, 36, 3, 'Grab a 9x13 casserole dish and evenly line the bottom with your frozen tater tots. Add your seasoned chicken on top and spread out evenly. Place it in the oven and cook at 450F for 25 minutes.', 3),
(205, 36, 4, 'After 25 minutes, remove from the oven and top with your shredded cheese and bacon pieces. Place it back in the oven on 450F for about 5 minutes, or until your cheese is melted and your chicken is cooked through.', 4),
(206, 36, 5, 'Once you are happy with the cook on your casserole, remove from the oven, taste, and add salt and pepper to preference.', 5),
(207, 36, 6, 'Top with sour cream (or greek yogurt for extra protein) when you serve.', 6),
(208, 37, 1, 'Mix all ingredients.', 1),
(209, 37, 2, 'Bake at 350F until done.', 2),
(210, 38, 1, 'In a large mixing bowl, add in your chicken, cream cheese, buffalo sauce, greek yogurt, ranch seasoning, and garlic powder. Using the back of a fork, mix all of that together really well.', 1),
(211, 38, 2, 'Once it\'s all mixed up, add in 1 cup of your shredded cheese, and set the remaining 1/2 cup to the side for topping. Mix well.', 2),
(212, 38, 3, 'Grab an 8x8 baking dish, add in your chicken mixture, and spread it out evenly.', 3),
(213, 38, 4, 'Top with your remaining shredded cheese and pop this into the oven on 350F for 20-30 minutes, or until the center is warm and your topping is golden brown.', 4),
(215, 40, 1, 'Mix the yeast into the flour, then add the greek yogurt.', 1),
(216, 40, 2, 'Mix with your freshly washed and dried hands (trust me, it\'s easier and actually not as messy as you think). At first, it\'s going to seem like you don\'t have enough ingredients but trust the process.', 2),
(217, 40, 3, 'Once your dough ball has formed, cut it in half. The recipe technically makes two crusts, but if you prefer thicker, bigger pizza, feel free to keep it as one.', 3),
(218, 40, 4, 'At this point, you can roll out the dough in whatever form you please. Round, square, a fun shape. You can also just press it into a lightly greased cake pan if you prefer a pan pizza.', 4),
(219, 40, 5, 'Bake at 375F for about 4 minutes. Then take it out of the oven and cover with your favorite sauce and toppings.  Put back in the oven for another 10-15 minutes until the cheese is melted and the crust is golden brown.', 5),
(220, 41, 1, 'Dissolve yeast in water, let sit 10 minutes', 1),
(221, 41, 2, 'Heat milk on stove with butter, sugar, and salt. Let cool to lukewarm', 2),
(222, 41, 3, 'Combine yeast, milk mixture and flours', 3),
(223, 41, 4, 'Stir well, turn out a kneed', 4),
(224, 41, 5, 'Oil bowl and let rise, punch down and form into rolls. Let rise a second time.', 5),
(225, 41, 6, 'Bake at 375 degrees F for about 15 minutes', 6),
(226, 42, 1, 'Preheat skillet on low heat', 1),
(227, 42, 2, 'Place flour an salt in a bowl and sift in baking soda. Make a well in the center and pour in the buttermilk', 2),
(228, 42, 3, 'Mix to form dough and kneed onto floured surface. Form into a flattened circle, about 1/2 inch thick and cut into quarters with a floured knife.', 3),
(229, 42, 4, 'Cook farls for 6-8 minutes on each side or until golden brown.', 4),
(230, 43, 1, 'Proof yeast and then combine all dry ingredients, slowly add wet to dry.', 1),
(231, 43, 2, 'Let rise, punch down, shape, rise, bake.', 2),
(232, 43, 3, 'Bake in 350 degree F oven for 15 - 20 minutes.', 3),
(233, 44, 1, 'Combine ingredients, put in loaf pan, bake at 350 degrees F for 55 minutes.', 1),
(234, 45, 1, 'Gather ingredients.', 1),
(235, 45, 2, 'Spray bowl with nonstick cooking spray. Crack eggs into the bowl, add salsa, and stir.', 2),
(236, 45, 3, 'Microwave on high for 2 minute, stir, and cook for another 2 minutes or until the mixture firms up.', 3),
(237, 45, 4, 'Place cheese in center of tortilla and top with egg mixture.', 4),
(238, 45, 5, 'Wrap up burrito and enjoy!', 5),
(239, 46, 1, 'Shred and drain zucchini prior to making.', 1),
(240, 46, 2, 'Mix all ingredients.', 2),
(241, 46, 3, 'Bake in 350 degree F oven for 55 minutes, makes muffins or loaf.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int UNSIGNED NOT NULL,
  `following_user_id` int UNSIGNED NOT NULL,
  `followed_user_id` int UNSIGNED NOT NULL,
  `followed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int UNSIGNED NOT NULL,
  `recipe_id` int UNSIGNED NOT NULL,
  `image_line_item` tinyint UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `sort_order` tinyint DEFAULT (`image_line_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `recipe_id`, `image_line_item`, `image_url`, `sort_order`) VALUES
(3, 1, 1, 'mashed-potatoes.webp', 1),
(4, 2, 1, 'steak.webp', 1),
(7, 3, 1, 'green-bean.webp', 1),
(8, 4, 1, 'pancake.webp', 1),
(9, 5, 1, 'red-velvet-cheesecake.webp', 1),
(10, 6, 1, 'nachos.webp', 1),
(11, 7, 1, 'pizza.webp', 1),
(12, 9, 1, 'chicken-wings.webp', 1),
(13, 10, 1, 'steak.webp', 1),
(14, 11, 1, 'default_recipe3.webp', 1),
(16, 18, 1, 'recipe_18_0.jpg', 1),
(17, 12, 1, 'cornbread.webp', 1),
(18, 19, 1, 'cornbread.webp', 1),
(21, 15, 1, 'cucumbers.webp', 1),
(22, 16, 1, 'cucumbers.webp', 1),
(23, 21, 1, 'cucumbers.webp', 1),
(24, 20, 1, 'spaghetti.webp', 1),
(25, 14, 1, 'default_recipe1.webp', 1),
(26, 32, 1, 'pecan-pie.webp', 1),
(27, 25, 1, 'taco-spaghetti.webp', 1),
(28, 31, 1, 'carrot-cake.webp', 1),
(29, 34, 1, 'taco-spaghetti.webp', 1),
(30, 37, 1, 'carrot-cake.webp', 1),
(31, 41, 1, 'dinner-rolls.webp', 1),
(32, 43, 1, 'dinner-rolls.webp', 1),
(33, 24, 1, 'default_recipe1.webp', 1),
(34, 26, 1, 'default_recipe2.webp', 1),
(35, 29, 1, 'default_recipe1.webp', 1),
(36, 30, 1, 'default_recipe2.webp', 1),
(37, 33, 1, 'default_recipe1.webp', 1),
(38, 36, 1, 'default_recipe2.webp', 1),
(39, 38, 1, 'default_recipe1.webp', 1),
(40, 40, 1, 'default_recipe1.webp', 1),
(41, 42, 1, 'default_recipe2.webp', 1),
(42, 44, 1, 'default_recipe1.webp', 1),
(43, 45, 1, 'default_recipe1.webp', 1),
(44, 46, 1, 'default_recipe2.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int UNSIGNED NOT NULL,
  `recipe_id` int UNSIGNED NOT NULL,
  `ingredient_line_item` tinyint UNSIGNED NOT NULL,
  `quantity` decimal(10,2) UNSIGNED NOT NULL,
  `ingredient_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `measurement_id` tinyint UNSIGNED NOT NULL,
  `sort_order` tinyint NOT NULL DEFAULT (`ingredient_line_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `recipe_id`, `ingredient_line_item`, `quantity`, `ingredient_name`, `measurement_id`, `sort_order`) VALUES
(1, 1, 1, 2.00, 'Russet potatoes', 9, 1),
(2, 1, 2, 0.00, 'Salt', 1, 2),
(3, 1, 3, 4.00, 'Butter', 8, 3),
(4, 1, 4, 0.00, 'Black pepper', 1, 4),
(5, 1, 5, 0.50, 'Milk', 3, 5),
(6, 2, 1, 2.00, 'Beef tenderloin steaks', 8, 1),
(7, 2, 2, 2.00, 'Black peppercorns, crushed', 2, 2),
(8, 2, 3, 1.00, 'Salt', 1, 3),
(9, 2, 4, 2.00, 'Butter', 8, 4),
(10, 2, 5, 1.00, 'Olive oil', 2, 5),
(11, 2, 6, 0.50, 'Cognac or brandy', 3, 6),
(12, 2, 7, 0.50, 'Heavy cream', 3, 7),
(13, 3, 1, 4.00, 'Green beans, trimmed and cut', 3, 1),
(14, 3, 2, 1.00, 'Salt', 1, 2),
(15, 3, 3, 10.00, 'Condensed cream of mushroom soup', 8, 3),
(16, 3, 4, 0.50, 'Milk', 3, 4),
(17, 3, 5, 1.00, 'Black pepper', 1, 5),
(18, 3, 6, 1.00, 'Garlic powder', 1, 6),
(19, 3, 7, 1.50, 'French fried onions', 3, 7),
(20, 4, 1, 1.50, 'All-purpose flour', 3, 1),
(21, 4, 2, 3.50, 'Baking powder', 1, 2),
(22, 4, 3, 1.00, 'Salt', 1, 3),
(23, 4, 4, 1.00, 'Granulated sugar', 2, 4),
(24, 4, 5, 1.25, 'Milk', 3, 5),
(25, 4, 6, 1.00, 'Egg', 8, 6),
(26, 4, 7, 3.00, 'Butter, melted', 2, 7),
(27, 5, 1, 2.00, 'Chocolate cookie crumbs', 3, 1),
(28, 5, 2, 0.50, 'Unsalted butter, melted', 3, 2),
(29, 5, 3, 24.00, 'Cream cheese, softened', 8, 3),
(30, 5, 4, 1.50, 'Granulated sugar', 3, 4),
(31, 5, 5, 3.00, 'Eggs', 8, 5),
(32, 5, 6, 1.00, 'Sour cream', 3, 6),
(33, 5, 7, 2.00, 'Cocoa powder', 2, 7),
(34, 5, 8, 1.00, 'Vanilla extract', 2, 8),
(35, 5, 9, 1.00, 'White vinegar', 2, 9),
(36, 5, 10, 1.00, 'Red food coloring', 2, 10),
(37, 5, 11, 8.00, 'Cream cheese, softened', 8, 11),
(38, 5, 12, 0.50, 'Unsalted butter, softened', 3, 12),
(39, 5, 13, 2.00, 'Powdered sugar', 3, 13),
(40, 5, 14, 1.00, 'Vanilla extract', 2, 14),
(41, 6, 1, 12.00, 'Tortilla chips', 8, 1),
(42, 6, 2, 2.00, 'Cheddar cheese, shredded', 3, 2),
(43, 6, 3, 1.00, 'Monterey Jack cheese, shredded', 3, 3),
(44, 6, 4, 1.00, 'Ground beef', 9, 4),
(45, 6, 5, 1.00, 'Taco seasoning', 2, 5),
(46, 6, 6, 0.25, 'Water', 3, 6),
(47, 6, 7, 1.00, 'Black beans, drained and rinsed', 3, 7),
(48, 6, 8, 1.00, 'Jalapeño, sliced', 8, 8),
(49, 6, 9, 0.50, 'Tomatoes, diced', 3, 9),
(50, 6, 10, 0.25, 'Red onion, diced', 3, 10),
(51, 6, 11, 0.50, 'Sour cream', 3, 11),
(52, 6, 12, 0.50, 'Guacamole', 3, 12),
(53, 6, 13, 2.00, 'Green onions, chopped', 2, 13),
(54, 6, 14, 2.00, 'Cilantro, chopped', 2, 14),
(55, 7, 1, 1.00, 'Pre-made pizza crust', 8, 1),
(56, 7, 2, 0.50, 'Pizza sauce', 3, 2),
(57, 7, 3, 1.50, 'Mozzarella cheese, shredded', 3, 3),
(58, 7, 4, 0.50, 'Pepperoni slices', 8, 4),
(59, 7, 5, 0.50, 'Cooked Italian sausage, crumbled', 9, 5),
(60, 7, 6, 0.50, 'Cooked bacon, crumbled', 8, 6),
(61, 7, 7, 0.50, 'Diced ham', 8, 7),
(62, 7, 8, 0.25, 'Parmesan cheese, grated', 3, 8),
(63, 7, 9, 0.50, 'Red onion, thinly sliced', 3, 9),
(64, 7, 10, 1.00, 'Olive oil', 2, 10),
(65, 7, 11, 1.00, 'Italian seasoning', 2, 11),
(78, 9, 1, 2.00, 'Chicken wings, split at joints, tips removed', 9, 1),
(79, 9, 2, 0.50, 'Flour', 3, 2),
(80, 9, 3, 1.00, 'Baking powder', 2, 3),
(81, 9, 4, 1.00, 'Salt', 2, 4),
(82, 9, 5, 0.50, 'Black pepper', 2, 5),
(83, 9, 6, 0.50, 'Garlic powder', 2, 6),
(84, 9, 7, 0.50, 'Paprika', 2, 7),
(85, 9, 8, 1.00, 'Butter, melted', 3, 8),
(86, 9, 9, 0.50, 'Hot sauce', 3, 9),
(87, 9, 10, 1.00, 'White vinegar', 2, 10),
(88, 9, 11, 0.50, 'Worcestershire sauce', 2, 11),
(89, 9, 12, 1.00, 'Vegetable oil (for frying)', 3, 12),
(90, 9, 13, 1.00, 'Cooking spray (for baking)', 3, 13),
(91, 10, 1, 2.00, 'Steak (ribeye, sirloin, or filet mignon)', 9, 1),
(92, 10, 2, 1.00, 'Olive oil', 3, 2),
(93, 10, 3, 1.00, 'Salt', 2, 3),
(94, 10, 4, 0.50, 'Black pepper', 2, 4),
(95, 10, 5, 1.00, 'Garlic powder', 2, 5),
(96, 10, 6, 0.50, 'Paprika', 2, 6),
(97, 10, 7, 1.00, 'Asparagus spears, trimmed', 9, 7),
(98, 10, 8, 1.00, 'Lemon juice', 3, 8),
(99, 10, 9, 1.00, 'Parmesan cheese, grated', 8, 9),
(100, 11, 1, 1.00, 'grits', 3, 1),
(101, 11, 2, 2.00, 'water', 3, 2),
(102, 11, 3, 1.00, 'salt', 1, 3),
(103, 11, 4, 2.00, 'butter', 2, 4),
(104, 12, 1, 1.00, 'cornmeal', 3, 1),
(105, 12, 2, 1.00, 'all-purpose flour', 3, 2),
(106, 12, 3, 1.00, 'granulated sugar', 3, 3),
(107, 12, 4, 1.00, 'baking powder', 2, 4),
(108, 12, 5, 1.00, 'salt', 1, 5),
(109, 12, 6, 1.00, 'milk', 3, 6),
(110, 12, 7, 1.00, 'melted butter', 3, 7),
(111, 12, 8, 1.00, 'egg', 3, 8),
(113, 14, 1, 4.00, 'Unsalted Butter', 2, 1),
(114, 14, 3, 1.00, 'Chocolate Cake Mix', 3, 3),
(115, 14, 4, 1.00, 'Instant Chocolate Pudding', 3, 4),
(116, 14, 5, 3.00, 'Whole Milk', 3, 5),
(117, 14, 6, 12.00, 'Semi-Sweet', 8, 6),
(118, 15, 1, 2.00, 'Large Cucumbers, thinly sliced', 3, 1),
(119, 15, 2, 1.00, 'Small red onion, sliced', 6, 2),
(120, 15, 3, 1.00, 'White Vinegar', 3, 3),
(121, 15, 4, 1.00, 'Olive oil', 2, 4),
(122, 15, 5, 1.00, 'Sugar', 1, 5),
(123, 15, 6, 1.00, 'Salt', 1, 6),
(124, 15, 7, 1.00, 'Black Pepper', 1, 7),
(125, 15, 8, 1.00, 'Fresh Dill, Chopped', 2, 8),
(126, 16, 1, 2.00, 'Cucumber', 14, 1),
(127, 18, 1, 2.00, 'cucumbers, thinly sliced', 3, 1),
(128, 18, 2, 0.50, 'small red onion, thinly sliced', 3, 2),
(129, 18, 3, 0.25, 'white vinegar', 3, 3),
(130, 18, 4, 1.00, 'olive oil', 2, 4),
(131, 18, 5, 1.00, 'sugar', 1, 5),
(132, 18, 6, 0.50, 'salt', 1, 6),
(133, 18, 7, 0.25, 'black pepper', 1, 7),
(134, 18, 8, 1.00, 'fresh dill, chopped', 2, 8),
(135, 19, 1, 1.00, 'cornmeal', 3, 1),
(136, 19, 2, 1.00, 'all purpose flour', 3, 2),
(137, 19, 3, 0.25, 'granulated sugar', 3, 3),
(138, 19, 4, 1.00, 'baking powder', 2, 4),
(139, 19, 5, 0.50, 'salt', 1, 5),
(140, 19, 6, 1.00, 'milk', 3, 6),
(141, 19, 7, 0.33, 'melted butter', 3, 7),
(142, 19, 8, 1.00, 'egg', 14, 8),
(143, 20, 1, 1.00, 'Spaghetti Noodles', 15, 1),
(144, 20, 2, 1.00, 'Sauce', 5, 2),
(145, 20, 3, 1.00, 'Ground Beef', 9, 3),
(146, 20, 5, 4.00, 'Water', 5, 5),
(147, 21, 1, 2.00, 'large cucumbers, thinly sliced', 14, 1),
(148, 21, 2, 0.50, 'small red onion, thinly sliced', 14, 2),
(149, 21, 3, 0.25, 'white vinegar', 3, 3),
(150, 21, 4, 1.00, 'olive oil', 2, 4),
(151, 21, 5, 1.00, 'sugar', 1, 5),
(152, 21, 6, 0.50, 'salt', 1, 6),
(153, 21, 7, 1.00, 'fresh dill, chopped', 2, 7),
(161, 24, 1, 1.50, 'Hot Italian Ground Sausage', 9, 1),
(162, 24, 2, 1.50, 'Russet Potatoes, sliced', 9, 2),
(163, 24, 3, 4.00, 'Chicken Bone Broth', 3, 3),
(164, 24, 4, 3.00, 'Fresh Kale, chopped', 3, 4),
(165, 24, 5, 2.00, 'Fat Free Fairlife Milk', 3, 5),
(166, 24, 6, 1.00, 'Water', 3, 6),
(167, 24, 7, 6.00, 'Garlic Cloves, chopped', 14, 7),
(168, 24, 8, 1.00, 'Medium White Onion, chopped', 14, 8),
(169, 24, 9, 1.00, 'cube Chicken Bouillon', 14, 9),
(170, 24, 10, 2.00, 'Corn Starch', 2, 10),
(171, 25, 1, 1.00, '97/3 Extra Lean Ground Beef', 9, 1),
(172, 25, 2, 24.00, 'jar Pasta Sauce', 8, 2),
(173, 25, 3, 16.00, 'Low Fat Cottage Cheese', 8, 3),
(174, 25, 4, 15.00, 'Barilla Protein Spaghetti', 8, 4),
(175, 25, 5, 0.50, 'Fat Free Fairlife Milk', 3, 5),
(176, 25, 6, 0.50, 'Reduced Fat Shredded Mozzarella Cheese ', 3, 6),
(177, 25, 7, 0.50, 'Grated Parmesan Cheese', 3, 7),
(178, 25, 8, 4.00, 'Garlic Cloves', 14, 8),
(179, 25, 9, 0.50, 'Chili Powder', 2, 9),
(180, 25, 10, 0.50, 'Garlic Powder', 2, 10),
(181, 25, 11, 0.50, 'Onion Powder', 2, 11),
(182, 25, 12, 1.00, 'Ground Cumin', 1, 12),
(183, 26, 1, 2.00, 'Russet Potatoes, chopped', 9, 1),
(184, 26, 2, 1.50, 'Boneless Skinless Chicken Breast, chopped', 9, 2),
(185, 26, 3, 10.00, 'Cherry Tomatoes, halved', 8, 3),
(186, 26, 4, 6.00, 'Crumbled Feta', 8, 4),
(187, 26, 5, 2.25, 'can Sliced Black Olives, drained', 8, 5),
(188, 26, 6, 3.00, 'Olive Oil, divided', 2, 6),
(189, 26, 7, 1.00, 'Garlic Powder, divided', 2, 7),
(190, 26, 8, 1.00, 'Onion Powder, divided', 2, 8),
(191, 26, 9, 0.50, 'Oregano', 2, 9),
(192, 26, 10, 1.00, 'Smoked Paprika', 1, 10),
(193, 26, 11, 1.00, 'Thyme', 1, 11),
(194, 26, 12, 0.50, 'Dill', 1, 12),
(207, 29, 1, 1.50, 'Chicken Breast', 9, 1),
(208, 29, 2, 0.50, 'Russet Potatoes, chopped', 9, 2),
(209, 29, 3, 1.50, 'White rice, dry', 3, 3),
(210, 29, 4, 2.00, 'Long Carrots, diced', 16, 4),
(211, 29, 5, 0.50, 'small White Onion, sliced', 16, 5),
(212, 29, 7, 3.00, 'Water', 3, 7),
(213, 29, 8, 3.20, 'pack S&B Golden Curry mix', 8, 8),
(214, 29, 9, 2.00, 'Cooking Oil', 2, 9),
(215, 29, 10, 0.50, 'Garlic Powder', 2, 10),
(216, 29, 11, 0.50, 'Onion Powder', 2, 11),
(217, 30, 1, 1.50, 'Chicken Breast', 9, 1),
(218, 30, 2, 6.00, 'Garlic Cloves, chopped', 16, 2),
(219, 30, 3, 12.00, 'Egg Noodles, dry', 8, 3),
(220, 30, 4, 1.00, 'pack Great Value Garlic Parmesan Seasoning', 8, 4),
(221, 30, 5, 1.00, 'Shredded Parmesan Cheese', 3, 5),
(222, 30, 6, 1.00, 'Fat Free Fairlife Milk', 3, 6),
(223, 30, 7, 0.50, 'Water', 3, 7),
(224, 30, 8, 0.25, 'Grated Parmesan Cheese', 3, 8),
(225, 30, 9, 2.00, 'Butter', 2, 9),
(226, 31, 1, 2.00, 'Flour', 3, 1),
(227, 31, 2, 1.00, 'Oil', 3, 2),
(228, 31, 3, 3.00, 'Carrots, grated', 3, 3),
(229, 31, 4, 2.00, 'Baking Powder', 1, 4),
(230, 31, 5, 0.50, 'Salt', 1, 5),
(231, 31, 6, 2.00, 'Cinnamon', 1, 6),
(232, 31, 7, 1.00, 'Vanilla', 1, 7),
(233, 31, 8, 4.00, 'Eggs', 16, 8),
(234, 31, 9, 2.00, 'Sugar', 3, 9),
(235, 32, 1, 1.00, 'Pecans, chopped', 3, 1),
(236, 32, 2, 1.00, 'White corn syrup', 3, 2),
(237, 32, 3, 0.50, 'Brown Sugar, packed', 3, 3),
(238, 32, 4, 0.25, 'Vanilla', 1, 4),
(239, 32, 5, 2.00, 'Lemon Juice', 1, 5),
(240, 32, 6, 3.00, 'Eggs', 16, 6),
(241, 32, 7, 1.00, 'Frozen deep-dish pie shell', 16, 7),
(242, 33, 1, 1.50, 'Hot Italian Ground Sausage', 9, 1),
(243, 33, 2, 1.50, 'Russet Potatoes, sliced', 4, 2),
(244, 33, 3, 4.00, 'Chicken Bone Broth', 3, 3),
(245, 33, 4, 3.00, 'Fresh Kale, chopped', 3, 4),
(246, 33, 5, 2.00, 'Fat Free Fairlife Milk', 3, 5),
(247, 33, 6, 1.00, 'Water', 3, 6),
(248, 33, 7, 6.00, 'Garlic Cloves, chopped', 16, 7),
(249, 33, 8, 1.00, 'Medium White Onion, chopped', 16, 8),
(250, 33, 9, 1.00, 'cube Chicken Bouillon', 16, 9),
(251, 33, 10, 2.00, 'Corn Starch', 2, 10),
(252, 34, 1, 1.00, '97/3 Extra Lean Ground Beef', 9, 1),
(253, 34, 2, 24.00, 'jar Pasta Sauce', 8, 2),
(254, 34, 3, 16.00, 'Low Fat Cottage Cheese', 8, 3),
(255, 34, 4, 15.00, 'Barilla Protein Spaghetti', 8, 4),
(256, 34, 5, 0.50, 'Fat Free Fairlife Milk', 3, 5),
(257, 34, 6, 0.50, 'Reduced Fat Shredded Mozzarella Cheese ', 3, 6),
(258, 34, 7, 0.50, 'Grated Parmesan Cheese', 3, 7),
(259, 34, 8, 4.00, 'Garlic Cloves', 16, 8),
(260, 34, 9, 0.50, 'Chili Powder', 2, 9),
(261, 34, 10, 0.50, 'Garlic Powder', 2, 10),
(262, 34, 11, 0.50, 'Onion Powder', 2, 11),
(263, 34, 12, 1.00, 'Ground Cumin', 1, 12),
(276, 36, 1, 1.50, 'Chicken Breast', 9, 1),
(277, 36, 2, 24.00, 'Frozen Tater Tots', 8, 2),
(278, 36, 3, 8.00, 'Light Sour Cream or Low Fat Greek Yogurt', 8, 3),
(279, 36, 4, 1.50, 'Fat Free Mild Cheddar Shredded Cheese', 3, 4),
(280, 36, 5, 0.25, 'Bacon Pieces, crumbled', 3, 5),
(281, 36, 6, 1.00, 'small White Onion', 16, 6),
(282, 36, 7, 1.00, 'bundle Green Onions, chopped', 16, 7),
(283, 36, 8, 1.00, 'Ranch Seasoning', 2, 8),
(284, 36, 9, 1.00, 'Garlic Powder', 2, 9),
(285, 36, 10, 0.50, 'Parsley', 2, 10),
(286, 36, 11, 0.50, 'Olive Oil', 2, 11),
(287, 36, 12, 1.00, 'Paprika', 1, 12),
(288, 37, 1, 2.00, 'Flour', 3, 1),
(289, 37, 2, 1.00, 'Oil', 3, 2),
(290, 37, 3, 3.00, 'Carrots, grated', 3, 3),
(291, 37, 4, 0.50, 'Salt', 1, 4),
(292, 37, 5, 2.00, 'Baking Powder', 1, 5),
(293, 37, 6, 2.00, 'Cinnamon', 1, 6),
(294, 37, 7, 1.00, 'Vanilla', 1, 7),
(295, 37, 8, 4.00, 'Eggs', 16, 8),
(296, 37, 9, 2.00, 'Sugar', 3, 9),
(297, 38, 1, 24.00, 'Canned Chicken, fully cooked, drained', 8, 1),
(298, 38, 2, 16.00, 'Cream Cheese', 8, 2),
(299, 38, 3, 1.50, 'Extra Sharp Cheddar Cheese, divided', 3, 3),
(300, 38, 4, 0.66, 'Moore\'s Buffalo Sauce', 3, 4),
(301, 38, 5, 0.33, 'Fat Free Plain Greek Yogurt', 3, 5),
(302, 38, 6, 1.00, 'packet Ranch Seasoning', 8, 6),
(303, 38, 7, 0.50, 'Garlic Powder', 2, 7),
(307, 40, 1, 220.00, 'Self-Rising Flour', 10, 1),
(308, 40, 2, 200.00, 'Greek Yogurt', 10, 2),
(309, 40, 3, 14.00, 'Nutritional Yeast', 10, 3),
(310, 41, 1, 2.00, 'dry yeast', 14, 1),
(311, 41, 2, 0.25, 'warm water (110 degrees)', 3, 2),
(312, 41, 3, 1.00, 'milk', 3, 3),
(313, 41, 4, 1.50, 'butter', 2, 4),
(314, 41, 5, 3.00, 'white sugar', 2, 5),
(315, 41, 6, 1.00, 'salt', 1, 6),
(316, 41, 7, 1.50, 'wheat flour', 3, 7),
(317, 41, 8, 1.50, 'all-purpose flour', 3, 8),
(318, 42, 1, 2.00, 'all-purpose flour', 3, 1),
(319, 42, 2, 1.00, 'baking soda', 1, 2),
(320, 42, 3, 1.00, 'buttermilk', 3, 3),
(321, 42, 4, 1.00, 'salt', 14, 4),
(322, 43, 1, 0.75, 'lukewarm milk', 3, 1),
(323, 43, 2, 5.00, 'water', 2, 2),
(324, 43, 3, 3.00, 'butter (soft)', 2, 3),
(325, 43, 4, 0.50, 'salt', 1, 4),
(326, 43, 5, 3.00, 'sugar', 2, 5),
(327, 43, 6, 1.00, 'onion powder', 1, 6),
(328, 43, 7, 0.25, 'dried mixed onions', 3, 7),
(329, 43, 8, 0.25, 'instant potato flakes', 3, 8),
(330, 43, 9, 3.00, 'all-purpose flour', 3, 9),
(331, 43, 10, 2.50, 'yeast (dry)', 1, 10),
(332, 43, 11, 1.00, 'egg white', 14, 11),
(333, 44, 1, 3.00, 'wheat flour', 3, 1),
(334, 44, 2, 1.00, 'sugar', 1, 2),
(335, 44, 3, 2.50, 'pumpkin pie spice', 1, 3),
(336, 44, 4, 1.00, 'baking soda', 1, 4),
(337, 44, 5, 0.50, 'baking powder', 1, 5),
(338, 44, 6, 1.00, 'salt', 1, 6),
(339, 44, 7, 1.50, 'pumpkin', 3, 7),
(340, 44, 8, 3.00, 'eggs', 14, 8),
(341, 44, 9, 1.00, 'applesauce', 3, 9),
(342, 44, 10, 0.50, 'oil', 3, 10),
(343, 45, 1, 2.00, 'large eggs', 14, 1),
(344, 45, 2, 2.00, 'salsa', 2, 2),
(345, 45, 3, 1.00, 'reduced-fat American cheese', 14, 3),
(346, 45, 4, 1.00, 'tortilla', 14, 4),
(347, 46, 1, 2.00, 'eggs', 14, 1),
(348, 46, 2, 0.75, 'sugar', 3, 2),
(349, 46, 3, 0.25, 'applesauce', 3, 3),
(350, 46, 4, 1.00, 'molasses', 2, 4),
(351, 46, 5, 1.50, 'vanilla', 1, 5),
(352, 46, 6, 2.00, 'zucchini', 3, 6),
(353, 46, 7, 1.50, 'wheat flour', 3, 7),
(354, 46, 8, 1.00, 'baking soda', 1, 8),
(355, 46, 9, 0.25, 'salt', 1, 9),
(356, 46, 10, 0.50, 'cinnamon', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `meal_type`
--

CREATE TABLE `meal_type` (
  `id` tinyint UNSIGNED NOT NULL,
  `meal_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `meal_type`
--

INSERT INTO `meal_type` (`id`, `meal_type`) VALUES
(5, 'appetizer'),
(10, 'beverage'),
(1, 'breakfast'),
(2, 'brunch'),
(11, 'condiment'),
(8, 'dessert'),
(6, 'dinner'),
(15, 'late-night snack'),
(3, 'lunch'),
(14, 'main course'),
(13, 'salad'),
(9, 'side dish'),
(4, 'snack'),
(12, 'soup'),
(7, 'supper');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `id` tinyint UNSIGNED NOT NULL,
  `measurement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`id`, `measurement`) VALUES
(1, 'teaspoon'),
(2, 'tablespoon'),
(3, 'cup'),
(4, 'pint'),
(5, 'quart'),
(6, 'gallon'),
(7, 'fluid ounce'),
(8, 'ounce'),
(9, 'pound'),
(10, 'gram'),
(11, 'kilogram'),
(12, 'liter'),
(13, 'milliliter'),
(14, 'each'),
(15, 'box'),
(16, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int UNSIGNED NOT NULL,
  `recipe_id` int UNSIGNED NOT NULL,
  `rater_user_id` int UNSIGNED NOT NULL,
  `rating_level` enum('1','2','3','4','5') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `recipe_id`, `rater_user_id`, `rating_level`, `created_at`) VALUES
(1, 11, 12, '4', '2025-03-08 03:59:10'),
(3, 2, 12, '5', '2025-03-08 03:59:27'),
(4, 3, 12, '4', '2025-03-08 03:59:39'),
(5, 5, 12, '5', '2025-03-08 03:59:47'),
(6, 7, 12, '3', '2025-03-08 03:59:58'),
(7, 6, 12, '4', '2025-03-08 04:00:13'),
(8, 4, 12, '4', '2025-03-08 04:00:29'),
(9, 9, 12, '1', '2025-03-08 04:00:50'),
(10, 10, 12, '4', '2025-03-08 04:01:10'),
(11, 1, 13, '4', '2025-03-08 04:04:38'),
(12, 2, 13, '5', '2025-03-08 04:04:44'),
(13, 3, 13, '3', '2025-03-08 04:04:52'),
(14, 4, 13, '5', '2025-03-08 04:04:58'),
(15, 5, 13, '3', '2025-03-08 04:05:03'),
(16, 6, 13, '5', '2025-03-08 04:05:07'),
(17, 7, 13, '4', '2025-03-08 04:05:14'),
(18, 11, 13, '5', '2025-03-08 04:05:35'),
(19, 9, 13, '5', '2025-03-08 04:09:59'),
(20, 10, 13, '5', '2025-03-08 04:10:07'),
(21, 10, 14, '4', '2025-03-09 01:52:57'),
(22, 2, 15, '5', '2025-03-09 04:03:21'),
(23, 10, 17, '5', '2025-03-09 23:36:14'),
(24, 2, 18, '3', '2025-03-10 01:01:44'),
(25, 10, 19, '4', '2025-03-10 02:48:13'),
(26, 12, 28, '5', '2025-03-24 01:44:13'),
(28, 2, 28, '3', '2025-03-24 01:51:36'),
(29, 4, 28, '5', '2025-03-24 01:52:49'),
(31, 6, 29, '1', '2025-03-24 22:01:23'),
(33, 4, 30, '3', '2025-03-24 23:00:42'),
(36, 11, 31, '5', '2025-03-25 00:52:08'),
(39, 5, 32, '4', '2025-03-25 03:59:50'),
(42, 12, 32, '5', '2025-03-25 04:15:56'),
(43, 6, 32, '4', '2025-03-25 04:16:15'),
(44, 14, 32, '5', '2025-03-25 04:20:33'),
(45, 11, 32, '5', '2025-03-25 04:22:04'),
(47, 4, 33, '3', '2025-03-25 05:49:04'),
(49, 14, 35, '4', '2025-03-25 10:07:13'),
(50, 1, 12, '4', '2025-04-28 02:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `recipe_title` varchar(100) NOT NULL,
  `prep_time_minutes` int UNSIGNED NOT NULL,
  `cook_time_minutes` int UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yield` decimal(10,2) UNSIGNED NOT NULL,
  `measurement_id` tinyint UNSIGNED NOT NULL,
  `servings` smallint UNSIGNED NOT NULL,
  `visibility_id` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `user_id`, `recipe_title`, `prep_time_minutes`, `cook_time_minutes`, `description`, `created_at`, `yield`, `measurement_id`, `servings`, `visibility_id`) VALUES
(1, 1, 'Classic Mashed Potatoes', 15, 20, 'Creamy and buttery mashed potatoes, perfect as a side dish.', '2025-03-01 16:51:08', 4.00, 9, 4, 1),
(2, 11, 'Steak au Poivre', 10, 15, 'A classic French dish featuring steak coated in crushed peppercorns and served with a rich, creamy sauce.', '2025-03-01 16:51:08', 2.00, 9, 2, 1),
(3, 3, 'Green Bean Casserole', 10, 30, 'A creamy and savory baked casserole made with green beans, mushroom soup, and crispy fried onions.', '2025-03-01 16:52:01', 6.00, 9, 6, 1),
(4, 4, 'Homemade Pancakes', 10, 15, 'Fluffy homemade pancakes made from scratch with simple ingredients.', '2025-03-01 16:52:01', 4.00, 9, 4, 1),
(5, 1, 'Red Velvet Cheesecake', 30, 60, 'A rich and creamy red velvet cheesecake with a chocolatey crust and smooth cream cheese topping.', '2025-03-01 16:52:22', 1.00, 9, 12, 1),
(6, 2, 'Large Plate of Nachos', 15, 10, 'Crispy tortilla chips topped with melted cheese, seasoned beef, and fresh toppings.', '2025-03-01 16:52:44', 1.00, 9, 6, 1),
(7, 5, 'Meat Lovers Pizza', 10, 15, 'A delicious pizza loaded with pepperoni, sausage, bacon, and ham on a crispy crust.', '2025-03-01 16:52:44', 1.00, 9, 4, 1),
(9, 5, 'Buffalo Wings', 15, 25, 'Crispy, spicy buffalo wings coated in a tangy sauce, perfect for game day or any gathering.', '2025-03-01 16:54:33', 24.00, 8, 4, 1),
(10, 3, 'Grilled Steak with Grilled Asparagus', 10, 15, 'Juicy grilled steak paired with tender, smoky asparagus for a simple yet delicious meal.', '2025-03-01 16:54:33', 2.00, 9, 2, 1),
(11, 6, 'Grits', 5, 5, 'Southern style grits.', '2025-03-02 00:45:27', 2.00, 3, 2, 2),
(12, 13, 'Classic Southern Cornbread', 10, 25, 'A simple, golden, and slightly sweet cornbread with a crisp crust and tender crumb. Perfect as a side for chili, BBQ, or a warm bowl of soup.', '2025-03-09 05:14:08', 2.00, 9, 9, 2),
(14, 18, 'Chocolate Dump cake', 15, 45, 'Chocolate Cake dumped together', '2025-03-10 01:12:24', 1.00, 10, 4, 3),
(15, 11, 'Refreshing Cucumber Salad', 10, 0, 'A crisp and tangy cucumber salad with a light dressing, perfect for a refreshing side dish or summer picnic.', '2025-03-10 03:24:48', 4.00, 3, 4, 2),
(16, 29, 'Cucumber Salad', 10, 0, 'It\'s great', '2025-03-24 22:04:39', 4.00, 3, 4, 2),
(18, 30, 'Refreshing Cucumber Salad', 10, 0, 'A crisp and tangy cucumber salad with a light dressing, perfect for a refreshing side dish or summer picnic.', '2025-03-24 23:11:38', 4.00, 3, 4, 2),
(19, 31, 'Classic Southern Cornbread', 10, 25, 'A simple, golden, and slightly sweet cornbread with a crisp crust and tender crumb. Perfect as a side for chili, BBQ, or a warm bowl of soup.', '2025-03-25 01:01:43', 2.00, 9, 9, 2),
(20, 32, 'Spaghetti', 30, 25, 'a yummy classic for family night!', '2025-03-25 04:07:26', 6.00, 14, 2, 2),
(21, 33, 'Refreshing Cucumber Salad', 10, 0, 'A crisp and tangy cucumber salad with a light dressing, perfect for a refreshing side dish or summer\r\npicnic.', '2025-03-25 05:57:45', 4.00, 3, 4, 2),
(24, 12, 'Olive Garden Copycat Zuppa Toscana', 10, 30, 'A hearty soup with a little spice, this recipe closely mimics the Zuppa Toscana soup from Olive Garden.', '2025-04-29 00:00:22', 8.00, 3, 6, 2),
(25, 31, 'Million Dollar Taco Spaghetti', 5, 30, 'A lower-fat option for a classic comfort recipe.', '2025-04-29 00:19:09', 4.00, 9, 6, 2),
(26, 31, 'Greek Chicken and Potato Skillet', 15, 30, 'A filling meal inspired by Greek cuisine to feed a hungry family while still keeping costs low.', '2025-04-29 00:36:46', 4.00, 9, 6, 2),
(29, 12, 'Japanese Chicken Curry', 20, 30, 'A simple curry recipe.', '2025-04-29 01:03:42', 4.00, 9, 6, 2),
(30, 31, 'Crockpot Garlic Parmesan Chicken and Egg Noodle', 5, 5, 'A simple and filling low-energy recipe for those nights when energy and money are low.', '2025-04-29 01:44:26', 3.00, 9, 6, 2),
(31, 11, 'Grandma Hedgepeth\'s Carrot Cake', 5, 60, 'A recipe passed down through generations with infuriatingly vague instructions.', '2025-04-29 01:49:00', 1.00, 14, 10, 2),
(32, 13, 'Mom\'s Pecan Pie', 20, 45, 'Still one of the best damn pecan pies I\'ve ever had.', '2025-04-29 01:58:53', 1.00, 16, 8, 2),
(33, 31, 'Olive Garden Copycat Zuppa Toscana', 15, 30, 'A healthier version of an Olive Garden favorite.', '2025-04-29 02:07:50', 1.00, 6, 6, 2),
(34, 11, 'Million Dollar Taco Spaghetti', 5, 30, 'When you want alfredo, your partner wants spaghetti, and your kid wants mexican, everyone wins.', '2025-04-29 02:51:29', 4.00, 9, 6, 2),
(36, 12, 'Loaded Tater Tot Casserole', 10, 35, 'A simple casserole.', '2025-04-29 03:09:07', 3.00, 9, 6, 2),
(37, 13, 'Grandma Hedgepeth\'s Carrot Cake', 5, 60, 'A nostalgic recipe passed down through the generations with infuriatingly vague instructions.', '2025-04-29 03:13:28', 1.00, 14, 10, 2),
(38, 12, 'Buffalo Chicken Dip', 10, 30, 'Eat it with chips. Put it on a salad. Wrap it in a tortilla. Eat it cold in the middle of the night straight from the container by the light of the open fridge. Whatever makes you happy.', '2025-04-29 03:23:08', 4.00, 9, 6, 2),
(40, 31, 'EZPZ Pizza Dough', 20, 15, 'Want good pizza at home but you don\'t want to put on pants? I gotchu.', '2025-04-29 04:02:56', 1.00, 14, 2, 2),
(41, 13, 'Wheat Dinner Rolls', 20, 15, 'Soft and fluffy with a hint of nutty sweetness, these wheat dinner rolls are the perfect complement to any meal. Made with whole wheat flour, they offer a warm, hearty bite that\'s both wholesome and satisfying.', '2025-04-29 09:33:13', 4.00, 14, 4, 2),
(42, 15, 'Irish Soda Farls', 5, 15, 'Irish soda farls are traditional griddle breads with a crisp outside and tender, fluffy center. Made with baking soda instead of yeast, they\'re quick to cook and prefect warm with butter or jam.', '2025-04-29 09:41:29', 4.00, 14, 4, 2),
(43, 13, 'Onion Rolls', 20, 15, 'Onion rolls are soft, golden breads topped with savory, caramelized onions. Their rich, aromatic flavor makes them a standout choice for sandwiches or served warm with butter.', '2025-04-29 09:50:03', 1.00, 14, 8, 2),
(44, 15, 'Pumpkin Apple Bread', 15, 55, 'Pumpkin apple bread is a moist, spiced loaf that blends the earthy richness of pumpkin with the sweet tartness of fresh apples. It\'s a cozy autumn treat, perfect for breakfast, snacking, or dessert.', '2025-04-29 09:57:46', 1.00, 16, 10, 2),
(45, 15, 'Minute Breakfast Burrito', 3, 4, 'This breakfast burrito is packed with fluffy, scrambled eggs, zesty salsa, and melted cheese, all wrapped in a warm tortilla. It\'s a hearty, flavorful way to kickstart your morning.', '2025-04-29 10:04:42', 1.00, 14, 1, 2),
(46, 15, 'Whole Wheat Zucchini Bread', 20, 50, 'Whole wheat zucchini bread is a moist, lightly sweet loaf made with shredded zucchini and hearty whole wheat flour. It\'s a wholesome treat with a hint of spice and a tender crumb.', '2025-04-29 10:13:13', 3.00, 14, 36, 2);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_diet`
--

CREATE TABLE `recipe_diet` (
  `id` int UNSIGNED NOT NULL,
  `diet_id` tinyint UNSIGNED NOT NULL,
  `recipe_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipe_diet`
--

INSERT INTO `recipe_diet` (`id`, `diet_id`, `recipe_id`) VALUES
(1, 8, 11),
(2, 1, 12),
(3, 10, 14),
(4, 2, 15),
(5, 2, 16),
(6, 2, 18),
(7, 1, 19),
(8, 12, 20),
(9, 2, 21),
(10, 12, 24),
(11, 4, 25),
(12, 12, 26),
(13, 4, 29),
(14, 12, 30),
(15, 12, 31),
(16, 12, 32),
(17, 8, 33),
(18, 8, 34),
(19, 12, 36),
(20, 12, 37),
(21, 12, 38),
(22, 12, 40),
(23, 12, 41),
(24, 12, 42),
(25, 12, 43),
(26, 12, 44),
(27, 5, 45),
(28, 10, 46);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_meal_type`
--

CREATE TABLE `recipe_meal_type` (
  `id` int UNSIGNED NOT NULL,
  `meal_type_id` tinyint UNSIGNED NOT NULL,
  `recipe_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipe_meal_type`
--

INSERT INTO `recipe_meal_type` (`id`, `meal_type_id`, `recipe_id`) VALUES
(1, 1, 11),
(2, 9, 12),
(3, 8, 14),
(4, 9, 15),
(5, 9, 16),
(6, 9, 18),
(7, 9, 19),
(8, 6, 20),
(9, 9, 21),
(10, 5, 24),
(11, 6, 25),
(12, 14, 26),
(13, 14, 29),
(14, 7, 30),
(15, 8, 31),
(16, 8, 32),
(17, 14, 33),
(18, 6, 34),
(19, 6, 36),
(20, 15, 37),
(21, 15, 38),
(22, 3, 40),
(23, 9, 41),
(24, 9, 42),
(25, 9, 43),
(26, 8, 44),
(27, 1, 45),
(28, 9, 46);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_style`
--

CREATE TABLE `recipe_style` (
  `id` int UNSIGNED NOT NULL,
  `style_id` tinyint UNSIGNED NOT NULL,
  `recipe_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipe_style`
--

INSERT INTO `recipe_style` (`id`, `style_id`, `recipe_id`) VALUES
(1, 1, 11),
(2, 1, 12),
(3, 1, 14),
(4, 11, 15),
(5, 11, 16),
(6, 11, 18),
(7, 1, 19),
(8, 4, 20),
(9, 11, 21),
(10, 4, 24),
(11, 21, 25),
(12, 10, 26),
(13, 8, 29),
(14, 1, 30),
(15, 1, 31),
(16, 1, 32),
(17, 4, 33),
(18, 4, 34),
(19, 22, 36),
(20, 22, 37),
(21, 1, 38),
(22, 4, 40),
(23, 1, 41),
(24, 22, 42),
(25, 17, 43),
(26, 1, 44),
(27, 2, 45),
(28, 1, 46);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` tinyint NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `id` tinyint UNSIGNED NOT NULL,
  `style` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`id`, `style`) VALUES
(18, 'african'),
(1, 'american'),
(19, 'brazilian'),
(16, 'caribbean'),
(7, 'chinese'),
(6, 'cuban'),
(5, 'french'),
(21, 'fusion'),
(15, 'german'),
(10, 'greek'),
(3, 'indian'),
(4, 'italian'),
(8, 'japanese'),
(12, 'korean'),
(11, 'mediterranean'),
(2, 'mexican'),
(17, 'middle eastern'),
(22, 'southern'),
(14, 'spanish'),
(20, 'tex-mex'),
(9, 'thai'),
(13, 'vietnamese');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `profile_image_url` varchar(255) DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `password_hash` varbinary(60) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role_id` tinyint NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `profile_image_url`, `email_address`, `password_hash`, `joined_at`, `role_id`, `active`) VALUES
(1, 'johhnydoughboy', 'default_profile.webp', 'testuser1@example.com', 0x2432612431322461314f4b74617a626c55693578714c397048444f565345354c6d70535651757574687269456d736e356441535639347953, '2025-03-01 16:49:52', 2, 1),
(2, 'JaSmithy', 'default_profile.webp', 'testuser2@example.com', 0x2432612431322461314f4b74617a626c55693578714c397048444f565345354c6d70535651757574687269456d736e356441535639347953, '2025-03-01 16:49:52', 2, 1),
(3, 'Rick-rick', 'default_profile.webp', 'testuser3@example.com', 0x2432612431322461314f4b74617a626c55693578714c397048444f565345354c6d70535651757574687269456d736e356441535639347953, '2025-03-01 16:49:52', 1, 0),
(4, 'Emememememe', 'default_profile.webp', 'testuser4@example.com', 0x2432612431322461314f4b74617a626c55693578714c397048444f565345354c6d70535651757574687269456d736e356441535639347953, '2025-03-01 16:49:52', 1, 1),
(5, 'MeowHiss', 'default_profile.webp', 'testuser5@example.com', 0x2432612431322461314f4b74617a626c55693578714c397048444f565345354c6d70535651757574687269456d736e356441535639347953, '2025-03-01 16:49:52', 2, 1),
(6, 'Victoria-super', 'profile_6.webp', 'vicky@meow.com', 0x24327924313024746c62543365746d796b2e54533864755430754b7775646b74794a7037532e352f456541535543786733653442336c33626f45654b, '2025-03-02 00:12:34', 3, 1),
(11, 'Test-user', 'default_profile.webp', 'test-user1@gmail.com', 0x243279243130244c6956717473424d59633653387073783337392e2f75774e4a4e5766475843755143745361624a4d465a544176672f7749517a7347, '2025-03-08 03:48:08', 1, 1),
(12, 'Test-admin', 'default_profile.webp', 'test-admin@gmail.com', 0x2432792431302453515049546e356a4b43524764525169626b54536d65384c616d754f724f585a4647427a78614f4b67506136732f44587843546947, '2025-03-08 03:57:01', 2, 1),
(13, 'Test-superadmin', 'default_profile.webp', 'Test-superadmin@gmail.com', 0x24327924313024505a73432f4f37756e314e7750734f5636466e43684f593956444b474859713152367042574a34344d6764733250526a6d63625771, '2025-03-08 04:02:21', 3, 1),
(14, 'Test_user02', 'default_profile.webp', 'test_user02@gmail.com', 0x243279243130242e567233526f666858432f76654b525550674834724f49486d51334f4a5069323662364d744559766a63554a5579393657484f3353, '2025-03-09 01:46:00', 1, 1),
(15, 'zmchastain', 'default_profile.webp', 'zmchastain@gmail.com', 0x243279243130244f6b45433076737a4477302e7a5333514c4a3775474f7758524859533235372f327a7774306534457434435859566c333970365653, '2025-03-09 04:02:18', 1, 1),
(16, 'bobberts_mom', 'default_profile.webp', 'robert.uhren@gmail.com', 0x24327924313024483348575430594c51357159517164774132304e594f484c43497445764f514b3572356d576638497a71584a51484e79536d745553, '2025-03-09 11:26:07', 1, 1),
(17, 'Zetta', 'default_profile.webp', 'k8ross@gmail.com', 0x24327924313024573861626767346a6e444d4e3666532e4633775469754577757468363338544a4343306e556642337679572e666c616a53516e4671, '2025-03-09 23:31:21', 1, 1),
(18, 'Pythios', 'default_profile.webp', 'Jeffrey.S.Hamilton@gmail.com', 0x243279243130242f45524c6e5a41742f534c4b6d6b613236436a6d6e654c7a394f4c444344746d3279734166346d6731784d6c585055696271717369, '2025-03-10 00:58:19', 1, 1),
(19, 'squidvicious', 'default_profile.webp', 'squidvicious@gmail.com', 0x24327924313024386e362f6f53445a434c48526f4e2e4d4e724e37506550707a645169686b7a4f395268634d4c36704557614c6676526630417a7143, '2025-03-10 02:41:40', 1, 1),
(28, 'new-user', 'default_profile.webp', 'new-user@email.com', 0x24327924313024353541427a5243437a6d53656d356246644a562e4e4f42536b4e72686e30692e52626e51514c4671396b584a517237325a6d484c36, '2025-03-24 01:28:52', 1, 1),
(29, 'Ollyyyy', 'default_profile.webp', 'oasilins@gmail.com', 0x24327924313024754e564b42573478656741567a66326b7238474367757932776e575a4e497535643067646c4a737a65684d6e386738546d49556547, '2025-03-24 21:59:28', 1, 1),
(30, 'Dgraham', 'default_profile.webp', 'test@example.com', 0x24327924313024506261692f3231655777427465384b4f32332e64502e76306f31305a303742436f743065726665793072474c762e4b3679416e3857, '2025-03-24 22:57:43', 1, 1),
(31, 'beccapirate', 'default_profile.webp', 'beccapirate@gmail.com', 0x243279243130244e4c702e366a6a374a564f31464a7961483252723365425162647274335575525570686672623255616e5357684a633132654b416d, '2025-03-25 00:48:04', 1, 1),
(32, 'majorbigboobies', 'default_profile.webp', 'derpymuffinhooves32@gmail.com', 0x2432792431302435474d58414e3651784a646e4e572e4936762f4354657438565079324573706a6d6c636a677668376852556a705a46342e47643747, '2025-03-25 03:57:53', 3, 1),
(33, 'JoeBlow', 'default_profile.webp', 'joeblow@gmail.com', 0x243279243130246d5656384c777a486b51583379687453526d656a70654a6d42354b7165686649713076646439704f6b552f527478484337554d424b, '2025-03-25 05:43:18', 1, 1),
(35, 'Josh1', 'default_profile.webp', 'zmchastain+1@gmail.com', 0x2432792431302434553439666e6435396472437878326d48375972552e434c56632f6e2f3246414d67457064376f4141626d677a4a774466474a6a57, '2025-03-25 10:05:44', 1, 1),
(54, 'Maddie', 'default_profile.webp', 'captcatest2@gmail.com', 0x243279243130246d6948452e79534b647a67333645727172463773514f576e6e577835345550336e49594e6a4676335659656e774732436d69423965, '2025-04-27 15:42:49', 1, 1),
(55, 'Dashi', 'default_profile.webp', 'captest3@gmail.com', 0x243279243130247956384a6d6c65662f4966352f3975353076714a4375426a4f5467336a4770436658616171732e756b667a6a2f446c49525869434f, '2025-04-27 15:58:26', 1, 1),
(56, 'Athena', 'default_profile.webp', 'captest@gmail.com', 0x243279243130246841374e38714a372e583745506f79516977527874656b4b7a327a4d63786d55584262577542455a6f4644796445336e745778752e, '2025-04-27 16:33:05', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int UNSIGNED NOT NULL,
  `recipe_id` int UNSIGNED NOT NULL,
  `youtube_url` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `recipe_id`, `youtube_url`) VALUES
(1, 1, 'tHzdl9CpRLA'),
(2, 2, 'tHzdl9CpRLA'),
(3, 3, '5mFCbhaNDa0'),
(4, 4, 'xhhmnCJhUTE'),
(5, 5, 'ya3KxjZseY4'),
(6, 6, 'LRmNqKw6Ly0'),
(7, 7, '18b3luUDIBk'),
(8, 9, 'tkD4tSKocVU'),
(9, 10, '2P8J7Cx1plA'),
(10, 11, '2P8J7Cx1plA'),
(11, 12, 'EA4IUehYsDU'),
(12, 14, 'Lx-H0bfTlAA');

-- --------------------------------------------------------

--
-- Table structure for table `visibility`
--

CREATE TABLE `visibility` (
  `id` tinyint UNSIGNED NOT NULL,
  `visibility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visibility`
--

INSERT INTO `visibility` (`id`, `visibility`) VALUES
(1, 'private'),
(2, 'public'),
(3, 'friends only');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `commenter_user_id` (`commenter_user_id`,`recipe_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diet` (`diet`);

--
-- Indexes for table `direction`
--
ALTER TABLE `direction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id` (`recipe_id`,`direction_line_item`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `following_user_id` (`following_user_id`,`followed_user_id`),
  ADD KEY `followed_user_id` (`followed_user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id` (`recipe_id`,`image_line_item`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id` (`recipe_id`,`ingredient_line_item`),
  ADD KEY `measurement_id` (`measurement_id`);

--
-- Indexes for table `meal_type`
--
ALTER TABLE `meal_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meal_type` (`meal_type`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id` (`recipe_id`,`rater_user_id`),
  ADD KEY `rater_user_id` (`rater_user_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `measurement_id` (`measurement_id`),
  ADD KEY `visibility_id` (`visibility_id`);
ALTER TABLE `recipe` ADD FULLTEXT KEY `recipe_title` (`recipe_title`,`description`);

--
-- Indexes for table `recipe_diet`
--
ALTER TABLE `recipe_diet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id` (`recipe_id`,`diet_id`),
  ADD KEY `diet_id` (`diet_id`);

--
-- Indexes for table `recipe_meal_type`
--
ALTER TABLE `recipe_meal_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id` (`recipe_id`,`meal_type_id`),
  ADD KEY `meal_type_id` (`meal_type_id`);

--
-- Indexes for table `recipe_style`
--
ALTER TABLE `recipe_style`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id` (`recipe_id`,`style_id`),
  ADD KEY `style_id` (`style_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `style` (`style`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `visibility`
--
ALTER TABLE `visibility`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diet`
--
ALTER TABLE `diet`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `direction`
--
ALTER TABLE `direction`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `meal_type`
--
ALTER TABLE `meal_type`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `recipe_diet`
--
ALTER TABLE `recipe_diet`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `recipe_meal_type`
--
ALTER TABLE `recipe_meal_type`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `recipe_style`
--
ALTER TABLE `recipe_style`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `visibility`
--
ALTER TABLE `visibility`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`commenter_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `direction`
--
ALTER TABLE `direction`
  ADD CONSTRAINT `direction_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`following_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`followed_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `ingredient_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`),
  ADD CONSTRAINT `ingredient_ibfk_2` FOREIGN KEY (`measurement_id`) REFERENCES `measurement` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`rater_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`measurement_id`) REFERENCES `measurement` (`id`),
  ADD CONSTRAINT `recipe_ibfk_3` FOREIGN KEY (`visibility_id`) REFERENCES `visibility` (`id`);

--
-- Constraints for table `recipe_diet`
--
ALTER TABLE `recipe_diet`
  ADD CONSTRAINT `recipe_diet_ibfk_1` FOREIGN KEY (`diet_id`) REFERENCES `diet` (`id`),
  ADD CONSTRAINT `recipe_diet_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `recipe_meal_type`
--
ALTER TABLE `recipe_meal_type`
  ADD CONSTRAINT `recipe_meal_type_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`),
  ADD CONSTRAINT `recipe_meal_type_ibfk_2` FOREIGN KEY (`meal_type_id`) REFERENCES `meal_type` (`id`);

--
-- Constraints for table `recipe_style`
--
ALTER TABLE `recipe_style`
  ADD CONSTRAINT `recipe_style_ibfk_1` FOREIGN KEY (`style_id`) REFERENCES `style` (`id`),
  ADD CONSTRAINT `recipe_style_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

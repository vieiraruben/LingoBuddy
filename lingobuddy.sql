SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `name`, `code`) VALUES
(1, 'French', 'fr'),
(2, 'English', 'en'),
(3, 'Arabic', 'ar'),
(4, 'Spanish', 'es'),
(5, 'Portuguese', 'pt'),
(6, 'Italian', 'it');

CREATE TABLE `translator` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `avatar_url` varchar(20) NOT NULL,
  `language` int(11) NOT NULL,
  `language_2` int(11) NOT NULL,
  `language_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `translator` (`id`, `first_name`, `last_name`, `avatar_url`, `language`, `language_2`, `language_3`) VALUES
(120, 'John', 'Smith', 'john.jpg', 3, 2, 1),
(121, 'Anna', 'Smith', 'anna.jpg', 3, 5, 4),
(122, 'Mohammed', 'Bakir', 'bakir.jpg', 3, 2, NULL);

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `country`, `phone_number`) VALUES
(101, 'Peter', 'Brown', 'brown@gmail.com', 'zebra', 'France', 76775843),
(108, 'Sandra', 'Sanchez', 'sanchez@gmail.com', 'jedi1', 'Colombia', 76956845),
(109, 'Mike', 'Delfino', 'mike@delfino.com', 'snowbear', 'Italy', 76858238),
(110, 'Andre', 'Silva', 'silva@hotmail.com', 'adele1', 'Peru', 43857834);

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `word_count` int(11) NOT NULL,
  `file_url` varchar(250) NOT NULL,
  `created_on` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `original_language` varchar(25) DEFAULT NULL,
  `target_language` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_order` (`id`, `user`, `word_count`, `file_url`, `created_on`, `price`, `original_language`, `target_language`) VALUES
(3, 101, 1000, 'essay.doc', '2022-01-05 10:05:43', 65, 'Arabic', 'Italian'),
(4, 101, 500, 'presentation.doc', '2022-01-04 14:49:58', 50, 'Danish', 'Dutch'),
(5, 101, 500, 'hello1.txt', '2022-01-06 13:57:25', 47, 'French', 'Italian'),
(6, 101, 530, 'test2.pdf', '2022-01-06 23:09:50', 180, 'Arabic', 'English'),
(7, 101, 500, 'hello.txt', '2022-01-06 23:22:35', 180, 'English', 'Portuguese');

ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `translator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`) USING BTREE,
  ADD KEY `language_2` (`language_2`),
  ADD KEY `language_3` (`language_3`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `translator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `translator`
  ADD CONSTRAINT `translator_ibfk_1` FOREIGN KEY (`language`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `translator_ibfk_2` FOREIGN KEY (`language_2`) REFERENCES `language` (`id`);
COMMIT;
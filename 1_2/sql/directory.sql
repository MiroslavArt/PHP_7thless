CREATE TABLE `books`.`directory` (

  `id` int(11) NOT NULL,
  `path` text,
  `file_name1` varchar(16) DEFAULT NULL,
  `file_name2` varchar(16) DEFAULT NULL,
  `title` text,
  `description` text DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `books`.`directory`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `books`.`directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
CREATE TABLE `users` (

  `userid` int(11) NOT NULL,
  `userlogin` varchar(30) NOT NULL,
  `userpwd` varchar(30) NOT NULL,
  `userhash` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);
  
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  

CREATE TABLE `eplat_user` (
  `id` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `role` int(11) DEFAULT 0 COMMENT ' 0 = student ,1 = manager ,2 = teacher(원), 9 = admin',
  `confirm` int(11) DEFAULT 0 COMMENT '0 manger not confirmed.\n1 manager confirmed.',
  `rdate` date NOT NULL DEFAULT current_timestamp(),
  `pid` varchar(30) DEFAULT NULL,
  `mid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
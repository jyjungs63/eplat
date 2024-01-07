CREATE TABLE `eplat_user` (
  `id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `zipcode` varchar(5) DEFAULT NULL,
  `role` int(2) DEFAULT 0 COMMENT ' 0 = 일반 ,1 = manager ,2 = teacher, 9 = admin',
  `confirm` int(2) DEFAULT 0 COMMENT '0 manger not confirmed.\\n1 manager confirmed.',
  `rdate` date NOT NULL DEFAULT current_timestamp(),
  `pid` varchar(30) DEFAULT NULL COMMENT 'student foreign key',
  `mid` varchar(30) DEFAULT NULL COMMENT 'manager foregin key\n',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `eplat_user` (
  `id` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `addr` varchar(64) DEFAULT NULL,
  `zipcode` varchar(12) DEFAULT NULL,
  `role` int(2) DEFAULT NULL,
  `confirm` int(2) DEFAULT 0,
  `rdate` date NOT NULL DEFAULT current_timestamp(),
  `tid` varchar(30) DEFAULT NULL,
  `mid` varchar(30) DEFAULT NULL,
  `etc` varchar(20) DEFAULT NULL,
  `classnm` varchar(30) DEFAULT NULL,
  `step` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
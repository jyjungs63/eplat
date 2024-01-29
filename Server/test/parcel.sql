CREATE TABLE `eplat_parcel` (
  `id` varchar(30) DEFAULT NULL COMMENT '지사 아이디',
  `name` varchar(45) DEFAULT NULL COMMENT '지사이름',
  `date` datetime DEFAULT current_timestamp(),
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
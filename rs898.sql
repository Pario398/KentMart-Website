
DROP TABLE IF EXISTS `Stock`;
DROP TABLE IF EXISTS `Customers`;

CREATE TABLE `Customers` (
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into `Customers`(`username`,`password`,`email`) values
('anonymous','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','anonymous@unspam.us'),
('admin','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','admin@unspam.us');

CREATE TABLE `Stock` (
  `product` varchar(256) NOT NULL,
  `price` int NOT NULL,
  `Id` int NOT NULL,
  `no` int NOT NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

insert into `Stock` (`product`, `price`, `Id`, `no`) values
('15 Ca rve I La die s Quartz Watch. ', '518', '1', '32'),
('16 hours (4 n RX6 Uniross rechargeable ', '818', '2', '137'),
('17 Table mat And Coaster Set. ', '1090', '3', '858'),
('26 Set Gold Cubic Zirconium ', '278', '4', '76'),
('10 lily 5 Panel Pendant Shade.. ', '112', '5', '717'),
('9 Hilka Soldering Tool Kit. ', '600', '6', '322'),
('1 Folding Guest Bed. For occasional ', '551', '7', '931'),
('9 Braun MR290 ', '543', '8', '521'),
('10 Richmond Auto Shut Off Air ', '915', '9', '202'),
('6 Black, ', '855', '10', '155');

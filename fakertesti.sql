CREATE DATABASE IF NOT EXISTS gok;
USE gok;

CREATE TABLE IF NOT EXISTS `gok` (
`id` int(20) NOT NULL AUTO_INCREMENT,
`nimi` text COLLATE utf8_swedish_ci NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `gok` (`nimi`) VALUES
('Nti. Vilho Lavola'),
('Fanni Rasila'),
('Tri. Saku Heintikainen'),
('Kaisla Mustonen'),
('Olivia Jurva'),
('Samuli Juustinen'),
('Matias Väisänen'),
('Mikael Äijälä'),
('Heikki Hento'),
('Ilmari Finni'),
('Eeva Wettenranta'),
('Samuli Jurva')
;
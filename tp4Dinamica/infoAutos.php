<?php

$pdo = new PDO('mysql:host=localhost;dbname=infoautos', 'root', '');

$query = "CREATE TABLE `auto` (
  `Patente` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Marca` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Modelo` int(11) NOT NULL,
  `DniDuenio` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`Patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$pdo->query($query);

$query = "INSERT INTO `auto` (`Patente`, `Marca`, `Modelo`, `DniDuenio`) VALUES 
('ADC 152', 'Fiat Uno', 98, '28326986'),
('POL 968', 'Renault 12', 77, '28326986'),
('KJU 952', 'Ford Fiesta', 2006, '25963874'),
('UYH 985', 'Fiat Palio', 95, '30875962'),
('LKI 865', 'Fiat Siena', 90, '28326986'),
('SDC 965', 'Peugeot 205', 88, '30875962');";

$pdo->query($query);

$query = "CREATE TABLE `persona` (
  `NroDni` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Apellido` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Nombre` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `Telefono` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
  `Domicilio` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`NroDni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";


$pdo->query($query);

$query = "INSERT INTO `persona` (`NroDni`, `Apellido`, `Nombre`, `fechaNac`, `Telefono`, `Domicilio`) VALUES 
('28326986', 'Moya', 'Manuel', '1981-12-03', '299-9632587', 'Linares 44 piso 2 dpto 5'),
('25963874', 'Farias', 'Marta', '1975-06-21', '299-1559354', 'Roca 568'),
('30875962', 'Lopez', 'Eduardo', '1983-10-03', '299-6587741', 'Santa Fe 98'),
('22985265', 'Ramirez', 'Claudia', '1971-05-16', '299-9854155', 'Sarmiento 55');";

$pdo->query($query);

$query = "ALTER TABLE `auto` ADD KEY `idTipoVehiculo` (`DniDuenio`);

ALTER TABLE `auto`
ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`DniDuenio`) REFERENCES `persona` (`NroDni`);";

$pdo->query($query);
SET time_zone = "+03:00";

--
-- Database: `stampymail`
--

DROP DATABASE IF EXISTS stampymail;
CREATE DATABASE stampymail;
use stampymail;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(65) NOT NULL, 
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `name`) VALUES
('admin@admin.com', 'adminadmin', 'Admin'),
('franco@admin.com', 'adminadmin', 'Franco'),
('facundo@admin.com', 'adminadmin', 'Facundo'),
('jose@admin.com', 'adminadmin', 'Jose'),
('matias@admin.com', 'adminadmin', 'Matias'),
('enrique@admin.com', 'adminadmin', 'Enrique'),
('maria@admin.com', 'adminadmin', 'Maria'),
('eduardo@admin.com', 'adminadmin', 'Eduardo'),
('lucia@admin.com', 'adminadmin', 'Lucia'),
('anahi@admin.com', 'adminadmin', 'Anahi'),
('mariano@admin.com', 'adminadmin', 'Mariano'),
('lucrecia@admin.com', 'adminadmin', 'Lucrecia'),
('sebastian@admin.com', 'adminadmin', 'Sebastian'),
('marcelo@admin.com', 'adminadmin', 'Marcelo'),
('alberto@admin.com', 'adminadmin', 'Alberto'),
('guillermo@admin.com', 'adminadmin', 'Guillermo'),
('benjamin@admin.com', 'adminadmin', 'Benjamin'),
('ana@admin.com', 'adminadmin', 'Ana'),
('myriam@admin.com', 'adminadmin', 'Myriam'),
('lautaro@admin.com', 'adminadmin', 'Lautaro'),
('carlos@admin.com', 'adminadmin', 'Carlos'),
('maria@admin.com', 'adminadmin', 'Maria'),
('ernesto@admin.com', 'adminadmin', 'Ernesto'),
('franco2@admin.com', 'adminadmin', 'Franco'),
('facundo2@admin.com', 'adminadmin', 'Facundo'),
('jose2@admin.com', 'adminadmin', 'Jose'),
('matias2@admin.com', 'adminadmin', 'Matias'),
('enrique2@admin.com', 'adminadmin', 'Enrique'),
('maria2@admin.com', 'adminadmin', 'Maria'),
('eduardo2@admin.com', 'adminadmin', 'Eduardo'),
('lucia2@admin.com', 'adminadmin', 'Lucia'),
('anahi2@admin.com', 'adminadmin', 'Anahi'),
('mariano2@admin.com', 'adminadmin', 'Mariano'),
('lucrecia2@admin.com', 'adminadmin', 'Lucrecia'),
('sebastian2@admin.com', 'adminadmin', 'Sebastian'),
('marcelo2@admin.com', 'adminadmin', 'Marcelo'),
('alberto2@admin.com', 'adminadmin', 'Alberto'),
('guillermo2@admin.com', 'adminadmin', 'Guillermo'),
('benjamin2@admin.com', 'adminadmin', 'Benjamin'),
('ana2@admin.com', 'adminadmin', 'Ana'),
('myriam2@admin.com', 'adminadmin', 'Myriam'),
('lautaro2@admin.com', 'adminadmin', 'Lautaro'),
('carlos2@admin.com', 'adminadmin', 'Carlos'),
('maria2@admin.com', 'adminadmin', 'Maria'),
('ernesto2@admin.com', 'adminadmin', 'Ernesto');


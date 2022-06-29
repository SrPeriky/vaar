-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2022 a las 02:16:05
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fesc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nom`) VALUES
(49, 'Antioquia'),
(50, 'Archipiélago de San Andrés, Providencia y Santa Catalina'),
(51, 'Atlántico'),
(52, 'Bogotá D.C.'),
(53, 'Bolívar'),
(54, 'Boyacá'),
(55, 'Caldas'),
(56, 'Caquetá'),
(57, 'Casanare'),
(58, 'Cauca'),
(59, 'Córdoba'),
(60, 'Cesar'),
(61, 'Chocó'),
(62, 'Cundinamarca'),
(63, 'Huila'),
(64, 'La Guajira'),
(65, 'Magdalena'),
(66, 'Meta'),
(67, 'Nariño'),
(68, 'Norte de Santander'),
(69, 'Putumayo'),
(70, 'Quindío'),
(71, 'Risaralda'),
(72, 'Santander'),
(73, 'Sucre'),
(74, 'Tolima'),
(75, 'Valle del Cauca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_institucion` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `cc` varchar(20) NOT NULL,
  `anno` varchar(4) NOT NULL,
  `nombre` varchar(270) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1',
  `codigo` varchar(8) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `nit` varchar(90) NOT NULL,
  `naturaleza_juridica` varchar(50) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `caracter_academico` varchar(60) NOT NULL,
  `direccion` varchar(160) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `ente_emite_norma_creacion` varchar(20) NOT NULL,
  `acto_admin_norma_de_creacion` varchar(60) NOT NULL,
  `numero_norma_de_creacion` varchar(10) NOT NULL,
  `fecha_norma_creacion` varchar(10) NOT NULL,
  `programas_vigentes` varchar(5) NOT NULL,
  `programas_en_convenio` varchar(5) NOT NULL,
  `pagina_web` varchar(50) NOT NULL,
  `acreditada_alta_calidad` varchar(1) NOT NULL,
  `fecha_acreditacion` varchar(10) NOT NULL,
  `resolucion_acreditacion` varchar(15) NOT NULL,
  `vigencia_acreditacion` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id`, `id_departamento`, `id_municipio`, `activo`, `codigo`, `nom`, `nit`, `naturaleza_juridica`, `sector`, `caracter_academico`, `direccion`, `telefono`, `ente_emite_norma_creacion`, `acto_admin_norma_de_creacion`, `numero_norma_de_creacion`, `fecha_norma_creacion`, `programas_vigentes`, `programas_en_convenio`, `pagina_web`, `acreditada_alta_calidad`, `fecha_acreditacion`, `resolucion_acreditacion`, `vigencia_acreditacion`) VALUES
(1, 52, 6, b'1', '1101', 'UNIVERSIDAD NACIONAL DE COLOMBIA', '899.999.063-3', 'Nacional', 'Oficial', 'Universidad', 'Carrera 45 #26 - 85', '3165000', 'Ley', 'Congreso de la Rep¿blica', '66', '31/12/1969', '276', '2', 'www.unal.edu.co', 'S', '25/08/2021', '15859', '10'),
(2, 52, 6, b'1', '1105', 'UNIVERSIDAD PEDAGOGICA NACIONAL', '899.999.124-4', 'Nacional', 'Oficial', 'Universidad', 'Calle  73  No.11-95', '3471190', 'Decreto', 'Gobierno Nacional', '197', '01/02/1955', '39', '1', 'www.pedagogica.edu.co', 'S', '12/08/2021', '14621', '6'),
(3, 54, 58, b'1', '1106', 'UNIVERSIDAD PEDAGOGICA Y TECNOLOGICA DE COLOMBIA - UPTC', '891800330-1', 'Nacional', 'Oficial', 'Universidad', 'Avenida Central del Norte 39-115', '7422175', 'Decreto', 'Gobierno Nacional', '2655', '10/10/1953', '131', '', 'www.uptc.edu.co', 'S', '10/12/2021', '23655', '6'),
(4, 58, 37, b'1', '1110', 'UNIVERSIDAD DEL CAUCA', '891.500.319-2', 'Nacional', 'Oficial', 'Universidad', 'Claustro de Santo Domingo, Calle 5 No. 4-70', '8209900', 'Decreto', 'Gobierno Nacional', '0', '31/12/1969', '178', '8', 'www.unicauca.edu.co', 'S', '13/06/2019', '6218', '8'),
(5, 71, 36, b'1', '1111', 'UNIVERSIDAD TECNOLOGICA DE PEREIRA - UTP', '891.480.035-9', 'Nacional', 'Oficial', 'Universidad', 'Carrera 27 #10-02', '3215693', 'Ley', 'Congreso de la Rep¿blica', '41', '15/12/1958', '119', '2', 'www.utp.edu.co', 'S', '28/05/2021', '9597', '10'),
(6, 55, 26, b'1', '1112', 'UNIVERSIDAD DE CALDAS', '890801063', 'Nacional', 'Oficial', 'Universidad', 'Calle 65  26-10', '8861250', 'Ordenanza', 'Asamblea Departamental de Caldas', '6', '24/05/1943', '120', '3', 'www.ucaldas.edu.co', 'S', '24/10/2018', '17202', '8'),
(7, 59, 30, b'1', '1113', 'UNIVERSIDAD DE CORDOBA', '891.080.031-3', 'Nacional', 'Oficial', 'Universidad', 'Carrera 6 No. 77-305', '7860300', 'Ley', 'Congreso de Colombia', '37', '03/08/1966', '61', '5', 'www.unicordoba.edu.co', 'S', '22/03/2019', '2956', '4'),
(8, 63, 31, b'1', '1114', 'UNIVERSIDAD SURCOLOMBIANA', '891.180.084-2', 'Nacional', 'Oficial', 'Universidad', 'Avenida Pastrana Borrero Carrera 1', '8754753', 'Ley', 'Congreso de la Rep¿blica', '13', '30/01/1976', '88', '11', 'www.usco.edu.co', 'S', '29/12/2017', '29501', '4'),
(9, 56, 19, b'1', '1115', 'UNIVERSIDAD DE LA AMAZONIA', '891.190.346-1', 'Nacional', 'Oficial', 'Universidad', 'Avenida Circunvalar, Barrio Porvenir', '4352905', 'Ley', 'Congreso de Colombia', '60', '30/12/1982', '47', '2', 'www.uniamazonia.edu.co', 'N', '', '', ''),
(10, 52, 6, b'1', '1117', 'UNIVERSIDAD MILITAR-NUEVA GRANADA', '800225340', 'Nacional', 'Oficial', 'Universidad', 'Carrera 11 No. 101-80', '2159689', 'Decreto ley', 'Congreso de la Republica', '84', '23/01/1980', '116', '', 'www.umng.edu.co', 'S', '16/07/2015', '10683', '6'),
(11, 61, 40, b'1', '1118', 'UNIVERSIDAD TECNOLOGICA DEL CHOCO-DIEGO LUIS CORDOBA', '891.680.089-4', 'Nacional', 'Oficial', 'Universidad', 'Ciudadela Universitaria Barrio Nicolas Medrano', '6710237', 'Ley', 'Congreso de Colombia', '38', '18/11/1968', '28', '2', 'www.utch.edu.co', 'N', '', '', ''),
(12, 66, 60, b'0', '1119', 'UNIVERSIDAD DE LOS LLANOS', '892.000.757-3', 'Nacional', 'Oficial', 'Universidad', 'Kil¿metro 12 V¿a Puerto L¿pez, Vereda Barcelona', '6616800', 'Decreto', 'Gobierno Nacional', '2513', '25/11/1974', '46', '2', 'www.rectoria@unillanos.edu.co', 'N', '', '', ''),
(13, 60, 59, b'1', '1120', 'UNIVERSIDAD POPULAR DEL CESAR', '892.300.285-6', 'Nacional', 'Oficial', 'Universidad', 'Sede Balneario Hurtado', '5843517', 'Ley', 'Congreso de Colombia.', '34', '19/11/1976', '47', '16', 'www.unicesar.edu.co', 'N', '', '', ''),
(14, 52, 6, b'1', '1121', 'UNIVERSIDAD-COLEGIO MAYOR DE CUNDINAMARCA', '800.144.829-9', 'Nacional', 'Oficial', 'Universidad', 'Clle 28 No. 6-02', '2418800', 'Ley', 'Congreso de Colombia', '48', '17/12/1945', '23', '', 'www.unicolmayor.edu.co', 'N', '', '', ''),
(15, 75, 8, b'1', '1122', 'UNIVERSIDAD DEL PACIFICO', '835.000.300-4', 'Nacional', 'Oficial', 'Universidad', 'Avenida Sim¿n Bolivar  54A-10', '2449675', 'Ley', 'Congreso de la Republica', '65', '14/12/1988', '8', '', 'www.unipacifico.edu.co', 'N', '', '', ''),
(16, 49, 28, b'1', '1201', 'UNIVERSIDAD DE ANTIOQUIA', '890.980.040-8', 'Departamental', 'Oficial', 'Universidad', 'CLLE 67 No. 51 - 08', '2128332', 'Ley', 'Asamblea', '71', '31/12/1969', '321', '2', 'www.udea.edu.co', 'S', '14/12/2012', '16516', '10'),
(17, 51, 38, b'0', '1202', 'UNIVERSIDAD DEL ATLANTICO', '890.102.257-3', 'Departamental', 'Oficial', 'Universidad', 'CARRERA 30 No. 8 - 49 PUERTO COLOMBIA - ATL¿NTICO', '3162666', 'Ordenanza', 'Asamblea Departamental del Atlantico', '42', '15/06/1946', '92', '8', 'www.uniatlantico.edu.co', 'S', '22/04/2019', '4140', '4'),
(18, 75, 10, b'1', '1203', 'UNIVERSIDAD DEL VALLE', '8903990106', 'Departamental', 'Oficial', 'Universidad', 'Ciudad Universitaria Melendez, Calle 13 100-00', '3212100', 'Ordenanza', 'Asamblea Departamental del Valle', '12', '11/06/1945', '293', '5', 'www.univalle.edu.co', 'S', '27/01/2014', '1052', '10'),
(19, 72, 7, b'1', '1204', 'UNIVERSIDAD INDUSTRIAL DE SANTANDER', '890.201.213-4', 'Departamental', 'Oficial', 'Universidad', 'Ciudad Universitaria Carrera 27 Calle 9', '6344000', 'Ordenanza', 'Asamblea Departamental de Santander', '83', '22/06/1944', '179', '7', 'www.uis.edu.co', 'S', '24/04/2014', '5775', '8'),
(20, 53, 11, b'1', '1205', 'UNIVERSIDAD DE CARTAGENA', '890.480.123-5', 'Departamental', 'Oficial', 'Universidad', 'Centro Carrera 6 No. 36-100', '6600676', 'Decreto', 'el Libertador Sim¿n Bolivar', '0', '31/12/1969', '109', '8', 'www.unicartagena.edu.co', 'S', '12/02/2018', '1968', '6'),
(21, 67, 34, b'1', '1206', 'UNIVERSIDAD DE NARIÑO', '800118954', 'Departamental', 'Oficial', 'Universidad', 'Torobajo, Carrera 22 No. 18-109', '7313604', 'Decreto', 'Gobernaci¿n de Nari¿o', '49', '07/11/1904', '111', '12', 'www.udenar.edu.co', 'S', '23/05/2017', '10567', '6'),
(22, 74, 24, b'1', '1207', 'UNIVERSIDAD DEL TOLIMA', '890700640', 'Departamental', 'Oficial', 'Universidad', 'Barrio Santa Elena', '2644219', 'Ordenanza', 'Asamblea Departamental del Tolima', '5', '21/05/1945', '87', '10', 'www.ut.edu.co', 'S', '17/07/2020', '13189', '4'),
(23, 70, 2, b'1', '1208', 'UNIVERSIDAD DEL QUINDIO', '890.000.432-8', 'Departamental', 'Oficial', 'Universidad', 'Carrera 15 Calle 12 Norte', '7460103', 'Acuerdo', 'Concejo Municipal de Armenia.', '23', '14/10/1960', '49', '7', 'www.uniquindio.edu.co', 'S', '07/03/2018', '3902', '4'),
(24, 68, 48, b'1', '1209', 'UNIVERSIDAD FRANCISCO DE PAULA SANTANDER', '890500622', 'Departamental', 'Oficial', 'Universidad', 'Avenida Gran Colombia No. 12E-96', '5753172', 'Decreto', 'Gobernacion Departamental de Santander', '323', '13/05/1970', '46', '2', 'www.ufps.edu.co', 'N', '', '', ''),
(25, 68, 33, b'1', '1212', 'UNIVERSIDAD DE PAMPLONA', '890.501.510-4', 'Departamental', 'Oficial', 'Universidad', 'Ciudad Universitaria, Km.1 v¿a a Bucaramanga', '6853003', 'Acta', 'Gobernaci¿n del Norte de Santander', '1', '23/11/1960', '80', '5', 'www.unipamplona.edu.co', 'S', '27/09/2021', '18143', '4'),
(26, 65, 51, b'1', '1213', 'UNIVERSIDAD DEL MAGDALENA - UNIMAGDALENA', '891.780.111-8', 'Departamental', 'Oficial', 'Universidad', 'Carrera 32 22-08 Sector San Pedro Alejandrino', '4301292', 'Ordenanza', 'Asamblea Departamental del Magdalena', '5', '27/10/1958', '90', '8', 'https://unimagdalena.edu.co', 'S', '04/06/2021', '10288', '6'),
(27, 62, 21, b'1', '1214', 'UNIVERSIDAD DE CUNDINAMARCA-UDEC', '890680062', 'Departamental', 'Oficial', 'Universidad', 'Diagonal 18  No. 20-29', '8281483', 'Ordenanza', 'Asamblea Departamental de Cundinamarca', '45', '19/12/1969', '28', '', 'www.ucundinamarca.edu.co', 'N', '', '', ''),
(28, 73, 55, b'1', '1217', 'UNIVERSIDAD DE SUCRE', '892.200.323-9', 'Departamental', 'Oficial', 'Universidad', 'Carrera 28 No. 5 - 267', '2821240', 'Ordenanza', 'Asamblea Departamental de Sucre', '1', '24/11/1977', '28', '9', 'www.unisucre.edu.co', 'N', '', '', ''),
(29, 64, 41, b'1', '1218', 'UNIVERSIDAD DE LA GUAJIRA', '892.115.029-4', 'Departamental', 'Oficial', 'Universidad', 'Kil¿metro 5 v¿a a Maicao', '7822729', 'Decreto', 'Gobierno Departamental de la Guajira', '523', '12/11/1976', '47', '6', 'www.uniguajira.edu.co', 'N', '', '', ''),
(30, 52, 6, b'1', '1301', 'UNIVERSIDAD DISTRITAL-FRANCISCO JOSE DE CALDAS', '899.999.230-7', 'Municipal', 'Oficial', 'Universidad', 'Carrera 7 No. 40-53', '3239300', 'Resolución', 'Ministerio de Justicia', '135', '15/12/1950', '92', '2', 'www.udistrital.edu.co', 'S', '10/12/2021', '23653', '8'),
(31, 52, 6, b'1', '1701', 'PONTIFICIA UNIVERSIDAD JAVERIANA', '860.013.720-1', 'Fundación', 'Privado', 'Universidad', 'Carrera 7  40-62', '3208130', 'No informa', 'Ministerio de Gobierno', '73', '12/12/1933', '241', '2', 'www.javeriana.edu.co', 'S', '17/07/2020', '13170', '10'),
(32, 52, 6, b'1', '1703', 'UNIVERSIDAD INCCA DE COLOMBIA', '860.011.285-1', 'Fundación', 'Privado', 'Universidad', 'Carrera 13 No. 24-15', '4442000', 'Resolución', 'MINISTERIO DE JUSTICIA.', '1891', '19/06/1963', '24', '', 'www.unincca.edu.co', 'N', '', '', ''),
(33, 52, 6, b'1', '1704', 'UNIVERSIDAD SANTO TOMAS', '860.012.357-6', 'Fundación', 'Privado', 'Universidad', 'Sede Ppal Carrera 9  51-11, Sede Norte Cra.10 72-50', '5878797', 'Resolución', 'MINISTERIO DE JUSTICIA', '3645', '06/08/1965', '124', '', 'www.usta.edu.co', 'S', '09/03/2022', '3036', '6'),
(34, 52, 6, b'1', '1706', 'UNIVERSIDAD EXTERNADO DE COLOMBIA', '860.014.918-7', 'Fundación', 'Privado', 'Universidad', 'Calle 12 No. 1-17 Este', '3420288', 'Resolución', 'MINISTERIO DE GOBIERNO', '92', '09/03/1926', '261', '', 'www.uexternado.edu.co', 'S', '15/04/2021', '6538', '8'),
(35, 52, 6, b'1', '1707', 'FUNDACION UNIVERSIDAD DE BOGOTA - JORGE TADEO LOZANO', '860.006.848-6', 'Fundación', 'Privado', 'Universidad', 'Carrera 4  22-61', '3341777', 'No informa', 'Ministerio de Justicia', '2613', '14/08/1959', '136', '', 'www.utadeo.edu.co', 'S', '21/03/2018', '4624', '6'),
(36, 52, 6, b'1', '1709', 'UNIVERSIDAD CENTRAL', '860.024.746-1', 'Fundación', 'Privado', 'Universidad', 'Carrera 5  21-38', '3239868', 'No informa', 'Ministerio de Justicia', '1876', '05/06/1967', '30', '1', 'www.ucentral.edu.co', 'S', '16/01/2019', '256', '4'),
(37, 49, 28, b'1', '1710', 'UNIVERSIDAD PONTIFICIA BOLIVARIANA', '890.902.922-6', 'Fundación', 'Privado', 'Universidad', 'Campus de Laureles Circular 1a. No. 70-01', '4488388', 'No informa', 'Ministerio de Gobierno', '48', '22/02/1937', '214', '3', 'www.upb.edu.co', 'S', '24/10/2018', '17228', '6'),
(38, 62, 13, b'1', '1711', 'UNIVERSIDAD DE LA SABANA', '860.075.558-1', 'Fundación', 'Privado', 'Universidad', 'Campus  Universitario Puente del Com¿n', '8615555', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '130', '14/01/1980', '142', '', 'www.unisabana.edu.co', 'S', '31/03/2017', '6166', '8'),
(39, 49, 28, b'1', '1712', 'UNIVERSIDAD EAFIT-', '890901389', 'Fundación', 'Privado', 'Universidad', 'Carrera 49  No.7 SUR - 50', '2619500', 'No informa', 'Gobernacion Departamental de Antioquia', '75', '28/06/1960', '119', '2', 'www.eafit.edu.co', 'S', '13/02/2018', '2158', '8'),
(40, 51, 4, b'1', '1713', 'UNIVERSIDAD DEL NORTE', '890.101.681-9', 'Fundación', 'Privado', 'Universidad', 'Kilometro 5 Via  Pto. Colombia', '3509388', 'No informa', 'Gobernaci¿n Departamento del Atl¿ntico', '149', '14/02/1966', '174', '1', 'www.uninorte.edu.co', 'S', '31/05/2018', '8870', '8'),
(41, 52, 6, b'1', '1714', 'COLEGIO MAYOR DE NUESTRA SEÑORA DEL ROSARIO', '860.007.759-3', 'Fundación', 'Privado', 'Universidad', 'Calle 12c No. 6-25', '2970200', 'Resolución', 'MINISTERIO DE GOBIERNO.', '58', '31/12/1969', '210', '8', 'www.urosario.edu.co', 'S', '09/12/2019', '13599', '8'),
(42, 52, 6, b'1', '1715', 'FUNDACION UNIVERSIDAD DE AMERICA', '860.006.806-7', 'Fundación', 'Privado', 'Universidad', 'Carrera 4 #19-85 Edificio Fenalco (Sede temporal)', '3376680', 'Resolución', 'MINISTERIO DE JUSTICIA.', '417', '13/02/1958', '31', '', 'www.uamerica.edu.co', 'N', '', '', ''),
(43, 52, 6, b'1', '1718', 'UNIVERSIDAD DE SAN BUENAVENTURA', '890.307.400-1', 'Fundación', 'Privado', 'Universidad', 'Carrera 8H #172-20 , Rector¿a: Cra. 9  No. 123-76 Of.602-603', '6671090', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1326', '25/03/1975', '46', '2', 'www.usbbog.edu.co', 'S', '12/08/2021', '14620', '6'),
(44, 52, 6, b'1', '1719', 'UNIVERSIDAD CATOLICA DE COLOMBIA', '860.028.971-9', 'Fundación', 'Privado', 'Universidad', 'Av Caracas No. 46-72', '3277300', 'Resolución', 'MINISTERIO DE JUSTICIA.', '2271', '07/07/1970', '34', '', 'www.ucatolica.edu.co', 'S', '06/09/2019', '9520', '4'),
(45, 67, 34, b'1', '1720', 'UNIVERSIDAD MARIANA', '800.092.198-5', 'Fundación', 'Privado', 'Universidad', 'Calle 18 No. 34-104', '7314923', 'No informa', 'Gobierno Departamental de Nari¿o', '230', '25/03/1970', '45', '6', 'www.umariana.edu.co', 'N', '', '', ''),
(46, 55, 26, b'1', '1722', 'UNIVERSIDAD DE MANIZALES', '890806001-7', 'Fundación', 'Privado', 'Universidad', 'Carrera 9 No. 19-03 Campohermoso', '8879680', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '314', '21/01/1983', '75', '1', 'www.umanizales.edu.co', 'S', '15/05/2019', '4792', '6'),
(47, 52, 6, b'1', '1725', 'FUNDACION UNIVERSIDAD AUTONOMA DE COLOMBIA -FUAC-', '860034667', 'Fundación', 'Privado', 'Universidad', 'Calle 13  4-31, Correspondencia: Cra.4 12-85', '3343696', 'Resolución', 'MINISTERIO DE JUSTICIA.', '264', '04/02/1972', '38', '1', 'www.fuac.edu.co', 'N', '', '', ''),
(48, 49, 42, b'1', '1726', 'UNIVERSIDAD CATOLICA DE ORIENTE -UCO', '890.984.746-7', 'Fundación', 'Privado', 'Universidad', 'Carrera 46 #40B-50 Sector 3', '5699090', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '2650', '24/02/1983', '51', '1', 'www.uco.edu.co', 'S', '06/09/2019', '9522', '4'),
(49, 52, 6, b'1', '1728', 'UNIVERSIDAD SERGIO ARBOLEDA', '860351894', 'Fundación', 'Privado', 'Universidad', 'Calle 74 No. 14-14', '3177536', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '16377', '29/10/1984', '141', '', 'www.usergioarboleda.edu.co', 'S', '05/04/2019', '3659', '6'),
(50, 52, 6, b'1', '1729', 'UNIVERSIDAD EL BOSQUE', '860.066.789-6', 'Fundación', 'Privado', 'Universidad', 'Av. Cra 9 No. 131 A - 02, Edificio Fundadores', '6489000', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '11153', '04/08/1978', '133', '', 'www.unbosque.edu.co', 'S', '17/07/2020', '13172', '6'),
(51, 54, 58, b'1', '1734', 'UNIVERSIDAD DE BOYACA UNIBOYACA', '891.801.101-6', 'Fundación', 'Privado', 'Universidad', 'Carrera 2a. Este No. 64-169', '7450044', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '6553', '25/05/1981', '59', '', 'www.uniboyaca.edu.co', 'N', '', '', ''),
(52, 52, 6, b'1', '1735', 'UNIVERSIDAD MANUELA BELTRAN-UMB-', '860.517.647-5', 'Fundación', 'Privado', 'Universidad', 'Avenida Circunvalar No. 60 - 00', '5460600', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '11110', '13/07/1983', '70', '', 'www.umb.edu.co', 'S', '27/12/2019', '2710', '4'),
(53, 52, 6, b'1', '1801', 'UNIVERSIDAD LA GRAN COLOMBIA', '860015685', 'Corporación', 'Privado', 'Universidad', 'Carrera 6 No. 13-40', '3276999', 'Resolución', 'MINISTERIO DE JUSTICIA', '47', '25/09/1953', '46', '', 'www.ugc.edu.co', 'N', '', '', ''),
(54, 52, 6, b'1', '1803', 'UNIVERSIDAD DE LA SALLE', '860.015.542-6', 'Corporación', 'Privado', 'Universidad', 'Cra.5  59A-44', '3488000', 'Resolución', 'MINISTERIO DE JUSTICIA', '597', '12/02/1965', '81', '', 'www.lasalle.edu.co', 'S', '22/03/2019', '2955', '8'),
(55, 51, 4, b'1', '1804', 'UNIVERSIDAD AUTONOMA DEL CARIBE- UNIAUTONOMA', '8901025729', 'Corporación', 'Privado', 'Universidad', 'Calle 90  46-112', '3671000', 'Resolución', 'GOBERNACION DEPARTAMENTO DEL ATLANTICO', '303', '03/04/1967', '47', '', 'www.uac.edu.co', 'N', '', '', ''),
(56, 75, 10, b'1', '1805', 'UNIVERSIDAD SANTIAGO DE CALI', '890.303.797-1', 'Corporación', 'Privado', 'Universidad', 'Carrera 62 Calle 5 Campus Pampalinda', '5183000', 'Resolución', 'MINISTERIO DE JUSTICIA', '2800', '02/09/1959', '92', '', 'www.usc.edu.co', 'S', '27/09/2021', '18144', '4'),
(57, 52, 6, b'1', '1806', 'UNIVERSIDAD LIBRE', '860.013.798-5', 'Corporación', 'Privado', 'Universidad', 'Calle 8 No. 5-80', '3821000', 'Resolución', 'MINISTERIO DE GOBIERNO.', '192', '27/06/1946', '64', '', 'www.unilibre.edu.co', 'S', '25/08/2021', '15865', '6'),
(58, 49, 28, b'1', '1812', 'UNIVERSIDAD DE MEDELLIN', '890.902.920-1', 'Corporación', 'Privado', 'Universidad', 'Carrera 87 No. 30-65 Los Alpes', '3405555', 'Resolución', 'MINISTERIO DE JUSTICIA', '103', '31/07/1950', '164', '', 'www.udem.edu.co', 'S', '30/04/2021', '7470', '6'),
(59, 52, 6, b'1', '1813', 'UNIVERSIDAD DE LOS ANDES', '860.007.386-1', 'Corporación', 'Privado', 'Universidad', 'Carrera 1 No. 18A-70', '3394949', 'Resolución', 'MINISTERIO DE JUSTICIA.', '28', '23/02/1949', '187', '', 'www.uniandes.edu.co', 'S', '09/01/2015', '582', '10'),
(60, 49, 28, b'1', '1814', 'UNIVERSIDAD AUTONOMA LATINOAMERICANA-UNAULA-', '890905456-9', 'Corporación', 'Privado', 'Universidad', 'Carrera 55A  49 - 51', '5112199', 'Resolución', 'GOBIERNO DEPARTAMENTAL DE ANTIOQUIA', '203', '30/10/1968', '30', '', 'www.unaula.edu.co', 'N', '', '', ''),
(61, 52, 6, b'1', '1815', 'CORPORACION UNIVERSIDAD PILOTO DE COLOMBIA', '860.022.382-3', 'Corporación', 'Privado', 'Universidad', 'Carrera  9  45A-44', '3322900', 'Resolución', 'MINISTERIO DE JUSTICIA.', '3681', '27/11/1962', '37', '', 'www.unipiloto.edu.co', 'S', '27/09/2021', '18115', '4'),
(62, 52, 6, b'1', '1818', 'UNIVERSIDAD COOPERATIVA DE COLOMBIA', '860.029.924-7', 'Corporación', 'Privado', 'Universidad', 'Av. Caracas  No. 44-21, Recibo Correspondencia: Av. Caracas No. 37-63', '3323565', 'No informa', 'SIN DATO', 'SIN DATO', '19/03/2007', '152', '', 'www.ucc.edu.co', 'N', '', '', ''),
(63, 72, 7, b'1', '1823', 'UNIVERSIDAD AUTONOMA DE BUCARAMANGA-UNAB-', '890.200.499-9', 'Corporación', 'Privado', 'Universidad', 'Calle 48  39-234', '6436111', 'Resolución', 'MINISTERIO DE JUSTICIA', '3284', '21/12/1956', '118', '5', 'www.unab.edu.co', 'S', '25/05/2017', '10820', '6'),
(64, 51, 4, b'1', '1824', 'UNIVERSIDAD METROPOLITANA', '890.105.361-5', 'Corporación', 'Privado', 'Universidad', 'Calle 76 No. 42-78', '3587889', 'Resolución', 'MINISTERIO DE JUSTICIA', '1052', '25/02/1974', '23', '', 'www.unimetro.edu.co', 'N', '', '', ''),
(65, 55, 26, b'1', '1825', 'UNIVERSIDAD AUTONOMA DE MANIZALES', '890.805.051-0', 'Corporación', 'Privado', 'Universidad', 'Antigua Estacion del Ferocarril', '8727272', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1549', '25/02/1981', '68', '7', 'www.autonoma.edu.co', 'S', '06/09/2019', '9527', '6'),
(66, 52, 6, b'1', '1826', 'UNIVERSIDAD ANTONIO NARIÑO', '860.056.070-7', 'Corporación', 'Privado', 'Universidad', 'Carrera 38  58 A 77', '3152973', 'Resolución', 'Ministerio de Educaci¿n Nacional', '4571', '24/05/1977', '154', '1', 'www.uan.edu.co', 'S', '22/04/2019', '4141', '4'),
(67, 55, 26, b'1', '1827', 'UNIVERSIDAD CATOLICA DE MANIZALES', '890806477-9', 'Corporación', 'Privado', 'Universidad', 'Carrera 23  60-63', '8933050', 'Decreto', 'ARQUIDIOCESIS DE MANIZALES', '271', '19/06/1962', '34', '2', 'www.ucm.edu.co', 'S', '09/12/2019', '13600', '4'),
(68, 75, 10, b'1', '1828', 'UNIVERSIDAD ICESI', '890.316.745-5', 'Corporación', 'Privado', 'Universidad', 'Calle 18 No.122-135 (Pance)', '5552369', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '11677', '12/07/1979', '128', '1', 'www.icesi.edu.co', 'S', '10/12/2021', '23652', '8'),
(69, 75, 10, b'1', '1830', 'UNIVERSIDAD AUTONOMA DE OCCIDENTE', '890.305.881-1', 'Corporación', 'Privado', 'Universidad', 'Calle 25 115 - 85  Km. 2 Vía Jamundí', '3188000', 'Resolución', 'GOBERNACION DEL VALLE', '618', '20/02/1970', '134', '2', 'www.uao.edu.co', 'S', '30/11/2021', '23002', '4'),
(70, 74, 24, b'1', '1831', 'UNIVERSIDAD DE IBAGUE', '890.704.382-1', 'Corporación', 'Privado', 'Universidad', 'Barrio Ambala, Carrera 22 Calle 67', '2760010', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1867', '27/02/1981', '32', '5', 'www.unibague.edu.co', 'S', '03/10/2019', '10440', '4'),
(71, 53, 11, b'1', '1832', 'UNIVERSIDAD TECNOLOGICA DE BOLIVAR', '890401962', 'Corporación', 'Privado', 'Universidad', 'Campus de Ternera, Vía a Turbaco Km. 1', '6535200', 'Resolución', 'GOBERNACION DEL DEPARTAMENTO DE BOLIVAR', '961', '26/10/1970', '72', '3', 'www.unitecnologica.edu.co', 'S', '24/04/2019', '4182', '4'),
(72, 59, 30, b'1', '1833', 'UNIVERSIDAD DEL SINU - ELIAS BECHARA ZAINUM - UNISINU -', '891.000.692-1', 'Corporación', 'Privado', 'Universidad', 'Carrera 1W Calle 38 Barrio Juan XXIII', '7840340', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '12154', '27/10/1977', '54', '1', 'www.unisinu.edu.co', 'S', '13/06/2019', '6197', '4'),
(73, 52, 6, b'1', '1835', 'UNIVERSIDAD DE CIENCIAS APLICADAS Y AMBIENTALES - UDCA', '860.403.721.2', 'Corporación', 'Privado', 'Universidad', 'Calle 222  54-37', '6684700', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '7392', '20/05/1983', '48', '', 'www.udca.edu.co', 'S', '27/12/2019', '17390', '4'),
(74, 52, 6, b'1', '2102', 'UNIVERSIDAD NACIONAL ABIERTA Y A DISTANCIA UNAD', '860.512.780-4', 'Nacional', 'Oficial', 'Universidad', 'Calle 14 No 14-23 Sur', '3443700', 'Ley', 'Congreso de Colombia', '52', '07/07/1981', '81', '', 'www.unad.edu.co', 'S', '29/12/2021', '25081', '4'),
(75, 52, 6, b'1', '2104', 'ESCUELA SUPERIOR DE ADMINISTRACION PUBLICA-ESAP-', '899.999.054-7', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 44 # 53 - 37 CAN', '2202790', 'Ley', 'Congreso de la Republica', '19', '18/12/1958', '26', '', 'www.esap.edu.co', 'N', '', '', ''),
(76, 52, 6, b'1', '2106', 'DIRECCION NACIONAL DE ESCUELAS', '900373379-0', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Transversal 33 47A-35 Sur Barrio F¿tima', '3159136', 'Ley', 'Congreso de Colombia', '14', '08/09/1919', '63', '', 'www.policia.edu.co', 'S', '01/03/2022', '2286', '4'),
(77, 49, 28, b'1', '2110', 'COLEGIO MAYOR DE ANTIOQUIA', '890.980.134-1', 'Municipal', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 65  77-126 Robledo', '4225252', 'Ley', 'Congreso de Colombia', '48', '17/12/1945', '20', '4', 'www.colmayor.edu.co', 'S', '17/07/2020', '13165', '6'),
(78, 75, 10, b'1', '2114', 'ESCUELA NACIONAL DEL DEPORTE', '805001868', 'Municipal', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle  9  34-01', '566411', 'Decreto', 'Gobierno Nacional.', '3115', '21/12/1984', '15', '', 'www.endeporte.edu.co', 'N', '', '', ''),
(79, 75, 10, b'1', '2206', 'INSTITUTO DEPARTAMENTAL DE BELLAS ARTES', '890.325.989-3', 'Departamental', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Avenida 2a. Norte  7N-28', '4883030', 'Ordenanza', 'Asamblea Departamental del Valle', '8', '16/09/1936', '4', '1', 'www.bellasartes.edu.co', 'N', '', '', ''),
(80, 72, 3, b'1', '2207', 'INSTITUTO UNIVERSITARIO DE LA PAZ', '800.024.581-3', 'Departamental', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Centro de Investigaciones Santa Lucia, Kim. 14, via Bucaramanga,', '6025185', 'No informa', 'Gobernacion de Santander', '331', '19/11/1987', '26', '2', 'www.unipaz.edu.co', 'N', '', '', ''),
(81, 74, 24, b'1', '2208', 'CONSERVATORIO DEL TOLIMA', '890.700.906-0', 'Departamental', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 9  1-18', '2613118', 'Ordenanza', 'Asamblea del Tolima.', '42', '10/12/1980', '5', '', 'www.conservatoriodeltolima.edu.co', 'N', '', '', ''),
(82, 49, 28, b'1', '2209', 'POLITECNICO COLOMBIANO JAIME ISAZA CADAVID', '890.980.136-6', 'Departamental', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 48  7-151', '3105133', 'Decreto', 'Gobierno Departamental de Antioquia', '33', '27/01/1964', '52', '3', 'www.politecnicojic.edu.co', 'N', '', '', ''),
(83, 53, 11, b'1', '2211', 'INSTITUCION UNIVERSITARIA BELLAS ARTES Y CIENCIAS DE BOLIVAR', '890.480.308-0', 'Departamental', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 9 No.39-12', '6600391', 'Ordenanza', 'Asamblea Departamental de Bolivar.', '35', '03/12/1990', '6', '1', 'www.unibac.edu.co', 'N', '', '', ''),
(84, 75, 57, b'1', '2301', 'UNIDAD CENTRAL DEL VALLE DEL CAUCA', '891.900.853-0', 'Municipal', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 27 A No.48-144 Km.1 salida Sur Tulu¿', '2242200', 'Acuerdo', 'Concejo Municipal de Tulua.', '24', '30/06/1971', '24', '', 'www.uceva.edu.co', 'N', '', '', ''),
(85, 49, 17, b'1', '2302', 'INSTITUCION UNIVERSITARIA DE ENVIGADO', '811.000.278-2', 'Municipal', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Cra. 27B N¿ 39 A sur 57', '3391010', 'Acuerdo', 'Concejo Municipal de Envigado.', '44', '19/03/2007', '30', '2', 'www.iue.edu.co', 'N', '', '', ''),
(86, 52, 6, b'1', '2701', 'INSTITUCION UNIVERSITARIA COLEGIOS DE COLOMBIA - UNICOC', 'NO INFORMA', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 9  13-40 Piso 4', '6683535', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '1384', '01/04/1975', '23', '1', 'www.odontologico.edu.co', 'N', '', '', ''),
(87, 52, 6, b'1', '2702', 'FUNDACION UNIVERSITARIA DE CIENCIAS DE LA SALUD', '860051853-4', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 19  8A-32', '4375401', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '10917', '01/12/1976', '75', '1', 'www.fucsalud.edu.co', 'S', '09/12/2019', '13601', '4'),
(88, 52, 6, b'1', '2704', 'COLEGIO DE ESTUDIOS SUPERIORES DE ADMINISTRACION-CESA-', '860045740', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 35 No. 6-16', '3395300', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '5157', '29/08/1975', '13', '', 'www.cesa.edu.co', 'S', '25/11/2019', '12334', '4'),
(89, 52, 6, b'1', '2707', 'FUNDACIÓN UNIVERSITARIA JUAN N. CORPAS', '860.038.374-4', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 111 No. 159 A 61 (Av. Corpas Km. 3 Suba)', '6813085', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '2105', '29/03/1974', '15', '', 'www.juancorpas.edu.co', 'S', '27/09/2021', '18142', '6'),
(90, 49, 28, b'1', '2708', 'UNIVERSIDAD CES', '890.984.002-6', 'Fundación', 'Privado', 'Universidad', 'Calle 10A  22-04', '4440555', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '11154', '04/08/1978', '118', '5', 'www.ces.edu.co', 'S', '09/12/2019', '13602', '6'),
(91, 52, 6, b'1', '2709', 'FUNDACION UNIVERSITARIA SAN MARTIN', '860.503.634-9', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 18 No. 80-45', '5301001', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '12387', '18/08/1981', '20', '2', 'www.sanmartin.edu.co', 'N', '', '', ''),
(92, 52, 6, b'1', '2710', 'FUNDACION UNIVERSITARIA MONSERRATE -UNIMONSERRATE', '860.513.077-9', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 72  11-41', '2494959', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '1381', '03/02/1983', '17', '', 'www.unimonserrate.edu.co', 'N', '', '', ''),
(93, 71, 36, b'1', '2711', 'UNIVERSIDAD CATOLICA DE PEREIRA', '891408261', 'Fundación', 'Privado', 'Universidad', 'Avenida de las Américas Cra. 21  49-95', '3124000', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '10918', '01/12/1976', '44', '3', 'www.ucpr.edu.co', 'N', '', '', ''),
(94, 52, 6, b'1', '2712', 'FUNDACION UNIVERSITARIA KONRAD LORENZ', '860.504.759-5', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 9 Bis  62-43', '3472311', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '18537', '04/11/1981', '18', '', 'www.konradlorenz.edu.co', 'N', '', '', ''),
(95, 52, 6, b'1', '2713', 'FUNDACION UNIVERSITARIA LOS LIBERTADORES', 'NO INFORMA', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 16  63A-68', '2544750', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '7542', '18/05/1982', '58', '', 'No disponible', 'N', '', '', ''),
(96, 58, 37, b'1', '2715', 'FUNDACION UNIVERSITARIA DE POPAYAN', '891.501.835-6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Los Robles Km.. 8 vía al Sur', '8238025', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '10161', '28/06/1983', '31', '', 'www.fup.edu.co', 'N', '', '', ''),
(97, 49, 28, b'1', '2719', 'UNIVERSIDAD CATÓLICA LUIS AMIGÓ', '890.985.189-9', 'Fundación', 'Privado', 'Universidad', 'Transversal  51A  67B - 90', '4487666', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '17701', '09/11/1984', '84', '', 'www.ucatolicaluisamigo.edu.co', 'N', '', '', ''),
(98, 54, 58, b'1', '2720', 'FUNDACION UNIVERSITARIA JUAN DE CASTELLANOS', '800057330 -3', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 11 11-16', '7470333', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '2085', '24/03/1987', '40', '', 'www.jdc.edu.co', 'N', '', '', ''),
(99, 49, 28, b'1', '2721', 'FUNDACION UNIVERSITARIA MARIA CANO', '800.036.781-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 56  41-90', '4025500', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '17996', '17/11/1987', '27', '2', 'www.fumc.edu.co', 'N', '', '', ''),
(100, 58, 39, b'1', '2722', 'FUNDACION CENTRO UNIVERSITARIO DE BIENESTAR RURAL', '800053190-0', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Vereda Periconegro', '', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '9111', '11/07/1988', '', '', 'www.cubr.edu.co', 'N', '', '', ''),
(101, 52, 6, b'1', '2723', 'FUNDACION UNIVERSITARIA AGRARIA DE COLOMBIA -UNIAGRARIA-', '860531081-5', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 170 No. 54 A -10', '6671515', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '2599', '13/03/1986', '21', '', 'www.uniagraria.edu.co', 'N', '', '', ''),
(102, 72, 47, b'1', '2724', 'FUNDACION UNIVERSITARIA DE SAN GIL - UNISANGIL -', '800.152.840-4', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Km. 2  via San Gil - Charal¿', '7245757', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '10989', '18/10/1991', '38', '8', 'www.unisangil.edu.co', 'N', '', '', ''),
(103, 52, 6, b'1', '2725', 'POLITECNICO GRANCOLOMBIANO', '860.078.643-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 57  3-00 Este', '7455555', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '19349', '04/11/1980', '119', '', 'www.poli.edu.co', 'N', '', '', ''),
(104, 49, 45, b'1', '2727', 'FUNDACION UNIVERSITARIA-CEIPA-', '890910961-7', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 77 sur No. 40 -165', '3056100', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '6266', '04/05/1983', '28', '', 'www.ceipa.edu.co', 'S', '21/01/2022', '679', '4'),
(105, 52, 6, b'1', '2728', 'FUNDACION UNIVERSITARIA DEL AREA ANDINA', '860.517.302-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Clle 71 No. 13-21', '3458443', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '22215', '09/12/1983', '82', '', 'https://www.areandina.edu.co/', 'S', '27/07/2021', '13718', '4'),
(106, 52, 6, b'1', '2730', 'FUNDACION ESCUELA COLOMBIANA DE REHABILITACION', '830.011.184-5', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Avenida Cra. 15   151-68', '6270649', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '5090', '03/11/1995', '10', '', 'www.ecr.edu.co', 'N', '', '', ''),
(107, 75, 10, b'1', '2731', 'FUNDACION UNIVERSITARIA CATOLICA LUMEN GENTIUM - UNICATÓLICA - CALI', '800.185.664-6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 122  12 - 459 Pance', '5552767', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '944', '19/03/1996', '25', '2', 'www.unicatolica.edu.co', 'N', '', '', ''),
(108, 49, 53, b'1', '2732', 'FUNDACION UNIVERSITARIA CATOLICA DEL NORTE', '811.010.001-2', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 21  34B -  07', '8609822', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '1671', '20/05/1997', '28', '8', 'www.ucn.edu.co', 'N', '', '', ''),
(109, 52, 6, b'1', '2733', 'FUNDACIÓN UNIVERSITARIA SAN ALFONSO- FUSA-', '830.081.981 -8', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 37  22 - 47', '2445053', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '3296', '07/12/2000', '6', '', 'www.fusa.edu.co', 'N', '', '', ''),
(110, 49, 28, b'1', '2736', 'FUNDACION UNIVERSITARIA SEMINARIO BIBLICO DE COLOMBIA - FUSBC', '811026923', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 76 No. 87 - 14', '2640303', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '3298', '07/12/2000', '3', '', 'www.unisbc.edu.co', 'N', '', '', ''),
(111, 52, 6, b'1', '2738', 'FUNDACION UNIVERSITARIA EMPRESARIAL DE LA CAMARA DE COMERCIO DE BOGOTA- UNIEMPRESARIAL', '830.084.876.6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 33 A No.30-20', '5082244', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '598', '02/04/2001', '16', '', 'www.uniempresarial.edu.co', 'N', '', '', ''),
(112, 49, 1, b'1', '2739', 'FUNDACION DE ESTUDIOS SUPERIORES UNIVERSITARIOS DE URABA ANTONIO ROLDAN BETANCUR', '811028521-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 111  101-64 Barrio Los Pinos', '8286999', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '596', '02/04/2001', '7', '1', 'www.fesu.edu.co', 'N', '', '', ''),
(113, 52, 6, b'1', '2740', 'INSTITUCION UNIVERSITARIA COLOMBO AMERICANA - UNICA', '830088283', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Avenida 19  2-49 Piso 2', '2811777', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '849', '08/05/2001', '3', '', 'www.unica.edu.co', 'N', '', '', ''),
(114, 74, 18, b'1', '2741', 'FUNDACION DE ESTUDIOS SUPERIORES - MONSEÑOR ABRAHAM ESCUDERO MONTOYA  - FUNDES', '809008799-7', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 7  10-37', '2485862', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '1495', '23/07/2001', '5', '', 'www.fundes.edu.co', 'N', '', '', ''),
(115, 57, 61, b'1', '2743', 'UNIVERSIDAD INTERNACIONAL DEL TRÓPICO AMERICANO', '844.002.071 -4', 'Departamental', 'Oficial', 'Universidad', 'Carrera 19  39 - 40', '6320700', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1311', '11/06/2002', '24', '', 'www.unitropico.edu.co', 'N', '', '', ''),
(116, 67, 34, b'1', '2744', 'UNIVERSIDAD CESMAG - UNICESMAG', '800109387-7', 'Fundación', 'Privado', 'Universidad', 'Carrera 20A  14-54', '7206859', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '10735', '26/06/1982', '20', '1', 'www.iucesmag.edu.co', 'N', '', '', ''),
(117, 52, 6, b'1', '2745', 'FUNDACIÓN UNIVERSITARIA COMPENSAR', '860.506.140-6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Av. 32   17-30', '3380606', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '23635', '23/12/1981', '90', '', 'www.unipanamericana.edu.co', 'N', '', '', ''),
(118, 52, 6, b'1', '2746', 'FUNDACION UNIVERSITARIA SANITAS', '830.113.458 - 6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 170 # 08-41', '5895377', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '3015', '23/12/2002', '30', '', 'www.unisanitas.edu.co', 'N', '', '', ''),
(119, 49, 28, b'1', '2747', 'INSTITUCIÓN UNIVERSITARIA VISIÓN DE LAS AMÉRICAS', '890.985.417-3', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Circular 73  35 -04', '4114848', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '12998', '12/08/1985', '30', '', 'www.uam.edu.co', 'N', '', '', ''),
(120, 75, 10, b'1', '2748', 'FUNDACION UNIVERSITARIA SEMINARIO TEOLOGICO BAUTISTA INTERNACIONAL', '805.027.579-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 56 (Av. Guadalupe)  1B-112', '5132320', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1427', '24/06/2003', '4', '', 'www.funibautista.edu.co', 'N', '', '', ''),
(121, 49, 28, b'1', '2749', 'INSTITUCION UNIVERSITARIA  SALAZAR Y HERRERA', '811028188-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 70  52-49 Barrio Los Colores', '4600700', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '1104', '17/04/1997', '32', '', 'www.iush.edu.co', 'N', '', '', ''),
(122, 51, 4, b'1', '2805', 'UNIVERSIDAD SIMON BOLIVAR', '890.104.633-9', 'Corporación', 'Privado', 'Universidad', 'Carrera 59 No.59-92', '3441265', 'Resolución', 'GOBERNACION DEL ATLANTICO.', '1318', '15/11/1972', '120', '1', 'www.unisimonbolivar.edu.co', 'S', '25/08/2021', '15867', '8'),
(123, 51, 4, b'1', '2810', 'CORPORACION UNIVERSIDAD DE LA COSTA CUC', '890.104.530-9', 'Corporación', 'Privado', 'Universidad', 'Calle 58  55-66', '3440983', 'Resolución', 'GOBERNACION DEL ATLANTICO', '352', '23/04/1971', '110', '', 'www.cuc.edu.co', 'S', '06/09/2019', '9521', '4'),
(124, 52, 6, b'1', '2811', 'UNIVERSIDAD ESCUELA COLOMBIANA DE INGENIERIA JULIO GARAVITO', '860034811', 'Corporación', 'Privado', 'Universidad', 'AK 45  205-59 (Autopista Norte - Km.13)', '6683600', 'Resolución', 'MINISTERIO DE JUSTICIA.', '86', '19/01/1973', '33', '2', 'www.escuelaing.edu.co', 'S', '18/03/2019', '2710', '6'),
(125, 52, 6, b'1', '2812', 'UNIVERSIDAD EAN', '860026058', 'Corporación', 'Privado', 'Universidad', 'Carrera 11 No 78-47', '5936160', 'Resolución', 'MINISTERIO DE JUSTICIA', '2898', '16/05/1969', '112', '', 'www.ean.edu.co', 'S', '10/12/2021', '23654', '6'),
(126, 49, 17, b'1', '2813', 'UNIVERSIDAD EIA', '890.983.722-6', 'Corporación', 'Privado', 'Universidad', 'Calle 25 Sur  42-73', '3317850', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '20120', '12/11/1979', '34', '3', 'www.eia.edu.co', 'S', '18/12/2017', '28480', '6'),
(127, 49, 28, b'1', '2815', 'CORPORACION UNIVERSITARIA ADVENTISTA - UNAC', 'No Informa', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Cra 84 No. 33 AA - 01', '2508328', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '8529', '06/06/1983', '19', '', 'www.unac.edu.co', 'N', '', '', ''),
(128, 71, 52, b'1', '2818', 'CORPORACION UNIVERSITARIA DE SANTA ROSA DE CABAL-UNISARC-', '891.409.768-8', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Cra. 14  27-80 Santa Rosa de Cabal', '643000', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '6387', '03/05/1982', '20', '', 'www.unisarc.edu.co', 'N', '', '', ''),
(129, 49, 9, b'1', '2820', 'CORPORACION UNIVERSITARIA LASALLISTA', '890.984.812-5', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera  51  118 Sur-57', '3000200', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '9887', '22/06/1983', '19', '1', 'www.lasallista.edu.co', 'N', '', '', ''),
(130, 52, 6, b'1', '2822', 'ESCUELA SUPERIOR DE OFTALMOLOGIA, INSTITUTO BARRAQUER DE AMERICA', '860.054.986-9', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Avenida  Calle 100  18A - 51, Oficina 306', '6449552', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1590', '25/02/1977', '1', '', 'www.institutobarraquer.com', 'N', '', '', ''),
(131, 73, 55, b'1', '2823', 'CORPORACION UNIVERSITARIA DEL CARIBE - CECAR', '892.201.263-1', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carretera Troncal Occidente Vía Corozal', '2804011', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '7786', '05/06/1978', '53', '1', 'www.cecar.edu.co', 'N', '', '', ''),
(132, 52, 6, b'1', '2824', 'CORPORACION UNIVERSITARIA DE COLOMBIA IDEAS', '860524958', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 69  No. 10A-¿36', '6061102', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '22185', '18/12/1984', '1', '', 'www.ideas.edu.co', 'N', '', '', ''),
(133, 53, 11, b'1', '2825', 'CORPORACION UNIVERSITARIA RAFAEL NUÑEZ', '890.481.276-8', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Edificio Rafael Nuñez, Centro Calle de la Soledad No. 5-70', '6607777', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '6644', '05/06/1985', '22', '', 'www.curn.edu.co', 'N', '', '', ''),
(134, 66, 60, b'1', '2827', 'CORPORACION UNIVERSITARIA DEL META - UNIMETA', '892.099.267-1', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 33 No. 34-06 Edificio H¿roes del Pantano de Vargas', '6624080', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '12249', '05/08/1985', '28', '', 'www.unimeta.edu.co', 'N', '', '', ''),
(135, 63, 31, b'1', '2828', 'CORPORACION UNIVERSITARIA DEL HUILA-CORHUILA-', '800.107.584-2', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 21  6-01', '8754220', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '21000', '22/12/1989', '15', '1', 'www.corhuila.edu.co', 'N', '', '', ''),
(136, 52, 6, b'1', '2829', 'CORPORACION UNIVERSITARIA MINUTO DE DIOS -UNIMINUTO-', '800.116.217-2', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 81 B No. 72 B - 70', '2916520', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '10345', '01/08/1990', '177', '', 'www.uniminuto.edu', 'N', '', '', ''),
(137, 52, 6, b'1', '2830', 'CORPORACION UNIVERSITARIA IBEROAMERICANA', '860.503.837-7', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 67   5-27', '3489292', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '428', '28/01/1982', '54', '', 'https://www.ibero.edu.co/', 'N', '', '', ''),
(138, 52, 6, b'1', '2831', 'CORPORACION UNIVERSITARIA DE CIENCIA Y DESARROLLO - UNICIENCIA', '830018780-7', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 74  15-73', '3220055', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '20', '05/01/1996', '17', '', 'www.uniciencia.edu.co', 'N', '', '', ''),
(139, 72, 7, b'1', '2832', 'UNIVERSIDAD DE SANTANDER - UDES', '804001890-1', 'Corporación', 'Privado', 'Universidad', 'Calle 70 No. 55-210 Lagos del Cacique', '6516500', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '810', '12/03/1996', '106', '2', 'www.udes.edu.co', 'S', '10/12/2021', '23656', '6'),
(140, 49, 28, b'1', '2833', 'CORPORACION UNIVERSITARIA REMINGTON', '811005425-1', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 51  51-27, Edificio Coltabaco, Torre 1', '5111000', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '2661', '21/06/1996', '98', '', 'www.remington.edu.co', 'N', '', '', ''),
(141, 52, 6, b'1', '2834', 'UNIVERSITARIA AGUSTINIANA- UNIAGUSTINIANA', 'NO INFORMA', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Av Ciudad de Cali No 11B-95', '4193200', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '6651', '26/12/1996', '26', '', 'www.uniagustiniana.edu.co', 'N', '', '', ''),
(142, 51, 4, b'1', '2836', 'CORPORACION UNIVERSITARIA EMPRESARIAL DE SALAMANCA', '819003405', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 50  79 - 155', '4242226', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '3062', '02/12/1999', '9', '', 'www.cunivemsa.edu.co', 'N', '', '', ''),
(143, 52, 6, b'1', '2837', 'CORPORACION UNIVERSITARIA REPUBLICANA', '830.065.186-1', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 7  19-38', '2862384', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '3061', '02/12/1999', '28', '', 'www.urepublicana.edu.co', 'N', '', '', ''),
(144, 49, 28, b'1', '2838', 'CORPORACION COLEGIATURA COLOMBIANA', '811024158', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Km 7. Vía Las Palmas', '3547120', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '1989', '11/07/2000', '10', '', 'www.colegiatura.edu.co', 'N', '', '', ''),
(145, 70, 2, b'1', '2840', 'CORPORACION UNIVERSITARIA EMPRESARIAL ALEXANDER VON HUMBOLDT - CUE', 'no disponible', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Avenida Bolivar #1-189', '7450025', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '439', '14/03/2001', '11', '7', 'www.uempresarial@cue.edu.co', 'N', '', '', ''),
(146, 51, 4, b'1', '2842', 'CORPORACION UNIVERSITARIA REFORMADA - CUR -', '802017254-8', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 38 74-179', '3680130', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1021', '14/05/2002', '18', '', 'www.unireformada.edu.co', 'N', '', '', ''),
(147, 72, 7, b'1', '2847', 'UNIVERSIDAD DE INVESTIGACION Y DESARROLLO - UDI', '890.212.433-5', 'Corporación', 'Privado', 'Universidad', 'Calle 9  23-55', '6352525', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '22195', '20/12/1985', '53', '', 'www.udi.edu.co', 'N', '', '', ''),
(148, 52, 6, b'1', '2848', 'CORPORACION UNIVERSITARIA  UNITEC', '860.510.627-6', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 76   12-58', '5939393', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '2012', '02/03/1982', '38', '', 'www.unitec.edu.co', 'N', '', '', ''),
(149, 58, 37, b'1', '2849', 'CORPORACION UNIVERSITARIA AUTONOMA DEL CAUCA', '891.501.766-6', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 5  3-85', '8213000', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '13002', '30/08/1984', '23', '', 'www.uniautonoma.edu.co', 'N', '', '', ''),
(150, 73, 55, b'1', '2850', 'CORPORACION UNIVERSITARIA ANTONIO JOSE DE SUCRE - CORPOSUCRE', '823.004.609 D.V.9', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 21 25-59 La María', '2812282', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '2302', '26/09/2003', '34', '', 'www.corposucre.edu.co', 'N', '', '', ''),
(151, 52, 6, b'1', '2901', 'ESCUELA DE INTELIGENCIA Y CONTRAINTELIGENCIA BRIGADIER GENERAL RICARDO CHARRY SOLANO', '800131292', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 8a No. 101-33', '6017515', 'No informa', 'Ministerio de Defensa', '20', '02/11/1964', '8', '', 'www.esici.edu.co', 'N', '', '', ''),
(152, 52, 6, b'1', '2902', 'ESCUELA DE LOGISTICA', '800131180', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 11 Sur  10-50 Este, San Cristóbal', '3370207', 'No informa', 'Ministerio de Defensa', '15', '28/12/1995', '3', '', 'No disponible', 'N', '', '', ''),
(153, 52, 6, b'1', '2904', 'ESCUELA SUPERIOR DE GUERRA GENERAL RAFAEL REYES PRIETO', '830002634-1', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 11 102-50', '6204066', 'Decreto', 'Presidencia de la Repúiblica', '453', '01/05/1909', '6', '', 'www.esdegue.mil.co', 'N', '', '', ''),
(154, 52, 6, b'1', '2905', 'CENTRO DE EDUCACION MILITAR - CEMIL', '830028487', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 102 7-80', '6208549', 'No informa', 'Comando del Ejército Nacional', '10', '23/11/1999', '10', '1', 'www.cemil.mil.co', 'N', '', '', ''),
(155, 52, 6, b'1', '2906', 'ESCUELA DE POSTGRADOS DE LA FUERZA AEREA COLOMBIANA CAPITAN JOSE EDMUNDO SANDOVAL - EPFAC', '830.030.378 - 8', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 11 102 - 50 Edificio ESDEGUE, Of.412', '6204066', 'Resolución', 'Ministerio de Educacion Nacional', '1906', '05/08/2002', '4', '', 'www.ima.edu.co', 'N', '', '', ''),
(156, 68, 33, b'1', '3102', 'INSTITUTO SUPERIOR DE EDUCACION RURAL-ISER-', '890501578', 'Departamental', 'Oficial', 'Institución Tecnológica', 'Calle  8   No.8-155', '682597', 'Decreto', 'Gobierno Nacional.', '2365', '18/09/1956', '12', '', 'www.iser.edu.co', 'N', '', '', ''),
(157, 53, 11, b'1', '3103', 'INSTITUCIÓN UNIVERSITARIA MAYOR DE CARTAGENA', '890.480.054-5', 'Municipal', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle de la Factor¿a  35-95', '6644060', 'Ley', 'Congreso', '48', '17/12/1945', '17', '', 'www.colmayorbolivar.edu.co', 'N', '', '', ''),
(158, 58, 37, b'1', '3104', 'COLEGIO MAYOR DEL CAUCA', '891500759-1', 'Departamental', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Cra.5#5-40 (SEDE PPAL), Calle 3#6-42 (CASA OB', '8241109', 'No informa', 'Ministerio de Educacion Nacional', '524', '15/12/1966', '15', '', 'www.colmayorcauca.edu.co', 'N', '', '', ''),
(159, 49, 28, b'1', '3107', 'INSTITUCIÓN UNIVERSITARIA PASCUAL BRAVO', '890980153', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 73 No. 73A-226', '4480520', 'Decreto', 'Gobierno Nacional', '108', '18/01/1950', '40', '', 'www.pascualbravo.edu.co', 'N', '', '', ''),
(160, 51, 4, b'1', '3114', 'ESCUELA NAVAL DE SUBOFICIALES ARC BARRANQUILLA', 'NO INFORMA', 'Nacional', 'Oficial', 'Institución Tecnológica', 'Vía 40 Calle 58', '3444410', 'No informa', 'Ministerio de Defensa', '743', '14/02/1992', '21', '', 'www.armada.mil.co', 'S', '11/03/2022', '3319', '4'),
(161, 69, 29, b'1', '3115', 'INSTITUTO TECNOLOGICO DEL PUTUMAYO', '800.247.940-1', 'Departamental', 'Oficial', 'Institución Tecnológica', 'Barrio la Esmeralda aire libre', '4296105', 'Ley', 'Congreso de la Republica.', '65', '11/12/1989', '26', '', 'www.itp.edu.co', 'N', '', '', ''),
(162, 51, 4, b'1', '3117', 'INSTITUCIÓN UNIVERSITARIA ITSA', '802011065', 'Municipal', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Cra 45 N¿48-31 Barrio El Carmen, Barranquilla', '3112370', 'Ley', 'Congreso de la Republica.', '391', '23/07/1997', '45', '', 'www.itsa.edu.co', 'N', '', '', '');
INSERT INTO `institucion` (`id`, `id_departamento`, `id_municipio`, `activo`, `codigo`, `nom`, `nit`, `naturaleza_juridica`, `sector`, `caracter_academico`, `direccion`, `telefono`, `ente_emite_norma_creacion`, `acto_admin_norma_de_creacion`, `numero_norma_de_creacion`, `fecha_norma_creacion`, `programas_vigentes`, `programas_en_convenio`, `pagina_web`, `acreditada_alta_calidad`, `fecha_acreditacion`, `resolucion_acreditacion`, `vigencia_acreditacion`) VALUES
(163, 72, 7, b'1', '3201', 'UNIDADES TECNOLOGICAS DE SANTANDER', '890208727', 'Departamental', 'Oficial', 'Institución Tecnológica', 'Calle de los Estudiantes No.9 - 82', '6413000', 'Ordenanza', 'Asamblea Departamental de Santander', '90', '23/12/1963', '44', '', 'www.uts.edu.co', 'N', '', '', ''),
(164, 49, 28, b'1', '3204', 'TECNOLOGICO DE ANTIOQUIA', '890905419-6', 'Departamental', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 78B  72A-220', '4443700', 'Decreto', 'Gobierno Departamental de Antioquia', '262', '28/02/1979', '51', '2', 'www.tdea.edu.co', 'S', '17/07/2020', '13167', '8'),
(165, 75, 10, b'1', '3301', 'INSTITUCION UNIVERSITARIA ANTONIO JOSE CAMACHO', '805.000.889-0', 'Municipal', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Av. 6ª  28N-102 Barrio San Vicente', '6882828', 'Acuerdo', 'Concejo Municipal de Cali.', '29', '21/12/1993', '42', '', 'www.uniaj.edu.co', 'N', '', '', ''),
(166, 49, 28, b'1', '3302', 'INSTITUTO TECNOLOGICO METROPOLITANO', '800214750-7', 'Municipal', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 73 NO. 76A-354 Vía al Volador', '4405100', 'Acuerdo', 'Concejo Municipal', '42', '18/09/1991', '56', '', 'www.itm.edu.co', 'S', '24/07/2020', '13595', '8'),
(167, 49, 17, b'1', '3303', 'ESCUELA SUPERIOR TECNOLOGICA DE ARTES DEBORA ARANGO', '811.042.967-9', 'Municipal', 'Oficial', 'Institución Tecnológica', 'Calle 39 Sur  39 - 08', '3330381', 'Acuerdo', 'Honorable Consejo Superior de Envigado.', '38', '25/09/2003', '15', '', 'www.ladebora.edu.co', 'N', '', '', ''),
(168, 52, 6, b'1', '3702', 'FUNDACION TECNOLOGICA AUTONOMA DE BOGOTA-FABA-', 'NO INFORMA', 'Fundación', 'Privado', 'Institución Tecnológica', 'Carrera 14   80 - 35', '6913862', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '6845', '27/08/1976', '8', '', 'www.faba.edu.co', 'N', '', '', ''),
(169, 49, 28, b'1', '3703', 'INSTITUCION UNIVERSITARIA ESCOLME', 'NO INFORMA', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 50   40-39', '2161700', 'Resolución', 'GOBIERNO DEPARTAMENTAL DE ANTIOQUIA', '126', '16/09/1970', '17', '2', 'www.escolme.edu.co', 'N', '', '', ''),
(170, 53, 11, b'1', '3705', 'FUNDACION UNIVERSITARIA TECNOLOGICO COMFENALCO - CARTAGENA', '890.481.183-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 44 D  30 A-91', '6723700', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '9299', '13/07/1984', '43', '4', 'www.tecnologicocomfenalco.edu.co', 'N', '', '', ''),
(171, 75, 10, b'1', '3706', 'FUNDACION CENTRO COLOMBIANO DE ESTUDIOS PROFESIONALES, -F.C.E.C.E.P.', 'NO INFORMA', 'Fundación', 'Privado', 'Institución Tecnológica', 'Calle 9B  29A-67 Champag?at', '6842424', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '11967', '21/08/1984', '15', '', 'www.cecep.edu.co', 'N', '', '', ''),
(172, 53, 11, b'1', '3710', 'FUNDACION UNIVERSITARIA ANTONIO DE AREVALO - UNITECNAR', '890481264', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle del Cuartel 36-54', '6600671', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '322', '23/01/1985', '87', '', 'www.tecnar.edu.co', 'S', '10/12/2019', '13660', '4'),
(173, 52, 6, b'1', '3712', 'FUNDACION CENTRO DE INVESTIGACION DOCENCIA Y CONSULTORIA ADMINISTRATIVA-F-CIDCA-', '86040457', 'Fundación', 'Privado', 'Institución Tecnológica', 'Calle 61  11-09 , sede Carrera 18  38-19', '3472927', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '4124', '24/04/1984', '19', '', 'www.cidca.edu.co.', 'N', '', '', ''),
(174, 52, 6, b'1', '3713', 'FUNDACION UNIVERSITARIA PARA EL DESARROLLO HUMANO - UNINPAHU', '860504360', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Avenida 39  15-58', '3323500', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '16971', '09/10/1981', '19', '', 'www.inpahu.edu.co', 'N', '', '', ''),
(175, 75, 10, b'1', '3715', 'FUNDACION TECNOLOGICA AUTONOMA DEL PACIFICO', '800.147.711-2', 'Fundación', 'Privado', 'Institución Tecnológica', 'Avenida 3 Norte 44-100 Barrio La Merced', '6656575', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '10436', '10/04/1991', '11', '', 'www.tecnologicadelpacifico.edu.co', 'N', '', '', ''),
(176, 72, 7, b'1', '3716', 'TECNOLOGICA FITEC', '800.189.702-6', 'Fundación', 'Privado', 'Institución Tecnológica', 'Calle 58 32-16 Barrio Conucos', '6431301', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '5', '03/01/1992', '18', '', 'www.fitec.edu.co', 'N', '', '', ''),
(177, 68, 48, b'0', '3718', 'FUNDACION DE ESTUDIOS SUPERIORES COMFANORTE -F.E.S.C.-', '800.235.151-5', 'Fundación', 'Privado', 'Institución Tecnológica', 'Avenida 5#15-27 CENTRO', '5829292', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '4172', '25/08/1993', '31', '', 'www.fesc.edu.co', 'N', '', '', ''),
(178, 52, 6, b'1', '3719', 'INSTITUCION UNIVERSITARIA LATINA - UNILATINA', '860516428-4', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 46 No. 3-05', '5737488', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '8530', '06/06/1983', '10', '', 'www.unilatina.edu.co', 'N', '', '', ''),
(179, 49, 28, b'1', '3720', 'FUNDACION UNIVERSITARIA ESUMER', '890981796-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 76  80-126 Carretera al Mar', '2646011', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '2389', '12/05/1975', '27', '', 'www.esumer.edu.co', 'N', '', '', ''),
(180, 62, 25, b'1', '3724', 'FUNDACION TECNOLOGICA DE MADRID', '832.005.942-4', 'Fundación', 'Privado', 'Institución Tecnológica', 'Sede Administrativa:  Carrera 17 36-32 Bogotá', '7027455', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '1833', '21/08/2001', '', '', 'www.ftm.edu.co', 'N', '', '', ''),
(181, 52, 6, b'1', '3725', 'FUNDACION TECNOLOGICA ALBERTO MERANI', '900019885-1', 'Fundación', 'Privado', 'Institución Tecnológica', 'Carrera 10 No.23-32', '7426477', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1327', '20/04/2005', '10', '', 'www.tecnologicafusfa.edu.co', 'N', '', '', ''),
(182, 75, 12, b'1', '3801', 'CORPORACION DE ESTUDIOS TECNOLOGICOS DEL NORTE DEL VALLE', '891.401.313-4', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 10  3-95', '2111804', 'Resolución', 'GOBIERNO DEPARTAMENTAL DEL VALLE', '3712', '21/09/1971', '14', '1', 'www.cotecnova.edu.co', 'N', '', '', ''),
(183, 49, 28, b'1', '3802', 'CENTRO EDUCACIONAL DE COMPUTOS Y SISTEMAS-CEDESISTEMAS-', '890.982.606-5', 'Corporación', 'Privado', 'Institución Tecnológica', 'Carrera 48 A No. 16 Sur 86, Piso 6', '4440510', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '12571', '20/12/1976', '', '', 'www.cedesistemas.edu.co', 'N', '', '', ''),
(184, 75, 10, b'1', '3803', 'CORPORACION UNIVERSITARIA CENTRO SUPERIOR - UNICUCES', 'NO INFORMA', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 14 Norte  8N -35 Barrio Granada', '6671111', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '7464', '12/06/1978', '13', '', 'wwww.cecs.edu.co', 'N', '', '', ''),
(185, 75, 10, b'1', '3806', 'CORPORACION ESCUELA SUPERIOR DE ADMINISTRACION Y ESTUDIOS TECNOLOGICOS- EAE', '890309555-3', 'Corporación', 'Privado', 'Institución Tecnológica', 'Avenida 6N No. 23DN-16 Barrio Versalles', '6679911', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '4158', '09/07/1975', '5', '', 'www.eae.edu.co', 'N', '', '', ''),
(186, 49, 28, b'1', '3807', 'ESCUELA DE TECNOLOGIAS DE ANTIOQUIA -ETA-', '890.981.721-1', 'Corporación', 'Privado', 'Institución Tecnológica', 'Carrera 80B No. 32EE-61', '4445016', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '3745', '25/06/1975', '5', '', 'www.etdea.edu.co', 'N', '', '', ''),
(187, 52, 6, b'1', '3808', 'CORPORACION TECNOLOGICA DE BOGOTA - CTB', '860.404.351-5', 'Corporación', 'Privado', 'Institución Tecnológica', 'Carrera 21 53D-35', '3483061', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '6271', '10/05/1983', '9', '', 'www.ctb.edu.co', 'N', '', '', ''),
(188, 52, 6, b'1', '3809', 'INSTITUTO SUPERIOR DE CIENCIAS SOCIALES Y ECONOMICO FAMILIARES-ICSEF-', '860.032.286-7', 'Corporación', 'Privado', 'Institución Tecnológica', 'Diagonal 182 No. 20-17 Interior 6 Of. 521', '6167243', 'Resolución', 'MINISTERIO DE JUSTICIA', '1667', '15/06/1971', '4', '', 'www.icsef.edu.co', 'N', '', '', ''),
(189, 72, 7, b'1', '3810', 'CORPORACION EDUCATIVA -ITAE-', '890.203.706-2', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle de los Estudiantes  10-20 Ciudadela', '6445323', 'Resolución', 'GOBIERNO DEPARTAMENTAL DE SANTANDER.', '41', '08/03/1972', '8', '', 'www.itae.edu.co', 'N', '', '', ''),
(190, 74, 23, b'1', '3811', 'CORPORACION DE EDUCACION DEL NORTE DEL TOLIMA - COREDUCACION', '890.704.562-9', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 10 #29-93/33 Barrio El Reposo', '2513266', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '9702', '08/07/1981', '5', '1', 'www.coreducacion.edu.co', 'N', '', '', ''),
(191, 49, 5, b'1', '3812', 'INSTITUCION UNIVERSITARIA MARCO FIDEL SUAREZ - IUMAFIS', '890.985.856-3', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 48  50-30', '4500040', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '5060', '20/05/1986', '17', '', 'www.pmfs.edu.co', 'N', '', '', ''),
(192, 67, 34, b'1', '3817', 'CORPORACION UNIVERSITARIA AUTONOMA DE NARIÑO -AUNAR-', 'NO INFORMA', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 19  27-80', '232452', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1054', '01/02/1983', '18', '', 'www.aunar.edu.co', 'N', '', '', ''),
(193, 52, 6, b'1', '3819', 'CORPORACION TECNOLOGICA INDUSTRIAL COLOMBIANA - TEINCO', '800.003.963-5', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 42  16-86', '4856565', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1048', '16/02/1987', '21', '', 'www.teinco.edu.co', 'N', '', '', ''),
(194, 49, 28, b'1', '3820', 'CORPORACION ACADEMIA TECNOLOGICA DE COLOMBIA -ATEC-', 'NO INFORMA', 'Corporación', 'Privado', 'Institución Tecnológica', 'Carrera 42  47-82 Centro', '2171005', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '13298', '24/10/1986', '2', '', 'www.atec.edu.co', 'N', '', '', ''),
(195, 51, 4, b'1', '3821', 'CORPORACION POLITECNICO DE LA COSTA ATLANTICA', '800.036.652-1', 'Corporación', 'Privado', 'Institución Tecnológica', 'Cra. 38 No. 79A-167 Claustro de Santa Bernardita', '3361800', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '5814', '24/05/1988', '22', '', 'www.pca.edu.co', 'N', '', '', ''),
(196, 52, 6, b'1', '3822', 'POLITECNICO ICAFT', '800.029.090-1', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 39 No.14-62', '3239750', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '1643', '02/03/1988', '5', '', 'www.icaft.edu.co', 'N', '', '', ''),
(197, 52, 6, b'1', '3824', 'CENTRO DE CONOCIMIENTO ALEJANDRÍA - ALEJANDRÍA', '800.113.262-0', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 16 # 7-76', '7434541', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '9121', '11/07/1990', '5', '', 'www.eciem.edu.co', 'N', '', '', ''),
(198, 52, 6, b'1', '3826', 'CORPORACION INTERNACIONAL PARA EL DESARROLLO EDUCATIVO -CIDE-', '860.053.914-4', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 41  27A-56 La Soledad', '3689618', 'Resolución', 'MINISTERIO DE JUSTICIA', '1567', '25/03/1977', '34', '', 'www.cide.edu.co', 'N', '', '', ''),
(199, 52, 6, b'1', '3827', 'POLITECNICO SANTAFE DE BOGOTA', '860070298-7', 'Corporación', 'Privado', 'Institución Tecnológica', 'Transversal 18 A Bis N¿ 37 - 11', '3209056263', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '9097', '04/06/1979', '13', '', 'www.psb.edu.co', 'N', '', '', ''),
(200, 52, 6, b'1', '3828', 'CORPORACIÓN TECNOLÓGICA DE EDUCACIÓN SUPERIOR SAPIENZA -CTE-', '805.001.162-1', 'Corporación', 'Privado', 'Institución Tecnológica', 'Carrera 5 No. 23-16', '7564030', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '5050', '22/09/1993', '2', '', 'www.tecnologica.edu.co', 'N', '', '', ''),
(201, 52, 6, b'1', '3829', 'CORPORACIÓN JOHN F. KENNEDY', '800210541-6', 'Corporación', 'Privado', 'Institución Tecnológica', 'Cll 46 #13-43', '2451333', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '5460', '01/10/1993', '', '', 'www.jfk.edu.co', 'N', '', '', ''),
(202, 52, 6, b'1', '3830', 'CORPORACION UNIVERSAL DE INVESTIGACION Y TECNOLOGIA -CORUNIVERSITEC-', '860.514.382-5', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 34  15-36', '5780330', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '2286', '21/02/1983', '6', '', 'www.coruniversitec.edu.co', 'N', '', '', ''),
(203, 58, 37, b'1', '3831', 'CORPORACION UNIVERSITARIA COMFACAUCA - UNICOMFACAUCA', '817004535', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 4   No. 8 - 30', '8220517', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '597', '02/04/2001', '19', '2', 'www.unicomfacauca.edu.co', 'N', '', '', ''),
(204, 49, 50, b'1', '3834', 'CORPORACION TECNOLOGICA CATOLICA DE OCCIDENTE - TECOC -', '811.039.347-1', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 20  5-07  Llano de Bolivar', '8533489', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '44', '17/01/2002', '2', '', 'No disponible', 'N', '', '', ''),
(205, 73, 16, b'1', '3901', 'ESCUELA DE FORMACION DE INFANTERIA DE MARINA', '800141688', 'Nacional', 'Oficial', 'Institución Tecnológica', 'Carretera Troncal vía Lorica, Coveñas - Sucre', '2880265', 'No informa', 'SIN DATO', 'SIN DATO', '19/03/2007', '3', '', 'www.armada.mil.co', 'S', '17/07/2020', '13174', '4'),
(206, 62, 32, b'1', '3902', 'ESCUELA  MILITAR DE SUBOFICIALES SARGENTO INOCENCIO CHINCA', '808000211', 'Nacional', 'Oficial', 'Institución Tecnológica', 'Fuerte Militar de Tolemaida', '8383002', 'No informa', 'SIN DATO', 'SIN DATO', '19/03/2007', '5', '', 'www.emsub.edu.co', 'N', '', '', ''),
(207, 75, 44, b'1', '4101', 'INSTITUTO DE EDUCACION TECNICA PROFESIONAL DE ROLDANILLO', '891.902.811-0', 'Departamental', 'Oficial', 'Institución Técnica Profesional', 'Carrera 7 10-20 Roldanillo', '2298586', 'Decreto', 'Gobierno Nacional.', '1093', '17/05/1979', '37', '', 'www.intep.edu.co', 'N', '', '', ''),
(208, 64, 49, b'1', '4102', 'INSTITUTO NACIONAL DE FORMACION TECNICA PROFESIONAL DE SAN JUAN DEL CESAR', '860.402.193-9', 'Nacional', 'Oficial', 'Institución Técnica Profesional', 'Carrera 13 7A-61 Barrio 20 de Julio', '7740098', 'Decreto', 'Gobierno Nacional.', '1098', '17/03/1979', '11', '', 'No disponible', 'N', '', '', ''),
(209, 50, 46, b'0', '4106', 'INSTITUTO NACIONAL DE FORMACION TECNICA PROFESIONAL DE SAN ANDRES', '892.400.461.5', 'Nacional', 'Oficial', 'Institución Técnica Profesional', 'Barrio Sarie Bay con Av. Colombia', '5125916', 'Decreto', 'Gobierno Nacional', '176', '29/01/1980', '8', '1', 'www.infotepsai.edu.co', 'N', '', '', ''),
(210, 75, 22, b'1', '4107', 'INSTITUTO TECNICO AGRICOLA ITA', '800.124.023-4', 'Municipal', 'Oficial', 'Institución Técnica Profesional', 'Carrera 13   Calle 26C', '2360673', 'Decreto', 'Gobierno Nacional.', '603', '14/03/1966', '14', '', 'www.ita.edu.co', 'N', '', '', ''),
(211, 52, 6, b'1', '4108', 'ESCUELA TECNOLOGICA INSTITUTO TECNICO CENTRAL', '860.523.694-6', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 13 No.16-74', '3443000', 'Decreto', 'Gobierno Nacional', '146', '09/02/1905', '20', '1', 'www.itc.edu.co', 'N', '', '', ''),
(212, 75, 10, b'1', '4109', 'INSTITUTO TECNICO NACIONAL DE COMERCIO SIMON RODRIGUEZ - INTENALCO', '800.248.004-7', 'Nacional', 'Oficial', 'Institución Técnica Profesional', 'Avenida 4 Norte # 34AN-18 Barrio Prados de¿ Norte Comuna No 02', '6553333', 'Resolución', 'Ministerio de Educacion Nacional.', '20500', '16/11/1979', '17', '', 'www.intenalco.edu.co', 'N', '', '', ''),
(213, 74, 18, b'1', '4110', 'INSTITUTO TOLIMENSE DE FORMACION TECNICA PROFESIONAL', '800.173.719-0', 'Nacional', 'Oficial', 'Institución Técnica Profesional', 'Calle 18 Carrera 1ª Barrio Arkabal', '2483501', 'Decreto', 'Gobierno Nacional.', '3462', '24/12/1980', '25', '', 'www.itfip.edu.co', 'N', '', '', ''),
(214, 65, 14, b'1', '4111', 'INSTITUTO NACIONAL DE FORMACION TECNICA PROFESIONAL - HUMBERTO VELASQUEZ GARCIA', '891.701.932-0', 'Departamental', 'Oficial', 'Institución Técnica Profesional', 'Calle 10 12-22 Plaza del Centenario', '4240800', 'Decreto', 'Gobierno Nacional.', '3506', '10/12/1981', '6', '', 'www.infotephvg.edu.co', 'N', '', '', ''),
(215, 55, 35, b'1', '4112', 'COLEGIO INTEGRADO NACIONAL ORIENTE DE CALDAS - IES CINOC', '890.802.678-4', 'Departamental', 'Oficial', 'Institución Técnica Profesional', 'Carrera 5 # 6-30', '8555118', 'Decreto', 'Gobierno Nacional', '37', '08/01/1985', '35', '', 'www.iescinoc.edu.co', 'N', '', '', ''),
(216, 75, 54, b'1', '4301', 'UNIDAD TECNICA PROFESIONAL DE SEVILLA-UNITEPS-', 'NO INFORMA', 'Municipal', 'Oficial', 'Institución Técnica Profesional', 'Calle 51 No. 48 - 31', '2198444', 'Acuerdo', 'Concejo Municipal', '11', '05/12/1980', '', '', 'uniteps@col2.telecom.com.co', 'N', '', '', ''),
(217, 75, 10, b'1', '4701', 'FUNDACION ACADEMIA DE DIBUJO PROFESIONAL', 'NO INFORMA', 'Fundación', 'Privado', 'Institución Técnica Profesional', 'Calle 27 Norte No. 6BN-50', '6874100', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '18638', '19/11/1984', '8', '', 'www.fadp.edu.co', 'N', '', '', ''),
(218, 52, 6, b'1', '4702', 'FUNDACION DE EDUCACION SUPERIOR SAN JOSE -FESSANJOSE-', '860.524.219-5', 'Fundación', 'Privado', 'Institución Tecnológica', 'Calle  67   14A-29', '3470000', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '14878', '05/10/1984', '43', '', 'No disponible', 'N', '', '', ''),
(219, 52, 6, b'1', '4704', 'FUNDACION PARA LA EDUCACION SUPERIOR REAL DE COLOMBIA', '860.533.613-2', 'Fundación', 'Privado', 'Institución Técnica Profesional', 'Carrera 48  No.91-16', '6369260', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '21994', '20/12/1985', '2', '', 'No disponible', 'N', '', '', ''),
(220, 52, 6, b'1', '4705', 'FUNDACION CENTRO DE EDUCACION SUPERIOR,INVESTIGACION Y PROFESIONALIZACION -CEDINPRO-', '860.512.509-4', 'Fundación', 'Privado', 'Institución Técnica Profesional', 'Calle 94 #11-29 oficina 407 Barrio Chic¿', '2483613', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '1000', '01/02/1983', '1', '', 'www.cedinpro.edu.co', 'N', '', '', ''),
(221, 52, 6, b'1', '4708', 'FUNDACION ESCUELA COLOMBIANA DE HOTELERIA Y TURISMO-ECOTET-', '860.350.003-3', 'Fundación', 'Privado', 'Institución Técnica Profesional', 'Ava. 13 (Autopista Norte)  106-63', '6184710', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '2285', '21/02/1983', '', '', 'www.ecotet.com', 'N', '', '', ''),
(222, 70, 2, b'1', '4709', 'INSTITUCION UNIVERSITARIA EAM', '890002590-2', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 14  3-11 Av. Bolivar', '451101', 'Resolución', 'GOBIERNO DEPARTAMENTAL DEL QUINDIO.', 'OJ032', '31/07/1973', '24', '1', 'www.eam.edu.co', 'N', '', '', ''),
(223, 52, 6, b'1', '4710', 'FUNDACIÓN POLITÉCNICO MINUTO DE DIOS - TEC MD', '800026729-5', 'Fundación', 'Privado', 'Institución Técnica Profesional', 'Carrera 18 A No.137-80 Piso 5', '2594087', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '9168', '06/08/1987', '6', '', 'politecnicoindoamericano.edu.co', 'N', '', '', ''),
(224, 52, 6, b'1', '4714', 'FUNDACION INTERAMERICANA TECNICA-FIT-', '860055057', 'Fundación', 'Privado', 'Institución Técnica Profesional', 'Calle 36  15-63', '7040760', 'Resolución', 'MINISTERIO DE JUSTICIA.', '954', '19/03/2007', '9', '', 'www.fit.edu.co', 'N', '', '', ''),
(225, 52, 6, b'1', '4719', 'FUNDACION DE EDUCACION SUPERIOR NUEVA AMERICA', '860.072.063.2', 'Fundación', 'Privado', 'Institución Técnica Profesional', 'Diagonal 47 Sur No.53-46 Barrio Venecia', '7111063', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '17084', '13/11/1978', '9', '', 'www.nuevaamerica.edu.co', 'N', '', '', ''),
(226, 52, 6, b'1', '4721', 'FUNDACION UNIVERSITARIA HORIZONTE', '860.516.580-6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 69 No. 14-30', '7437270', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '11106', '13/07/1983', '24', '', 'www.insutec.edu.co', 'N', '', '', ''),
(227, 52, 6, b'1', '4726', 'FUNDACION UNIVERSITARIA SAN MATEO - SAN MATEO EDUCACION SUPERIOR', '800.040.295-9', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Transversal 17 25-25', '3309999', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '14135', '16/10/1987', '46', '', 'www.fus.edu.co', 'N', '', '', ''),
(228, 52, 6, b'1', '4727', 'POLITECNICO INTERNACIONAL INSTITUCION DE EDUCACION SUPERIOR', '900002845-0', 'Fundación', 'Privado', 'Institución Tecnológica', 'Calle 73 No. 10-45', '4005700', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '4135', '11/11/2004', '30', '', 'www.politecnicointernacional.edu.co', 'N', '', '', ''),
(229, 49, 28, b'1', '4801', 'CORPORACION ACADEMIA SUPERIOR DE ARTES', '890984813-2', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 43 78-40', '4112811', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '11105', '13/07/1983', '6', '', 'www.corpoasa.edu.co', 'N', '', '', ''),
(230, 52, 6, b'1', '4803', 'CORPORACION POLITECNICO COLOMBO ANDINO', '860.508.517-8', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Calle 125 No 7c-62', '5556969', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '2026', '02/03/1982', '3', '', 'www.polcolan.edu.co', 'N', '', '', ''),
(231, 52, 6, b'1', '4805', 'CORPORACION TECNICA DE COLOMBIA -CORPOTEC-', '860.516.740-8', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Av. Ciudad de Cali 69A - 47', '3173707085', 'Resolución', 'Ministerio de Educaci¿n Nacional', '4023', '25/03/1983', '', '', 'www.corpotec.edu.co', 'N', '', '', ''),
(232, 52, 6, b'1', '4806', 'CORPORACION CENTRO DE ESTUDIOS ARTISTICOS Y TECNICOS-CEART-', '860.036.444-2', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Calle 42 No.13-26', '3405125', 'No informa', 'MINISTERIO DE JUSTICIA', '1727', '22/04/1974', '7', '', 'www.ce-art.edu.co', 'N', '', '', ''),
(233, 75, 10, b'1', '4808', 'CORPORACION REGIONAL DE EDUCACION SUPERIOR-CRES-DE CALI', '890.328.023-8', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Calle 6 No. 30ª -23 Av. Roosevel, Barrio El Cedro', '6826182', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1998', '14/02/1983', '26', '', 'www.corpocres.edu.co', 'N', '', '', ''),
(234, 52, 6, b'1', '4810', 'CORPORACION UNIVERSITARIA CENDA', '860504984-6', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Av. Caracas 35-18', '2329084', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '11109', '13/07/1983', '14', '', 'No disponible', 'N', '', '', ''),
(235, 75, 10, b'1', '4811', 'CORPORACION DE ESTUDIOS SUPERIORES SALAMANDRA', '890324361', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Calle 17 A 121-399 Casa 75 A  Pance', '5552133', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '11104', '13/07/1983', '5', '', 'www.cenda-cali.edu.co', 'N', '', '', ''),
(236, 52, 6, b'1', '4812', 'CORPORACION DE EDUCACION SUPERIOR SURAMERICA', '860.519.585-6', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'CaLLE 136 Bis No. 103D-10', '7443316', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1311', '29/02/1984', '11', '', 'www.lasmercedes.edu.co', 'N', '', '', ''),
(237, 52, 6, b'1', '4813', 'CORPORACION UNIFICADA NACIONAL DE EDUCACION SUPERIOR-CUN-', '860401734-9', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Carrera 5  12-64  La Candelaria', '3813222', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '1379', '03/02/1983', '162', '1', 'www.cun.edu.co', 'N', '', '', ''),
(238, 51, 4, b'1', '4817', 'CORPORACION EDUCATIVA DEL LITORAL', '890.104.481-6', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'CL79 # 42F-110', '3207450', 'Resolución', 'GOBERNACION DEL ATLANTICO.', '713', '19/06/1972', '12', '', 'www.corpoedulitoral.edu.co', 'N', '', '', ''),
(239, 51, 4, b'1', '4818', 'CORPORACION UNIVERSITARIA LATINOAMERICANA - CUL', '890.103.657-0', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle  58  55-24A', '3444868', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '273', '23/03/1971', '11', '', 'www.ul.edu.co', 'N', '', '', ''),
(240, 52, 6, b'1', '4822', 'CORPORACION ESCUELA DE ARTES Y LETRAS', '860504543-1', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 12  70-44/46', '5417173', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '6272', '04/05/1983', '21', '', 'www.artesyletras.com.co', 'N', '', '', ''),
(241, 71, 36, b'1', '4825', 'CORPORACION INSTITUTO DE ADMINISTRACION Y FINANZAS - CIAF', '891.408.248-5', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Carrera 6 24-56', '3400100', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '19348', '07/12/1985', '16', '5', 'www.ciaf.edu.co', 'N', '', '', ''),
(242, 53, 11, b'1', '4826', 'CORPORACION UNIVERSITARIA REGIONAL DEL CARIBE -IAFIC-', '890.481.341-9', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Pie del Cerro, Av.Pedro Heredia 18B-17', '6665832', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '8992', '21/06/1985', '2', '', 'www.iafic.edu.co', 'N', '', '', ''),
(243, 49, 28, b'1', '4827', 'CORPORACION EDUCATIVA INSTITUTO TECNICO SUPERIOR DE ARTES, IDEARTES', 'NO INFORMA', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Calle 47  42-39', '2175599', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '11103', '13/07/1983', '', '', 'www.institutodeartes.edu.co', 'N', '', '', ''),
(244, 72, 7, b'1', '4829', 'CORPORACION INTERAMERICANA DE EDUCACION SUPERIOR-CORPOCIDES', '890204702', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Carrera 26  50-73', '6473939', 'Resolución', 'GOBIERNO DEPARTAMENTAL DE SANTANDER', '80', '01/08/1974', '6', '', 'www.interamericana.edu.co', 'N', '', '', ''),
(245, 52, 6, b'1', '4832', 'CORPORACION INSTITUTO SUPERIOR DE EDUCACION SOCIAL-ISES-', '860.066.098-5', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'Carrera 23  63 - 36', '5441388', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '2028', '02/03/1982', '12', '', 'www.ises.edu.co', 'N', '', '', ''),
(246, 52, 6, b'1', '4835', 'CORPORACION UNIVERSITARIA TALLER CINCO CENTRO DE DISEÑO', '860078430-1', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Autopista Norte Km. 19 (Via a Chia)', '6760448', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '11108', '13/07/1983', '10', '', 'www taller5.edu.co', 'N', '', '', ''),
(247, 51, 4, b'1', '4837', 'CORPORACION UNIVERSITARIA DE CIENCIAS EMPRESARIALES, EDUCACION Y SALUD -CORSALUD-', 'NO INFORMA', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 53   59-70', '3492619', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '3514', '15/07/1993', '10', '', 'www.corsalud.cjb.net', 'N', '', '', ''),
(248, 72, 7, b'1', '5801', 'CORPORACION ESCUELA TECNOLOGICA DEL ORIENTE', '804006527-3', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 41 10-30 Barrio Alfonso L¿pez', '6349810', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '2680', '05/08/1998', '12', '', 'www.tecnologicadeloriente.edu.co', 'N', '', '', ''),
(249, 52, 6, b'1', '5802', 'UNIVERSIDAD ECCI', '860.401.496-0', 'Corporación', 'Privado', 'Universidad', 'Carrera 19  49-20', '3537171', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '2683', '28/03/1985', '62', '', 'www.ecci.edu.co', 'N', '', '', ''),
(250, 62, 25, b'1', '9102', 'ESCUELA DE SUBOFICIALES DE LA FUERZA AEREA COLOMBIANA ANDRES M. DIAZ', '80014164', 'Nacional', 'Oficial', 'Institución Tecnológica', 'Madrid (Cundinamarca)', '', 'Acuerdo', 'ICFES.', '275', '19/03/2007', '12', '', 'www.esufa.edu.com', 'S', '01/10/2019', '10409', '6'),
(251, 75, 10, b'1', '9103', 'ESCUELA MILITAR DE AVIACION MARCO FIDEL SUAREZ', '800141621', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Carrera  8  58-67', '4881000', 'Decreto', 'Presidencia de la República', '2247', '23/12/1920', '4', '', 'www.emavi.edu.co', 'S', '21/03/2018', '4600', '6'),
(252, 52, 6, b'1', '9104', 'ESCUELA MILITAR DE CADETES GENERAL JOSE MARIA CORDOVA', '800131272-0', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle  80  38-00 (Avenida Suba)', '3770850', 'No informa', 'CONGRESO', '30', '28/12/1992', '8', '', 'www.esmic.edu.co', 'S', '10/12/2021', '23657', '6'),
(253, 53, 11, b'1', '9105', 'ESCUELA NAVAL DE CADETES ALMIRANTE PADILLA', '800141648-9', 'Nacional', 'Oficial', 'Universidad', 'Barrio Manzanillo, Avenida El Bosque', '6694295', 'Decreto', 'Gobierno Nacional', '793', '06/07/1907', '14', '7', 'www.escuelanaval.edu.co', 'S', '10/11/2017', '24403', '6'),
(254, 52, 6, b'1', '9107', 'ESCUELA DE INGENIEROS MILITARES', '8300874434', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Carrera  50 #18-06 Puente Aranda', '4468011', 'No informa', 'Comando del Ej¿rcito Nacional', '15', '09/08/1983', '7', '', 'www.esing.mil.co', 'N', '', '', ''),
(255, 52, 6, b'1', '9108', 'INSTITUTO CARO Y CUERVO', '899999096-6', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 10  4-69', '3422121', 'No informa', '_', '_', '31/12/1969', '6', '', 'www.caroycuervo.gov.co', 'N', '', '', ''),
(256, 52, 6, b'1', '9110', 'SERVICIO NACIONAL DE APRENDIZAJE-SENA-', '899.999.034-1', 'Nacional', 'Oficial', 'Institución Tecnológica', 'Carrera 13 No. 65-10', '5944001', 'Ley', 'CONGRESO DE COLOMBIA', '30', '28/12/1992', '1489', '2', 'www.sena.edu.co', 'N', '', '', ''),
(257, 61, 40, b'1', '9116', 'FUNDACION UNIVERSITARIA CLARETIANA - UNICLARETIANA', '9000059366', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 20 No 5 - 66 Barrio La Yesquita', '6711217', 'Resolución', 'Ministerio de Educaci¿n Nacional', '2233', '23/06/2006', '23', '5', 'www.fucla.edu.co', 'N', '', '', ''),
(258, 52, 6, b'1', '9117', 'ESCUELA INTERNACIONAL DE ESTUDIOS SUPERIORES - INTER', '1900093502-9', 'Fundación', 'Privado', 'Institución Técnica Profesional', 'Av. Caracas No. 35-38', '2320155', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '3623', '04/07/2006', '3', '', 'http://inter.edu.co/', 'N', '', '', ''),
(259, 51, 4, b'1', '9119', 'CORPORACION UNIVERSITARIA AMERICANA', '900114439-4', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 71 No. 41C -35, Edificio COSMOS, Bloque D.', '3851027', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '6341', '17/10/2006', '74', '', 'www.niamericana.edu.co', 'N', '', '', ''),
(260, 49, 28, b'1', '9120', 'FUNDACION UNIVERSITARIA BELLAS ARTES', '900126062-3', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Palacio Bellas Artes, Calle 52 No. 42-08', '4447787', 'Resolución', 'Ministerio de Educaci¿n Nacional', '6342', '17/10/2006', '6', '', 'www.bellasartesmed.edu.co', 'N', '', '', ''),
(261, 53, 11, b'1', '9121', 'FUNDACION UNIVERSITARIA COLOMBO INTERNACIONAL - UNICOLOMBO', '900131269', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Centro, Calle de la Factoria 36-27', '6600098', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '7774', '01/12/2006', '12', '', 'www.unicolombo.edu.co', 'N', '', '', ''),
(262, 49, 27, b'1', '9124', 'TECNOLOGICO COREDI', '900175084-4', 'Fundación', 'Privado', 'Institución Tecnológica', 'Calle 30 #36-11', '5690120', 'No informa', 'Ministerio de Educación Nacional', '1896', '17/04/2007', '5', '', 'www.coredi.edu.co', 'N', '', '', ''),
(263, 51, 4, b'1', '9126', 'CORPORACION TECNOLOGICA INDOAMERICA', '900243674-1', 'Corporación', 'Privado', 'Institución Tecnológica', 'Carrera 46 Calle 57 Esquina', '3697604', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '6173', '22/09/2008', '5', '', 'www.indoamerica.edu.co', 'N', '', '', ''),
(264, 49, 45, b'1', '9127', 'CORPORACION UNIVERSITARIA DE SABANETA - UNISABANETA', '900.253.021-5', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 75 sur #34-120', '3011818', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL.', '7184', '24/10/2008', '14', '', 'www.unisabaneta.edu.co', 'N', '', '', ''),
(265, 52, 6, b'1', '9128', 'LCI - FUNDACION TECNOLOGICA', '900262351', 'Fundación', 'Privado', 'Institución Tecnológica', 'Cra. 13 # 75-74', '2174757', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '8973', '01/12/2008', '15', '', 'No disponible', 'N', '', '', ''),
(266, 52, 6, b'1', '9129', 'FUNDACION UNIVERSITARIA CAFAM -UNICAFAM', '900262398-4', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'AVENIDA CRA 68 #90-88', '6468000', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '9336', '12/12/2008', '16', '', 'www.unicafam.edu.co', 'N', '', '', ''),
(267, 52, 6, b'1', '9131', 'FUNDACIÓN UNIVERSITARIA CERVANTES SAN AGUSTÍN - UNICERVANTES', '9002941201', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 77#11-63', '2120515', 'No informa', 'Ministerio de Educaci¿n Nacional', '3600', '02/06/2009', '12', '', 'www.unicervantes.edu.co', 'N', '', '', ''),
(268, 52, 6, b'1', '9132', 'FUNDACION UNIVERSITARIA CIEO - UNICIEO', '900.372.111-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Cra 5 N° 118-10', '6371160', 'No informa', 'Ministerio de Educación Nacional', '6168', '14/07/2010', '2', '', 'no disponible', 'N', '', '', ''),
(269, 52, 6, b'1', '9899', 'INSTITUCION UNIVERSITARIA DE COLOMBIA - UNIVERSITARIA DE COLOMBIA', '900350945-0', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 7  35-85', '2324070', 'No informa', 'Ministerio de Educación Nacional', '2202', '30/03/2010', '14', '', 'www.universitariadecolombia.edu.co', 'N', '', '', ''),
(270, 49, 28, b'1', '9900', 'CORPORACION UNIVERSITARIA U DE COLOMBIA', '900378694-9', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 56 #41-147', '2398080', 'No informa', 'Ministerio de Educación Nacional', '6731', '05/08/2010', '8', '', 'www.udecolombia.edu.co', 'N', '', '', ''),
(271, 72, 7, b'1', '9902', 'FUNDACION UNIVERSITARIA COMFENALCO SANTANDER', '900395956-5', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Avenida González Valencia #52-69', '6577000', 'No informa', 'Ministerio de Educación Nacional', '8562', '27/09/2010', '3', '', 'www.comfenalcosantander.com.co', 'N', '', '', ''),
(272, 52, 6, b'1', '9903', 'CORPORACIÓN COLSUBSIDIO EDUCACIÓN TECNOLÓGICA - CET', '900401526-8', 'Corporación', 'Privado', 'Institución Tecnológica', 'Calle 52A No. 9-76', '2550617', 'Resolución', 'Ministerio de Educaci¿n Nacional', '9150', '21/10/2010', '11', '', 'www.cetcolsubsidio.edu.co', 'N', '', '', ''),
(273, 52, 6, b'1', '9904', 'FUNDACION UNIVERSITARIA COLOMBO GERMANA', '900407222-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Avenida Caracas #63-87', '5879730', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '10263', '22/11/2010', '19', '', 'no disponible', 'N', '', '', ''),
(274, 63, 43, b'1', '9905', 'FUNDACION ESCUELA TECNOLOGICA DE NEIVA - JESUS OVIEDO PEREZ -FET', '900440771-2', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Km.11 v¿a al Sur', '8600117', 'Resolución', 'Ministerio de Educaci¿n Nacional', '1595', '28/02/2011', '15', '', 'www.fet.edu.co', 'N', '', '', ''),
(275, 75, 10, b'1', '9906', 'CORPORACION UNIVERSITARIA PARA EL DESARROLLO EMPRESARIAL Y SOCIAL- CUDES', '900422582-0', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Av. 6N No. 47-197', '6518200', 'Resolución', 'Ministerio de Educaci¿n Nacional', '1051', '15/02/2011', '4', '', 'NO DISPONIBLE', 'N', '', '', ''),
(276, 63, 31, b'1', '9907', 'FUNDACION UNIVERSITARIA NAVARRA - UNINAVARRA', '36180562', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'CALLE 10 # 6-41', '8717770', 'No informa', 'Ministerio de Educación Nacional', '10570', '22/11/2011', '14', '', 'www.uninavarra.edu.co', 'N', '', '', ''),
(277, 52, 6, b'1', '9910', 'FUNDACION UNIVERSITARIA LUIS G. PAEZ - UNILUISGPAEZ', '900511207-5', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 5 #65-50', '3452497', 'No informa', 'Ministerio de Educación Nacional', '10733', '23/11/2011', '2', '', 'www.uniluisgpaez.edu.co', 'N', '', '', ''),
(278, 52, 6, b'1', '9913', 'CORPORACION UNIVERSITARIA DE ASTURIAS', '900509172-1', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 18 No. 79-25', '3174231476', 'Resolución', 'MINISTERIO DE EDUCACION', '1110', '02/02/2012', '12', '', 'https://uniasturias.edu.co/', 'N', '', '', ''),
(279, 52, 6, b'1', '9914', 'ESEIT - ESCUELA SUPERIOR DE EMPRESA, INGENIERÍA Y TECNOLOGÍA', '9005345244', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 20 A No. 74-75', '5521860', 'No informa', 'Ministerio de Educaci¿n Nacional', '4787', '08/05/2012', '17', '', 'www.elite.edu.co', 'N', '', '', ''),
(280, 52, 6, b'1', '9915', 'UNIVERSITARIA VIRTUAL INTERNACIONAL', '900.524.285-6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 19 71 A-23', '7421994', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '4788', '08/05/2012', '14', '', 'www.uvirtual.edu.co', 'N', '', '', ''),
(281, 62, 15, b'1', '9918', 'INSTITUCION UNIVERSITARIA CONOCIMIENTO E INNOVACION PARA LA JUSTICIA - CIJ', '79357338', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Km 4 Vía Suba a Cota', '6831062', 'Ley', 'Congreso de la Republica', '1654', '15/07/2013', '3', '', 'www.', 'N', '', '', ''),
(282, 62, 13, b'1', '9919', 'TECNOLOGICO DE ENERGIA E INNOVACION-  E-LERNOVA', '900750134-0', 'Fundación', 'Privado', 'Institución Tecnológica', 'Cra. 7 Km 17 Los Arrayanes', '8844310', 'No informa', 'Ministerio de Educaci¿n Nacional', '4283', '27/03/2014', '', '', 'www.elernova.edu.co', 'N', '', '', ''),
(283, 67, 34, b'1', '9921', 'FUNDACION UNIVERSITARIA CATOLICA DEL SUR - UNICATOLICA DEL SUR', '900901398-1', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'CALLE 18 N¿ 56 -02', '7216608', 'Resolución', 'MINISTERIO DE EDUCACI¿N NACIONAL', '15596', '23/09/2015', '2', '', 'www.', 'N', '', '', ''),
(284, 71, 36, b'1', '9922', 'FUNDACION UNIVERSITARIA COMFAMILIAR RISARALDA', '900893985-5', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'CRA. 5 N¿ 21 - 30', '3172400', 'No informa', 'MINISTERIO DE EDUCACI¿N NACIONAL', '14053', '07/09/2015', '13', '1', 'www.uc.edu.co', 'N', '', '', ''),
(285, 52, 6, b'1', '9923', 'CORPORACION UNIVERSITARIA DE CATALUÑA', '901032802-6', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Cra 18B No 106 A-15', '6372511', 'Resolución', 'Ministerio de Educaci¿n Nacional', '21329', '15/11/2016', '2', '', 'www.udecatalunya.edu.co', 'N', '', '', ''),
(286, 52, 6, b'1', '9924', 'FUNDACION UNIVERSITARIA INTERNACIONAL DE COLOMBIA - UNINCOL', '901.040.737-9', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 39A No. 19-18', '7810645', 'Resolución', 'Ministerio de Educacion Nacional', '21328', '15/11/2016', '4', '', 'www.unincol.edu.co', 'N', '', '', ''),
(287, 72, 20, b'1', '9925', 'FUNDACION UNIVERSITARIA FCV', '901045132-6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 155A No. 23-58 Urbanizaci¿n El Bosque', '6399292', 'Resolución', 'MINISTERIO DE EDUCACION NACIONAL', '21212', '10/11/2016', '', '', 'no informa', 'N', '', '', ''),
(288, 52, 6, b'1', '9926', 'FUNDACION UNIVERSITARIA INTERNACIONAL DE LA RIOJA - UNIR', '901096617-4', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 100  19-61 Piso 8', '5169659', 'No informa', 'ASAMBLEA DE FUNDADORES', '1', '24/07/2015', '17', '', 'unir', 'N', '', '', ''),
(289, 49, 28, b'1', '9927', 'INSTITUCION UNIVERSITARIA DIGITAL DE ANTIOQUIA -IU. DIGITAL', '901168222-9', 'Departamental', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Calle 42B   52- 106', '3835160', 'Ordenanza', 'Asamblea Departamental de Antioquia', '74', '27/12/2017', '14', '', 'www.iudigital.edu.co/Paginas/default.aspx', 'N', '', '', ''),
(290, 52, 6, b'1', '9928', 'FUNDACIÓN UNIVERSITARIA SALESIANA', '860008010', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Carrera 5¿ # 8-25', '7462738', 'No informa', 'SIN DATO', 'SIN DATO', '31/05/2018', '6', '', 'www.salesianosbogota.org', 'N', '', '', ''),
(291, 58, 37, b'1', '9929', 'UNIVERSIDAD AUTÓNOMA INDÍGENA INTERCULTURAL - UAIIN', '8242153', 'Nacional', 'Oficial', 'Universidad', 'Calle 78N - Carrera 19N Urbanizaci¿n La Aldea', '8240343', 'No informa', 'SIN DATO', 'SIN DATO', '26/06/2018', '10', '', 'www.uaiinpebi-cric.edu.co', 'N', '', '', ''),
(292, 52, 6, b'1', '9930', 'INSTITUCIÓN UNIVERSITARIA COMANDO DE EDUCACIÓN Y DOCTRINA - CEDOC DEL EJÉRCITO NACIONAL', 'NO INFORMA', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'CALLE 102 NO. 7-80 CANTON NORTE', '3150111', 'No informa', 'SIN DATO', 'SIN DATO', '14/08/2018', '5', '', 'www.ejercito.mil.co/?idcategoria=221634', 'N', '', '', ''),
(293, 52, 6, b'1', '9931', 'FUNDACIÓN UNIVERSITARIA PATRICIO SYMES', '901184569-6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Cra. 16 No. 70a-68', '2172183', 'Resolución', 'Ministerio de Educaci¿n Nacional', '7081', '30/04/2018', '2', '', 'no disponible', 'N', '', '', ''),
(294, 52, 6, b'1', '9932', 'FUNDACIÓN UNIVERSITARIA SAN PABLO - UNISANPABLO', '901208296-6', 'Fundación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'Calle 170 No. 8G-31', '6 71 1221', 'Acta', 'Consejo de Fundadores de la UNISANPABLO.', '9', '20/08/2015', '2', '', 'www.unisanpablo.co', 'N', '', '', ''),
(295, 52, 6, b'1', '9934', 'CENTRO DE ESTUDIOS AERONÁUTICOS - CEA', '899.999.059-3', 'Nacional', 'Oficial', 'Institución Universitaria/Escuela Tecnológica', 'Avenida el Dorado N¿. 103 - 23', '4251000', 'Acta', 'Consejo Directivo', '74', '19/12/2014', '1', '', 'www.centrodeestudiosaeronauticos.edu.co/cea/', 'N', '', '', ''),
(296, 72, 3, b'1', '9935', 'UNIDAD TECNOLÓGICA DEL MAGDALENA MEDIO - UTEM -', '901.167.074-0', 'Fundación', 'Privado', 'Institución Tecnológica', 'Calle 55 # 19-25', '6024379', 'No informa', 'Ministerio de Educaci¿n Nacional', '1251', '30/01/2018', '1', '', 'www.utem.edu.co', 'N', '', '', ''),
(297, 68, 48, b'1', '9936', 'CORPORACIÓN UNIVERSITARIA AUTÓNOMA DEL NORTE', '901278157-1', 'Corporación', 'Privado', 'Institución Universitaria/Escuela Tecnológica', 'AV 2 # 13-30', '7557153', 'No informa', 'Ministerio de Educaci¿n Nacional', '4013', '12/04/2019', '4', '', 'www.unanorte.com', 'N', '', '', ''),
(298, 58, 56, b'1', '9937', 'CORPORACION TECNICA PROFESIONAL CAMINOS DEL SUROCCIDENTE COLOMBIANO', '901424500-1', 'Corporación', 'Privado', 'Institución Técnica Profesional', 'calle 15#19-19 barrio centro', '3136316976', 'No informa', 'MINISTERIO DE EDUCACION NACIONAL', '11222', '25/10/2019', '', '', 'www.corpocaminos.edu.co', 'N', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `id_departamento`, `nom`) VALUES
(1, 49, 'Apartadó'),
(2, 70, 'Armenia'),
(3, 72, 'Barrancabermeja'),
(4, 51, 'Barranquilla'),
(5, 49, 'Bello'),
(6, 52, 'Bogotá, D.C.'),
(7, 72, 'Bucaramanga'),
(8, 75, 'Buenaventura'),
(9, 49, 'Caldas'),
(10, 75, 'Cali'),
(11, 53, 'Cartagena de Indias'),
(12, 75, 'Cartago'),
(13, 62, 'Chía'),
(14, 65, 'Ciénaga'),
(15, 62, 'Cota'),
(16, 73, 'Coveñas'),
(17, 49, 'Envigado'),
(18, 74, 'Espinal'),
(19, 56, 'Florencia'),
(20, 72, 'Floridablanca'),
(21, 62, 'Fusagasugá'),
(22, 75, 'Guadalajara de Buga'),
(23, 74, 'Honda'),
(24, 74, 'Ibagué'),
(25, 62, 'Madrid'),
(26, 55, 'Manizales'),
(27, 49, 'Marinilla'),
(28, 49, 'Medellín'),
(29, 69, 'Mocoa'),
(30, 59, 'Montería'),
(31, 63, 'Neiva'),
(32, 62, 'Nilo'),
(33, 68, 'Pamplona'),
(34, 67, 'Pasto'),
(35, 55, 'Pensilvania'),
(36, 71, 'Pereira'),
(37, 58, 'Popayán'),
(38, 51, 'Puerto Colombia'),
(39, 58, 'Puerto Tejada'),
(40, 61, 'Quibdó'),
(41, 64, 'Riohacha'),
(42, 49, 'Rionegro'),
(43, 63, 'Rivera'),
(44, 75, 'Roldanillo'),
(45, 49, 'Sabaneta'),
(46, 50, 'San Andrés'),
(47, 72, 'San Gil'),
(48, 68, 'San José de Cúcuta'),
(49, 64, 'San Juan del Cesar'),
(50, 49, 'Santa Fé de Antioquia'),
(51, 65, 'Santa Marta'),
(52, 71, 'Santa Rosa de Cabal'),
(53, 49, 'Santa Rosa de Osos'),
(54, 75, 'Sevilla'),
(55, 73, 'Sincelejo'),
(56, 58, 'Timbío'),
(57, 75, 'Tuluá'),
(58, 54, 'Tunja'),
(59, 60, 'Valledupar'),
(60, 66, 'Villavicencio'),
(61, 57, 'Yopal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `nom` varchar(160) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `detalles` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `cc` varchar(20) NOT NULL,
  `registro` varchar(24) NOT NULL,
  `periodo` varchar(10) NOT NULL,
  `c1` varchar(4) NOT NULL COMMENT 'Competencia\r\n comunicacion_escrita - saber pro\r\n lectura_critica - saber 11\r\n',
  `c2` varchar(4) NOT NULL COMMENT 'competencia 2 razonamiento_cuantitativo - saber pro matematicas - saber 11',
  `c3` varchar(4) NOT NULL COMMENT 'competencia 3 lectura_critica saber pro sociales_y_ciudadanas - saber 11',
  `c4` varchar(4) NOT NULL COMMENT 'Competencia 4 competencias_ciudadanas - saber pro ciencias_naturales - saber 11',
  `c5` varchar(4) NOT NULL COMMENT 'competencia 5 ingles - saber pro ingles - saber 11'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nom`, `des`) VALUES
(1, 'ROOT', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `id_institucion` int(11) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `detalle` varchar(270) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `id_institucion`, `nom`, `detalle`) VALUES
(0, NULL, 'SABER 11', 'es un examen de egreso de bachillerato administrado anualmente en el grado 11 en el bachillerato colombiano'),
(14, NULL, 'SABER TyT', 'Es una prueba de Estado estandarizada realizada por el Instituto Colombiano dirigido a estudiantes próximos graduarse o graduados de los programas técnicos profesionales y tecnológicos.'),
(15, NULL, 'SABER Pro', 'La prueba está dirigida a estudiantes que han aprobado el 75% de los créditos de sus respectivos programas de formación universitaria profesional.'),
(52, 177, 'simulacro', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_instituto` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `nom` varchar(120) DEFAULT NULL,
  `ape` varchar(120) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `clave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`cc`),
  ADD KEY `id_programa` (`id_programa`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `id_municipio` (`id_municipio`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_institucion` (`id_institucion`),
  ADD KEY `cc` (`cc`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_instituto` (`id_instituto`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id`);

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `institucion_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`),
  ADD CONSTRAINT `institucion_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`);

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `programa_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id`);

--
-- Filtros para la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD CONSTRAINT `prueba_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`),
  ADD CONSTRAINT `prueba_ibfk_2` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id`),
  ADD CONSTRAINT `prueba_ibfk_3` FOREIGN KEY (`cc`) REFERENCES `estudiante` (`cc`);

--
-- Filtros para la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD CONSTRAINT `tipo_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_instituto`) REFERENCES `institucion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

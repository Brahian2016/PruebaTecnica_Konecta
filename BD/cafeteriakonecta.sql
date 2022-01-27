
-- Base de datos: `cafeteriakonecta`

CREATE DATABASE cafeteriakonecta;

USE cafeteriakonecta;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `NombreProducto` varchar(50) NOT NULL,
  `Referencia` varchar(50) NOT NULL,
  `Precio` double NOT NULL,
  `Peso` double NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Stock` int(11) NOT NULL,
  `FechaCreacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `NombreProducto`, `Referencia`, `Precio`, `Peso`, `Categoria`, `Stock`, `FechaCreacion`) VALUES
(8, 'Croissant', '001', 3500, 20, 'Panes', 12, '2022-01-26 00:00:00'),
(9, 'Pastel hojaldrado', '002', 2000, 20, 'Panes', 2, '2022-01-26 00:00:00'),
(10, 'Galletas de mantequilla', '003', 500, 10, 'Azucares', 1, '2022-01-26 00:00:00'),
(11, 'Jugo Hit de Mora', '004', 2500, 100, 'Bebidas', 20, '2022-01-26 00:00:00'),
(12, 'Coca Cola Personal', '005', 2800, 500, 'Bebidas', 19, '2022-01-26 00:00:00'),
(19, 'Papitas Picantes', '008', 1200, 50, 'Surtidos', 1, '2022-01-23 00:39:07'),
(25, 'queso mozarrella', '008', 1200, 20, 'Surtidos', 20, '2022-01-25 00:28:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `CantidadVendida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `IDProducto`, `CantidadVendida`) VALUES
(1, 8, 5),
(2, 9, 1),
(3, 8, 2),
(8, 10, 5),
(9, 19, 49),
(10, 10, 4),
(11, 12, 1),
(12, 19, 49);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`IDProducto`) REFERENCES `productos` (`ID`);
COMMIT;

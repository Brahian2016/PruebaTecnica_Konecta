La vista de la prueba tiene un navbar en la parte superior donde se encuentran 3 opciones las cuáles explicaré a continuación:

Administración de Productos:
En esta vista se encuentra el formulario de registro de productos y el listar productos con al opciones de eliminar y editar productos

Venta de Productos:
En esta vista se encuentra el formulario para el registro de las ventas

Reportes:
En esta vista se encuentran dos tablitas que presentan la vista de las 2 consultas solicitadas, de igual forma los comparto:

- Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
SELECT * FROM productos WHERE Stock  =  (SELECT max(Stock) FROM productos)

- Realizar una consulta que permita conocer cuál es el producto más vendido.
SELECT IDProducto, SUM(CantidadVendida) as VENDIDO ,p.NombreProducto as Nombre FROM   ventas v INNER JOIN productos p ON v.IDProducto = p.ID GROUP  BY IDProducto ORDER  BY VENDIDO DESC LIMIT 1


Nota: Para iniciar el proyecto debe ser en la siguiente ruta:
\PruebaTecnica_Konecta\view\principal.php

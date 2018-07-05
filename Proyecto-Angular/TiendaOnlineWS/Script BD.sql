CREATE DATABASE IF NOT EXISTS shoponline
USE shoponline;



CREATE TABLE usuario (
  id int(10) NOT NULL,
  nombre varchar(32) NOT NULL,
  passw varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO usuario (id, nombre, passw) VALUES
(1, 'juan', 'abc123'),
(2, 'miguel', 'abc123');

--
-- Indices de la tabla people
--
ALTER TABLE usuario
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT de la tabla people
--
ALTER TABLE usuario
  MODIFY id int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;




/*      TABLA PRODUCTOS     */


CREATE TABLE producto (
  id int(10) PRIMARY KEY AUTO_INCREMENT,
  producto varchar(32) NOT NULL,
  precio  decimal(6,2) NOT NULL,
  cantidad integer NOT NULL, 
  urlimagen varchar(120) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO producto (producto, precio, cantidad, urlimagen) VALUES
('aguacate', 40.50, 100, '../assets/imagenesBase/aguacate.jpg'),
('ajo', 20.80,  55, '../assets/imagenesBase/ajo.jpg'),
('almendras', 80, 20, '../assets/imagenesBase/almendras.jpg'),
('arandanos', 30,  10, '../assets/imagenesBase/arandanos.jpg'),
('brocoli', 10,  200, '../assets/imagenesBase/brocoli.png'),
('calabaza', 12.50,  10, '../assets/imagenesBase/calabaza.jpg'),
('canela', 15,  40, '../assets/imagenesBase/canela.jpg'),
('cebolla', 18.40,  50, '../assets/imagenesBase/cebolla.jpg'),
('fresa', 20,  200, '../assets/imagenesBase/fresa.jpg'),
('kiwi', 18.40,  50, '../assets/imagenesBase/kiwi.jpg'),
('limon', 38.50,  23, '../assets/imagenesBase/limon.jpg'),
('maiz', 9,  100, '../assets/imagenesBase/maiz.jpg'),
('manzana', 18,  145, '../assets/imagenesBase/manzana.jpg'),
('naranja', 8.90,  120, '../assets/imagenesBase/naranja.jpg'),
('papa', 24,  22, '../assets/imagenesBase/papa.jpg'),
('pasta', 10,  124, '../assets/imagenesBase/pasta.jpg'),
('pimienta', 5,  14, '../assets/imagenesBase/pimienta.jpg'),
('repollo', 11,  8, '../assets/imagenesBase/repollo.jpg'),
('tomate', 13,  10, '../assets/imagenesBase/tomate.jpg'),
('zanahoria', 14,  30, '../assets/imagenesBase/zanahoria.jpg');



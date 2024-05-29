CREATE DATABASE registro_gastos DEFAULT CHARACTER SET = 'utf8mb4';

USE registro_gastos;

-- creamos las tablas
CREATE TABLE producto (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_prod VARCHAR(50) NOT NULL,
    tipo_prod VARCHAR(30) NOT NULL,
    precio int,
    precio_oferta int
);

CREATE TABLE establecimiento_comercial (
    id_establ_com INT PRIMARY KEY AUTO_INCREMENT,
    nombre_establ VARCHAR(50),
    zona VARCHAR(100)
);

DROP TABLE registro;

CREATE TABLE registro (
    id_registro INT PRIMARY KEY AUTO_INCREMENT,
    prod_id INT NOT NULL,
    establ_id INT,
    fecha_compra DATE,
    cantidad int,
    FOREIGN KEY (prod_id) REFERENCES producto (id_producto),
    FOREIGN KEY (establ_id) REFERENCES establecimiento_comercial (id_establ_com)
);

CREATE TABLE detalle (
    id_detalle INT PRIMARY KEY AUTO_INCREMENT,
    anio_mes DATE,
    periodo_gasto_mes VARCHAR(100),
    total_gasto_mes INT
);
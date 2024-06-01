CREATE DATABASE registro_gastos DEFAULT CHARACTER SET = 'utf8mb4';

DROP DATABASE registro_gastos;

USE registro_gastos;

-- creamos las tablas

CREATE TABLE tipo_producto (
    id_tipo_prod INT PRIMARY KEY AUTO_INCREMENT,
    tipo_prod VARCHAR(30) NOT NULL,
    descripcion TEXT
);

CREATE TABLE establecimiento_comercial (
    id_establ_com INT PRIMARY KEY AUTO_INCREMENT,
    nombre_establ VARCHAR(50),
    zona VARCHAR(100)
);

CREATE TABLE producto (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_prod VARCHAR(50) NOT NULL,
    tipo_prod_id INT NOT NULL,
    precio int,
    precio_oferta int,
    FOREIGN KEY (tipo_prod_id) REFERENCES tipo_producto (id_tipo_prod)
);

DROP TABLE producto;

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
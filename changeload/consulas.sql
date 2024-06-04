-- producto

INSERT INTO
    producto (
        nombre_prod,
        tipo_prod,
        precio,
        precio_oferta
    )
VALUES (
        "Audifonos",
        "electronico",
        "5000",
        "3000"
    );

SELECT * FROM producto;

-- establecimiento comercial

INSERT INTO
    establecimiento_comercial (nombre_establ, zona)
VALUES ("Supermercado", "Coquimbo");

SELECT * FROM establecimiento_comercial;

-- tipo producto

INSERT INTO
    tipo_producto (tipo_prod, descripcion)
VALUES (
        "Lacteo",
        "Productos que provienen de la leche"
    );

SELECT * FROM tipo_producto;

-- registro

INSERT INTO
    registro (
        prod_id,
        establ_id,
        fecha_compra,
        cantidad
    )
VALUES (1, 1, "2024-06-04", 2);

-- consultas utiles

SELECT MAX(id_producto) FROM producto;
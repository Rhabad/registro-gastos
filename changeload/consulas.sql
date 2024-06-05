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

SELECT MAX(id_producto) as id FROM producto;

SELECT
    r.id_registro as id,
    p.nombre_prod as producto,
    tp.tipo_prod as tipo,
    p.precio,
    p.precio_oferta as oferta,
    r.cantidad,
    r.fecha_compra as fecha_registro,
    CONCAT(
        ec.zona,
        " - ",
        ec.nombre_establ
    ) as zona
FROM
    registro r
    LEFT JOIN producto p ON r.prod_id = p.id_producto
    LEFT JOIN tipo_producto tp ON p.tipo_prod_id = tp.id_tipo_prod
    LEFT JOIN establecimiento_comercial ec ON r.establ_id = ec.id_establ_com;
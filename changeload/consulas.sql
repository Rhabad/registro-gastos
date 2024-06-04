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

-- tipor producto
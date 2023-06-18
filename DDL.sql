CREATE TABLE proveedor
(
nit VARCHAR(20) PRIMARY KEY,
nombre VARCHAR(20) NOT NULL,
fecha_vinculacion DATE NOT NULL,
anios_en_mercado INT NOT NULL DEFAULT 0
);


CREATE TABLE ingrediente
(
codigo VARCHAR(10) PRIMARY KEY,
nombre VARCHAR(20) NOT NULL,
precio_libra DECIMAL(10,2),
insumo_de VARCHAR(10) DEFAULT NULL,
categoria INT CHECK (categoria IN (1, 2, 3, 4, 5)),
nit_proveedor VARCHAR(20),
FOREIGN KEY(nit_proveedor) REFERENCES proveedor(nit) ON DELETE CASCADE
);


-- Datos de proveedor
INSERT INTO proveedor VALUES(1000007, "Fruver La 33", '2021-07-13', 4);
INSERT INTO proveedor VALUES(1000008, "Chorizos Rosita", '2021-02-23', 10);
INSERT INTO proveedor VALUES(1000009, "Jamón El Ibérico", '2021-02-13', 7);
INSERT INTO proveedor VALUES(10000531, "Jamón El Serro", '2022-01-23', 1);
INSERT INTO proveedor VALUES(10002349, "Toy Quesudo SAS", '2019-12-16', 13);
INSERT INTO proveedor VALUES(1004231, "Lácteos Poderosos", '2018-12-13', 4);
INSERT INTO proveedor VALUES(10210009, "Leche La Vaca", '2016-03-14', 10);
INSERT INTO proveedor VALUES(1002313, "Salami el Salado", '2021-04-23', 12);
INSERT INTO proveedor VALUES(12045009, "Harinas SAS", '2023-01-13', 3);



-- Datos de ingrediente
INSERT INTO ingrediente VALUES ('12345', 'Jamón Serrano', 2500, NULL, 2, '1000009');
INSERT INTO ingrediente VALUES ('141345', 'Masa pizza', NULL, NULL, 4, NULL);
INSERT INTO ingrediente VALUES ('121315', 'Salsa Pomodoro', NULL, NULL, 2, NULL);
INSERT INTO ingrediente VALUES ('213155', 'Salsa de Ajo', NULL, NULL, 4, NULL);
INSERT INTO ingrediente VALUES ('12315', 'Tomates', 1500, '121315', 5, '1000007');
INSERT INTO ingrediente VALUES ('09232', 'Harina de trigo', 3000, '141345', 4, '12045009');
INSERT INTO ingrediente VALUES ('23152', 'Ajo en polvo', 1400, '213155', 5, '1009342');
INSERT INTO ingrediente VALUES ('92831', 'Albaca', 500, '121315', 5, '10210009');
INSERT INTO ingrediente VALUES ('218452', 'Queso Motzarella', 7500, NULL, 3, '1004231');
INSERT INTO ingrediente VALUES ('218823', 'Queso Parmesano', 11500, NULL, 3, '10002349');
INSERT INTO ingrediente VALUES ('263423', 'Jamón Ibérico', 23000, NULL, 1, '10000531');


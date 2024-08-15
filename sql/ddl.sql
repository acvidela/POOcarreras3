CREATE TABLE atletas (
	id serial NOT NULL,
	nombre varchar(255) NULL,
	fechadenacimiento date NULL,
	email varchar(255) NULL,
	CONSTRAINT atletas_pkey PRIMARY KEY (id)
);

CREATE TABLE kits (
	id serial NOT NULL,
	remera bool NULL,
	numero bool NULL,
	medalla bool NULL,
	chip bool NULL,
	id_carrera int4 NULL,
	CONSTRAINT kits_pkey PRIMARY KEY (id)
);


CREATE TABLE carreras (
	id serial NOT NULL,
	nombre varchar(255) NULL,
	circuito varchar(255) NULL,
	fecha date NULL,
	precio int4 NULL,
	id_kits int4 NULL,
	CONSTRAINT carreras_pkey PRIMARY KEY (id)
);

CREATE TABLE participantes (
	id serial NOT NULL,
	id_carrera int4 NULL,
	id_atleta int4 NULL,
	pago money NULL DEFAULT 0,
	pos_general int4 NULL DEFAULT 0,
	pos_categoria int4 NULL DEFAULT 0,
	categoria varchar NULL,
	finalizo bool NULL DEFAULT false,
	CONSTRAINT participantes_pk PRIMARY KEY (id)
);

INSERT INTO atletas (id, nombre, fechadenacimiento, email) VALUES
(2, 'josefa', '2000-11-30', 'josefa@example.com'),
(3, 'Maria Mendoza', '2000-08-05', 'mmendoza@gmail.com'),
(4, 'José Gutierrez', '1998-09-02', 'josesitowinner@yahoo.com'),
(6, 'Jose Peralta', '1988-12-11', 'jose@example.com'),
(5, 'Lorenzo Perez', '2001-05-09', 'loren@gmail.com'),
(7, 'Veronica Moronni', '1970-01-01', 'verom@example.com'),
(10, 'Maria Ines Poli', '2000-03-03', 'polipoli@yahoo.com.ar'),
(12, 'Martin Caresia', '1994-12-25', 'martin.2512@hotmail.com'),
(13, 'Julian Serrano', '2000-06-11', 'juligamer@gmail.com'),
(14, 'Jesus', '1970-01-01', 'madijlkasdjg@gormaslkfa.com'),
(15, 'Pedro', '1994-12-25', 'masfsdlkgjsadlkgjsadg'),
(8, 'Jesús', '1979-12-25', 'jesucito@hotmail.com');


INSERT INTO kits (id, remera, numero, medalla, chip, id_carrera) VALUES
(2, false, false, true, true, 1),
(3, false, false, true, true, 2),
(5, false, true, true, false, NULL),
(8, true, false, true, false, 6),
(9, true, true, true, false, 7),
(10, true, false, true, true, 8),
(12, false, false, false, false, NULL),
(13, false, false, false, false, NULL),
(15, false, false, false, false, NULL),
(16, false, false, false, false, NULL),
(18, true, false, true, false, NULL),
(19, false, false, false, false, NULL),
(20, false, false, false, false, NULL),
(21, false, false, false, false, NULL),
(22, false, false, false, false, NULL),
(23, false, false, false, false, NULL),
(24, true, true, true, true, NULL),
(7, false, true, false, true, 5),
(14, true, false, true, false, 10),
(26, true, true, true, true, 14),
(27, true, true, true, false, 15),
(28, false, false, false, false, NULL),
(29, false, false, true, true, 16),
(30, true, false, false, true, 17),
(31, false, false, true, true, 18);




INSERT INTO carreras (id, nombre, circuito, fecha, precio, id_kits) VALUES
(1, 'Pequeña San Silvestre', 'centro de Tandil', '2023-12-10', 6000, 2),
(2, 'Desafío del Dique', 'dique', '2024-03-05', 3000, 3),
(6, 'TECDA', 'escuela Normal', '2023-12-15', 0, 8),
(7, 'Desafío Cascada', 'la cascada', '2024-01-05', 5000, 9),
(8, 'ATR', 'Cerro el centinela', '2024-08-05', 600, 10),
(5, 'desafio enero', 'dique', '2024-01-12', 500, 7),
(10, 'Dique running II', 'dique de Tandil', '2024-09-20', 4000, 14),
(14, 'Ayres serranos', 'mitre 500', '2025-08-05', 123, 26),
(15, 'Jano x todos', 'Villa Italia', '2024-11-11', 8500, 27),
(16, 'sfjalskdjf', 'fsldkajfalsdf', '2024-12-25', 10, 29),
(17, '123', 'asdasd', '2024-04-20', 10, 30),
(18, '3 monumentos', 'dique', '2024-12-25', 10, 31);


INSERT INTO participantes (id, id_carrera, id_atleta, pago, pos_general, pos_categoria, categoria, finalizo) VALUES
(27, 14, 2, 0.00, 1, 1, 'F', true),
(25, 14, 15, 0.00, 2, 1, 'M', true),
(28, 14, 7, 0.00, 3, 2, 'F', true),
(26, 14, 4, 0.00, 4, 2, 'M', true),
(23, 14, 8, 0.00, 6, 4, 'M', true),
(4, 7, 6, 900.00, 1, 0, 'M', true),
(8, 1, 4, 0.00, 1, 1, 'M', true),
(6, 1, 2, 0.00, 2, 1, 'F', true),
(7, 1, 3, 0.00, 3, 2, 'F', true),
(12, 2, 10, 0.00, 1, 1, 'F', true),
(10, 2, 7, 0.00, 2, 2, 'F', true),
(11, 2, 8, 0.00, 3, 1, 'M', true),
(9, 2, 5, 0.00, 4, 1, 'M', true),
(20, 8, 10, 0.00, 2, 1, 'F', true),
(29, 15, 2, 0.00, 1, 1, 'F', true),
(16, 15, 5, 0.00, 2, 1, 'M', true),
(17, 15, 12, 0.00, 3, 2, 'M', true),
(14, 15, 8, 0.00, 4, 3, 'M', true),
(21, 8, 12, 0.00, 4, 2, 'M', true),
(30, 15, 7, 0.00, 5, 2, 'F', true);


ALTER TABLE kits ADD CONSTRAINT kits_id_carrera_fkey FOREIGN KEY (id_carrera) REFERENCES carreras(id) ON DELETE CASCADE;
ALTER TABLE carreras ADD CONSTRAINT carreras_id_kits_fkey FOREIGN KEY (id_kits) REFERENCES kits(id);
ALTER TABLE participantes ADD CONSTRAINT participantes_id_atleta_fkey FOREIGN KEY (id_atleta) REFERENCES atletas(id) ON DELETE CASCADE;
ALTER TABLE participantes ADD CONSTRAINT participantes_id_carrera_fkey FOREIGN KEY (id_carrera) REFERENCES carreras(id) ON DELETE CASCADE;

--
-- PostgreSQL database dump
--

-- Dumped from database version 10.23
-- Dumped by pg_dump version 10.23

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'WIN1252';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: atletas; Type: TABLE; Schema: public; Owner: Ana
--

CREATE TABLE public.atletas (
    id integer NOT NULL,
    nombre character varying(255),
    fechadenacimiento date,
    email character varying(255)
);


ALTER TABLE public.atletas OWNER TO "Ana";

--
-- Name: atletas_id_seq; Type: SEQUENCE; Schema: public; Owner: Ana
--

CREATE SEQUENCE public.atletas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.atletas_id_seq OWNER TO "Ana";

--
-- Name: atletas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Ana
--

ALTER SEQUENCE public.atletas_id_seq OWNED BY public.atletas.id;


--
-- Name: carreras; Type: TABLE; Schema: public; Owner: Ana
--

CREATE TABLE public.carreras (
    id integer NOT NULL,
    nombre character varying(255),
    circuito character varying(255),
    fecha date,
    precio integer,
    id_kits integer
);


ALTER TABLE public.carreras OWNER TO "Ana";

--
-- Name: carreras_id_seq; Type: SEQUENCE; Schema: public; Owner: Ana
--

CREATE SEQUENCE public.carreras_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.carreras_id_seq OWNER TO "Ana";

--
-- Name: carreras_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Ana
--

ALTER SEQUENCE public.carreras_id_seq OWNED BY public.carreras.id;


--
-- Name: kits; Type: TABLE; Schema: public; Owner: Ana
--

CREATE TABLE public.kits (
    id integer NOT NULL,
    remera boolean,
    numero boolean,
    medalla boolean,
    chip boolean,
    id_carrera integer
);


ALTER TABLE public.kits OWNER TO "Ana";

--
-- Name: kits_id_seq; Type: SEQUENCE; Schema: public; Owner: Ana
--

CREATE SEQUENCE public.kits_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kits_id_seq OWNER TO "Ana";

--
-- Name: kits_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Ana
--

ALTER SEQUENCE public.kits_id_seq OWNED BY public.kits.id;


--
-- Name: participantes; Type: TABLE; Schema: public; Owner: Ana
--

CREATE TABLE public.participantes (
    id integer NOT NULL,
    id_carrera integer,
    id_atleta integer,
    pago money DEFAULT 0,
    pos_general integer DEFAULT 0,
    pos_categoria integer DEFAULT 0,
    categoria character varying,
    finalizo boolean DEFAULT false
);


ALTER TABLE public.participantes OWNER TO "Ana";

--
-- Name: participantes_id_seq; Type: SEQUENCE; Schema: public; Owner: Ana
--

CREATE SEQUENCE public.participantes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.participantes_id_seq OWNER TO "Ana";

--
-- Name: participantes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Ana
--

ALTER SEQUENCE public.participantes_id_seq OWNED BY public.participantes.id;


--
-- Name: atletas id; Type: DEFAULT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.atletas ALTER COLUMN id SET DEFAULT nextval('public.atletas_id_seq'::regclass);


--
-- Name: carreras id; Type: DEFAULT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.carreras ALTER COLUMN id SET DEFAULT nextval('public.carreras_id_seq'::regclass);


--
-- Name: kits id; Type: DEFAULT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.kits ALTER COLUMN id SET DEFAULT nextval('public.kits_id_seq'::regclass);


--
-- Name: participantes id; Type: DEFAULT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.participantes ALTER COLUMN id SET DEFAULT nextval('public.participantes_id_seq'::regclass);


--
-- Data for Name: atletas; Type: TABLE DATA; Schema: public; Owner: Ana
--

COPY public.atletas (id, nombre, fechadenacimiento, email) FROM stdin;
2	josefa	2000-11-30	josefa@example.com
3	Maria Mendoza	2000-08-05	mmendoza@gmail.com
4	José Gutierrez	1998-09-02	josesitowinner@yahoo.com
6	Jose Peralta	1988-12-11	jose@example.com
5	Lorenzo Perez	2001-05-09	loren@gmail.com
7	Veronica Moronni	1970-01-01	verom@example.com
10	Maria Ines Poli	2000-03-03	polipoli@yahoo.com.ar
12	Martin Caresia	1994-12-25	martin.2512@hotmail.com
13	Julian Serrano	2000-06-11	juligamer@gmail.com
14	Jesus	1970-01-01	madijlkasdjg@gormaslkfa.com
15	Pedro	1994-12-25	masfsdlkgjsadlkgjsadg
8	Jesús 	1979-12-25	jesucito@hotmail.com
\.


--
-- Data for Name: carreras; Type: TABLE DATA; Schema: public; Owner: Ana
--

COPY public.carreras (id, nombre, circuito, fecha, precio, id_kits) FROM stdin;
1	Pequeña San Silvestre	centro de Tandil	2023-12-10	6000	2
2	Desafío del Dique	dique	2024-03-05	3000	3
6	TECDA	escuela Normal	2023-12-15	0	8
7	Desafío Cascada	la cascada	2024-01-05	5000	9
8	ATR	Cerro el centinela	2024-08-05	600	10
5	desafio enero	dique	2024-01-12	500	7
10	Dique running II	dique de Tandil	2024-09-20	4000	14
14	Ayres serranos	mitre 500	2025-08-05	123	26
15	Jano x todos	Villa Italia	2024-11-11	8500	27
16	sfjalskdjf	fsldkajfalsdf	2024-12-25	10	29
17	123	asdasd	2024-04-20	10	30
18	3 monumentos	dique	2024-12-25	10	31
\.


--
-- Data for Name: kits; Type: TABLE DATA; Schema: public; Owner: Ana
--

COPY public.kits (id, remera, numero, medalla, chip, id_carrera) FROM stdin;
5	f	t	t	f	\N
12	f	f	f	f	\N
15	f	f	f	f	\N
16	f	f	f	f	\N
18	t	f	t	f	\N
19	f	f	f	f	\N
20	f	f	f	f	\N
21	f	f	f	f	\N
22	f	f	f	f	\N
23	f	f	f	f	\N
24	t	t	t	t	\N
28	f	f	f	f	\N
2	f	f	t	t	1
3	f	f	t	t	2
8	t	f	t	f	6
9	t	t	t	f	7
10	t	f	t	t	8
7	f	t	f	t	5
14	t	f	t	f	10
26	t	t	t	t	14
27	t	t	t	f	15
29	f	f	t	t	16
30	t	f	f	t	17
31	f	f	t	t	18
\.


--
-- Data for Name: participantes; Type: TABLE DATA; Schema: public; Owner: Ana
--

COPY public.participantes (id, id_carrera, id_atleta, pago, pos_general, pos_categoria, categoria, finalizo) FROM stdin;
27	14	2	0,00 €	1	1	F	t
25	14	15	0,00 €	2	1	M	t
28	14	7	0,00 €	3	2	F	t
26	14	4	0,00 €	4	2	M	t
23	14	8	0,00 €	6	4	M	t
4	7	6	900,00 €	1	0	M	t
8	1	4	0,00 €	1	1	M	t
6	1	2	0,00 €	2	1	F	t
7	1	3	0,00 €	3	2	F	t
12	2	10	0,00 €	1	1	F	t
10	2	7	0,00 €	2	2	F	t
11	2	8	0,00 €	3	1	M	t
9	2	5	0,00 €	4	1	M	t
20	8	10	0,00 €	2	1	F	t
29	15	2	0,00 €	1	1	F	t
16	15	5	0,00 €	2	1	M	t
17	15	12	0,00 €	3	2	M	t
14	15	8	0,00 €	4	3	M	t
21	8	12	0,00 €	4	2	M	t
30	15	7	0,00 €	5	2	F	t
\.


--
-- Name: atletas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Ana
--

SELECT pg_catalog.setval('public.atletas_id_seq', 1, false);


--
-- Name: carreras_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Ana
--

SELECT pg_catalog.setval('public.carreras_id_seq', 1, false);


--
-- Name: kits_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Ana
--

SELECT pg_catalog.setval('public.kits_id_seq', 1, false);


--
-- Name: participantes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Ana
--

SELECT pg_catalog.setval('public.participantes_id_seq', 1, false);


--
-- Name: atletas atletas_pkey; Type: CONSTRAINT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.atletas
    ADD CONSTRAINT atletas_pkey PRIMARY KEY (id);


--
-- Name: carreras carreras_pkey; Type: CONSTRAINT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.carreras
    ADD CONSTRAINT carreras_pkey PRIMARY KEY (id);


--
-- Name: kits kits_pkey; Type: CONSTRAINT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.kits
    ADD CONSTRAINT kits_pkey PRIMARY KEY (id);


--
-- Name: participantes participantes_pk; Type: CONSTRAINT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.participantes
    ADD CONSTRAINT participantes_pk PRIMARY KEY (id);


--
-- Name: carreras carreras_id_kits_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.carreras
    ADD CONSTRAINT carreras_id_kits_fkey FOREIGN KEY (id_kits) REFERENCES public.kits(id);


--
-- Name: kits kits_id_carrera_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.kits
    ADD CONSTRAINT kits_id_carrera_fkey FOREIGN KEY (id_carrera) REFERENCES public.carreras(id) ON DELETE CASCADE;


--
-- Name: participantes participantes_id_atleta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.participantes
    ADD CONSTRAINT participantes_id_atleta_fkey FOREIGN KEY (id_atleta) REFERENCES public.atletas(id) ON DELETE CASCADE;


--
-- Name: participantes participantes_id_carrera_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Ana
--

ALTER TABLE ONLY public.participantes
    ADD CONSTRAINT participantes_id_carrera_fkey FOREIGN KEY (id_carrera) REFERENCES public.carreras(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--


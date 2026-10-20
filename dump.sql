--
-- PostgreSQL database dump
--

\restrict x7nkztFFOuJQTL7n4Sk4KbUeF8jlcqANxWzXrS5OwXNEJJNjS0uhWefMkGxhv6c

-- Dumped from database version 18.4 (Ubuntu 18.4-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.4 (Ubuntu 18.4-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: emprestimos; Type: TABLE; Schema: public; Owner: biblioteca
--

CREATE TABLE public.emprestimos (
    id integer NOT NULL,
    nome_pessoa character varying(100) NOT NULL,
    livro_id integer NOT NULL,
    data_emprestimo date NOT NULL,
    data_devolucao date,
    status character varying(20) NOT NULL
);


ALTER TABLE public.emprestimos OWNER TO biblioteca;

--
-- Name: emprestimos_id_seq; Type: SEQUENCE; Schema: public; Owner: biblioteca
--

CREATE SEQUENCE public.emprestimos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.emprestimos_id_seq OWNER TO biblioteca;

--
-- Name: emprestimos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: biblioteca
--

ALTER SEQUENCE public.emprestimos_id_seq OWNED BY public.emprestimos.id;


--
-- Name: livros; Type: TABLE; Schema: public; Owner: biblioteca
--

CREATE TABLE public.livros (
    id integer NOT NULL,
    titulo character varying(150) NOT NULL,
    autor character varying(100) NOT NULL,
    genero character varying(100) NOT NULL,
    ano_publicacao integer NOT NULL,
    editora character varying(100) NOT NULL,
    estoque integer NOT NULL
);


ALTER TABLE public.livros OWNER TO biblioteca;

--
-- Name: livros_id_seq; Type: SEQUENCE; Schema: public; Owner: biblioteca
--

CREATE SEQUENCE public.livros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.livros_id_seq OWNER TO biblioteca;

--
-- Name: livros_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: biblioteca
--

ALTER SEQUENCE public.livros_id_seq OWNED BY public.livros.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: biblioteca
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    senha character varying(255) NOT NULL,
    tipo character varying(20) DEFAULT 'usuario'::character varying NOT NULL
);


ALTER TABLE public.usuarios OWNER TO biblioteca;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: biblioteca
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO biblioteca;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: biblioteca
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- Name: emprestimos id; Type: DEFAULT; Schema: public; Owner: biblioteca
--

ALTER TABLE ONLY public.emprestimos ALTER COLUMN id SET DEFAULT nextval('public.emprestimos_id_seq'::regclass);


--
-- Name: livros id; Type: DEFAULT; Schema: public; Owner: biblioteca
--

ALTER TABLE ONLY public.livros ALTER COLUMN id SET DEFAULT nextval('public.livros_id_seq'::regclass);


--
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: biblioteca
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Data for Name: emprestimos; Type: TABLE DATA; Schema: public; Owner: biblioteca
--

COPY public.emprestimos (id, nome_pessoa, livro_id, data_emprestimo, data_devolucao, status) FROM stdin;
2	Carlos Souza	2	2026-09-21	2026-09-25	Devolvido
3	Maria Oliveira	1	2026-09-22	2026-10-01	Devolvido
1	Ana Silva	1	2026-09-20	2026-10-01	Devolvido
4	joao	3	2004-12-09	2026-10-01	Devolvido
5	aU	7	2000-02-02	2026-10-08	Devolvido
6	Migsoph	2	2026-10-10	2026-10-08	Devolvido
\.


--
-- Data for Name: livros; Type: TABLE DATA; Schema: public; Owner: biblioteca
--

COPY public.livros (id, titulo, autor, genero, ano_publicacao, editora, estoque) FROM stdin;
1	Harry Potter e a Pedra Filosofal	J.K. Rowling	Fantasia	1997	Rocco	7
3	Dom Casmurro	Machado de Assis	Romance	1899	Globo	4
8	O Pequeno Príncipe Preto	Rodrigo França	Ficção	2020	Nova Fronteira	15
2	O Pequeno Príncipe	Antoine de Saint-Exupéry	Fantasia	1943	Agir	3
7	Era uma vez um coração partido	Stephanie Garber	Romantasia	2022	Gutenberg	1000
9	Bilionários nazistas	David de Jong	história	2023	Companhia das Letras	20
10	Criolo: um sobrevivente em meio ao caos	Eu	Terror	2014	.	1
11	22	é 	bolsonaro	22	chora pt	22
12	13	é	lula	13	sai pl	13
13	14	é	renan santos	14	chora pt e sai pl	14
14	PT	Lula Inacio	Perigoso	2026	.	1
15	Binding 13	 Chloe Walsh	 Romance de amor	2005	Bloom Brasil	30
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: biblioteca
--

COPY public.usuarios (id, nome, email, senha, tipo) FROM stdin;
1	teste	teste@gmail.com	$2y$12$S1HGwvk4gtNovGiWIrUFt.kzXP9czFU8nbf2GgNeNpT9SBe7vzJiW	usuario
3	Julia	julia@gmail.com	$2y$12$KLrAl3Lb3FZJXCUHgA/le.w3zXyUToant1zWKh1Z67neMZhd5WD7a	usuario
4	alicia	aliciaeliza@gmail.com	$2y$12$0NaBnq9nvXnt84UJuwV7MuIcshidAmEOF.LuQDIJke8YmNOz15Qam	usuario
5	Migsoph	migsoph@gmail.com	$2y$12$cqg0ciMmbr4E51DQjY563.9rcVWFA2ITh263P3cfFJc1DiY25JwFm	usuario
6	Morato	morato@gmail.com	$2y$12$tVOq67IOHiuHzhVlKz02SOjsuglhOn49r7kKpk49T1wD3wk78VHl2	usuario
2	catarine	catarine@gmail.com	$2y$12$FaagqqHfEN1jePuE.q6nSunZD3sO21bgGOvlYiOIrsXyBJ3Xc2I6K	admin
7	Cauê Pícoli Andréo da Silva	caue.p.silva@edu.senai.br	$2y$12$4Uh08JnKGcLt//8cke83ouK46L6I0rcriwU.wP2sM3ZMF7sKa7MdS	usuario
8	Elis 	elis.perin6@gmail.com	$2y$12$73OTa3sjbkWT86iMeTDjhuyaTBu0VNtZre.t0BSWgKQTff9uIONa6	usuario
10	Ga	g@g.com	$2y$12$3IwlAArWzoOQKno1gBAL/OXjO/iogH96g4PUvEJ9iUDHSsWkmcLuq	usuario
11	nicollas	nicollas.goncalves@edu.senai.br	$2y$12$V8DSYD08oBlMTAdRbsAvS.jyM07L4DBB9G3CA3MyBbRy0luF5e2Ji	usuario
12	Isabela	isabela@gmail	$2y$12$S3xFb37RHstCEyxgIrDpg.6R8yePTtrrnOz/M6mr9VDQrNtmbPxwy	usuario
13	Sophie Neri de Carvalho	sophie.carvalho@gmail.com	$2y$12$UmfSjEMd6FdzH8hPgkrqCOM6BCBuVSHPhXNhvTUh6w9HvOsEPHWlW	usuario
14	Murillo Cena	murillo@gmail.com	$2y$12$wGYRVHf0j2aonz9Yvadwne3A7kJoHb/vXgpfL3enJAiVZ0huUd7MW	usuario
15	miguel gomes	miguel.s.silva9@edu.senai.br	$2y$12$CkU6F9OnbCQCs.G.Zy1Gqu9fwrr/m0P0.nubA3EcKsvez/HC1k.VK	usuario
\.


--
-- Name: emprestimos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: biblioteca
--

SELECT pg_catalog.setval('public.emprestimos_id_seq', 6, true);


--
-- Name: livros_id_seq; Type: SEQUENCE SET; Schema: public; Owner: biblioteca
--

SELECT pg_catalog.setval('public.livros_id_seq', 15, true);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: biblioteca
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 15, true);


--
-- Name: emprestimos emprestimos_pkey; Type: CONSTRAINT; Schema: public; Owner: biblioteca
--

ALTER TABLE ONLY public.emprestimos
    ADD CONSTRAINT emprestimos_pkey PRIMARY KEY (id);


--
-- Name: livros livros_pkey; Type: CONSTRAINT; Schema: public; Owner: biblioteca
--

ALTER TABLE ONLY public.livros
    ADD CONSTRAINT livros_pkey PRIMARY KEY (id);


--
-- Name: usuarios usuarios_email_key; Type: CONSTRAINT; Schema: public; Owner: biblioteca
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_email_key UNIQUE (email);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: biblioteca
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: emprestimos emprestimos_livro_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: biblioteca
--

ALTER TABLE ONLY public.emprestimos
    ADD CONSTRAINT emprestimos_livro_id_fkey FOREIGN KEY (livro_id) REFERENCES public.livros(id);


--
-- PostgreSQL database dump complete
--

\unrestrict x7nkztFFOuJQTL7n4Sk4KbUeF8jlcqANxWzXrS5OwXNEJJNjS0uhWefMkGxhv6c


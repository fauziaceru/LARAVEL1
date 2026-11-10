--
-- PostgreSQL database dump
--

\restrict ofYliI0wMMs3X5WPEkDhZWy84hZ7SebYZpnGA9xJJJJbYB3vYqSwkSzQP9r7nTn

-- Dumped from database version 18.6
-- Dumped by pg_dump version 18.6

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
-- Name: akun; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.akun (
    id bigint NOT NULL,
    kode character varying(20) NOT NULL,
    nama character varying(100) NOT NULL,
    saldo_awal numeric(14,2) DEFAULT '0'::numeric NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.akun OWNER TO kas_kelas_app;

--
-- Name: akun_id_seq; Type: SEQUENCE; Schema: public; Owner: kas_kelas_app
--

CREATE SEQUENCE public.akun_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.akun_id_seq OWNER TO kas_kelas_app;

--
-- Name: akun_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kas_kelas_app
--

ALTER SEQUENCE public.akun_id_seq OWNED BY public.akun.id;


--
-- Name: cache; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration bigint NOT NULL
);


ALTER TABLE public.cache OWNER TO kas_kelas_app;

--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration bigint NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO kas_kelas_app;

--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO kas_kelas_app;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: kas_kelas_app
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO kas_kelas_app;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kas_kelas_app
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO kas_kelas_app;

--
-- Name: jobs; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO kas_kelas_app;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: kas_kelas_app
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO kas_kelas_app;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kas_kelas_app
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: kategori; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.kategori (
    id bigint NOT NULL,
    kode character varying(20) NOT NULL,
    nama character varying(100) NOT NULL,
    jenis character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT kategori_jenis_check CHECK (((jenis)::text = ANY ((ARRAY['Pemasukan'::character varying, 'Pengeluaran'::character varying])::text[])))
);


ALTER TABLE public.kategori OWNER TO kas_kelas_app;

--
-- Name: kategori_id_seq; Type: SEQUENCE; Schema: public; Owner: kas_kelas_app
--

CREATE SEQUENCE public.kategori_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.kategori_id_seq OWNER TO kas_kelas_app;

--
-- Name: kategori_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kas_kelas_app
--

ALTER SEQUENCE public.kategori_id_seq OWNED BY public.kategori.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO kas_kelas_app;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: kas_kelas_app
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO kas_kelas_app;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kas_kelas_app
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO kas_kelas_app;

--
-- Name: sessions; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO kas_kelas_app;

--
-- Name: transaksi; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.transaksi (
    id bigint NOT NULL,
    kategori_id bigint NOT NULL,
    akun_id bigint NOT NULL,
    tanggal date NOT NULL,
    jumlah numeric(14,2) NOT NULL,
    keterangan text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.transaksi OWNER TO kas_kelas_app;

--
-- Name: transaksi_id_seq; Type: SEQUENCE; Schema: public; Owner: kas_kelas_app
--

CREATE SEQUENCE public.transaksi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.transaksi_id_seq OWNER TO kas_kelas_app;

--
-- Name: transaksi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kas_kelas_app
--

ALTER SEQUENCE public.transaksi_id_seq OWNED BY public.transaksi.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: kas_kelas_app
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO kas_kelas_app;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: kas_kelas_app
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO kas_kelas_app;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kas_kelas_app
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: akun id; Type: DEFAULT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.akun ALTER COLUMN id SET DEFAULT nextval('public.akun_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: kategori id; Type: DEFAULT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.kategori ALTER COLUMN id SET DEFAULT nextval('public.kategori_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: transaksi id; Type: DEFAULT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.transaksi ALTER COLUMN id SET DEFAULT nextval('public.transaksi_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: akun; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.akun (id, kode, nama, saldo_awal, created_at, updated_at) FROM stdin;
1	112	KAS MINI	200000.00	2026-10-19 03:51:37	2026-10-31 09:46:27
4	114	KAS POS	150000.00	2026-10-31 09:47:31	2026-10-31 09:47:44
\.


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.cache (key, value, expiration) FROM stdin;
kas-kelas-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer	i:1794056619;	1794056619
kas-kelas-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6	i:1;	1794056619
\.


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Data for Name: kategori; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.kategori (id, kode, nama, jenis, created_at, updated_at) FROM stdin;
2	ATK	Alat Tulis	Pengeluaran	2026-10-19 03:51:37	2026-10-19 03:51:37
4	BONUS	NGAMEN	Pemasukan	2026-10-31 08:23:14	2026-10-31 08:23:33
5	ELEKTRONIK	LAPTOP	Pemasukan	2026-10-31 08:24:23	2026-10-31 08:24:23
6	SEDEKAH	PAnti	Pengeluaran	2026-10-31 08:26:04	2026-10-31 08:26:04
1	IURAN	Iuran Anggota Keluarga	Pengeluaran	2026-10-19 03:51:37	2026-10-31 08:32:20
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2026_10_01_074857_create_kategori_table	1
5	2026_10_01_074858_create_akun_table	1
6	2026_10_01_074909_create_transaksi_table	1
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
G54nXjWLaip0OoutpgeV5ViPwfyEJL2PdJfkWSZ8	1	127.0.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0	eyJfdG9rZW4iOiIweDRGN0dEclhQOTBUUE8ya0JyeEFLVVNvZkZTZ1pRejcwYW9PTkluIiwiZmlsYW1lbnQiOnsibm90aWZpY2F0aW9ucyI6eyJtYWlsYm94IjoiOE9xOUVrQ3JPVm1XRDF1N01WUzBxZWZjQ2JEWXlDVHhqUDUzYkpEWCJ9LCJ0YWJsZXMiOnsiZGEwNDQ0OGYzZWZmY2M3NzUyZmE4ZjVmMTYxZTdlOGRmNTA0ZTkxMmMyZmEzYTk1NjViYTQ1ZmZiMWZlZTVmMiI6eyJjb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImtvZGUiLCJsYWJlbCI6IktvZGUiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibmFtYSIsImxhYmVsIjoiTmFtYSIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJqZW5pcyIsImxhYmVsIjoiSmVuaXMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidHJhbnNha3NpX2NvdW50IiwibGFiZWwiOiJKdW1sYWggdHJhbnNha3NpIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InVwZGF0ZWRfYXQiLCJsYWJlbCI6IlRlcmFraGlyIERpcGVyYmFydWkiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOnRydWV9XX0sImZkZWFiYjJmMGMyNWM4YTMwMDAwMDhmOGMxNmQ4YzY2MGQ4ZWZmODdjOTBiODAxODFlNzg3NzU4Y2MxNGUwYzUiOnsiY29sdW1ucyI6W3sidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJrb2RlIiwibGFiZWwiOiJLb2RlIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im5hbWEiLCJsYWJlbCI6Ik5hbWEiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoic2FsZG9fYXdhbCIsImxhYmVsIjoiU2FsZG8gYXdhbCIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJ0cmFuc2Frc2lfY291bnQiLCJsYWJlbCI6Ikp1bWxhaCB0cmFuc2Frc2kiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfV19fX0sInVybCI6W10sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW5cL2thdGVnb3JpcyIsInJvdXRlIjoiZmlsYW1lbnQuYWRtaW4ucmVzb3VyY2VzLmthdGVnb3Jpcy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxLCJwYXNzd29yZF9oYXNoX3dlYiI6ImFmNTUxMmQ2MDkyNjNkNWUxYjM0OGRlNTQ1NzE0MDNjMDNlMGYxMmFjNzY3YzBhNDJlOTBkNTc2MjAzM2JmYWQifQ==	1794057835
\.


--
-- Data for Name: transaksi; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.transaksi (id, kategori_id, akun_id, tanggal, jumlah, keterangan, created_at, updated_at) FROM stdin;
1	1	1	2026-08-22	442504.38	Dolor deleniti voluptate laborum quia.	2026-10-19 03:51:37	2026-10-19 03:51:37
2	1	1	2026-08-22	467456.92	Quis cupiditate maxime vero id unde eum.	2026-10-19 03:51:37	2026-10-19 03:51:37
3	1	1	2026-09-19	480691.31	Aut reprehenderit est accusamus qui cupiditate.	2026-10-19 03:51:37	2026-10-19 03:51:37
4	1	1	2026-10-12	349786.75	Rerum sunt voluptas mollitia ut et quibusdam sapiente.	2026-10-19 03:51:37	2026-10-19 03:51:37
5	1	1	2026-10-06	149266.12	Quidem voluptatem rerum consequuntur voluptatibus ut ut.	2026-10-19 03:51:37	2026-10-19 03:51:37
6	1	1	2026-09-11	51834.96	Accusantium asperiores et qui alias.	2026-10-19 03:51:37	2026-10-19 03:51:37
7	1	1	2026-09-08	492378.38	Est sequi sapiente animi repellat.	2026-10-19 03:51:37	2026-10-19 03:51:37
8	1	1	2026-08-05	155680.55	Laudantium modi et debitis veniam pariatur eveniet architecto.	2026-10-19 03:51:37	2026-10-19 03:51:37
9	1	1	2026-08-01	468793.10	Quibusdam amet natus ipsam.	2026-10-19 03:51:37	2026-10-19 03:51:37
10	1	1	2026-10-14	409429.28	Saepe quidem sit voluptatibus qui tempora consectetur dolorum.	2026-10-19 03:51:37	2026-10-19 03:51:37
11	2	1	2026-08-25	457523.13	Sapiente fuga qui cum et ut ut ut.	2026-10-19 03:51:37	2026-10-19 03:51:37
12	2	1	2026-08-28	451217.66	Maiores nobis dolores eius quaerat similique et.	2026-10-19 03:51:37	2026-10-19 03:51:37
13	2	1	2026-09-28	107054.80	Impedit natus iste quam voluptatem suscipit maxime.	2026-10-19 03:51:37	2026-10-19 03:51:37
14	2	1	2026-08-23	95342.85	Saepe aut sequi sed est sed fugiat.	2026-10-19 03:51:37	2026-10-19 03:51:37
15	2	1	2026-09-13	144252.72	Iure aspernatur illum sit non sequi ducimus nihil quibusdam.	2026-10-19 03:51:37	2026-10-19 03:51:37
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: kas_kelas_app
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
1	Fauziar	fauziar.44124010@mhs.polines.ac.id	\N	$2y$12$7y8ZYOWApOiBB81oFOcqPuHDUCDF4cmDy3utQp89y8l6VkvFG7b3q	LQAcjdZFUXNXMjfg7kJf4TN076XLWJCAPcLRRqVJQrQBDITrfahlMrOWXFdF	2026-10-31 07:01:50	2026-10-31 07:01:50
\.


--
-- Name: akun_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kas_kelas_app
--

SELECT pg_catalog.setval('public.akun_id_seq', 6, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kas_kelas_app
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kas_kelas_app
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: kategori_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kas_kelas_app
--

SELECT pg_catalog.setval('public.kategori_id_seq', 6, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kas_kelas_app
--

SELECT pg_catalog.setval('public.migrations_id_seq', 6, true);


--
-- Name: transaksi_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kas_kelas_app
--

SELECT pg_catalog.setval('public.transaksi_id_seq', 15, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kas_kelas_app
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- Name: akun akun_kode_unique; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.akun
    ADD CONSTRAINT akun_kode_unique UNIQUE (kode);


--
-- Name: akun akun_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.akun
    ADD CONSTRAINT akun_pkey PRIMARY KEY (id);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: kategori kategori_kode_unique; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.kategori
    ADD CONSTRAINT kategori_kode_unique UNIQUE (kode);


--
-- Name: kategori kategori_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.kategori
    ADD CONSTRAINT kategori_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: transaksi transaksi_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT transaksi_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: cache_expiration_index; Type: INDEX; Schema: public; Owner: kas_kelas_app
--

CREATE INDEX cache_expiration_index ON public.cache USING btree (expiration);


--
-- Name: cache_locks_expiration_index; Type: INDEX; Schema: public; Owner: kas_kelas_app
--

CREATE INDEX cache_locks_expiration_index ON public.cache_locks USING btree (expiration);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: kas_kelas_app
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: kas_kelas_app
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: kas_kelas_app
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: transaksi transaksi_akun_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT transaksi_akun_id_foreign FOREIGN KEY (akun_id) REFERENCES public.akun(id) ON DELETE RESTRICT;


--
-- Name: transaksi transaksi_kategori_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: kas_kelas_app
--

ALTER TABLE ONLY public.transaksi
    ADD CONSTRAINT transaksi_kategori_id_foreign FOREIGN KEY (kategori_id) REFERENCES public.kategori(id) ON DELETE RESTRICT;


--
-- PostgreSQL database dump complete
--

\unrestrict ofYliI0wMMs3X5WPEkDhZWy84hZ7SebYZpnGA9xJJJJbYB3vYqSwkSzQP9r7nTn


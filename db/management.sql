PGDMP     '    +                z         
   management    14.1    14.1                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    17170 
   management    DATABASE     m   CREATE DATABASE management WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE management;
                postgres    false            �            1259    17191    msuser    TABLE     �   CREATE TABLE public.msuser (
    userid integer NOT NULL,
    name character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at timestamp without time zone
);
    DROP TABLE public.msuser;
       public         heap    postgres    false            �            1259    17196    dt_user_userid_seq    SEQUENCE     �   CREATE SEQUENCE public.dt_user_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.dt_user_userid_seq;
       public          postgres    false    209                       0    0    dt_user_userid_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.dt_user_userid_seq OWNED BY public.msuser.userid;
          public          postgres    false    210            �            1259    34363 
   mstasklist    TABLE     �  CREATE TABLE public.mstasklist (
    idtask integer NOT NULL,
    taskname character varying(255) NOT NULL,
    taskdesc character varying(255) NOT NULL,
    taskbadge character varying(255),
    datefinish date NOT NULL,
    taskstatus character varying(50) NOT NULL,
    createdby character varying(255),
    createddate timestamp with time zone,
    updateddate timestamp with time zone,
    taskcode character varying(8)
);
    DROP TABLE public.mstasklist;
       public         heap    postgres    false            �            1259    34362    mstask_idtask_seq    SEQUENCE     �   CREATE SEQUENCE public.mstask_idtask_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.mstask_idtask_seq;
       public          postgres    false    212                       0    0    mstask_idtask_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.mstask_idtask_seq OWNED BY public.mstasklist.idtask;
          public          postgres    false    211            �            1259    42555    mstasktitle    TABLE       CREATE TABLE public.mstasktitle (
    titleid integer NOT NULL,
    titlename character varying(255),
    createdby character varying(255),
    createddate timestamp without time zone,
    updatedby character varying(255),
    updateddate timestamp without time zone
);
    DROP TABLE public.mstasktitle;
       public         heap    postgres    false            �            1259    42554    mstasktitle_titleid_seq    SEQUENCE     �   CREATE SEQUENCE public.mstasktitle_titleid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.mstasktitle_titleid_seq;
       public          postgres    false    214                       0    0    mstasktitle_titleid_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.mstasktitle_titleid_seq OWNED BY public.mstasktitle.titleid;
          public          postgres    false    213            g           2604    34366    mstasklist idtask    DEFAULT     r   ALTER TABLE ONLY public.mstasklist ALTER COLUMN idtask SET DEFAULT nextval('public.mstask_idtask_seq'::regclass);
 @   ALTER TABLE public.mstasklist ALTER COLUMN idtask DROP DEFAULT;
       public          postgres    false    211    212    212            h           2604    42558    mstasktitle titleid    DEFAULT     z   ALTER TABLE ONLY public.mstasktitle ALTER COLUMN titleid SET DEFAULT nextval('public.mstasktitle_titleid_seq'::regclass);
 B   ALTER TABLE public.mstasktitle ALTER COLUMN titleid DROP DEFAULT;
       public          postgres    false    214    213    214            f           2604    17197    msuser userid    DEFAULT     o   ALTER TABLE ONLY public.msuser ALTER COLUMN userid SET DEFAULT nextval('public.dt_user_userid_seq'::regclass);
 <   ALTER TABLE public.msuser ALTER COLUMN userid DROP DEFAULT;
       public          postgres    false    210    209            �          0    34363 
   mstasklist 
   TABLE DATA           �   COPY public.mstasklist (idtask, taskname, taskdesc, taskbadge, datefinish, taskstatus, createdby, createddate, updateddate, taskcode) FROM stdin;
    public          postgres    false    212   �       �          0    42555    mstasktitle 
   TABLE DATA           i   COPY public.mstasktitle (titleid, titlename, createdby, createddate, updatedby, updateddate) FROM stdin;
    public          postgres    false    214   �       �          0    17191    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    209          	           0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 12, true);
          public          postgres    false    210            
           0    0    mstask_idtask_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.mstask_idtask_seq', 12, true);
          public          postgres    false    211                       0    0    mstasktitle_titleid_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.mstasktitle_titleid_seq', 17, true);
          public          postgres    false    213            j           2606    17200    msuser dt_user_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.msuser
    ADD CONSTRAINT dt_user_pkey PRIMARY KEY (userid);
 =   ALTER TABLE ONLY public.msuser DROP CONSTRAINT dt_user_pkey;
       public            postgres    false    209            l           2606    34370    mstasklist mstask_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.mstasklist
    ADD CONSTRAINT mstask_pkey PRIMARY KEY (idtask);
 @   ALTER TABLE ONLY public.mstasklist DROP CONSTRAINT mstask_pkey;
       public            postgres    false    212            n           2606    42562    mstasktitle mstasktitle_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.mstasktitle
    ADD CONSTRAINT mstasktitle_pkey PRIMARY KEY (titleid);
 F   ALTER TABLE ONLY public.mstasktitle DROP CONSTRAINT mstasktitle_pkey;
       public            postgres    false    214            �      x������ � �      �   i   x�34�,N�I��J�.��WN,)ʬ��4202�50�54V04�20�24��".C#΀������b���`��8CJ��9Sr3�P�ZZX��B��qqq �9%�      �   �   x�Uͻ�0@�}
V��/*��(�P5.��D��kL\Nr��1d�.���j�4F�j��F�rI�}v�`����� �����������V;��u���@@����`��ۖN1�Sy�Q\�L�H~6g�V]�0{����l��3�N����Z�ߑa<Ѹ���OE�R�Y-K7-n���N�;�     
PGDMP     	    5        	        z         
   management    14.1    14.1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    17170 
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
       public          postgres    false    209            �           0    0    dt_user_userid_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.dt_user_userid_seq OWNED BY public.msuser.userid;
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
    updateddate timestamp with time zone
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
       public          postgres    false    212            �           0    0    mstask_idtask_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.mstask_idtask_seq OWNED BY public.mstasklist.idtask;
          public          postgres    false    211            b           2604    34366    mstasklist idtask    DEFAULT     r   ALTER TABLE ONLY public.mstasklist ALTER COLUMN idtask SET DEFAULT nextval('public.mstask_idtask_seq'::regclass);
 @   ALTER TABLE public.mstasklist ALTER COLUMN idtask DROP DEFAULT;
       public          postgres    false    211    212    212            a           2604    17197    msuser userid    DEFAULT     o   ALTER TABLE ONLY public.msuser ALTER COLUMN userid SET DEFAULT nextval('public.dt_user_userid_seq'::regclass);
 <   ALTER TABLE public.msuser ALTER COLUMN userid DROP DEFAULT;
       public          postgres    false    210    209            �          0    34363 
   mstasklist 
   TABLE DATA           �   COPY public.mstasklist (idtask, taskname, taskdesc, taskbadge, datefinish, taskstatus, createdby, createddate, updateddate) FROM stdin;
    public          postgres    false    212   �       �          0    17191    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    209   '       �           0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 12, true);
          public          postgres    false    210            �           0    0    mstask_idtask_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.mstask_idtask_seq', 6, true);
          public          postgres    false    211            d           2606    17200    msuser dt_user_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.msuser
    ADD CONSTRAINT dt_user_pkey PRIMARY KEY (userid);
 =   ALTER TABLE ONLY public.msuser DROP CONSTRAINT dt_user_pkey;
       public            postgres    false    209            f           2606    34370    mstasklist mstask_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.mstasklist
    ADD CONSTRAINT mstask_pkey PRIMARY KEY (idtask);
 @   ALTER TABLE ONLY public.mstasklist DROP CONSTRAINT mstask_pkey;
       public            postgres    false    212            �   ?  x����N�0Eד��=jd;q�X�Q$6ݸ�i�#�E��q�Q��sgl��5�FjW��t8��#�MH6!%����0��Z�n�2�"a1))���a�Q��m�7���{齲����V3����NyU]�����8)��'�E��p����b�fǧ�3���l�r�
�w�I��Y�'@+���Yq%����bk�=x���}���"�$�Yz"0�U���9!}��&��ބ��m�NuF7��3;���5"HX��hqg�(uUC��ȱ�=¬��R�_?��Z�5���֟�}*�R�2f<c���qE_+�X      �   �   x�Uͻ�0@�}
V��/*��(�P5.��D��kL\Nr��1d�.���j�4F�j��F�rI�}v�`����� �����������V;��u���@@����`��ۖN1�Sy�Q\�L�H~6g�V]�0{����l��3�N����Z�ߑa<Ѹ���OE�R�Y-K7-n���N�;�     
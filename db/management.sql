PGDMP                         z         
   management    14.1    14.1 '               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    17170 
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
       public          postgres    false    209                       0    0    dt_user_userid_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.dt_user_userid_seq OWNED BY public.msuser.userid;
          public          postgres    false    210            �            1259    42570    msboard    TABLE     m   CREATE TABLE public.msboard (
    boardid integer NOT NULL,
    boardname character varying(255) NOT NULL
);
    DROP TABLE public.msboard;
       public         heap    postgres    false            �            1259    42569    msboard_boardid_seq    SEQUENCE     �   CREATE SEQUENCE public.msboard_boardid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.msboard_boardid_seq;
       public          postgres    false    212                       0    0    msboard_boardid_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.msboard_boardid_seq OWNED BY public.msboard.boardid;
          public          postgres    false    211            �            1259    50747 	   mscomment    TABLE     �   CREATE TABLE public.mscomment (
    commentid integer NOT NULL,
    taskid integer NOT NULL,
    message character varying(255) NOT NULL,
    createddate timestamp without time zone,
    createdby character varying(255) NOT NULL
);
    DROP TABLE public.mscomment;
       public         heap    postgres    false            �            1259    50746    mscomment_commentid_seq    SEQUENCE     �   CREATE SEQUENCE public.mscomment_commentid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.mscomment_commentid_seq;
       public          postgres    false    218                       0    0    mscomment_commentid_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.mscomment_commentid_seq OWNED BY public.mscomment.commentid;
          public          postgres    false    217            �            1259    42577    mstask    TABLE     �   CREATE TABLE public.mstask (
    taskid integer NOT NULL,
    taskname character varying(255),
    boardid integer NOT NULL,
    seq integer NOT NULL
);
    DROP TABLE public.mstask;
       public         heap    postgres    false            �            1259    42576    mstask_taskid_seq    SEQUENCE     �   CREATE SEQUENCE public.mstask_taskid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.mstask_taskid_seq;
       public          postgres    false    214                       0    0    mstask_taskid_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.mstask_taskid_seq OWNED BY public.mstask.taskid;
          public          postgres    false    213            �            1259    42584 
   mstasklist    TABLE     Y  CREATE TABLE public.mstasklist (
    id integer NOT NULL,
    taskid integer NOT NULL,
    tasklistname character varying(255) NOT NULL,
    description character varying(255),
    createddate timestamp without time zone,
    createdby character varying(255),
    updateddate timestamp without time zone,
    updatedby character varying(255)
);
    DROP TABLE public.mstasklist;
       public         heap    postgres    false            �            1259    42583    mstasklist_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mstasklist_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.mstasklist_id_seq;
       public          postgres    false    216                       0    0    mstasklist_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.mstasklist_id_seq OWNED BY public.mstasklist.id;
          public          postgres    false    215            q           2604    42573    msboard boardid    DEFAULT     r   ALTER TABLE ONLY public.msboard ALTER COLUMN boardid SET DEFAULT nextval('public.msboard_boardid_seq'::regclass);
 >   ALTER TABLE public.msboard ALTER COLUMN boardid DROP DEFAULT;
       public          postgres    false    211    212    212            t           2604    50750    mscomment commentid    DEFAULT     z   ALTER TABLE ONLY public.mscomment ALTER COLUMN commentid SET DEFAULT nextval('public.mscomment_commentid_seq'::regclass);
 B   ALTER TABLE public.mscomment ALTER COLUMN commentid DROP DEFAULT;
       public          postgres    false    218    217    218            r           2604    42580    mstask taskid    DEFAULT     n   ALTER TABLE ONLY public.mstask ALTER COLUMN taskid SET DEFAULT nextval('public.mstask_taskid_seq'::regclass);
 <   ALTER TABLE public.mstask ALTER COLUMN taskid DROP DEFAULT;
       public          postgres    false    213    214    214            s           2604    42587    mstasklist id    DEFAULT     n   ALTER TABLE ONLY public.mstasklist ALTER COLUMN id SET DEFAULT nextval('public.mstasklist_id_seq'::regclass);
 <   ALTER TABLE public.mstasklist ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    216    216            p           2604    17197    msuser userid    DEFAULT     o   ALTER TABLE ONLY public.msuser ALTER COLUMN userid SET DEFAULT nextval('public.dt_user_userid_seq'::regclass);
 <   ALTER TABLE public.msuser ALTER COLUMN userid DROP DEFAULT;
       public          postgres    false    210    209                      0    42570    msboard 
   TABLE DATA           5   COPY public.msboard (boardid, boardname) FROM stdin;
    public          postgres    false    212   �*                 0    50747 	   mscomment 
   TABLE DATA           W   COPY public.mscomment (commentid, taskid, message, createddate, createdby) FROM stdin;
    public          postgres    false    218   �*                 0    42577    mstask 
   TABLE DATA           @   COPY public.mstask (taskid, taskname, boardid, seq) FROM stdin;
    public          postgres    false    214   +                 0    42584 
   mstasklist 
   TABLE DATA           {   COPY public.mstasklist (id, taskid, tasklistname, description, createddate, createdby, updateddate, updatedby) FROM stdin;
    public          postgres    false    216   �+       
          0    17191    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    209   �/                  0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 12, true);
          public          postgres    false    210                        0    0    msboard_boardid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.msboard_boardid_seq', 6, true);
          public          postgres    false    211            !           0    0    mscomment_commentid_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.mscomment_commentid_seq', 46, true);
          public          postgres    false    217            "           0    0    mstask_taskid_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.mstask_taskid_seq', 1, true);
          public          postgres    false    213            #           0    0    mstasklist_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.mstasklist_id_seq', 145, true);
          public          postgres    false    215            v           2606    17200    msuser dt_user_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.msuser
    ADD CONSTRAINT dt_user_pkey PRIMARY KEY (userid);
 =   ALTER TABLE ONLY public.msuser DROP CONSTRAINT dt_user_pkey;
       public            postgres    false    209            x           2606    42575    msboard msboard_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.msboard
    ADD CONSTRAINT msboard_pkey PRIMARY KEY (boardid);
 >   ALTER TABLE ONLY public.msboard DROP CONSTRAINT msboard_pkey;
       public            postgres    false    212            ~           2606    50754    mscomment mscomment_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.mscomment
    ADD CONSTRAINT mscomment_pkey PRIMARY KEY (commentid);
 B   ALTER TABLE ONLY public.mscomment DROP CONSTRAINT mscomment_pkey;
       public            postgres    false    218            z           2606    42582    mstask mstask_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.mstask
    ADD CONSTRAINT mstask_pkey PRIMARY KEY (taskid);
 <   ALTER TABLE ONLY public.mstask DROP CONSTRAINT mstask_pkey;
       public            postgres    false    214            |           2606    42591    mstasklist mstasklist_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.mstasklist
    ADD CONSTRAINT mstasklist_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.mstasklist DROP CONSTRAINT mstasklist_pkey;
       public            postgres    false    216               P   x�3�4107���p	���2235��0�tw��21�4325�t��003�4��t�wrT�t��27�4116���A�=... S�            x������ � �         �   x�=̱
1��9y
�@�k�4�Т��ǝ��&�8	w��+]�~UaN�[- ��!�h����k��JF�`��q*�܅Q��Zݝ�9w0$���r�DjN�����.��e@a� p�����w�����#>         �  x�uVM��6=ӿbN=5�D���E��@w���h�k1�DU����P���� 6�13�̼7�b�-�Қ�&|/L(���p��;��qL��	%��5Ѹ}ڨ�H&�T��	>>z�x�R`,��KQ�	�)-RA�ٴ���z����lmu�M8��gח��Mqy�]a;ؽB����[x���kЗ�"��m�mn�YNe.��V�$g�b��h%���M�ѕ�\d���M���Wp|c���鹺�]o��.)�Js��=]��l�
ؓ�m��u��q�j�^!Y�b��>�� ���PNW�L�n8�<�C�������-&���uGp���*UJ��01�	�7x�ʼ��Zs�pr���J�6^�t��Ra�V(�}�&n�Szα6Ǹ�
h;��!<z7n*�4�t[���
w�6��m�D�`b�1���\��Ҿ4O��l,9�����&�z�d��\.!�p�R-����:@ŕ�^B��N��������>?/��Pt�YF�9� pð�b��5�(�Z�'¬S8d��bk�V>X�}�R��Tp���y:���y�Xܺ��m���;y�
>�a(n��L��os4Md�i��������qE.ޠYZ$ÆN�"	�D0*�{r��g[�l�pလ��Gհ��t�sP�Dx5QGleJ����\}�ǘ<_
�B�KE�*� �)(�]AM�R	cٜ�Q���
�(	�*JW��ߋ�a�P�N�*�k��ӷ���_n�'FF`c�N��)
����ݣ��Z�MT@co�F;N�����#ZD��-fE�D��p��{;?��
%k��iv���QTq��[�ϳ�����*<|w�-Sd��#L^C�R�P.���\oJ��x	Ӌ�Ay9�)���ba�Q�0}C��w*sp'��C����I���?My��eي	���Ǔ�r4C����\�T��@�ђ�$#��5�4d���d6ܯww��1�����f�?T��[      
   �   x�Uͻ�0@�}
V��/*��(�P5.��D��kL\Nr��1d�.���j�4F�j��F�rI�}v�`����� �����������V;��u���@@����`��ۖN1�Sy�Q\�L�H~6g�V]�0{����l��3�N����Z�ߑa<Ѹ���OE�R�Y-K7-n���N�;�     
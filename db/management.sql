PGDMP     3    7                z         
   management    14.1    14.1 '               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    58950 
   management    DATABASE     m   CREATE DATABASE management WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE management;
                postgres    false            �            1259    58951    msuser    TABLE     �   CREATE TABLE public.msuser (
    userid integer NOT NULL,
    name character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at timestamp without time zone
);
    DROP TABLE public.msuser;
       public         heap    postgres    false            �            1259    58956    dt_user_userid_seq    SEQUENCE     �   CREATE SEQUENCE public.dt_user_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.dt_user_userid_seq;
       public          postgres    false    209                       0    0    dt_user_userid_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.dt_user_userid_seq OWNED BY public.msuser.userid;
          public          postgres    false    210            �            1259    58957    msboard    TABLE     m   CREATE TABLE public.msboard (
    boardid integer NOT NULL,
    boardname character varying(255) NOT NULL
);
    DROP TABLE public.msboard;
       public         heap    postgres    false            �            1259    58960    msboard_boardid_seq    SEQUENCE     �   CREATE SEQUENCE public.msboard_boardid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.msboard_boardid_seq;
       public          postgres    false    211                       0    0    msboard_boardid_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.msboard_boardid_seq OWNED BY public.msboard.boardid;
          public          postgres    false    212            �            1259    58961 	   mscomment    TABLE       CREATE TABLE public.mscomment (
    commentid integer NOT NULL,
    taskid integer NOT NULL,
    message character varying NOT NULL,
    createddate timestamp without time zone,
    createdby character varying(255) NOT NULL,
    userid integer NOT NULL,
    headerid integer
);
    DROP TABLE public.mscomment;
       public         heap    postgres    false            �            1259    58966    mscomment_commentid_seq    SEQUENCE     �   CREATE SEQUENCE public.mscomment_commentid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.mscomment_commentid_seq;
       public          postgres    false    213                       0    0    mscomment_commentid_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.mscomment_commentid_seq OWNED BY public.mscomment.commentid;
          public          postgres    false    214            �            1259    58967    mstask    TABLE     �   CREATE TABLE public.mstask (
    taskid integer NOT NULL,
    taskname character varying(255),
    boardid integer NOT NULL,
    seq integer NOT NULL
);
    DROP TABLE public.mstask;
       public         heap    postgres    false            �            1259    58970    mstask_taskid_seq    SEQUENCE     �   CREATE SEQUENCE public.mstask_taskid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.mstask_taskid_seq;
       public          postgres    false    215                       0    0    mstask_taskid_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.mstask_taskid_seq OWNED BY public.mstask.taskid;
          public          postgres    false    216            �            1259    58971 
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
       public         heap    postgres    false            �            1259    58976    mstasklist_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mstasklist_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.mstasklist_id_seq;
       public          postgres    false    217                       0    0    mstasklist_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.mstasklist_id_seq OWNED BY public.mstasklist.id;
          public          postgres    false    218            q           2604    58977    msboard boardid    DEFAULT     r   ALTER TABLE ONLY public.msboard ALTER COLUMN boardid SET DEFAULT nextval('public.msboard_boardid_seq'::regclass);
 >   ALTER TABLE public.msboard ALTER COLUMN boardid DROP DEFAULT;
       public          postgres    false    212    211            r           2604    58978    mscomment commentid    DEFAULT     z   ALTER TABLE ONLY public.mscomment ALTER COLUMN commentid SET DEFAULT nextval('public.mscomment_commentid_seq'::regclass);
 B   ALTER TABLE public.mscomment ALTER COLUMN commentid DROP DEFAULT;
       public          postgres    false    214    213            s           2604    58979    mstask taskid    DEFAULT     n   ALTER TABLE ONLY public.mstask ALTER COLUMN taskid SET DEFAULT nextval('public.mstask_taskid_seq'::regclass);
 <   ALTER TABLE public.mstask ALTER COLUMN taskid DROP DEFAULT;
       public          postgres    false    216    215            t           2604    58980    mstasklist id    DEFAULT     n   ALTER TABLE ONLY public.mstasklist ALTER COLUMN id SET DEFAULT nextval('public.mstasklist_id_seq'::regclass);
 <   ALTER TABLE public.mstasklist ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217            p           2604    58981    msuser userid    DEFAULT     o   ALTER TABLE ONLY public.msuser ALTER COLUMN userid SET DEFAULT nextval('public.dt_user_userid_seq'::regclass);
 <   ALTER TABLE public.msuser ALTER COLUMN userid DROP DEFAULT;
       public          postgres    false    210    209                      0    58957    msboard 
   TABLE DATA           5   COPY public.msboard (boardid, boardname) FROM stdin;
    public          postgres    false    211   �*                 0    58961 	   mscomment 
   TABLE DATA           i   COPY public.mscomment (commentid, taskid, message, createddate, createdby, userid, headerid) FROM stdin;
    public          postgres    false    213   	+                 0    58967    mstask 
   TABLE DATA           @   COPY public.mstask (taskid, taskname, boardid, seq) FROM stdin;
    public          postgres    false    215   �+                 0    58971 
   mstasklist 
   TABLE DATA           {   COPY public.mstasklist (id, taskid, tasklistname, description, createddate, createdby, updateddate, updatedby) FROM stdin;
    public          postgres    false    217   (,       
          0    58951    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    209   �0                  0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 12, true);
          public          postgres    false    210                        0    0    msboard_boardid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.msboard_boardid_seq', 6, true);
          public          postgres    false    212            !           0    0    mscomment_commentid_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mscomment_commentid_seq', 111, true);
          public          postgres    false    214            "           0    0    mstask_taskid_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.mstask_taskid_seq', 1, true);
          public          postgres    false    216            #           0    0    mstasklist_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.mstasklist_id_seq', 158, true);
          public          postgres    false    218            v           2606    58983    msuser dt_user_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.msuser
    ADD CONSTRAINT dt_user_pkey PRIMARY KEY (userid);
 =   ALTER TABLE ONLY public.msuser DROP CONSTRAINT dt_user_pkey;
       public            postgres    false    209            x           2606    58985    msboard msboard_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.msboard
    ADD CONSTRAINT msboard_pkey PRIMARY KEY (boardid);
 >   ALTER TABLE ONLY public.msboard DROP CONSTRAINT msboard_pkey;
       public            postgres    false    211            z           2606    58987    mscomment mscomment_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.mscomment
    ADD CONSTRAINT mscomment_pkey PRIMARY KEY (commentid);
 B   ALTER TABLE ONLY public.mscomment DROP CONSTRAINT mscomment_pkey;
       public            postgres    false    213            |           2606    58989    mstask mstask_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.mstask
    ADD CONSTRAINT mstask_pkey PRIMARY KEY (taskid);
 <   ALTER TABLE ONLY public.mstask DROP CONSTRAINT mstask_pkey;
       public            postgres    false    215            ~           2606    58991    mstasklist mstasklist_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.mstasklist
    ADD CONSTRAINT mstasklist_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.mstasklist DROP CONSTRAINT mstasklist_pkey;
       public            postgres    false    217               D   x�3�4107���p	���2235��0�tw��21�4325�t��003�4��t�wrT�t������ y�         {   x�m��	�@��l6�u����+�%�,�d	vo��*������\[�[)��p\G��wpY}�d���N��6h:�߂���Yٺ^9�/����c��>�؉MI4�CN��'�+�         �   x�=�A
�0 ϻ��d�dw�G!AIJ+x�&E�(�����\gF����j��H��#K���k��BJa�a��ԌCV5sPKw���D��H<���y~g�$j�|��.5�F���~��^ݰ�˼�M�x�!��$         �  x�uVɎ�8=�_�Ӝ�7Q�-I��F2sk �-��X"Q��?Em���!K�*�zE�J��i���?s�s���a�=���Tf�dA���`|~��	*����~����ދƘҌ�_<󢔣D�<��_U�+�Mc��{�\�������j�>8�����u�����_���_\�5�����!���\?���$#"cfK�Q�[vi�R)$I�'�̊B�R*2�̎����[k-$3>���Y��K��)+W7�6�֧�|RH����R�/�~�P������t�}g������p�Cr�: �s|C��XDh�C���P��	�х.5$��oˊ �$�"���D��U�B�7xs�B���*u��b��ߖ�I�*<<~�]9Qa��P�u�n�c��1�R�Ö���qU���~�[G���������>�K���U� j R>���9+���Y�7����; 4���)��-'�Hfbi�����/d�Lҙ�&e)M�~R%�T-�8�~4]2�p^�}�4΢���g�+���X���P��e�bg�o�&���c{��t�P
z��1�G���)�M��J�E{se"2~���"h�� ^��D�o�b��O����@`0k��F��^�-�Um�	H��
��u��MmʵDB�l�!D'�	4�_�}�?=n8���1�IQ��9~�$]��;^�N:1�GF�^�o����`c��G��d���c2����3 \;���<�S��/ayh|�*��
`�V_qg�&��U�ڢEP��h1��.`7�u�ۻ��?A4@e�A�ԾУ=�l�/;��T�V(���~�e�ڞ*bB8JPD��k0�5�8A��>,gW?�	[��[���
�X���
�hp��l'w9N�t���Nk(-M��xŰ=��ض>�/����K��)��&K�9'��SIF�:�jv��1�0�5<��e�q�z�A��_�Iv"��0b�Z:(�.[�� 3U�)��xlm'=U0��ٞPG��d�'��M{�(�DB����������	�j���9_����7�O�
��H
fCqǔ��4@k� S賛�lnLN�<�EH҄�fy8@��yoas'S�7󞮠�ɵU՜%$�{�Q

�=>�� ;��Κ��V���jdB=������]�      
   �   x�Uͻ�0@�}
V��/*��(�P5.��D��kL\Nr��1d�.���j�4F�j��F�rI�}v�`����� �����������V;��u���@@����`��ۖN1�Sy�Q\�L�H~6g�V]�0{����l��3�N����Z�ߑa<Ѹ���OE�R�Y-K7-n���N�;�     
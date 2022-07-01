PGDMP         -                z         
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
    public          postgres    false    213   !+                 0    58967    mstask 
   TABLE DATA           @   COPY public.mstask (taskid, taskname, boardid, seq) FROM stdin;
    public          postgres    false    215   �.                 0    58971 
   mstasklist 
   TABLE DATA           {   COPY public.mstasklist (id, taskid, tasklistname, description, createddate, createdby, updateddate, updatedby) FROM stdin;
    public          postgres    false    217   N/       
          0    58951    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    209   �5                  0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 12, true);
          public          postgres    false    210                        0    0    msboard_boardid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.msboard_boardid_seq', 6, true);
          public          postgres    false    212            !           0    0    mscomment_commentid_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mscomment_commentid_seq', 241, true);
          public          postgres    false    214            "           0    0    mstask_taskid_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.mstask_taskid_seq', 1, true);
          public          postgres    false    216            #           0    0    mstasklist_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.mstasklist_id_seq', 173, true);
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
       public            postgres    false    217               \   x�3�4107���p	���2235��0�tw��21�4325�t��003�4��t�wrT�2755106�(��JM.Q�M�KLO�M�+����� ?�         V  x�ՕM��8���),mU@*��S��Vꩇ�k/��"o�����	�А	�vn@�����͘Q�F�z�K�6�ڢ}U�r��W#F��dN(�"�,�S�u2���Q:��m�X�Ѹ:?�`$�%��	aLEŴ� �e�!O���kEM/�U�yנuu���lxʀ#�Ҽ�3N�kr�2���`ƨ��:&N���Ċ$	��ؿ�nSiJ�<Q�G���z�M5��қ.~~���(J�깐oqqϑH �eo���m�u,%i������>���0J�����oK�
�%!�vw�S �����t���h�2Wf8oKÕ4R����b���g(�VA34��&S�,d_��s6SsN�)a)O�T��h�r���h��5��۲��S�����EAm���l	H��N��xڐ��T*l(�Bw2%l/��h�3�;z7�>̰���N6>��>�<0,?�h�ׇ������b��8�X��S]; ��N~[�r�����꩜N�6Ė{9`ˍ�o�@~���g]��!�t�%�g��"$ �
)�V=�"\r��a�^�2KXf�E2����C������jD�s5)L�:�o����]@YU�WD�k�J�Ub��nh��-f[5���>�C����ܭ�6���G�����_#�/�CD[������7��u�?��Z����wy@jn+��*�#��׺��@Ycw;��x*4�\��D�B��*_-s�
��Pqȣ�s��}p!�]l}���Ӵ��f��#L�r����ll�r���t����nk� ��0E*$6I�d�pc&�M�����N>z���m?gCy+P̴�R^���x�3���         �   x�E�Aj�0E�3��	����-2I!X�	d�]cL�D�9܍�}�㋆����& ������>7�PU�#�2�zT2Jcَ�������������+G�6����Q�Ǵ,M:&����kj��	�S�����+�H ok�{vp�]��'8��z��3F��~����/D|-7�         4  x��Wˎ�6]�_�UW3)��c��A�M��]�"�-�ͱ^%������e�1@���y��8��kE(���2$k�TH[��O("QtO�}D1yDrNл�ҵ[|��)�i�b�>�>���֊&��<��̊R�R���!{�-n�;��x���R5�l'�y�x��	���6�P�_�U���>(�ؘ᭮��;)����C}Is�q�l��sJ��]�Q&bA2�^v�����9Kg�eq0���58�X[��
7��=]���d����e��|�\4��ge^1���b�b��ޯ@���3�b�&�s�l�y}H�X$���}t~zc!��G��R�4����,���@�"Fb���-��c�񵼅�m)_�m�<*����^��	��=,~4M5Aa�D��L���B���c%��ʃ�ܚ栬�z�7�!�b�Xj���~�^K#+�P]1�egS�윣rH_�s��-+�oM9,C���✋<��4��K���K�_w2�fЛ4�hJ�o'YH�Ҋ�ׅ�K䔍Ux�w]S��)d��J� ��t)��.=����>�U���,g��j��cn(�M�2�%�Wy��+����z�*S�W�É�fk�Ӝx .�(��W����_T�W���-�Y�4�2{iz\H��	@*�t��Jy����՚"��h�!H'a)4�����a��t�Ɣ$�4>�q��*g������S�H�ߣ~Q��k�k���l��t`�v�d�����+�3���7ʢ�S��/n�k|+[%�Xt浺`�Mv�+;��bo�"����n����7}���4�e!F�gr_���x����K�*]/���1g��2Dm�J<U0J'Q̘o0�9}8A�Î/��5h1�ַ+4����(�?6{�Ky��u�J��G�΂��򴶀��t�?��*��AJ]⺷�o=0f0J,���S���s�I��aJIXX��C��!��)��)Mr�]q���CSyQ�>.���^������G5 p% D����z��e��RM��G�=�0 ���X��D�;
��$�Q��K9�`N�<�0�E�p �$_@�(g��F�α�*��4�]o�?o2�1M����a�E�����9���g��+ݭ�#���y������-��'���Z�i�����zS�T���ɴ'�-�R0f��R�����$�<f���4m�\��V�4�/� �W~�k`����{L[a$pvf�̱�E۾$׹��N� �w��U0M}<�����ˏSD^�q����]@|��u�r��g�Gž���v/=~#�Ne'ȃ�$��-��]�F�N�2��ik������K][]��w��dB�z�M*���啡P�d��:��M��1�����nmngK����H�#�=�(HДH
U�(Tkt�I?��s}����$5��q�p������휔����J�RG^~x��LÑ�N��I0��|Nv0�qJH�W6�ߟ��#އt3CCXW5ф��s������e��"Bc_�\�%�:��@�9|G/Z#l𿙆ߒn�
�~��zG���,���� XIS�}���K�[mM�8���n��`Ŵ@      
   �   x�Uͻ�0@�}
V��/*��(�P5.��D��kL\Nr��1d�.���j�4F�j��F�rI�}v�`����� �����������V;��u���@@����`��ۖN1�Sy�Q\�L�H~6g�V]�0{����l��3�N����Z�ߑa<Ѹ���OE�R�Y-K7-n���N�;�     
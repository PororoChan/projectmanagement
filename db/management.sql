PGDMP         2                z         
   management    14.1    14.1 '               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    58992 
   management    DATABASE     m   CREATE DATABASE management WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE management;
                postgres    false            �            1259    58993    msuser    TABLE     �   CREATE TABLE public.msuser (
    userid integer NOT NULL,
    name character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at timestamp without time zone
);
    DROP TABLE public.msuser;
       public         heap    postgres    false            �            1259    58998    dt_user_userid_seq    SEQUENCE     �   CREATE SEQUENCE public.dt_user_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.dt_user_userid_seq;
       public          postgres    false    209                       0    0    dt_user_userid_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.dt_user_userid_seq OWNED BY public.msuser.userid;
          public          postgres    false    210            �            1259    58999    msboard    TABLE     %  CREATE TABLE public.msboard (
    boardid integer NOT NULL,
    boardname character varying(255) NOT NULL,
    createddate timestamp without time zone NOT NULL,
    createdby character varying(255) NOT NULL,
    updateddate timestamp without time zone,
    updatedby character varying(255)
);
    DROP TABLE public.msboard;
       public         heap    postgres    false            �            1259    59002    msboard_boardid_seq    SEQUENCE     �   CREATE SEQUENCE public.msboard_boardid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.msboard_boardid_seq;
       public          postgres    false    211                       0    0    msboard_boardid_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.msboard_boardid_seq OWNED BY public.msboard.boardid;
          public          postgres    false    212            �            1259    59003 	   mscomment    TABLE       CREATE TABLE public.mscomment (
    commentid integer NOT NULL,
    taskid integer NOT NULL,
    message character varying NOT NULL,
    createddate timestamp without time zone,
    createdby character varying(255) NOT NULL,
    userid integer NOT NULL,
    headerid integer
);
    DROP TABLE public.mscomment;
       public         heap    postgres    false            �            1259    59008    mscomment_commentid_seq    SEQUENCE     �   CREATE SEQUENCE public.mscomment_commentid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.mscomment_commentid_seq;
       public          postgres    false    213                       0    0    mscomment_commentid_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.mscomment_commentid_seq OWNED BY public.mscomment.commentid;
          public          postgres    false    214            �            1259    59009    mstask    TABLE     �   CREATE TABLE public.mstask (
    taskid integer NOT NULL,
    taskname character varying(255),
    boardid integer NOT NULL,
    seq integer NOT NULL
);
    DROP TABLE public.mstask;
       public         heap    postgres    false            �            1259    59012    mstask_taskid_seq    SEQUENCE     �   CREATE SEQUENCE public.mstask_taskid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.mstask_taskid_seq;
       public          postgres    false    215                       0    0    mstask_taskid_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.mstask_taskid_seq OWNED BY public.mstask.taskid;
          public          postgres    false    216            �            1259    59013 
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
       public         heap    postgres    false            �            1259    59018    mstasklist_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mstasklist_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.mstasklist_id_seq;
       public          postgres    false    217                       0    0    mstasklist_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.mstasklist_id_seq OWNED BY public.mstasklist.id;
          public          postgres    false    218            q           2604    59019    msboard boardid    DEFAULT     r   ALTER TABLE ONLY public.msboard ALTER COLUMN boardid SET DEFAULT nextval('public.msboard_boardid_seq'::regclass);
 >   ALTER TABLE public.msboard ALTER COLUMN boardid DROP DEFAULT;
       public          postgres    false    212    211            r           2604    59020    mscomment commentid    DEFAULT     z   ALTER TABLE ONLY public.mscomment ALTER COLUMN commentid SET DEFAULT nextval('public.mscomment_commentid_seq'::regclass);
 B   ALTER TABLE public.mscomment ALTER COLUMN commentid DROP DEFAULT;
       public          postgres    false    214    213            s           2604    59021    mstask taskid    DEFAULT     n   ALTER TABLE ONLY public.mstask ALTER COLUMN taskid SET DEFAULT nextval('public.mstask_taskid_seq'::regclass);
 <   ALTER TABLE public.mstask ALTER COLUMN taskid DROP DEFAULT;
       public          postgres    false    216    215            t           2604    59022    mstasklist id    DEFAULT     n   ALTER TABLE ONLY public.mstasklist ALTER COLUMN id SET DEFAULT nextval('public.mstasklist_id_seq'::regclass);
 <   ALTER TABLE public.mstasklist ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217            p           2604    59023    msuser userid    DEFAULT     o   ALTER TABLE ONLY public.msuser ALTER COLUMN userid SET DEFAULT nextval('public.dt_user_userid_seq'::regclass);
 <   ALTER TABLE public.msuser ALTER COLUMN userid DROP DEFAULT;
       public          postgres    false    210    209                      0    58999    msboard 
   TABLE DATA           e   COPY public.msboard (boardid, boardname, createddate, createdby, updateddate, updatedby) FROM stdin;
    public          postgres    false    211   �+                 0    59003 	   mscomment 
   TABLE DATA           i   COPY public.mscomment (commentid, taskid, message, createddate, createdby, userid, headerid) FROM stdin;
    public          postgres    false    213   ],                 0    59009    mstask 
   TABLE DATA           @   COPY public.mstask (taskid, taskname, boardid, seq) FROM stdin;
    public          postgres    false    215   �-                 0    59013 
   mstasklist 
   TABLE DATA           {   COPY public.mstasklist (id, taskid, tasklistname, description, createddate, createdby, updateddate, updatedby) FROM stdin;
    public          postgres    false    217   �.       
          0    58993    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    209   :6                  0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 12, true);
          public          postgres    false    210                        0    0    msboard_boardid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.msboard_boardid_seq', 6, true);
          public          postgres    false    212            !           0    0    mscomment_commentid_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mscomment_commentid_seq', 589, true);
          public          postgres    false    214            "           0    0    mstask_taskid_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.mstask_taskid_seq', 1, true);
          public          postgres    false    216            #           0    0    mstasklist_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.mstasklist_id_seq', 203, true);
          public          postgres    false    218            v           2606    59025    msuser dt_user_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.msuser
    ADD CONSTRAINT dt_user_pkey PRIMARY KEY (userid);
 =   ALTER TABLE ONLY public.msuser DROP CONSTRAINT dt_user_pkey;
       public            postgres    false    209            x           2606    59027    msboard msboard_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.msboard
    ADD CONSTRAINT msboard_pkey PRIMARY KEY (boardid);
 >   ALTER TABLE ONLY public.msboard DROP CONSTRAINT msboard_pkey;
       public            postgres    false    211            z           2606    59029    mscomment mscomment_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.mscomment
    ADD CONSTRAINT mscomment_pkey PRIMARY KEY (commentid);
 B   ALTER TABLE ONLY public.mscomment DROP CONSTRAINT mscomment_pkey;
       public            postgres    false    213            |           2606    59031    mstask mstask_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.mstask
    ADD CONSTRAINT mstask_pkey PRIMARY KEY (taskid);
 <   ALTER TABLE ONLY public.mstask DROP CONSTRAINT mstask_pkey;
       public            postgres    false    215            ~           2606    59033    mstasklist mstasklist_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.mstasklist
    ADD CONSTRAINT mstasklist_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.mstasklist DROP CONSTRAINT mstasklist_pkey;
       public            postgres    false    217               �   x�m��
�P���x��3s��YFh��s#%e�����hs0����J���&e�q���C������ҵ=T��$��9�����#e�"H�rn���-9��2�c�=���5G�Ż+�y����wD��y<o+�il_�/`HXa�q�7�eu__���'��"�"a��j�+�G1         ?  x�}�Mn� �����J͏�,�=A6SC+�X@���NU'nT����{3P
IXU�fl=Z��oF{���f�q���}t��ǖp����ƀn-�ȫ>�a��޲����`B4�W�`��ӛ�J�H�B&�4ĔK{7jw �� ��Z�px�����x�pqo<kf3���1lR��߭�t)��9S���Q1������֪X#Ռ`�xz��@��\��fΊee]� 3��-���B�"UB��C?藫~�	�rҜl�ؾŐ���<��U?*5�W�Ij10�N�b�����m��_�K����K�eߦ"�b           x�E��N�@D��W���^�w���B٪�ĥ' *�P#5P~�MP��{��{�n��<YH@�f)1�y��m����ܭ*d�"l�y�]�vUa�h.�s�!R�D�=S�۷���W�8J��i|m�ٜ�㹟�:�P���Ǧ�T=�-~����ӱbF��.�����K�^�H�K����q�6�qs�u~����6)���f��2�?���8镋ѕ}��s��z�EZV���Ra�\��a�����bY�         l  x��WY��6~V�
>�izW��d7�,�� �Sz��V[����3�~��DZ��G��E���WEEA.�$��t�����)��(z�ǈ3��p���E]6$|~zH�@r)d|zb?~����\����]��B�sdI.RtWua��+��m�^�W�Vw���+��O��6��ښB���:��A7�^Z3~-�#�O��&^��<7s�lʝt��$��Q��A��$̃�U�JHK�܉l�^.�¯C���de��F��ŚW֗�����6��zvRo0�eE��L�i�!&g�w�k�y
g���Y
?=�rρ(Y�'�%����p$;����	�ѕ�5��3����8Zm(�H�2I��R(�c��-�E�]*��N���fo��v�����B������PX��Fj�f�"�;ku�#f(�Ŵ�u��Y�Mn���~Ve�`���Z���u�R2a2�Գ�KT��Kw��k-�%��{@B��'".뒓�8��eJ3T\�K`�?�~����a�P@m�(�Y�vR5@��Z��&���S��f����&��BU��?+
�z��̗�<�uq/6�Nl*v�1@O����L�<O���Y5�<հ��E�j��F;F���D�]��\���~�oeW�_t��U��;�Y����^��ʔ��*�EQi�J� �si�zK�0>ZrH�IE�������~�tG)��%sIs�9��L��AW�B��Ź�	�������6eq(Yٰ�����'������W3H�&%�T-a؅�(���B˩�;u��LP���}eV�"��U��b��`�H�r79��,���гW�X>��}���xǏ�N��-U�~PUfn͹[�Q����F� #)�-0ԅ�?N��}tӇu�{qmO%ܱ?Aaj��n��U�X2��Mog�t�tR��B˳�� Z)�Gs�ʊ5CG+�AY`�XmS�a��Y,�T�~��8�v�M3���p5�p|�(�C[�.�­J�y���g���Z�����И�´��W۩�\g�&�߯���LC	��^��A�����	�a�i�Nףv�l�'
*.'��U�o��lMV�+>�%d}�j���/��>��Z	����<��:������5���4~�B(K�f��:F�ؼ�s"9��:�I��yv�W��uYB*��@l*,c���#ܒA�H����ǧ���t�:l��Ni;�j��t�p1p~9��A'�YPN��+J%��մț�ٗRW�6nnXI�#N��0D��GR�����]q��o;��Ք�#h��*m{D���U����K�4�N#���Մ;<���W���`la'�{�����2ٮ^�gd�f�����64J��Mp�\FV�]j��GR!-D��J_��鵬��;O�����a_�뺒�1~+�770څ��yP��R����`ژ���Q|��^2ZԲq3�'#
��p�y ����a&�C)O=;-9�U����3B������ `�4z�ǻ����� �#���}p���3ei��Q��,��Gw/o4v���4�&���׸;��N �ҦK�[�T�*�Eei��L ����k1/C.�#��We�qsN��N�#0��n�A�������6��1O�`�/Swz[���v�8(V��;�@����j��C�����4�*�(�I���}���Y�Iq�t
��є�>�a�8�5����DMC[�6��H�<wD����l��Z�SqU%^�k��?/�,��K����H�yh`푽���R�ZM�G^��S�!��u�<�G�-׉$a��4bΚ�����"Het�������E/�u%���4rq�%3N�OLݴ/���<rs����e~*�l�� ����%��M�"~�b�Z��&��<<<�VȈ�      
   �   x�Uͻ�0@�}
V��/*��(�P5.��D��kL\Nr��1d�.���j�4F�j��F�rI�}v�`����� �����������V;��u���@@����`��ۖN1�Sy�Q\�L�H~6g�V]�0{����l��3�N����Z�ߑa<Ѹ���OE�R�Y-K7-n���N�;�     
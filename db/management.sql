PGDMP     !    (                z         
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
          public          postgres    false    210            �            1259    58999    msboard    TABLE     m   CREATE TABLE public.msboard (
    boardid integer NOT NULL,
    boardname character varying(255) NOT NULL
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
   TABLE DATA           5   COPY public.msboard (boardid, boardname) FROM stdin;
    public          postgres    false    211   �*                 0    59003 	   mscomment 
   TABLE DATA           i   COPY public.mscomment (commentid, taskid, message, createddate, createdby, userid, headerid) FROM stdin;
    public          postgres    false    213    +                 0    59009    mstask 
   TABLE DATA           @   COPY public.mstask (taskid, taskname, boardid, seq) FROM stdin;
    public          postgres    false    215   /,                 0    59013 
   mstasklist 
   TABLE DATA           {   COPY public.mstasklist (id, taskid, tasklistname, description, createddate, createdby, updateddate, updatedby) FROM stdin;
    public          postgres    false    217   �,       
          0    58993    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    209   �3                  0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 12, true);
          public          postgres    false    210                        0    0    msboard_boardid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.msboard_boardid_seq', 6, true);
          public          postgres    false    212            !           0    0    mscomment_commentid_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mscomment_commentid_seq', 565, true);
          public          postgres    false    214            "           0    0    mstask_taskid_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.mstask_taskid_seq', 1, true);
          public          postgres    false    216            #           0    0    mstasklist_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.mstasklist_id_seq', 184, true);
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
       public            postgres    false    217               [   x�3�4107���p	���2235��0�tw��21�4325�t��003�4��t�wr�2755106�(��JM.Q�M�KLO�M�+����� ��z         �   x�m�Kn� Eǰ�7��-b+��t�����
4Qv_lUm�d�t��r�Նɦb[�h0A����উl���#'�cra��w�eY���D׋���i�LJvx�����H��
���#]��V^W�>Z��}��ѡ��Q.D\��^��p��*�ռ��kw������Fc`@�� �ܙ��+�t� dhi��)�ƓcN�����\w�m�l&�ݫ���d��r�5"E/ھZ#jA�� �ٛ/�n~x�� l�@         �   x�E���1���S�,I�$�q��."S���iua����x������D4�@0�? )�iB1K���w��&�
s�\��Q�JF)�v,_c��5��=;��.W0�@�^��r=_N3:!q
�4���tl�c$	�A��;�R/�y��DRK�U�~yi]��r��z�N��}4��%�F	?�	�/9+         �  x��WKs�6>ÿ���@��[ڦ�;;������DH�E�*HZ���.HP)Og,S�b�}|��G�e��9Q�}.U[���(�c�]�)O��1#��X>=�$�\
��������ӹO)�E��dI.RAڣ:�CӚ�4��tw��Һ�T��	����uc��g�J��ꍶ��^۵���o���n�)n2�?�'{��
&,�I��Ar��$Od�r�QuAa���Bd��2(|�c��6V�f��3��q���LVݩ0��eK�~��BL�ږW�s��Ē`� B�,?��ŕ(������T�d�oюu�Z��q�ѕ�5���yD �,/�h�� �`2II(�1����Ҵ�J��i�����c{Z�.�h��5���Aࡔ�H���C��`c��x���%=�f����;��e��ke��n͋�Z9U�����Q�>[y��!|i���B��X7��,���a^r���B^�4��Ks	X��Y�ܙ�
P�<�y������j�% ��D�9r���t�w]cIݔ��{� �������|�0�.��&/Ģb���16�&9�S�E���)KM�ӃvUR�(��S�.%�q��"�g�|�/�5���W�2�qi���B�n�\OK��H}SXںR;���8S/)��.9$�IE���_��_�(��dc.I���,���)k]]�w/�'����B�6�U�t�bo����G�l�`�q�d���Q���0�BU�t����c�ꠕ� BT��H���Vu�,��ރE �����籷j��>i ˂��gjU� G���e����u׫�fnܾ����w9e0�H�")�/0�5}�A��_�{�ЋY�<e��������ڬ���P��Eogg�tt?��RB˳�bZ)͡2�}���@Y�(1
�M�X��{�,�sv��/SH�`�ߢzI�5�a^�bCY�g�
�i��:s�4u�= �#���= �o�WAz������~ӣ���;��l���m��M7��1�y��K�4�p�эUg�Z�3�-����h��/B��!kP����Icl��Vc��-K�w��O����3���j�@&�lσ����pget;�ڑ ��c�a��� �q��@>�\�S��5;r�8�}�1y��=h��#�!���9_���a�C~b�mu�<�_�ɪ|��~	Z_+�{W��7a�{>��� ˜��5��9����5��A��~m�LƽF�N7ST�6;1-Dtݖ�4����g����Gq�4�n�[`X#3�<_�T-��s�y���5$,eyv����:\2�QQ,7�n
b��[�ĉ�������?��l����MM��1~��������d�E^i(a}]��mwctU.C�0������Qx�p��(s�H���� �"�4����v�3�5�.?k�w��ᦘ�5�t���Z
ȘUX��Q��
�d��!��Q�sz�V���}��t�ܠA�7��x�T�{=�0�[���\ϡ)�5d�7f���YzW

}Z�S>�@���C�����C���a�\Z|^=Uۀ7àQ�Ό��`��;��mͦ+����t�$� `�����f5Lϵ���{��$�y��TP�|�����tL�'�$��sw�#�\�{�'�0��%�qeJ�	���R��盛�� ����      
   �   x�Uͻ�0@�}
V��/*��(�P5.��D��kL\Nr��1d�.���j�4F�j��F�rI�}v�`����� �����������V;��u���@@����`��ۖN1�Sy�Q\�L�H~6g�V]�0{����l��3�N����Z�ߑa<Ѹ���OE�R�Y-K7-n���N�;�     
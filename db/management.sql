PGDMP         (                z         
   management    14.1    14.1 .                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            !           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            "           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            #           1262    58992 
   management    DATABASE     m   CREATE DATABASE management WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE management;
                postgres    false            ?            1259    58993    msuser    TABLE     ?   CREATE TABLE public.msuser (
    userid integer NOT NULL,
    name character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at timestamp without time zone
);
    DROP TABLE public.msuser;
       public         heap    postgres    false            ?            1259    58998    dt_user_userid_seq    SEQUENCE     ?   CREATE SEQUENCE public.dt_user_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.dt_user_userid_seq;
       public          postgres    false    209            $           0    0    dt_user_userid_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.dt_user_userid_seq OWNED BY public.msuser.userid;
          public          postgres    false    210            ?            1259    58999    msboard    TABLE     %  CREATE TABLE public.msboard (
    boardid integer NOT NULL,
    boardname character varying(255) NOT NULL,
    createddate timestamp without time zone NOT NULL,
    createdby character varying(255) NOT NULL,
    updateddate timestamp without time zone,
    updatedby character varying(255)
);
    DROP TABLE public.msboard;
       public         heap    postgres    false            ?            1259    59002    msboard_boardid_seq    SEQUENCE     ?   CREATE SEQUENCE public.msboard_boardid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.msboard_boardid_seq;
       public          postgres    false    211            %           0    0    msboard_boardid_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.msboard_boardid_seq OWNED BY public.msboard.boardid;
          public          postgres    false    212            ?            1259    67226    msboardshare    TABLE     Z  CREATE TABLE public.msboardshare (
    shareid integer NOT NULL,
    userid integer NOT NULL,
    boardid integer NOT NULL,
    boardname character varying(255) NOT NULL,
    roles character varying(255) NOT NULL,
    shareddate timestamp without time zone NOT NULL,
    sharedby character varying(255) NOT NULL,
    sharedto integer NOT NULL
);
     DROP TABLE public.msboardshare;
       public         heap    postgres    false            ?            1259    67229    msboardshare_shareid_seq    SEQUENCE     ?   CREATE SEQUENCE public.msboardshare_shareid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.msboardshare_shareid_seq;
       public          postgres    false    219            &           0    0    msboardshare_shareid_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.msboardshare_shareid_seq OWNED BY public.msboardshare.shareid;
          public          postgres    false    220            ?            1259    59003 	   mscomment    TABLE       CREATE TABLE public.mscomment (
    commentid integer NOT NULL,
    taskid integer NOT NULL,
    message character varying NOT NULL,
    createddate timestamp without time zone,
    createdby character varying(255) NOT NULL,
    userid integer NOT NULL,
    headerid integer
);
    DROP TABLE public.mscomment;
       public         heap    postgres    false            ?            1259    59008    mscomment_commentid_seq    SEQUENCE     ?   CREATE SEQUENCE public.mscomment_commentid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.mscomment_commentid_seq;
       public          postgres    false    213            '           0    0    mscomment_commentid_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.mscomment_commentid_seq OWNED BY public.mscomment.commentid;
          public          postgres    false    214            ?            1259    59009    mstask    TABLE     ?   CREATE TABLE public.mstask (
    taskid integer NOT NULL,
    taskname character varying(255),
    boardid integer NOT NULL,
    seq integer NOT NULL
);
    DROP TABLE public.mstask;
       public         heap    postgres    false            ?            1259    59012    mstask_taskid_seq    SEQUENCE     ?   CREATE SEQUENCE public.mstask_taskid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.mstask_taskid_seq;
       public          postgres    false    215            (           0    0    mstask_taskid_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.mstask_taskid_seq OWNED BY public.mstask.taskid;
          public          postgres    false    216            ?            1259    59013 
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
       public         heap    postgres    false            ?            1259    59018    mstasklist_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.mstasklist_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.mstasklist_id_seq;
       public          postgres    false    217            )           0    0    mstasklist_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.mstasklist_id_seq OWNED BY public.mstasklist.id;
          public          postgres    false    218            v           2604    59019    msboard boardid    DEFAULT     r   ALTER TABLE ONLY public.msboard ALTER COLUMN boardid SET DEFAULT nextval('public.msboard_boardid_seq'::regclass);
 >   ALTER TABLE public.msboard ALTER COLUMN boardid DROP DEFAULT;
       public          postgres    false    212    211            z           2604    67230    msboardshare shareid    DEFAULT     |   ALTER TABLE ONLY public.msboardshare ALTER COLUMN shareid SET DEFAULT nextval('public.msboardshare_shareid_seq'::regclass);
 C   ALTER TABLE public.msboardshare ALTER COLUMN shareid DROP DEFAULT;
       public          postgres    false    220    219            w           2604    59020    mscomment commentid    DEFAULT     z   ALTER TABLE ONLY public.mscomment ALTER COLUMN commentid SET DEFAULT nextval('public.mscomment_commentid_seq'::regclass);
 B   ALTER TABLE public.mscomment ALTER COLUMN commentid DROP DEFAULT;
       public          postgres    false    214    213            x           2604    59021    mstask taskid    DEFAULT     n   ALTER TABLE ONLY public.mstask ALTER COLUMN taskid SET DEFAULT nextval('public.mstask_taskid_seq'::regclass);
 <   ALTER TABLE public.mstask ALTER COLUMN taskid DROP DEFAULT;
       public          postgres    false    216    215            y           2604    59022    mstasklist id    DEFAULT     n   ALTER TABLE ONLY public.mstasklist ALTER COLUMN id SET DEFAULT nextval('public.mstasklist_id_seq'::regclass);
 <   ALTER TABLE public.mstasklist ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217            u           2604    59023    msuser userid    DEFAULT     o   ALTER TABLE ONLY public.msuser ALTER COLUMN userid SET DEFAULT nextval('public.dt_user_userid_seq'::regclass);
 <   ALTER TABLE public.msuser ALTER COLUMN userid DROP DEFAULT;
       public          postgres    false    210    209                      0    58999    msboard 
   TABLE DATA           e   COPY public.msboard (boardid, boardname, createddate, createdby, updateddate, updatedby) FROM stdin;
    public          postgres    false    211   ?4                 0    67226    msboardshare 
   TABLE DATA           r   COPY public.msboardshare (shareid, userid, boardid, boardname, roles, shareddate, sharedby, sharedto) FROM stdin;
    public          postgres    false    219   R5                 0    59003 	   mscomment 
   TABLE DATA           i   COPY public.mscomment (commentid, taskid, message, createddate, createdby, userid, headerid) FROM stdin;
    public          postgres    false    213   ?5                 0    59009    mstask 
   TABLE DATA           @   COPY public.mstask (taskid, taskname, boardid, seq) FROM stdin;
    public          postgres    false    215   U7                 0    59013 
   mstasklist 
   TABLE DATA           {   COPY public.mstasklist (id, taskid, tasklistname, description, createddate, createdby, updateddate, updatedby) FROM stdin;
    public          postgres    false    217   ?8                 0    58993    msuser 
   TABLE DATA           N   COPY public.msuser (userid, name, username, password, created_at) FROM stdin;
    public          postgres    false    209   A       *           0    0    dt_user_userid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.dt_user_userid_seq', 12, true);
          public          postgres    false    210            +           0    0    msboard_boardid_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.msboard_boardid_seq', 6, true);
          public          postgres    false    212            ,           0    0    msboardshare_shareid_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.msboardshare_shareid_seq', 17, true);
          public          postgres    false    220            -           0    0    mscomment_commentid_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mscomment_commentid_seq', 612, true);
          public          postgres    false    214            .           0    0    mstask_taskid_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.mstask_taskid_seq', 1, true);
          public          postgres    false    216            /           0    0    mstasklist_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.mstasklist_id_seq', 216, true);
          public          postgres    false    218            |           2606    59025    msuser dt_user_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.msuser
    ADD CONSTRAINT dt_user_pkey PRIMARY KEY (userid);
 =   ALTER TABLE ONLY public.msuser DROP CONSTRAINT dt_user_pkey;
       public            postgres    false    209            ~           2606    59027    msboard msboard_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.msboard
    ADD CONSTRAINT msboard_pkey PRIMARY KEY (boardid);
 >   ALTER TABLE ONLY public.msboard DROP CONSTRAINT msboard_pkey;
       public            postgres    false    211            ?           2606    67237    msboardshare msboardshare_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.msboardshare
    ADD CONSTRAINT msboardshare_pkey PRIMARY KEY (shareid);
 H   ALTER TABLE ONLY public.msboardshare DROP CONSTRAINT msboardshare_pkey;
       public            postgres    false    219            ?           2606    59029    mscomment mscomment_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.mscomment
    ADD CONSTRAINT mscomment_pkey PRIMARY KEY (commentid);
 B   ALTER TABLE ONLY public.mscomment DROP CONSTRAINT mscomment_pkey;
       public            postgres    false    213            ?           2606    59031    mstask mstask_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.mstask
    ADD CONSTRAINT mstask_pkey PRIMARY KEY (taskid);
 <   ALTER TABLE ONLY public.mstask DROP CONSTRAINT mstask_pkey;
       public            postgres    false    215            ?           2606    59033    mstasklist mstasklist_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.mstasklist
    ADD CONSTRAINT mstasklist_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.mstasklist DROP CONSTRAINT mstasklist_pkey;
       public            postgres    false    217               ?   x?m???@?u????Σ3;???Ft??(?!Q6??l?%????V$c?Y???1?(?#IBO?Br?_?/???]?5̒!k??I"YQ?[-kXJr?j?``?bǰ~???Љ?j?S}???w?|ޏ??%i?~?R????M}{?[QV???j???!f??V?b'??2?7y?????p?~E?`T!         L   x?34?44?4225576?tvq??M?MJ-?4202?50?54Q04?26?22?J?.??WN,)ʬ??44?????? ??         ?  x?}???? ???)???*lL?e?/?C{??k??Fy??$j?w?????.	??tS??	6??ΰ?ǣ$=N?k??C??z?(c?n??m??9#A$/????Es?1Y?_ia
?o?1~??x?h??<k??/?d?i???1??^???W?????ӫ`?-f?Oʧ???1W???og?????{ *F?!?`??{?Z/????^"? :}??VπJE????=VM[_???x?`S,?="2??<?J?\?KFp?H???????????m9????_m?Y?f?a?N?z?$??N}4e=Fx???#?%EI???HՀBQ?S?i??/??p?????????
?r97?4??o0Ǻjʹj?OL??~?V%???|"?????R??ٹzy??????         u  x?E??n?0???S?	??????R???z?)??
(, j???J6?????̐?)%??{?????bV
????6<um@QUs??C?(G????q??өM0r6*^?n?
l???~??.c?3????m7?w???Ǹ,? E6d??2??9?H?M/?A?????0F?p???e??&3H?|????S?u?????a?{Ac?ga4s??4?mcR-?c?{?Ĥ??	?IX???25?Uy?R???<-??Hɰ?J*?h?R8?O???!d+Ȝ|?M?1nU????%?V+?p?=t?[ ???&??T????V?&S9y,,??f?n̿L?׌?em??ҵ?!j@??$1/"? 纳r?)Y??]9??/1?ӓ??           x??X?r?6}??Oy?$xS?R???f??Ie??x+??D?-/????4H@$H'S?)h?/?Ow/q?e????\v????~<??c??w???|?ۼ*jZ|~z?SOp?????~????ǹO?? ??B???K?,LB???+?6]?M????)U???ewqoEf???ǯM?????X??7???رiǷE}b?Y1:??????????b'?f?J??|\y?"/?E?g???_8ŧ?\??ta^&???C]C?dEǚZ????+?k?????mTY??,_?x??[?zU??O.??7.???zq?c?}腂?	?<??˖A???xa'"??É?8m????*U??4??;?#?????90???q??\?S???͋?Z?7??*O????ݷ??+=:vl??B?Q
??Ԅ??x*3:V?BW?!g׶9???z?7?!?|?X]????W??le?z ??	?I???\?rt_???Mm,1???F<3?ꦜ?E?N,C?"??L ??i??@L'??B ?Ƀ?????,+?T?R!p?4w?S6?b????ګ?\??????Jr?<?{????8\T???l?2v?1@M????4?x?x?ˋ?)x?fE???j??.0??wo-W?E?E??ޯ???
?????,pp?0+?"?U????r???J?&)?U)π??h?jM?P>XrH?I????߿????iC(??%????8?<5:~??(??*??͋2?6~??߱??r6Eq(XQ??????'??????W3H?$?D5a??2ϙ????S?w??d;A?$^???H??^??-X??C???8????o????4?????L?Ke։?p??????Vy?Y?`榽t??	?]U??0?{??0?	?????>Џnz?֮?????q??'(Le???^?R?
F?????#M?Ό?O򼖀ky??/? ??z??(Y=t??@?!Z	?)Q6??G???Es?Yz??u?YX??*?z%?;L?????T??!q?Bu??'?i?&??(w?e&f#0???UW*5???	??Ε??ɣ??!`A???? ࡵ v-??AWB*??t
????]w???cGA?e?ubU?L?T_??2?K????d??,ձw?A#Ѧ?XᆔPK%	?J???o?\ި???.????o?4?????s?]6?$O???T{??*?Kմ??j?"4豐?d??$???m?:p"O?I????O?,???E?LS??.??S??27%?tI?f	/??@?????????s?	???w?o*?/??]???f?	??Sх????a??6????c??|?ӏ8+0?2?
`???~FvC??X??v????;???-N'??-??#ڧ&?h?E>hʦ^zj-?}?"l??L?6?m>9c? ????&?????Po8?}q??-??(?Sa;??mt?:??D?BQ???z+?r????c??s7????Wq?+?nZF??????ͭ??jۦ??#???^pDkf??NJ??D!g$f?8.q?a?b?]?X?[r??n???3Bc??q??, &??U??q?6?9?W?q???ai?B?C?"vR?wK<???LbכC?????}????cf+??@??c`?k???T?3?J/?i???;OCbU*2??4?6̜Ӧ??4~??i??j?af??4{??p?????!m?f??tn`????C????ݝ???&9???b??I???D??o??ٖqگ(62??O4?ԅ??0+z|?S?K????L???8??^??8?T?????:????F?Ua???q??Xw??V!???rV	?Ic%X(?w ??C#?MwY`??j62?R?2??2}W
n?a?B
???a??"?~CV???$	???s v???x?6.tD??΋L?4?g^????	???/???8R??q??؅???@{?o_?
????`???2??%???)?#?؇$:??zܰX?????ѿ+?
m?&4G???}N!_n?-??}8'^?
? }?????@X]6???xʤꖮbD;???AF??JW?[D??3?P_???ˀ???,??Wй???ˣ#?         ?   x?Uͻ?0@??}
V??/*??(?P5.???D??kL\Nr??1d?.???j?4F?j???F?rI?}v?`????? ???????????V;??u???@@????`??ۖN1?Sy?Q\?L?H~6g?V]?0{????l???3?N????Z?ߑa<Ѹ???OE?R?Y-K7-n???N?;?     
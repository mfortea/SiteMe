<?php

require_once( 'vendor/autoload.php' );

if ( isset( $_REQUEST['inputTexto'] ) && isset( $_REQUEST['radio'] ) ) {
    require_once( 'api-key.php' );

    $inputTexto = $_REQUEST['inputTexto'];
    $radio = $_REQUEST['radio'];
    $latitud = $_REQUEST['lat'];
    $longitud = $_REQUEST['lng'];

    /*
    $google_places = new joshtronic\GooglePlaces( $API_KEY );
    $google_places->location = array( $latitud, $longitud );
    $google_places->radius   = $radio;
    $google_places->keyword  = $inputTexto;
    $results                 = $google_places->nearbysearch();

    echo( json_encode( $results ) );
    */

    $json = '{"html_attributions":[],"next_page_token":"CqQCHwEAAOMuhAJ7WHld-lnHQqA9bSc_Kj089jH9gE8cedaYclnGzo8X3ar23JJcoXngSay4pB9j2B6ry2QZ5cmqQHD6T7n6Xz3Z05IgWLbJCOlMZruHb_SSxtFwOxJ4hOGwiwEG0FVD3i3PqJNI1ldgZbL1rVz4J3el-_jYpp1puM5UmOO8BkXGVqYi1zvMeFWlfPzU5Ww3B2CKyK71VFsA1gfY_IA3nyucPG0dhjd3VG_9XV1mKMebBmV3X5z5XWzVIvi62aJqh3cH_qNMpC7FsXNoselc0xCueaOaqwXcNcSNTA2GYk0lGuxxU6jrwxnTrCPYo49sBiSaGmLFMT68SWAJ5JQqe90XxXEUowkHwgICkPyMIr1TN87otYz_gWqwUzwoYhIQ48vuDfOpFCejABPLknQdIRoU7gj5w8pigx81zm_fOrjHcstEwM0","results":[{"geometry":{"location":{"lat":37.7053654,"lng":-5.1002203},"viewport":{"northeast":{"lat":37.7103304,"lng":-5.094296900000001},"southwest":{"lat":37.7012439,"lng":-5.1073993}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/geocode-71.png","id":"8a45cd10403cad365ca923ea03fa4d5a54a095fe","name":"Fuente Palmera","photos":[{"height":3264,"html_attributions":["Emilio Rodriguez Caro<\/a>"],"photo_reference":"CmRaAAAAliALxaRktQ54RSbBMOzJQGF_B1M3zOxxw_ouhyPaHt0w8gt_ATsKjJMDbH3AVaBb-NdsCnbCW-hX1g24Wg8SKKgXtqJotUm-drxUALkfwwIZJQkQmtZBvP3S9DlH-mEzEhAAjcUGzWbd7qmDALuQ3ziQGhTxCOB67yYoFaYr3M4T7-5djP5ReQ","width":2448}],"place_id":"ChIJ65Bkb4fSEg0RRd5kIZITgWA","reference":"ChIJ65Bkb4fSEg0RRd5kIZITgWA","scope":"GOOGLE","types":["locality","political"],"vicinity":"Fuente Palmera"},{"geometry":{"location":{"lat":37.71547440000001,"lng":-5.0700609},"viewport":{"northeast":{"lat":37.7167543802915,"lng":-5.068666719708498},"southwest":{"lat":37.71405641970851,"lng":-5.071364680291502}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/lodging-71.png","id":"d47bf18444d2280d9b22e8a7d3251de16bd6a29b","name":"CASA RURAL ECUESTRE","opening_hours":{"open_now":true},"photos":[{"height":1080,"html_attributions":["CASA RURAL ECUESTRE CARMEN MART\u00cdNEZ<\/a>"],"photo_reference":"CmRaAAAAMRWUMHTlWqgO_2hosoGSXf1lxTMLdV21lfcTYNOCNIAi-bUAdFPaH1ps4l6b5C-G8CiY3TuI_S_u2epbcp7X2LFfQjfy0qH_sNER2UpB13Tg3sw7OwtEGK5U34ogFO1gEhBC4FH1nXNztCa00GoUp2tcGhTI4oHyfWYtLnHVdZsL1R4FotLnlQ","width":1634}],"place_id":"ChIJcUVFCI_SEg0RqyAWWsYE9qs","plus_code":{"compound_code":"PW8H+5X Fuente Palmera, Spain","global_code":"8C9PPW8H+5X"},"rating":4.7,"reference":"ChIJcUVFCI_SEg0RqyAWWsYE9qs","scope":"GOOGLE","types":["lodging","point_of_interest","establishment"],"user_ratings_total":19,"vicinity":"A-440, Km 7, Fuente Palmera"},{"geometry":{"location":{"lat":37.70339209999999,"lng":-5.1029607},"viewport":{"northeast":{"lat":37.7047171802915,"lng":-5.101451519708498},"southwest":{"lat":37.70201921970851,"lng":-5.104149480291502}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png","id":"cb4da62c12803d98bfb67fba64a7e48fcf7863c2","name":"Aguilar Novias","opening_hours":{"open_now":false},"photos":[{"height":360,"html_attributions":["Aguilar Novias<\/a>"],"photo_reference":"CmRaAAAAB2YYhDG4WgSVB7dGeOJ2bLtuPwSt2OIh_AlhGypljUaFXwT0GlqcVEKPkEymwOBcYKbRQTDzrWVwKnpPMt_8gWCHM2KBomlq_6ngtVCF6hzf7-K2Wp20i_feegKl2txUEhDTfgdiryiBvs2S5U1LQmuUGhSV8mh2AokW8ORWlj3FI3iBhyt2cg","width":480}],"place_id":"ChIJk3g8C37SEg0R6FvVR56R4BA","plus_code":{"compound_code":"PV3W+9R Fuente Palmera, Spain","global_code":"8C9PPV3W+9R"},"rating":4.6,"reference":"ChIJk3g8C37SEg0R6FvVR56R4BA","scope":"GOOGLE","types":["point_of_interest","clothing_store","store","establishment"],"user_ratings_total":62,"vicinity":"Calle Portales, 15, Fuente Palmera"},{"geometry":{"location":{"lat":37.7029313,"lng":-5.1033333},"viewport":{"northeast":{"lat":37.7041979802915,"lng":-5.101977869708497},"southwest":{"lat":37.7015000197085,"lng":-5.104675830291502}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png","id":"727c4a57631c61ed4b1f6c671e63e7c9950df27f","name":"Manu Garcia Costura","opening_hours":{"open_now":false},"photos":[{"height":2268,"html_attributions":["Loli Diaz Berniel<\/a>"],"photo_reference":"CmRaAAAABauYOzWJMlhEuVu_zuJ8V0b9JgeFjoAV5UCONRAuuIDWH4LecBhE32gxcN2b5fuKoGJgsOzThzuvMsoYxBq1FxN5z7NAYyguSUOcuUPRQHQ21jLAMN-tlNEi4Mu9jUcGEhASXYKsmgV3xaQtVbcWyX2GGhQYHtH9jXm1ieHiv64Qm2s04NEwlA","width":4032}],"place_id":"ChIJE4LEaH7SEg0RmmDFYy35VNI","plus_code":{"compound_code":"PV3W+5M Fuente Palmera, Spain","global_code":"8C9PPV3W+5M"},"rating":4.9,"reference":"ChIJE4LEaH7SEg0RmmDFYy35VNI","scope":"GOOGLE","types":["point_of_interest","clothing_store","store","establishment"],"user_ratings_total":7,"vicinity":"Calle Fuente, 26, Fuente Palmera"},{"geometry":{"location":{"lat":37.7090007,"lng":-5.0949908},"viewport":{"northeast":{"lat":37.7103467302915,"lng":-5.093725619708498},"southwest":{"lat":37.70764876970851,"lng":-5.096423580291503}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/lodging-71.png","id":"717222e1c466d0d6e71875a4296ce004e5cb0213","name":"Hotel Restaurante Carlos III","photos":[{"height":3474,"html_attributions":["Juan Antonio<\/a>"],"photo_reference":"CmRaAAAAvbPO1TNLTIPlfq7OYkNDmsXbG2hAmwd8Vyl6b67LuP8yDq98FXFs8z35Pzq9ylrquMZM3aRoSLpyGjoUh6h7B7rTqIKv9TNDvh0U8n_fx4xUWspHkedNBJoMCDMc1y5oEhCogCgvZyKECdwIJuHOd59wGhSJVI3SQ9TFi5g-dLjXPhTRvgNNWQ","width":4632}],"place_id":"ChIJrYObq4fSEg0RAhHEB-T2eVY","plus_code":{"compound_code":"PW54+J2 Fuente Palmera, Spain","global_code":"8C9PPW54+J2"},"rating":4.2,"reference":"ChIJrYObq4fSEg0RAhHEB-T2eVY","scope":"GOOGLE","types":["lodging","point_of_interest","establishment"],"user_ratings_total":313,"vicinity":"Paseo Blas Infante, 0, Fuente Palmera"},{"geometry":{"location":{"lat":37.7092681,"lng":-5.098828399999999},"viewport":{"northeast":{"lat":37.7106194802915,"lng":-5.097439819708498},"southwest":{"lat":37.7079215197085,"lng":-5.100137780291503}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_business-71.png","id":"58e6b3351738cbfe4db795550b236f868190eb3e","name":"ELECTROMECANICA ESPECIALIZADA EN LIMPIEZA DE MOTORES","place_id":"ChIJuxAZK4bSEg0RlPfcJlnQpcM","plus_code":{"compound_code":"PW52+PF Fuente Palmera, Spain","global_code":"8C9PPW52+PF"},"rating":3,"reference":"ChIJuxAZK4bSEg0RlPfcJlnQpcM","scope":"GOOGLE","types":["car_repair","point_of_interest","establishment"],"user_ratings_total":1,"vicinity":"Calle Vel\u00e1zquez, C\u00f3rdoba"},{"geometry":{"location":{"lat":37.7034339,"lng":-5.102401},"viewport":{"northeast":{"lat":37.7047446802915,"lng":-5.101167519708498},"southwest":{"lat":37.70204671970851,"lng":-5.103865480291502}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png","id":"dfc15cedbac16d24bdbc1d72decc564d6787db3f","name":"Creaciones Paqui Rivero","opening_hours":{"open_now":false},"photos":[{"height":3264,"html_attributions":["Elisabeta Dobrisan<\/a>"],"photo_reference":"CmRaAAAA4w5-U971D0Ijw_sZIZ1ZW4an0bHxJRFGxs6BAx3Xxxlb_Nj3gL5NG6vl5kWTtnBG4XnvVaoVlc-EiHDMHrj6Azh6U_42y83-joOBQQnkoM5_c4huOVWTBrbSfMJsLdQsEhAC9_mtoj9kdmHDqZWIW8-fGhQtLR-bjIFCqsNQJVCsMPoRuTzb3A","width":2448}],"place_id":"ChIJYUAhDn7SEg0R4Fv2KgH5NOs","plus_code":{"compound_code":"PV3X+92 Fuente Palmera, Spain","global_code":"8C9PPV3X+92"},"rating":5,"reference":"ChIJYUAhDn7SEg0R4Fv2KgH5NOs","scope":"GOOGLE","types":["point_of_interest","clothing_store","store","establishment"],"user_ratings_total":2,"vicinity":"Calle Portales, 23, Fuente Palmera"},{"geometry":{"location":{"lat":37.7081074,"lng":-5.097193300000001},"viewport":{"northeast":{"lat":37.7095356802915,"lng":-5.095889919708498},"southwest":{"lat":37.7068377197085,"lng":-5.098587880291503}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_business-71.png","id":"6f344f82a26172ce4ee3bb6b79ca4e737f6fe7a5","name":"Antalas Centro Fitness","opening_hours":{"open_now":false},"place_id":"ChIJKb7LbIbSEg0RhOAdPjs7DLQ","plus_code":{"compound_code":"PW53+64 Fuente Palmera, Spain","global_code":"8C9PPW53+64"},"rating":4.8,"reference":"ChIJKb7LbIbSEg0RhOAdPjs7DLQ","scope":"GOOGLE","types":["gym","health","point_of_interest","establishment"],"user_ratings_total":17,"vicinity":"Paseo Blas Infante, 18, Fuente Palmera"},{"geometry":{"location":{"lat":37.7054,"lng":-5.10507},"viewport":{"northeast":{"lat":37.7067462302915,"lng":-5.103762919708497},"southwest":{"lat":37.7040482697085,"lng":-5.106460880291501}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/civic_building-71.png","id":"7cf208a848d84cb0c79b6b68b9f024f4c582d947","name":"Comunidad de Regantes de Fuente Palmera","place_id":"ChIJtz1_EXzSEg0RO4X7yjiU778","plus_code":{"compound_code":"PV4V+5X Fuente Palmera, Spain","global_code":"8C9PPV4V+5X"},"reference":"ChIJtz1_EXzSEg0RO4X7yjiU778","scope":"GOOGLE","types":["point_of_interest","establishment"],"vicinity":"Calle Ingeniero Pr\u00e1xedes Ca\u00f1ete, 2, Fuente Palmera"},{"geometry":{"location":{"lat":37.71116,"lng":-5.0974128},"viewport":{"northeast":{"lat":37.7125862802915,"lng":-5.096070719708497},"southwest":{"lat":37.7098883197085,"lng":-5.098768680291502}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_business-71.png","id":"458df9a024924c39780863a05a6935d536858d6f","name":"Paco Mena, S.A.","opening_hours":{"open_now":false},"photos":[{"height":602,"html_attributions":["Paco Mena, S.A.<\/a>"],"photo_reference":"CmRaAAAAtGBs_XAK1TkA56tmaAV5S2NYZqMLZKSwvmWgnofGoIkhp4mXAlQfrs7238RsOToK3xTRKih3A6TRFIGi-qYrc6X7KfOc8taf9h0cwtVm10td6l-YwowA_hIWHTz_T_3kEhDzKYklWKcWkd8FNHZtVkccGhRqdLP0M2H8zOg4NxsN9JuNgQoh1A","width":924}],"place_id":"ChIJu6lLuYjSEg0RUp_f_0wHlrQ","plus_code":{"compound_code":"PW63+F2 Fuente Palmera, Spain","global_code":"8C9PPW63+F2"},"rating":5,"reference":"ChIJu6lLuYjSEg0RUp_f_0wHlrQ","scope":"GOOGLE","types":["convenience_store","food","point_of_interest","store","establishment"],"user_ratings_total":1,"vicinity":"Camino de Chac\u00f3n, s\/n\u00ba, Fuente Palmera"},{"geometry":{"location":{"lat":37.7110596,"lng":-5.0990148},"viewport":{"northeast":{"lat":37.7125035802915,"lng":-5.097673319708497},"southwest":{"lat":37.7098056197085,"lng":-5.100371280291502}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_business-71.png","id":"d7c9676298108b184a9e4e024c709c7adb9ec995","name":"Catering Do\u00f1a Roc\u00edo","opening_hours":{"open_now":false},"photos":[{"height":3456,"html_attributions":["Almudena Guijo<\/a>"],"photo_reference":"CmRaAAAAFrnklP4Ixiik6NWIq3-13n9mtxVfsP6lOIqzgJO3g9EubuS4Obl52Gyx7bImXhPngHzUjHCcgoLig4OROQ4eXxg8RnilnsI0LoybGgRk935yk50XidtzkAP-pvA_MCR5EhAM0XUWs0ygoH4Ll-mHT6lIGhSN8HnC-RH0jVlxPlDG2LEPGXrnvQ","width":5184}],"place_id":"ChIJ3VQdSHzSEg0R9UtVNjnqCCs","plus_code":{"compound_code":"PW62+C9 Fuente Palmera, Spain","global_code":"8C9PPW62+C9"},"rating":4.5,"reference":"ChIJ3VQdSHzSEg0R9UtVNjnqCCs","scope":"GOOGLE","types":["food","point_of_interest","establishment"],"user_ratings_total":30,"vicinity":"Carretera de Palma del R\u00edo, S\/N, Fuente Palmera"},{"geometry":{"location":{"lat":37.7125728,"lng":-5.0901271},"viewport":{"northeast":{"lat":37.71349938029149,"lng":-5.088713919708498},"southwest":{"lat":37.7108014197085,"lng":-5.091411880291503}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_business-71.png","id":"f4ada8cecaa395a212a037fe40f3bc5c589fcfde","name":"HELLO WOOD","opening_hours":{"open_now":false},"photos":[{"height":900,"html_attributions":["HELLO WOOD<\/a>"],"photo_reference":"CmRaAAAAT0OovRvTbrhG6fitMLdhdicJ_7FyFUoxr-9w6swtm52mSGDFCPPsNpW1Ul2tcGH7oz7LmzXC3CkkVF7dch4foolIOQRnjkyffChtdzEwA3_AR9FvMf6RDLe1y3Pzr-4uEhDafcGk6HHV-uvEHI7wuGDtGhQ_ED8ctiprCjHxyPwWesLt9IhLCg","width":1200}],"place_id":"ChIJc2WK14_SEg0RDjVdupS_U24","plus_code":{"compound_code":"PW75+2W Fuente Palmera, Spain","global_code":"8C9PPW75+2W"},"reference":"ChIJc2WK14_SEg0RDjVdupS_U24","scope":"GOOGLE","types":["furniture_store","home_goods_store","point_of_interest","store","establishment"],"vicinity":"A-440, KM 9, Fuente Palmera"},{"geometry":{"location":{"lat":37.70445,"lng":-5.103330999999999},"viewport":{"northeast":{"lat":37.7058586302915,"lng":-5.101986469708498},"southwest":{"lat":37.7031606697085,"lng":-5.104684430291502}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_business-71.png","id":"118a17b0e56d9c5009e2b28507478a99d598c83e","name":"Desarrollo83-Bernaprint","opening_hours":{"open_now":false},"photos":[{"height":3120,"html_attributions":["Desarrollo83-Bernaprint<\/a>"],"photo_reference":"CmRaAAAAmliM3dFJ41kiunrxvkyp8pvr84Zgu3Fu32U2oIjEzJj2wQSKtN5CX6q8hvER4jwBv_GCzlEYESR0id_LB2vF9ztm1rG6Myp3y6BEgaMreZugxgNSEJPtsO1BJv5NKTPfEhBwmO__CdtfBY-G_cs63zwxGhQ-8HJNm-3-xmd8MckBH6maS95qyg","width":4160}],"place_id":"ChIJtRt9VofSEg0RBkh32dNJ_vc","plus_code":{"compound_code":"PV3W+QM Fuente Palmera, Spain","global_code":"8C9PPV3W+QM"},"rating":5,"reference":"ChIJtRt9VofSEg0RBkh32dNJ_vc","scope":"GOOGLE","types":["point_of_interest","establishment"],"user_ratings_total":6,"vicinity":"Calle Almazara, 2, Fuente Palmera"},{"geometry":{"location":{"lat":37.7077021,"lng":-5.098662300000001},"viewport":{"northeast":{"lat":37.70902948029149,"lng":-5.097283669708498},"southwest":{"lat":37.70633151970849,"lng":-5.099981630291503}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/civic_building-71.png","id":"2c9db33b83e13609b027dee29d7ece1bfabda913","name":"Empresa Provincial de Aguas de C\u00f3rdoba","place_id":"ChIJvdsoaofSEg0RvStFFUoQIbU","plus_code":{"compound_code":"PW52+3G Fuente Palmera, Spain","global_code":"8C9PPW52+3G"},"reference":"ChIJvdsoaofSEg0RvStFFUoQIbU","scope":"GOOGLE","types":["point_of_interest","establishment"],"vicinity":"Paseo Blas Infante, 11, Fuente Palmera"},{"geometry":{"location":{"lat":37.7042334,"lng":-5.1046253},"viewport":{"northeast":{"lat":37.70558113029149,"lng":-5.103229819708497},"southwest":{"lat":37.7028831697085,"lng":-5.105927780291502}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_business-71.png","id":"afe70854ba4044930405c85fe4f90934858386fb","name":"Luis Angel fot\u00f3grafo","opening_hours":{"open_now":false},"photos":[{"height":320,"html_attributions":["Luis Angel fot\u00f3grafo<\/a>"],"photo_reference":"CmRZAAAAARoW9t6SRB1_xBMd0iizjqd_-c8h2QqDqkoPeTs-2Pto2-drvPoGcjwZQ2UFNbJpOWQhXrMnCI59bFc1pc1EIoYH7pOFPFaHuBBj_GCSi5EBLTSrvgd2ikpFC1o-MfWZEhAsdGkBB_6MDP3svQp-0pDpGhT4hDvkVNCpFPOYoZBhtBv8JjX65g","width":512}],"place_id":"ChIJHbE-UnzSEg0R7IMOb9P96F8","plus_code":{"compound_code":"PV3W+M4 Fuente Palmera, Spain","global_code":"8C9PPV3W+M4"},"rating":5,"reference":"ChIJHbE-UnzSEg0R7IMOb9P96F8","scope":"GOOGLE","types":["point_of_interest","establishment"],"user_ratings_total":3,"vicinity":"C\/ Maestra Lolita Guisado, 7 (cruce con calle Algarrobo), Fuente Palmera"},{"geometry":{"location":{"lat":37.73412950000001,"lng":-5.1388922},"viewport":{"northeast":{"lat":37.7354825302915,"lng":-5.137551969708499},"southwest":{"lat":37.7327845697085,"lng":-5.140249930291503}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/civic_building-71.png","id":"cce34eb1b97d42ee1bf756ee6b41de00f007af0f","name":"Ayuntamiento de Fuente Palmera","opening_hours":{"open_now":false},"photos":[{"height":3024,"html_attributions":["Chico Paredes<\/a>"],"photo_reference":"CmRaAAAAKi7Br6ZGJlPER6bchpaeOIhY2vHHW7yfLvo0GlEEcwf7JZpY4LjCvLpxtR8mOs0_M3-2InGx3C4grlDvI8SCYkajdA5DCq8PfsQZd0AM3p5IBTB0Ap30g_KzOxRz27YSEhDTy5o2opCu-Kg0rU2Fk5kBGhSYSrBR74NfWcjkhTyWx8vv-BU9gg","width":4032}],"place_id":"ChIJcUNGE4fSEg0RR6LFor55bYg","plus_code":{"compound_code":"PVM6+MC Villal\u00f3n, Spain","global_code":"8C9PPVM6+MC"},"rating":3.4,"reference":"ChIJcUNGE4fSEg0RR6LFor55bYg","scope":"GOOGLE","types":["city_hall","local_government_office","point_of_interest","establishment"],"user_ratings_total":5,"vicinity":"Plaza Real, 1, Villal\u00f3n"},{"geometry":{"location":{"lat":37.7095557,"lng":-5.098459300000001},"viewport":{"northeast":{"lat":37.7109020302915,"lng":-5.097148069708497},"southwest":{"lat":37.7082040697085,"lng":-5.099846030291502}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_business-71.png","id":"a70b71d48ff8b7649f7d486147236c4f5d770a42","name":"M\u00c1RMOLES RODR\u00cdGUEZ CARVAJAL","opening_hours":{"open_now":false},"photos":[{"height":2448,"html_attributions":["M\u00c1RMOLES RODR\u00cdGUEZ CARVAJAL<\/a>"],"photo_reference":"CmRaAAAAp5X74CAN-eKKvHL3GkL3mpXKRBMa5-TkUXWkDnN1yF0X3qtOsnrd8JkXl2mo-gWUcREFVzN9qCo8vnhkyQET0_58nt-v6nJaUdmi-cXAjRYAFEEe4Jy_Cb9CcNn6nuzvEhAaaiLkhGMzrEmpvTKGQuujGhTKJE_1mdo22wilHR_N_eRSx60j_w","width":3264}],"place_id":"ChIJB4K5nYjSEg0RyTh0HnsEXgs","plus_code":{"compound_code":"PW52+RJ Fuente Palmera, Spain","global_code":"8C9PPW52+RJ"},"rating":2.3,"reference":"ChIJB4K5nYjSEg0RyTh0HnsEXgs","scope":"GOOGLE","types":["home_goods_store","general_contractor","point_of_interest","store","establishment"],"user_ratings_total":3,"vicinity":"Calle Almod\u00f3var, 14, Fuente Palmera"},{"geometry":{"location":{"lat":37.7050828,"lng":-5.103863699999999},"viewport":{"northeast":{"lat":37.70643103029149,"lng":-5.102528119708498},"southwest":{"lat":37.7037330697085,"lng":-5.105226080291501}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/civic_building-71.png","id":"ff10ebf40970c12985a9f9805b45df22aac76e77","name":"Oficina de Correos","opening_hours":{"open_now":false},"place_id":"ChIJFVjQzX3SEg0RX2TUSTtdhtI","plus_code":{"compound_code":"PV4W+2F Fuente Palmera, Spain","global_code":"8C9PPV4W+2F"},"rating":2.8,"reference":"ChIJFVjQzX3SEg0RX2TUSTtdhtI","scope":"GOOGLE","types":["post_office","finance","point_of_interest","establishment"],"user_ratings_total":4,"vicinity":"Calle Carlos III, 18, Fuente Palmera"},{"geometry":{"location":{"lat":37.7041479,"lng":-5.102269700000001},"viewport":{"northeast":{"lat":37.70551758029149,"lng":-5.100925419708497},"southwest":{"lat":37.70281961970849,"lng":-5.103623380291501}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_business-71.png","id":"d2656ed0e3b67c8ec1111daf1bedf6c6358832e9","name":"MAPFRE","opening_hours":{"open_now":false},"photos":[{"height":3542,"html_attributions":["MAPFRE<\/a>"],"photo_reference":"CmRaAAAA9kpRyAy59nUpLeGnuH8jMX8h_4qs7wn1oR02Q52me8uOX4mS-f0D4KTe1AcJGmShuRaO4ybaRqccj5Zvg7sE_Rpovn9FUdCyGB5yvD5xfV8wv-kRoVHYJpUjJfAgpL7cEhBw_oh16redyjn1OCzIy0nuGhQTeT4ZXDChPrsDbq0bPbpfRH3GFQ","width":4677}],"place_id":"ChIJVVVVVYXSEg0Rf9HSuIfrI1s","plus_code":{"compound_code":"PV3X+M3 Fuente Palmera, Spain","global_code":"8C9PPV3X+M3"},"reference":"ChIJVVVVVYXSEg0Rf9HSuIfrI1s","scope":"GOOGLE","types":["insurance_agency","health","point_of_interest","establishment"],"vicinity":"Calle M\u00e9ndez N\u00fa\u00f1ez, 34, Fuente Palmera"},{"geometry":{"location":{"lat":37.6952981,"lng":-5.193473099999999},"viewport":{"northeast":{"lat":37.7041266,"lng":-5.1774657},"southwest":{"lat":37.6864686,"lng":-5.2094805}}},"icon":"https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/geocode-71.png","id":"544ffc799ca0746f25781831785f600e10cf9bc8","name":"La Jara","place_id":"ChIJE2hIJSjQEg0RUR7uYhN6LMk","reference":"ChIJE2hIJSjQEg0RUR7uYhN6LMk","scope":"GOOGLE","types":["locality","political"],"vicinity":"La Jara"}],"status":"OK"}';

    $json2 = '{
        "html_attributions" : [],
        "next_page_token" : "CrQCIQEAALtr1qKBzlBQ_BwI4LSwcGbnsP32sNrNu5QVz8DeTs8FfQK0VHqtwKQm4QIpbhSAG94WSY1E7LNrbSeJvwyJ-wIQIht6xYqBp6r7LwwdX7J9htGa1dg_tdrTDF-oaJY2Z4A3bV688Sk-QUdvlfZ_DfwA7_mzy-8JAgkWemG8GRF0y_4oUzD-YemlclRDzDhPWJWTXWZg3toofijVJ1AYwJgsOEDeBGo5hWi3_jMLtSp5D1Sfd1TeFy6kAF3WcrHUi7S7iqv8OGDN-0jtVXXYB1uHSUYioxtPw8KN-UshKmOp6bIFPObIavKRdMHED-NCaqX36OO0fDjmFZYIXlc-xzsRbpRus5lPqVp1cPHTXRgdvCqneW_gEC5zsG8LsKEuO6cD8b5IsKumxXElail1ovsSELDgy-6iKN_tMvytJiQ5hLgaFHlasNjRFzDlrUNgGVJFiADgI2Pp",
        "results" : [
           {
              "formatted_address" : "Carretera Fuente Palmera la Ventilla, L-120, KM 5, 14120 Fuente Palmera, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.70812189999999,
                    "lng" : -5.0980522
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.70941097989272,
                       "lng" : -5.096666020107278
                    },
                    "southwest" : {
                       "lat" : 37.70671132010728,
                       "lng" : -5.099365679892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "3efafaef39b3d487e28c38d5dc568eb1022b9f3d",
              "name" : "Estación de Servicio SANTIAGO Santiago",
              "opening_hours" : {
                 "open_now" : true
              },
              "photos" : [
                 {
                    "height" : 3120,
                    "html_attributions" : [
                       "\u003ca href=\"https://maps.google.com/maps/contrib/103480572432379764062\"\u003eFelix Pardo\u003c/a\u003e"
                    ],
                    "photo_reference" : "CmRaAAAA9dVyuxpTdIJ1ehYiQfMv-A-DG4ykKSittitMxWD2Vhc3uHJm6eYOGMi1RmjSOPAHgRw-c7MO_21aYMpF2LCEDxZknsbzAw2sYhsGBwQ8titXnopFda2vVkVEReDcP7WKEhA8FuuxVncEYE9UbN6nd2wrGhThQCFyKRFKJoz7mbV6lAmiIDqj2w",
                    "width" : 4160
                 }
              ],
              "place_id" : "ChIJc3E6R4bSEg0R-oJvO9fFT4k",
              "plus_code" : {
                 "compound_code" : "PW52+6Q Fuente Palmera",
                 "global_code" : "8C9PPW52+6Q"
              },
              "rating" : 4.1,
              "reference" : "ChIJc3E6R4bSEg0R-oJvO9fFT4k",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 31
           },
           {
              "formatted_address" : "Ctra. Ventilla, 0, 14120 Fuente Palmera, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.7081902,
                    "lng" : -5.0974488
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.70952472989271,
                       "lng" : -5.096089820107278
                    },
                    "southwest" : {
                       "lat" : 37.70682507010727,
                       "lng" : -5.098789479892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "8acb94ab2f76c04cfac6ea58f90720f124600257",
              "name" : "Gasóleos Córdoba S L",
              "place_id" : "ChIJjYzYFIbSEg0RAe9gQxkMCU4",
              "plus_code" : {
                 "compound_code" : "PW53+72 Fuente Palmera",
                 "global_code" : "8C9PPW53+72"
              },
              "rating" : 0,
              "reference" : "ChIJjYzYFIbSEg0RAe9gQxkMCU4",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 0
           },
           {
              "formatted_address" : "A-440, Km.8, 14112 Fuente Palmera, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.712465,
                    "lng" : -5.0804691
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.71377432989273,
                       "lng" : -5.07911512010728
                    },
                    "southwest" : {
                       "lat" : 37.71107467010729,
                       "lng" : -5.081814779892723
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "5a1e64b58ff51e1c38d4f8ab6d08166d0dd5ae75",
              "name" : "Repsol",
              "opening_hours" : {},
              "place_id" : "ChIJv3w7fL3SEg0R-yBzy4ujaqc",
              "plus_code" : {
                 "compound_code" : "PW69+XR La Ventilla",
                 "global_code" : "8C9PPW69+XR"
              },
              "rating" : 3.9,
              "reference" : "ChIJv3w7fL3SEg0R-yBzy4ujaqc",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 10
           },
           {
              "formatted_address" : "CTRA FUENCUBIERTA, KM 8,300, A-440, 14120 Fuente Palmera, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.71208010000001,
                    "lng" : -5.0818555
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.71353757989272,
                       "lng" : -5.080516270107278
                    },
                    "southwest" : {
                       "lat" : 37.71083792010728,
                       "lng" : -5.083215929892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "8bf583bb7f903a66007aceffdc9a72ec2607cab4",
              "name" : "ES EL CORTIJO 2007, SL",
              "opening_hours" : {
                 "open_now" : true
              },
              "photos" : [
                 {
                    "height" : 1920,
                    "html_attributions" : [
                       "\u003ca href=\"https://maps.google.com/maps/contrib/108442908238702732853\"\u003eBorjita perez\u003c/a\u003e"
                    ],
                    "photo_reference" : "CmRaAAAAsRTp6ALHqKJRjOALfxipmbNr5t85WX2O1Ty86v7IP6k4QOFn_0pkLZnRwKORdHjN_hjMYjDhSARVNImbONqkyg1L2e92zEshBtVCPGp7ToOaRD_PTVzA4j3TNb91z-ylEhDDaP1Nklcwj2QryWXiRvWpGhRY1xSXadnaej-n6Oi7d_yq2GS2Vw",
                    "width" : 1080
                 }
              ],
              "place_id" : "ChIJNez5x5fSEg0RllsoLAMDAvY",
              "plus_code" : {
                 "compound_code" : "PW69+R7 Fuente Palmera",
                 "global_code" : "8C9PPW69+R7"
              },
              "rating" : 4.2,
              "reference" : "ChIJNez5x5fSEg0RllsoLAMDAvY",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 27
           },
           {
              "formatted_address" : "Calle Ventilla, 0, 14129 Peñalosa, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.7309676,
                    "lng" : -5.084841099999999
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.73238617989273,
                       "lng" : -5.083246020107278
                    },
                    "southwest" : {
                       "lat" : 37.72968652010729,
                       "lng" : -5.085945679892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "bcb2a0f8e76c340a0d56a84cb8f05fc653a0ab27",
              "name" : "Estación de Servicio Segovia",
              "opening_hours" : {},
              "place_id" : "ChIJTW1nIObSEg0RQEenXGNWhSU",
              "plus_code" : {
                 "compound_code" : "PWJ8+93 Peñalosa",
                 "global_code" : "8C9PPWJ8+93"
              },
              "rating" : 0,
              "reference" : "ChIJTW1nIObSEg0RQEenXGNWhSU",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 0
           },
           {
              "formatted_address" : "14115, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.6284764,
                    "lng" : -5.038824099999999
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.62981992989272,
                       "lng" : -5.037493370107278
                    },
                    "southwest" : {
                       "lat" : 37.62712027010728,
                       "lng" : -5.040193029892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "d4b3afdbdf2d3e6608a20f1df6e2fd4925c1b433",
              "name" : "Repsol",
              "place_id" : "ChIJbenAIWgzbQ0ResM7dH01c6c",
              "plus_code" : {
                 "compound_code" : "JXH6+9F Villar",
                 "global_code" : "8C9PJXH6+9F"
              },
              "rating" : 4,
              "reference" : "ChIJbenAIWgzbQ0ResM7dH01c6c",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 2
           },
           {
              "formatted_address" : "A-431, Km.40, 14740 Hornachuelos, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.7778072,
                    "lng" : -5.2015553
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.77922097989273,
                       "lng" : -5.200341070107278
                    },
                    "southwest" : {
                       "lat" : 37.77652132010729,
                       "lng" : -5.203040729892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "527ed6a9bac955c77276f6ff17fcee36db79af74",
              "name" : "Repsol",
              "place_id" : "ChIJi5T_QcvQEg0ReXHn5XHAA-0",
              "plus_code" : {
                 "compound_code" : "QQHX+49 Caserío de Moratalla, Hornachuelos",
                 "global_code" : "8C9PQQHX+49"
              },
              "rating" : 4.7,
              "reference" : "ChIJi5T_QcvQEg0ReXHn5XHAA-0",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 18
           },
           {
              "formatted_address" : "CARRETERA CAÑADA, Calle Écija, KM 0 35, 41439 Cañada Rosal, Sevilla, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.60029,
                    "lng" : -5.208749999999999
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.60165352989272,
                       "lng" : -5.207401670107277
                    },
                    "southwest" : {
                       "lat" : 37.59895387010727,
                       "lng" : -5.210101329892721
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "7dc6402b974f46e06884655ec0fb10f802590584",
              "name" : "GASOLINERA CAÑADA ROSAL SL",
              "place_id" : "ChIJ-72ujG_JEg0R3OFzCLTd6_0",
              "plus_code" : {
                 "compound_code" : "JQ2R+4F Cañada Rosal",
                 "global_code" : "8C9PJQ2R+4F"
              },
              "rating" : 0,
              "reference" : "ChIJ-72ujG_JEg0R3OFzCLTd6_0",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 0
           },
           {
              "formatted_address" : "SE-9104, 41439 Cañada Rosal, Sevilla, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.5942501,
                    "lng" : -5.2010759
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.59558817989272,
                       "lng" : -5.199742220107277
                    },
                    "southwest" : {
                       "lat" : 37.59288852010727,
                       "lng" : -5.202441879892721
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "8a41456724168318123507d422cdf02a8d74721d",
              "name" : "Es Santa Ana",
              "opening_hours" : {},
              "place_id" : "ChIJaaQLpcbIEg0RnPK8EqLoe6s",
              "plus_code" : {
                 "compound_code" : "HQVX+PH Cañada Rosal",
                 "global_code" : "8C9PHQVX+PH"
              },
              "rating" : 4.8,
              "reference" : "ChIJaaQLpcbIEg0RnPK8EqLoe6s",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 5
           },
           {
              "formatted_address" : "Calle Garrotal, Parcela 2, 14700, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.7019692,
                    "lng" : -5.2633793
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.70312132989272,
                       "lng" : -5.262054420107278
                    },
                    "southwest" : {
                       "lat" : 37.70042167010728,
                       "lng" : -5.264754079892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "730535ea1373f5923f6cc2bccaa26be999b6e21b",
              "name" : "Estación de Servicio BP Palma del Río",
              "opening_hours" : {
                 "open_now" : false
              },
              "photos" : [
                 {
                    "height" : 1126,
                    "html_attributions" : [
                       "\u003ca href=\"https://maps.google.com/maps/contrib/112242618620338886970\"\u003eA Google User\u003c/a\u003e"
                    ],
                    "photo_reference" : "CmRaAAAARtGD9II7PuMqX1dIwkG9c5k_0FBnDd4QtG6dXa-SRo1eqoDjlSJwijMwPiX8qxm6VjwJ_lraA3h9HoP6hoQ92ZQGRgR575K4TmiZwG9CCE9oOgUcCv6-v2cW_NAH1x4TEhDdTPghS04yxZsi_LMlRjS0GhQHxG_xO-_nL6ewC9tJdUwzZCfqJA",
                    "width" : 2000
                 }
              ],
              "place_id" : "ChIJbwbJrdDaEg0RctAUpBK_GxE",
              "plus_code" : {
                 "compound_code" : "PP2P+QJ Palma del Río",
                 "global_code" : "8C9PPP2P+QJ"
              },
              "rating" : 4.3,
              "reference" : "ChIJbwbJrdDaEg0RctAUpBK_GxE",
              "types" : [ "gas_station", "car_wash", "point_of_interest", "establishment" ],
              "user_ratings_total" : 136
           },
           {
              "formatted_address" : "Calle A, 9, 14700 Palma del Río, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.7026058,
                    "lng" : -5.256569199999999
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.70392472989272,
                       "lng" : -5.255211520107278
                    },
                    "southwest" : {
                       "lat" : 37.70122507010727,
                       "lng" : -5.257911179892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "d46d5e9e93d78fa324d7ebe56da4b3bba50b2336",
              "name" : "Campsa EE S S A",
              "place_id" : "ChIJ119FYMXaEg0RV7t6YxBwCA0",
              "rating" : 1,
              "reference" : "ChIJ119FYMXaEg0RV7t6YxBwCA0",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 1
           },
           {
              "formatted_address" : "Camino Cañada de Palma del Río A, 41439 Cañada Rosal, Sevilla, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.5824032,
                    "lng" : -5.1463284
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.58372232989272,
                       "lng" : -5.144987470107278
                    },
                    "southwest" : {
                       "lat" : 37.58102267010728,
                       "lng" : -5.147687129892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "b5a38cc512d293034c38e00483df457f616f55d3",
              "name" : "Gasolinera Cañada Rosal S L",
              "place_id" : "ChIJpZZQBmPJEg0Rht0yIdg9FpI",
              "rating" : 0,
              "reference" : "ChIJpZZQBmPJEg0Rht0yIdg9FpI",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 0
           },
           {
              "formatted_address" : "Av. Paz, S.N, 14700 Palma del Río, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.70001389999999,
                    "lng" : -5.2726926
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.70130467989272,
                       "lng" : -5.271312920107278
                    },
                    "southwest" : {
                       "lat" : 37.69860502010728,
                       "lng" : -5.274012579892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "62aff85b76bd4ede7493d1b7a7d3008621c97c39",
              "name" : "Estación de Servicio Repsol",
              "opening_hours" : {
                 "open_now" : true
              },
              "photos" : [
                 {
                    "height" : 3024,
                    "html_attributions" : [
                       "\u003ca href=\"https://maps.google.com/maps/contrib/102530344499998140206\"\u003eELOY LUIS VIRO ESPEJO\u003c/a\u003e"
                    ],
                    "photo_reference" : "CmRaAAAAoC-6sfXcZ5Osg9siAt2icwerTMVjzofUTziyEIS4Y3MaBO4QjDMG1YWgW20NlEZYj_CFl_kqXug5ojea-ttHQru1VORKiZrpIs4tAeeP7ndlQrmZSPeFQUKtRAaUJcZ9EhA124dLeOfpFCZnjSe4MMroGhT4JF58R-hXBeWKMh4Mvv4VP9przw",
                    "width" : 4032
                 }
              ],
              "place_id" : "ChIJeYyzxijbEg0R-XvpibD-0Fg",
              "plus_code" : {
                 "compound_code" : "PP2G+2W Palma del Río",
                 "global_code" : "8C9PPP2G+2W"
              },
              "rating" : 4.6,
              "reference" : "ChIJeYyzxijbEg0R-XvpibD-0Fg",
              "types" : [ "gas_station", "car_wash", "point_of_interest", "establishment" ],
              "user_ratings_total" : 19
           },
           {
              "formatted_address" : "Av. Maria Auxiliadora, 3, 14730 Posadas, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.8049683,
                    "lng" : -5.1053036
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.80638607989272,
                       "lng" : -5.104019720107279
                    },
                    "southwest" : {
                       "lat" : 37.80368642010727,
                       "lng" : -5.106719379892723
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "daaeeff4ab3189a37794961f5c455df43f4f8bb1",
              "name" : "Estacion Servicio Posadas - Mª Auxiliadora",
              "opening_hours" : {
                 "open_now" : true
              },
              "photos" : [
                 {
                    "height" : 3104,
                    "html_attributions" : [
                       "\u003ca href=\"https://maps.google.com/maps/contrib/115668915621531579955\"\u003eEstacion Servicio Posadas - Mª Auxiliadora\u003c/a\u003e"
                    ],
                    "photo_reference" : "CmRaAAAAOcIwIl3z8Mu_SMxB-UZ_2G04A3FmQYcAOatoOAhm8nNS2edkAV0Za4uruaqeeiOF41vkygcDdPvbox5Pd2v7iXeDF2Xp1LL0hYabMy4uXBPwMIbsuvRmKRkiXP8GwzljEhBNZImLHSrHKzoGEsVBYelqGhToqOrOQIoG2Yp2YoOKiFOvFR3HzQ",
                    "width" : 1746
                 }
              ],
              "place_id" : "ChIJ53uOIl7UEg0RkbStu5r5zF8",
              "plus_code" : {
                 "compound_code" : "RV3V+XV Posadas",
                 "global_code" : "8C9PRV3V+XV"
              },
              "rating" : 4.2,
              "reference" : "ChIJ53uOIl7UEg0RkbStu5r5zF8",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 18
           },
           {
              "formatted_address" : "Av. Santa Ana, 83, 14700 Palma del Río, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.7030093,
                    "lng" : -5.282676
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.70441412989272,
                       "lng" : -5.281289970107277
                    },
                    "southwest" : {
                       "lat" : 37.70171447010728,
                       "lng" : -5.283989629892721
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "be042f36714b31916bc1ce65f947cd721cd73218",
              "name" : "E.S. SANTA ANA - CEPSA PALMA DEL RIO",
              "opening_hours" : {
                 "open_now" : true
              },
              "place_id" : "ChIJ9frjNS7bEg0Rn3dO-T9DwIU",
              "plus_code" : {
                 "compound_code" : "PP38+6W Palma del Río",
                 "global_code" : "8C9PPP38+6W"
              },
              "rating" : 4.3,
              "reference" : "ChIJ9frjNS7bEg0Rn3dO-T9DwIU",
              "types" : [
                 "gas_station",
                 "car_wash",
                 "bakery",
                 "supermarket",
                 "grocery_or_supermarket",
                 "car_repair",
                 "liquor_store",
                 "food",
                 "point_of_interest",
                 "store",
                 "establishment"
              ],
              "user_ratings_total" : 85
           },
           {
              "formatted_address" : "Avenida María Auxiliadora, 51, 14700 Palma del Río, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.69821710000001,
                    "lng" : -5.2801691
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.69956562989272,
                       "lng" : -5.278862070107278
                    },
                    "southwest" : {
                       "lat" : 37.69686597010728,
                       "lng" : -5.281561729892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "7718f626df75392c5f41f15cb6c10fbebe5dff59",
              "name" : "Estación De Servicio Caro Cumplido S L",
              "place_id" : "ChIJoaEjyDHbEg0R-5hEXD-8ZxQ",
              "rating" : 5,
              "reference" : "ChIJoaEjyDHbEg0R-5hEXD-8ZxQ",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 1
           },
           {
              "formatted_address" : "S-450, A-4, 41400 Écija, Sevilla, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.5484883,
                    "lng" : -5.045010599999999
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.54994432989272,
                       "lng" : -5.043630770107279
                    },
                    "southwest" : {
                       "lat" : 37.54724467010728,
                       "lng" : -5.046330429892723
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "7cb36a2b2addf4a7ac68d4ac4dc1143341946b1d",
              "name" : "GASOLINERA CEPSA ASTIGI",
              "place_id" : "ChIJWxwEhIM1bQ0Ri5I_6kJ1yEY",
              "plus_code" : {
                 "compound_code" : "GXX3+9X Écija",
                 "global_code" : "8C9PGXX3+9X"
              },
              "rating" : 2.4,
              "reference" : "ChIJWxwEhIM1bQ0Ri5I_6kJ1yEY",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 5
           },
           {
              "formatted_address" : "Calle Nogal, 2, 14700 Palma del Río, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.7088466,
                    "lng" : -5.2844225
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.71019422989272,
                       "lng" : -5.283020070107278
                    },
                    "southwest" : {
                       "lat" : 37.70749457010728,
                       "lng" : -5.285719729892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "c17013dba927e5cbd1929d9c45c8e2c3ff27039d",
              "name" : "E.S.Caro Cumplido",
              "opening_hours" : {
                 "open_now" : true
              },
              "place_id" : "ChIJTVh2STrbEg0RWUg8LXEx-DQ",
              "plus_code" : {
                 "compound_code" : "PP58+G6 Palma del Río",
                 "global_code" : "8C9PPP58+G6"
              },
              "rating" : 4.3,
              "reference" : "ChIJTVh2STrbEg0RWUg8LXEx-DQ",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 86
           },
           {
              "formatted_address" : "Camino Servicio A4, 36B, 14100, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.602823,
                    "lng" : -4.972582
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.60411082989272,
                       "lng" : -4.971102370107278
                    },
                    "southwest" : {
                       "lat" : 37.60141117010728,
                       "lng" : -4.973802029892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "dbf4c16ab90da61a77d7c74967424d4b3b5ecaf6",
              "name" : "E.S. El Empalme",
              "opening_hours" : {
                 "open_now" : true
              },
              "photos" : [
                 {
                    "height" : 2160,
                    "html_attributions" : [
                       "\u003ca href=\"https://maps.google.com/maps/contrib/100273329204399541072\"\u003eAgip\u003c/a\u003e"
                    ],
                    "photo_reference" : "CmRaAAAA6F0qENW6JBewcskGb2aVHRoZmQOBR2-NccupUZ3s8aql6dE6FXj9uqBy8QEpSECPi5phrI2ZHj1uKjT7K3xRLFUr4e5kgQfvdl74PJsEqCtdfL1pyJlkb00ygsvqCupcEhCigZXJV6SejMPeFrU4vrdAGhRieUs6GHeQK3DKmcu8w7lXMU7F8g",
                    "width" : 3840
                 }
              ],
              "place_id" : "ChIJXy7-SKE2bQ0RpBBjKSQ8bp8",
              "plus_code" : {
                 "compound_code" : "J23G+4X Cerro Perea",
                 "global_code" : "8C9QJ23G+4X"
              },
              "rating" : 4.4,
              "reference" : "ChIJXy7-SKE2bQ0RpBBjKSQ8bp8",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 24
           },
           {
              "formatted_address" : "Calle de Palma del Río, 14740 Hornachuelos, Córdoba, España",
              "geometry" : {
                 "location" : {
                    "lat" : 37.6980648,
                    "lng" : -5.283729399999999
                 },
                 "viewport" : {
                    "northeast" : {
                       "lat" : 37.69942972989271,
                       "lng" : -5.282344620107278
                    },
                    "southwest" : {
                       "lat" : 37.69673007010727,
                       "lng" : -5.285044279892722
                    }
                 }
              },
              "icon" : "https://maps.gstatic.com/mapfiles/place_api/icons/gas_station-71.png",
              "id" : "52bbe4f6a3f43af13afcd72151735ebb3dc3a23a",
              "name" : "E.S. Moratalla S.C.",
              "place_id" : "ChIJMRDWQkvYEg0RYiCLei7EABk",
              "rating" : 3,
              "reference" : "ChIJMRDWQkvYEg0RYiCLei7EABk",
              "types" : [ "gas_station", "point_of_interest", "establishment" ],
              "user_ratings_total" : 1
           }
        ],
        "status" : "OK"
     }
     ';

    echo( $json2 );

}

?>
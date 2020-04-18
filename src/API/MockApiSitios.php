<?php
namespace App\API;
use \stdClass;

class MockApiSitios implements IApiSitios {

    public function getSitios ( string $latitud, string $longitud, string $busqueda, string $radio ) {

        $json = '{
            "html_attributions": [
              
            ],
            "next_page_token": "CqQCIAEAAAzKLV0C7pWUjH9MtOJNn_9zM4ORjW4aa--vvCWzvyvQzBJmW30QNwA2EJQfwjM4ztLXsvLXHRQKQl9XIGe3FMV-LRR9gEtr07iiiBpxU3Wjgz1eoopmppdSLi-MQGDiu4IB7wYjz5ut62R6Ia59W8K5txtshtpypSVD2sOUcHRYbDndITOzqJ7P0FYM0TwxPFfr3E__jwDMw3e-Lxc_csiFWxMH62uzktFYATGA59z8VUzx2jG-NKzbB6cSS7RNLD7kqaVryjlxKvcmmyoc3XUF5PLVFMvPwGfiN6AL3yiXQTGbTSVT_DhU9YnUyto8oJsB4rbGzR-akVjDEl8yxeJ9wMUN0yRQBKT6Nma4DUpc8IdJ7F23ViVSg7YeZzQ1IhIQgT3v51j6uXU4A6ubA7MCxxoU8NFCHvRQbr9CkcMcL2cnTR-6Hs4",
            "results": [
              {
                "geometry": {
                  "location": {
                    "lat": 37.704731,
                    "lng": -5.093558
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.70608847989272,
                      "lng": -5.092152220107278
                    },
                    "southwest": {
                      "lat": 37.70338882010727,
                      "lng": -5.094851879892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "31841daa964370d1ec5496e736783c5c05ce4a80",
                "name": "Meson La Rueda",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 2560,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/110410081666991636451\">A Google User</a>"
                    ],
                    "photo_reference": "CmRaAAAAV1aTHZXBeDlhzKRLVC3mGANclSj9weqd9vn-KOWyoLsJ3M8EPYSPVqkXnO-eN-1SXPKN01TiX392-Hb_K4FuVDo2upEc4owX3K5gfSzkFdrqZhkRBXnOpmB5lAXRnVOXEhA9p99tu5wmkUDJaqPQnaopGhScPuK67VFWVdNIv2hH9qXsk16rBw",
                    "width": 1920
                  }
                ],
                "place_id": "ChIJb4Yih4TSEg0R4kQGfbCLm0A",
                "plus_code": {
                  "compound_code": "PW34+VH Fuente Palmera",
                  "global_code": "8C9PPW34+VH"
                },
                "price_level": 1,
                "rating": 4.5,
                "reference": "ChIJb4Yih4TSEg0R4kQGfbCLm0A",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 48,
                "vicinity": "Calle Instituto Colonial, 64, Fuente Palmera"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.7032838,
                    "lng": -5.1030654
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.70466087989272,
                      "lng": -5.101504770107278
                    },
                    "southwest": {
                      "lat": 37.70196122010728,
                      "lng": -5.104204429892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "0bdb89e0d7dc0dc73b20c2529eb1fe954e83777f",
                "name": "Bar Venta los Castaños",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 1200,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/104637621816955809152\">A Google User</a>"
                    ],
                    "photo_reference": "CmRaAAAA2IZALTXh7ZJiXUC_ZMArSw8_cPSh_LddqK2eCqQv25IBr8lML7__PPYQbwG5kbiSW7982j30v-ZW6VJUs0RiO5-z28quQLcsBj3XzilXY3r2LAXmrKr20ZgSoywnMVWCEhAtyJqdN_TLx38g0SX5pTlRGhRalySZCgwQfEFABprw5Nyp9suRew",
                    "width": 1600
                  }
                ],
                "place_id": "ChIJh5J9bX7SEg0ROG6dWEED4NQ",
                "plus_code": {
                  "compound_code": "PV3W+8Q Fuente Palmera",
                  "global_code": "8C9PPV3W+8Q"
                },
                "price_level": 1,
                "rating": 3.9,
                "reference": "ChIJh5J9bX7SEg0ROG6dWEED4NQ",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "bar",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 113,
                "vicinity": "Calle Portales, 16, Fuente Palmera"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.7029711,
                    "lng": -5.1010759
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.70434047989273,
                      "lng": -5.099727420107278
                    },
                    "southwest": {
                      "lat": 37.70164082010728,
                      "lng": -5.102427079892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "1571dc59d5cdd2ee15c0ef5cf1d00964aa75ca28",
                "name": "Taberna flamenca \"Joseito Téllez\"",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 4608,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/117415274558887211505\">José Luis</a>"
                    ],
                    "photo_reference": "CmRaAAAAOCjh3XFubNbo35YMGDyW9ev0MDkvv9LoKf_vAEi3rgKFgevidoLLAW3bd6UFvjDDpNth2Vy64BW_rMBxiSwSP8XbXfUa-Yvwir206nqJGmepqWEy4Qq3Daw3MYuWndXTEhCLXIydFWsyVMc7dXqJSM_BGhTge4NF2VsoWoKN7HgJmSMV_IMHSQ",
                    "width": 3456
                  }
                ],
                "place_id": "ChIJMZrjZAnTEg0Reb1LoLj3_Qo",
                "plus_code": {
                  "compound_code": "PV3X+5H Fuente Palmera",
                  "global_code": "8C9PPV3X+5H"
                },
                "rating": 4.3,
                "reference": "ChIJMZrjZAnTEg0Reb1LoLj3_Qo",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 55,
                "vicinity": "Calle Dolores Fuentes, 2, Fuente Palmera"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.8018063,
                    "lng": -5.1073229
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.80316177989272,
                      "lng": -5.106034870107278
                    },
                    "southwest": {
                      "lat": 37.80046212010728,
                      "lng": -5.108734529892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "5bdf5d8ca02acbc6cec08062c1415b5078f99104",
                "name": "Las Posadas Del Rey",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 1080,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/109135224982872895558\">Ramon Lopez Navarro</a>"
                    ],
                    "photo_reference": "CmRaAAAAoaiconwQKw6-2c50Bjs8WFfR4bJEgmvUjLrvMHuplCeJsrwboQd7HD1mfIy79hx6Pd4VjEGBVe1IBR-seGDGn_-eTh6DAnlE6qU5er4EFd-e2uDZTRQuy60h-Vt6uHQGEhCjgXB-Fi4gmu9iXHqKVErEGhTWRjXVRAjMHSG40Cc1nzEYt30xcg",
                    "width": 1920
                  }
                ],
                "place_id": "ChIJkRgs2mbUEg0RWYIlidkKAKY",
                "plus_code": {
                  "compound_code": "RV2V+P3 Posadas",
                  "global_code": "8C9PRV2V+P3"
                },
                "price_level": 1,
                "rating": 4.4,
                "reference": "ChIJkRgs2mbUEg0RWYIlidkKAKY",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 89,
                "vicinity": "Calle Mesones, 4, Posadas"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.5395577,
                    "lng": -5.079836999999999
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.54095962989273,
                      "lng": -5.078499220107277
                    },
                    "southwest": {
                      "lat": 37.53825997010728,
                      "lng": -5.081198879892721
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
                "id": "cc4e8278c5b833f4431bc7db1ab5d8bfa33f07fc",
                "name": "Restaurante Las Ninfas",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 4032,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/103923108365044403401\">Lola Herrera Jurado</a>"
                    ],
                    "photo_reference": "CmRaAAAAgKL8NhuEbGadttkTnAWMGWBdu6eIcBLIZztzX2Rdah01wXAtb4T0h8W4Sz0Qoa4At862ANcLmSl4Y4jbOWpwDLjJMYbO5xaM4kTcj4lfnIRImOHg-bAq7MsYJZXa0AU5EhAj-tCutX8LQP0QjSPKSAbcGhRxPcDm7Vt-2y1tHzu3aPKSxHe2qg",
                    "width": 3024
                  }
                ],
                "place_id": "ChIJCzERuaLKEg0RBkDCY9pvxaA",
                "plus_code": {
                  "compound_code": "GWQC+R3 Écija",
                  "global_code": "8C9PGWQC+R3"
                },
                "rating": 4.5,
                "reference": "ChIJCzERuaLKEg0RBkDCY9pvxaA",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 477,
                "vicinity": "Calle Elvira, 1, Écija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.656097,
                    "lng": -5.082572000000001
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.65745047989272,
                      "lng": -5.081315520107277
                    },
                    "southwest": {
                      "lat": 37.65475082010727,
                      "lng": -5.084015179892721
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
                "id": "4e0dfb30b948e0d35c2c2412d8b30d3299bd3cc0",
                "name": "Bar Soto \"El Pepo\"",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 3120,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/107606634126424490589\">Jose A. Perez</a>"
                    ],
                    "photo_reference": "CmRZAAAA9JBdM3XYLlcOmMcYEy6n5721_yc13p9VOt4aYs3UXlZwd9lIz8GlygqyB3_b56gghpUzFFNzJ7ScoRdTm5OwYOoCJHIuukSAOifEPlH3WbMBiy_5sxbUsyflTdVcHcYjEhAocMvdhJ4_BisG2p85-Pv-GhQGZkvatQqbf3cIENB1zK9bwvitpw",
                    "width": 4160
                  }
                ],
                "place_id": "ChIJoUWnMODMEg0RwzipMikkrcE",
                "plus_code": {
                  "compound_code": "MW48+CX Cañada del Rabadán",
                  "global_code": "8C9PMW48+CX"
                },
                "price_level": 1,
                "rating": 4.3,
                "reference": "ChIJoUWnMODMEg0RwzipMikkrcE",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 66,
                "vicinity": "41409, Av. Andalucía, 83, Cañada del Rabadán"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.7028579,
                    "lng": -5.282312900000001
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.70426062989272,
                      "lng": -5.280923970107279
                    },
                    "southwest": {
                      "lat": 37.70156097010727,
                      "lng": -5.283623629892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "b852c10dca5298c118b6d46ce03a48d9ce24fdd8",
                "name": "Cafeteria Restaurante Balma",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 1080,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/100455808092472874861\">Dámaso Ceballos Gracía</a>"
                    ],
                    "photo_reference": "CmRaAAAAdx8gQTJpb9fXirzP6L-tf5sow8RvEk-yuBm2sTaoQqwDwVVH9DOlIbCkTW26cDLrtlfT3GHj1qJ7NWN_kBclCFUSyc4tOy8L79p1rJgPi5mU9UQF2lroF_XEgzFQdA9gEhDcnahNcfAUA8oEvhayfj7KGhRn4X5pEokpTu7q3ALY4fywvVm38A",
                    "width": 1920
                  }
                ],
                "place_id": "ChIJczkPQzrbEg0RhW3TfFLDuyI",
                "plus_code": {
                  "compound_code": "PP39+43 Palma del Río",
                  "global_code": "8C9PPP39+43"
                },
                "price_level": 2,
                "rating": 4.5,
                "reference": "ChIJczkPQzrbEg0RhW3TfFLDuyI",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "cafe",
                  "food",
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 548,
                "vicinity": "Av. Santa Ana, 81, Palma del Río"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.54442,
                    "lng": -5.07559
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.54577977989272,
                      "lng": -5.074223620107277
                    },
                    "southwest": {
                      "lat": 37.54308012010728,
                      "lng": -5.076923279892721
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "2d83253f958b99f002a509cc4c6d3b334c22c7ee",
                "name": "Cien Vinos Natural Food",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 3024,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/105179291575648100463\">A Google User</a>"
                    ],
                    "photo_reference": "CmRaAAAAKP3lVZUxDQfd0O9JBsWgGpYenpDgUwC8Ztgjj-VfrkLWwFgB4_mqS1Z5G4W9fNTEN2S7_dHoiPlhglqKgLWqLb-cfg1Kui6G9GlH38VI9ICzKykLy-8ePqlwXL9DknuJEhAds3EuvtBRLzgPIzcyq0SsGhQ11__CGmMEE-Xb4dHPSGTkhsFR8Q",
                    "width": 4032
                  }
                ],
                "place_id": "ChIJjx3WDrfIEg0RzkNVfK8bhAI",
                "plus_code": {
                  "compound_code": "GWVF+QQ Écija",
                  "global_code": "8C9PGWVF+QQ"
                },
                "price_level": 1,
                "rating": 4.5,
                "reference": "ChIJjx3WDrfIEg0RzkNVfK8bhAI",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 538,
                "vicinity": "Calle Berbisa esquina Calle Merinos, Écija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.6356084,
                    "lng": -5.0610593
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.63693742989272,
                      "lng": -5.059654820107279
                    },
                    "southwest": {
                      "lat": 37.63423777010728,
                      "lng": -5.062354479892723
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
                "id": "d499adafa1863efdae1ca9655960dff1464a276b",
                "name": "Bar Tete",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 2592,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/102189637078480464710\">Tete</a>"
                    ],
                    "photo_reference": "CmRaAAAAChYBm2BXbWzR-dZxcrvIBvkVprvCOTYw-0ZODmDBhxyMUL_sbzj1CwGJta2HkZ4gIShVGsUnFSbrjWkI3EPCbFOJz8TkGY--ixufAAgd_3K1CSdtUS7Pi_H7fv-rc54REhDNAYe_-14tBdvoZafHbxm_GhRyaVytV8xfrmbLcyBYN-m3W4UAVg",
                    "width": 4608
                  }
                ],
                "place_id": "ChIJsT-Ca7XMEg0Rx0bGtv0XEbQ",
                "plus_code": {
                  "compound_code": "JWPQ+6H Villar",
                  "global_code": "8C9PJWPQ+6H"
                },
                "price_level": 1,
                "rating": 4.3,
                "reference": "ChIJsT-Ca7XMEg0Rx0bGtv0XEbQ",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 186,
                "vicinity": "Diseminado Villar, 98, Villar"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.7027829,
                    "lng": -5.2566463
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.70404172989272,
                      "lng": -5.255273370107278
                    },
                    "southwest": {
                      "lat": 37.70134207010728,
                      "lng": -5.257973029892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/lodging-71.png",
                "id": "47ccee94e7142c79376375741e60c05d3b07579d",
                "name": "Hostal Restaurante Hermanos Zamora",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 367,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/106944543862839791354\">A Google User</a>"
                    ],
                    "photo_reference": "CmRaAAAALPXlyVxXOG4uNMZbv5UkYRw5QCDy8K7C_y42EAHLKQJSWUSHIHIddop9zzIip9KoW_Xum1wyyCSQJ_Va6Ca6nOJTvDzbTIWIzh-dHi1TZDuntKJwkSzquxsCkVC-9gdDEhA_-pukPFgtzsCH53rePY4yGhS-1opH_MgJhQlBgv7AJ5d89gZOsQ",
                    "width": 550
                  }
                ],
                "place_id": "ChIJTV3mWMXaEg0RRnkrET3Jpv4",
                "plus_code": {
                  "compound_code": "PP3V+48 Palma del Río",
                  "global_code": "8C9PPP3V+48"
                },
                "rating": 4.2,
                "reference": "ChIJTV3mWMXaEg0RRnkrET3Jpv4",
                "scope": "GOOGLE",
                "types": [
                  "lodging",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 323,
                "vicinity": "Calle A Parcela 17 (Polígono Industrial El Garrotal, Palma del Río"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.709758,
                    "lng": -5.0954766
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.71140347989272,
                      "lng": -5.094158720107278
                    },
                    "southwest": {
                      "lat": 37.70870382010727,
                      "lng": -5.096858379892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "0049bd71b42a4fb091aac44895a6a7817669b2f2",
                "name": "El CAPACHO",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 3264,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/110811398607176268874\">Oscar Otero</a>"
                    ],
                    "photo_reference": "CmRaAAAA6X2Cv6RX4fRwW45855dU95ZM5l0FwDX15ymzpKT7yqiIwr2Tqg0Q2l-VTt-vBKVJkrQy0TzQodqW5Y0sL-XhVZW0O3Uk38WZsW0SYA1bSrpDmaDMIGZ3CnSP8xJ8CZ6eEhAwMxI-qixATd7v5-3GEI0KGhTXMb_wP6mfKQrSjP2PLqT5VJIKOw",
                    "width": 1840
                  }
                ],
                "place_id": "ChIJ8UQPWY_SEg0REO_eVb75rBg",
                "plus_code": {
                  "compound_code": "PW53+WR Fuente Palmera",
                  "global_code": "8C9PPW53+WR"
                },
                "price_level": 1,
                "rating": 3.7,
                "reference": "ChIJ8UQPWY_SEg0REO_eVb75rBg",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 179,
                "vicinity": "Poligono Industrial, 2B"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.8176626,
                    "lng": -5.0072751
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.81914262989272,
                      "lng": -5.005872420107278
                    },
                    "southwest": {
                      "lat": 37.81644297010727,
                      "lng": -5.008572079892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "cf9896fb2d382328da5645374d182ccf67ee2b5b",
                "name": "Restaurante los Llanos",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 2268,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/116837388232070832861\">A Google User</a>"
                    ],
                    "photo_reference": "CmRaAAAAkwKwyMSE0Iv5XYvNugpVUMlf2ufeOQUHZJQY9s6ON9_iLa8v1iG-ugB_iQ5W0ZhiX5hPuP8i7Tq47FevQdzsxYimWRD9Ktphc5jE0skIcIw9eIp6fOMM0hvDxE-ZdtEPEhBQiIJnQ46lO-kSWQcAXxyRGhR9VqmcPQYTsDRC4crlxA_hfI_h6Q",
                    "width": 4032
                  }
                ],
                "place_id": "ChIJ2xjEw7orbQ0RNvqsVxMKblg",
                "plus_code": {
                  "compound_code": "RX9V+33 Almodóvar del Río",
                  "global_code": "8C9PRX9V+33"
                },
                "price_level": 1,
                "rating": 4.2,
                "reference": "ChIJ2xjEw7orbQ0RNvqsVxMKblg",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 458,
                "vicinity": "CO-3313"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.70822,
                    "lng": -5.096769999999999
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.70966452989272,
                      "lng": -5.095483370107278
                    },
                    "southwest": {
                      "lat": 37.70696487010728,
                      "lng": -5.098183029892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
                "id": "58a8b43c7cae8be01c637cfa5f10911d8de7c3b5",
                "name": "Bar Restaurante Las Tinajas",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 1173,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/104583039099797330377\">Francisco Adame Rodriguez</a>"
                    ],
                    "photo_reference": "CmRaAAAAXMZm4blUbjHJTYwPhTIiXAwtDzw8q7wRnuFoM4UQsJFE2vixkr_sEcMcjiU41-y_Uif2h7Wixghckp9tOOzkr2N4lNoHYDJJBq5NxohnDlaJUa7B-XW6ipoQN0VnhS9iEhBKJig67tb6k6Int8QCXHpAGhSldlyqHOShyKskVRDuYX43AbYIHA",
                    "width": 879
                  }
                ],
                "place_id": "ChIJ4XzmDYbSEg0R-9nIlttc4n0",
                "plus_code": {
                  "compound_code": "PW53+77 Fuente Palmera",
                  "global_code": "8C9PPW53+77"
                },
                "price_level": 1,
                "rating": 3.5,
                "reference": "ChIJ4XzmDYbSEg0R-9nIlttc4n0",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 20,
                "vicinity": "Ctra. Ventilla, 14A, Fuente Palmera"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.7041931,
                    "lng": -5.2571029
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.70552392989273,
                      "lng": -5.255860170107278
                    },
                    "southwest": {
                      "lat": 37.70282427010728,
                      "lng": -5.258559829892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
                "id": "c79f6c54e35ab5f73bda69ebde6ce1c42b87903c",
                "name": "El Garrotal Restaurante",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 3000,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/105492162233359977998\">Pablo José Martínez Morales</a>"
                    ],
                    "photo_reference": "CmRaAAAAafdCulY16vkuyyC0K7VRnu_LwN_ph6XKrAypyQdSRFKfWHclHeEktVvjNFywGcE0Ez54Ft0aDTj-JIxHkWNcmZO56iJfbdTWuJ7WfWpzS2kR96hGaqjilfra3YctmNUfEhDTgJTOlqpx1t7NTiAyr7GaGhQzLuVkAHxLEOyM4PTc_AlkQBIGLw",
                    "width": 4000
                  }
                ],
                "place_id": "ChIJEfFzcfzREg0RDUVd9gQs-pM",
                "plus_code": {
                  "compound_code": "PP3V+M5 Palma del Río",
                  "global_code": "8C9PPP3V+M5"
                },
                "price_level": 1,
                "rating": 4.2,
                "reference": "ChIJEfFzcfzREg0RDUVd9gQs-pM",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 649,
                "vicinity": "Calle Garrotal, Parcela B, 15, Palma del Río"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.8131702,
                    "lng": -5.015615899999999
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.81450082989273,
                      "lng": -5.014266170107279
                    },
                    "southwest": {
                      "lat": 37.81180117010729,
                      "lng": -5.016965829892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "fa424e9d51ebc722391dbc254bec046a49517589",
                "name": "Pizzeria Victoria",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 2336,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/106209260694015822010\">Victoria Luque Martos</a>"
                    ],
                    "photo_reference": "CmRaAAAA7mu8wWpxarMh5wdPq5iwcX5Z6grS2o2oqVdo7Yn9gPWLoa-ZZSVv92y5kT8YomJy86X83uiimfDacm2D8aRoF1BJgc6MylDlTMWXE4jKTAjxa1bR4P7rcKnKkta_z0B3EhBA7zHEECIK_KZUyAfT7WTVGhTIFOT_7z1d0vrW8W7H2VXMNAOo-Q",
                    "width": 4160
                  }
                ],
                "place_id": "ChIJGQPTKaErbQ0RdaWMl8c1VJc",
                "plus_code": {
                  "compound_code": "RX7M+7Q Almodóvar del Río",
                  "global_code": "8C9PRX7M+7Q"
                },
                "price_level": 1,
                "rating": 4.5,
                "reference": "ChIJGQPTKaErbQ0RdaWMl8c1VJc",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 112,
                "vicinity": "Ctra. de la Estación, 41, Almodóvar del Río"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.540136,
                    "lng": -5.07802
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.54153952989272,
                      "lng": -5.076753220107277
                    },
                    "southwest": {
                      "lat": 37.53883987010728,
                      "lng": -5.079452879892721
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
                "id": "bd2a4d4c2834853864aecd2a3fcf3e06fa0608ae",
                "name": "Restaurante Pasareli",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 1365,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/115174369463962425229\">Restaurante Pasareli</a>"
                    ],
                    "photo_reference": "CmRaAAAAFjJlPyKc-vA0Cl0Zh0PDChyhDYyWtoC2Z_6aLVrDBncJhLybprN_qogl9vCQ7q7CXrwq41_N17DcWtXV6UgCkHYXyr1xLtfJ3AA_sTB0YbvHiInNs34jRY9_xoyVHT1iEhCH68zNnJycngOoBzGs7ezgGhSLcyLR6RrWA0hhWXhtBoboYgN2aA",
                    "width": 2048
                  }
                ],
                "place_id": "ChIJFVVcz2a1Eg0RsFCzDmxu7PY",
                "plus_code": {
                  "compound_code": "GWRC+3Q Écija",
                  "global_code": "8C9PGWRC+3Q"
                },
                "price_level": 2,
                "rating": 4.2,
                "reference": "ChIJFVVcz2a1Eg0RsFCzDmxu7PY",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 170,
                "vicinity": "Pje. Virgen del Rocío, 2A, Écija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.809403,
                    "lng": -5.0199769
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.81072142989272,
                      "lng": -5.018617420107278
                    },
                    "southwest": {
                      "lat": 37.80802177010728,
                      "lng": -5.021317079892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
                "id": "62746587b7a4c0a52e1d1a7c147352571e324607",
                "name": "Taberna Ateneo",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 3456,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/117732759925964230067\">Carlos Ruiz</a>"
                    ],
                    "photo_reference": "CmRZAAAAfBm0CBZpyTWekKn-5n0LsM2dTrcdvE2LfqGAei49HvYXh3BgpFqf0VxaLj9Oe7QmR2K2mPgX8bYB09CsS9PTug3I9DTtzeUjYVjDq9YCLdpheIRB1oFRz7yqMEeUwvgbEhAtFsXP52QQwOINrH4WIbZ0GhRO0B915kXvEx1ZV86d7cXYvQapww",
                    "width": 4608
                  }
                ],
                "place_id": "ChIJ209IwgorbQ0R-Ch9jjBRh2w",
                "plus_code": {
                  "compound_code": "RX5J+Q2 Almodóvar del Río",
                  "global_code": "8C9PRX5J+Q2"
                },
                "price_level": 1,
                "rating": 4.3,
                "reference": "ChIJ209IwgorbQ0R-Ch9jjBRh2w",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 280,
                "vicinity": "Plaza de la Constitución nm 9, Almodóvar del Río"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.6668563,
                    "lng": -4.935884
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.66828057989272,
                      "lng": -4.934434970107278
                    },
                    "southwest": {
                      "lat": 37.66558092010727,
                      "lng": -4.937134629892721
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png",
                "id": "46d68de824f1cf69e7d93161d6f901259d28303d",
                "name": "Restaurante El Capacho",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 1840,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/102783102009515454314\">Juan Antonio Jiménez</a>"
                    ],
                    "photo_reference": "CmRZAAAAN7SD3kinTwKEAwwcuK25kMMRIXDLL6XODmeKNU1-nUjuX2-BtOvczNvLz-pjbglnNJNWonZySogW1U2M3YnXoyPctjVKsOZUpejFIAvv2_nGsLj6BOSKiiv4twos6cGgEhCZe5UwZPxk3rDmjWU7YCuDGhRuPl9j1gJ_vZgDB2D3GTAtlAy3JA",
                    "width": 3264
                  }
                ],
                "place_id": "ChIJ5SKyaKsxbQ0RYzfXhdOFHoI",
                "plus_code": {
                  "compound_code": "M387+PJ La Carlota",
                  "global_code": "8C9QM387+PJ"
                },
                "price_level": 1,
                "rating": 4,
                "reference": "ChIJ5SKyaKsxbQ0RYzfXhdOFHoI",
                "scope": "GOOGLE",
                "types": [
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 432,
                "vicinity": "Av. Campo de Fútbol, 48, La Carlota"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.550676,
                    "lng": -5.08078
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.55202692989272,
                      "lng": -5.079430620107278
                    },
                    "southwest": {
                      "lat": 37.54932727010728,
                      "lng": -5.082130279892722
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
                "id": "36449a5498bee8868eef82312966a6e9f4db7196",
                "name": "Fogón XI Torres",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 638,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/108242010960801659645\">Fogón XI Torres .</a>"
                    ],
                    "photo_reference": "CmRaAAAADh2CfyBXlauzH0DqolA7DP1nIfzY20Cqi01CeT7syaC3RudbULVdgJpmU9Qs8a4JG5U60CGh4T0luXhnfMciQ98hw5d4YzwzQhKe1kxVmg1Kt-52AEIl4YX3VgJcV6WgEhCr0DZQplTCsN_oNfl8BnCcGhTw4cdTsgDz5jP7Da3aYMYT4kpKkw",
                    "width": 960
                  }
                ],
                "place_id": "ChIJJ8S9VZXKEg0RzZNRghfk0QQ",
                "plus_code": {
                  "compound_code": "HW29+7M Écija",
                  "global_code": "8C9PHW29+7M"
                },
                "rating": 4.4,
                "reference": "ChIJJ8S9VZXKEg0RzZNRghfk0QQ",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 205,
                "vicinity": "Av. Jerónimo de Aguilar, Écija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.6960402,
                    "lng": -5.278463299999999
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.69735802989272,
                      "lng": -5.277140970107277
                    },
                    "southwest": {
                      "lat": 37.69465837010728,
                      "lng": -5.279840629892721
                    }
                  }
                },
                "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bar-71.png",
                "id": "73ba368baa1499590dcef58e2f78284f8c42f165",
                "name": "La Taskita Del Sibarita",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 3024,
                    "html_attributions": [
                      "<a href=\"https://maps.google.com/maps/contrib/101152972273081534879\">Isabel Borrueco</a>"
                    ],
                    "photo_reference": "CmRaAAAACwrYwy6UK5J_mt2LMN1qlS-zpxG03jKCQpGSMN_jIYsA0z2v0IRSXV0B_LTMfWbgk2RwUY8jbpNL5lkyVrxcM3vjO9gGWAGw1UsLoc7vrxCHf7bKg5gYlv0p8epbJ8pHEhApB2BINKMq65ZycT7ltEGVGhQKHUc0vAKW7Crs45Vuxfa7b8BIKA",
                    "width": 4032
                  }
                ],
                "place_id": "ChIJtatM_C3bEg0RJdwdieXVwdk",
                "plus_code": {
                  "compound_code": "MPWC+CJ Palma del Río",
                  "global_code": "8C9PMPWC+CJ"
                },
                "rating": 4.7,
                "reference": "ChIJtatM_C3bEg0RJdwdieXVwdk",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 185,
                "vicinity": "Calle Sol, 41, Palma del Río"
              }
            ],
            "status": "OK"
          }';

          $objJson = json_decode($json);

          $resultado = new stdClass();
  
          $numSitios = count( $objJson->results);

  
          for ( $i = 0; $i<$numSitios; $i++ ) {
  
              $sitio = $objJson->results[$i];
  
              $id = $i;
              $latitud = $sitio->geometry->location->lat;
              $longitud = $sitio->geometry->location->lng;
              $nombre = $sitio->name;
              $icono = $sitio->icon;
              $direccion = $sitio->vicinity;
  
              $objeto = new stdClass();
              $objeto->id = $id;
              $objeto->latitud = $latitud;
              $objeto->longitud = $longitud;
              $objeto->nombre = $nombre;
              $objeto->icono = $icono;
              $objeto->direccion = $direccion;
  
              $resultado->sitios[$i] = $objeto;
          }
  
          return $resultado;


    }
}
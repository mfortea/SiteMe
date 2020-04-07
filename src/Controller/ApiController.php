<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Dotenv\Dotenv;


$dotenv = new Dotenv();
$dotenv->load('../.env');

class ApiController extends AbstractController
{

    function buscarLugares(Request $request) {
        $texto = $request->request->get("texto");
        $radio = $request->request->get("radio");
        $latitud =  $request->request->get("lat");
        $longitud = $request->request->get("lng");
        $API_KEY = $_ENV['API_KEY'];

        $google_places = new joshtronic\GooglePlaces( $API_KEY );
        $google_places->location = array( $latitud, $longitud );
        $google_places->radius   = $radio;
        $google_places->keyword  = $texto;
        $results                 = $google_places->nearbysearch();

            return new JsonResponse($results, 200);
        }
        
/*
        $json = '{
            "html_attributions": [
              
            ],
            "results": [
              {
                "geometry": {
                  "location": {
                    "lat": 37.5436622,
                    "lng": -5.0841711
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.54506767989272,
                      "lng": -5.082824470107278
                    },
                    "southwest": {
                      "lat": 37.54236802010728,
                      "lng": -5.085524129892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png",
                "id": "9febf99c4b1c75a51e1677295300f41c806a8e01",
                "name": "Kiosko Col\u00f3n",
                "place_id": "ChIJTS_Y7ZbKEg0RRiV0Q66VYm8",
                "plus_code": {
                  "compound_code": "GWV8+F8 \u00c9cija",
                  "global_code": "8C9PGWV8+F8"
                },
                "rating": 3.8,
                "reference": "ChIJTS_Y7ZbKEg0RRiV0Q66VYm8",
                "scope": "GOOGLE",
                "types": [
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 12,
                "vicinity": "Av. los Emigrantes, \u00c9cija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.8880255,
                    "lng": -4.7897148
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.88939412989272,
                      "lng": -4.788277070107278
                    },
                    "southwest": {
                      "lat": 37.88669447010727,
                      "lng": -4.790976729892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png",
                "id": "f9040d3028ecdd181712d1bd0dc3d38d62f7979d",
                "name": "Relay",
                "photos": [
                  {
                    "height": 2048,
                    "html_attributions": [
                      "Kyle D<\/a>"
                    ],
                    "photo_reference": "CmRaAAAAVVSKmgPf9EbBP8IrzgmSvB7A8hHe6vUjpuMP1-hWTCR1vJKHGnq7hoS3t_Zhoa2G3Ku3nxlhQeS0OteMfh8_aK1aGcBHSvineUmqxfznwFmRe9uqX4MqV8gky0ESq2d4EhDjRKyIeS3O9nRuYsvAFrbPGhQGghamhAkRir7kfLZq00KajNWJdA",
                    "width": 1572
                  }
                ],
                "place_id": "ChIJE9k1pGffbA0RO86UJPXxNYw",
                "plus_code": {
                  "compound_code": "V6Q6+64 C\u00f3rdoba",
                  "global_code": "8C9QV6Q6+64"
                },
                "rating": 4.2,
                "reference": "ChIJE9k1pGffbA0RO86UJPXxNYw",
                "scope": "GOOGLE",
                "types": [
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 5,
                "vicinity": "Glorieta Tres Culturas, S\/N, C\u00f3rdoba"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.7081864,
                    "lng": -5.0973527
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.70955317989272,
                      "lng": -5.096012570107278
                    },
                    "southwest": {
                      "lat": 37.70685352010727,
                      "lng": -5.098712229892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png",
                "id": "5fee762631f7a1a9ad3b0164b6b57ee0f53cd7cb",
                "name": "Kiosco Paqui",
                "opening_hours": {
                  "open_now": false
                },
                "place_id": "ChIJMfi5FIbSEg0RoWfY2VypC2g",
                "plus_code": {
                  "compound_code": "PW53+73 Fuente Palmera",
                  "global_code": "8C9PPW53+73"
                },
                "rating": 4.9,
                "reference": "ChIJMfi5FIbSEg0RoWfY2VypC2g",
                "scope": "GOOGLE",
                "types": [
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 12,
                "vicinity": "Paseo Blas Infante, Fuente Palmera"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.889287,
                    "lng": -4.8002311
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.89064292989272,
                      "lng": -4.798842120107278
                    },
                    "southwest": {
                      "lat": 37.88794327010728,
                      "lng": -4.801541779892721
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/cafe-71.png",
                "id": "3e2ab7fa4e57a9ad5e148e8eebace85471746fdb",
                "name": "Cafeteria las setas",
                "opening_hours": {
                  "open_now": false
                },
                "place_id": "ChIJH69uGoTfbA0RSLSUWdfI_cM",
                "plus_code": {
                  "compound_code": "V5QX+PW C\u00f3rdoba",
                  "global_code": "8C9QV5QX+PW"
                },
                "rating": 0,
                "reference": "ChIJH69uGoTfbA0RSLSUWdfI_cM",
                "scope": "GOOGLE",
                "types": [
                  "cafe",
                  "liquor_store",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 0,
                "vicinity": "Calle Cant\u00e1brico, C\u00f3rdoba"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.6694507,
                    "lng": -4.9333601
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.67081532989273,
                      "lng": -4.932012220107277
                    },
                    "southwest": {
                      "lat": 37.66811567010728,
                      "lng": -4.934711879892721
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png",
                "id": "f19b59f4e5b526f55ef0f9ceef63ccae4033d146",
                "name": "ESTANCO N.002",
                "opening_hours": {
                  "open_now": false
                },
                "photos": [
                  {
                    "height": 480,
                    "html_attributions": [
                      "A Google User<\/a>"
                    ],
                    "photo_reference": "CmRaAAAATFGcfjFDJPIPK9pYr9Rz5Mt_lW5tskK1-BUR3jJHZi-WlcJYLcnLiib2xrm76hfqaha9Etw8gLUi1EV12O_RQ74vbf58fB8v2S9VDNR2_HlJkocxmwY44qyQdZfSlpsBEhB6ub3ejKSuehZWCZoQqsYQGhTZE5Off2fneq7smIWdA9DHPFnFGA",
                    "width": 640
                  }
                ],
                "place_id": "ChIJYXJXdukxbQ0RzoSPsET5kR4",
                "plus_code": {
                  "compound_code": "M398+QM La Carlota",
                  "global_code": "8C9QM398+QM"
                },
                "rating": 0,
                "reference": "ChIJYXJXdukxbQ0RzoSPsET5kR4",
                "scope": "GOOGLE",
                "types": [
                  "finance",
                  "school",
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 0,
                "vicinity": "Avda. La Paz 33 (esquina, Calle Portugal, La Carlota"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.5312108,
                    "lng": -5.0864159
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.53257462989272,
                      "lng": -5.085155870107277
                    },
                    "southwest": {
                      "lat": 37.52987497010728,
                      "lng": -5.087855529892721
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png",
                "id": "510671a329ccfbacf0a107cab27430e31afa4368",
                "name": "N4 Mall",
                "opening_hours": {
                  "open_now": false
                },
                "photos": [
                  {
                    "height": 1920,
                    "html_attributions": [
                      "Alfredo GARCIA MURILLO<\/a>"
                    ],
                    "photo_reference": "CmRaAAAAIQHAW9lrnPqupgUM6wjke4CvdCwEnMXWFxQ7sEe7Bf5dkcGHX_ZB99PnyJxDWYhi8wj-6JO3D6wH55rrViYyA1fVJvuh9mvotHBTkUq-SUbV6ZCSASEHnNZBD8TmbcLOEhC_OxGsm3QKis_I9O6hNRt9GhQfVcyVp8g40A0mEjdzl6tL-tRKYw",
                    "width": 1080
                  }
                ],
                "place_id": "ChIJhxhEdJ7KEg0RksCw3hlRICg",
                "plus_code": {
                  "compound_code": "GWJ7+FC \u00c9cija",
                  "global_code": "8C9PGWJ7+FC"
                },
                "rating": 4.2,
                "reference": "ChIJhxhEdJ7KEg0RksCw3hlRICg",
                "scope": "GOOGLE",
                "types": [
                  "shopping_mall",
                  "movie_theater",
                  "supermarket",
                  "grocery_or_supermarket",
                  "food",
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 4061,
                "vicinity": "Av. del Genil, s\/n, \u00c9cija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.5366311,
                    "lng": -5.0753954
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.53796152989272,
                      "lng": -5.074052820107277
                    },
                    "southwest": {
                      "lat": 37.53526187010728,
                      "lng": -5.076752479892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png",
                "id": "b134e5b38f82b0ff7013c93f93a24bf396c4c8e4",
                "name": "Ortopedia Queralt\u00f3 Ecija",
                "opening_hours": {
                  "open_now": false
                },
                "place_id": "ChIJX0S8d6TKEg0R7mEbZSyu4Yk",
                "plus_code": {
                  "compound_code": "GWPF+MR \u00c9cija",
                  "global_code": "8C9PGWPF+MR"
                },
                "rating": 3,
                "reference": "ChIJX0S8d6TKEg0R7mEbZSyu4Yk",
                "scope": "GOOGLE",
                "types": [
                  "shoe_store",
                  "health",
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 2,
                "vicinity": "Portugal, 4, \u00c9cija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.5368468,
                    "lng": -5.075041
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.53816342989272,
                      "lng": -5.073648270107278
                    },
                    "southwest": {
                      "lat": 37.53546377010728,
                      "lng": -5.076347929892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png",
                "id": "f2221966bbb72e2c9ca49e238b054629f120bfa2",
                "name": "Ortopedia Virgen Del Valle",
                "opening_hours": {
                  "open_now": true
                },
                "place_id": "ChIJA8XZc6TKEg0RwzoCbMIFo1Q",
                "plus_code": {
                  "compound_code": "GWPF+PX \u00c9cija",
                  "global_code": "8C9PGWPF+PX"
                },
                "rating": 5,
                "reference": "ChIJA8XZc6TKEg0RwzoCbMIFo1Q",
                "scope": "GOOGLE",
                "types": [
                  "shoe_store",
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 5,
                "vicinity": "\u00c9cija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.5310414,
                    "lng": -5.0853218
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.53271087989272,
                      "lng": -5.083821270107278
                    },
                    "southwest": {
                      "lat": 37.53001122010728,
                      "lng": -5.086520929892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png",
                "id": "e8a03b1819be731669a8ccacc7741d86ea54cf2a",
                "name": "Belros",
                "opening_hours": {
                  "open_now": false
                },
                "photos": [
                  {
                    "height": 1062,
                    "html_attributions": [
                      "Aixa Maria Rodriguez Cardoso<\/a>"
                    ],
                    "photo_reference": "CmRaAAAAnwVwBUM1ghj5lLJacLBnc9iOMIeHXp_-7C6IWrM4Vd9KpGZB3lIbD8K0qC7x3fjv1qQ2x8IJDIO8NJFdL5ZkuRY83XoWwABXh4hZb6gAjPAgJBO4klAtDhu-HdtVZWUiEhA3rq8zntDvMyu8DyV-D407GhTnmf93yqpGNLx48BxF-HxaiqK5sQ",
                    "width": 1416
                  }
                ],
                "place_id": "ChIJ7dzjCML8bA0RjUHjOszxXnw",
                "plus_code": {
                  "compound_code": "GWJ7+CV \u00c9cija",
                  "global_code": "8C9PGWJ7+CV"
                },
                "rating": 4.5,
                "reference": "ChIJ7dzjCML8bA0RjUHjOszxXnw",
                "scope": "GOOGLE",
                "types": [
                  "food",
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 15,
                "vicinity": "Acceso Autov\u00eda A-4, Centro Comercial N4, \u00c9cija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.8959031,
                    "lng": -4.7910783
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.89726007989272,
                      "lng": -4.789699270107278
                    },
                    "southwest": {
                      "lat": 37.89456042010728,
                      "lng": -4.792398929892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/shopping-71.png",
                "id": "811ab2c61f2230a3e870ae1fc5acc36dbfdd8326",
                "name": "Belros",
                "place_id": "ChIJfz79KEDfbA0Rsc0Oe5IGgCQ",
                "plus_code": {
                  "compound_code": "V6W5+9H C\u00f3rdoba",
                  "global_code": "8C9QV6W5+9H"
                },
                "rating": 5,
                "reference": "ChIJfz79KEDfbA0Rsc0Oe5IGgCQ",
                "scope": "GOOGLE",
                "types": [
                  "food",
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 2,
                "vicinity": "Calle Poeta Emilio Prados, S\/N, C\u00f3rdoba"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.896757,
                    "lng": -4.791753000000001
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.89813297989271,
                      "lng": -4.790410520107278
                    },
                    "southwest": {
                      "lat": 37.89543332010727,
                      "lng": -4.793110179892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/restaurant-71.png",
                "id": "66aab81603a12ea9a5ee632886d47aa29317d804",
                "name": "Sushi Daily",
                "opening_hours": {
                  "open_now": false
                },
                "photos": [
                  {
                    "height": 1060,
                    "html_attributions": [
                      "A Google User<\/a>"
                    ],
                    "photo_reference": "CmRaAAAAyyxSqPwzH6fLHph4sr1nN41gXZuA8i2A5Q77qdJtQYTphQfzy8B4rOYdix0QkZiaq042ZgMac2dRl7y5_FD9HCmWRxhrFPz7mS1iAopGjgsKAijZcfc8HWJN5YVfiBa4EhCOmU_dbc9rS2T_-Iqmf3hyGhQ5Hvvyh_tLTuWMXV75_Z3jfEOcBg",
                    "width": 1887
                  }
                ],
                "place_id": "ChIJBRc3EkLfbA0Ras7Glvga2k0",
                "plus_code": {
                  "compound_code": "V6W5+P7 C\u00f3rdoba",
                  "global_code": "8C9QV6W5+P7"
                },
                "rating": 4.1,
                "reference": "ChIJBRc3EkLfbA0Ras7Glvga2k0",
                "scope": "GOOGLE",
                "types": [
                  "meal_takeaway",
                  "restaurant",
                  "food",
                  "point_of_interest",
                  "store",
                  "establishment"
                ],
                "user_ratings_total": 17,
                "vicinity": "Centro Comercial La Sierra, Calle Poeta Emilio Prados, s\/n, C\u00f3rdoba"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.8888579,
                    "lng": -4.7908856
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.89024557989272,
                      "lng": -4.789446370107277
                    },
                    "southwest": {
                      "lat": 37.88754592010728,
                      "lng": -4.792146029892721
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/bar-71.png",
                "id": "5410a23cd0ea55d2b8ccfbad9d618595618603f7",
                "name": "Caracol Express",
                "photos": [
                  {
                    "height": 3096,
                    "html_attributions": [
                      "juan perez<\/a>"
                    ],
                    "photo_reference": "CmRaAAAA-IgdLFoIfkqDWwOrX-d2wST57nj4TI2KNH5lUgA4xatqIASFFRnd4TFDbs0aRFpKiK5Mmpwq00T8jhZwzARstCBzUb49PFOwzhRjDVtWutJM4jVxgN25zPayi1PWkWd5EhBSOr9Y2H6bgFcmo97DBYoGGhStSjcOJOwj8jf-aUvsOsGnDr3Y6g",
                    "width": 4128
                  }
                ],
                "place_id": "ChIJ5f6xnl3fbA0RSwS2Zqd-Llc",
                "plus_code": {
                  "compound_code": "V6Q5+GJ C\u00f3rdoba",
                  "global_code": "8C9QV6Q5+GJ"
                },
                "rating": 4.2,
                "reference": "ChIJ5f6xnl3fbA0RSwS2Zqd-Llc",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 64,
                "vicinity": "Calle Arque\u00f3logo Garc\u00eda y Bellido, C\u00f3rdoba"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.5306653,
                    "lng": -5.0853677
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.53197012989273,
                      "lng": -5.083559320107278
                    },
                    "southwest": {
                      "lat": 37.52927047010728,
                      "lng": -5.086258979892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/bar-71.png",
                "id": "ea42bddf51c58e8e516db6d4d934b82009f8a97f",
                "name": "100 Montaditos",
                "photos": [
                  {
                    "height": 4032,
                    "html_attributions": [
                      "Santi Cresp<\/a>"
                    ],
                    "photo_reference": "CmRaAAAAMeF2nK0RM8vNpR9FdTtMgx-L9YMguhdtiOGY6ovX0oQ0VaSA8uEfAe_NkoEt7iQz0X0F-_nn_knC5HMcDkrd-C7JsIjW5X5aNdKXmybn1DtFuHkjWHGRsc1fKINV-_K5EhBQg61AxkvM9lqydhrF22TsGhTCgzF7zAlUweMYmOT9Biiht71TPg",
                    "width": 3024
                  }
                ],
                "place_id": "ChIJIVIXDZ7KEg0Ry1Bs8BPKEzw",
                "plus_code": {
                  "compound_code": "GWJ7+7V \u00c9cija",
                  "global_code": "8C9PGWJ7+7V"
                },
                "price_level": 1,
                "rating": 4.1,
                "reference": "ChIJIVIXDZ7KEg0Ry1Bs8BPKEzw",
                "scope": "GOOGLE",
                "types": [
                  "bar",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 90,
                "vicinity": "Avenida Ocho de Marzo, 25, \u00c9cija"
              },
              {
                "geometry": {
                  "location": {
                    "lat": 37.81556080000001,
                    "lng": -5.113933299999999
                  },
                  "viewport": {
                    "northeast": {
                      "lat": 37.81689972989273,
                      "lng": -5.112573870107278
                    },
                    "southwest": {
                      "lat": 37.81420007010728,
                      "lng": -5.115273529892722
                    }
                  }
                },
                "icon": "https:\/\/maps.gstatic.com\/mapfiles\/place_api\/icons\/generic_recreational-71.png",
                "id": "5460a5284884cd7b1bc94dce0a481d3fbaaf34a0",
                "name": "La Sierrezuela",
                "opening_hours": {
                  "open_now": true
                },
                "photos": [
                  {
                    "height": 2368,
                    "html_attributions": [
                      "asd asd<\/a>"
                    ],
                    "photo_reference": "CmRaAAAA0kszEE3urCadmCOqQ0NNKdriCouYFqkTg7oxFZNzR5C0vbSfCOSGf4NhIoPX25IxjtzsfZ6BmGP2N1U3I4GAoJyeMC2bGJMR3YIKSqh5lDnvpLMFJjv_IOOjbszlCOPqEhCW-9qnX0QHnbriIFadCngPGhRF-aMAm_e9XRLMjG8tAbUXFkBBXw",
                    "width": 4208
                  }
                ],
                "place_id": "ChIJjaSLjjPUEg0RJks8ws2zph0",
                "plus_code": {
                  "compound_code": "RV8P+6C Posadas",
                  "global_code": "8C9PRV8P+6C"
                },
                "rating": 4.6,
                "reference": "ChIJjaSLjjPUEg0RJks8ws2zph0",
                "scope": "GOOGLE",
                "types": [
                  "tourist_attraction",
                  "park",
                  "point_of_interest",
                  "establishment"
                ],
                "user_ratings_total": 487,
                "vicinity": "Posadas"
              }
            ],
            "status": "OK"
          }';

        return new JsonResponse($json, 200);
        
    }
    */

}
<?php

namespace App\Controller;
use joshtronic;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Dotenv\Dotenv;


$dotenv = new Dotenv();

class ApiController extends AbstractController
{

    function buscarLugares(Request $request) {
        $texto = $request->request->get("texto");
        $radio = $request->request->get("radio");
        $latitud =  $request->request->get("lat");
        $longitud = $request->request->get("lng");
        $API_KEY = $_ENV['API_KEY'];

        /*
        $google_places = new joshtronic\GooglePlaces( $API_KEY );
        $google_places->location = array( $latitud, $longitud );
        $google_places->radius   = $radio;
        $google_places->keyword  = $texto;
        $results                 = $google_places->nearbysearch();
        */

        $json = '{
          "html_attributions": [],
          "results": [
              {
                  "geometry": {
                      "location": {
                          "lat": 37.7041625,
                          "lng": -5.103883
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.70551327989273,
                              "lng": -5.102519270107277
                          },
                          "southwest": {
                              "lat": 37.70281362010728,
                              "lng": -5.105218929892721
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bank_dollar-71.png",
                  "id": "1dac4ff231e721e9ebb129a3e69d7751f654b014",
                  "name": "Oficina Banco Santander",
                  "opening_hours": {
                      "open_now": true
                  },
                  "place_id": "ChIJD7cy1H3SEg0Rz89FpK0YoLc",
                  "plus_code": {
                      "compound_code": "PV3W+MC Fuente Palmera",
                      "global_code": "8C9PPV3W+MC"
                  },
                  "rating": 4,
                  "reference": "ChIJD7cy1H3SEg0Rz89FpK0YoLc",
                  "scope": "GOOGLE",
                  "types": [
                      "bank",
                      "atm",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 1,
                  "vicinity": "Calle Carlos III, 5, Fuente Palmera"
              },
              {
                  "geometry": {
                      "location": {
                          "lat": 37.7048202,
                          "lng": -5.1035933
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.70616122989272,
                              "lng": -5.102392120107278
                          },
                          "southwest": {
                              "lat": 37.70346157010727,
                              "lng": -5.105091779892722
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bank_dollar-71.png",
                  "id": "64fb2ce007d84c26ee59705df415e80260990854",
                  "name": "BBVA",
                  "opening_hours": {
                      "open_now": true
                  },
                  "place_id": "ChIJw8rlyH3SEg0Ryx22QhYNAxg",
                  "plus_code": {
                      "compound_code": "PV3W+WH Fuente Palmera",
                      "global_code": "8C9PPV3W+WH"
                  },
                  "rating": 0,
                  "reference": "ChIJw8rlyH3SEg0Ryx22QhYNAxg",
                  "scope": "GOOGLE",
                  "types": [
                      "bank",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 0,
                  "vicinity": "Calle Carlos III, 8, Fuente Palmera"
              },
              {
                  "geometry": {
                      "location": {
                          "lat": 37.7034506,
                          "lng": -5.103931999999999
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.70482572989272,
                              "lng": -5.102584920107279
                          },
                          "southwest": {
                              "lat": 37.70212607010728,
                              "lng": -5.105284579892722
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bank_dollar-71.png",
                  "id": "b1da9948a7810ece5620e83d358e356f1ab9f744",
                  "name": "CaixaBank - Cerrado temporalmente",
                  "opening_hours": {
                      "open_now": true
                  },
                  "place_id": "ChIJszxPfH7SEg0RzIcqHqe86w8",
                  "plus_code": {
                      "compound_code": "PV3W+9C Fuente Palmera",
                      "global_code": "8C9PPV3W+9C"
                  },
                  "rating": 0,
                  "reference": "ChIJszxPfH7SEg0RzIcqHqe86w8",
                  "scope": "GOOGLE",
                  "types": [
                      "bank",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 0,
                  "vicinity": "Plaza Real, 2, Fuente Palmera"
              },
              {
                  "geometry": {
                      "location": {
                          "lat": 37.7052771,
                          "lng": -5.100895299999999
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.70667377989272,
                              "lng": -5.099566970107277
                          },
                          "southwest": {
                              "lat": 37.70397412010728,
                              "lng": -5.102266629892721
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bank_dollar-71.png",
                  "id": "8127930e9bd768d510ca79b665b1eba8fb091578",
                  "name": "Unicaja Banco",
                  "opening_hours": {
                      "open_now": false
                  },
                  "photos": [
                      {
                          "height": 720,
                          "html_attributions": [
                              "<a href=\"https://maps.google.com/maps/contrib/101815544593136755282\">A Google User</a>"
                          ],
                          "photo_reference": "CmRaAAAA483NNLpXhabjHqEvvuqHLtF242ETLO2N72EnHucRny8oai85Tg0bcekoUmITuNgrePy6lvPsUnXyKIAPTfZtBfgvWePcKze25NEG2svZLHzKYAWF_XtqG_qf-E3DqnQPEhDI9MPB3OjXK4aL88THvSYlGhTooBV_BMRUclQJM2ieFuLp4qt7-A",
                          "width": 720
                      }
                  ],
                  "place_id": "ChIJrYObq4fSEg0RCwr2cEj24KE",
                  "plus_code": {
                      "compound_code": "PV4X+4J Fuente Palmera",
                      "global_code": "8C9PPV4X+4J"
                  },
                  "rating": 0,
                  "reference": "ChIJrYObq4fSEg0RCwr2cEj24KE",
                  "scope": "GOOGLE",
                  "types": [
                      "bank",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 0,
                  "vicinity": "Calle, Paseo Blas Infante, 8, Fuente Palmera"
              },
              {
                  "geometry": {
                      "location": {
                          "lat": 37.703405,
                          "lng": -5.1012891
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.70477922989272,
                              "lng": -5.099941820107278
                          },
                          "southwest": {
                              "lat": 37.70207957010728,
                              "lng": -5.102641479892722
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bank_dollar-71.png",
                  "id": "40df80ee54cc40054b40682ebdb83b0a750794f3",
                  "name": "Oficina Caja Rural del Sur",
                  "opening_hours": {
                      "open_now": true
                  },
                  "place_id": "ChIJ75pAqIDSEg0RrZiPl2vAm10",
                  "plus_code": {
                      "compound_code": "PV3X+9F Fuente Palmera",
                      "global_code": "8C9PPV3X+9F"
                  },
                  "rating": 0,
                  "reference": "ChIJ75pAqIDSEg0RrZiPl2vAm10",
                  "scope": "GOOGLE",
                  "types": [
                      "bank",
                      "atm",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 0,
                  "vicinity": "Calle Portales, 50, Fuente Palmera"
              },
              {
                  "geometry": {
                      "location": {
                          "lat": 37.7040348,
                          "lng": -5.1040637
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.70539082989272,
                              "lng": -5.102713920107278
                          },
                          "southwest": {
                              "lat": 37.70269117010728,
                              "lng": -5.105413579892722
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bank_dollar-71.png",
                  "id": "79a69b4d93482f5563d6a959899f7362f0d13e9c",
                  "name": "Oficina Banco Santander",
                  "opening_hours": {
                      "open_now": false
                  },
                  "place_id": "ChIJtxtPcYfTEg0RBpTHNJjx7H0",
                  "plus_code": {
                      "compound_code": "PV3W+J9 Fuente Palmera",
                      "global_code": "8C9PPV3W+J9"
                  },
                  "rating": 0,
                  "reference": "ChIJtxtPcYfTEg0RBpTHNJjx7H0",
                  "scope": "GOOGLE",
                  "types": [
                      "bank",
                      "atm",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 0,
                  "vicinity": "Calle Méndez Núñez, 5, Fuente Palmera"
              },
              {
                  "geometry": {
                      "location": {
                          "lat": 37.669395,
                          "lng": -5.1554667
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.67074632989272,
                              "lng": -5.154112520107278
                          },
                          "southwest": {
                              "lat": 37.66804667010727,
                              "lng": -5.156812179892722
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/bank_dollar-71.png",
                  "id": "f5643e52d553625f90111ec07d41492d4b6bc098",
                  "name": "Cajasur",
                  "opening_hours": {
                      "open_now": false
                  },
                  "photos": [
                      {
                          "height": 608,
                          "html_attributions": [
                              "<a href=\"https://maps.google.com/maps/contrib/106333051138349629504\">CajaSur</a>"
                          ],
                          "photo_reference": "CmRaAAAAsxA_CNTzM5KpKo6Pnz8GRY8kI0HMufvPS-_kTl0Hicdnd_vyESHtLr2mXWofo5_LPr41ecajWQjD04aiDTt1_bMwVKQ7neQ4b6QLoadmpbMmf6mJIRrN473rQvIkqc2lEhD6YdKuZ_HuPYALZ_snhxC_GhSOQgmZBO0v5Ai11k04JI4V_-f2OQ",
                          "width": 1080
                      }
                  ],
                  "place_id": "ChIJWVH6cW7OEg0RMjtF_2sT7GE",
                  "plus_code": {
                      "compound_code": "MR9V+QR Fuente Carreteros",
                      "global_code": "8C9PMR9V+QR"
                  },
                  "rating": 5,
                  "reference": "ChIJWVH6cW7OEg0RMjtF_2sT7GE",
                  "scope": "GOOGLE",
                  "types": [
                      "bank",
                      "atm",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 1,
                  "vicinity": "Calle Fuente, 1, Aldea de"
              },
              {
                  "geometry": {
                      "location": {
                          "lat": 37.7052771,
                          "lng": -5.100895299999999
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.70667377989272,
                              "lng": -5.099566970107277
                          },
                          "southwest": {
                              "lat": 37.70397412010728,
                              "lng": -5.102266629892721
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/atm-71.png",
                  "id": "99811e0583a819d956095dd03ab60cf799479c2e",
                  "name": "Cajero Automático Unicaja Banco",
                  "opening_hours": {
                      "open_now": true
                  },
                  "place_id": "ChIJ01BkAkvTEg0RGaNhBYmiftc",
                  "plus_code": {
                      "compound_code": "PV4X+4J Fuente Palmera",
                      "global_code": "8C9PPV4X+4J"
                  },
                  "rating": 0,
                  "reference": "ChIJ01BkAkvTEg0RGaNhBYmiftc",
                  "scope": "GOOGLE",
                  "types": [
                      "atm",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 0,
                  "vicinity": "Cl, Paseo Blas Infante, 8, Fuente Palmera"
              },
              {
                  "geometry": {
                      "location": {
                          "lat": 37.7040351,
                          "lng": -5.1040524
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.70539092989272,
                              "lng": -5.102702620107278
                          },
                          "southwest": {
                              "lat": 37.70269127010728,
                              "lng": -5.105402279892722
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/atm-71.png",
                  "id": "02c16aa7ecf87c9c8b167fd2813c485b39064890",
                  "name": "Euro Automatic Cash (B. Popular)",
                  "opening_hours": {
                      "open_now": true
                  },
                  "place_id": "ChIJq2kg1X3SEg0R8BPpsCwbXM0",
                  "plus_code": {
                      "compound_code": "PV3W+J9 Fuente Palmera",
                      "global_code": "8C9PPV3W+J9"
                  },
                  "rating": 0,
                  "reference": "ChIJq2kg1X3SEg0R8BPpsCwbXM0",
                  "scope": "GOOGLE",
                  "types": [
                      "atm",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 0,
                  "vicinity": "Calle Méndez Núñez, 5, Fuente Palmera"
              },
              {
                  "geometry": {
                      "location": {
                          "lat": 37.7034436,
                          "lng": -5.103997
                      },
                      "viewport": {
                          "northeast": {
                              "lat": 37.70482122989272,
                              "lng": -5.102650220107278
                          },
                          "southwest": {
                              "lat": 37.70212157010728,
                              "lng": -5.105349879892722
                          }
                      }
                  },
                  "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/atm-71.png",
                  "id": "5cef646671f5b65ba9e2c2c426207b6064cbcf26",
                  "name": "Cajero automático CaixaBank",
                  "opening_hours": {
                      "open_now": true
                  },
                  "photos": [
                      {
                          "height": 976,
                          "html_attributions": [
                              "<a href=\"https://maps.google.com/maps/contrib/110066747103190490218\">TELEPEPE JOSE DIAZ</a>"
                          ],
                          "photo_reference": "CmRaAAAAvMJVXOILpH-Q9t2g519YeShxYqF_juUKQ9AM7EcMY76dVCbtaoFa9dTBKQlGoNOic7ttSduAoNCwiSasxDiiOH5Gv2sYEML0292qENBz-2QbTXeayFG6jENeYFd5zy2wEhApLwrqZ7HXaQir1OHqFjUIGhRbWO7UBCJPVWA8s76XkEL-MNmkyQ",
                          "width": 1296
                      }
                  ],
                  "place_id": "ChIJUz5EAH7SEg0RfDNUC4NVh0A",
                  "plus_code": {
                      "compound_code": "PV3W+9C Fuente Palmera",
                      "global_code": "8C9PPV3W+9C"
                  },
                  "rating": 3,
                  "reference": "ChIJUz5EAH7SEg0RfDNUC4NVh0A",
                  "scope": "GOOGLE",
                  "types": [
                      "atm",
                      "finance",
                      "point_of_interest",
                      "establishment"
                  ],
                  "user_ratings_total": 1,
                  "vicinity": "Calle Real, 1, Fuente Palmera"
              }
          ],
          "status": "OK"
      }';
            return new JsonResponse($json);
        }
        
    }
    
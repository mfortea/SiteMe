// ÚTILES

// Variables globales comunes a todas las secciones
var lat = 0;
var lng = 0;
//var lat = 37.6867053;
//var lng = -5.1327931;
var rutas = null;
var estado_ubicacion = false;

function obtenerCoordenadas(seccion) {
    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(
            function(pos) {
                lat = pos.coords.latitude;
                lng = pos.coords.longitude;
                estado_ubicacion = true;

                switch (seccion) {
                    case "busqueda":
                        document.getElementById("estado").innerHTML = "Ubicación activada";
                        document.getElementById("boton-buscar").disabled = false;
                        document.getElementById("input-busqueda").disabled = false;
                        document.getElementById("radio").disabled = false;
                        document.getElementById("cargando").style.display = "block";
                        document.getElementById("map").style.display = "block";
                        break;

                    case "sitios":
                        document.getElementById("estado").innerHTML = "Ubicación activada";
                        document.getElementById("cargando").style.display = "block";
                        document.getElementById("map").style.display = "block";
                        break;
                }

                generarMapa(seccion);
            },
            function(objPositionError) {
                // Cacheo de errores relacionados con la ubicación
                switch (objPositionError.code) {
                    case objPositionError.PERMISSION_DENIED:
                        document.getElementById("cuerpoModal").innerHTML =
                            "Debe permitir la ubicación para continuar";
                        document.getElementById("simboloModal").className =
                            "fas fa-location-arrow fa-3x";
                        sonidoError();
                        MicroModal.show("modal");
                        break;
                    case objPositionError.POSITION_UNAVAILABLE:
                        document.getElementById("cuerpoModal").innerHTML =
                            "No se ha podido acceder a la información de su posición.";
                        document.getElementById("simboloModal").className =
                            "fas fa-location-arrow fa-3x";
                        sonidoError();
                        vibrar(300);
                        MicroModal.show("modal");
                        break;
                    case objPositionError.TIMEOUT:
                        document.getElementById("cuerpoModal").innerHTML =
                            "El servicio ha tardado demasiado tiempo en responder.";
                        document.getElementById("simboloModal").className =
                            "fas fa-clock fa-3x";
                        sonidoError();
                        vibrar(300);
                        MicroModal.show("modal");
                        break;
                    default:
                        document.getElementById("cuerpoModal").innerHTML =
                            "Error desconocido";
                        document.getElementById("simboloModal").className =
                            "fas fa-question-circle fa-3x";
                        sonidoError();
                        vibrar(300);
                        MicroModal.show("modal");
                }
            }, {
                maximumAge: 75000,
                timeout: 15000,
            }
        );
}

function generarMapa(seccion) {
    if (estado_ubicacion) {
        // Creación del mapa
        map = L.map("map").setView([lat, lng], 12);

        // Crear control de pantalla completa
        var fsControl = L.control.fullscreen();
        map.addControl(fsControl);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "",
            subdomains: ["a", "b", "c"],
        }).addTo(map);

        var osmUrl = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
        var osmAttribution =
            'Datos del mapa <a href="http://openstreetmap' +
            '.org">&copy; OpenStreetMap</a>';
        var osm = new L.TileLayer(osmUrl, {
            maxZoom: 18,
            attribution: osmAttribution,
        });

        var gUrl = "https://mt0.google.com/vt/lyrs=s&x={x}&y={y}&z={z}";
        var gAttribution = "&copy; Google Maps";
        var googlesat = new L.TileLayer(gUrl, {
            maxZoom: 18,
            attribution: gAttribution,
        });

        var baseLayers = {
            '<i class="fas fa-map-marked-alt"></i> Callejero': osm,
            '<i class="fas fa-globe-europe"></i> Satélite': googlesat,
        };

        L.control.layers(baseLayers, {}).addTo(map);

        // Círculo de la ubicación actual
        var circle = L.circle([lat, lng], {
            color: "red",
            fillColor: "#f03",
            fillOpacity: 0.2,
            radius: 700,
        }).addTo(map);

        // Icono de la ubicación actual
        var iconoUbActual = L.icon({
            iconUrl: "imagenes/marcador_rojo.png",
            iconSize: [50, 50],
        });

        // Marcador de la ubicación actual
        var marcadorUbActual = L.marker([lat, lng], { icon: iconoUbActual })
            .bindPopup('<p class="tituloPopup">Tu ubicación</h2>')
            .addTo(map);
        arrayMarcadores.push(marcadorUbActual);

        if (seccion === "sitios") {
            obtenerFavoritos();
        }
    } else {
        document.getElementById("cuerpoModal").innerHTML =
            "No se ha podido determinar su ubicación";
        document.getElementById("simboloModal").className =
            "fas fa-location-arrow fa-3x";
        MicroModal.show("modal");
    }
}

function medirDistancia(lat1, lon1, lat2, lon2) {
    rad = function(x) {
        return (x * Math.PI) / 180;
    };
    var R = 6378.137; //Radio de la tierra en km
    var dLat = rad(lat2 - lat1);
    var dLong = rad(lon2 - lon1);
    var a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(rad(lat1)) *
        Math.cos(rad(lat2)) *
        Math.sin(dLong / 2) *
        Math.sin(dLong / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c;
    return d.toFixed(2);
}

function comprobarUsuario(email) {
    var error = document.getElementById("error");
    var er = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;

    if (er.test(email.value) == false) {
        error.classList.add("alert");
        error.classList.add("alert-danger");
        error.innerHTML = "El email no tiene un formato válido";
    } else {
        error.classList.remove("alert");
        error.classList.remove("alert-danger");
        error.innerHTML = "";
        var peticion = { email: email.value };
        var json = JSON.stringify(peticion);

        fetch("/comprobarUsuario", {
            method: "POST",
            body: json,
            headers: {
                "Content-Type": "application/json",
            },
        }).then(function(response) {
            if (response.status === 200) {
                error.classList.add("alert");
                error.classList.add("alert-success");
                error.innerHTML = "Disponible";
            } else if (response.status === 403) {
                error.classList.add("alert");
                error.classList.add("alert-danger");
                error.innerHTML = "El email ya está registrado";
            }
        });
    }
}

function mostrarModal(nombreModal) {
    sonidoError();
    vibrar(300);
    MicroModal.show(nombreModal);
}

function cerrarModal(nombreModal) {
    setTimeout(function() {
        MicroModal.close(nombreModal);
    }, 500);
}

/*
function calcularRuta(latDestino, lngDestino) {

    if (rutas != null) {
        rutas.remove();
        console.log("Ruta anterior eliminada");
    }

    map.closePopup();

    rutas = L.Routing.control({
        waypoints: [
            L.latLng(lat, lng),
            L.latLng(latDestino, lngDestino)
        ],
        language: 'es',
        routeWhileDragging: true,
        fitSelectedRoutes: 'smart',
        router: new L.Routing.OSRMv1({
            serviceUrl: url_to_your_service
        })
    })

    rutas.addTo(map);
}

*/
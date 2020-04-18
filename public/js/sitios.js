//var lat = 37.6867053;
//var lng = -5.1327931;

// Variables globales
var lat = 0;
var lng = 0;
var map = null;
var json_cache = "";
var estado_ubicacion = false;
var arrayMarcadores = [];

function obtenerCoordenadas() {
    if (navigator.geolocation) navigator.geolocation.getCurrentPosition(function(pos) {
        lat = pos.coords.latitude;
        lng = pos.coords.longitude;
        estado_ubicacion = true;
        document.getElementById("estado").innerHTML = "Ubicación activada";
        document.getElementById('cargando').style.display = "block";
        document.getElementById('map').style.display = "block";
        generarMapa();
    }, function(objPositionError) {
        // Cacheo de errores relacionados con la ubicación
        switch (objPositionError.code) {
            case objPositionError.PERMISSION_DENIED:
                document.getElementById("cuerpoModal").innerHTML = "Debe permitir la ubicación para continuar";
                document.getElementById("simboloModal").className = "fas fa-location-arrow fa-3x";
                sonidoError();
                MicroModal.show('modal');
                break;
            case objPositionError.POSITION_UNAVAILABLE:
                document.getElementById("cuerpoModal").innerHTML = "No se ha podido acceder a la información de su posición.";
                document.getElementById("simboloModal").className = "fas fa-location-arrow fa-3x";
                sonidoError();
                vibrar(300);
                MicroModal.show('modal');
                break;
            case objPositionError.TIMEOUT:
                document.getElementById("cuerpoModal").innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
                document.getElementById("simboloModal").className = "fas fa-clock fa-3x";
                sonidoError();
                vibrar(300);
                MicroModal.show('modal');
                break;
            default:
                document.getElementById("cuerpoModal").innerHTML = "Error desconocido";
                document.getElementById("simboloModal").className = "fas fa-question-circle fa-3x";
                sonidoError();
                vibrar(300);
                MicroModal.show('modal');
        }
    }, {
        maximumAge: 75000,
        timeout: 15000
    });
}



function generarMapa() {

    if (estado_ubicacion) {

        // Creación del mapa
        map = L.map('map').setView([lat, lng], 12);

        // Crear control de pantalla completa
        var fsControl = L.control.fullscreen();
        map.addControl(fsControl);


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '',
            subdomains: ['a', 'b', 'c']
        }).addTo(map);

        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttribution = 'Datos del mapa <a href="http://openstreetmap' +
            '.org">&copy; OpenStreetMap</a>';
        var osm = new L.TileLayer(osmUrl, { maxZoom: 18, attribution: osmAttribution });

        var gUrl = 'https://mt0.google.com/vt/lyrs=s&x={x}&y={y}&z={z}';
        var gAttribution = '&copy; Google Maps';
        var googlesat = new L.TileLayer(gUrl, { maxZoom: 18, attribution: gAttribution });

        var baseLayers = {
            '<i class="fas fa-map-marked-alt"></i> Callejero': osm,
            '<i class="fas fa-globe-europe"></i> Satélite': googlesat
        }

        L.control.layers(baseLayers, {}).addTo(map);

        // Círculo de la ubicación actual
        var circle = L.circle([lat, lng], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.2,
            radius: 700
        }).addTo(map);

        // Icono de la ubicación actual
        var iconoUbActual = L.icon({
            iconUrl: 'imagenes/marcador_rojo.png',
            iconSize: [50, 50]
        });

        // Marcador de la ubicación actual
        var marcadorUbActual = L.marker([lat, lng], { icon: iconoUbActual }).bindPopup('<p class="tituloPopup">Tu ubicación</h2>').addTo(map);
        arrayMarcadores.push(marcadorUbActual);

    } else {
        document.getElementById("cuerpoModal").innerHTML = "No se ha podido determinar su ubicación";
        document.getElementById("simboloModal").className = "fas fa-location-arrow fa-3x";
        MicroModal.show('modal');
    }
}
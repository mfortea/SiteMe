// BÚSQUEDA

// Variables globales de la sección búsqueda;
var map = null
var json_cache = ''
var arrayMarcadores = []

var radio = document.getElementById('radio');
var valorRadio = document.getElementById('valorRadio');
valorRadio.innerHTML = radio.value + " kilómetros"

radio.oninput = function () {
   if (this.value == 1) {
    valorRadio.innerHTML = this.value + " kilómetro"
   }
   else {
    valorRadio.innerHTML = this.value + " kilómetros"
   }

}

function buscar() {
  vibrar(50)

  if (map != undefined) {
    map.off()
    map.remove()
    console.log('Mapa eliminado')
    json_cache = ''
    arrayMarcadores = []
    generarMapa('busqueda')
  }

  // Icono de los marcadores de la búsqueda
  var iconoUbBusqueda = L.icon({
    iconUrl: 'imagenes/marcador_azul.png',
    iconSize: [50, 50],
  })

  // Icono de los marcadores favoritos
  var iconoFavoritos = L.icon({
    iconUrl: 'imagenes/marcador_amarillo.png',
    iconSize: [50, 50],
  })

  var busqueda = document.getElementById('input-busqueda').value
  var valorRadio = document.getElementById('radio').value*1000
  var datos = { busqueda: busqueda, radio: valorRadio, lat: lat, lng: lng }
  var json = JSON.stringify(datos)

  // Obtención de los datos de la búsqueda
  fetch('/buscarLugares', {
    method: 'POST',
    body: json,
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(function (response) {
      return response.json()
    })
    .then(function (resultados) {
      // Gestión de los resultados
      json_cache = resultados

      for (var i = 0; i < json_cache.sitios.length; ++i) {
        var favorito = json_cache.sitios[i].favorito
        var marcador
        var contenido =
          '<center>' +
          '<img width="30px" src="' +
          json_cache.sitios[i].icono +
          '"/>' +
          '<p class="tituloPopup">' +
          json_cache.sitios[i].nombre +
          '</p>' +
          '<p class="detallePopup">' +
          json_cache.sitios[i].direccion +
          '</p>' +
          '<p class="distanciaPopup"><i class="fas fa-directions"></i> A ' +
          medirDistancia(
            lat,
            lng,
            json_cache.sitios[i].latitud,
            json_cache.sitios[i].longitud,
          ) +
          ' kilómetros</p>'

        if (favorito == false) {
          marcador = L.marker([
            json_cache.sitios[i].latitud,
            json_cache.sitios[i].longitud,
          ]).bindPopup(
            (contenido +=
              '<button id="' +
              i +
              '" class="botonFavorito" onclick="accionPopup(\'' +
              i +
              '\')"><i class="far fa-2x fa-star"></i></button>' +
              '</center>'),
          )
          marcador.setIcon(iconoUbBusqueda)
        } else {
          marcador = L.marker([
            json_cache.sitios[i].latitud,
            json_cache.sitios[i].longitud,
          ]).bindPopup(
            (contenido +=
              '<button id="' +
              i +
              '" class="botonFavorito" onclick="accionPopup(\'' +
              i +
              '\')"><i class="fas fa-2x fa-star"></i></button>' +
              '</center>'),
          )
          marcador.setIcon(iconoFavoritos)
        }

        // Creación de los marcadores a partir de los datos
        arrayMarcadores.push(marcador)
      }

      // Adapta el zoom del mapa a todos los marcadores
      var grupoMarcadores = L.featureGroup(arrayMarcadores).addTo(map)
      map.fitBounds(grupoMarcadores.getBounds())
    })
}

function comprobarEstado(posicion) {
  var posicionMarcador = parseInt(posicion) + 1
  var contenido =
    '<center>' +
    '<img width="30px" src="' +
    json_cache.sitios[posicion].icono +
    '"/>' +
    '<p class="tituloPopup">' +
    json_cache.sitios[posicion].nombre +
    '</p>' +
    '<p class="detallePopup">' +
    json_cache.sitios[posicion].direccion +
    '</p>' +
    '<p class="distanciaPopup"><i class="fas fa-directions"></i> A ' +
    medirDistancia(
      lat,
      lng,
      json_cache.sitios[posicion].latitud,
      json_cache.sitios[posicion].longitud,
    ) +
    ' kilómetros</p>'

  if (json_cache.sitios[posicion].favorito == false) {
    arrayMarcadores[posicionMarcador]._popup.setContent(
      (contenido +=
        '<button id="' +
        posicion +
        '" class="botonFavorito" onclick="accionPopup(\'' +
        posicion +
        '\')"><i class="far fa-2x fa-star"></i></button>' +
        '</center>'),
    )
  } else if (json_cache.sitios[posicion].favorito == true) {
    arrayMarcadores[posicionMarcador]._popup.setContent(
      (contenido +=
        '<button id="' +
        posicion +
        '" class="botonFavorito" onclick="accionPopup(\'' +
        posicion +
        '\')"><i class="fas fa-2x fa-star"></i></button>' +
        '</center>'),
    )
  }
}

function accionPopup(posicion) {
  var favorito = json_cache.sitios[posicion].favorito

  if (favorito == false) {
    nuevoFavorito(posicion)
  } else if (favorito == true) {
    var id = json_cache.sitios[posicion].id
    eliminarFavorito(posicion)
  }
}

function nuevoFavorito(posicion) {
  var posicionMarcador = parseInt(posicion) + 1
  var botonFavorito = document.getElementById(posicion)
  botonFavorito.classList.add('animacionFavoritoCargando')
  // Icono de los marcadores favoritos
  var iconoFavoritos = L.icon({
    iconUrl: 'imagenes/marcador_amarillo.png',
    iconSize: [50, 50],
  })

  var id = json_cache.sitios[posicion].id
  var nombre = json_cache.sitios[posicion].nombre
  var latitud = json_cache.sitios[posicion].latitud
  var longitud = json_cache.sitios[posicion].longitud
  var icono = json_cache.sitios[posicion].icono
  var direccion = json_cache.sitios[posicion].direccion
  var favorito = {
    id: id,
    nombre: nombre,
    latitud: latitud,
    longitud: longitud,
    icono: icono,
    direccion: direccion,
  }
  var json = JSON.stringify(favorito)

  fetch('/nuevoFavorito', {
    method: 'POST',
    body: json,
    headers: {
      'Content-Type': 'application/json',
    },
  }).then(function (response) {
    if (response.status === 200) {
      vibrar(300)
      sonidoOK()
      json_cache.sitios[posicion].favorito = true
      arrayMarcadores[posicionMarcador].setIcon(iconoFavoritos)
      arrayMarcadores[posicionMarcador].openPopup()
      var botonFavorito = document.getElementById(posicion)
      botonFavorito.firstElementChild.classList.remove('far')
      botonFavorito.firstElementChild.classList.add('fas')
      botonFavorito.classList.add('animacionFavoritoCambio')
      setTimeout(function () {
        comprobarEstado(posicion)
      }, 1000)
    }
  })
}

function eliminarFavorito(posicion) {
  var id = json_cache.sitios[posicion].id
  var posicionMarcador = parseInt(posicion) + 1
  var botonFavorito = document.getElementById(posicion)
  botonFavorito.classList.add('animacionFavoritoCargando')

  // Icono de los marcadores de la búsqueda
  var iconoUbBusqueda = L.icon({
    iconUrl: 'imagenes/marcador_azul.png',
    iconSize: [50, 50],
  })

  fetch('/eliminarFavorito/' + id, {
    method: 'DELETE',
  }).then(function (response) {
    if (response.status === 204) {
      vibrar(300)
      sonidoEliminado()
      json_cache.sitios[posicion].favorito = false
      arrayMarcadores[posicionMarcador].setIcon(iconoUbBusqueda)
      arrayMarcadores[posicionMarcador].openPopup()
      var botonFavorito = document.getElementById(posicion)
      botonFavorito.firstElementChild.classList.remove('fas')
      botonFavorito.firstElementChild.classList.add('far')
      botonFavorito.classList.add('animacionFavoritoCambio')
      setTimeout(function () {
        comprobarEstado(posicion)
      }, 700)
    } else if (response.status === 404) {
      document.getElementById('cuerpoModal').innerHTML =
        'No se ha podido eliminar el sitio'
      document.getElementById('simboloModal').className = 'fas fa-times fa-3x'
      sonidoError()
      vibrar(300)
      MicroModal.show('modal')
    }
  })
}

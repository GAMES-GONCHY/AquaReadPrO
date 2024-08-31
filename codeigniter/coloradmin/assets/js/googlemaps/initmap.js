var mapDefault;  // Declarar mapDefault a nivel global
var addingMarker = false;  // Controla si se pueden agregar marcadores
var markers = [];  // Array para almacenar los marcadores
var ctrlPressed = false;  // Controla si la tecla "Ctrl" está presionada
var altPressed = false;  // Controla si la tecla "Alt" está presionada

// Detectar cuándo se presiona la tecla "Ctrl" o "Alt"
document.addEventListener('keydown', function(event) {
    if (event.key === 'Control' || event.key === 'Ctrl') {
        ctrlPressed = true;
    }
    if (event.key === 'Alt' || event.key === 'AltGraph') {
        altPressed = true;
    }
    if (event.key === 'Escape' || event.key === 'Esc') {
        // Desactivar la adición múltiple de marcadores
        addingMarker = false;
        // Restaurar el cursor del mapa a su forma predeterminada
        if (mapDefault) {
            mapDefault.setOptions({ draggableCursor: 'default' });
        }
    }
});

// Detectar cuándo se suelta la tecla "Ctrl" o "Alt"
document.addEventListener('keyup', function(event) {
    if (event.key === 'Control' || event.key === 'Ctrl') {
        ctrlPressed = false;
    }
    if (event.key === 'Alt' || event.key === 'AltGraph') {
        altPressed = false;
    }
});

function initMap() {
    mapDefault = new google.maps.Map(document.getElementById('google-map-default'), {
        zoom: 17,
        center: new google.maps.LatLng(-17.4105450836976, -66.12594068258299),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true,
        minZoom: 16,
        restriction: {
            latLngBounds: {
                north: -17.404592,
                south: -17.41772613612582,
                east: -66.12145818889127,
                west: -66.12823287518866
            },
            strictBounds: false
        },
        gestureHandling: "greedy"
    });

    // Polígono de área
    var areaCoords = [
        { lat: -17.408245180718332, lng: -66.12707638331297 },
        { lat: -17.40684055845479, lng: -66.12465000539221 },
        { lat: -17.409884426845334, lng: -66.12394582690727 },
        { lat: -17.41110434666331, lng: -66.12399193373078 },
        { lat: -17.41537732580422, lng: -66.12540074076435 },
        { lat: -17.415421965664258, lng: -66.12607972919076 }
    ];

    new google.maps.Polygon({
        paths: areaCoords,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#B0E0E6',
        fillOpacity: 0.1,
        clickable: false,
        map: mapDefault
    });

    // Marcadores desde la base de datos
    var coordenadas = window.coordenadas;  // Debes pasar las coordenadas desde el HTML como una variable global
    coordenadas.forEach(function(datalogger) {
        var marker = createMarker({
            lat: parseFloat(datalogger.latitud),
            lng: parseFloat(datalogger.longitud)
        }, mapDefault, datalogger.idDatalogger);
        markers.push(marker);
    });

    // Evento para agregar marcadores
    document.getElementById('addDataloggerBtn').addEventListener('click', function () {
        addingMarker = true;
        mapDefault.setOptions({ draggableCursor: 'crosshair' });
    });

    // Evento de clic para agregar un nuevo marcador
    mapDefault.addListener('click', function (event) {
        if (addingMarker) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();

            var newMarker = createMarker({ lat: lat, lng: lng }, mapDefault);
            markers.push(newMarker);

            // Guardar el marcador en la base de datos
            saveMarker(lat, lng, newMarker);

            if (!ctrlPressed) {
                mapDefault.setOptions({ draggableCursor: null });
                addingMarker = false;
            }
        }
    });
}

function createMarker(position, map, idDatalogger) {
    var marker = new google.maps.Marker({
        position: position,
        map: map,
        draggable: true
    });

    if (idDatalogger) {
        marker.idDatalogger = idDatalogger;
    }

    // Añadir el evento de clic derecho para eliminar
    google.maps.event.addListener(marker, 'rightclick', function () {
        deleteMarker(marker);
    });

    // Actualizar la posición al terminar el arrastre
    google.maps.event.addListener(marker, 'dragend', function () {
        if (altPressed) {
            updateMarkerPosition(marker);
        }
    });

    return marker;
}

function saveMarker(lat, lng, marker) {
    $.ajax({
        url: '/tercerAnio/aquaReadPro/codeigniter/index.php/datalogger/agregarmarker',
        method: 'POST',
        data: {
            latitud: lat,
            longitud: lng,
            idUsuario: window.idUsuario  // Debes pasar el idUsuario desde el HTML como una variable global
        },
        success: function (response) 
        {
            // try
            // {
                console.log(response);  // Verificar la respuesta
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.status === 'success') 
                {
                    marker.idDatalogger = jsonResponse.idDatalogger;
                }
                else 
                {
                    alert("Error al agregar el datalogger: " + jsonResponse.message);
                }
            //}
            // catch (e) 
            // {
            //     console.error("Error procesando la respuesta: ", e);
            //     alert("Error inesperado. Por favor, intenta de nuevo.");
            // }
        },
        error: function () 
        {
            alert("Error al agregar el datalogger.");
        }
    });
}

function deleteMarker(marker) {
    var idDatalogger = marker.idDatalogger;
    var estado = 0;

    document.body.style.cursor = 'progress';

    $.ajax({
        url: '/tercerAnio/aquaReadPro/codeigniter/index.php/datalogger/eliminarmarker',
        method: 'POST',
        data: {
            idDatalogger: idDatalogger,
            estado: estado
        },
        success: function (response) {
            try {
                console.log(response);  // Verificar la respuesta
                var jsonResponse = JSON.parse(response);

                if (jsonResponse.status === 'success') {
                    marker.setMap(null);
                    markers = markers.filter(m => m !== marker);

                    document.body.style.cursor = 'default';
                } else {
                    document.body.style.cursor = 'default';
                    console.error("Error al eliminar el datalogger: " + jsonResponse.message);
                }
            } catch (e) {
                console.error("Error procesando la respuesta: ", e);
                document.body.style.cursor = 'default';
            }
        },
        error: function () {
            console.error("Error al eliminar el datalogger.");
            document.body.style.cursor = 'default';
        }
    });
}

function updateMarkerPosition(marker) {
    var newLat = marker.getPosition().lat();
    var newLng = marker.getPosition().lng();
    var idDatalogger = marker.idDatalogger;

    $.ajax({
        url: '/tercerAnio/aquaReadPro/codeigniter/index.php/datalogger/modificarmarker',
        method: 'POST',
        data: {
            idDatalogger: idDatalogger,
            latitud: newLat,
            longitud: newLng
        },
        success: function (response) {
            try {
                console.log(response);  // Verificar la respuesta
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.status === 'success') {
                    console.log("Coordenadas actualizadas correctamente.");
                } else {
                    console.error("Error al actualizar las coordenadas: " + jsonResponse.message);
                }
            } catch (e) {
                console.error("Error procesando la respuesta: ", e);
            }
        },
        error: function () {
            console.error("Error al actualizar las coordenadas.");
        }
    });
}

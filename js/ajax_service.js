function getListCursosFotos(){

  var xhr = new XMLHttpRequest();
  xhr.open('GET', '../services/listCursosPhoto.php?accion=listado');
  xhr.onload = function () {
    if (xhr.status === 200) {
      // La solicitud ha tenido éxito. Procesa la respuesta del servidor.
      var data = xhr.responseText;
      // Actualiza la páginlistCursosa web con los datos recibidos del servidor
      document.getElementById("listCursos").innerHTML = data;
      
    } else {
      // La solicitud ha fallado. Muestra un mensaje de error.
    }
  };
  xhr.send();
  
}


function getListEventosFotos(){

  var xhr = new XMLHttpRequest();
  xhr.open('GET', '../services/listEventsPhoto.php?accion=listado');
  xhr.onload = function () {
    if (xhr.status === 200) {
      // La solicitud ha tenido éxito. Procesa la respuesta del servidor.
      var data = xhr.responseText;
      // Actualiza la páginlistCursosa web con los datos recibidos del servidor
      document.getElementById("listEventos").innerHTML = data;
      
    } else {
      // La solicitud ha fallado. Muestra un mensaje de error.
    }
  };
  xhr.send();
  
}

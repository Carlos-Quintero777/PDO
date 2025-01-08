window.addEventListener("load", function () {
  document.getElementById("fnuevo").hidden = true;
  document.getElementById("fregedit").hidden = true;

  
  fetch("http://localhost/fabinho%20DESAWEB/PDO/metodos/metodos.php", {
    method: "GET",
  })
    .then((respuesta) => respuesta.json())
    .then((data) => {
      let cadena = "";
      data.forEach((item) => {
        cadena += `<tr>
          <td>${item.id}</td>
          <td>${item.nombre}</td>
          <td>${item.edad}</td>
          <td>${item.correo}</td>
          <td>
            <button class="editar" 
              data-id="${item.id}" 
              data-nombre="${item.nombre}" 
              data-edad="${item.edad}" 
              data-correo="${item.correo}">Editar</button>
            <button class="eliminar" data-id="${item.id}">Eliminar</button>
          </td>
        </tr>`;
      });
      document.getElementById("datos").innerHTML = cadena;

    
      document.querySelectorAll(".editar").forEach((btn) =>
        btn.addEventListener("click", editar)
      );
      document.querySelectorAll(".eliminar").forEach((btn) =>
        btn.addEventListener("click", eliminar)
      );
    })
    .catch((error) => console.error(error));

  
  document.getElementById("n0").addEventListener("click", function () {
    document.getElementById("datostabla").hidden = true;
    document.getElementById("fnuevo").hidden = false;
  });

  
  document.getElementById("cancelarbtn").addEventListener("click", function () {
    document.getElementById("datostabla").hidden = false;
    document.getElementById("fnuevo").hidden = true;
  });

 
  document.getElementById("freginst").addEventListener("submit", function (event) {
    event.preventDefault();
    const formulario = new FormData(this);

    fetch("http://localhost/fabinho%20DESAWEB/PDO/metodos/metodos.php", {
      method: "POST",
      body: formulario,
    })
      .then((respuesta) => respuesta.json())
      .then((data) => {
        console.log(data);
        location.reload();
      })
      .catch((error) => console.error(error));
  });

  function editar(event) {
    
    const id = event.target.getAttribute("data-id");
    const nombre = event.target.getAttribute("data-nombre");
    const edad = event.target.getAttribute("data-edad");
    const correo = event.target.getAttribute("data-correo");

    if (!id || !nombre || !edad || !correo) {
        console.error("Error: Datos faltantes en el botón de edición.");
        return;
    }


    const formularioEdicion = document.getElementById("fregedit");
    formularioEdicion.style.display = "block";

    document.getElementById("idEditar").value = id;
    document.getElementById("nombreEditar").value = nombre;
    document.getElementById("edadEditar").value = edad;
    document.getElementById("correoEditar").value = correo;
}

document.getElementById("regedit").addEventListener("click", function () {
    const id = document.getElementById("idEditar").value;
    const nombre = document.getElementById("nombreEditar").value.trim();
    const edad = document.getElementById("edadEditar").value.trim();
    const correo = document.getElementById("correoEditar").value.trim();

    if (!id || !nombre || !edad || !correo) {
        alert("Por favor, complete todos los campos.");
        return;
    }

    const datos = { id, nombre, edad, correo };

    fetch("http://localhost/fabinho%20DESAWEB/PDO/metodos/metodos.php", {
        method: "PUT",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams(datos).toString(),
    })
        .then((respuesta) => respuesta.text())
        .then((texto) => {
            console.log("Respuesta del servidor (texto):", texto);
            if (texto.includes("Actualización exitosa")) {
                alert("Cambios guardados correctamente.");
                location.reload(); // Recargar la página para reflejar los cambios
            } else {
                alert("Hubo un error al guardar los cambios.");
            }
        })
        .catch((error) => {
            console.error("Error en la solicitud:", error);
            alert("Ocurrió un error al intentar guardar los cambios.");
        });
});


document.getElementById("cancelaredit").addEventListener("click", function () {
    const formularioEdicion = document.getElementById("fregedit");
    formularioEdicion.style.display = "none";
});


  
  function eliminar(event) {
    const id = event.target.getAttribute("data-id");

    if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
      fetch(`http://localhost/fabinho%20DESAWEB/PDO/metodos/metodos.php?id=${id}`, {
        method: "DELETE",
      })
        .then((respuesta) => respuesta.json())
        .then((data) => {
          console.log(data);
          if (data.success) {
            alert("Registro eliminado correctamente.");
            location.reload(); 
          } else {
            alert("Error al eliminar el registro.");
          }
        })
        .catch((error) => console.error(error));
    }
  }
});
